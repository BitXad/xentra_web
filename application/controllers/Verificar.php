<?php

class Verificar extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('login_model');
        $this->load->model('rol_model');
        $this->load->model('Gestion_model');
    }
    function alerta()
    {
        $data['_view'] = 'public/alerta';
        $this->load->view('layouts/main',$data);
    }

    function index()
    {
        $username = $this->input->post('username');
        $clave = $this->input->post('password');
        //$gestion_id = $this->input->post('gestion');
        $result = $this->login_model->login2($username, $clave);
        //print "<pre>"; print_r( $result); print "</pre>";
        //var_dump($result);
        
        if($result){
            if ($result->tipo_usuario == "ADMINISTRADOR") {
                /*$this->load->model('Rol_usuario_model');
                $this->load->model('Tipo_usuario_model');*/
                $thumb = "default_thumb.jpg";
                if ($result->imagen_usu <> null) {
                    $thumb = "thumb_".$result->imagen_usu;
                    //$thumb = $this->foto_thumb($result->usuario_imagen);
                }

                /*$gestion = $this->Gestion_model->get_gestion2($gestion_id);
                $rolusuario = $this->Rol_usuario_model->getall_rolusuario($result->tipousuario_id);
                $tipousuario_nombre = $this->Tipo_usuario_model->get_tipousuario_nombre($result->tipousuario_id);*/
                $sess_array = array(
                    'login_usu' => $result->login_usu,
                    'id_usu' => $result->id_usu,
                    'nombre_usu' => $result->nombre_usu,
                    'estado_usu' => $result->estado_usu,
                    'tipo_usuario' => $result->tipo_usuario,
                    //'tipousuario_descripcion' => $tipousuario_nombre,
                    'imagen_usu' => $result->imagen_usu,
                    //'usuario_email' => $result->usuario_email,
                    'clave_usu' => $result->clave_usu,
                    'thumb' => $thumb
                    //'rol' => $rolusuario,
                    /*'gestion_nombre' => $gestion->gestion_nombre,
                    'gestion_descripcion' => $gestion->gestion_descripcion,
                    'gestion_id' => $gestion->gestion_id*/
                );

                $this->session->set_userdata('logged_in', $sess_array);
                $session_data = $this->session->userdata('logged_in');

                if ($session_data['tipo_usuario'] == 'ADMINISTRADOR') {// admin page
                    redirect('dashboard');
                }
                /*if ($session_data['tipousuario_id'] == 2) {
                    redirect('ingreso');
                }
                if ($session_data['tipousuario_id'] == 3) {
                    redirect('');
                }
                if ($session_data['tipousuario_id'] >= 4) {
                    redirect('ingreso');
                }*/

            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">USUARIO invalido' . $result . '</div>');
                redirect('login');
            }

        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">USUARIO o CLAVE invalidos' . $result . '</div>');
            redirect('login');
        }

    }

    /*public function foto_thumb($foto)
    {
        $path_parts = pathinfo('./uploads/profile/' . $foto);
        return  $path_parts['filename'].'_thumb.' . $path_parts['extension'];
    } */

    public function logout()
    {
        $sess_array = array(
            'username' => ''
        );
        $this->session->unset_userdata('logged_in', $sess_array);

        $this->session->set_flashdata('msg', 'Successfully Logout');
        redirect('');
    }

    /*public function getTipo_usuario($tipousuario_id)
    {
        $tipo_usuarios = $this->rol_model->get_tipousuarios();

        foreach ($tipo_usuarios as $row) {
            if ($tipousuario_id == $row->tipousuario_id) {
                return $row->tipousuario_descripcion;
            }
        }

        if (count($tipo_usuarios) == 0) {
            return '----';
        }
    } */


}

?>
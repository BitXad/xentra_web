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
            if ($result->tipo_usuario == "ADMINISTRADOR" or $result->tipo_usuario == "LECTURADOR" or $result->tipo_usuario == "CAJERO" or $result->tipo_usuario == "AUXILIAR") {
                $this->load->model('Rol_usuario_model');
                //$this->load->model('Tipo_usuario_model');
                $thumb = "default_thumb.jpg";
                if ($result->imagen_usu <> null) {
                    $thumb = "thumb_".$result->imagen_usu;
                    //$thumb = $this->foto_thumb($result->usuario_imagen);
                }
                if($result->tipo_usuario == "ADMINISTRADOR"){
                    $tipousuario = 1;
                }elseif($result->tipo_usuario == "CAJERO"){
                    $tipousuario = 2;
                }elseif($result->tipo_usuario == "LECTURADOR"){
                    $tipousuario = 3;
                }
                elseif($result->tipo_usuario == "AUXILIAR"){
                    $tipousuario = 4;
                }
                //$gestion = $this->Gestion_model->get_gestion2($gestion_id);
                $rolusuario = $this->Rol_usuario_model->getall_rolusuario($tipousuario);
                //$tipousuario_nombre = $this->Tipo_usuario_model->get_tipousuario_nombre($result->tipousuario_id);
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
                    'thumb' => $thumb,
                    'rol' => $rolusuario
                    /*'gestion_nombre' => $gestion->gestion_nombre,
                    'gestion_descripcion' => $gestion->gestion_descripcion,
                    'gestion_id' => $gestion->gestion_id*/
                );

                $this->session->set_userdata('logged_in', $sess_array);
                $session_data = $this->session->userdata('logged_in');

                if ($session_data['tipo_usuario'] == 'ADMINISTRADOR') {// admin page
                    redirect('dashboard');
                }
                if ($session_data['tipo_usuario'] == 'LECTURADOR') {
                    redirect('lectura/lecturas');
                }
                if ($session_data['tipo_usuario'] == 'CAJERO') {
                    redirect('factura/cobranza');
                }
                if ($session_data['tipo_usuario'] == 'AUXILIAR') {
                    redirect('lectura/lecturas');
                }
                /*
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
    
    function sesionasociado(){
        $login = $this->input->post('username');
        $clave = $this->input->post('password');
        /*$login = "martha";
        $clave = "123";*/
        //$ipe = $this->input->post('ipe');
        $this->load->model('Asociado_model');
        $result = $this->Asociado_model->get_esteasociado($login, $clave);
        /*$resultado = "SELECT * from asociado WHERE login_asoc = '".$login."'".
                    " and clave_asoc = '".$clave."' ".
                    " and estado = 'ACTIVO'";
        $result=$this->db->query($resultado)->row_array();
        */
        
        //var_dump($result);
        if($result){
            $thumb = "thumb_default.jpg";
            if ($result->foto_asoc <> null && $result->foto_asoc <> "") {
                $thumb = "thumb_".$result->foto_asoc;
            }
            $sess_array = array(
                'el_asociado' => "el_asociado",
                'login_usu' => $result->login_asoc,
                'id_asoc' => $result->id_asoc,
                'nombre_usu' => $result->nombres_asoc." ".$result->apellidos_asoc,
                //'apellidos_asoc' => $result->apellidos_asoc,
                'estado' => $result->estado,
                //'tipo_usuario' => $result->tipo_usuario,
                'foto_asoc' => $result->foto_asoc,
                //'usuario_email' => $result->usuario_email,
                'clave_asoc' => $result->clave_asoc,
                'thumb' => $thumb,
                'rol' => array('rolusuario_asignado' => '0')
                /*'gestion_nombre' => $gestion->gestion_nombre,
                'gestion_descripcion' => $gestion->gestion_descripcion,
                'gestion_id' => $gestion->gestion_id*/
            );
            
            $this->session->set_userdata('logged_in', $sess_array);
            $session_data = $this->session->userdata('logged_in');

        /*$clienteid = $result['cliente_id'];
        $clientenombre = $result['cliente_nombre'];
        $update="UPDATE carrito
                  SET cliente_id = '".$clienteid."' 
                  WHERE cliente_id = '".$ipe."' ";
        $this->db->query($update);
        */
        /*setcookie("cliente_id", $clienteid, time() + (3600 * 24), "/");
        setcookie("cliente_nombre", $clientenombre, time() + (3600 * 24), "/");
        return true;*/
             redirect("asociado/dashboard");
            //$data['_view'] = 'asociado/dashboard/16';
            //$this->load->view('layouts/main',$data);
        
        }else{
            //$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">USUARIO o CLAVE invalidos' . $result . '</div>');
            redirect("login/logina");
            //$this->alerta();
        }
    }

}

?>
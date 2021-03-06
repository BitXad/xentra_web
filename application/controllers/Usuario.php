<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Usuario extends CI_Controller{
    private $session_data = "";
    function __construct()
    {
        parent::__construct();
        $this->load->model('Usuario_model');
        $this->load->library('form_validation');
        $this->session_data = $this->session->userdata('logged_in');
        if ($this->session->userdata('logged_in')) {
            $this->session_data = $this->session->userdata('logged_in');
        }else {
            redirect('', 'refresh');
        }
    } 
    /* *****Funcion que verifica el acceso al sistema**** */
    private function acceso($id_rol){
        $rolusuario = $this->session_data['rol'];
        if($rolusuario[$id_rol-1]['rolusuario_asignado'] == 1){
            return true;
        }else{
            $data['_view'] = 'login/mensajeacceso';
            $this->load->view('layouts/main',$data);
        }
    }
    /*
     * Listing of usuario
     */
    function index($a = null)
    {
        if($this->acceso(148)){
            $data['usuario'] = $this->Usuario_model->get_all_usuario();
            $data['mensaje'] = $a;
            $data['tipo_usuario'] = $this->session_data['tipo_usuario'];
            $data['_view'] = 'usuario/index';
            $this->load->view('layouts/main',$data);
        }
    }

    /*
     * Adding a new usuario
     */
    function add()
    {
        if($this->acceso(148)){
            $this->form_validation->set_rules('login_usu', 'login_usu', 'required|is_unique[usuario.login_usu]',
            array('is_unique' => 'Este login de usuario ya existe.'));
            $data['mensaje'] = "";
            if ($this->form_validation->run()) {
                if(md5($this->input->post('clave_usu')) === md5($this->input->post('rclave_usu'))){
                $foto="";
                    if (!empty($_FILES['imagen_usu']['name'])){
                            $this->load->library('image_lib');
                            $config['upload_path'] = './resources/images/usuarios/';
                            $img_full_path = $config['upload_path'];

                            $config['allowed_types'] = 'gif|jpeg|jpg|png';
                            $config['max_size'] = 0;
                            $config['max_width'] = 5900;
                            $config['max_height'] = 5900;

                            $new_name = time(); //str_replace(" ", "_", $this->input->post('proveedor_nombre'));
                            $config['file_name'] = $new_name; //.$extencion;
                            $config['file_ext_tolower'] = TRUE;

                            $this->load->library('upload', $config);
                            $this->upload->do_upload('imagen_usu');

                            $img_data = $this->upload->data();
                            $extension = $img_data['file_ext'];
                            /* ********************INICIO para resize***************************** */
                            if ($img_data['file_ext'] == ".jpg" || $img_data['file_ext'] == ".png" || $img_data['file_ext'] == ".jpeg" || $img_data['file_ext'] == ".gif") {
                                $conf['image_library'] = 'gd2';
                                $conf['source_image'] = $img_data['full_path'];
                                $conf['new_image'] = './resources/images/usuarios/';
                                $conf['maintain_ratio'] = TRUE;
                                $conf['create_thumb'] = FALSE;
                                $conf['width'] = 800;
                                $conf['height'] = 600;
                                $this->image_lib->clear();
                                $this->image_lib->initialize($conf);
                                if(!$this->image_lib->resize()){
                                    echo $this->image_lib->display_errors('','');
                                }
                            }
                            /* ********************F I N  para resize***************************** */
                            $confi['image_library'] = 'gd2';
                            $confi['source_image'] = './resources/images/usuarios/'.$new_name.$extension;
                            $confi['new_image'] = './resources/images/usuarios/'."thumb_".$new_name.$extension;
                            $confi['create_thumb'] = FALSE;
                            $confi['maintain_ratio'] = TRUE;
                            $confi['width'] = 50;
                            $confi['height'] = 50;

                            $this->image_lib->clear();
                            $this->image_lib->initialize($confi);
                            $this->image_lib->resize();

                            $foto = $new_name.$extension;
                             }
                /* *********************FIN imagen***************************** */
                $params = array(
                    'tipo_usuario' => $this->input->post('tipo_usuario'),
                    'estado_usu' => 'ACTIVO',
                    'nombre_usu' => $this->input->post('nombre_usu'),
                    //'usuario_email' => $this->input->post('usuario_email'),
                    'login_usu' => $this->input->post('login_usu'),
                    'clave_usu' => md5($this->input->post('clave_usu')),
                    'imagen_usu' => $foto,
                );

                $id_usu = $this->Usuario_model->add_usuario($params);
                redirect('usuario/index');
            }else{
                $data['mensaje'] = "las contraseñas no son iguales.";
                $this->load->model('Tipo_usuario_model');
                $data['all_tipo_usuario'] = $this->Tipo_usuario_model->get_all_tipo_usuario();

                $data['_view'] = 'usuario/add';
                $this->load->view('layouts/main',$data);
            }
            }else{
                $this->load->model('Tipo_usuario_model');
                $data['all_tipo_usuario'] = $this->Tipo_usuario_model->get_all_tipo_usuario();

                $data['_view'] = 'usuario/add';
                $this->load->view('layouts/main',$data);
            }
        }
    }  

    /*
     * Editing a usuario
     */
    function edit($id_usu)
    {
        if($this->acceso(148)){
            $original_value = $this->db->query("SELECT login_usu FROM usuario WHERE id_usu = " . $id_usu)->row()->login_usu;

            if ($this->input->post('login_usu') != $original_value) {
                $is_unique = '|is_unique[usuario.login_usu]';
            } else {
                $is_unique = '';
            }
            // check if the usuario exists before trying to edit it
            $data['usuario'] = $this->Usuario_model->get_usuario($id_usu);

            if(isset($data['usuario']['id_usu']))
            {
                 $this->form_validation->set_rules('login_usu', 'login_usu', 'required|trim|xss_clean' . $is_unique, array('is_unique' => 'Este login de usuario ya existe.'));

                    if ($this->form_validation->run()) {

                     /* *********************INICIO imagen***************************** */
                    $foto="";
                    $foto1= $this->input->post('imagen_usu1');
                    if (!empty($_FILES['imagen_usu']['name']))
                    {
                        $this->load->library('image_lib');
                        $config['upload_path'] = './resources/images/usuarios/';
                        $config['allowed_types'] = 'gif|jpeg|jpg|png';
                        $config['max_size'] = 0;
                        $config['max_width'] = 5900;
                        $config['max_height'] = 5900;

                        $new_name = time(); //str_replace(" ", "_", $this->input->post('proveedor_nombre'));
                        $config['file_name'] = $new_name; //.$extencion;
                        $config['file_ext_tolower'] = TRUE;

                        $this->load->library('upload', $config);
                        $this->upload->do_upload('imagen_usu');

                        $img_data = $this->upload->data();
                        $extension = $img_data['file_ext'];
                        /* ********************INICIO para resize***************************** */
                        if($img_data['file_ext'] == ".jpg" || $img_data['file_ext'] == ".png" || $img_data['file_ext'] == ".jpeg" || $img_data['file_ext'] == ".gif") {
                            $conf['image_library'] = 'gd2';
                            $conf['source_image'] = $img_data['full_path'];
                            $conf['new_image'] = './resources/images/usuarios/';
                            $conf['maintain_ratio'] = TRUE;
                            $conf['create_thumb'] = FALSE;
                            $conf['width'] = 800;
                            $conf['height'] = 600;
                            $this->image_lib->clear();
                            $this->image_lib->initialize($conf);
                            if(!$this->image_lib->resize()){
                                echo $this->image_lib->display_errors('','');
                            }
                        }
                        /* ********************F I N  para resize***************************** */
                        //$directorio = base_url().'resources/imagenes/';
                        $directorio = $_SERVER['DOCUMENT_ROOT'].'/siaac_web/resources/images/usuarios/';
                        if(isset($foto1) && !empty($foto1)){
                          if(file_exists($directorio.$foto1)){
                              unlink($directorio.$foto1);
                              $mimagenthumb = str_replace(".", "_thumb.", $foto1);
                              unlink($directorio.$mimagenthumb);
                          }
                      }
                        $confi['image_library'] = 'gd2';
                        $confi['source_image'] = './resources/images/usuarios/'.$new_name.$extension;
                        $confi['new_image'] = './resources/images/usuarios/'."thumb_".$new_name.$extension;
                        $confi['create_thumb'] = FALSE;
                        $confi['maintain_ratio'] = TRUE;
                        $confi['width'] = 50;
                        $confi['height'] = 50;

                        $this->image_lib->clear();
                        $this->image_lib->initialize($confi);
                        $this->image_lib->resize();

                        $foto = $new_name.$extension;
                    }else{
                        $foto = $foto1;
                    }
                /* *********************FIN imagen***************************** */
                    $params = array(
                        'tipo_usuario' => $this->input->post('tipo_usuario'),
                        'estado_usu' => $this->input->post('estado_usu'),
                        'nombre_usu' => $this->input->post('nombre_usu'),
                        //'usuario_email' => $this->input->post('usuario_email'),
                        'login_usu' => $this->input->post('login_usu'),
                        'imagen_usu' => $foto,
                    );

                    $this->Usuario_model->update_usuario($id_usu,$params);            
                    redirect('usuario/index');
                }else{
                    $this->load->model('Tipo_usuario_model');
                    $data['all_tipo_usuario'] = $this->Tipo_usuario_model->get_all_tipo_usuario();

                    $this->load->model('Estado_model');
                    $data['all_estado'] = $this->Estado_model->get_all_estados();

                    $data['_view'] = 'usuario/edit';
                    $this->load->view('layouts/main',$data);
                }
            }
            else
                show_error('The usuario you are trying to edit does not exist.');
        }
    }
    function inactivar($id_usu)
    {
        if($this->acceso(148)){
            $usuario = $this->Usuario_model->get_usuario($id_usu);

            // check if the programa exists before trying to delete it
            if(isset($usuario['id_usu']))
            {
                $this->Usuario_model->inactivar_usuario($id_usu);
                redirect('usuario');
            }
            else
                show_error('El usuario que intentas dar de baja, no existe.');
        }
    }
    function activar($id_usu)
    {
        if($this->acceso(148)){
            $usuario = $this->Usuario_model->get_usuario($id_usu);

            // check if the programa exists before trying to delete it
            if(isset($usuario['id_usu']))
            {
                $this->Usuario_model->activar_usuario($id_usu);
                redirect('usuario');
            }
            else
                show_error('El usuario que intentas dar de baja, no existe.');
        }
    }
    function nueva_clave($id_usu)
    {
        if($this->acceso(148)){
        $data['usuario'] = $this->Usuario_model->get_usuario($id_usu);

        if(isset($data['usuario']['id_usu'])){
                $new_password = md5($this->input->post('nuevo_pass'.$id_usu));
                $conf_password = md5($this->input->post('repita_pass'.$id_usu));

                if($new_password === $conf_password){
                    $params = array(
                        'clave_usu' => $new_password,
                    );

                    $this->Usuario_model->Update_usuario($id_usu, $params);
                    redirect('usuario/index/a');
                }else{
                    redirect('usuario/index/b');
                }
                
                 /*   if($new_password == $conf_password){
                        if($this->Usuario_model->password($id_usu, $new_password)) {
                            redirect('usuario/index');
                        }else{
                            $data['mensaje'] = 'No se pudo cambiar la contraseña, vuelva a intentarlo';
                            $data['_view'] = 'usuario/index';
                            $this->load->view('layouts/main', $data);
                            echo 'fallaste';
                        }
                    }else{
                        $data['mensaje'] = 'Las claves nuevas ingresadas no coinciden.';
                        $data['_view'] = 'usuario/index';
                        $this->load->view('layouts/main', $data);
                    }*/
           /* }else{
                echo validation_errors();
                $data['mensaje'] = 'QQQ';
                $data['page_title'] = "Usuario";
                $data['_view'] = 'usuario/index';
                $this->load->view('layouts/main', $data);
            }*/
        }else
            show_error('The usuario you are trying to edit does not exist.');
        }
    }
}

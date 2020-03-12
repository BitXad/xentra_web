<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Asociado extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Asociado_model');
    } 

    /*
     * Listing of asociado
     */
    function index()
    {
        $data['asociado'] = $this->Asociado_model->get_all_asociado();
        $this->load->model('Servicio_model');
        $data['all_servicio'] = $this->Servicio_model->get_all_servicios();
        $this->load->model('Categoria_model');
        $data['all_categoria'] = $this->Categoria_model->get_all_categorias();
        
        $data['_view'] = 'asociado/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new asociado
     */
    function add()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nombres_asoc','Nombres','trim|required', array('required' => 'Este Campo no debe ser vacio'));
        $this->form_validation->set_rules('apellidos_asoc','Apellidos','trim|required', array('required' => 'Este Campo no debe ser vacio'));
        if($this->form_validation->run())
        {
            /* *********************INICIO imagen***************************** */
            $foto="";
            if (!empty($_FILES['foto_asoc']['name'])){
                    $this->load->library('image_lib');
                    $config['upload_path'] = './resources/images/asociados/';
                    $img_full_path = $config['upload_path'];

                    $config['allowed_types'] = 'gif|jpeg|jpg|png';
                    $config['max_size'] = 0;
                    $config['max_width'] = 0;
                    $config['max_height'] = 0;

                    $new_name = time(); //str_replace(" ", "_", $this->input->post('proveedor_nombre'));
                    $config['file_name'] = $new_name; //.$extencion;
                    $config['file_ext_tolower'] = TRUE;

                    $this->load->library('upload', $config);
                    $this->upload->do_upload('foto_asoc');

                    $img_data = $this->upload->data();
                    $extension = $img_data['file_ext'];
                    /* ********************INICIO para resize***************************** */
                    if ($img_data['file_ext'] == ".jpg" || $img_data['file_ext'] == ".png" || $img_data['file_ext'] == ".jpeg" || $img_data['file_ext'] == ".gif") {
                        $conf['image_library'] = 'gd2';
                        $conf['source_image'] = $img_data['full_path'];
                        $conf['new_image'] = './resources/images/asociados/';
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
                    $confi['source_image'] = './resources/images/asociados/'.$new_name.$extension;
                    $confi['new_image'] = './resources/images/asociados/'."thumb_".$new_name.$extension;
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
            $id_empresa = 1;
            $estado = "ACTIVO";
            date_default_timezone_set('America/La_Paz');
            $fechahora_res = date('Y-m-d H:i:s');
            $params = array(
                'id_emp' => $id_empresa,
                'estado' => $estado,
                'tipo_asoc' => $this->input->post('tipo_asoc'),
                'ciudad' => $this->input->post('expedido'),
                'nombres_asoc' => $this->input->post('nombres_asoc'),
                'apellidos_asoc' => $this->input->post('apellidos_asoc'),
                'ci_asoc' => $this->input->post('ci_asoc'),
                'direccion_asoc' => $this->input->post('direccion_asoc'),
                'fechanac_asoc' => $this->input->post('fechanac_asoc'),
                'telefono_asoc' => $this->input->post('telefono_asoc'),
                'codigo_asoc' => $this->input->post('codigo_asoc'),
                'nit_asoc' => $this->input->post('nit_asoc'),
                'razon_asoc' => $this->input->post('razon_asoc'),
                'foto_asoc' => $foto,
                'fechahora_asoc' => $fechahora_res,
                'zona_asoc' => $this->input->post('zona_asoc'),
                'medidor_asoc' => $this->input->post('medidor_asoc'),
                'servicios_asoc' => $this->input->post('servicios_asoc'),
                'categoria_asoc' => $this->input->post('categoria_asoc'),
                'orden_asoc' => $this->input->post('orden_asoc'),
                'latitud_asoc' => $this->input->post('latitud_asoc'),
                'longitud_asoc' => $this->input->post('longitud_asoc'),
                'nro_asoc' => $this->input->post('nro_asoc'),
                'manzano_asoc' => $this->input->post('manzano_asoc'),
                'referencia_asoc' => $this->input->post('referencia_asoc'),
                'distancia_asoc' => $this->input->post('distancia_asoc'),
                'tipoinmueble_asoc' => $this->input->post('tipoinmueble_asoc'),
                'diametrored_asoc' => $this->input->post('diametrored_asoc'),
            );
            
            $asociado_id = $this->Asociado_model->add_asociado($params);
            redirect('asociado/index');
        }
        else
        {
            $this->load->model('Expedido_model');
            $data['all_expedido'] = $this->Expedido_model->get_all_expedido();
            $this->load->model('Tipo_asociado_model');
            $data['all_tipo_asociado'] = $this->Tipo_asociado_model->get_all_tipo_asociado();
            $this->load->model('Zona_model');
            $data['all_zona'] = $this->Zona_model->get_all_zonas();
            $this->load->model('Servicio_model');
            $data['all_servicio'] = $this->Servicio_model->get_all_servicios();
            $this->load->model('Diametrored_model');
            $data['all_diametro'] = $this->Diametrored_model->get_all_diametrored();
            $this->load->model('Tipoinmueble_model');
            $data['all_tipoinmueble'] = $this->Tipoinmueble_model->get_all_tipoinmueble();
            /*$this->load->model('Empresa_model');
            $data['all_empresa'] = $this->Empresa_model->get_all_empresa();*/
            $this->load->model('Categoria_model');
            $data['all_categoria'] = $this->Categoria_model->get_all_categorias();
            
            $data['_view'] = 'asociado/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a asociado
     */
    function edit($id_asoc)
    {   
        // check if the asociado exists before trying to edit it
        $data['asociado'] = $this->Asociado_model->get_asociado($id_asoc);
        
        if(isset($data['asociado']['id_asoc']))
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nombres_asoc','Nombres','trim|required', array('required' => 'Este Campo no debe ser vacio'));
            $this->form_validation->set_rules('apellidos_asoc','Apellidos','trim|required', array('required' => 'Este Campo no debe ser vacio'));
            if($this->form_validation->run())     
            {
                /* *********************INICIO imagen***************************** */
                $foto="";
                $foto1= $this->input->post('foto_asoc1');
                if (!empty($_FILES['foto_asoc']['name']))
                {
                    $config['upload_path'] = './resources/images/asociados/';
                    $config['allowed_types'] = 'gif|jpeg|jpg|png';
                    $config['max_size'] = 0;
                    $config['max_width'] = 0;
                    $config['max_height'] = 0;

                    $new_name = time(); //str_replace(" ", "_", $this->input->post('proveedor_nombre'));
                    $config['file_name'] = $new_name; //.$extencion;
                    $config['file_ext_tolower'] = TRUE;
                    
                    $this->load->library('image_lib');
                    $this->image_lib->initialize($config);
                    
                    $this->load->library('upload', $config);
                    $this->upload->do_upload('foto_asoc');

                    $img_data = $this->upload->data();
                    $extension = $img_data['file_ext'];
                    /* ********************INICIO para resize***************************** */
                    if($img_data['file_ext'] == ".jpg" || $img_data['file_ext'] == ".png" || $img_data['file_ext'] == ".jpeg" || $img_data['file_ext'] == ".gif") {
                        $conf['image_library'] = 'gd2';
                        $conf['source_image'] = $img_data['full_path'];
                        $conf['new_image'] = './resources/images/asociados/';
                        $conf['maintain_ratio'] = TRUE;
                        $conf['create_thumb'] = FALSE;
                        $conf['width'] = 800;
                        $conf['height'] = 600;
                        
                        $this->image_lib->initialize($conf);
                        if(!$this->image_lib->resize()){
                            echo $this->image_lib->display_errors('','');
                        }
                        $this->image_lib->clear();
                    }
                    /* ********************F I N  para resize***************************** */
                    //$directorio = base_url().'resources/imagenes/';
                    $base_url = explode('/', base_url());
                    //$directorio = FCPATH.'resources\images\clientes\\';
                    $directorio = $_SERVER['DOCUMENT_ROOT'].'/'.$base_url[3].'/resources/images/asociados/';
                    //$directorio = $_SERVER['DOCUMENT_ROOT'].'/ximpleman_web/resources/images/clientes/';
                    if(isset($foto1) && !empty($foto1)){
                      if(file_exists($directorio.$foto1)){
                          unlink($directorio.$foto1);
                          $mimagenthumb = "thumb_".$foto1;
                          unlink($directorio.$mimagenthumb);
                      }
                  }
                    $confi['image_library'] = 'gd2';
                    $confi['source_image'] = './resources/images/asociados/'.$new_name.$extension;
                    $confi['new_image'] = './resources/images/asociados/'."thumb_".$new_name.$extension;
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
                    'id_emp' => $this->input->post('id_emp'),
                    'estado' => $this->input->post('estado'),
                    'tipo_asoc' => $this->input->post('tipo_asoc'),
                    'ciudad' => $this->input->post('expedido'),
                    'nombres_asoc' => $this->input->post('nombres_asoc'),
                    'apellidos_asoc' => $this->input->post('apellidos_asoc'),
                    'ci_asoc' => $this->input->post('ci_asoc'),
                    'direccion_asoc' => $this->input->post('direccion_asoc'),
                    'fechanac_asoc' => $this->input->post('fechanac_asoc'),
                    'telefono_asoc' => $this->input->post('telefono_asoc'),
                    'codigo_asoc' => $this->input->post('codigo_asoc'),
                    'nit_asoc' => $this->input->post('nit_asoc'),
                    'razon_asoc' => $this->input->post('razon_asoc'),
                    'foto_asoc' => $foto,
                    //'fechahora_asoc' => $fechahora_res,
                    'zona_asoc' => $this->input->post('zona_asoc'),
                    'medidor_asoc' => $this->input->post('medidor_asoc'),
                    'servicios_asoc' => $this->input->post('servicios_asoc'),
                    'categoria_asoc' => $this->input->post('categoria_asoc'),
                    'orden_asoc' => $this->input->post('orden_asoc'),
                    'latitud_asoc' => $this->input->post('latitud_asoc'),
                    'longitud_asoc' => $this->input->post('longitud_asoc'),
                );
                $this->Asociado_model->update_asociado($id_asoc,$params);            
                redirect('asociado/index');
            }
            else
            {
		$this->load->model('Expedido_model');
                $data['all_expedido'] = $this->Expedido_model->get_all_expedido();
                $this->load->model('Tipo_asociado_model');
                $data['all_tipo_asociado'] = $this->Tipo_asociado_model->get_all_tipo_asociado();
                $this->load->model('Zona_model');
                $data['all_zona'] = $this->Zona_model->get_all_zonas();
                $this->load->model('Servicio_model');
                $data['all_servicio'] = $this->Servicio_model->get_all_servicios();
                $this->load->model('Estado_model');
                $data['all_estado'] = $this->Estado_model->get_all_estados();
                $this->load->model('Empresa_model');
                $data['all_empresa'] = $this->Empresa_model->get_all_empresa();
                $this->load->model('Categoria_model');
                $data['all_categoria'] = $this->Categoria_model->get_all_categorias();

                $data['_view'] = 'asociado/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('El Asociado que intestas modificar no existe...');
    } 

    /*
     * Deleting asociado
     */
    function remove($id_asoc)
    {
        $asociado = $this->Asociado_model->get_asociado($id_asoc);

        // check if the asociado exists before trying to delete it
        if(isset($asociado['id_asoc']))
        {
            $this->Asociado_model->delete_asociado($id_asoc);
            redirect('asociado/index');
        }
        else
            show_error('The asociado you are trying to delete does not exist.');
    }
    /* busca todos los asociados */
    function buscarasociadosall()
    {
        if ($this->input->is_ajax_request()){
            $datos = $this->Asociado_model->get_all_asociado();
            echo json_encode($datos);
        }else{
            echo json_encode(null);
        }
    }
    /* buscar asocoados */
    function buscarasociados()
    {
        if($this->input->is_ajax_request()){
            $parametro       = $this->input->post('parametro');   
            $servicioestado = $this->input->post('servicioestado');   
                $datos = $this->Asociado_model->get_busqueda_asociado_parametro($parametro, $servicioestado);
            echo json_encode($datos);
        }else{                 
            show_404();
        }
    }

    function dashboard($asociado_id)
    {
        $data['asociado'] = $this->Asociado_model->get_asociado($asociado_id);
        $data['pendientes'] = $this->Asociado_model->get_pendientes($asociado_id);
        $data['canceladas'] = $this->Asociado_model->get_canceladas($asociado_id);
        $data['_view'] = 'asociado/dashboard';
        $this->load->view('layouts/main',$data);
    }
    function ultimas_lecturas()
    {
        $asociado_id = $this->input->post('asociado_id');
        $ultimas = "SELECT l.*, a.nombres_asoc, a.apellidos_asoc, a.tipo_asoc, a.categoria_asoc  from lectura l, asociado a where a.id_asoc=l.id_asoc and l.id_asoc=".$asociado_id." order by l.fecha_lec DESC limit 5";
        $result= $this->db->query($ultimas)->result_array();
        //foreach($result as $res){
        //$mes=intval(date("m",strtotime($res['fecha_lec']) ) );
        
        //$suma=$res['consumo_lec'];
        
        //$registros[$mes]+=$suma;    
        //}
        echo json_encode($result);
         return true;
        //$data=array("registrosdia" =>$registros,);
        //echo   json_encode($data);
    }
    
}

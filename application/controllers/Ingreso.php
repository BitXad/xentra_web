<?php
/* 
 * Generated by CRUDigniter v3.0 Beta 
 * www.crudigniter.com
 */
 
class ingreso extends CI_Controller{
    private $session_data = "";
    function __construct()
    {
        parent::__construct();
        $this->load->model('Ingreso_model');
        $this->load->model('Categoria_ingreso_model'); 
        $this->load->model('Empresa_model');
        $this->load->model('Usuario_model');   
        $this->load->helper('numeros');
        $this->load->model('Parametro_model');
        $this->load->model('Factura_model');
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
     * Listegr of ingreso
     */
    function index()
    {
        if($this->acceso(53)){
            $data['page_title'] = "Ingreso";
            //$data['rol'] = $this->session_data['rol'];
            $data['ingreso'] = $this->Ingreso_model->get_all_ingreso();
            $data['categoria_ingreso'] = $this->Categoria_ingreso_model->get_all_categoria_ingreso();
            $data['empresa'] = $this->Empresa_model->get_empresa(1);    
            $data['_view'] = 'ingreso/index';
            $this->load->view('layouts/main',$data);
        }
    }

    function buscarfecha()
    {
        if($this->acceso(53)){
        if ($this->input->is_ajax_request()) {
            
            $filtro = $this->input->post('filtro');
            
           if ($filtro == null){
            $result = $this->Ingreso_model->get_all_ingreso($params);
            }
            else{
            $result = $this->Ingreso_model->fechaingreso($filtro);            
            }
           echo json_encode($result);
            
        }
        else
        {                 
                    show_404();
        }          
        }
    }

    
    function add()
    {   
        if($this->acceso(54)){
            $data['page_title'] = "ingreso";
                $id_usu = $this->session_data['id_usu'];
                
      $this->load->library('form_validation');
      $this->form_validation->set_rules(
        'nombre_ing', 'nombre_ing',
        'required');
       
       if($this->form_validation->run())      
        {   
          //$numrec = $this->Ingreso_model->numero();
           $numero = 0;
           

            $params = array(
        'id_usu' => $id_usu,
        'detalle_ing' => $this->input->post('detalle_ing'),
        'numrec_ing' => $numero,
        'nombre_ing' => $this->input->post('nombre_ing'),
        'monto_ing' => $this->input->post('monto_ing'),
        'estado_ing' => 'ACTIVO',
        'tipo_ing' => 'ingreso',
        'descripcion_ing' => $this->input->post('descripcion_ing'),
        'ci_ing' => $this->input->post('ci_ing'),
        'id_asoc' => $this->input->post('id_asoc'),
        
            );

            
            
            $id_ing = $this->Ingreso_model->add_ingreso($params);
            /*$sql = "UPDATE parametros SET parametro_numrecegr=parametro_numrecegr+1 WHERE parametro_id = '1'"; 
            $this->db->query($sql);*/
            redirect('ingreso/index');
           
        }
        else
        {
         $this->load->model('Categoria_ingreso_model');
           $data['all_categoria_ingreso'] = $this->Categoria_ingreso_model->get_all_categoria_ingreso();
           //$this->load->model('Parametro_model');
           //$data['parametro'] = $this->Parametro_model->get_all_parametro();
            $data['_view'] = 'ingreso/add';
            $this->load->view('layouts/main',$data);
        }
            }
    } 

    /*
     * Editegr a ingreso
     */
    function edit($id_ing)
    {   
        if($this->acceso(55)){
            $data['page_title'] = "ingreso";
            $id_usu = $this->session_data['id_usu'];
        // check if the ingreso exists before tryegr to edit it
        $data['ingreso'] = $this->Ingreso_model->get_ingreso($id_ing);
        //$data['tipoid_usu'] = $this->session_data['tipoid_usu'];
        
        if(isset($data['ingreso']['id_ing']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
                    'id_usu' => $id_usu,
        'detalle_ing' => $this->input->post('detalle_ing'),
        'numrec_ing' => $this->input->post('numrec_ing'),
        'nombre_ing' => $this->input->post('nombre_ing'),
        'monto_ing' => $this->input->post('monto_ing'),
        'estado_ing' => $this->input->post('estado_ing'),
        'descripcion_ing' => $this->input->post('descripcion_ing'),
        'fechahora_ing' => $this->input->post('fechahora_ing'),
        'ci_ing' => $this->input->post('ci_ing'),
        'id_asoc' => $this->input->post('id_asoc'),        
                );

                $this->Ingreso_model->update_ingreso($id_ing,$params);            
                redirect('ingreso/index');
            }
            else
            {
    
                $this->load->model('Categoria_ingreso_model');
           $data['all_categoria_ingreso'] = $this->Categoria_ingreso_model->get_all_categoria_ingreso();
                $data['_view'] = 'ingreso/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The ingreso you are tryegr to edit does not exist.');
            }
    }

    /*
     * Deletegr ingreso
     */

public function pdf($id_ing){
    if($this->acceso(58)){
        $data['page_title'] = "ingreso";
      $data['ingresos'] = $this->Ingreso_model->get_ingresos($id_ing);
      $data['empresa'] = $this->Empresa_model->get_empresa(1);    
             $data['_view'] = 'ingreso/recibo';
            $this->load->view('layouts/main',$data);
       
        }
    }


    public function boucher($id_ing){
        if($this->acceso(58)){
            $data['page_title'] = "ingreso";
      $data['ingreso'] = $this->Ingreso_model->get_ingresos($id_ing);
      $data['empresa'] = $this->Empresa_model->get_empresa(1);    
             $data['_view'] = 'ingreso/reciboboucher';
            $this->load->view('layouts/main',$data);
            }
    }

    function remove($id_ing)
    {
        if($this->acceso(56)){
            $ingreso = $this->Ingreso_model->get_ingreso($id_ing);

            // check if the ingreso exists before tryegr to delete it
            if(isset($ingreso['id_ing']))
            {
                $this->Ingreso_model->delete_ingreso($id_ing);
                redirect('ingreso/index');
            }
            else
                show_error('The ingreso you are tryegr to delete does not exist.');
        }
    }
    

    public function convertir()
    {
        //if($this->acceso(53)){
        $monto_ing = trim($this->input->post('monto_ing'));

        if (empty($monto_ing)) {
            echo json_encode(array('leyenda' => 'Debe introducir una monto_ing.'));
            
            return;
        }
        
        # verificar si el número no tiene caracteres no númericos, con excepción
        # del punto decimal
        $xmonto_ing = str_replace('.', '', $monto_ing);
        
        if (FALSE === ctype_digit($xmonto_ing)){
            echo json_encode(array('leyenda' => 'La monto_ing introducida no es válida.'));
            
            return;
        }

        # procedemos a covertir la monto_ing en letras
        $this->load->helper('numeros');
        $response = array(
            'leyenda' => num_to_letras($monto_ing)
            , 'monto_ing' => $monto_ing
            );  
        echo json_encode($response);
        //}
    }


    function buscar_asociados()
    {
      
        //**************** inicio contenido ***************
        
                if ($this->input->is_ajax_request()) {       
                    
                    $buscar = $this->input->post('buscar');                    
                    $datos = $this->Ingreso_model->buscar_asociado($buscar);
                    echo json_encode($datos);                        

                }
                else
                {                 
                            show_404();
                }  
                
        //**************** fin contenido ***************
        
                
               
    }
    function buscar_idasociado()
    {
      
        //**************** inicio contenido ***************
        
                if ($this->input->is_ajax_request()) {       
                    
                    $id = $this->input->post('asociado');                    
                    $datos = $this->Factura_model->buscar_id_asociado($id);
                    echo json_encode($datos);                        

                }
                else
                {                 
                            show_404();
                }  
                
        //**************** fin contenido ***************
        
                
               
    }


}

<?php
/* 
 * Generated by CRUDigniter v3.0 Beta 
 * www.crudigniter.com
 */
 
class Egreso extends CI_Controller{
    private $session_data = "";
    function __construct()
    {
        parent::__construct();
        $this->load->model('Egreso_model');
        $this->load->model('Categoria_egreso_model'); 
        $this->load->model('Empresa_model');
        $this->load->model('Usuario_model');   
        $this->load->helper('numeros');
        $this->load->model('Parametro_model');
        /*if ($this->session->userdata('logged_in')) {
            $this->session_data = $this->session->userdata('logged_in');
        }else {
            redirect('', 'refresh');
        }*/
    }
    /* *****Funcion que verifica el acceso al sistema**** */
    private function acceso($id_rol){
        //$rolusuario = $this->session_data['rol'];
        if($id_rol >= 1){
            return true;
        }else{
            $data['_view'] = 'login/mensajeacceso';
            $this->load->view('layouts/main',$data);
        }
    }
     
    /*  
     * Listegr of egreso
     */
    function index()
    {
        if($this->acceso(59)){
            $data['page_title'] = "Egreso";
            //$data['rol'] = $this->session_data['rol'];
            $data['egreso'] = $this->Egreso_model->get_all_egreso();
            $data['categoria_egreso'] = $this->Categoria_egreso_model->get_all_categoria_egreso();
            $data['empresa'] = $this->Empresa_model->get_empresa(1);    
            $data['_view'] = 'egreso/index';
            $this->load->view('layouts/main',$data);
        }
    }

    function buscarfecha()
    {
        if($this->acceso(59)){
        if ($this->input->is_ajax_request()) {
            
            $filtro = $this->input->post('filtro');
            
           if ($filtro == null){
            $result = $this->Egreso_model->get_all_egreso($params);
            }
            else{
            $result = $this->Egreso_model->fechaegreso($filtro);            
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
        if($this->acceso(60)){
            $data['page_title'] = "Egreso";
                //$id_usu = $this->session_data['id_usu'];
                
      $this->load->library('form_validation');
      $this->form_validation->set_rules(
        'nombre_egr', 'nombre_egr',
        'required');
       
       if($this->form_validation->run())      
        {   
          //$numrec = $this->Egreso_model->numero();
           $numero = 0;
           

            $params = array(
        'id_usu' => 1,
        'detalle_egr' => $this->input->post('detalle_egr'),
        'numrec_egr' => $numero,
        'nombre_egr' => $this->input->post('nombre_egr'),
        'monto_egr' => $this->input->post('monto_egr'),
        'estado_egr' => 'ACTIVO',
        'tipo_egr' => 'EGRESO',
        'descripcion_egr' => $this->input->post('descripcion_egr'),
        'fechahora_egr' => $this->input->post('fechahora_egr'),
        
            );

            
            
            $id_egr = $this->Egreso_model->add_egreso($params);
            /*$sql = "UPDATE parametros SET parametro_numrecegr=parametro_numrecegr+1 WHERE parametro_id = '1'"; 
            $this->db->query($sql);*/
            redirect('egreso/index');
           
        }
        else
        {
         $this->load->model('Categoria_egreso_model');
           $data['all_categoria_egreso'] = $this->Categoria_egreso_model->get_all_categoria_egreso();
           //$this->load->model('Parametro_model');
           //$data['parametro'] = $this->Parametro_model->get_all_parametro();
            $data['_view'] = 'egreso/add';
            $this->load->view('layouts/main',$data);
        }
            }
    } 

    /*
     * Editegr a egreso
     */
    function edit($id_egr)
    {   
        if($this->acceso(61)){
            $data['page_title'] = "Egreso";
            //$id_usu = $this->session_data['id_usu'];
        // check if the egreso exists before tryegr to edit it
        $data['egreso'] = $this->Egreso_model->get_egreso($id_egr);
        //$data['tipoid_usu'] = $this->session_data['tipoid_usu'];
        
        if(isset($data['egreso']['id_egr']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'id_usu' => 1,
        'detalle_egr' => $this->input->post('detalle_egr'),
        'numrec_egr' => $this->input->post('numrec_egr'),
        'nombre_egr' => $this->input->post('nombre_egr'),
        'monto_egr' => $this->input->post('monto_egr'),
        'estado_egr' => $this->input->post('estado_egr'),
        'descripcion_egr' => $this->input->post('descripcion_egr'),
        'fechahora_egr' => $this->input->post('fechahora_egr'),
				
                );

                $this->Egreso_model->update_egreso($id_egr,$params);            
                redirect('egreso/index');
            }
            else
            {
	
                $this->load->model('Categoria_egreso_model');
           $data['all_categoria_egreso'] = $this->Categoria_egreso_model->get_all_categoria_egreso();
                $data['_view'] = 'egreso/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The egreso you are tryegr to edit does not exist.');
            }
    }

    /*
     * Deletegr egreso
     */

public function pdf($id_egr){
    if($this->acceso(64)){
        $data['page_title'] = "Egreso";
      $data['egresos'] = $this->Egreso_model->get_egresos($id_egr);
      $data['empresa'] = $this->Empresa_model->get_empresa(1);    
             $data['_view'] = 'egreso/recibo';
            $this->load->view('layouts/main',$data);
       
        }
    }


    public function boucher($id_egr){
        if($this->acceso(64)){
            $data['page_title'] = "Egreso";
      $data['egreso'] = $this->Egreso_model->get_egresos($id_egr);
      $data['empresa'] = $this->Empresa_model->get_empresa(1);    
             $data['_view'] = 'egreso/reciboboucher';
            $this->load->view('layouts/main',$data);
            }
    }

    function remove($id_egr)
    {
        if($this->acceso(62)){
            $egreso = $this->Egreso_model->get_egreso($id_egr);

            // check if the egreso exists before tryegr to delete it
            if(isset($egreso['id_egr']))
            {
                $this->Egreso_model->delete_egreso($id_egr);
                redirect('egreso/index');
            }
            else
                show_error('The egreso you are tryegr to delete does not exist.');
        }
    }
    

    public function convertir()
    {
        if($this->acceso(59)){
        $monto_egr = trim($this->input->post('monto_egr'));

        if (empty($monto_egr)) {
            echo json_encode(array('leyenda' => 'Debe introducir una monto_egr.'));
            
            return;
        }
        
        # verificar si el número no tiene caracteres no númericos, con excepción
        # del punto decimal
        $xmonto_egr = str_replace('.', '', $monto_egr);
        
        if (FALSE === ctype_digit($xmonto_egr)){
            echo json_encode(array('leyenda' => 'La monto_egr introducida no es válida.'));
            
            return;
        }

        # procedemos a covertir la monto_egr en letras
        $this->load->helper('numeros');
        $response = array(
            'leyenda' => num_to_letras($monto_egr)
            , 'monto_egr' => $monto_egr
            );  
        echo json_encode($response);
        }
    }


}
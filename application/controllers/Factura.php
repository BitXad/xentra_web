<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Factura extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Factura_model');
        $this->load->model('Dosificacion_model');
        $this->load->helper('numeros');
        if ($this->session->userdata('logged_in')) {
            $this->session_data = $this->session->userdata('logged_in');
        }else {
            redirect('', 'refresh');
        }
    } 

    /*
     * Listing of factura
     */
    function index()
    {
        $data['factura'] = $this->Factura_model->get_all_facturacancelada();
        
        $data['_view'] = 'factura/index';
        $this->load->view('layouts/main',$data);
    }

    function cobranza()
    {
        $data['_view'] = 'factura/cobranza';
        $this->load->view('layouts/main',$data);
    }



    /*
     * Adding a new factura
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'tipo_fact' => $this->input->post('tipo_fact'),
				'estado_fact' => $this->input->post('estado_fact'),
				'id_usu' => $this->input->post('id_usu'),
				'id_lec' => $this->input->post('id_lec'),
				'num_fact' => $this->input->post('num_fact'),
				'nit_fact' => $this->input->post('nit_fact'),
				'razon_fact' => $this->input->post('razon_fact'),
				'orden_fact' => $this->input->post('orden_fact'),
				'nitemisor_fact' => $this->input->post('nitemisor_fact'),
				'llave_fact' => $this->input->post('llave_fact'),
				'fecha_fact' => $this->input->post('fecha_fact'),
				'hora_fact' => $this->input->post('hora_fact'),
				'fechaemision_fact' => $this->input->post('fechaemision_fact'),
				'montoparc_fact' => $this->input->post('montoparc_fact'),
				'desc_fact' => $this->input->post('desc_fact'),
				'cadenaqr_fact' => $this->input->post('cadenaqr_fact'),
				'codcontrol_fact' => $this->input->post('codcontrol_fact'),
				'literal_fact' => $this->input->post('literal_fact'),
				'fechahora_fact' => $this->input->post('fechahora_fact'),
				'fechavenc_fact' => $this->input->post('fechavenc_fact'),
				'totalconsumo_fact' => $this->input->post('totalconsumo_fact'),
				'totalaportes_fact' => $this->input->post('totalaportes_fact'),
				'totalrecargos_fact' => $this->input->post('totalrecargos_fact'),
				'montototal_fact' => $this->input->post('montototal_fact'),
				'exento_fact' => $this->input->post('exento_fact'),
				'ice_fact' => $this->input->post('ice_fact'),
				'id_ing' => $this->input->post('id_ing'),
            );
            
            $factura_id = $this->Factura_model->add_factura($params);
            redirect('factura/index');
        }
        else
        {
			$this->load->model('Usuario_model');
			$data['all_usuario'] = $this->Usuario_model->get_all_usuario();
            
            $data['_view'] = 'factura/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a factura
     */
    function edit($id_fact)
    {   
        // check if the factura exists before trying to edit it
        $data['factura'] = $this->Factura_model->get_factura($id_fact);
        
        if(isset($data['factura']['id_fact']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'tipo_fact' => $this->input->post('tipo_fact'),
					'estado_fact' => $this->input->post('estado_fact'),
					'id_usu' => $this->input->post('id_usu'),
					'id_lec' => $this->input->post('id_lec'),
					'num_fact' => $this->input->post('num_fact'),
					'nit_fact' => $this->input->post('nit_fact'),
					'razon_fact' => $this->input->post('razon_fact'),
					'orden_fact' => $this->input->post('orden_fact'),
					'nitemisor_fact' => $this->input->post('nitemisor_fact'),
					'llave_fact' => $this->input->post('llave_fact'),
					'fecha_fact' => $this->input->post('fecha_fact'),
					'hora_fact' => $this->input->post('hora_fact'),
					'fechaemision_fact' => $this->input->post('fechaemision_fact'),
					'montoparc_fact' => $this->input->post('montoparc_fact'),
					'desc_fact' => $this->input->post('desc_fact'),
					'cadenaqr_fact' => $this->input->post('cadenaqr_fact'),
					'codcontrol_fact' => $this->input->post('codcontrol_fact'),
					'literal_fact' => $this->input->post('literal_fact'),
					'fechahora_fact' => $this->input->post('fechahora_fact'),
					'fechavenc_fact' => $this->input->post('fechavenc_fact'),
					'totalconsumo_fact' => $this->input->post('totalconsumo_fact'),
					'totalaportes_fact' => $this->input->post('totalaportes_fact'),
					'totalrecargos_fact' => $this->input->post('totalrecargos_fact'),
					'montototal_fact' => $this->input->post('montototal_fact'),
					'exento_fact' => $this->input->post('exento_fact'),
					'ice_fact' => $this->input->post('ice_fact'),
					'id_ing' => $this->input->post('id_ing'),
                );

                $this->Factura_model->update_factura($id_fact,$params);            
                redirect('factura/index');
            }
            else
            {
				$this->load->model('Usuario_model');
				$data['all_usuario'] = $this->Usuario_model->get_all_usuario();

                $data['_view'] = 'factura/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The factura you are trying to edit does not exist.');
    } 

    /*
     * Deleting factura
     */
    function remove($id_fact)
    {
        $factura = $this->Factura_model->get_factura($id_fact);

        // check if the factura exists before trying to delete it
        if(isset($factura['id_fact']))
        {
            $this->Factura_model->delete_factura($id_fact);
            redirect('factura/index');
        }
        else
            show_error('The factura you are trying to delete does not exist.');
    }

    function buscarasociado()
    {
      
        //**************** inicio contenido ***************
        
                if ($this->input->is_ajax_request()) {       
                    
                    $ci = $this->input->post('ci');                    
                    $datos = $this->Factura_model->buscar_asociado($ci);
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

    function buscar_asociados()
    {
      
        //**************** inicio contenido ***************
        
                if ($this->input->is_ajax_request()) {       
                    
                    $nombre = $this->input->post('nombre');                    
                    $apellido = $this->input->post('apellido');                    
                    $datos = $this->Factura_model->busqueda_asociados($nombre,$apellido);
                    echo json_encode($datos);                        

                }
                else
                {                 
                            show_404();
                }  
                
        //**************** fin contenido ***************
    
               
    }

    function buscar_pendientes()
    {
        $asociado = $this->input->post('asociado');
        $estado = $this->input->post('estado');
        $datos = $this->Factura_model->get_pendiente_factura($asociado,$estado);
        echo json_encode($datos);  
        
    }

    function buscar_detalle()
    {
        $factura = $this->input->post('factura');
        $datos = $this->Factura_model->get_pendiente_detalle($factura);
        echo json_encode($datos);  
        
    }

    function anular()
    {
        $factura = $this->input->post('factura_id');
        $datos = true;

        echo json_encode($datos);  
        
    }

    function buscar_recibo()
    {
        $numero = $this->input->post('numero');
        $datos = "SELECT id_fact from factura where id_lec=".$numero." and estado_fact='CANCELADA' ";
        $respuesta = $this->db->query($datos)->row_array();
        if (isset($respuesta['id_fact'])) {
        echo json_encode($respuesta);  
           
        }else{
       show_404();
        }
        
        
    }

    function buscar_lectura()
    {
        $numero = $this->input->post('numero');
        $datos = "SELECT id_lec from lectura where id_lec=".$numero." ";
        $respuesta = $this->db->query($datos)->row_array();
        if (isset($respuesta['id_lec'])) {
        echo json_encode($respuesta);  
           
        }else{
       show_404();
        }
        
        
    }


    function buscar_recargos()
    {
        $lectura = $this->input->post('lectura');
        $datos = $this->Factura_model->get_recargo_detalle($lectura);
        echo json_encode($datos);  
        
    }

    function datos_factura()
    {
        $factura = $this->input->post('factura');
        $lectura = $this->input->post('lectura');
        $consumo = $this->Factura_model->get_consumo_factura($factura);
        $aporte = $this->Factura_model->get_aportes_factura($factura);
        $recargo = $this->Factura_model->get_recargos_factura($lectura);
        $data=array("consumo"=>$consumo['consumo'], "multa" =>$aporte['multas'], "recargo" =>$recargo['recargos']);
        echo json_encode($data);  
        
    }

    function registrarfactura()
    {
        $session_data = $this->session->userdata('logged_in');
        $usuario_id = $session_data['id_usu'];
        $factura_id = $this->input->post('factura_id');
        $lectura_id = $this->input->post('lectura_id');
        $generar_factura = 0;/*$this->input->post('generar_factura');*/  //aca debe venir el check generar
        $multar = $this->input->post('multar');
        $dosificacion = $this->Dosificacion_model->get_dosificacion(1);
        $numfact_dosif = $dosificacion['numfact_dosif'];
        $numfact_dosif1 = $numfact_dosif+1;
        $consumo=$this->input->post('consumo');
        $aportes=$this->input->post('aportes');
        $recargos1=$this->input->post('recargos');
        $total=$this->input->post('total');

        if ($multar==true) { //agregar los recargos al detalle
            $recargos = $this->Factura_model->get_recargo_detalle($lectura_id);
            foreach ($recargos as $rec) {
                $this->Factura_model->recargosadetalle($rec['id_param'],$factura_id);
            }
            
        }

        if ($generar_factura==1) {
            //aqui si hay q generar la factura...
        } else {
            $this->Factura_model->cancelar_factura($factura_id,$numfact_dosif1,$consumo,$aportes,$recargos1,$total,$usuario_id);
           
        }
            $this->Factura_model->actualizar_dosificacion($numfact_dosif1);
            $datos = $this->Factura_model->get_datos_factura($factura_id);
            echo json_encode($datos);  

    }

    function imprimir($factura_id){
      $num = $this->Factura_model->get_datos_factura($factura_id);
      $este = $num[0]['tipo_fact'];
        if ($este == 0) {
           redirect('factura/imprimir_recibo/'.$factura_id);
        }else{
           redirect('factura/imprimir_recibo/'.$factura_id);
     
    }

    }

    function imprimir_recibo($factura_id){

         $this->load->model('Empresa_model');
         $data['empresa'] = $this->Empresa_model->get_empresa(1);
         $data['factura'] = $this->Factura_model->get_factura_completa($factura_id);
         $data['detalle_factura'] = $this->Factura_model->get_pendiente_detalle($factura_id);         
         $data['_view'] = 'factura/recibo';
         $this->load->view('layouts/main',$data);
     }

    function ultima(){

         $dato = $this->Factura_model->get_factura_ultima();
         redirect('factura/imprimir_recibo/'.$dato['id_fact']);
   
     }
    
}

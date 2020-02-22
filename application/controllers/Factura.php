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
    } 

    /*
     * Listing of factura
     */
    function index()
    {
        $data['factura'] = $this->Factura_model->get_all_factura();
        
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
    
}

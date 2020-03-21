<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Multum extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Multum_model');
        if ($this->session->userdata('logged_in')) {
            $this->session_data = $this->session->userdata('logged_in');
        }else {
            redirect('', 'refresh');
        }
    } 

    /*
     * Listing of multa
     */
    function index()
    {
        $data['multa'] = $this->Multum_model->get_all_multa();
        
        $data['_view'] = 'multum/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new multum
     */
    function add()
    {   $session_data = $this->session->userdata('logged_in');
        $usuario_id = $session_data['id_usu'];
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'mes_multa' => $this->input->post('mes_multa'),
				'gestion_multa' => $this->input->post('gestion_multa'),
				'tipo_multa' => $this->input->post('tipo_multa'),
				'id_asoc' => $this->input->post('id_asoc'),
				'estado_multa' => 'ACTIVO',
				'id_usu' => $usuario_id,
				'motivo_multa' => $this->input->post('motivo_multa'),
				'detalle_multa' => $this->input->post('detalle_multa'),
				'monto_multa' => $this->input->post('monto_multa'),
				'nombre_asoc' => $this->input->post('nombre_asoc'),
				'exento_multa' => $this->input->post('exento_multa'),
				'ice_multa' => $this->input->post('ice_multa'),
            );
            
            $multum_id = $this->Multum_model->add_multum($params);
            redirect('multum/index');
        }
        else
        {
			


            $this->load->model('Me_model');
            $data['all_mes'] = $this->Me_model->get_all_mes();

            $this->load->model('Gestion_model');
            $data['all_gestion'] = $this->Gestion_model->get_all_gestion();
            
            $data['_view'] = 'multum/add';
            $this->load->view('layouts/main',$data);
        }
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

    /*
     * Editing a multum
     */
    function edit($id_multa)
    {   
        $session_data = $this->session->userdata('logged_in');
        $usuario_id = $session_data['id_usu'];
        // check if the multum exists before trying to edit it
        $data['multum'] = $this->Multum_model->get_multum($id_multa);
        
        if(isset($data['multum']['id_multa']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'mes_multa' => $this->input->post('mes_multa'),
					'gestion_multa' => $this->input->post('gestion_multa'),
					'tipo_multa' => $this->input->post('tipo_multa'),
					'id_asoc' => $this->input->post('id_asoc'),
					'estado_multa' => $this->input->post('estado_multa'),
					'id_usu' => $usuario_id,
					'motivo_multa' => $this->input->post('motivo_multa'),
					'detalle_multa' => $this->input->post('detalle_multa'),
					'monto_multa' => $this->input->post('monto_multa'),
					'nombre_asoc' => $this->input->post('nombre_asoc'),
					'exento_multa' => $this->input->post('exento_multa'),
					'ice_multa' => $this->input->post('ice_multa'),
                );

                $this->Multum_model->update_multum($id_multa,$params);            
                redirect('multum/index');
            }
            else
            {
				/*$this->load->model('Asociado_model');
                $data['asociado'] = $this->Asociado_model->get_asociado($data['multum']['id_asoc']);*/

                

                $this->load->model('Me_model');
                $data['all_mes'] = $this->Me_model->get_all_mes();

                $this->load->model('Gestion_model');
                $data['all_gestion'] = $this->Gestion_model->get_all_gestion();

                $data['_view'] = 'multum/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The multum you are trying to edit does not exist.');
    } 

    /*
     * Deleting multum
     */
    function remove($id_multa)
    {
        $multum = $this->Multum_model->get_multum($id_multa);

        // check if the multum exists before trying to delete it
        if(isset($multum['id_multa']))
        {
            $this->Multum_model->delete_multum($id_multa);
            redirect('multum/index');
        }
        else
            show_error('The multum you are trying to delete does not exist.');
    }
    
}

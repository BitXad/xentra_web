<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Zona extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Zona_model');
    } 

    /*
     * Listing of zonas
     */
    function index()
    {
        $data['zonas'] = $this->Zona_model->get_all_zonas();
        
        $data['_view'] = 'zona/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new zona
     */
    function add()
    {   
        $this->load->library('form_validation');
        $this->form_validation->set_rules('zona_med','Nombre','trim|required', array('required' => 'Este Campo no debe ser vacio'));
        $this->form_validation->set_rules('codigozona_med','Código','trim|required', array('required' => 'Este Campo no debe ser vacio'));
        if($this->form_validation->run())     
        {
            $params = array(
                'zona_med' => $this->input->post('zona_med'),
                'codigozona_med' => $this->input->post('codigozona_med'),
            );
            
            $zona_id = $this->Zona_model->add_zona($params);
            redirect('zona/index');
        }
        else
        {            
            $data['_view'] = 'zona/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a zona
     */
    function edit($esta_zona)
    {   
        // check if the zona exists before trying to edit it
        $zona_med = str_replace("%20", " ", $esta_zona);
        $data['zona'] = $this->Zona_model->get_zona($zona_med);
        
        if(isset($data['zona']['zona_med']))
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('zona_med','Nombre','trim|required', array('required' => 'Este Campo no debe ser vacio'));
            $this->form_validation->set_rules('codigozona_med','Código','trim|required', array('required' => 'Este Campo no debe ser vacio'));
            if($this->form_validation->run())     
            {
                $params = array(
                    'zona_med' => $this->input->post('zona_med'),
                    'codigozona_med' => $this->input->post('codigozona_med'),
                );

                $this->Zona_model->update_zona($zona_med,$params);            
                redirect('zona/index');
            }
            else
            {
                $data['_view'] = 'zona/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('La Zona que intentas modificar no existe.');
    } 

    /*
     * Deleting zona
     */
    function remove($zona_med)
    {
        $zona = $this->Zona_model->get_zona($zona_med);

        // check if the zona exists before trying to delete it
        if(isset($zona['zona_med']))
        {
            $this->Zona_model->delete_zona($zona_med);
            redirect('zona/index');
        }
        else
            show_error('The zona you are trying to delete does not exist.');
    }
    
}

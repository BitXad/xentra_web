<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Direccion_orden extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Direccion_orden_model');
    } 

    /*
     * Listing of direccion_orden
     */
    function index()
    {
        $data['direccion_orden'] = $this->Direccion_orden_model->get_all_direccion_orden();
        
        $data['_view'] = 'direccion_orden/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new direccion_orden
     */
    function add()
    {   
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nombre_dir','Nombre','trim|required', array('required' => 'Este Campo no debe ser vacio'));	
        if($this->form_validation->run())
        {   
            $params = array(
                'nombre_dir' => $this->input->post('nombre_dir'),
                'orden_dir' => $this->input->post('orden_dir'),
            );
            $direccion_orden_id = $this->Direccion_orden_model->add_direccion_orden($params);
            redirect('direccion_orden/index');
        }
        else
        {            
            $data['_view'] = 'direccion_orden/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a direccion_orden
     */
    function edit($id_dir)
    {   
        // check if the direccion_orden exists before trying to edit it
        $data['direccion_orden'] = $this->Direccion_orden_model->get_direccion_orden($id_dir);
        
        if(isset($data['direccion_orden']['id_dir']))
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nombre_dir','Nombre','trim|required', array('required' => 'Este Campo no debe ser vacio'));	
            if($this->form_validation->run())     
            {   
                $params = array(
                    'nombre_dir' => $this->input->post('nombre_dir'),
                    'orden_dir' => $this->input->post('orden_dir'),
                );
                $this->Direccion_orden_model->update_direccion_orden($id_dir,$params);            
                redirect('direccion_orden/index');
            }
            else
            {
                $data['_view'] = 'direccion_orden/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The direccion_orden you are trying to edit does not exist.');
    } 

    /*
     * Deleting direccion_orden
     */
    /*function remove($id_dir)
    {
        $direccion_orden = $this->Direccion_orden_model->get_direccion_orden($id_dir);

        // check if the direccion_orden exists before trying to delete it
        if(isset($direccion_orden['id_dir']))
        {
            $this->Direccion_orden_model->delete_direccion_orden($id_dir);
            redirect('direccion_orden/index');
        }
        else
            show_error('The direccion_orden you are trying to delete does not exist.');
    }*/
    
}

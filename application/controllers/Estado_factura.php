<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Estado_factura extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Estado_factura_model');
    } 

    /*
     * Listing of estado_factura
     */
    function index()
    {
        $data['estado_factura'] = $this->Estado_factura_model->get_all_estado_factura();
        
        $data['_view'] = 'estado_factura/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new estado_factura
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
            );
            
            $estado_factura_id = $this->Estado_factura_model->add_estado_factura($params);
            redirect('estado_factura/index');
        }
        else
        {            
            $data['_view'] = 'estado_factura/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a estado_factura
     */
    function edit($estado_fact)
    {   
        // check if the estado_factura exists before trying to edit it
        $data['estado_factura'] = $this->Estado_factura_model->get_estado_factura($estado_fact);
        
        if(isset($data['estado_factura']['estado_fact']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
                );

                $this->Estado_factura_model->update_estado_factura($estado_fact,$params);            
                redirect('estado_factura/index');
            }
            else
            {
                $data['_view'] = 'estado_factura/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The estado_factura you are trying to edit does not exist.');
    } 

    /*
     * Deleting estado_factura
     */
    function remove($estado_fact)
    {
        $estado_factura = $this->Estado_factura_model->get_estado_factura($estado_fact);

        // check if the estado_factura exists before trying to delete it
        if(isset($estado_factura['estado_fact']))
        {
            $this->Estado_factura_model->delete_estado_factura($estado_fact);
            redirect('estado_factura/index');
        }
        else
            show_error('The estado_factura you are trying to delete does not exist.');
    }
    
}

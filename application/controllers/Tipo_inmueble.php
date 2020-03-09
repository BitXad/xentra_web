<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Tipoinmueble extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tipoinmueble_model');
    } 

    /*
     * Listing of tipoinmueble
     */
    function index()
    {
        $data['all_tipoinmueble'] = $this->Tipoinmueble_model->get_all_tipoinmueble();
        
        $data['_view'] = 'tipoinmueble/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new tipoinmueble
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
            );
            
            $id_tin = $this->Tipoinmueble_model->add_tipoinmueble($params);
            redirect('tipoinmueble/index');
        }
        else
        {            
            $data['_view'] = 'tipoinmueble/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a tipoinmueble
     */
    function edit($id_tin)
    {   
        // check if the Diametrored exists before trying to edit it
        $data['tipoinmueble'] = $this->Tipoinmueble_model->get_tipoinmueble($id_tin);
        
        if(isset($data['tipoinmueble']['id_tin']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
                );

                $this->Tipoinmueble_model->update_tipoinmueble($id_tin,$params);            
                redirect('tipoinmueble/index');
            }
            else
            {
                $data['_view'] = 'tipoinmueble/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The tipoinmueble you are trying to edit does not exist.');
    }
    
    /* * añadir tipoinmueble */
    /*function aniadirtipoinmueble()
    {
        if ($this->input->is_ajax_request()) {
            $nombre_tin = $this->input->post('nombre_tin');
            $codigo_tin = $this->input->post('codigo_tin');
            if($nombre_tin != ""){
                $params = array(
                'nombre_tin' => $nombre_tin,
                'codigo_tin' => $codigo_tin,
                );
                $id_tin = $this->Tipoinmueble_model->add_tipoinmueble($params);
                $datos = $this->Tipoinmueble_model->get_tipoinmueble($id_tin);
                echo json_encode($datos);
            }else{
                echo json_encode(null);
            }
        }
        else
        {                 
            show_404();
        }
    }*/
}

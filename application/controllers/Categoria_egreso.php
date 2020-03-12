<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Categoria_Egreso extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Categoria_egreso_model');
    } 

    /*
     * Listing of categoria_egreso
     */
    function index()
    {
        $data['categoria_egreso'] = $this->Categoria_egreso_model->get_all_categoria_egreso();
        
        $data['_view'] = 'categoria_egreso/index';
        $this->load->view('layouts/main',$data);
    } 

    /*
     * Adding a new categoria_egreso
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('nom_categr','Nom Cating','required');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'nom_categr' => $this->input->post('nom_categr'),
				'id_gegr' => $this->input->post('id_gegr'),
            );
            
            $categoria_egreso_id = $this->Categoria_egreso_model->add_categoria_egreso($params);
            redirect('categoria_egreso/index');
        }
        else
        {            
            $data['_view'] = 'categoria_egreso/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a categoria_egreso
     */
    function edit($id_categr)
    {   
        // check if the categoria_egreso exists before trying to edit it
        $data['categoria_egreso'] = $this->Categoria_egreso_model->get_categoria_egreso($id_categr);
        
        if(isset($data['categoria_egreso']['id_categr']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('nom_categr','Nom Cating','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'nom_categr' => $this->input->post('nom_categr'),
					'id_gegr' => $this->input->post('id_gegr'),
                );

                $this->Categoria_egreso_model->update_categoria_egreso($id_categr,$params);            
                redirect('categoria_egreso/index');
            }
            else
            {
                $data['_view'] = 'categoria_egreso/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The categoria_egreso you are trying to edit does not exist.');
    } 

    /*
     * Deleting categoria_egreso
     */
    function remove($id_categr)
    {
        $categoria_egreso = $this->Categoria_egreso_model->get_categoria_egreso($id_categr);

        // check if the categoria_egreso exists before trying to delete it
        if(isset($categoria_egreso['id_categr']))
        {
            $this->Categoria_egreso_model->delete_categoria_egreso($id_categr);
            redirect('categoria_egreso/index');
        }
        else
            show_error('The categoria_egreso you are trying to delete does not exist.');
    }
    
}

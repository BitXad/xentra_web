<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Rol_usuario extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Rol_usuario_model');
    } 

    /*
     * Listing of rol_usuario
     */
    function index()
    {
        $data['rol_usuario'] = $this->Rol_usuario_model->get_all_rol_usuario();
        
        $data['_view'] = 'rol_usuario/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new rol_usuario
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'estado_rol' => $this->input->post('estado_rol'),
				'id_usu' => $this->input->post('id_usu'),
				'id_rol' => $this->input->post('id_rol'),
				'fecha' => $this->input->post('fecha'),
            );
            
            $rol_usuario_id = $this->Rol_usuario_model->add_rol_usuario($params);
            redirect('rol_usuario/index');
        }
        else
        {
			$this->load->model('Usuario_model');
			$data['all_usuario'] = $this->Usuario_model->get_all_usuario();
            
            $data['_view'] = 'rol_usuario/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a rol_usuario
     */
    function edit($xxx)
    {   
        // check if the rol_usuario exists before trying to edit it
        $data['rol_usuario'] = $this->Rol_usuario_model->get_rol_usuario($xxx);
        
        if(isset($data['rol_usuario']['']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'estado_rol' => $this->input->post('estado_rol'),
					'id_usu' => $this->input->post('id_usu'),
					'id_rol' => $this->input->post('id_rol'),
					'fecha' => $this->input->post('fecha'),
                );

                $this->Rol_usuario_model->update_rol_usuario($xxx,$params);            
                redirect('rol_usuario/index');
            }
            else
            {
				$this->load->model('Usuario_model');
				$data['all_usuario'] = $this->Usuario_model->get_all_usuario();

                $data['_view'] = 'rol_usuario/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The rol_usuario you are trying to edit does not exist.');
    } 

    /*
     * Deleting rol_usuario
     */
    function remove($xxx)
    {
        $rol_usuario = $this->Rol_usuario_model->get_rol_usuario($xxx);

        // check if the rol_usuario exists before trying to delete it
        if(isset($rol_usuario['']))
        {
            $this->Rol_usuario_model->delete_rol_usuario($xxx);
            redirect('rol_usuario/index');
        }
        else
            show_error('The rol_usuario you are trying to delete does not exist.');
    }
    
}

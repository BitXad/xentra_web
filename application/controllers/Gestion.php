<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Gestion extends CI_Controller{
    private $session_data = "";
    function __construct()
    {
        parent::__construct();
        $this->load->model('Gestion_model');
        if ($this->session->userdata('logged_in')) {
            $this->session_data = $this->session->userdata('logged_in');
        }else {
            redirect('', 'refresh');
        }
    }
    /* *****Funcion que verifica el acceso al sistema**** */
    private function acceso($id_rol){
        $rolusuario = $this->session_data['rol'];
        if($rolusuario[$id_rol-1]['rolusuario_asignado'] == 1){
            return true;
        }else{
            $data['_view'] = 'login/mensajeacceso';
            $this->load->view('layouts/main',$data);
        }
    }
    /*
     * Listing of gestion
     */
    function index()
    {
        if($this->acceso(452)){
            $data['gestion'] = $this->Gestion_model->get_all_gestion();

            $data['_view'] = 'gestion/index';
            $this->load->view('layouts/main',$data);
        }
    }

    /*
     * Adding a new gestion
     */
    function add()
    {
        if($this->acceso(452)){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('gestion_lec','Gestión','trim|required', array('required' => 'Este Campo no debe ser vacio'));
            if($this->form_validation->run())     
            {
                $params = array(
                    'gestion_lec' => $this->input->post('gestion_lec'),
                );

                $gestion_id = $this->Gestion_model->add_gestion($params);
                redirect('gestion/index');
            }
            else
            {            
                $data['_view'] = 'gestion/add';
                $this->load->view('layouts/main',$data);
            }
        }
    }  

    /*
     * Editing a gestion
     */
    function edit($gestion_lec)
    {
        if($this->acceso(452)){
            // check if the gestion exists before trying to edit it
            $data['gestion'] = $this->Gestion_model->get_gestion($gestion_lec);

            if(isset($data['gestion']['gestion_lec']))
            {
                $this->load->library('form_validation');
                $this->form_validation->set_rules('gestion_lec','Gestión','trim|required', array('required' => 'Este Campo no debe ser vacio'));
                if($this->form_validation->run())     
                {   
                    $params = array(
                        'gestion_lec' => $this->input->post('gestion_lec'),
                    );

                    $this->Gestion_model->update_gestion($gestion_lec,$params);            
                    redirect('gestion/index');
                }
                else
                {
                    $data['_view'] = 'gestion/edit';
                    $this->load->view('layouts/main',$data);
                }
            }
            else
                show_error('The gestion you are trying to edit does not exist.');
        }
    } 

    /*
     * Deleting gestion
     */
    /*function remove($gestion_lec)
    {
        $gestion = $this->Gestion_model->get_gestion($gestion_lec);

        // check if the gestion exists before trying to delete it
        if(isset($gestion['gestion_lec']))
        {
            $this->Gestion_model->delete_gestion($gestion_lec);
            redirect('gestion/index');
        }
        else
            show_error('The gestion you are trying to delete does not exist.');
    }*/
    
}

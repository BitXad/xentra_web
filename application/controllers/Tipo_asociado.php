<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Tipo_asociado extends CI_Controller{
    private $session_data = "";
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tipo_asociado_model');
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
     * Listing of tipo_asociado
     */
    function index()
    {
        if($this->acceso(447)){
            $data['tipo_asociado'] = $this->Tipo_asociado_model->get_all_tipo_asociado();

            $data['_view'] = 'tipo_asociado/index';
            $this->load->view('layouts/main',$data);
        }
    }

    /*
     * Adding a new tipo_asociado
     */
    function add()
    {
        if($this->acceso(447)){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('tipo_asoc','tipo_asoc','trim|required|is_unique[tipo_asociado.tipo_asoc]', array('is_unique' => 'Este TIPO ya fue Registrado.', 'required' => 'Este campo no debe ser vacio'));
            if($this->form_validation->run())     
            {   
                $params = array(
                    'tipo_asoc' => $this->input->post('tipo_asoc'),
                );

                $tipo_asociado_id = $this->Tipo_asociado_model->add_tipo_asociado($params);
                redirect('tipo_asociado/index');
            }
            else
            {            
                $data['_view'] = 'tipo_asociado/add';
                $this->load->view('layouts/main',$data);
            }
        }
    }  

    /*
     * Editing a tipo_asociado
     */
    function edit($este_tipo)
    {
        if($this->acceso(447)){
            // check if the tipo_asociado exists before trying to edit it

            $tipo_asoc = str_replace("%20", " ", $este_tipo);
            $data['tipo_asociado'] = $this->Tipo_asociado_model->get_tipo_asociado($tipo_asoc);
            if ($this->input->post('tipo_asoc') != $data['tipo_asociado']['tipo_asoc']) {
                $is_unique = '|is_unique[tipo_asociado.tipo_asoc]';
            } else {
                $is_unique = '';
            }

            if(isset($data['tipo_asociado']['tipo_asoc']))
            {
                $this->load->library('form_validation');
                $this->form_validation->set_rules('tipo_asoc', 'tipo_asoc', 'trim|required' . $is_unique, array('is_unique' => 'Este TIPO ya fue Registrado.', 'required' => 'Este campo no debe ser vacio'));
                if($this->form_validation->run())    
                {   
                    $params = array(
                        'tipo_asoc' => $this->input->post('tipo_asoc'),
                    );

                    $this->Tipo_asociado_model->update_tipo_asociado($tipo_asoc,$params);            
                    redirect('tipo_asociado/index');
                }
                else
                {
                    $data['_view'] = 'tipo_asociado/edit';
                    $this->load->view('layouts/main',$data);
                }
            }
            else
                show_error('The tipo_asociado you are trying to edit does not exist.');
        }
    } 

    /*
     * Deleting tipo_asociado
     */
    /*function remove($tipo_asoc)
    {
        $tipo_asociado = $this->Tipo_asociado_model->get_tipo_asociado($tipo_asoc);

        // check if the tipo_asociado exists before trying to delete it
        if(isset($tipo_asociado['tipo_asoc']))
        {
            $this->Tipo_asociado_model->delete_tipo_asociado($tipo_asoc);
            redirect('tipo_asociado/index');
        }
        else
            show_error('The tipo_asociado you are trying to delete does not exist.');
    }*/
    
}

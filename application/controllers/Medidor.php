<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Medidor extends CI_Controller{
    private $session_data = "";
    function __construct()
    {
        parent::__construct();
        $this->load->model('Medidor_model');
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
     * Listing of medidor
     */
    function index()
    {
        if($this->acceso(443)){
            $data['medidor'] = $this->Medidor_model->get_all_medidor();

            $data['_view'] = 'medidor/index';
            $this->load->view('layouts/main',$data);
        }
    }

    /*
     * Adding a new medidor
     */
    function add()
    {
        if($this->acceso(443)){
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
                    'id_asoc' => $this->input->post('id_asoc'),
                    'estado' => $this->input->post('estado'),
                    'id_multa' => $this->input->post('id_multa'),
                    'id_tarifa' => $this->input->post('id_tarifa'),
                    'id_ap' => $this->input->post('id_ap'),
                    'zona_med' => $this->input->post('zona_med'),
                    'codigo_med' => $this->input->post('codigo_med'),
                    'marca_med' => $this->input->post('marca_med'),
                    'modelo_med' => $this->input->post('modelo_med'),
                    'direccion_med' => $this->input->post('direccion_med'),
                    'categoria_med' => $this->input->post('categoria_med'),
                );

                $medidor_id = $this->Medidor_model->add_medidor($params);
                redirect('medidor/index');
            }
            else
            {
                $this->load->model('Asociado_model');
                $data['all_asociado'] = $this->Asociado_model->get_all_asociado();

                $data['_view'] = 'medidor/add';
                $this->load->view('layouts/main',$data);
            }
        }
    }  

    /*
     * Editing a medidor
     */
    function edit($id_med)
    {
        if($this->acceso(443)){
            // check if the medidor exists before trying to edit it
            $data['medidor'] = $this->Medidor_model->get_medidor($id_med);

            if(isset($data['medidor']['id_med']))
            {
                if(isset($_POST) && count($_POST) > 0)     
                {   
                    $params = array(
                        'id_asoc' => $this->input->post('id_asoc'),
                        'estado' => $this->input->post('estado'),
                        'id_multa' => $this->input->post('id_multa'),
                        'id_tarifa' => $this->input->post('id_tarifa'),
                        'id_ap' => $this->input->post('id_ap'),
                        'zona_med' => $this->input->post('zona_med'),
                        'codigo_med' => $this->input->post('codigo_med'),
                        'marca_med' => $this->input->post('marca_med'),
                        'modelo_med' => $this->input->post('modelo_med'),
                        'direccion_med' => $this->input->post('direccion_med'),
                        'categoria_med' => $this->input->post('categoria_med'),
                    );

                    $this->Medidor_model->update_medidor($id_med,$params);            
                    redirect('medidor/index');
                }
                else
                {
                    $this->load->model('Asociado_model');
                    $data['all_asociado'] = $this->Asociado_model->get_all_asociado();

                    $data['_view'] = 'medidor/edit';
                    $this->load->view('layouts/main',$data);
                }
            }
            else
                show_error('The medidor you are trying to edit does not exist.');
        }
    } 

    /*
     * Deleting medidor
     */
    /*function remove($id_med)
    {
        $medidor = $this->Medidor_model->get_medidor($id_med);

        // check if the medidor exists before trying to delete it
        if(isset($medidor['id_med']))
        {
            $this->Medidor_model->delete_medidor($id_med);
            redirect('medidor/index');
        }
        else
            show_error('The medidor you are trying to delete does not exist.');
    }*/
    
}

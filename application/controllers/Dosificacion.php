<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Dosificacion extends CI_Controller{
    private $session_data = "";
    function __construct()
    {
        parent::__construct();
        $this->load->model('Dosificacion_model');
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
     * Listing of dosificacion
     */
    function index()
    {
        if($this->acceso(149)){
            $data['dosificacion'] = $this->Dosificacion_model->get_all_dosificacion();
            if(sizeof($data['dosificacion']) >0){
                $data['newdosif'] = 1;
            }else{
                $data['newdosif'] = 0;
            }
            $data['_view'] = 'dosificacion/index';
            $this->load->view('layouts/main',$data);
        }
    }

    /*
     * Adding a new dosificacion
     */
    function add()
    {
        if($this->acceso(150)){
            $this->load->library('form_validation');

            $this->form_validation->set_rules('llave_dosif','Llave','trim|required', array('required' => 'Este Campo no debe ser vacio'));
            $this->form_validation->set_rules('numfact_dosif','Número de factura','trim|required', array('required' => 'Este Campo no debe ser vacio'));
            $this->form_validation->set_rules('numorden_dosif','Número de ordenOrden','trim|required', array('required' => 'Este Campo no debe ser vacio'));
            $this->form_validation->set_rules('fechalim_dosif','Fecha Limite','trim|required', array('required' => 'Este Campo no debe ser vacio'));

            if($this->form_validation->run())     
            {   
                $params = array(
                    'estado_dosif' => "ACTIVO",
                    'numorden_dosif' => $this->input->post('numorden_dosif'),
                    'llave_dosif' => $this->input->post('llave_dosif'),
                    'fechalim_dosif' => $this->input->post('fechalim_dosif'),
                    'fechahora_dosif' => $this->input->post('fechahora_dosif'),
                    'numfact_dosif' => $this->input->post('numfact_dosif'),
                );

                $dosificacion_id = $this->Dosificacion_model->add_dosificacion($params);
                redirect('dosificacion/index');
            }
            else
            {            
                $data['_view'] = 'dosificacion/add';
                $this->load->view('layouts/main',$data);
            }
        }
    }  

    /*
     * Editing a dosificacion
     */
    function edit($id_dosif)
    {
        if($this->acceso(151)){
            // check if the dosificacion exists before trying to edit it
            $data['dosificacion'] = $this->Dosificacion_model->get_dosificacion($id_dosif);

            if(isset($data['dosificacion']['id_dosif']))
            {
                $this->load->library('form_validation');
                $this->form_validation->set_rules('llave_dosif','Llave','trim|required', array('required' => 'Este Campo no debe ser vacio'));
                $this->form_validation->set_rules('numfact_dosif','Número de factura','trim|required', array('required' => 'Este Campo no debe ser vacio'));
                $this->form_validation->set_rules('numorden_dosif','Número de ordenOrden','trim|required', array('required' => 'Este Campo no debe ser vacio'));
                $this->form_validation->set_rules('fechalim_dosif','Fecha Limite','trim|required', array('required' => 'Este Campo no debe ser vacio'));
                $this->form_validation->set_rules('dosificacion_leyenda1','Leyenda 1','trim|required', array('required' => 'Este Campo no debe ser vacio'));
                $this->form_validation->set_rules('dosificacion_leyenda2','Leyenda 2','trim|required', array('required' => 'Este Campo no debe ser vacio'));

                if($this->form_validation->run())     
                {   
                    $params = array(
                        'estado_dosif' => $this->input->post('estado_dosif'),
                        'numorden_dosif' => $this->input->post('numorden_dosif'),
                        'llave_dosif' => $this->input->post('llave_dosif'),
                        'fechalim_dosif' => $this->input->post('fechalim_dosif'),
                        'fechahora_dosif' => $this->input->post('fechahora_dosif'),
                        'numfact_dosif' => $this->input->post('numfact_dosif'),
                        'dosificacion_leyenda1' => $this->input->post('dosificacion_leyenda1'),
                        'dosificacion_leyenda2' => $this->input->post('dosificacion_leyenda2'),
                    );

                    $this->Dosificacion_model->update_dosificacion($id_dosif,$params);            
                    redirect('dosificacion/index');
                }
                else
                {
                    $data['_view'] = 'dosificacion/edit';
                    $this->load->view('layouts/main',$data);
                }
            }
            else
                show_error('The dosificacion you are trying to edit does not exist.');
        }
    } 

    /*
     * Deleting dosificacion
     */
    /*function remove($id_dosif)
    {
        $dosificacion = $this->Dosificacion_model->get_dosificacion($id_dosif);

        // check if the dosificacion exists before trying to delete it
        if(isset($dosificacion['id_dosif']))
        {
            $this->Dosificacion_model->delete_dosificacion($id_dosif);
            redirect('dosificacion/index');
        }
        else
            show_error('The dosificacion you are trying to delete does not exist.');
    }*/
    
}

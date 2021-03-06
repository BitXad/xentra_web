<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Descuento extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Descuento_model');
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
     * Listing of descuento
     */
    function index()
    {
        if($this->acceso(451)){
            $data['all_descuento'] = $this->Descuento_model->get_all_descuentoasociado();
            $data['_view'] = 'descuento/index';
            $this->load->view('layouts/main',$data);
        }
    }
    /* Añadir descuento */
    function add()
    {
        if($this->acceso(451)){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nom_desc','Nombre','trim|required', array('required' => 'Este Campo no debe ser vacio'));
            $this->form_validation->set_rules('monto_desc','Monto','trim|required', array('required' => 'Este Campo no debe ser vacio'));
            $this->form_validation->set_rules('inicio_desc','Fecha de inicio','trim|required', array('required' => 'Este Campo no debe ser vacio'));
            $this->form_validation->set_rules('vigencia_desc','Fecha de finalización','trim|required', array('required' => 'Este Campo no debe ser vacio'));
            $this->form_validation->set_rules('id_asoc','Asociado','trim|required', array('required' => 'Este Campo no debe ser vacio'));
            if($this->form_validation->run())
            {
                $params = array(
                    'nom_desc' => $this->input->post('nom_desc'),
                    'monto_desc' => $this->input->post('monto_desc'),
                    'inicio_desc' => $this->input->post('inicio_desc'),
                    'vigencia_desc' => $this->input->post('vigencia_desc'),
                    'estado_desc' => 'ACTIVO',
                    'id_asoc' => $this->input->post('esteid_asoc'),
                );
                $id_desc = $this->Descuento_model->add_descuento($params);
                redirect('descuento/index');
            }
            else
            {
                $data['_view'] = 'descuento/add';
                $this->load->view('layouts/main',$data);
            }
        }
    }
    /*
     * Editing a descuento
     */
    function edit($id_desc)
    {
        if($this->acceso(451)){
            // check if the descuento exists before trying to edit it
            $data['descuento'] = $this->Descuento_model->get_descuento($id_desc);

            if(isset($data['descuento']['id_desc']))
            {
                $this->load->library('form_validation');
                $this->form_validation->set_rules('nom_desc','Nombre','trim|required', array('required' => 'Este Campo no debe ser vacio'));
                $this->form_validation->set_rules('monto_desc','Monto','trim|required', array('required' => 'Este Campo no debe ser vacio'));
                $this->form_validation->set_rules('inicio_desc','Fecha de inicio','trim|required', array('required' => 'Este Campo no debe ser vacio'));
                $this->form_validation->set_rules('vigencia_desc','Fecha de finalización','trim|required', array('required' => 'Este Campo no debe ser vacio'));
                $this->form_validation->set_rules('id_asoc','Asociado','trim|required', array('required' => 'Este Campo no debe ser vacio'));
                if($this->form_validation->run())
                {
                    $params = array(
                        'nom_desc' => $this->input->post('nom_desc'),
                        'monto_desc' => $this->input->post('monto_desc'),
                        'inicio_desc' => $this->input->post('inicio_desc'),
                        'vigencia_desc' => $this->input->post('vigencia_desc'),
                        'estado_desc' => $this->input->post('estado_desc'),
                        'id_asoc' => $this->input->post('esteid_asoc'),
                    );
                    $this->Descuento_model->update_descuento($id_desc,$params);            
                    redirect('descuento/index');
                }else{
                    $this->load->model('Estado_model');
                    $data['all_estado'] = $this->Estado_model->get_all_estados();            
                    $data['_view'] = 'descuento/edit';
                    $this->load->view('layouts/main',$data);
                }
            }
            else
                show_error('El descuento que intentas modificar no existe!.');
        }
    }
    /* Busca y selecciona asociados en nuevo descuento tambien en el modal. */
    function buscar_asociado()
    {
        if ($this->input->is_ajax_request()){
            $parametro = $this->input->post('id_asoc');
            $datos = $this->Descuento_model->get_buscar_asociado($parametro);
            echo json_encode($datos);
        }else{
            show_404();
        }
    }
    /* Busca y selecciona un asociados en nuevo descuento */
    function seleccionar_asociado()
    {
        if ($this->input->is_ajax_request()){
            $parametro = $this->input->post('id_asoc');
            $datos = $this->Descuento_model->get_seleccionar_asociado($parametro);
            echo json_encode($datos);
        }else{
            show_404();
        }
    }
    
    
    
    
    
    
    
    
    
    

    

    /*
     * Deleting descuento
     */
    /*function remove($id_desc)
    {
        $descuento = $this->Descuento_model->get_descuento($id_desc);

        // check if the descuento exists before trying to delete it
        if(isset($descuento['id_desc']))
        {
            $this->Descuento_model->delete_descuento($id_desc);
            redirect('descuento/index');
        }
        else
            show_error('The descuento you are trying to delete does not exist.');
    }*/
    
}

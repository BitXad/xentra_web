<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Aporte extends CI_Controller{
    private $session_data = "";
    function __construct()
    {
        parent::__construct();
        $this->load->model('Aporte_model');
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
     * Listing of aporte
     */
    function index()
    {
        if($this->acceso(424)){
            $data['aporte'] = $this->Aporte_model->get_all_aporte();
            
            $data['_view'] = 'aporte/index';
            $this->load->view('layouts/main',$data);
        }
    }

    /*
     * Adding a new aporte
     */
    function add()
    {
        if($this->acceso(425)){
            $session_data = $this->session->userdata('logged_in');
            $usuario_id = $session_data['id_usu'];
            $this->load->library('form_validation');
            $this->form_validation->set_rules('motivo_ap','Motivo','trim|required', array('required' => 'Este Campo no debe ser vacio'));
            $this->form_validation->set_rules('monto_ap','Monto','trim|required', array('required' => 'Este Campo no debe ser vacio'));
            if($this->form_validation->run())
            {   
                $params = array(
                    'mes_ap' => $this->input->post('mes_ap'),
                    'gestion_ap' => $this->input->post('gestion_ap'),
                    'tipo_ap' => $this->input->post('tipo_ap'),
                    'estado_ap' => 'ACTIVO',
                    'id_usu' => $usuario_id,
                    'exento_ap' => $this->input->post('exento_ap'),
                    'ice_ap' => $this->input->post('ice_ap'),
                    'motivo_ap' => $this->input->post('motivo_ap'),
                    'detalle_ap' => $this->input->post('detalle_ap'),
                    'monto_ap' => $this->input->post('monto_ap'),

                );
                $aporte_id = $this->Aporte_model->add_aporte($params);
                redirect('aporte/index');
            }
            else
            {

                $this->load->model('Me_model');
                $data['all_mes'] = $this->Me_model->get_all_mes();

                $this->load->model('Gestion_model');
                $data['all_gestion'] = $this->Gestion_model->get_all_gestion();

                $data['_view'] = 'aporte/add';
                $this->load->view('layouts/main',$data);
            }
        }
    }  

    /*
     * Editing a aporte
     */
    function edit($id_ap)
    {
        if($this->acceso(426)){
            $session_data = $this->session->userdata('logged_in');
            $usuario_id = $session_data['id_usu'];
            // check if the aporte exists before trying to edit it
            $data['aporte'] = $this->Aporte_model->get_aporte($id_ap);

            if(isset($data['aporte']['id_ap']))
            {
                $this->load->library('form_validation');
                $this->form_validation->set_rules('motivo_ap','Motivo','trim|required', array('required' => 'Este Campo no debe ser vacio'));
                $this->form_validation->set_rules('monto_ap','Monto','trim|required', array('required' => 'Este Campo no debe ser vacio'));
                if($this->form_validation->run())
                {   
                    $params = array(
                        'mes_ap' => $this->input->post('mes_ap'),
                        'gestion_ap' => $this->input->post('gestion_ap'),
                        'tipo_ap' => $this->input->post('tipo_ap'),
                        'estado_ap' => $this->input->post('estado_ap'),
                        'id_usu' => $usuario_id,
                        'exento_ap' => $this->input->post('exento_ap'),
                        'ice_ap' => $this->input->post('ice_ap'),
                        'motivo_ap' => $this->input->post('motivo_ap'),
                        'detalle_ap' => $this->input->post('detalle_ap'),
                        'monto_ap' => $this->input->post('monto_ap'),

                    );

                    $this->Aporte_model->update_aporte($id_ap,$params);            
                    redirect('aporte/index');
                }
                else
                {

                    $this->load->model('Me_model');
                    $data['all_mes'] = $this->Me_model->get_all_mes();

                    $this->load->model('Gestion_model');
                    $data['all_gestion'] = $this->Gestion_model->get_all_gestion();

                    $data['_view'] = 'aporte/edit';
                    $this->load->view('layouts/main',$data);
                }
            }
            else
                show_error('The aporte you are trying to edit does not exist.');
        }
    } 

    /*
     * Deleting aporte
     */
    /*function remove($id_ap)
    {
        $aporte = $this->Aporte_model->get_aporte($id_ap);

        // check if the aporte exists before trying to delete it
        if(isset($aporte['id_ap']))
        {
            $this->Aporte_model->delete_aporte($id_ap);
            redirect('aporte/index');
        }
        else
            show_error('The aporte you are trying to delete does not exist.');
    }*/
    
}

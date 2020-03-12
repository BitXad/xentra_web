<?php

Class Login extends CI_Controller
{

    public function __construct()    {
        parent::__construct();
    }

    public function index() {
        $data = array(
            'msg' => $this->session->flashdata('msg')
        );

        $this->load->model('Empresa_model');
        $data['empresa'] = $this->Empresa_model->get_empresa(1);

        $this->load->view('public/login',$data);
    }
    public function logout()
    {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('', 'refresh');
    }
    public function mensajeacceso(){
        redirect('login/mensajeacceso');
    }
}


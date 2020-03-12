<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {
    
    public function index()
    {
        $data = array(
            'msg' => $this->session->flashdata('msg')
        );
        $this->load->model('Empresa_model');
        $data['empresa'] = $this->Empresa_model->get_empresa(1);
        
        $this->load->view('public/login',$data);
    }

}

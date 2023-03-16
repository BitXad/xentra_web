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
        
        $licencia="SELECT DATEDIFF(licencia_fechalimite, CURDATE()) as dias FROM licencia WHERE licencia_id = 1";
        $lice = $this->db->query($licencia)->row_array();

        if ($lice['dias']<=10) {
            $data['diaslic'] = $lice['dias'];
            $this->load->view('public/login',$data);
    	} else{
            $data['diaslic'] = 5000;
            $this->load->view('public/login',$data);
    	}
        
    }

}

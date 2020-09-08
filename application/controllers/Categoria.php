<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Categoria extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Categoria_model');
    } 

    /*
     * Listing of categorias
     */
    function index()
    {
        $data['categorias'] = $this->Categoria_model->get_all_categorias();
        
        $data['_view'] = 'categoria/index';
        $this->load->view('layouts/main',$data);
    }


    function descuentos_abril()
    {
        
        $sql="SELECT l.mes_lec, l.id_asoc, f.id_fact, f.montototal_fact, a.categoria_asoc from lectura l, factura f, asociado a where l.id_lec=f.id_lec and l.mes_lec='ABRIL' and l.id_asoc=a.id_asoc and a.categoria_asoc='DOMICILIARIA BASICA'";
$factura=$this->db->query($sql)->result_array();

foreach($factura as $fact){
    $descu = 0-(($fact['montototal_fact']-1)/2);
    
    $sql1="INSERT INTO detalle_factura (id_fact, cant_detfact, descip_detfact, punit_detfact, desc_detfact, total_detfact, tipo_detfact, exento_detfact, ice_detfact) VALUES

  (".$fact['id_fact'].",  1, 'MENOS 50% DES. DOM.', ".$descu.", 0, ".$descu.", 0, 'NO', 'NO')";

  $this->db->query($sql1);

}
        $data['categorias'] = $this->Categoria_model->get_all_categorias();
        $data['_view'] = 'categoria/index';
        $this->load->view('layouts/main',$data);
    }

    function descuentos_mayo()
    {
        
        $sql="SELECT l.mes_lec, l.id_asoc, f.id_fact, f.montototal_fact, a.categoria_asoc from lectura l, factura f, asociado a where l.id_lec=f.id_lec and l.mes_lec='MAYO' and l.id_asoc=a.id_asoc and a.categoria_asoc='DOMICILIARIA BASICA'";
$factura=$this->db->query($sql)->result_array();

foreach($factura as $fact){
    $descu = 0-(($fact['montototal_fact']-1)/2);
    
    $sql1="INSERT INTO detalle_factura (id_fact, cant_detfact, descip_detfact, punit_detfact, desc_detfact, total_detfact, tipo_detfact, exento_detfact, ice_detfact) VALUES

  (".$fact['id_fact'].",  1, 'MENOS 50% DES. DOM.', ".$descu.", 0, ".$descu.", 0, 'NO', 'NO')";

  $this->db->query($sql1);

}
        $data['categorias'] = $this->Categoria_model->get_all_categorias();
        $data['_view'] = 'categoria/index';
        $this->load->view('layouts/main',$data);
    }

    function descuentos_junio()
    {
        
        $sql="SELECT l.mes_lec, l.id_asoc, f.id_fact, f.montototal_fact, a.categoria_asoc from lectura l, factura f, asociado a where l.id_lec=f.id_lec and l.mes_lec='JUNIO' and l.id_asoc=a.id_asoc and a.categoria_asoc='DOMICILIARIA BASICA'";
$factura=$this->db->query($sql)->result_array();

foreach($factura as $fact){
    $descu = 0-(($fact['montototal_fact']-1)/2);
    
    $sql1="INSERT INTO detalle_factura (id_fact, cant_detfact, descip_detfact, punit_detfact, desc_detfact, total_detfact, tipo_detfact, exento_detfact, ice_detfact) VALUES

  (".$fact['id_fact'].",  1, 'MENOS 50% DES. DOM.', ".$descu.", 0, ".$descu.", 0, 'NO', 'NO')";

  $this->db->query($sql1);

}
        $data['categorias'] = $this->Categoria_model->get_all_categorias();
        $data['_view'] = 'categoria/index';
        $this->load->view('layouts/main',$data);
    }



    /*
     * Adding a new categoria
     */
    function add()
    {   
        $this->load->library('form_validation');
        $this->form_validation->set_rules('categoria','Nombre','trim|required', array('required' => 'Este Campo no debe ser vacio'));
        $this->form_validation->set_rules('codigo_cat','Código','trim|required', array('required' => 'Este Campo no debe ser vacio'));
        if($this->form_validation->run())     
        {
            $params = array(
                'categoria' => $this->input->post('categoria'),
                'codigo_cat' => $this->input->post('codigo_cat'),
            );
            $categoria_id = $this->Categoria_model->add_categoria($params);
            redirect('categoria/index');
        }
        else
        {            
            $data['_view'] = 'categoria/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a categoria
     */
    function edit($esta_categoria)
    {   
        // check if the categoria exists before trying to edit it
        $categoria = str_replace("%20", " ", $esta_categoria);
        $data['categoria'] = $this->Categoria_model->get_categoria($categoria);
        
        if(isset($data['categoria']['categoria']))
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('categoria','Nombre','trim|required', array('required' => 'Este Campo no debe ser vacio'));
            $this->form_validation->set_rules('codigo_cat','Código','trim|required', array('required' => 'Este Campo no debe ser vacio'));
            if($this->form_validation->run())     
            {
                $params = array(
                    'categoria' => $this->input->post('categoria'),
                    'codigo_cat' => $this->input->post('codigo_cat'),
                );
                $this->Categoria_model->update_categoria($categoria,$params);            
                redirect('categoria/index');
            }
            else
            {
                $data['_view'] = 'categoria/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The categoria you are trying to edit does not exist.');
    } 

    /*
     * Deleting categoria
     */
    function remove($categoria)
    {
        $categoria = $this->Categoria_model->get_categoria($categoria);

        // check if the categoria exists before trying to delete it
        if(isset($categoria['categoria']))
        {
            $this->Categoria_model->delete_categoria($categoria);
            redirect('categoria/index');
        }
        else
            show_error('The categoria you are trying to delete does not exist.');
    }
    
}

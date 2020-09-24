<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Reportes extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Reportes_model');
        $this->load->model('Lectura_model');
        $this->load->model('Me_model');
        if ($this->session->userdata('logged_in')) {
            $this->session_data = $this->session->userdata('logged_in');
        }else {
            redirect('', 'refresh');
        }
        
    }
    /* reporte de ingresos */
    function index()
    {
        $data['nombre_usu'] = $this->session_data['nombre_usu'];
        $this->load->model('Usuario_model');
        $data['all_usuario'] = $this->Usuario_model->get_all_usuario_activo();
        $this->load->model('Estado_model');
        $data['all_estado'] = $this->Estado_model->get_all_estados();
        $this->load->model('Empresa_model');
        $data['all_empresa'] = $this->Empresa_model->get_all_empresa();
        $this->load->model('Direccion_orden_model');
        $data['all_direccion'] = $this->Direccion_orden_model->get_all_direccion_alfab();
        $data['_view'] = 'reportes/index';
        $this->load->view('layouts/main',$data);
    }
    
    /* reporte de ingresos por cobros por facturacion */
    function ingresof()
    {
        $data['nombre_usu'] = $this->session_data['nombre_usu'];
        $this->load->model('Usuario_model');
        $data['all_usuario'] = $this->Usuario_model->get_all_usuario_activo();
        $this->load->model('Estado_model');
        $data['all_estado'] = $this->Estado_model->get_all_estados();
        $this->load->model('Empresa_model');
        $data['all_empresa'] = $this->Empresa_model->get_all_empresa();
        $this->load->model('Direccion_orden_model');
        $data['all_direccion'] = $this->Direccion_orden_model->get_all_direccion_alfab();
        $data['_view'] = 'reportes/ingresof';
        $this->load->view('layouts/main',$data);
    }
    
    /*
     * Listing of categorias
     */
    function mensual()
    {
    	$data['direcciones'] = $this->Reportes_model->get_direcciones();
    	$data['meses'] = $this->Me_model->get_all_mes();
        //$data['totales'] = $this->Reportes_model->reporte_mensual();
        
        $data['_view'] = 'reportes/mensual';
        $this->load->view('layouts/main',$data);
    }
    
    /* reporte de movimiento */
    function movimiento()
    {
        $data['nombre_usu'] = $this->session_data['nombre_usu'];
        $this->load->model('Usuario_model');
        $data['all_usuario'] = $this->Usuario_model->get_all_usuario_activo();
        $this->load->model('Estado_model');
        $data['all_estado'] = $this->Estado_model->get_all_estados();
        $this->load->model('Empresa_model');
        $data['all_empresa'] = $this->Empresa_model->get_all_empresa();
        $data['_view'] = 'reportes/movimiento';
        $this->load->view('layouts/main',$data);
    }
    /* busca reportes de ingreso */
    function buscarlosingresos()
    {
        if ($this->input->is_ajax_request()) {

            $fecha1    = $this->input->post('fecha1');   
            $fecha2    = $this->input->post('fecha2'); 
            $usuario   = $this->input->post('usuario_id'); 
            $estado_id = $this->input->post('esteestado');
            $orden_por = $this->input->post('orden_por');
            $nombre_dir    = $this->input->post('nombre_dir');
            $esteasociado    = $this->input->post('esteasociado');
            $valfecha1 = "";
            $valfecha2 = "";
            $usuario_id = "";

            if(!($fecha1 == null || empty($fecha1)) && !($fecha2 == null || empty($fecha2))){
                $valfecha1 = $fecha1;
                $valfecha2 = $fecha2;
            }elseif(!($fecha1 == null || empty($fecha1)) && ($fecha2 == null || empty($fecha2))){
                $valfecha1 = $fecha1;
                $valfecha2 = $fecha1;
            }elseif(($fecha1 == null || empty($fecha1)) && !($fecha2 == null || empty($fecha2))) {
                $valfecha1 = $fecha2;
                $valfecha2 = $fecha2;
            }else{
                $fecha1 = null;
                $fecha2 = null;
            }

            if($usuario >  0){
                $usuario_id = $usuario;
            }else{
                $usuario_id = 0;
            }
            $datos = $this->Reportes_model->get_ingresoreportes($valfecha1, $valfecha2, $usuario_id, $estado_id, $orden_por, $nombre_dir, $esteasociado);
            echo json_encode($datos);
        }   
        else
        {                 
            show_404();
        }
            
    }
    /* busca reportes de ingreso */
    function buscarlosingresosf()
    {
        if ($this->input->is_ajax_request()) {

            $fecha1    = $this->input->post('fecha1');   
            $fecha2    = $this->input->post('fecha2'); 
            $usuario   = $this->input->post('usuario_id'); 
            //$estado_id = $this->input->post('esteestado');
            $orden_por = $this->input->post('orden_por');
            $nombre_dir    = $this->input->post('nombre_dir');
            $esteasociado    = $this->input->post('esteasociado');
            $valfecha1 = "";
            $valfecha2 = "";
            $usuario_id = "";

            if(!($fecha1 == null || empty($fecha1)) && !($fecha2 == null || empty($fecha2))){
                $valfecha1 = $fecha1;
                $valfecha2 = $fecha2;
            }elseif(!($fecha1 == null || empty($fecha1)) && ($fecha2 == null || empty($fecha2))){
                $valfecha1 = $fecha1;
                $valfecha2 = $fecha1;
            }elseif(($fecha1 == null || empty($fecha1)) && !($fecha2 == null || empty($fecha2))) {
                $valfecha1 = $fecha2;
                $valfecha2 = $fecha2;
            }else{
                $fecha1 = null;
                $fecha2 = null;
            }

            if($usuario >  0){
                $usuario_id = $usuario;
            }else{
                $usuario_id = 0;
            }
            $datos = $this->Reportes_model->get_ingresoreportesf($valfecha1, $valfecha2, $usuario_id, $orden_por, $nombre_dir, $esteasociado);
            echo json_encode($datos);
        }   
        else
        {                 
            show_404();
        }
            
    }
    /* busca reportes de ingreso */
    function buscarlosmovimientos()
    {
        if ($this->input->is_ajax_request()) {

            $fecha1 = $this->input->post('fecha1');   
            $fecha2 = $this->input->post('fecha2'); 
            $usuario = $this->input->post('usuario_id'); 
            $estado_id = $this->input->post('esteestado');
            //$orden_por = $this->input->post('orden_por');
            $valfecha1 = "";
            $valfecha2 = "";
            $usuario_id = "";

            if(!($fecha1 == null || empty($fecha1)) && !($fecha2 == null || empty($fecha2))){
                $valfecha1 = $fecha1;
                $valfecha2 = $fecha2;
            }elseif(!($fecha1 == null || empty($fecha1)) && ($fecha2 == null || empty($fecha2))){
                $valfecha1 = $fecha1;
                $valfecha2 = $fecha1;
            }elseif(($fecha1 == null || empty($fecha1)) && !($fecha2 == null || empty($fecha2))) {
                $valfecha1 = $fecha2;
                $valfecha2 = $fecha2;
            }else{
                $fecha1 = null;
                $fecha2 = null;
            }

            if($usuario >  0){
                $usuario_id = $usuario;
            }else{
                $usuario_id = 0;
            }
            $datos = $this->Reportes_model->get_reportemovimiento($valfecha1, $valfecha2, $usuario_id, $estado_id);
            echo json_encode($datos);
        }   
        else
        {                 
            show_404();
        }
    }
    function egreso()
    {
        $data['nombre_usu'] = $this->session_data['nombre_usu'];
        $this->load->model('Usuario_model');
        $data['all_usuario'] = $this->Usuario_model->get_all_usuario_activo();
        $this->load->model('Categoria_egreso_model');
        $data['all_categoria'] = $this->Categoria_egreso_model->get_all_categoria_egreso();
        $this->load->model('Empresa_model');
        $data['all_empresa'] = $this->Empresa_model->get_all_empresa();
        $data['_view'] = 'reportes/egreso';
        $this->load->view('layouts/main',$data);
    }
    /* buscar los egresos  */
    function buscarlosegresos()
    {
        if ($this->input->is_ajax_request()) {

            $fecha1    = $this->input->post('fecha1');   
            $fecha2    = $this->input->post('fecha2'); 
            $usuario   = $this->input->post('usuario_id'); 
            $nom_categr= $this->input->post('nom_categr');
            $orden_por = $this->input->post('orden_por');
            $valfecha1 = "";
            $valfecha2 = "";
            $usuario_id = "";

            if(!($fecha1 == null || empty($fecha1)) && !($fecha2 == null || empty($fecha2))){
                $valfecha1 = $fecha1;
                $valfecha2 = $fecha2;
            }elseif(!($fecha1 == null || empty($fecha1)) && ($fecha2 == null || empty($fecha2))){
                $valfecha1 = $fecha1;
                $valfecha2 = $fecha1;
            }elseif(($fecha1 == null || empty($fecha1)) && !($fecha2 == null || empty($fecha2))) {
                $valfecha1 = $fecha2;
                $valfecha2 = $fecha2;
            }else{
                $fecha1 = null;
                $fecha2 = null;
            }

            if($usuario >  0){
                $usuario_id = $usuario;
            }else{
                $usuario_id = 0;
            }
            $datos = $this->Reportes_model->get_egresoreportes($valfecha1, $valfecha2, $usuario_id, $nom_categr, $orden_por);
            echo json_encode($datos);
        }   
        else
        {                 
            show_404();
        }
    }
    function ingreso()
    {
        $data['nombre_usu'] = $this->session_data['nombre_usu'];
        $this->load->model('Usuario_model');
        $data['all_usuario'] = $this->Usuario_model->get_all_usuario_activo();
        $this->load->model('Categoria_ingreso_model');
        $data['all_categoria'] = $this->Categoria_ingreso_model->get_all_categoria_ingreso();
        $this->load->model('Empresa_model');
        $data['all_empresa'] = $this->Empresa_model->get_all_empresa();
        $data['_view'] = 'reportes/ingreso';
        $this->load->view('layouts/main',$data);
    }

    function buscaringresos()
    {
        if ($this->input->is_ajax_request()) {

            $fecha1    = $this->input->post('fecha1');   
            $fecha2    = $this->input->post('fecha2'); 
            $usuario   = $this->input->post('usuario_id'); 
            $nom_cating= $this->input->post('nom_cating');
            $orden_por = $this->input->post('orden_por');
            $valfecha1 = "";
            $valfecha2 = "";
            $usuario_id = "";

            if(!($fecha1 == null || empty($fecha1)) && !($fecha2 == null || empty($fecha2))){
                $valfecha1 = $fecha1;
                $valfecha2 = $fecha2;
            }elseif(!($fecha1 == null || empty($fecha1)) && ($fecha2 == null || empty($fecha2))){
                $valfecha1 = $fecha1;
                $valfecha2 = $fecha1;
            }elseif(($fecha1 == null || empty($fecha1)) && !($fecha2 == null || empty($fecha2))) {
                $valfecha1 = $fecha2;
                $valfecha2 = $fecha2;
            }else{
                $fecha1 = null;
                $fecha2 = null;
            }

            if($usuario >  0){
                $usuario_id = $usuario;
            }else{
                $usuario_id = 0;
            }
            $datos = $this->Reportes_model->ingreso_reporte($valfecha1, $valfecha2, $usuario_id, $nom_cating, $orden_por);
            echo json_encode($datos);
        }   
        else
        {                 
            show_404();
        }
    }
    function mensuales()
    {
        $data['nombre_usu'] = $this->session_data['nombre_usu'];
        /*$this->load->model('Usuario_model');
        $data['all_usuario'] = $this->Usuario_model->get_all_usuario_activo();
        $this->load->model('Estado_model');
        $data['all_estado'] = $this->Estado_model->get_all_estados();*/
        $this->load->model('Empresa_model');
        $data['all_empresa'] = $this->Empresa_model->get_all_empresa();
        /*$this->load->model('Direccion_orden_model');
        $data['all_direccion'] = $this->Direccion_orden_model->get_all_direccion_alfab();*/
        $data['_view'] = 'reportes/mensuales';
        $this->load->view('layouts/main',$data);
    }
    function buscarpormes()
    {
        if ($this->input->is_ajax_request()) {
            $este_mes    = $this->input->post('este_mes');   
            $datos = $this->Reportes_model->reporte_mes($este_mes);
            echo json_encode($datos);
        }   
        else
        {                 
            show_404();
        }
    }
    /* reporte de usuarios(asociados) deudores */
    function deudores()
    {
        $data['nombre_usu'] = $this->session_data['nombre_usu'];
        $this->load->model('Empresa_model');
        $data['all_empresa'] = $this->Empresa_model->get_all_empresa();
        $data['all_deudores'] = $this->Reportes_model->reporte_deudores();
        $data['_view'] = 'reportes/deudores';
        $this->load->view('layouts/main',$data);
    }
    /* reporte de usuarios(asociados) en corte */
    function encorte()
    {
        $data['nombre_usu'] = $this->session_data['nombre_usu'];
        $this->load->model('Empresa_model');
        $data['all_empresa'] = $this->Empresa_model->get_all_empresa();
        $data['all_encorte'] = $this->Reportes_model->reporte_encorte();
        $data['_view'] = 'reportes/encorte';
        $this->load->view('layouts/main',$data);
    }
}


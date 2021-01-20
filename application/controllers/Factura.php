<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Factura extends CI_Controller{
    private $session_data = "";
    function __construct()
    {
        parent::__construct();
        $this->load->model('Factura_model');
        $this->load->model('Dosificacion_model');
        $this->load->model('Empresa_model');
        $this->load->helper('numeros');
        $this->load->library('ControlCode'); 
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
     * Listing of factura
     */
    function index()
    {
        if($this->acceso(404)){
            $data['factura'] = $this->Factura_model->get_all_facturacancelada();

            $data['_view'] = 'factura/index';
            $this->load->view('layouts/main',$data);
        }
    }

    function cobranza()
    {
        if($this->acceso(404)){
            $data['_view'] = 'factura/cobranza';
            $this->load->view('layouts/main',$data);
        }
    }



    /*
     * Adding a new factura
     */
    function add()
    {
        if($this->acceso(404)){
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
                    'tipo_fact' => $this->input->post('tipo_fact'),
                    'estado_fact' => $this->input->post('estado_fact'),
                    'id_usu' => $this->input->post('id_usu'),
                    'id_lec' => $this->input->post('id_lec'),
                    'num_fact' => $this->input->post('num_fact'),
                    'nit_fact' => $this->input->post('nit_fact'),
                    'razon_fact' => $this->input->post('razon_fact'),
                    'orden_fact' => $this->input->post('orden_fact'),
                    'nitemisor_fact' => $this->input->post('nitemisor_fact'),
                    'llave_fact' => $this->input->post('llave_fact'),
                    'fecha_fact' => $this->input->post('fecha_fact'),
                    'hora_fact' => $this->input->post('hora_fact'),
                    'fechaemision_fact' => $this->input->post('fechaemision_fact'),
                    'montoparc_fact' => $this->input->post('montoparc_fact'),
                    'desc_fact' => $this->input->post('desc_fact'),
                    'cadenaqr_fact' => $this->input->post('cadenaqr_fact'),
                    'codcontrol_fact' => $this->input->post('codcontrol_fact'),
                    'literal_fact' => $this->input->post('literal_fact'),
                    'fechahora_fact' => $this->input->post('fechahora_fact'),
                    'fechavenc_fact' => $this->input->post('fechavenc_fact'),
                    'totalconsumo_fact' => $this->input->post('totalconsumo_fact'),
                    'totalaportes_fact' => $this->input->post('totalaportes_fact'),
                    'totalrecargos_fact' => $this->input->post('totalrecargos_fact'),
                    'montototal_fact' => $this->input->post('montototal_fact'),
                    'exento_fact' => $this->input->post('exento_fact'),
                    'ice_fact' => $this->input->post('ice_fact'),
                    'id_ing' => $this->input->post('id_ing'),
                );

                $factura_id = $this->Factura_model->add_factura($params);
                redirect('factura/index');
            }
            else
            {
                $this->load->model('Usuario_model');
                $data['all_usuario'] = $this->Usuario_model->get_all_usuario();

                $data['_view'] = 'factura/add';
                $this->load->view('layouts/main',$data);
            }
        }
    }

    /*
     * Editing a factura
     */
    function edit($id_fact)
    {
        if($this->acceso(404)){
            // check if the factura exists before trying to edit it
            $data['factura'] = $this->Factura_model->get_factura($id_fact);

            if(isset($data['factura']['id_fact']))
            {
                if(isset($_POST) && count($_POST) > 0)     
                {   
                    $params = array(
                        'tipo_fact' => $this->input->post('tipo_fact'),
                        'estado_fact' => $this->input->post('estado_fact'),
                        'id_usu' => $this->input->post('id_usu'),
                        'id_lec' => $this->input->post('id_lec'),
                        'num_fact' => $this->input->post('num_fact'),
                        'nit_fact' => $this->input->post('nit_fact'),
                        'razon_fact' => $this->input->post('razon_fact'),
                        'orden_fact' => $this->input->post('orden_fact'),
                        'nitemisor_fact' => $this->input->post('nitemisor_fact'),
                        'llave_fact' => $this->input->post('llave_fact'),
                        'fecha_fact' => $this->input->post('fecha_fact'),
                        'hora_fact' => $this->input->post('hora_fact'),
                        'fechaemision_fact' => $this->input->post('fechaemision_fact'),
                        'montoparc_fact' => $this->input->post('montoparc_fact'),
                        'desc_fact' => $this->input->post('desc_fact'),
                        'cadenaqr_fact' => $this->input->post('cadenaqr_fact'),
                        'codcontrol_fact' => $this->input->post('codcontrol_fact'),
                        'literal_fact' => $this->input->post('literal_fact'),
                        'fechahora_fact' => $this->input->post('fechahora_fact'),
                        'fechavenc_fact' => $this->input->post('fechavenc_fact'),
                        'totalconsumo_fact' => $this->input->post('totalconsumo_fact'),
                        'totalaportes_fact' => $this->input->post('totalaportes_fact'),
                        'totalrecargos_fact' => $this->input->post('totalrecargos_fact'),
                        'montototal_fact' => $this->input->post('montototal_fact'),
                        'exento_fact' => $this->input->post('exento_fact'),
                        'ice_fact' => $this->input->post('ice_fact'),
                        'id_ing' => $this->input->post('id_ing'),
                    );

                    $this->Factura_model->update_factura($id_fact,$params);            
                    redirect('factura/index');
                }
                else
                {
                    $this->load->model('Usuario_model');
                    $data['all_usuario'] = $this->Usuario_model->get_all_usuario();

                    $data['_view'] = 'factura/edit';
                    $this->load->view('layouts/main',$data);
                }
            }
            else
                show_error('The factura you are trying to edit does not exist.');
        }
    } 

    /*
     * Deleting factura
     */
    function remove($id_fact)
    {
        $factura = $this->Factura_model->get_factura($id_fact);

        // check if the factura exists before trying to delete it
        if(isset($factura['id_fact']))
        {
            $this->Factura_model->delete_factura($id_fact);
            redirect('factura/index');
        }
        else
            show_error('The factura you are trying to delete does not exist.');
    }

    function buscarasociado()
    {
      
        //**************** inicio contenido ***************
        
                if ($this->input->is_ajax_request()) {       
                    
                    $ci = $this->input->post('ci');                    
                    $datos = $this->Factura_model->buscar_asociado($ci);
                    echo json_encode($datos);                        

                }
                else
                {                 
                            show_404();
                }  
                
        //**************** fin contenido ***************
        
                
               
    }
    function buscar_idasociado()
    {
      
        //**************** inicio contenido ***************
        
                if ($this->input->is_ajax_request()) {       
                    
                    $id = $this->input->post('asociado');                    
                    $datos = $this->Factura_model->buscar_id_asociado($id);
                    echo json_encode($datos);                        

                }
                else
                {                 
                            show_404();
                }  
                
        //**************** fin contenido ***************
        
                
               
    }

    function buscar_asociados()
    {
      
        //**************** inicio contenido ***************
        
                if ($this->input->is_ajax_request()) {       
                    
                    $nombre = $this->input->post('nombre');                    
                    $apellido = $this->input->post('apellido');                    
                    $datos = $this->Factura_model->busqueda_asociados($nombre,$apellido);
                    echo json_encode($datos);                        

                }
                else
                {                 
                            show_404();
                }  
                
        //**************** fin contenido ***************
    
               
    }

    function buscar_pendientes()
    {
        $asociado = $this->input->post('asociado');
        $estado = $this->input->post('estado');
        $datos = $this->Factura_model->get_pendiente_factura($asociado,$estado);
        echo json_encode($datos);  
        
    }

    function buscar_detalle()
    {
        $factura = $this->input->post('factura');
        $datos = $this->Factura_model->get_pendiente_detalle($factura);
        echo json_encode($datos);  
        
    }

    function anular()
    {
        $factura = $this->input->post('factura_id');
        $esta_factura = $this->Factura_model->get_factura($factura);
        if ($esta_factura['tipo_fact']==1) {
        $sql="INSERT INTO factura(id_lec,num_fact,nit_fact,razon_fact,orden_fact,nitemisor_fact,llave_fact,fecha_fact,hora_fact,fechaemision_fact,montoparc_fact,desc_fact,montototal_fact,cadenaqr_fact,codcontrol_fact,literal_fact,fechahora_fact,tipo_fact,fechavenc_fact,estado_fact)
        (SELECT 0,num_fact,nit_fact,razon_fact,orden_fact,nitemisor_fact,'0',fecha_fact,hora_fact,fechaemision_fact,0,0,0,cadenaqr_fact,'0',literal_fact,fechahora_fact,tipo_fact,fechavenc_fact,'ANULADA'
        from factura 
        where id_fact=".$factura.")";
        $this->db->query($sql);
        $sql2="DELETE from detalle_factura where id_fact=".$factura." and tipo_detfact=2";
        $this->db->query($sql2);
        $sql3="UPDATE factura set estado_fact='PENDIENTE' ,num_fact=0, tipo_fact=0, desc_fact=0 where id_fact=".$factura." ";
        $this->db->query($sql3);
        $datos = true;
        }else{
        $sql="UPDATE factura set estado_fact='PENDIENTE', num_fact=0,tipo_fact=0,desc_fact=0 WHERE id_fact=".$factura;
        $this->db->query($sql);
        $datos = true;
        }
  
        echo json_encode($datos);  
        
    }

    function buscar_recibo()
    {
        $numero = $this->input->post('numero');
        $datos = "SELECT id_fact from factura where id_lec=".$numero." and estado_fact='CANCELADA' ";
        $respuesta = $this->db->query($datos)->row_array();
        if (isset($respuesta['id_fact'])) {
        echo json_encode($respuesta);  
           
        }else{
       show_404();
        }
        
        
    }

    function buscar_lectura()
    {
        $numero = $this->input->post('numero');
        $datos = "SELECT id_lec from lectura where id_lec=".$numero." ";
        $respuesta = $this->db->query($datos)->row_array();
        if (isset($respuesta['id_lec'])) {
        echo json_encode($respuesta);  
           
        }else{
       show_404();
        }
        
        
    }


    function buscar_recargos()
    {
        $lectura = $this->input->post('lectura');
        $datos = $this->Factura_model->get_recargo_detalle($lectura);
        echo json_encode($datos);  
        
    }

    function datos_factura()
    {
        $factura = $this->input->post('factura');
        $lectura = $this->input->post('lectura');
        $consumo = $this->Factura_model->get_consumo_factura($factura);
        $aporte = $this->Factura_model->get_aportes_factura($factura);
        $recargo = $this->Factura_model->get_recargos_factura($lectura);
        $data=array("consumo"=>$consumo['consumo'], "multa" =>$aporte['multas'], "recargo" =>$recargo['recargos']);
        echo json_encode($data);  
        
    } 

    function registrarfactura()
    {
        $consumo=$this->input->post('consumo');
        $total=$this->input->post('total');
        if($consumo >0 && $total>0){
            $session_data = $this->session->userdata('logged_in');
            $usuario_id = $session_data['id_usu'];
            $factura_id = $this->input->post('factura_id');
            $lectura_id = $this->input->post('lectura_id');
            $genera_factura = $this->input->post('generar_factura');  //aca debe venir el check generar
            $multar = $this->input->post('multar');
            $empresa = $this->Empresa_model->get_empresa(1);
            $dosificacion = $this->Dosificacion_model->get_dosificacion(1);
            $numfact_dosif = $dosificacion['numfact_dosif'];
            $numfact_dosif1 = $numfact_dosif+1;
            //$consumo=$this->input->post('consumo');
            $aportes=$this->input->post('aportes');
            $recargos1=$this->input->post('recargos');
            $total=$this->input->post('total');

            if ($multar=="true") { //agregar los recargos al detalle
                $recargos = $this->Factura_model->get_recargo_detalle($lectura_id);
                foreach ($recargos as $rec) {
                    $this->Factura_model->recargosadetalle($rec['id_param'],$factura_id);
                }

            }
            $total_credfiscal = 0;
            if ($genera_factura=="true") {
                //$datfactura = $this->Dosificacion_model->get_dosificacion($factura_id);
                        $tipo_fact=1;
                        //$estado_fact
                        //$id_usu
                        //$id_lec ya viene
                        //$num_fact 
                        $nit_fact = $this->input->post('nit_asoc');
                        $razon_fact = $this->input->post('razon_asoc');
                        $orden_fact = $dosificacion['numorden_dosif'];
                        $nitemisor_fact = $empresa['nit_emp'];
                        $llave_fact = $dosificacion['llave_dosif'];
                        $factura_leyenda1 = $dosificacion['dosificacion_leyenda1'];
                        $factura_leyenda2 = $dosificacion['dosificacion_leyenda2'];
                        $esexento = $this->input->post('esexento');
                        $total_credfiscal = ($total-$esexento);
                        //$fecha_fact
                        //$hora_fact
                        $fechaemision_fact = $dosificacion['fechalim_dosif'];
                        $fecha = date("Y-m-d");
                        //$montoparc_fact ya viene
                        //$desc_fact ya viene 0 
                        //$cadenaqr_fact = $nitemisor_fact, $numfact_dosif1, $orden_fact, date('dd/mm/yyyy'), $toal(letras), $total, $CodigodeControl  ,  $nit_asoc , $exento , $ice ,$exento , 0; 
                        /*',cadenaqr_fact='+quotedStr(FormEmpresa.ADOPrime.fieldbyname('nit_emp').AsString+'|'+
                  inttoStr(numerofact)+'|'+formDosificacion.ADODosif.fieldbyname('numorden_dosif').AsString+'|'+
                  formatdatetime('dd/mm/yyyy',date)+'|'+ETotal_Bs.Text+'|'+totalfactura+'|'+
                  FormCodigoControl.CodigodeControl(inttoStr(numerofact),nit_asoc1.Text,formatdatetime('yyyymmdd',date),formLogin.sincoma(totalfactura),formDosificacion.ADODosif.fieldbyname('llave_dosif').AsString,formDosificacion.ADODosif.fieldbyname('numorden_dosif').AsString)+'|'+
                  nit_asoc1.Text+'|'+exento+'|'+ice+'|'+exento+'|0')+*/

                        $codcontrol_fact = $this->codigo_control($llave_fact,$orden_fact,$numfact_dosif1,$nit_fact,$fecha,$total_credfiscal);
                        //',codcontrol_fact='+quotedStr(FormCodigoControl.CodigodeControl(inttoStr(numerofact),Trim(nit_asoc1.Text),formatdatetime('yyyymmdd',date),FormLogin.sinComa(totalfactura),formDosificacion.ADODosif.fieldbyname('llave_dosif').AsString,formDosificacion.ADODosif.fieldbyname('numorden_dosif').AsString))+
                        //$literal_fact no necesary
                        //$fechahora_fact ya viene
                        //$fechavenc_fact ya viene
                        //$totalconsumo_fact
                        //$totalaportes_fact
                        //$totalrecargos_fact
                        //$montototal_fact
                        //$exento_fact = 0;
                        //$ice_fact = 0;
                        //$id_ing nada esta null ojo
                $this->Factura_model->generar_factura($factura_id,$numfact_dosif1,$consumo,$aportes,$recargos1,$total,$usuario_id,$tipo_fact,$nit_fact,$razon_fact,$orden_fact,$nitemisor_fact,$llave_fact,$fechaemision_fact,$codcontrol_fact, $factura_leyenda1, $factura_leyenda2);
                //aqui si hay q generar la factura...
            } else {
                $this->Factura_model->cancelar_factura($factura_id,$numfact_dosif1,$consumo,$aportes,$recargos1,$total,$usuario_id);

            }
                $this->Factura_model->actualizar_dosificacion($numfact_dosif1);
                $datos = $this->Factura_model->get_datos_factura($factura_id);
                echo json_encode($datos);
        }else{
            echo json_encode(null);
        }
    }

    function codigo_control($dosificacion_llave, $dosificacion_autorizacion, $dosificacion_numfact, $nit,$fecha_trans, $monto)
    {

        //include 'ControlCode.php';

        $code = $this->controlcode->generate($dosificacion_autorizacion,//Numero de autorizacion
                                                   $dosificacion_numfact,//Numero de factura
                                                   $nit,//Número de Identificación Tributaria o Carnet de Identidad
                                                   str_replace('-','',$fecha_trans),//fecha de transaccion de la forma AAAAMMDD
                                                   $monto,//Monto de la transacción
                                                   $dosificacion_llave//Llave de dosificación
                        );        
         return $code;
    }  

    function imprimir($factura_id){
      $num = $this->Factura_model->get_datos_factura($factura_id);
      $este = $num[0]['tipo_fact'];
        if ($este == 0) {
           redirect('factura/imprimir_recibo/'.$factura_id);
        }else{
           redirect('factura/imprimir_factura/0/'.$factura_id);
     
    }

    }

    function imprimir_recibo($factura_id){

         $this->load->model('Empresa_model');
         $data['empresa'] = $this->Empresa_model->get_empresa(1);
         $data['factura'] = $this->Factura_model->get_factura_completa($factura_id);
         $data['detalle_factura'] = $this->Factura_model->get_pendiente_detalle($factura_id); 
         $data['_view'] = 'factura/recibo';
         $this->load->view('layouts/main',$data);
     }

     function imprimir_factura($tipo, $factura_id){
         
         $session_data = $this->session->userdata('logged_in');
         $usuario_id = $session_data['id_usu'];
         $this->load->model('Empresa_model');
         $data['empresa'] = $this->Empresa_model->get_empresa(1);
         $data['factura'] = $this->Factura_model->get_factura_completa($factura_id);
         $data['tipo'] = $tipo;
         $detalle_factura = $this->Factura_model->get_pendiente_detalle($factura_id);
         $totalexento = 0;
         foreach ($detalle_factura as $detalle) {
             if($detalle["exento_detfact"] == "SI"){
                 $totalexento += $detalle['total_detfact']; 
             }
         }
         $data['detalle_factura'] = $detalle_factura;
         $factura = $this->Factura_model->get_factura($factura_id);

        $nit_emisor    = $factura['nitemisor_fact'];
        $num_fact      = $factura['num_fact'];
        $autorizacion  = $factura['orden_fact'];
        $fecha_factura = $factura['fecha_fact'];
        $total         = $factura['montototal_fact'];
        $codcontrol    = $factura['codcontrol_fact'];
        $nit           = $factura['nit_fact'];
         $cadenaQR = $nit_emisor.'|'.$num_fact.'|'.$autorizacion.'|'.$fecha_factura.'|'.($total-$totalexento).'|'.($total-$totalexento).'|'.$codcontrol.'|'.$nit.'|0|0|0|0';
               
        $this->load->helper('numeros_helper'); // Helper para convertir numeros a letras
        //Generador de Codigo QR
                //cargamos la librería  
         $this->load->library('ciqrcode');
                  
         //hacemos configuraciones
         $params['data'] = $cadenaQR;//$this->random(30);
         $params['level'] = 'H';
         $params['size'] = 5;
         //decimos el directorio a guardar el codigo qr, en este 
         //caso una carpeta en la raíz llamada qr_code
         $params['savename'] = FCPATH.'resources/images/qrcode'.$usuario_id.'.png'; //base_url('resources/images/qrcode.png'); //FCPATH.'resourcces\images\qrcode.png'; 
         //generamos el código qr
         $this->ciqrcode->generate($params); 
         //echo '<img src="'.base_url().'resources/images/qrcode.png" />';
        //fin generador de codigo QR
         
        
        $data['codigoqr'] = base_url('resources/images/qrcode'.$usuario_id.'.png');         
         $data['_view'] = 'factura/factura';
         $this->load->view('layouts/main',$data);
     }

    function ultima(){

         $dato = $this->Factura_model->get_factura_ultima();
         redirect('factura/imprimir/'.$dato['id_fact']);
   
     }

     function total_pendiente()
    {
        $asociado = $this->input->post('asociado');
        $consumo = $this->Factura_model->get_consumo_total($asociado);
        $aporte = $this->Factura_model->get_aportes_total($asociado);
        $recargo = $this->Factura_model->get_recargos_total($asociado);
        $suma = $consumo['total_consumo']+$aporte['total_multas']+$recargo['total_recargos'];
        echo json_encode($suma);  
        
    }
    /* manda a imprimir una copia de factura */
    function copia($factura_id){
      $session_data = $this->session->userdata('logged_in');
         $usuario_id = $session_data['id_usu'];
         $this->load->model('Empresa_model');
         $data['empresa'] = $this->Empresa_model->get_empresa(1);
         $data['factura'] = $this->Factura_model->get_factura_completa($factura_id);
         $detalle_factura = $this->Factura_model->get_pendiente_detalle($factura_id);
         $totalexento = 0;
         foreach ($detalle_factura as $detalle) {
             if($detalle["exento_detfact"] == "SI"){
                 $totalexento += $detalle['total_detfact']; 
             }
         }
         
         $data['detalle_factura'] = $detalle_factura;
         $factura = $this->Factura_model->get_factura($factura_id);

        $nit_emisor    = $factura['nitemisor_fact'];
        $num_fact      = $factura['num_fact'];
        $autorizacion  = $factura['orden_fact'];
        $fecha_factura = $factura['fecha_fact'];
        $total         = $factura['montototal_fact'];
        $codcontrol    = $factura['codcontrol_fact'];
        $nit           = $factura['nit_fact'];
         $cadenaQR = $nit_emisor.'|'.$num_fact.'|'.$autorizacion.'|'.$fecha_factura.'|'.($total-$totalexento).'|'.($total-$totalexento).'|'.$codcontrol.'|'.$nit.'|0|0|0|0';
               
        $this->load->helper('numeros_helper'); // Helper para convertir numeros a letras
        //Generador de Codigo QR
                //cargamos la librería  
         $this->load->library('ciqrcode');
                  
         //hacemos configuraciones
         $params['data'] = $cadenaQR;//$this->random(30);
         $params['level'] = 'H';
         $params['size'] = 5;
         //decimos el directorio a guardar el codigo qr, en este 
         //caso una carpeta en la raíz llamada qr_code
         $params['savename'] = FCPATH.'resources/images/qrcode'.$usuario_id.'.png'; //base_url('resources/images/qrcode.png'); //FCPATH.'resourcces\images\qrcode.png'; 
         //generamos el código qr
         $this->ciqrcode->generate($params); 
         //echo '<img src="'.base_url().'resources/images/qrcode.png" />';
        //fin generador de codigo QR
         
        
        $data['codigoqr'] = base_url('resources/images/qrcode'.$usuario_id.'.png');         
         $data['_view'] = 'factura/copia';
         $this->load->view('layouts/main',$data);
    }
    
}

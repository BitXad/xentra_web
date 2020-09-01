<?php

/*
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */

class Lectura extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Lectura_model');
        $this->load->model('Asociado_model');
        $this->load->model('Mes_model');
        $this->load->model('Empresa_model');
        if ($this->session->userdata('logged_in')) {
            $this->session_data = $this->session->userdata('logged_in');
        }else {
            redirect('', 'refresh');
        }
    }

    /*
     * Listing of lectura
     */

    function index() {
        $data['lectura'] = $this->Lectura_model->get_all_lectura();

        $data['_view'] = 'lectura/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Listing of lectura
     */

    function lecturas() {
//        $data['asociados'] = $this->Asociado_model->get_all_asociado();
        $data['lectura'] = $this->Lectura_model->get_all_lectura();
        $data['meses'] = $this->Mes_model->get_all_mes();
        $data['zonas'] = $this->Lectura_model->get_all_zonas();
        $data['direcciones'] = $this->Lectura_model->get_all_direcciones();

        $data['_view'] = 'lectura/lecturas';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new lectura
     */

    function add() {
        if (isset($_POST) && count($_POST) > 0) {
            $params = array(
                'id_usu' => $this->input->post('id_usu'),
                'id_asoc' => $this->input->post('id_asoc'),
                'mes_lec' => $this->input->post('mes_lec'),
                'gestion_lec' => $this->input->post('gestion_lec'),
                'anterior_lec' => $this->input->post('anterior_lec'),
                'actual_lec' => $this->input->post('actual_lec'),
                'fechaant_lec' => $this->input->post('fechaant_lec'),
                'consumo_lec' => $this->input->post('consumo_lec'),
                'fecha_lec' => $this->input->post('fecha_lec'),
                'hora_lec' => $this->input->post('hora_lec'),
                'totalcons_lec' => $this->input->post('totalcons_lec'),
                'fechahora_lec' => $this->input->post('fechahora_lec'),
                'monto_lec' => $this->input->post('monto_lec'),
                'estado_lec' => $this->input->post('estado_lec'),
                'tipo_asoc' => $this->input->post('tipo_asoc'),
                'servicios_asoc' => $this->input->post('servicios_asoc'),
                'totalmultas_' => $this->input->post('totalmultas_'),
                'cantfact_lec' => $this->input->post('cantfact_lec'),
                'montofact_lec' => $this->input->post('montofact_lec'),
            );

            $lectura_id = $this->Lectura_model->add_lectura($params);
            redirect('lectura/index');
        } else {
            $this->load->model('Usuario_model');
            $data['all_usuario'] = $this->Usuario_model->get_all_usuario();

            $this->load->model('Asociado_model');
            $data['all_asociado'] = $this->Asociado_model->get_all_asociado();

            $data['_view'] = 'lectura/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a lectura
     */

    function edit($id_lec) {
        // check if the lectura exists before trying to edit it
        $data['lectura'] = $this->Lectura_model->get_lectura($id_lec);

        if (isset($data['lectura']['id_lec'])) {
            if (isset($_POST) && count($_POST) > 0) {
                $params = array(
                    'id_usu' => $this->input->post('id_usu'),
                    'id_asoc' => $this->input->post('id_asoc'),
                    'mes_lec' => $this->input->post('mes_lec'),
                    'gestion_lec' => $this->input->post('gestion_lec'),
                    'anterior_lec' => $this->input->post('anterior_lec'),
                    'actual_lec' => $this->input->post('actual_lec'),
                    'fechaant_lec' => $this->input->post('fechaant_lec'),
                    'consumo_lec' => $this->input->post('consumo_lec'),
                    'fecha_lec' => $this->input->post('fecha_lec'),
                    'hora_lec' => $this->input->post('hora_lec'),
                    'totalcons_lec' => $this->input->post('totalcons_lec'),
                    'fechahora_lec' => $this->input->post('fechahora_lec'),
                    'monto_lec' => $this->input->post('monto_lec'),
                    'estado_lec' => $this->input->post('estado_lec'),
                    'tipo_asoc' => $this->input->post('tipo_asoc'),
                    'servicios_asoc' => $this->input->post('servicios_asoc'),
                    'totalmultas_' => $this->input->post('totalmultas_'),
                    'cantfact_lec' => $this->input->post('cantfact_lec'),
                    'montofact_lec' => $this->input->post('montofact_lec'),
                );

                $this->Lectura_model->update_lectura($id_lec, $params);
                redirect('lectura/index');
            } else {
                $this->load->model('Usuario_model');
                $data['all_usuario'] = $this->Usuario_model->get_all_usuario();

                $this->load->model('Asociado_model');
                $data['all_asociado'] = $this->Asociado_model->get_all_asociado();

                $data['_view'] = 'lectura/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The lectura you are trying to edit does not exist.');
    }

    /*
     * Deleting lectura
     */

    function remove($id_lec) {
        $lectura = $this->Lectura_model->get_lectura($id_lec);

        // check if the lectura exists before trying to delete it
        if (isset($lectura['id_lec'])) {
            $this->Lectura_model->delete_lectura($id_lec);
            redirect('lectura/index');
        } else
            show_error('The lectura you are trying to delete does not exist.');
    }

    function buscar_asociados() {

        $sql = $this->input->post("sql");
        /// echo $sql;
        $resultado = $this->Lectura_model->consultar($sql);
        echo json_encode($resultado);
    }

    function historial($id_asoc) {

        //historial de lecturas
        $sql = "select * from lectura l, factura f " .
                "where l.id_lec = f.id_lec and f.estado_fact='PENDIENTE'  and " .
                "l.id_asoc=" . $id_asoc;

        $data['facturas_pendientes'] = $this->Lectura_model->consultar($sql);

        //historial de facturas
        $sql = "select * from lectura where id_asoc= " . $id_asoc . " order by fecha_lec desc";
        $data['lecturas_anteriores'] = $this->Lectura_model->consultar($sql);

        //historial de facturas
        $sql = "select * from asociado where id_asoc=" . $id_asoc;
        $data['asociado'] = $this->Lectura_model->consultar($sql);

        $data['_view'] = 'lectura/historial';
        $this->load->view('layouts/main', $data);
    }

    function mostrar_multas() {

        $mes = $this->input->post("mes");
        $gestion = $this->input->post("gestion");
        $asociado = $this->input->post("asociado"); //id_asoc
        //MOSTRAR MULTAS/APORTES
        $sql = "(select 'multa',motivo_multa as motivo,detalle_multa as detalle,monto_multa as monto,mes_multa as mes,gestion_multa as gestion,tipo_multa as tipo,exento_multa as exento, ice_multa as ice " .
                "from multa " .
                "where estado_multa = 'ACTIVO' and " .
                "(mes_multa = '" . $mes . "' and gestion_multa = '" . $gestion . "' and tipo_multa= 'GENERAL') or " .
                "(mes_multa='" . $mes . "' and gestion_multa = '" . $gestion . "' and id_asoc=" . $asociado . ")) union " .
                "(select 'APORTE',motivo_ap as motivo,detalle_ap as detalle,monto_ap as monto,mes_ap as mes,gestion_ap as gestion,tipo_ap as tipo, exento_ap as exento, ice_ap as ice from aporte " .
                "where " .
                "tipo_ap = 'PERMANENTE' and estado_ap = 'ACTIVO' or " .
                "(mes_ap = '" . $mes . "' and gestion_ap = '" . $gestion . "' and tipo_ap = 'PARCIAL' and estado_ap = 'ACTIVO'))";

        $result = $this->Lectura_model->consultar($sql);

        echo json_encode($result);
    }

    function facturas_adeudadas() {
//        
//        $mes = $this->input->post("mes");
//        $gestion = $this->input->post("gestion");
        $asociado = $this->input->post("asociado"); //id_asoc

        $sql = "select if(sum(f.montototal_fact)>0,sum(f.montototal_fact),0) as sumafact, if(count(*)>0,count(*),0) as cantfact " .
                "from factura f, lectura l where f.estado_fact = 'PENDIENTE' and f.id_lec=l.id_lec and l.id_asoc = " . $asociado;

        $result = $this->Lectura_model->consultar($sql);

        echo json_encode($result);
    }

    function lecturas_anteriores() {
//        
//        $mes = $this->input->post("mes");
//        $gestion = $this->input->post("gestion");
        $asociado = $this->input->post("asociado"); //id_asoc

        $sql = "select * from lectura where id_asoc=" . $asociado . " order by id_lec desc";

        $result = $this->Lectura_model->consultar($sql);

        echo json_encode($result);
    }

    function calcular_consumo() {
//        
//        $mes = $this->input->post("mes");
//        $gestion = $this->input->post("gestion");
        $consumo = $this->input->post("consumo"); //id_asoc
        $asociado = $this->input->post("asociado"); //id_asoc
        // Tarifa parametrizable       
//        $sql = "select * from  tarifa t where t.desde >= ".$consumo." and ".$consumo." <= t.hasta and ".
//                "t.tipo= (select a.tipo_asoc from asociado a where a.id_asoc=".$asociado+')';


        $sql = "select * from  tarifa t where ".$consumo." >= t.desde and " . $consumo . "<= t.hasta and " .
                "t.tipo = (select a.tipo_asoc from asociado a where a.id_asoc=" . $asociado . ")";

        $result = $this->Lectura_model->consultar($sql);

        echo json_encode($result);
    }

    function registrar_lectura() {

        //$id_usu = 1;
        $id_usu = $this->session_data['id_usu'];
        
        $id_asoc = $this->input->post("id_asoc");
        $mes_lec = "'" . $this->input->post("mes_lec") . "'";
        $gestion_lec = $this->input->post("gestion_lec");
        $anterior_lec = $this->input->post("anterior_lec");
        $actual_lec = $this->input->post("actual_lec");
        $fechaant_lec = "'" . $this->input->post("fechaant_lec") . "'";
        $consumo_lec = $this->input->post("consumo_lec");
        $fecha_lec = "'" . $this->input->post("fecha_lec") . "'";
        $hora_lec = "'" . $this->input->post("hora_lec") . "'";
        $totalcons_lec = $this->input->post("totalcons_lec");
        $monto_lec = $this->input->post("monto_lec");
        $estado_lec = "'" . $this->input->post("estado_lec") . "'";
        $tipo_asoc = "'" . $this->input->post("tipo_asoc") . "'";
        $servicios_asoc = "'" . $this->input->post("servicios_asoc") . "'";
        $cantfact_lec = $this->input->post("cantfact_lec");
        $montofact_lec = $this->input->post("montofact_lec");

        $nit_fact = "'" . $this->input->post("nit_fact") . "'";
        $razon_fact = "'" . $this->input->post("razon_fact") . "'";
        $fechavenc_fact = "'" . $this->input->post("fecha_vencimiento") . "'";
        $fechalectura_fact = "'" . $this->input->post("fecha_lectura") . "'";

        $consumo_agua_bs = $this->input->post("consumo_agua_bs");
        $consumo_alcantarillado_bs = $this->input->post("consumo_alcantarillado_bs");

        $sql ="insert into lectura(id_usu,id_asoc,mes_lec,gestion_lec,"
            ."anterior_lec,actual_lec,fechaant_lec,consumo_lec,fecha_lec,hora_lec,"
            ."totalcons_lec,monto_lec,estado_lec,tipo_asoc,servicios_asoc,"
            ."cantfact_lec,montofact_lec, consumoalcant_lec) values(".
            $id_usu.",".$id_asoc.",".$mes_lec.",".$gestion_lec.",".$anterior_lec.",".
            $actual_lec.",".$fechaant_lec.",".$consumo_lec.",".$fechalectura_fact.",".
            $hora_lec.",".$totalcons_lec.",".$monto_lec.",".$estado_lec.",".
            $tipo_asoc.",".$servicios_asoc.",".$cantfact_lec.",".$montofact_lec.",".$consumo_alcantarillado_bs.")";
        $result = $this->Lectura_model->ejecutar($sql);

        $sql = 'select * from lectura where id_asoc = ' . $id_asoc . ' order by fecha_lec desc';
        $result = $this->Lectura_model->consultar($sql);

        $id_lec = $result[0]["id_lec"];

//        $nit_fact = quotedStr(FormLecturas.ADOPrime.fieldbyname('nit_asoc').AsString);
//        razon_fact:=quotedStr(FormLecturas.ADOPrime.fieldbyname('razon_asoc').AsString);

        $montoparc_fact = $totalcons_lec; //Consumo_Bs1.Text;
        $desc_fact = '0';
        $montototal_fact = $montofact_lec; //Total_Bs1.Text;
        $literal_fact = "'-'";
        $estado_fact = "'PENDIENTE'";


        //$fechavenc_fact = (formLecturas.fechaLimite.date));
//        $tamanio = StrLen(Pchar(montototal_fact));
//        decimal:=montototal_fact[tamanio-1]+montototal_fact[tamanio];
//        literal_fact:=quotedStr(FormNumeroaLetras.NumeroToLetra(trunc(StrtoFloat(montototal_fact)))+ ' '+decimal+'/100');
        $coma = ",";
        $sql = "insert into factura(id_lec,nit_fact,razon_fact,montoparc_fact,desc_fact,montototal_fact,literal_fact,estado_fact,fechavenc_fact) values(" .
                $id_lec . $coma . $nit_fact . $coma . $razon_fact . $coma . $montoparc_fact . $coma . $desc_fact . $coma . $montototal_fact . $coma . $literal_fact . $coma . $estado_fact . $coma . $fechavenc_fact . ")";


        $this->Lectura_model->ejecutar($sql);

        //Obteniendo la ultima factura ingresada
        $sql = "select * from factura where id_lec = " . $id_lec . " order by id_fact desc";
        $facturas = $this->Lectura_model->consultar($sql);
        $id_fact = $facturas[0]["id_fact"];

        $totalcons_lec = $consumo_agua_bs;

        if ($totalcons_lec > 0) { //Significa que tiene consumo de agua
            //Se eliminara el registro del tipo de servicio
            ///descip_detfact:=servicios_asoc;
            $cant_detfact = "1";
            $descip_detfact = "'CONSUMO DE AGUA POTABLE'";
            $punit_detfact = $totalcons_lec;
            $desc_detfact = "0";
            $total_detfact = $totalcons_lec;
            $sql = "insert into detalle_factura(id_fact,cant_detfact,descip_detfact,punit_detfact,desc_detfact,total_detfact) values(" .
                    $id_fact . $coma . $cant_detfact . $coma . $descip_detfact . $coma . $punit_detfact . $coma . $desc_detfact . $coma . $total_detfact . ")";
            //FormLogin.Ejecutarx(SQL);
//            echo $sql;
            $this->Lectura_model->ejecutar($sql);
        }


        $alcantarillado = $consumo_alcantarillado_bs;

        // echo "total agua: ".$consumo_agua_bs." alcantarillado: ".$consumo_alcantarillado_bs;

        if ($alcantarillado > 0) { //Significa que tiene consumo de alcantarillado
            //Se eliminara el registro del tipo de servicio
            ///descip_detfact:=servicios_asoc;
            $cant_detfact = "1";
            $descip_detfact = "'SERVICIO DE ALCANTARILLADO'";
            $punit_detfact = $alcantarillado;
            $desc_detfact = "0";
            $total_detfact = $alcantarillado;
            $sql = "insert into detalle_factura(id_fact,cant_detfact,descip_detfact,punit_detfact,desc_detfact,total_detfact) values(" .
                    $id_fact . $coma . $cant_detfact . $coma . $descip_detfact . $coma . $punit_detfact . $coma . $desc_detfact . $coma . $total_detfact . ")";
//            echo $sql;
            $this->Lectura_model->ejecutar($sql);
        }

        $mes = $mes_lec;
        $gestion = $gestion_lec;
        $asociado = $id_asoc;
        //
        //MOSTRAR MULTAS/APORTES
        $sql = "(select 'multa',motivo_multa as motivo,detalle_multa as detalle,monto_multa as monto,mes_multa as mes,gestion_multa as gestion,tipo_multa as tipo,exento_multa as exento, ice_multa as ice " .
                "from multa " .
                "where estado_multa = 'ACTIVO' and " .
                "(mes_multa = " . $mes . " and gestion_multa = '" . $gestion . "' and tipo_multa= 'GENERAL') or " .
                "(mes_multa= " . $mes . " and gestion_multa = '" . $gestion . "' and id_asoc=" . $asociado . ")) union " .
                "(select 'APORTE',motivo_ap as motivo,detalle_ap as detalle,monto_ap as monto,mes_ap as mes,gestion_ap as gestion,tipo_ap as tipo, exento_ap as exento, ice_ap as ice from aporte " .
                "where " .
                "tipo_ap = 'PERMANENTE' and estado_ap = 'ACTIVO' or " .
                "(mes_ap = " . $mes . " and gestion_ap = '" . $gestion . "' and tipo_ap = 'PARCIAL' and estado_ap = 'ACTIVO'))";

        $multas = $this->Lectura_model->consultar($sql);

        foreach ($multas as $m) {

            $descip_detfact = "'" . $m["motivo"] . "'"; //quotedStr(ADOMultas.fieldbyname('motivo').AsString);
            $punit_detfact = $m["monto"];  //ADOMultas.fieldbyname('monto').AsString;
            $desc_detfact = "0";

            $total_detfact = $m["monto"]; //ADOMultas.fieldbyname('monto').AsString;
            $exento_detfact = "'" . $m["exento"] . "'"; //quotedStr(ADOMultas.fieldbyname('exento').AsString);
            $ice_detfact = "'" . $m["ice"] . "'"; //quotedStr(ADOMultas.fieldbyname('ice').AsString);
            //exento_detfact:=quotedStr('SI');
            //ice_detfact:=quotedStr('N');


            $sql = "insert into detalle_factura(id_fact,cant_detfact,descip_detfact,punit_detfact,desc_detfact,total_detfact,tipo_detfact,exento_detfact,ice_detfact) values(" .
                    $id_fact . $coma . $cant_detfact . $coma . $descip_detfact . $coma . $punit_detfact . $coma . $desc_detfact . $coma . $total_detfact . ",1," . $exento_detfact . $coma . $ice_detfact . ")";
            // echo $sql;
            $this->Lectura_model->ejecutar($sql);
        }
        if ($tipo_asoc == "'DOMESTICA'" || $tipo_asoc == "'DOMICILIARIA BASICA'" || $tipo_asoc == "'DOMICILIARIA ESPECIAL'"){
            if ($mes_lec == "'ABRIL'" || $mes_lec == "'MAYO'" || $mes_lec == "'JUNIO'") {
                $descu = 0 - (($facturas[0]["montototal_fact"]-1)/2);
                $sql1="INSERT INTO detalle_factura (id_fact, cant_detfact, descip_detfact, punit_detfact, desc_detfact, total_detfact, tipo_detfact, exento_detfact, ice_detfact) VALUES
                (".$facturas[0]['id_fact'].",  1, 'MENOS 50% DES. DOM.', ".$descu.", 0, ".$descu.", 0, 'NO', 'NO')";
                $this->db->query($sql1);
            }
            
        }

        echo json_encode($facturas);
    }

    function preaviso_boucher($lectura_id) {
        $this->load->model('Empresa_model');

        $data['lectura'] = $this->Lectura_model->get_lecturasocio($lectura_id);
        $data['empresa'] = $this->Empresa_model->get_empresa(1);

        $data['_view'] = 'lectura/preaviso_boucher';
        $this->load->view('layouts/main', $data);
    }

    function ultimo_preaviso($id_asoc) {
        $this->load->model('Empresa_model');

        $data['lectura'] = $this->Lectura_model->get_lecturasocio_asoc($id_asoc);
        $data['empresa'] = $this->Empresa_model->get_empresa(1);

        $data['_view'] = 'lectura/preaviso_boucher';
        $this->load->view('layouts/main', $data);
    }

    function mes_preaviso($id_asoc, $mes_lec, $gestion_lec) {
        $this->load->model('Empresa_model');

        $data['lectura'] = $this->Lectura_model->get_lecturasocio_mes($id_asoc, $mes_lec, $gestion_lec);
        $data['empresa'] = $this->Empresa_model->get_empresa(1);

        $data['_view'] = 'lectura/preaviso_boucher';
        $this->load->view('layouts/main', $data);
    }

    function anular_lectura() {

        $id_usu = 1;

        $id_lec = $this->input->post("id_lec");
        
        
        $sql = "select * from factura where id_lec = ".$id_lec;
        $result = $this->Lectura_model->consultar($sql);

        if (isset($result)){
            $id_fact = $result[0]["id_fact"];            
        

        $sql = "delete from lectura where id_lec = ".$id_lec;
        $this->Lectura_model->ejecutar($sql);
        
        $sql = "delete from factura where id_lec = ".$id_lec;
        $this->Lectura_model->ejecutar($sql);
        
        $sql = "delete from detalle_factura where id_fact = ".$id_fact;
        $this->Lectura_model->ejecutar($sql);
        
            echo json_encode(true);
        
        }
        else echo json_encode("Falla al eliminar la lectura");
    }


}

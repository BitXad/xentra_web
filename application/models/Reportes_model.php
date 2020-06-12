<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Reportes_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get multum by id_multa
     */
    function get_direcciones()
    {

        $sql = "SELECT a.direccion_asoc AS 'direccion', SUM(l.consumo_lec) as 'consumo' FROM asociado a
LEFT JOIN lectura l on a.`id_asoc`=l.`id_asoc`
GROUP BY direccion
ORDER BY direccion";
        $direcciones = $this->db->query($sql)->result_array();

        return $direcciones;
    }
    function reporte_mensual()
    {
        $multa = $this->db->query("
            SELECT
                *

            FROM
                `multa`

            WHERE
                1 = 1

            ORDER BY `id_multa` DESC
        ")->result_array();

        return $multa;
    }
    /* busca los ingresos */
    function get_ingresoreportes($fecha1, $fecha2, $usuario_id, $estado_id, $orden_por, $nombre_dir){
        if($usuario_id == 0){
          $cadusuario = "";
        }else{
            $cadusuario = " and f.id_usu = ".$usuario_id." ";
        }
        if($nombre_dir == "ning"){
          $cadirecion = "";
        }else{
            $cadirecion = " and a.direccion_asoc = '".$nombre_dir."' ";
        }
        if($estado_id == "no"){
            $cadestado = "";
        }else{
            $cadestado = " and f.estado_fact = '".$estado_id."' ";
        }
        if($orden_por == "nombre"){
            $cadorden = " order by a.nombres_asoc, a.apellidos_asoc ";
        }elseif($orden_por == "codigo"){
            $cadorden = " order by abs(a.codigo_asoc) ";
        }elseif($orden_por == "fact"){
            $cadorden = " order by f.id_fact ";
        }elseif ($orden_por == "monto"){
            $cadorden = " order by f.montototal_fact ";
        }else{
            $cadorden = "";
        }
        $ingresos = $this->db->query("
            select 
                    a.id_asoc, a.codigo_asoc, a.nombres_asoc, a.apellidos_asoc, a.razon_asoc,
                    l.mes_lec, l.gestion_lec, f.num_fact, l.id_lec, f.estado_fact,
                    l.actual_lec, anterior_lec, l.consumo_lec, l.totalcons_lec,
                    f.totalaportes_fact, f.totalrecargos_fact, f.montototal_fact
            from 
                asociado a,  lectura l,  factura f
            where
                a.id_asoc = l.id_asoc 
                and l.id_lec = f.id_lec 
                and date(l.fecha_lec) >='".$fecha1."'
                and date(l.fecha_lec) <='".$fecha2."' 
                ".$cadusuario."
                ".$cadirecion."
                ".$cadestado."
                ".$cadorden."
                
        ")->result_array();

        return $ingresos;

    }
    /* busca los ingresos */
    function get_ingresoreportesf($fecha1, $fecha2, $usuario_id, $estado_id, $orden_por, $nombre_dir){
        if($usuario_id == 0){
          $cadusuario = "";
        }else{
            $cadusuario = " and f.id_usu = ".$usuario_id." ";
        }
        if($nombre_dir == "ning"){
          $cadirecion = "";
        }else{
            $cadirecion = " and a.direccion_asoc = '".$nombre_dir."' ";
        }
        if($estado_id == "no"){
            $cadestado = "";
        }else{
            $cadestado = " and f.estado_fact = '".$estado_id."' ";
        }
        if($orden_por == "nombre"){
            $cadorden = " order by a.nombres_asoc, a.apellidos_asoc ";
        }elseif($orden_por == "codigo"){
            $cadorden = " order by abs(a.codigo_asoc) ";
        }elseif($orden_por == "fact"){
            $cadorden = " order by f.id_fact ";
        }elseif ($orden_por == "monto"){
            $cadorden = " order by f.montototal_fact ";
        }else{
            $cadorden = "";
        }
        $ingresos = $this->db->query("
            select 
                    a.id_asoc, a.codigo_asoc, a.nombres_asoc, a.apellidos_asoc, a.razon_asoc,
                    l.mes_lec, l.gestion_lec, f.num_fact, l.id_lec, f.estado_fact,
                    l.actual_lec, anterior_lec, l.consumo_lec, l.totalcons_lec,
                    f.totalaportes_fact, f.totalrecargos_fact, f.montototal_fact
            from 
                asociado a,  lectura l,  factura f
            where
                a.id_asoc = l.id_asoc 
                and l.id_lec = f.id_lec 
                and date(f.fechahora_fact) >='".$fecha1."'
                and date(f.fechahora_fact) <='".$fecha2."' 
                ".$cadusuario."
                ".$cadirecion."
                ".$cadestado."
                ".$cadorden."
                
        ")->result_array();

        return $ingresos;

    }
    /* busca los movimientos de ingresos y egresos */
    function get_reportemovimiento($fecha1, $fecha2, $usuario_id, $estado_id){
        if($usuario_id == 0){
          $cadusuario1 = "";
          $cadusuario2 = "";
          $cadusuario8 = "";
        }else{
            $cadusuario1 = " and i.id_usu = ".$usuario_id." ";
            $cadusuario2 = " and f.id_usu = ".$usuario_id." ";
            $cadusuario8 = " and e.id_usu = ".$usuario_id." ";
        }
        if($estado_id == "no"){
            $cadestado1 = "";
            $cadestado8 = "";
        }else{
            $cadestado1 = " and i.estado_ing = '".$estado_id."' ";
            $cadestado8 = " and e.estado_egr = '".$estado_id."' ";
        }
        /*if($orden_por == "nombre"){
            $cadorden = " order by a.nombres_asoc, a.apellidos_asoc ";
        }elseif($orden_por == "codigo"){
            $cadorden = " order by abs(a.codigo_asoc) ";
        }elseif($orden_por == "fact"){
            $cadorden = " order by f.id_fact ";
        }elseif ($orden_por == "monto"){
            $cadorden = " order by f.montototal_fact ";
        }else{
            $cadorden = "";
        }*/
        $ingresos = $this->db->query("
            (select
                i.id_ing as id, i.fechahora_ing as fecha,
                concat('INGRESO N°: ', i.id_ing, ', ', if(i.id_asoc > 0, concat('SOCIO: ', a.nombres_asoc, ' ', a.apellidos_asoc, ', '), ''), concat('Pagado por: ', i.nombre_ing, '(', i.ci_ing, ')'), ',', concat('Concepto:', i.detalle_ing, '(', i.descripcion_ing, ')')) as detalle,
                i.monto_ing as ingreso, 0 as egreso,
                0 as utilidad, 1 as tipo
            from
                ingreso i
            left join asociado a on i.id_asoc = a.id_asoc
            where
                date(i.fechahora_ing) >= '".$fecha1."'
                and date(i.fechahora_ing) <= '".$fecha2."'
                ".$cadusuario1."
                ".$cadestado1."
            order by i.fechahora_ing desc)
            UNION
            (select
                f.id_fact as id, f.fechahora_fact as fecha,
                concat('COBRO, Recibo N°: ', f.num_fact, ', ', concat('de: ', a.nombres_asoc, ' ', a.apellidos_asoc, '(', a.codigo_asoc, ')'), ', ', concat(l.mes_lec, l.gestion_lec)) as detalle,
                f.montototal_fact as ingreso, 0 as egreso,
                0 as utilidad, 2 as tipo
            from
                factura f
            left join lectura l on f.id_lec = l.id_lec
            left join asociado a on l.id_asoc = a.id_asoc
            where
                date(f.fechahora_fact) >= '".$fecha1."'
                and date(f.fechahora_fact) <= '".$fecha2."'
                and estado_fact = 'CANCELADA'
                ".$cadusuario2."
      order by f.fechahora_fact desc)
            UNION
            (select
                e.id_egr as id, e.fechahora_egr as fecha,
                concat('EGRESO N°: ', e.id_egr, ', ', concat('A: ', e.nombre_egr), ', ', concat('Concepto: ', e.detalle_egr, '(', e.descripcion_egr, ')')) as detalle,
                0 as ingreso, e.monto_egr as egreso,
                0 as utilidad, 8 as tipo
            from
                egreso e
            where
                date(e.fechahora_egr) >= '".$fecha1."'
                and date(e.fechahora_egr) <= '".$fecha2."'
                ".$cadusuario8."
                ".$cadestado8."
            order by e.fechahora_egr desc)
                
        ")->result_array();

        return $ingresos;

    }
}

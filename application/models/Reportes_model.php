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
    function get_ingresoreportes($fecha1, $fecha2, $usuario_id, $estado_id, $orden_por, $nombre_dir, $esteasociado){
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
        if($esteasociado == ""){
            $cadsocio = "";
        }else{
            $cadsocio = " and (a.nombres_asoc like '%".$esteasociado."%' or a.apellidos_asoc like '%".$esteasociado."%'
                      or a.codigo_asoc ='".$esteasociado."'
                      ) ";
            
        }
        if($orden_por == "nombre"){
            $cadorden = " order by a.nombres_asoc, a.apellidos_asoc ";
        }elseif($orden_por == "codigo"){
            $cadorden = " order by abs(a.codigo_asoc) ";
        }elseif($orden_por == "fact"){
            $cadorden = " order by f.num_fact ";
        }elseif ($orden_por == "monto"){
            $cadorden = " order by f.montototal_fact ";
        }else{
            $cadorden = "";
        }
        $ingresos = $this->db->query("
            select 
                    a.id_asoc, a.codigo_asoc, a.nombres_asoc, a.apellidos_asoc, a.razon_asoc,
                    l.mes_lec, l.gestion_lec, f.id_fact, f.num_fact, l.id_lec, f.estado_fact,
                    l.actual_lec, anterior_lec, l.consumo_lec, l.totalcons_lec,
                    f.totalaportes_fact, f.totalrecargos_fact, f.montototal_fact,
                    l.consumoalcant_lec
            from 
                asociado a,  lectura l,  factura f
            where
                a.id_asoc = l.id_asoc 
                and l.id_lec = f.id_lec 
                and date(l.fecha_lec) >='".$fecha1."'
                and date(l.fecha_lec) <='".$fecha2."' 
                ".$cadusuario."
                ".$cadirecion."
                ".$cadsocio."
                ".$cadestado."
                ".$cadorden."
        ")->result_array();
        return $ingresos;
    }
    /* busca los ingresos */
    function get_ingresoreportesf($fecha1, $fecha2, $usuario_id, $orden_por, $nombre_dir, $esteasociado){
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
        if($esteasociado == ""){
            $cadsocio = "";
        }else{
            
            $cadsocio = " and (a.nombres_asoc like '%".$esteasociado."%' or a.apellidos_asoc like '%".$esteasociado."%'
                      or a.codigo_asoc ='".$esteasociado."'
                      ) ";
            
        }
        if($orden_por == "nombre"){
            $cadorden = " order by a.nombres_asoc, a.apellidos_asoc ";
        }elseif($orden_por == "codigo"){
            $cadorden = " order by abs(a.codigo_asoc) ";
        }elseif($orden_por == "fact"){
            $cadorden = " order by f.num_fact ";
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
                    f.totalaportes_fact, f.totalrecargos_fact, f.montototal_fact,
                    l.consumoalcant_lec, f.fecha_fact, f.hora_fact
            from 
                asociado a,  lectura l,  factura f
            where
                a.id_asoc = l.id_asoc 
                and l.id_lec = f.id_lec 
                and date(f.fecha_fact) >='".$fecha1."'
                and date(f.fecha_fact) <='".$fecha2."'
                and f.estado_fact = 'CANCELADA'
                ".$cadusuario."
                ".$cadirecion."
                ".$cadsocio."
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
                date(f.fecha_fact) >= '".$fecha1."'
                and date(f.fecha_fact) <= '".$fecha2."'
                and f.estado_fact = 'CANCELADA'
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
    /* busca los egresos */
    function get_egresoreportes($fecha1, $fecha2, $usuario_id, $nom_categr, $orden_por){
        if($usuario_id == 0){
          $cadusuario = "";
        }else{
            $cadusuario = " and e.id_usu = ".$usuario_id." ";
        }
        if($nom_categr == "ning"){
          $cadcategoria = "";
        }else{
            $cadcategoria = " and e.detalle_egr = '".$nom_categr."' ";
        }
        if($orden_por == "nombre"){
            $cadorden = " order by e.nombre_egr ";
        }elseif($orden_por == "recibo"){
            $cadorden = " order by e.id_egr ";
        }elseif($orden_por == "categoria"){
            $cadorden = " order by e.detalle_egr ";
        }elseif ($orden_por == "monto"){
            $cadorden = " order by e.monto_egr ";
        }else{
            $cadorden = "";
        }
        $ingresos = $this->db->query("
            select 
                    e.*
            from
                egreso e
            where
                date(e.fechahora_egr) >='".$fecha1."'
                and date(e.fechahora_egr) <='".$fecha2."' 
                ".$cadusuario."
                ".$cadcategoria."
                ".$cadorden."
        ")->result_array();
        return $ingresos;
    }

    function ingreso_reporte($fecha1, $fecha2, $usuario_id, $nom_cating, $orden_por){
        if($usuario_id == 0){
          $cadusuario = "";
        }else{
            $cadusuario = " and e.id_usu = ".$usuario_id." ";
        }
        if($nom_cating == "ning"){
          $cadcategoria = "";
        }else{
            $cadcategoria = " and e.detalle_ing = '".$nom_cating."' ";
        }
        if($orden_por == "nombre"){
            $cadorden = " order by e.nombre_ing ";
        }elseif($orden_por == "recibo"){
            $cadorden = " order by e.id_ing ";
        }elseif($orden_por == "categoria"){
            $cadorden = " order by e.detalle_ing ";
        }elseif ($orden_por == "monto"){
            $cadorden = " order by e.monto_ing ";
        }else{
            $cadorden = "";
        }
        $ingresos = $this->db->query("
            select 
                    e.*
            from
                ingreso e
            where
                date(e.fechahora_ing) >='".$fecha1."'
                and date(e.fechahora_ing) <='".$fecha2."' 
                ".$cadusuario."
                ".$cadcategoria."
                ".$cadorden."
        ")->result_array();
        return $ingresos;
    }
    /* reporte que saca el devengado de cada mes (reportes mensuales) */
    function reporte_mes($este_mes, $esta_gestion){
        $estemes = $this->db->query("
            select 
                a.id_asoc, l.`mes_lec`,l.`gestion_lec`,
                a.`nombres_asoc`, a.`apellidos_asoc`, a.`codigo_asoc`, a.`direccion_asoc`, 
                a.`ci_asoc`, a.`ciudad`, a.`categoria_asoc`,a.`servicios_asoc`, 
                a.`tipo_asoc`,
                f.`totalconsumo_fact`*2,
                f.`totalaportes_fact`,
                f.`totalrecargos_fact`, 
                f.`estado_fact`,
                l.`anterior_lec`,
                l.`actual_lec`,
                l.`consumo_lec`,
                l.`totalcons_lec` as agua,
                l.`consumoalcant_lec` as alcantarillado,
                f.`totalaportes_fact` AS repformulario, 
                (l.`totalcons_lec`+l.`consumoalcant_lec`)/2 as descuento,
                f.`id_fact`
            from asociado a, lectura l, factura f, tarifa t
            where 
                a.id_asoc = l.id_asoc and
                l.id_lec = f.id_lec and
                l.`mes_lec`= '".$este_mes."' and
                l.`gestion_lec` = '".$esta_gestion."' and
                l.consumo_lec >= t.`desde` and l.`consumo_lec`<= t.`hasta` and
                t.tipo = a.`tipo_asoc`
                order by a.`nombres_asoc`, a.`apellidos_asoc`
        ")->result_array();
        return $estemes;
    }
    function reporte_deudores(){
        $deudores = $this->db->query("
            select a.id_asoc,max(DATEDIFF(date(NOW()),l.fecha_lec)) as mora, 
                count(*) as cantfact, a.apellidos_asoc, a.nombres_asoc, 
                a.direccion_asoc,a.codigo_asoc, a.zona_asoc,
                a.medidor_asoc,a.servicios_asoc 

            from lectura l, factura f, asociado a 
            where 
                a.id_asoc = l.id_asoc and l.id_lec = f.id_lec 
                and f.estado_fact='PENDIENTE' group by id_asoc
        ")->result_array();
        return $deudores;
    }
    function reporte_encorte(){
        $deudores_encorte = $this->db->query("
            select * 
            from 
            (select a.id_asoc,max(DATEDIFF(date(NOW()),l.fecha_lec)) as mora, 
                count(*) as cantfact, a.apellidos_asoc, a.nombres_asoc, 
                a.direccion_asoc,a.codigo_asoc, a.zona_asoc,
                a.medidor_asoc,a.servicios_asoc 
                
                from lectura l, factura f, asociado a 
                where 
                a.id_asoc = l.id_asoc and l.id_lec = f.id_lec 
                and f.estado_fact='PENDIENTE' group by id_asoc
              ) as t1 
            where 
              t1.mora>=(select p.dias_param from parametros p where p.id_param=4)
        ")->result_array();
        return $deudores_encorte;
    }
    /* obtiene direcciones y numero de asocaidos de esa dirección*/
    function get_dirasociados(){
        $dirasocoado = $this->db->query("
            select d.id_dir, d.nombre_dir, count(a.id_asoc) as numero_asoc
            from direccion_orden d
            left join asociado a on d.nombre_dir = a.direccion_asoc
            group by d.nombre_dir
            order by d.id_dir
        ")->result_array();
        return $dirasocoado;
    }
    /* Obtiene consumo total de servicios, dado mes, gestion y direccion*/
    function get_consumototal($mes, $gestion, $direccion){
        $dirasociado = $this->db->query("
            select  /*count(a.id_asoc) as numero_asoc,*/
                    sum(l.`consumo_lec`) as consumo,
                    sum(if(a.`servicios_asoc` = 'AGUA', if( l.`consumo_lec` <= t.`consumo_basico`, t.costo_agua, t.costo_agua + ((l.consumo_lec - t.consumo_basico) * costo_mt3)), if(a.`servicios_asoc` = 'AGUA Y ALCANTARILLADO', if( l.`consumo_lec` <= t.`consumo_basico`, t.costo_agua, t.costo_agua + ((l.consumo_lec - t.consumo_basico) * costo_mt3)), 0))) as agua,
                    sum(if(a.`servicios_asoc` = 'AGUA Y ALCANTARILLADO', t.`costo_alcant`, if(a.`servicios_asoc` = 'ALCANTARILLADO', t.`costo_alcant`, 0))) as alcantarillado
            from asociado a, lectura l, factura f, tarifa t
            where 
                a.id_asoc = l.id_asoc and
                a.direccion_asoc = '".$direccion."' and
                l.id_lec = f.id_lec and
                l.`mes_lec`= '".$mes."' and
                l.`gestion_lec` = '".$gestion."' and
                l.consumo_lec >= t.`desde` and l.`consumo_lec`<= t.`hasta` and
                t.tipo = a.`tipo_asoc`
        ")->result_array();
        return $dirasociado;
    }
    function reporte_diasencorte_flect($diasmora){
        $deudores_encorte = $this->db->query("
            select * 
                from 
                (select a.id_asoc,max(DATEDIFF(date(NOW()),l.fecha_lec)) as mora, 
                    count(*) as cantfact, a.apellidos_asoc, a.nombres_asoc, 
                    a.direccion_asoc,a.codigo_asoc, a.zona_asoc,
                    a.medidor_asoc,a.servicios_asoc 

                    from lectura l, factura f, asociado a 
                    where 
                    a.id_asoc = l.id_asoc and l.id_lec = f.id_lec
                    and f.estado_fact='PENDIENTE' group by id_asoc
                  ) as t1 
            where 
              t1.mora>= $diasmora
        ")->result_array();
        return $deudores_encorte;
    }
    function reporte_diasencorte_fvenc($diasmora){
        $deudores_encorte = $this->db->query("
            select * 
                from 
                (select a.id_asoc,max(DATEDIFF(date(NOW()),f.fechavenc_fact)) as mora, 
                    count(*) as cantfact, a.apellidos_asoc, a.nombres_asoc, 
                    a.direccion_asoc,a.codigo_asoc, a.zona_asoc,
                    a.medidor_asoc,a.servicios_asoc 

                    from lectura l, factura f, asociado a 
                    where 
                    a.id_asoc = l.id_asoc and l.id_lec = f.id_lec
                    and f.estado_fact='PENDIENTE' group by id_asoc
                  ) as t1 
            where 
              t1.mora>= $diasmora
        ")->result_array();
        return $deudores_encorte;
    }
}

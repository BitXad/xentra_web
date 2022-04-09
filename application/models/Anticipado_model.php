<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Anticipado_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function busqueda_asociados($nombre,$apellido,$ci)
    {
        if ($ci=="")   
        {
            $sql = "select * from asociado
                    where (nombres_asoc like '%".$nombre."%' and apellidos_asoc like '%".$apellido."%') 
                    and estado = 'ACTIVO' ";
            
        }
        else{            
            $sql = "select * from asociado where (codigo_asoc like '%".$ci."%')";
        }
        $resultado = $this->db->query($sql)->result_array();
        return $resultado;
    }
    
    function get_pendiente_factura($asociado,$estado)
    {
        $sql = "SELECT f.*, l.*
        FROM factura f, lectura l
        WHERE 
        l.id_lec=f.id_lec 
        and f.estado_fact='".$estado."'
        and l.id_asoc=".$asociado." ";        
        $resultado = $this->db->query($sql)->result_array();
        
        return $resultado;
    }
    
    function get_ultima_lectura($id_asoc)
    {
        $sql = "select 
                   l.id_lec, l.`actual_lec`, l.`mes_lec`, l.`gestion_lec`, l.`fecha_lec`,
                   a.`id_asoc`, a.`categoria_asoc`, a.`servicios_asoc`
                from 
                    lectura l, asociado a
                where
                    l.`id_asoc` = a.`id_asoc`
                    and l.id_asoc = $id_asoc
                order by l.`id_lec` desc limit 1";     
        $resultado = $this->db->query($sql)->result_array();
        return $resultado;
    }
    
    function get_recargo_detalle($lectura)
    {

        $sql = "select p.id_param,p.descip_param,p.dias_param,p.monto_param,p.estado,p.detalle_param,  (DATEDIFF(date(now()), t.fecha_lec)) as moradias from parametros p,(select * from lectura where id_lec=".$lectura.") as t where p.estado='ACTIVO' and (DATEDIFF(date(now()), t.fecha_lec)) >= p.dias_param and p.monto_param >0 ";        
        $resultado = $this->db->query($sql)->result_array();
        
        return $resultado;
    }
    /*
     * function para realizar uns insercion
     */
    function ejecutar($sql)
    {
        $this->db->query($sql);
        return true;
    }
    
    function cancelar_factura($factura,$numfact_dosif1,$consumo,$aportes,$recargos,$total,$usuario_id)
    {

        $sql = "UPDATE factura SET estado_fact='CANCELADA', fecha_fact=CURDATE(), hora_fact=curTime(), num_fact=".$numfact_dosif1.", totalconsumo_fact=".$consumo.", totalaportes_fact=".$aportes.",totalrecargos_fact=".$recargos.", montototal_fact=".$total.", id_usu=".$usuario_id."
        WHERE id_fact=".$factura;        
        $resultado = $this->db->query($sql);
        
        return $resultado;
    }

    function generar_factura($factura,$numfact_dosif1,$consumo,$aportes,$recargos,$total,$usuario_id,$tipo_fact,$nit_fact,$razon_fact,$orden_fact,$nitemisor_fact,$llave_fact,$fechaemision_fact,$codcontrol_fact, $factura_leyenda1, $factura_leyenda2)
    {
        $exento = $aportes;
        $sql = "UPDATE factura SET estado_fact='CANCELADA', fecha_fact=CURDATE(), hora_fact=curTime(), 
                num_fact=".$numfact_dosif1.", totalconsumo_fact=".$consumo.", totalaportes_fact=".$aportes.", 
                totalrecargos_fact=".$recargos.", montototal_fact=".$total.", id_usu=".$usuario_id.", 
                tipo_fact=".$tipo_fact.", nit_fact = ".$nit_fact.", razon_fact = '".$razon_fact."', 
                orden_fact= ".$orden_fact.", nitemisor_fact = ".$nitemisor_fact.", llave_fact = '".$llave_fact."',
                fechaemision_fact = '".$fechaemision_fact."', codcontrol_fact = '".$codcontrol_fact."',
                factura_leyenda1 = '".$factura_leyenda1."', factura_leyenda2 = '".$factura_leyenda2."',
                exento_fact = '".$exento."'
        WHERE id_fact=".$factura;        
        $resultado = $this->db->query($sql);
        
        return $resultado;
    }

    function actualizar_dosificacion($numfact_dosif1)
    {

        $sql = "UPDATE dosificacion SET  numfact_dosif=".$numfact_dosif1." 
        WHERE id_dosif=1 ";        
        $resultado = $this->db->query($sql);
        
        return $resultado;
    }
    
    function get_datos_factura($factura)
    {

        $sql = "SELECT *
        FROM factura 
        WHERE id_fact=".$factura;        
        $resultado = $this->db->query($sql)->result_array();
        
        return $resultado;
    }
    /*
     * function para ejecutrar una consulta
     */
    function consultar($sql)
    {
        return $this->db->query($sql)->result_array();
    }
    
    function add_detallefactura($params)
    {
        $this->db->insert('detalle_factura',$params);
        return $this->db->insert_id();
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    /*
     * Get factura by id_fact
     */
    function get_factura($id_fact)
    {
        $factura = $this->db->query("
            SELECT
                *

            FROM
                `factura`

            WHERE
                `id_fact` = ?
        ",array($id_fact))->row_array();

        return $factura;
    }
        
    /*
     * Get all factura
     */
    function get_all_factura()
    {
        $factura = $this->db->query("
            SELECT
                *

            FROM
                `factura`

            WHERE
                1=1
            ORDER BY `id_fact` DESC
        ")->result_array();

        return $factura;
    }

    function get_all_facturacancelada()
    {
        $factura = $this->db->query("
            SELECT
                *

            FROM
                `factura`

            WHERE
                estado_fact = 'CANCELADA'

            ORDER BY `id_fact` DESC
        ")->result_array();

        return $factura;
    }
        
    /*
     * function to add new factura
     */
    function add_factura($params)
    {
        $this->db->insert('factura',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update factura
     */
    function update_factura($id_fact,$params)
    {
        $this->db->where('id_fact',$id_fact);
        return $this->db->update('factura',$params);
    }
    
    /*
     * function to delete factura
     */
    function delete_factura($id_fact)
    {
        return $this->db->delete('factura',array('id_fact'=>$id_fact));
    }

    function buscar_asociado($ci)
    {

        $sql = "select * from asociado where nit_asoc = '".$ci."' or ci_asoc='".$ci."' or codigo_asoc='".$ci."' ";        
        $resultado = $this->db->query($sql)->result_array();
        
        return $resultado;
    }
    function buscar_id_asociado($id)
    {

        $sql = "select * from asociado where id_asoc = ".$id." ";        
        $resultado = $this->db->query($sql)->result_array();
        
        return $resultado;
    }

    

    

    function get_pendiente_detalle($factura)
    {

        $sql = "SELECT *
        FROM detalle_factura 
        WHERE id_fact=".$factura." ";        
        $resultado = $this->db->query($sql)->result_array();
        
        return $resultado;
    }

    

    function get_consumo_factura($factura)
    {

        $sql = "SELECT sum(cant_detfact*punit_detfact) as consumo from detalle_factura where tipo_detfact=0 and id_fact=".$factura;        
        $resultado = $this->db->query($sql)->row_array();
        
        return $resultado;
    }

    function get_aportes_factura($factura)
    {

        $sql = "select if(sum(total_detfact)<>0,sum(total_detfact),0) as multas from detalle_factura where id_fact=".$factura." and tipo_detfact=1";        
        $resultado = $this->db->query($sql)->row_array();
        
        return $resultado;
    }

    function get_recargos_factura($lectura)
    {

        $sql = "SELECT if(sum(t1.monto_param)>0,sum(t1.monto_param),0) as recargos from (select p.monto_param from parametros p,(select * from lectura where id_lec=".$lectura.") as t where p.estado='ACTIVO' and (DATEDIFF(date(now()), t.fecha_lec)) >= p.dias_param and p.monto_param >0) as t1";        
        $resultado = $this->db->query($sql)->row_array();
        
        return $resultado;
    }

    

    

    function recargosadetalle($id_param,$factura_id)
    {

        $sql = "INSERT INTO detalle_factura
        (
        id_fact,
        cant_detfact,
        descip_detfact,
        punit_detfact,
        desc_detfact,
        total_detfact,
        tipo_detfact
        ) 
        (
        SELECT
        ".$factura_id.",
        1,
        detalle_param,
        monto_param,
        0,
        monto_param,
        2
        FROM 
        parametros
        WHERE 
        id_param = ".$id_param.")";        
        $resultado = $this->db->query($sql);
        
        return $resultado;
    }

    function get_factura_completa($factura)
    {

        $sql = "SELECT f.*, l.*, a.*, u.*
        FROM factura f, lectura l, asociado a, usuario u
        WHERE f.id_fact=".$factura."
        AND f.id_lec=l.id_lec
        AND l.id_asoc=a.id_asoc
        AND f.id_usu=u.id_usu";        
        $resultado = $this->db->query($sql)->result_array();
        
        return $resultado;
    }

    function get_factura_ultima()
    {

        $sql = "SELECT id_fact FROM factura ORDER BY num_fact DESC";        
        $resultado = $this->db->query($sql)->row_array();
        
        return $resultado;
    }

    function get_consumo_total($asociado)
    {

        $sql = "SELECT sum(d.cant_detfact*d.punit_detfact) as total_consumo from detalle_factura d
                LEFT JOIN factura f ON f.id_fact=d.id_fact 
                LEFT JOIN lectura l ON l.id_lec=f.id_lec 
                where  f.estado_fact='PENDIENTE' and d.tipo_detfact=0 and id_asoc=".$asociado;        
        $resultado = $this->db->query($sql)->row_array();
        
        return $resultado;
    }

    function get_aportes_total($asociado)
    {

        $sql = "SELECT if(sum(total_detfact)>0,sum(total_detfact),0) as total_multas from detalle_factura d 
                LEFT JOIN factura f ON f.id_fact=d.id_fact 
                LEFT JOIN lectura l ON l.id_lec=f.id_lec 
                where  f.estado_fact='PENDIENTE' 
                and d.tipo_detfact=1
                and id_asoc=".$asociado;         
        $resultado = $this->db->query($sql)->row_array();
        
        return $resultado;
    }

    function get_recargos_total($asociado)
    {

        $sql = "SELECT if(sum(t1.monto_param)>0,sum(t1.monto_param),0) as total_recargos from (select p.monto_param from parametros p,(select * from lectura where id_asoc=".$asociado.") as t where p.estado='ACTIVO' and (DATEDIFF(date(now()), t.fecha_lec)) >= p.dias_param and p.monto_param >0) as t1";        
        $resultado = $this->db->query($sql)->row_array();
        
        return $resultado;
    }

    

    
}

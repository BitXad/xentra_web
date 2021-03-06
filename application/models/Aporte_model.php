<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Aporte_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get aporte by id_ap
     */
    function get_aporte($id_ap)
    {
        $aporte = $this->db->query("
            SELECT
                *

            FROM
                `aporte`

            WHERE
                `id_ap` = ?
        ",array($id_ap))->row_array();

        return $aporte;
    }
        
    /*
     * Get all aporte
     */
    function get_all_aporte()
    {
        $aporte = $this->db->query("
           SELECT
                a.*, u.*

            FROM
                aporte a
            left join usuario u on a.id_usu = u.id_usu
            ORDER BY `id_ap` DESC
        ")->result_array();

        return $aporte;
    }
        
    /*
     * function to add new aporte
     */
    function add_aporte($params)
    {
        $this->db->insert('aporte',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update aporte
     */
    function update_aporte($id_ap,$params)
    {
        $this->db->where('id_ap',$id_ap);
        return $this->db->update('aporte',$params);
    }
    
    /*
     * function to delete aporte
     */
    function delete_aporte($id_ap)
    {
        return $this->db->delete('aporte',array('id_ap'=>$id_ap));
    }
    /* retorna el total de aportes */
    function get_aporte_total()
    {
        $aporte = $this->db->query("
           SELECT
                sum(monto_ap) as total_aporte
            FROM
                aporte a
            WHERE
                estado_ap = 'ACTIVO'
            ORDER BY `id_ap` DESC
        ")->row_array();

        return $aporte;
    }
}

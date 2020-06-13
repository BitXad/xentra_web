<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Direccion_orden_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get direccion_orden by id_dir
     */
    function get_direccion_orden($id_dir)
    {
        $direccion_orden = $this->db->query("
            SELECT
                *

            FROM
                `direccion_orden`

            WHERE
                `id_dir` = ?
        ",array($id_dir))->row_array();

        return $direccion_orden;
    }
        
    /*
     * Get all direccion_orden
     */
    function get_all_direccion_orden()
    {
        $direccion_orden = $this->db->query("
            SELECT
                *
            FROM
                `direccion_orden`
            WHERE
                1 = 1
            ORDER BY `orden_dir`
        ")->result_array();
        return $direccion_orden;
    }
    
    /*
     * Get all direccion_orden
     */
    function get_all_direccion_alfab()
    {
        $direccion_orden = $this->db->query("
            SELECT
                *
            FROM
                `direccion_orden`
            WHERE
                1 = 1
            ORDER BY `nombre_dir`
        ")->result_array();
        return $direccion_orden;
    }
    /*
     * function to add new direccion_orden
     */
    function add_direccion_orden($params)
    {
        $this->db->insert('direccion_orden',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update direccion_orden
     */
    function update_direccion_orden($id_dir,$params)
    {
        $this->db->where('id_dir',$id_dir);
        return $this->db->update('direccion_orden',$params);
    }
    
    /*
     * function to delete direccion_orden
     */
    function delete_direccion_orden($id_dir)
    {
        return $this->db->delete('direccion_orden',array('id_dir'=>$id_dir));
    }
}

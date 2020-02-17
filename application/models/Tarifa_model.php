<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Tarifa_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get tarifa by id_tarifa
     */
    function get_tarifa($id_tarifa)
    {
        $tarifa = $this->db->query("
            SELECT
                *

            FROM
                `tarifa`

            WHERE
                `id_tarifa` = ?
        ",array($id_tarifa))->row_array();

        return $tarifa;
    }
        
    /*
     * Get all tarifa
     */
    function get_all_tarifa()
    {
        $tarifa = $this->db->query("
            SELECT
                *

            FROM
                `tarifa`

            WHERE
                1 = 1

            ORDER BY `id_tarifa` DESC
        ")->result_array();

        return $tarifa;
    }
        
    /*
     * function to add new tarifa
     */
    function add_tarifa($params)
    {
        $this->db->insert('tarifa',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update tarifa
     */
    function update_tarifa($id_tarifa,$params)
    {
        $this->db->where('id_tarifa',$id_tarifa);
        return $this->db->update('tarifa',$params);
    }
    
    /*
     * function to delete tarifa
     */
    function delete_tarifa($id_tarifa)
    {
        return $this->db->delete('tarifa',array('id_tarifa'=>$id_tarifa));
    }
}

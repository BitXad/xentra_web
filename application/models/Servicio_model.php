<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Servicio_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get servicio by servicio
     */
    function get_servicio($servicio)
    {
        $servicio = $this->db->query("
            SELECT
                *

            FROM
                `servicios`

            WHERE
                `servicio` = ?
        ",array($servicio))->row_array();

        return $servicio;
    }
        
    /*
     * Get all servicios
     */
    function get_all_servicios()
    {
        $servicios = $this->db->query("
            SELECT
                *

            FROM
                `servicios`

            WHERE
                1 = 1

            ORDER BY `servicio`
        ")->result_array();

        return $servicios;
    }
        
    /*
     * function to add new servicio
     */
    function add_servicio($params)
    {
        $this->db->insert('servicios',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update servicio
     */
    function update_servicio($servicio,$params)
    {
        $this->db->where('servicio',$servicio);
        return $this->db->update('servicios',$params);
    }
    
    /*
     * function to delete servicio
     */
    function delete_servicio($servicio)
    {
        return $this->db->delete('servicios',array('servicio'=>$servicio));
    }
}

<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Medidor_servicio_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get medidor_servicio by id_serv
     */
    function get_medidor_servicio($id_serv)
    {
        $medidor_servicio = $this->db->query("
            SELECT
                *

            FROM
                `medidor_servicios`

            WHERE
                `id_serv` = ?
        ",array($id_serv))->row_array();

        return $medidor_servicio;
    }
        
    /*
     * Get all medidor_servicios
     */
    function get_all_medidor_servicios()
    {
        $medidor_servicios = $this->db->query("
            SELECT
                *

            FROM
                `medidor_servicios`

            WHERE
                1 = 1

            ORDER BY `id_serv` DESC
        ")->result_array();

        return $medidor_servicios;
    }
        
    /*
     * function to add new medidor_servicio
     */
    function add_medidor_servicio($params)
    {
        $this->db->insert('medidor_servicios',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update medidor_servicio
     */
    function update_medidor_servicio($id_serv,$params)
    {
        $this->db->where('id_serv',$id_serv);
        return $this->db->update('medidor_servicios',$params);
    }
    
    /*
     * function to delete medidor_servicio
     */
    function delete_medidor_servicio($id_serv)
    {
        return $this->db->delete('medidor_servicios',array('id_serv'=>$id_serv));
    }
}

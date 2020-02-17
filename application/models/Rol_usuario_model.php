<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Rol_usuario_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get rol_usuario by 
     */
    function get_rol_usuario($)
    {
        $rol_usuario = $this->db->query("
            SELECT
                *

            FROM
                `rol_usuario`

            WHERE
                `` = ?
        ",array($))->row_array();

        return $rol_usuario;
    }
        
    /*
     * Get all rol_usuario
     */
    function get_all_rol_usuario()
    {
        $rol_usuario = $this->db->query("
            SELECT
                *

            FROM
                `rol_usuario`

            WHERE
                1 = 1

            ORDER BY `` DESC
        ")->result_array();

        return $rol_usuario;
    }
        
    /*
     * function to add new rol_usuario
     */
    function add_rol_usuario($params)
    {
        $this->db->insert('rol_usuario',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update rol_usuario
     */
    function update_rol_usuario($,$params)
    {
        $this->db->where('',$);
        return $this->db->update('rol_usuario',$params);
    }
    
    /*
     * function to delete rol_usuario
     */
    function delete_rol_usuario($)
    {
        return $this->db->delete('rol_usuario',array(''=>$));
    }
}

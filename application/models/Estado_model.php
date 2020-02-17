<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Estado_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get estado by estado
     */
    function get_estado($estado)
    {
        $estado = $this->db->query("
            SELECT
                *

            FROM
                `estados`

            WHERE
                `estado` = ?
        ",array($estado))->row_array();

        return $estado;
    }
        
    /*
     * Get all estados
     */
    function get_all_estados()
    {
        $estados = $this->db->query("
            SELECT
                *

            FROM
                `estados`

            WHERE
                1 = 1

            ORDER BY `estado` DESC
        ")->result_array();

        return $estados;
    }
        
    /*
     * function to add new estado
     */
    function add_estado($params)
    {
        $this->db->insert('estados',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update estado
     */
    function update_estado($estado,$params)
    {
        $this->db->where('estado',$estado);
        return $this->db->update('estados',$params);
    }
    
    /*
     * function to delete estado
     */
    function delete_estado($estado)
    {
        return $this->db->delete('estados',array('estado'=>$estado));
    }
}

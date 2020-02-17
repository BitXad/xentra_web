<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Asociado_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get asociado by id_asoc
     */
    function get_asociado($id_asoc)
    {
        $asociado = $this->db->query("
            SELECT
                *

            FROM
                `asociado`

            WHERE
                `id_asoc` = ?
        ",array($id_asoc))->row_array();

        return $asociado;
    }
        
    /*
     * Get all asociado
     */
    function get_all_asociado()
    {
        $asociado = $this->db->query("
            SELECT
                *

            FROM
                `asociado`

            WHERE
                1 = 1

            ORDER BY `id_asoc` DESC
        ")->result_array();

        return $asociado;
    }
        
    /*
     * function to add new asociado
     */
    function add_asociado($params)
    {
        $this->db->insert('asociado',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update asociado
     */
    function update_asociado($id_asoc,$params)
    {
        $this->db->where('id_asoc',$id_asoc);
        return $this->db->update('asociado',$params);
    }
    
    /*
     * function to delete asociado
     */
    function delete_asociado($id_asoc)
    {
        return $this->db->delete('asociado',array('id_asoc'=>$id_asoc));
    }
}

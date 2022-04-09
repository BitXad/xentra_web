<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Multum_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get multum by id_multa
     */
    function get_multum($id_multa)
    {
        $multum = $this->db->query("
            SELECT
                *

            FROM
                `multa`

            WHERE
                `id_multa` = ?
        ",array($id_multa))->row_array();

        return $multum;
    }
        
    /*
     * Get all multa
     */
    function get_all_multa()
    {
        $multa = $this->db->query("
            SELECT
                m.*, u.*

            FROM
                multa m, usuario u

            WHERE
                m.id_usu=u.id_usu

            ORDER BY `id_multa` DESC
        ")->result_array();

        return $multa;
    }
        
    /*
     * function to add new multum
     */
    function add_multum($params)
    {
        $this->db->insert('multa',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update multum
     */
    function update_multum($id_multa,$params)
    {
        $this->db->where('id_multa',$id_multa);
        return $this->db->update('multa',$params);
    }
    
    /*
     * function to delete multum
     */
    function delete_multum($id_multa)
    {
        return $this->db->delete('multa',array('id_multa'=>$id_multa));
    }
    /*
     * Get all multas dado mes y gestion
     */
    function get_multas_asoc($id_asoc)
    {
        $multa = $this->db->query("
            select
                *
            from
                multa
            where
                estado_multa = 'ACTIVO' and
                id_asoc= $id_asoc
        ")->result_array();
        return $multa;
    }
}

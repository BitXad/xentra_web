<?php
/* 
 * Generated by CRUDigniter v3.0 Beta 
 * www.crudigniter.com
 */
 
class Egreso_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get egreso by id_egr
     */
    function get_egreso($id_egr)
    {
        return $this->db->get_where('egreso',array('id_egr'=>$id_egr))->row_array();
    }
    
    /*
     * Get all egreso
     */
     
      function get_egresos($id_egr)
    {
         $egreso = $this->db->query("
            SELECT
                i.*, u.*

            FROM
                egreso i, usuario u

            WHERE
                i.id_usu = u.id_usu
                and i.id_egr=".$id_egr."

            ORDER BY `id_egr` DESC

            
        ")->result_array();

        return $egreso;
    }
    function get_all_egreso()
    {
        
        $egreso = $this->db->query("
            SELECT
                i.*, u.*

            FROM
                egreso i, usuario u

            WHERE
                i.id_usu = u.id_usu

            ORDER BY `id_egr` DESC

        ")->result_array();

        return $egreso;
    }
  
    /*
     * function to add new egreso
     */
    function add_egreso($params)
    {
        $this->db->insert('egreso',$params);
        return $this->db->insert_id();
    }
    
    function fechaegreso($condicion)
    {

       $egreso = $this->db->query("
        SELECT
               e.*, u.*
            FROM
                egreso e, usuario u
            WHERE
                e.id_usu = u.id_usu
                
               
                ".$condicion." 
                
            ORDER BY e.fechahora_egr DESC 
        "
        )->result_array();

        return $egreso;
    }
    
    /*
     * function to update egreso
     */
     
     function numero()
    {
        
        $numrec = $this->db->query("SELECT * FROM parametros")->result_array();
        return $numrec;
    }
     function nombre()
    {
        
        $nom = $this->db->query("SELECT * FROM usuario")->result_array();
        return $nom;
    }
    
    function update_egreso($id_egr,$params)
    {
        $this->db->where('id_egr',$id_egr);
        $response = $this->db->update('egreso',$params);
        if($response)
        {
            return "egreso updated successfully";
        }
        else
        {
            return "Error occuring while updating egreso";
        }
    }
    
    /*
     * function to delete egreso
     */
    function delete_egreso($id_egr)
    {
        $response = $this->db->delete('egreso',array('id_egr'=>$id_egr));
        if($response)
        {
            return "egreso deleted successfully";
        }
        else
        {
            return "Error occuring while deleting egreso";
        }
    }


// FUNCIONES DE CONVERSION DE NUMEROS A LETRAS.

 


    
}

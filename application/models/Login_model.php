<?php

class Login_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function login($username,$password)  {
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where('login_usu', $username);
        $this->db->where('estado_usu', 'ACTIVO');
        $this->db->where('clave_usu', md5($password));
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function login2($usuario_login,$usuario_clave){
        $query = $this->db->query("select * from usuario where login_usu ='".$usuario_login."' and clave_usu = '".md5($usuario_clave)."' and estado_usu= 'ACTIVO' ");
        return $query->row();
    }

    public function read_user_information($username) {
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where('login_usu', $username);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

}
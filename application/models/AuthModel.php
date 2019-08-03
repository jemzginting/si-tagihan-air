<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthModel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function login($no_kontrol, $password)
    {
        $this->db->select('*');
        $this->db->from('tb_login l');
        $this->db->join('tb_pelanggan p', 'l.no_kontrol = p.no_kontrol');
        $this->db->where('l.no_kontrol', $no_kontrol);
        $this->db->where('l.password', $password);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    // public function auth_login($username, $password) {
    //     $query = $this->db->query("SELECT * FROM dosen WHERE username ='$username' AND password ='$password' LIMIT 1");
    //     return query;
    // }
}

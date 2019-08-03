<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminModel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function get_no_kontrol()
    {
        $this->db->select('no_kontrol');
        $res = $this->db->get('tb_login');
        return $res->result_array();
    }



    public function get_all_tunggakan()
    {
        $sql = "SELECT t.no_kontrol,p.name,SUM(t.biaya) as total_tagihan, COUNT(t.no_kontrol) as jumlah, MIN(t.bulan) as awal, MAX(t.bulan) as akhir
        FROM tb_tagihan t
        JOIN tb_pelanggan p
        ON t.no_kontrol = p.no_kontrol
        WHERE t.lunas = 'tidak'
        GROUP BY t.no_kontrol";
        $res = $this->db->query($sql);
        return $res->result_array();
    }

    public function get_tunggakan_personal($no_kontrol)
    {
        $sql = "SELECT t.no_kontrol,SUM(t.biaya) as total_tagihan, COUNT(t.no_kontrol) as jumlah, MIN(t.bulan) as awal, MAX(t.bulan) as akhir
        FROM tb_tagihan t
        JOIN tb_pelanggan p
        ON t.no_kontrol = p.no_kontrol
        WHERE t.no_kontrol = '" . $no_kontrol . "' AND  t.lunas = 'tidak' ";
        $res = $this->db->query($sql);
        return $res->result_array();
    }

    public function get_all_keluhan()
    {
        $sql = "SELECT * from tb_keluhan";
        $res = $this->db->query($sql);
        return $res->result_array();
    }

    public function get_personal_keluhan($id_keluhan)
    {
        $sql = "SELECT * from tb_keluhan WHERE id_keluhan =" . $id_keluhan;
        $res = $this->db->query($sql);
        return $res->result_array();
    }

    public function get_balasan_keluhan($id_keluhan)
    {
        $sql = "SELECT reply_keluhan from tb_keluhan WHERE id_keluhan =" . $id_keluhan;
        $res = $this->db->query($sql);
        return $res->result_array();
    }

    public function cek_id_himbauan($no_kontrol)
    {
        $sql = "SELECT no_kontrol from tb_himbauan WHERE no_kontrol ='" . $no_kontrol . "'";
        $res = $this->db->query($sql);
        return $res->result_array();
    }
    public function input_himbauan($data)
    {

        $this->db->set('no_kontrol', $data['no_kontrol']);
        $this->db->set('lama_tunggakan', $data['lama_tunggakan']);
        $this->db->set('total_tunggakan', $data['total_tunggakan']);
        $this->db->set('awal', $data['awal']);
        $this->db->set('akhir', $data['akhir']);
        $this->db->set('status', $data['status']);
        $this->db->insert('tb_himbauan');
        $this->db->insert_id();
    }

    public function update_himbauan($data)
    {
        $this->db->set('lama_tunggakan', $data['lama_tunggakan']);
        $this->db->set('total_tunggakan', $data['total_tunggakan']);
        $this->db->set('awal', $data['awal']);
        $this->db->set('akhir', $data['akhir']);
        $this->db->set('status', $data['status']);
        $this->db->where('no_kontrol', $data['no_kontrol']);
        $this->db->update('tb_himbauan');
    }

    public function update_balasan($id_keluhan, $isi_balasan)
    {
        $this->db->set('reply_keluhan', $isi_balasan);
        $this->db->where('id_keluhan', $id_keluhan);
        $this->db->update('tb_keluhan');
    }

    public function input_tagihan($data)
    {

        $this->db->set('no_kontrol', $data['no_kontrol']);
        $this->db->set('bulan',  $data['bulan']);
        $this->db->set('tahun', $data['tahun']);
        $this->db->set('st_awal', $data['st_awal']);
        $this->db->set('st_akhir',  $data['st_akhir']);
        $this->db->set('pemakaian',  $data['pemakaian']);
        $this->db->set('lunas', $data['lunas']);
        $this->db->set('aktif', $data['aktif']);
        $this->db->set('tarif', $data['tarif']);
        $this->db->set('biaya', $data['biaya']);
        $this->db->insert('tb_tagihan');
        $this->db->insert_id();
    }

    public function get_chat_name()
    {
        $sql = "SELECT DISTINCT c.id_user, u .name 
        FROM tb_chat c
        JOIN tb_pelanggan u
        ON c.id_user = u.no_kontrol
        WHERE (c.id_user = 1 OR c.id_target = 1) AND u.name != 'admin' ";
        $res = $this->db->query($sql);
        return $res->result_array();
    }
}

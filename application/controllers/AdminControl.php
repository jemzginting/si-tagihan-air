<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminControl extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('sess_admin')) {
            redirect("AuthLogin");
        }

        $this->load->model('AdminModel');
        //  $this->load->library('form_validation', 'session');
    }

    public function index()
    {

        $session_data = $this->session->userdata('sess_admin');
        $datacontent['session'] = $session_data;
        $data['title'] = 'Welcome to Website Pelayanan Pengadilan Agama Kota Palembang';
        // $this->template->view('template/admin/main_content', 1, $datacontent);
        //$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('template/header', $datacontent, $data);
        $this->load->view('template/sidebar', $datacontent, $data);
        $this->load->view('template/topbar', $datacontent, $data);
        $this->load->view('template/admin/index', 1, $datacontent, $data);
        $this->load->view('template/footer');
    }

    public function dashboard()
    {
        $session_data = $this->session->userdata('sess_admin');
        $datacontent['session'] = $session_data;

        $this->load->view('template/header', $datacontent);
        $this->load->view('template/sidebar', $datacontent);
        $this->load->view('template/topbar', $datacontent);
        $this->load->view('template/admin/index', 1, $datacontent);
        $this->load->view('template/footer');
    }

    public function form_tagihan()
    {
        $session_data = $this->session->userdata('sess_admin');
        $datacontent['session'] = $session_data;
        $data['id'] = $this->AdminModel->get_no_kontrol();

        $this->load->view('template/header', $datacontent);
        $this->load->view('template/sidebar', $datacontent);
        $this->load->view('template/topbar', $datacontent);
        $this->load->view('template/admin/form_tagihan', $data);
        $this->load->view('template/footer');
    }

    public function form_himbauan()
    {
        $session_data = $this->session->userdata('sess_admin');
        $datacontent['session'] = $session_data;
        $data['id'] = $this->AdminModel->get_no_kontrol();
        $this->load->view('template/header', $datacontent);
        $this->load->view('template/sidebar', $datacontent);
        $this->load->view('template/topbar', $datacontent);
        $this->load->view('template/admin/form_himbauan', $data);
        $this->load->view('template/footer');
    }

    public function keluhan_pelanggan()
    {
        $session_data = $this->session->userdata('sess_admin');
        $datacontent['session'] = $session_data;
        $data['id'] = $this->AdminModel->get_no_kontrol();
        $this->load->view('template/header', $datacontent);
        $this->load->view('template/sidebar', $datacontent);
        $this->load->view('template/topbar', $datacontent);
        $this->load->view('template/admin/keluhan_pelanggan', $datacontent);
        $this->load->view('template/footer');
    }

    public function konfirmasi_konsultasi()
    {
        $session_data = $this->session->userdata('sess_admin');
        $datacontent['session'] = $session_data;
        $this->load->view('template/header', $datacontent);
        $this->load->view('template/sidebar', $datacontent);
        $this->load->view('template/topbar', $datacontent);
        $this->load->view('template/admin/konfirmasi_konsultasi', 1, $datacontent);
        $this->load->view('template/footer');
    }

    public function pilih_chat_pelanggan()
    {
        $session_data = $this->session->userdata('sess_admin');
        $datacontent['session'] = $session_data;
        $this->load->view('template/header', $datacontent);
        $this->load->view('template/sidebar', $datacontent);
        $this->load->view('template/topbar', $datacontent);
        $this->load->view('template/admin/laporan_pelayanan', 1, $datacontent);
        $this->load->view('template/footer', $datacontent);
    }

    public function penilaian_pelayanan()
    {
        $session_data = $this->session->userdata('sess_admin');
        $datacontent['session'] = $session_data;
        $this->load->view('template/header', $datacontent);
        $this->load->view('template/sidebar', $datacontent);
        $this->load->view('template/topbar', $datacontent);
        $this->load->view('template/admin/penilaian_pelayanan', 1, $datacontent);
        $this->load->view('template/footer', $datacontent);
    }

    public function rekap_konsultasi()
    {
        $session_data = $this->session->userdata('sess_admin');
        $datacontent['session'] = $session_data;
        $this->load->view('template/header', $datacontent);
        $this->load->view('template/sidebar', $datacontent);
        $this->load->view('template/topbar', $datacontent);
        $this->load->view('template/admin/rekap_konsultasi', 1, $datacontent);
        $this->load->view('template/footer');
    }

    public function get_all_tunggakan_personal()
    {
        $session_data = $this->session->userdata('sess_admin');
        $data['session'] = $session_data;
        $result = $this->AdminModel->get_all_tunggakan();
        echo json_encode($result);
    }

    public function get_rekap_keluhan()
    {
        $session_data = $this->session->userdata('sess_admin');
        $data['session'] = $session_data;
        $result = $this->AdminModel->get_all_keluhan($data);
        echo json_encode($result);
    }

    public function get_personal_keluhan()
    {
        $id_keluhan = $this->input->GET('id_keluhan');
        $result = $this->AdminModel->get_personal_keluhan($id_keluhan);
        echo json_encode($result);
    }

    public function get_balasan_keluhan()
    {
        $id_keluhan = $this->input->GET('id_keluhan');
        $result = $this->AdminModel->get_balasan_keluhan($id_keluhan);
        echo json_encode($result);
    }

    public function get_name_chat()
    {
        $session_data = $this->session->userdata('sess_admin');
        //$data['session'] = $session_data;
        $result = $this->AdminModel->get_chat_name();
        echo json_encode($result);
    }

    public function kirim_reply()
    {
        $id_keluhan = $this->input->GET('id_keluhan');
        $isi_balasan = $this->input->GET('isi_balasan');
        $result = $this->AdminModel->update_balasan($id_keluhan, $isi_balasan);
        echo json_encode($result);
    }

    public function konfirm_himbauan()
    {
        $data['no_kontrol'] = $this->input->post('no_kontrol');
        $data['status'] = $this->input->POST('status');
        $himbauan = $this->AdminModel->get_tunggakan_personal($data['no_kontrol']);
        $data['lama_tunggakan'] = $himbauan[0]['jumlah'];
        echo "aku =" . $himbauan[0]['jumlah'];
        $data['total_tunggakan'] = $himbauan[0]['total_tagihan'];
        $data['awal'] = $himbauan[0]['awal'];
        $data['akhir'] = $himbauan[0]['akhir'];
        $cek_himbauan = $this->AdminModel->cek_id_himbauan($data['no_kontrol']);
        if (empty($cek_himbauan)) {
            $res = $this->AdminModel->input_himbauan($data);
        } else {
            $res = $this->AdminModel->update_himbauan($data);
        }

        echo json_encode($res);
    }



    public function submit_tagihan()
    {

        $data['no_kontrol'] = $this->input->post('no_kontrol');
        $data['bulan'] = $this->input->post('bulan');
        $data['tahun'] = $this->input->post('tahun');
        $data['st_awal'] = $this->input->post('st_awal');
        $data['st_akhir'] = $this->input->post('st_akhir');
        $data['pemakaian'] = $this->input->post('pemakaian');
        $data['lunas'] = $this->input->post('lunas');
        $data['aktif'] = $this->input->post('aktif');
        $data['tarif'] = $this->input->post('tarif');
        $data['biaya'] = $this->input->post('biaya');
        $result = $this->AdminModel->input_tagihan($data);
    }

    public function chat_pelanggan()
    {
        $session_data = $this->session->userdata('sess_admin');
        $datacontent['session'] = $session_data;
        $data['userid'] = $this->input->GET('id');

        $data['name'] = $this->input->GET('name');
        $data['title'] = 'Form Pelayanan Kepuasan Layanan';
        $this->load->view('template/header', $datacontent, $data);
        $this->load->view('template/sidebar', $datacontent, $data);
        $this->load->view('template/topbar', $datacontent, $data);
        $this->load->view('template/chat/chat', $data);
        $this->load->view('template/footer');
    }
}

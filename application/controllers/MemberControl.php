<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MemberControl extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('sess_member')) {
            redirect("AuthLogin");
        }
        $this->load->library('form_validation', 'session');
        $this->load->helper(array('form', 'url'));
        $this->load->model('MemberModel');
        //  $this->load->library('form_validation', 'session');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $this->load->library('form_validation');
        $session_data = $this->session->userdata('sess_member');
        $datacontent['session'] = $session_data;
        $data['title'] = 'Welcome to Website Pelayanan Pengadilan Tinggi Agama Kota Palembang';
        $this->load->view('template/header', $datacontent, $data);
        $this->load->view('template/sidebar', $datacontent);
        $this->load->view('template/topbar', $datacontent, $data);
        $this->load->view('template/member/dashboard', 2, $datacontent, $data);
        $this->load->view('template/footer');
    }

    public function dashboard()
    {
        $session_data = $this->session->userdata('sess_member');
        $datacontent['session'] = $session_data;
        $data['title'] = 'Dashboard';
        $this->load->view('template/header', $datacontent, $data);
        $this->load->view('template/sidebar', 2, $datacontent);
        $this->load->view('template/topbar', $datacontent, $data);
        $this->load->view('template/member/dashboard', 2, $datacontent, $data);
        $this->load->view('template/footer');
    }

    public function myprofile()
    {
        $session_data = $this->session->userdata('sess_member');
        $datacontent['session'] = $session_data;
        $data['title'] = 'My Profile';
        $this->load->view('template/header', $datacontent, $data);
        $this->load->view('template/sidebar', $datacontent, $data);
        $this->load->view('template/topbar', $datacontent, $data);
        $this->load->view('template/member/myprofile', 2, $datacontent, $data);
        $this->load->view('template/footer');
    }

    public function pengaduan_keluhan()
    {
        $session_data = $this->session->userdata('sess_member');
        $datacontent['session'] = $session_data;
        // $data['no_konsul'] = $this->MemberModel->get_nomor_urut();
        $data['no_kontrol'] = $session_data['no_kontrol'];
        $data['nama'] = $session_data['name'];
        $data['alamat'] = $session_data['alamat'];
        $data['date'] = date('Y-m-d');
        $this->load->view('template/header', $datacontent, $data);
        $this->load->view('template/sidebar', $datacontent, $data);
        $this->load->view('template/topbar', $datacontent, $data);
        $this->load->view('template/member/pengaduan_keluhan', $data);
        $this->load->view('template/footer');
    }

    public function konfirmasi_konsultasi()
    {
        $session_data = $this->session->userdata('sess_member');
        $datacontent['session'] = $session_data;
        $data['title'] = 'Form Pelayanan';
        $this->load->view('template/header', $datacontent, $data);
        $this->load->view('template/sidebar', $datacontent, $data);
        $this->load->view('template/topbar', $datacontent, $data);
        $this->load->view('template/member/konfirmasi_konsultasi', 2, $datacontent, $data);
        $this->load->view('template/footer');
    }

    public function info_tagihan()
    {
        $session_data = $this->session->userdata('sess_member');
        $datacontent['session'] = $session_data;
        $no_kontrol = $session_data['no_kontrol'];
        $datacontent['get'] = $this->MemberModel->get_detail_tagihan($no_kontrol);
        $data['title'] = 'Tanggapan Permohonan Konsultasi';
        $this->load->view('template/header', $datacontent, $data);
        $this->load->view('template/sidebar', $datacontent, $data);
        $this->load->view('template/topbar', $datacontent, $data);
        $this->load->view('template/member/info_tagihan', $datacontent);
        $this->load->view('template/footer');
    }

    public function tanggapan_konsultasi()
    {
        $session_data = $this->session->userdata('sess_member');
        $datacontent['session'] = $session_data;
        $data['title'] = 'Tanggapan Permohonan Konsultasi';
        $this->load->view('template/header', $datacontent, $data);
        $this->load->view('template/sidebar', $datacontent, $data);
        $this->load->view('template/topbar', $datacontent, $data);
        $this->load->view('template/member/tanggapan_konsultasi', 2, $datacontent, $data);
        $this->load->view('template/footer');
    }

    public function info_himbauan()
    {
        $session_data = $this->session->userdata('sess_member');
        $datacontent['session'] = $session_data;
        $no_kontrol = $session_data['no_kontrol'];
        $data['all'] = $this->MemberModel->get_id_himbauan($no_kontrol);
        $this->load->view('template/header', $datacontent, $data);
        $this->load->view('template/sidebar', $datacontent, $data);
        $this->load->view('template/topbar', $datacontent, $data);
        $this->load->view('template/member/info_himbauan', $data);
        $this->load->view('template/footer');
    }

    public function chatting()
    {
        $session_data = $this->session->userdata('sess_member');
        $datacontent['session'] = $session_data;
        $data['title'] = "Form Pelayanan Kepuasan Layanan";
        $data['userid'] = "admin";
        $data['name'] = "Admin";
        $this->load->view('template/header', $datacontent, $data);
        $this->load->view('template/sidebar', $datacontent, $data);
        $this->load->view('template/topbar', $datacontent, $data);
        $this->load->view('template/chat/chat', $data);
        $this->load->view('template/footer');
    }

    public function penilaian_pelayanan()
    {
        $session_data = $this->session->userdata('sess_member');
        $datacontent['session'] = $session_data;
        $data['title'] = 'Penilaian Kepuasan Pelayanan';
        $this->load->view('template/header', $datacontent, $data);
        $this->load->view('template/sidebar', $datacontent, $data);
        $this->load->view('template/topbar', $datacontent, $data);
        $this->load->view('template/member/form_pelayanan', 2, $datacontent, $data);
        $this->load->view('template/footer');
    }

    public function rekap_keluhan()
    {
        $session_data = $this->session->userdata('sess_member');
        $datacontent['session'] = $session_data;
        $data['title'] = 'Tanggapan Permohonan Konsultasi';
        $this->load->view('template/header', $datacontent, $data);
        $this->load->view('template/sidebar', $datacontent, $data);
        $this->load->view('template/topbar', $datacontent, $data);
        $this->load->view('template/member/rekap_keluhan', 2, $datacontent);
        $this->load->view('template/footer');
    }


    private function _uploadImage()
    {
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        //$config['file_name']            = $this->product_id;
        $config['overwrite']            = true;
        $config['max_size']             = 5024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('ktp')) {
            return $this->upload->data();
        } else {
            return "default.jpg";
        }
    }



    public function submit_pengaduan()
    {

        $this->form_validation->set_rules('nama_permohon', 'Text', 'required|trim');
        $this->form_validation->set_rules('alamat_permohon', 'Text', 'required|trim');
        $this->form_validation->set_rules('tanggal_permohon', 'Text', 'required|trim');
        $this->form_validation->set_rules('no_agenda', 'Text', 'required|trim');
        $this->form_validation->set_rules('merek_meter', 'Text', 'required|trim');
        $this->form_validation->set_rules('seri_meter', 'Text', 'required|trim');
        $this->form_validation->set_rules('tgl_pengaduan', 'Text', 'required|trim');
        $this->form_validation->set_rules('tgl_pk', 'Text', 'required|trim');
        $this->form_validation->set_rules('tgl_meter', 'Text', 'required|trim');
        $this->form_validation->set_rules('jenis_keluhan', 'Text', 'required|trim');
        $this->form_validation->set_rules('catatan', 'Text', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->pengaduan_keluhan();
            //  $this->load->view('template/member/pendaftaran_konsultasi', $data);
        } else {
            $session_data = $this->session->userdata('sess_member');
            $data['no_kontrol'] = $session_data['no_kontrol'];
            $data['alamat_permohon'] = $this->input->post('alamat_permohon');
            $data['nama_permohon'] = $this->input->post('nama_permohon');
            $data['tanggal_permohon'] = $this->input->post('tanggal_permohon');
            $data['no_agenda'] = $this->input->post('no_agenda');

            $data['ukuran_meter'] = $this->input->post('ukuran_meter');
            $data['merek_meter'] = $this->input->post('merek_meter');
            $data['seri_meter'] = $this->input->post('seri_meter');
            $data['tgl_pengaduan'] = $this->input->post('tgl_pengaduan');
            $data['tgl_pk'] = $this->input->post('tgl_pk');
            $data['tgl_meter'] = $this->input->post('tgl_meter');
            $data['tgl_pasang'] = $this->input->post('tgl_pasang');
            $data['jenis_keluhan'] = $this->input->post('jenis_keluhan');
            $data['catatan'] = $this->input->post('catatan');


            $result = $this->MemberModel->tambah_keluhan($data);
        }
    }


    public function input_nilai()
    {

        $session_data = $this->session->userdata('sess_member');
        $id_user = $session_data['id_user'];
        $date = date('Y-m-d');
        $jumlah = 0;
        $data[0] = $this->input->post('pertanyaan1');
        $data[1] = $this->input->post('pertanyaan2');
        $data[2] = $this->input->post('pertanyaan3');
        $data[3] = $this->input->post('pertanyaan4');
        $data[4] = $this->input->post('pertanyaan5');
        $data[5] = $this->input->post('pertanyaan6');
        $data[6] = $this->input->post('pertanyaan7');
        $data[7] = $this->input->post('pertanyaan8');
        $data[8] = $this->input->post('pertanyaan9');

        for ($i = 0; $i < sizeof($data); $i++) {
            $jumlah = $jumlah + $data[$i];
        }
        $rata = $jumlah / sizeof($data);
        $result = $this->MemberModel->input_nilai($rata, $id_user, $date);

        echo json_decode($result);
    }

    public function get_tanggapan_konsultasi()
    {
        $session_data = $this->session->userdata('sess_member');
        $userid = $session_data['id_user'];
        $result = $this->MemberModel->get_konsultasi_userid($userid);
        echo json_encode($result);
    }

    public function get_rekap_keluhan()
    {
        $session_data = $this->session->userdata('sess_member');
        $no_kontrol = $session_data['no_kontrol'];
        $result = $this->MemberModel->get_all_keluhan($no_kontrol);
        echo json_encode($result);
    }

    public function get_rekap_tagihan()
    {
        $session_data = $this->session->userdata('sess_member');
        $no_kontrol = $session_data['no_kontrol'];
        $result = $this->MemberModel->get_all_tagihan($no_kontrol);
        echo json_encode($result);
    }

    public function get_personal_keluhan()
    {
        $id_keluhan = $this->input->GET('id_keluhan');
        $result = $this->MemberModel->get_personal_keluhan($id_keluhan);
        echo json_encode($result);
    }

    public function get_detail_pengumuman()
    {
        $id_pengumuman = $this->input->GET('id_pengumuman');
        $result = $this->MemberModel->get_detail_pengumuman($id_pengumuman);
        echo json_encode($result);
    }
}

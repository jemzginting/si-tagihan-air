<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MainControl extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('MainModel');
    }
    public function index()
    {

        if ($this->session->userdata('sess_admin')) {
            redirect("AdminControl", 'refresh');
        } else if ($this->session->userdata('sess_member')) {
            redirect("MemberControl", 'refresh');
        } else {
            redirect("AuthLogin");
        }
    }

    public function logout()
    {
        // $id_user = "";
        if ($this->session->userdata('sess_member')) {
            //$session_data = $this->session->userdata('sess_member');
            //$id_user = $session_data['id_user'];
            $this->session->unset_userdata('sess_member');
        } else if ($this->session->userdata('sess_admin')) {
            //$session_data = $this->session->userdata('sess_admin');
            //$id_user = $session_data['id_user'];
            $this->session->unset_userdata('sess_admin');
        }

        redirect('AuthLogin', 'refresh');
    }

    public function get_statistik_penilaian()
    {
        $buruk = $this->MainModel->get_statistik_buruk();
        $cukup = $this->MainModel->get_statistik_cukup();
        $baik = $this->MainModel->get_statistik_baik();
        $sangatbaik = $this->MainModel->get_statistik_sangatbaik();
        $statistik['buruk'] = $buruk[0]['banyak'];
        $statistik['cukup'] = $cukup[0]['banyak'];
        $statistik['baik'] = $baik[0]['banyak'];
        $statistik['sangatbaik'] = $sangatbaik[0]['banyak'];
        echo json_encode($statistik);
    }
}

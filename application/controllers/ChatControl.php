<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class ChatControl extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation', 'session');
        $this->load->model('ChatModel');
    }
    public function index()
    {
        $this->load->library('form_validation');
        if ($this->session->userdata('sess_admin')) {
            redirect("AdminControl", 'refresh');
        } else if ($this->session->userdata('sess_member')) {
            redirect("MemberControl", 'refresh');
        } else {
            redirect("AuthLogin");
        }
    }


    public function kirim_chat()
    {
        $this->form_validation->set_rules('user', 'User', 'required|trim');
        $this->form_validation->set_rules('pesan', 'Pesan', 'required|trim');
        $this->form_validation->set_rules('target', 'Target', 'required|trim');

        if ($this->form_validation->run() == false) {
            redirect("ChatControl/ambil_pesan");
            //echo "salah";
        } else {
            $userid = $this->input->post("user");
            $pesan = $this->input->post("pesan");
            $id_target =  $this->input->post("target");
            $result = $this->ChatModel->send_pesan($userid, $pesan, $id_target);
        }

        //echo json_encode($result);
        redirect("ChatControl/ambil_pesan");
    }

    public function ambil_pesan()
    {
        //$session_data = $this->session->userdata('sess_member');
        //$userid = $session_data['id_user'];
        $id_target = $this->input->GET('target');
        $userid = $this->input->get('user');
        // echo "OYYYY = " . $id_target;
        $tampil = $this->ChatModel->get_pesan($id_target, $userid);

        foreach ($tampil as $r) {
            if ($r['id_user'] == $userid) {
                echo "<li class='p-2 mb-1 rounded bg-default'><h5><b>$r[name]</b> : $r[pesan] </h5>(<i>$r[waktu]</i>)</li>";
            } else {
                echo "<li class='p-2 mb-1 rounded bg-success text-white'><h6>$r[name] : $r[pesan] </h6>(<i>$r[waktu]</i>)</li>";
            }
        }
    }
}

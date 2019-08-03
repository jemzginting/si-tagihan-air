<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthLogin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation', 'session');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|callback_check_database');

        if ($this->form_validation->run() == false) {

            $data['title'] = 'Login Page';
            $this->load->view('login', $data);
            //   $this->template->loginpage();
        } else {

            redirect('MainControl', 'refresh');
        }
    }

    function check_database($password)
    {
        //Field validation succeeded.  Validate against database
        $username = $this->input->post('username');

        //query the database
        $result = $this->AuthModel->login($username, md5($password));
        $sess_name = array(1 => "sess_admin", 2 => "sess_member");
        if ($result) {

            $sess_array = array();
            foreach ($result as $row) {

                $sess_array = array(
                    'id_user' => $row->id_user,
                    'name' => $row->name,
                    'username' => $row->username,
                    'nik' => $row->nik,
                    'email' => $row->email,
                    'role_id' => $row->role_id,
                    'image' => $row->image,
                );

                $this->session->set_userdata($sess_name[$row->id_role], $sess_array);

                /*
                $data_log['id_user'] = $row->id_user;
                $data_log['id_staff'] = $row->id_staff;
                $data_log['aktivitas'] = "Login ke sistem";
                $res_log = $this->LogModel->insert($data_log); */
            }
            return TRUE;
        } else {
            $this->form_validation->set_message('check_database', 'Invalid username or password');
            return false;
        }
    }


    /*
    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        //    $this->load->model('Auth_model');
        //    $this->Auth_model->login_model($username, $password);

        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        if ($user) {

            if ($user['is_active'] == 1) {

                if (password_verify($password, $user['password'])) {
                    $data = [
                        'username' => $user['username'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    } else {
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password !</div>');
                    redirect('login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This username has not been activated !</div>');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username is not registered !</div>');
            redirect('login');
        }
    }
*/
    public function register()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
            'is_unique' => 'This username has already registered!'
        ]);
        $this->form_validation->set_rules('nik', 'Nik', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[4]|matches[password2]', [
            'matches' => 'Password dont match',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Register';
            $this->load->view('register', $data);
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'nik' => htmlspecialchars($this->input->post('nik', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => md5($this->input->post('password1')),
                'image' => 'default.jpg',
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your account has been created. Please Login!</div>');
            redirect('login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You Have been Logout !</div>');
        redirect('login');
    }
}

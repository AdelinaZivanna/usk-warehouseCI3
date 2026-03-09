<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function index() {
        if ($this->session->userdata('email')) {
            $this->_redirect_by_role($this->session->userdata('role'));
        }
        $this->load->view('auth/login');
    }

    public function proses_login() {
        $email    = $this->input->post('email');
        $password = $this->input->post('password');
        $user     = $this->db->get_where('users', ['email' => $email])->row_array();

        if ($user && password_verify($password, $user['password'])) {
            $data = [
                'user_id' => $user['id'],
                'email'   => $user['email'],
                'role'    => $user['role'],
                'name'    => $user['name']
            ];
            $this->session->set_userdata($data);
            $this->_redirect_by_role($user['role']);
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Login Gagal!</div>');
            redirect('auth');
        }
    }

    private function _redirect_by_role($role) {
        if ($role == 'admin') redirect('admin');
        elseif ($role == 'manajer') redirect('manajer');
        else redirect('petugas');
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('auth');
    }
}
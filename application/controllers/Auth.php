<?php
defined('BASEPATH') or exit('No direct script access allowed');

class auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
   
    $this->load->library('form_validation');
    $this->load->model('Auth_model');
  }

  public function index()
  {
     sudah_login();
    $data['title'] = "Halaman Login";
    $this->load->view('auth/login', $data);
  }

  public function proses_login()
  {
    $post = $this->input->post(null, true);
    $login = $this->Auth_model->do_login_user($post);

    if ($login > 1) {
      redirect('beranda');
    }
  }

  public function logout()
  {
    $this->session->unset_userdata('user_id');
    redirect('auth');
  }

  public function setting()
  {
    $data['title'] = 'Ganti Password';
    $this->template->load('template', 'auth/ganti_pass', $data);
  }

  public function ubah_pwd()
  {
    $post = $this->input->post(null, true);
    $user = $this->Auth_model->get('tbl_user', $this->fungsi->user_login()->user_id, 'user_id')->row_array();
    if (sha1($post['pwd_awal']) == $user['password']) {
      if ($post['pwd1'] == $post['pwdk']) {
        $this->Auth_model->ubahPwd($post);
        if ($this->db->affected_rows() == 1) {
          $this->session->unset_userdata('user_id');
          redirect('auth');
        }
      } else {
        $this->session->set_flashdata('gagal', 'Konfirmasi Password Salah!');
        redirect('auth/setting');
      }
    } else {
      $this->session->set_flashdata('gagal', 'Password Saat ini salah!');
      redirect('auth/setting');
    }
  }
}

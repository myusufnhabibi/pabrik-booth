<?php

defined('BASEPATH') or exit('No direct script access allowed');

class home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Home_model']);
    }

    public function index()
    {
        $data['gallerys'] = $this->Home_model->get('pb_gallery', '1', 'status', null, null, null, '0', '4')->result_array();
        $data['produks'] = $this->Home_model->get('pb_produk', '1', 'status', null, null, null, '0', '8')->result_array();
        $data['testimonis'] = $this->Home_model->get('pb_testimoni', '1', 'status', null, null, null, '0', '4')->result_array();
        $data['terlaris'] = $this->Home_model->get('pb_produk', '1', 'terlaris', null, null, null, '0', '4')->result_array();
        $data['promo'] = $this->Home_model->get('pb_promo', '1', 'status')->row_array();
        $data['cek'] = $this->Home_model->get('pb_promo', '1', 'status')->num_rows();
        $this->template->load('template_fe', 'home/main', $data);
    }

    public function produk_modal($id) {
        $data['produk'] = $this->Home_model->get('pb_produk', $id, 'produk_id')->row_array();
        $data['foto_produk'] = $this->Home_model->get('pb_foto_produk', $id, 'produk_id')->result_array();
        $this->load->view('home/produk_modal', $data);
    }

    public function tentang_kami()
    {
        $data['klb'] = $this->Home_model->get_kontak('Ketua KLB')->row_array();
        $data['klbk'] = $this->Home_model->get_kontak('Ketua KLBK')->row_array();
        $data['ild'] = $this->Home_model->get_kontak('Ketua ILD')->row_array();
        $this->template->load('template_fe', 'home/tentang', $data);
    }

    public function kontak_tambah()
    {
        $post = $this->input->post(null, true);
        $this->Home_model->kontak_tambah($post);
        echo "success";
    }

    public function cara_order( )
    {
        $this->template->load('template_fe', 'home/cara_order');
    }

    public function kontak( )
    {
        $this->template->load('template_fe', 'home/kontak');
    }

    public function produk() {
        $data['produks'] = $this->Home_model->get('pb_produk')->result_array();
        $this->template->load('template_fe', 'home/produk', $data);
    }

    public function gallery() {
        $data['gallerys'] = $this->Home_model->get('pb_gallery')->result_array();
        $this->template->load('template_fe', 'home/gallery', $data);
    }

    public function error_404()
    {
        $this->output->set_status_header('404');
        $this->load->view('error_404');
    }
}


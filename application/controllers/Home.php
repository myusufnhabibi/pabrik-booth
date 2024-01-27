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
        $data['gallerys'] = $this->Home_model->get('pb_gallery', null, null, null, null, null, '0', '4')->result_array();
        $data['produks'] = $this->Home_model->get('pb_produk', null, null, null, null, null, '0', '8')->result_array();
        // $data['ketua'] = $this->Home_model->get_kontak('Ketua KLB')->row_array();
        // $data['jumlah_galery'] = $this->Home_model->get('tbl_galery')->num_rows();
        // $data['admin'] = $this->Home_model->get_kontak('Admin KLB')->row_array();
        // $data['kontaks'] = $this->Home_model->get('tbl_kontak')->result_array();
	    // $data['kegiatan_utama_cek'] = $this->Home_model->get('tbl_kegiatan', '1', 'status', null, null, 'tgl_buat', '0', '1')->num_rows();
	    // $data['kegiatan_lanjutan_cek'] = $this->Home_model->get('tbl_kegiatan', '1', 'status', null, null, 'tgl_buat', '1', '3')->num_rows();
        // $data['kegiatan_utama'] = $this->Home_model->get('tbl_kegiatan', '1', 'status', null, null, 'tgl_buat', '0', '1')->row_array();
        // $data['kegiatan_lanjutan'] = $this->Home_model->get('tbl_kegiatan', '1', 'status', null, null, 'tgl_buat', '1', '3')->result_array();

        $this->template->load('template_fe', 'home/main', $data);

    }



    public function tentang_kami()

    {

        $data['klb'] = $this->Home_model->get_kontak('Ketua KLB')->row_array();

        $data['klbk'] = $this->Home_model->get_kontak('Ketua KLBK')->row_array();

        $data['ild'] = $this->Home_model->get_kontak('Ketua ILD')->row_array();

        $this->template->load('template_fe', 'home/tentang', $data);

    }



    public function kegiatan_semua()

    {

        $data['kegiatans'] = $this->Home_model->get('tbl_kegiatan', '1', 'status')->result_array();

        $this->template->load('template_fe', 'home/kegiatan', $data);

    }



    public function katalog()

    {

        $this->template->load('template_fe', 'home/katalog');

    }



    public function kegiatan($id)

    {

        $data['kegiatan_detail'] = $this->Home_model->get('tbl_kegiatan', $id, 'url')->row_array();

        $data['kegiatan_foto'] = $this->Home_model->get('tbl_foto_kegiatan', $data['kegiatan_detail']['kegiatan_id'], 'kegiatan_id')->result_array();

        $data['cek'] = $this->Home_model->get('tbl_foto_kegiatan', $data['kegiatan_detail']['kegiatan_id'], 'kegiatan_id')->num_rows();

        $this->template->load('template_fe', 'home/kegiatan_detail', $data);

    }



    public function error_404()

    {

        $this->output->set_status_header('404');

        $this->load->view('error_404');

    }

}


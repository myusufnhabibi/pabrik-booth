
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class katalog extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['App_model']);
        
    }


    public function produk_list()
    {
        $db2 = $this->load->database('tokoklbi', TRUE);
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'katalog/produk_list';
        if ($this->input->post('submit')) {
            $keyword =  $this->input->post('keyword');
            $this->session->set_userdata('keyword', $keyword);
        } else if ($this->input->post('refresh')) {
            $keyword = $this->session->unset_userdata('keyword');
        } else {
            $keyword = $this->session->userdata('keyword');
        }

        // $db2->select('*');
        
        if ($keyword == '') {
            $db2->where('stok >', '0');
            $db2->from('tbl_produk');
            $db2->join('tbl_satuan', 'tbl_produk.kode_satuan = tbl_satuan.kode_satuan');
        } else {
            $db2->where('stok >', '0');
            $db2->like('nama_produk', $keyword);
            $db2->or_like('stok', $keyword);
            // $db2->or_like('nama_satuan', $keyword);
            $db2->or_like('harga_jual', $keyword);
            $db2->or_like('aktif', $keyword);
            $db2->from('tbl_produk');
            $db2->join('tbl_satuan', 'tbl_produk.kode_satuan = tbl_satuan.kode_satuan');
        }
        $config['total_rows'] = $db2->count_all_results();
        // $db2->get('tbl_produk')->num_rows();


        $config['per_page'] = 10;
        $this->pagination->initialize($config);
        $data['start'] = $this->uri->segment(3);
        $data['total_row'] = $config['total_rows'];
        $data['title'] = 'Produk';
        $data['produks'] = $this->App_model->get2('tbl_produk', null, null, 'tbl_satuan', 'kode_satuan', $config['per_page'], $data['start'], $keyword, 'nama_produk', 'stok', 'nama_satuan', 'harga_jual', 'aktif', 'stok >', '0')->result_array();
        // var_dump($db2->count_all_results());
        $this->template->load('template_fe', 'home/produk_list', $data);
    }

    public function produk_gambar()
    {
        $db2 = $this->load->database('tokoklbi', TRUE);
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'katalog/produk_gambar';
        if ($this->input->post('submit')) {
            $keyword =  $this->input->post('keyword');
            $this->session->set_userdata('keyword', $keyword);
        } else if ($this->input->post('refresh')) {
            $keyword = $this->session->unset_userdata('keyword');
        } else {
            $keyword = $this->session->userdata('keyword');
        }

        // $db2->select('*');
       if ($keyword == '') {
            $db2->where('stok >', '0');
            $db2->from('tbl_produk');
            $db2->join('tbl_satuan', 'tbl_produk.kode_satuan = tbl_satuan.kode_satuan');
        } else {
            $db2->where('stok >', '0');
            $db2->like('nama_produk', $keyword);
            $db2->or_like('stok', $keyword);
            // $db2->or_like('nama_satuan', $keyword);
            $db2->or_like('harga_jual', $keyword);
            $db2->or_like('aktif', $keyword);
            $db2->from('tbl_produk');
            $db2->join('tbl_satuan', 'tbl_produk.kode_satuan = tbl_satuan.kode_satuan');
        }
        $config['total_rows'] = $db2->count_all_results();
        // $db2->get2('tbl_produk')->num_rows();


        $config['per_page'] = 12;
        $this->pagination->initialize($config);
        $data['start'] = $this->uri->segment(3);
        $data['total_row'] = $config['total_rows'];
        $data['title'] = 'Gambar Produk';
        $data['produks'] = $this->App_model->get2('tbl_produk', null, null, 'tbl_satuan', 'kode_satuan', $config['per_page'], $data['start'], $keyword, 'nama_produk', 'stok', 'nama_satuan', 'harga_jual', 'aktif', 'stok >', '0')->result_array();
        // var_dump($db2->count_all_results());
        $this->template->load('template_fe', 'home/produk_gambar', $data);
    }
}

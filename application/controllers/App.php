<?php
defined('BASEPATH') or exit('No direct script access allowed');

class app extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        belum_login();
        $this->load->library('form_validation');
        $this->load->model('App_model');
    }

    public function beranda()
    {
        $data['title'] = "Beranda";
        $data['qna'] = $this->App_model->get('tbl_qna')->num_rows();
        $data['gallery'] = $this->App_model->get('pb_gallery')->num_rows();
        $data['produk'] = $this->App_model->get('pb_produk')->num_rows();
        $this->template->load('template', 'app/beranda', $data);
    }

    public function qna()
    {
        $data['title'] = "QnA";
        $data['qnas'] = $this->App_model->get('tbl_qna')->result_array();
        $this->template->load('template', 'app/qna', $data);
    }

    public function aqna()
    {
        $param = $this->uri->segment(3);
        if ($param) {
            $cek = $this->App_model->get('tbl_qna', $param, 'qna_id')->num_rows();
            if ($cek > 0) {
                $data['title'] = "Ubah QnA";
                $data['qna'] = $this->App_model->get('tbl_qna', $param, 'qna_id')->row_array();
            } else {
                redirect('app/qna');
            }
        } else {
            $data['title'] = "Tambah QnA";
        }
        $this->template->load('template', 'app/aqna', $data);
    }

    public function qna_tambah()
    {
        $post = $this->input->post(null, true);
        $this->App_model->qna_tambah($post);
        if ($this->db->affected_rows() == 1) {
            $this->session->set_flashdata('berhasil', 'Data QnA Berhasil ditambahkan');
            redirect('app/qna');
        }
    }

    public function qna_ubah()
    {
        $post = $this->input->post(null, true);
        $this->App_model->qna_ubah($post);
        if ($this->db->affected_rows() == 1) {
            $this->session->set_flashdata('berhasil', 'Data QnA Berhasil diubah');
            redirect('app/qna');
        }
    }

    public function del_qna($id)
    {
        // $id = $this->uri->segment(4);
        $this->db->where('qna_id', $id);
        $this->db->delete('tbl_qna');
        $this->session->set_flashdata('berhasil', 'Data QnA Berhasil dihapus');
        redirect('app/qna');
    }

    public function kontak()
    {
        $data['title'] = "Kontak";
        $data['kontaks'] = $this->App_model->get('tbl_kontak')->result_array();
        $this->template->load('template', 'app/kontak', $data);
    }

    public function akontak()
    {
        $param = $this->uri->segment(3);
        if ($param) {
            $cek = $this->App_model->get('tbl_kontak', $param, 'kontak_id')->num_rows();
            if ($cek > 0) {
                $data['title'] = "Ubah Kontak";
                $data['kontak'] = $this->App_model->get('tbl_kontak', $param, 'kontak_id')->row_array();
            } else {
                redirect('app/kontak');
            }
        } else {
            $data['title'] = "Tambah Kontak";
        }
        $this->template->load('template', 'app/akontak', $data);
    }

    public function kontak_tambah()
    {
        $post = $this->input->post(null, true);
	$level = $this->input->post('jabatan', true);
	$cek = $this->App_model->get('tbl_kontak', $level, 'jabatan')->num_rows();	
	if ($cek > 0) {
		$this->session->set_flashdata('gagal', 'Jabatan tersebut sudah ada, tinggal diubah saja!');
            redirect('app/kontak');
	}
        else {
		$this->App_model->kontak_tambah($post);
	    if ($this->db->affected_rows() == 1) {
            	$this->session->set_flashdata('berhasil', 'Data kontak Berhasil ditambahkan');
            	redirect('app/kontak');
	    }
        }
    }

    public function kontak_ubah()
    {
        $post = $this->input->post(null, true);
        $this->App_model->kontak_ubah($post);
        if ($this->db->affected_rows() == 1) {
            $this->session->set_flashdata('berhasil', 'Data kontak Berhasil diubah');
            redirect('app/kontak');
        }
    }

    public function del_kontak($id)
    {
        // $id = $this->uri->segment(4);
        $this->db->where('kontak_id', $id);
        $this->db->delete('tbl_kontak');
        $this->session->set_flashdata('berhasil', 'Data kontak Berhasil dihapus');
        redirect('app/kontak');
    }

    public function gallery()
    {
        $data['title'] = "Gallery";
        $data['use'] = true;
        $this->load->library('pagination');
        $config['base_url'] = base_url('app/gallery');
        $config['total_rows'] = $this->App_model->get('pb_gallery')->num_rows();
        $config['per_page'] = 8;
        $config['attributes'] = array('class' => 'page-link');
        $this->pagination->initialize($config);
        $from = $this->uri->segment(3);
        $data['gallerys'] = $this->App_model->get_gallery($config['per_page'], $from)->result_array();
        $data['cek'] = $this->App_model->get_gallery($config['per_page'], $from)->num_rows();
        $this->template->load('template', 'app/gallery', $data);
    }

    public function upload()
    {
        $ds          = DIRECTORY_SEPARATOR; //fungsinya untuk membuat garis /
        $storeFolder = realpath(FCPATH . 'assets/gambar/gallery/');
        $time = time() . "-";

        if (!empty($_FILES)) {

            $errors     = array();
            $maxsize    = 2097152; //2MB convert jadi byte
            $acceptable = array(
                'image/jpeg',
                'image/jpg',
                'image/png'
            );

            if (($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
                $errors[] = 'Ukuran File terlalu Besar! ';
            }

            if (!in_array($_FILES['file']['type'], $acceptable) && (!empty($_FILES["file"]["type"]))) {
                $errors[] = 'Ekstensi File Salah!';
            }

            if (count($errors) === 0) {

                $tempFile = $_FILES['file']['tmp_name'];
                $targetFile = $storeFolder . $ds . $time . $_FILES['file']['name'];
                move_uploaded_file($tempFile, $targetFile);

                $image_name = $time . $_FILES['file']['name'];
                $this->App_model->upload($image_name);

                $result = array('status' => 'sucesss');
                header('Content-type: text/json');
                header('Content-type: application/json');
                echo json_encode($result);
            } else {
                foreach ($errors as $error) {
                    echo '<script>alert("' . $error . '");</script>';
                }
                die();
            }
        } else {
            $result = array('status' => 'error');
            header('Content-type: text/json');
            header('Content-type: application/json');
            echo json_encode($result);
        }
    }

    public function del_gallery($id)
    {
        $row = $this->App_model->get('pb_gallery', $id, 'galery_id')->row_array();
        // $id = $this->uri->segment(4);
        $this->db->where('galery_id', $id);
        $this->db->delete('pb_gallery');
        unlink(realpath(FCPATH . 'assets/gambar/gallery/' . $row['foto']));
        // unlink($lokasi);
        $this->session->set_flashdata('berhasil', 'Data Gallery Berhasil dihapus ');
        redirect('app/gallery');
    }

    public function produk()
    {
        $data['title'] = "Produk";
        $data['produks'] = $this->App_model->get('pb_produk')->result_array();
        $this->template->load('template', 'app/produk', $data);
    }

    public function aproduk()
    {
        $param = $this->uri->segment(3);
        $data['use'] = true;
        if ($param) {
            $cek = $this->App_model->get('pb_produk', $param, 'produk_id')->num_rows();
            if ($cek > 0) {
                $data['title'] = "Ubah produk";
                $data['produk'] = $this->App_model->get('pb_produk', $param, 'produk_id')->row_array();
            } else {
                redirect('app/produk');
            }
        } else {
            $data['title'] = "Tambah produk";
        }
        $this->template->load('template', 'app/aproduk', $data);
    }

    public function eproduk()
    {
        $param = $this->uri->segment(3);
        $data['use'] = true;
        $cek = $this->App_model->get('pb_produk', $param, 'produk_id')->num_rows();
        if ($cek > 0) {
            $data['title'] = "Ubah Foto produk";
            $data['foto_lama'] = $this->App_model->get('pb_foto_produk', $param, 'produk_id')->result_array();
            $data['cek'] = $this->App_model->get('pb_foto_produk', $param, 'produk_id')->num_rows();
            $data['produk'] = $this->App_model->get('pb_produk', $param, 'produk_id')->row_array();
        } else {
            redirect('app/produk');
        }
        $this->template->load('template', 'app/eproduk', $data);
    }

    public function produk_tambah()
    {
        $config['upload_path'] = realpath(FCPATH . 'assets/gambar/thumbnail/'); //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
        $maxsize    = 1048576; //1MB convert jadi byte
        $acceptable = array(
            'image/jpeg',
            'image/jpg',
            'image/png'
        );
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        // $callback = '';
        if (!empty($_FILES['image']['name'])) {
            if (($_FILES['image']['size'] >= $maxsize) || ($_FILES["image"]["size"] == 0)) {
                $callback = 'ukuran';
                echo json_encode($callback);
            } else if (!in_array($_FILES['image']['type'], $acceptable) && (!empty($_FILES["image"]["type"]))) {
                $callback = 'ekstensi';
                echo json_encode($callback);
            } else {
                if ($this->upload->do_upload('image')) {
                    $gbr = $this->upload->data();
                    //Compress Image
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = realpath(FCPATH . 'assets/gambar/thumbnail/') . $gbr['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['quality'] = '50%';
                    $config['width'] = 600;
                    $config['height'] = 400;
                    $config['new_image'] = realpath(FCPATH . 'assets/gambar/thumbnail/') . $gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $gambar = $gbr['file_name'];
                    $id = $this->input->post('produk_id');
                    $judul = $this->input->post('nama');
                    $isi = html_entity_decode($this->input->post('isi'));
                    $harga = str_replace('.', '', $this->input->post('harga'));
                    $ukuran = "P" . $this->input->post('panjang') . " X L" . $this->input->post('lebar') . " X T" . $this->input->post('tinggi');
                    $status = $this->input->post('status');
                    $this->App_model->produk_tambah($id, $judul, $harga, $ukuran, $isi, $gambar, $status);
                    $callback = 'berhasil';
                    echo json_encode($callback);
                }
            }
        }
    }

    public function produk_ubah()
    {
        $post = $this->input->post(null, true);
        $this->App_model->produk_ubah($post);
        if ($this->db->affected_rows() == 1) {
            $this->session->set_flashdata('berhasil', 'Data produk Berhasil diubah');
            redirect('app/produk');
        }
    }

    public function del_produk($id)
    {
        $row = $this->App_model->get('pb_produk', $id, 'produk_id')->row_array();
        $data = $this->App_model->get('pb_foto_produk', $id, 'produk_id')->result_array();
        // $id = $this->uri->segment(4);
        $this->db->where('produk_id', $id);
        $this->db->delete('pb_produk');

        foreach ($data as $da) {
            unlink(realpath(FCPATH . 'assets/gambar/produk/' . $da['foto']));
        }

        $this->db->where('produk_id', $id);
        $this->db->delete('pb_foto_produk');

        unlink(realpath(FCPATH . 'assets/gambar/thumbnail/' . $row['thumbnail']));

        $this->session->set_flashdata('berhasil', 'Data produk Berhasil dihapus');
        redirect('app/produk');
    }

    public function upload2()
    {
        $ds          = DIRECTORY_SEPARATOR; //fungsinya untuk membuat garis /
        $storeFolder = realpath(FCPATH . 'assets/gambar/produk/');
        $time = time() . "-";

        if (!empty($_FILES)) {

            $errors     = array();
            $maxsize    = 2097152; //2MB convert jadi byte
            $acceptable = array(
                'image/jpeg',
                'image/jpg',
                'image/png'
            );

            if (($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
                $errors[] = 'Ukuran File terlalu Besar! ';
            }

            if (!in_array($_FILES['file']['type'], $acceptable) && (!empty($_FILES["file"]["type"]))) {
                $errors[] = 'Ekstensi File Salah!';
            }

            if (count($errors) === 0) {

                $tempFile = $_FILES['file']['tmp_name'];
                $targetFile = $storeFolder . $ds . $time . $_FILES['file']['name'];
                move_uploaded_file($tempFile, $targetFile);

                $image_name = $time . $_FILES['file']['name'];
                $id = $_POST['produk_id'];
                $this->App_model->upload2($image_name, $id);

                $result = array('status' => 'sucesss');
                header('Content-type: text/json');
                header('Content-type: application/json');
                echo json_encode($result);
            } else {
                foreach ($errors as $error) {
                    echo '<script>alert("' . $error . '");</script>';
                }
                die();
            }
        } else {
            $result = array('status' => 'error');
            header('Content-type: text/json');
            header('Content-type: application/json');
            echo json_encode($result);
        }
    }

    public function set_status($id)
    {
        $status = $this->uri->segment(4);
        if ($status == '0') {
            $this->App_model->set_status($id, '1');
            $this->session->set_flashdata('berhasil', 'Produk Berhasil dipublish');
        } else {
            $this->App_model->set_status($id, '0');
            $this->session->set_flashdata('berhasil', 'Produk Berhasil masuk draft');
        }
        redirect('app/produk');
    }

    public function del_fk($id)
    {
        $row = $this->App_model->get('pb_foto_produk', $id, 'id')->row_array();
        $kid = $this->uri->segment(4);
        $this->db->where('id', $id);
        $this->db->delete('pb_foto_produk');
        unlink(realpath(FCPATH . 'assets/gambar/produk/' . $row['foto']));
        // unlink($lokasi);
        $this->session->set_flashdata('berhasil', 'Data Foto produk Berhasil dihapus ');
        redirect('app/eproduk/' . $kid);
    }

    public function dproduk($id)
    {
        $data['title'] = "Detail produk";
        $data['fotos'] = $this->App_model->get('pb_foto_produk', $id, 'produk_id')->result_array();
        $data['cek'] = $this->App_model->get('pb_foto_produk', $id, 'produk_id')->num_rows();
        $data['produk'] = $this->App_model->get('pb_produk', $id, 'produk_id')->row_array();
        $this->template->load('template', 'app/dproduk', $data);
    }

    public function aaproduk()
    {
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'master/produk';
        if ($this->input->post('submit')) {
            $keyword =  $this->input->post('keyword');
            $this->session->set_userdata('keyword', $keyword);
        } else if ($this->input->post('refresh')) {
            $keyword = $this->session->unset_userdata('keyword');
        } else {
            $keyword = $this->session->userdata('keyword');
        }

        // $this->db->select('*');
        $this->db->like('nama_produk', $keyword);
        $this->db->or_like('stok', $keyword);
        // $this->db->or_like('nama_satuan', $keyword);
        $this->db->or_like('harga_jual', $keyword);
        $this->db->or_like('aktif', $keyword);
        $this->db->from('pb_produk', null, null, 'tbl_satuan', 'kode_satuan');
        $config['total_rows'] = $this->db->count_all_results();
        // $this->db->get('pb_produk')->num_rows();


        $config['per_page'] = 10;
        $this->pagination->initialize($config);
        $data['start'] = $this->uri->segment(3);
        $data['total_row'] = $config['total_rows'];
        $data['title'] = 'Produk';
        $data['produks'] = $this->App_model->get2('pb_produk', null, null, 'tbl_satuan', 'kode_satuan', $config['per_page'], $data['start'], $keyword, 'nama_produk', 'stok', 'nama_satuan', 'harga_jual', 'aktif')->result_array();
        // var_dump($this->db->count_all_results());
        $this->template->load('partials/template', 'produk', $data);
    }

    public function produk_gambar()
    {
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'master/produk_gambar';
        if ($this->input->post('submit')) {
            $keyword =  $this->input->post('keyword');
            $this->session->set_userdata('keyword', $keyword);
        } else if ($this->input->post('refresh')) {
            $keyword = $this->session->unset_userdata('keyword');
        } else {
            $keyword = $this->session->userdata('keyword');
        }

        // $this->db->select('*');
        $this->db->like('nama_produk', $keyword);
        $this->db->or_like('stok', $keyword);
        // $this->db->or_like('nama_satuan', $keyword);
        $this->db->or_like('harga_jual', $keyword);
        $this->db->or_like('aktif', $keyword);
        $this->db->from('pb_produk', null, null, 'tbl_satuan', 'kode_satuan');
        $config['total_rows'] = $this->db->count_all_results();
        // $this->db->get2('pb_produk')->num_rows();


        $config['per_page'] = 10;
        $this->pagination->initialize($config);
        $data['start'] = $this->uri->segment(3);
        $data['total_row'] = $config['total_rows'];
        $data['title'] = 'Gambar Produk';
        $data['produks'] = $this->App_model->get2('pb_produk', null, null, 'tbl_satuan', 'kode_satuan', $config['per_page'], $data['start'], $keyword, 'nama_produk', 'stok', 'nama_satuan', 'harga_jual', 'aktif')->result_array();
        // var_dump($this->db->count_all_results());
        $this->template->load('partials/template', 'produk_gambar', $data);
    }
}

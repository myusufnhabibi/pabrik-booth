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
        $data['testimoni'] = $this->App_model->get('pb_testimoni')->num_rows();
        $data['gallery'] = $this->App_model->get('pb_gallery')->num_rows();
        $data['produk'] = $this->App_model->get('pb_produk')->num_rows();
        $this->template->load('template', 'app/beranda', $data);
    }

    public function promo()
    {
        $data['title'] = "Promo";
        $data['promos'] = $this->App_model->get('pb_promo')->result_array();
        $this->template->load('template', 'app/promo', $data);
    }

    public function apromo()
    {
        $param = $this->uri->segment(3);
        if ($param) {
            $cek = $this->App_model->get('pb_promo', $param, 'id')->num_rows();
            if ($cek > 0) {
                $data['title'] = "Ubah Promo";
                $data['promo'] = $this->App_model->get('pb_promo', $param, 'id')->row_array();
            } else {
                redirect('app/promo');
            }
        } else {
            $data['title'] = "Tambah Promo";
        }
        $this->template->load('template', 'app/apromo', $data);
    }

    public function promo_tambah()
    {
        $post = $this->input->post(null, true);
        $this->App_model->promo_tambah($post);
        if ($this->db->affected_rows() == 1) {
            $this->session->set_flashdata('berhasil', 'Data Promo Berhasil ditambahkan');
            redirect('app/promo');
        }
    }

    public function promo_ubah()
    {
        $post = $this->input->post(null, true);
        $this->App_model->promo_ubah($post);
        if ($this->db->affected_rows() == 1) {
            $this->session->set_flashdata('berhasil', 'Data Promo Berhasil diubah');
            redirect('app/promo');
        }
    }

    public function del_promo($id)
    {
        // $id = $this->uri->segment(4);
        $this->db->where('id', $id);
        $this->db->delete('pb_promo');
        $this->session->set_flashdata('berhasil', 'Data Promo Berhasil dihapus');
        redirect('app/promo');
    }

    public function setting()
    {
        $data['title'] = "Setting";
        $data['setting'] = $this->App_model->get('pb_setting', 'PBCI9', 'id')->row_array();
        $this->template->load('template', 'app/setting', $data);
    }

    public function asetting()
    {
        $param = $this->uri->segment(3);
        if ($param) {
            $cek = $this->App_model->get('pb_setting', $param, 'setting_id')->num_rows();
            if ($cek > 0) {
                $data['title'] = "Ubah setting";
                $data['setting'] = $this->App_model->get('pb_setting', $param, 'setting_id')->row_array();
            } else {
                redirect('app/setting');
            }
        } else {
            $data['title'] = "Tambah setting";
        }
        $this->template->load('template', 'app/asetting', $data);
    }

    public function setting_ubah()
    {
        $post = $this->input->post(null, true);
        $this->App_model->setting_ubah($post);
        if ($this->db->affected_rows() == 1) {
            $this->session->set_flashdata('berhasil', 'Data setting Berhasil Diupdate');
            redirect('app/setting');
        }
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

    public function testimoni()
    {
        $data['title'] = "Testimoni";
        $data['use'] = true;
        $this->load->library('pagination');
        $config['base_url'] = base_url('app/testimoni');
        $config['total_rows'] = $this->App_model->get('pb_testimoni')->num_rows();
        $config['per_page'] = 8;
        $config['attributes'] = array('class' => 'page-link');
        $this->pagination->initialize($config);
        $from = $this->uri->segment(3);
        $data['testimonis'] = $this->App_model->get_testimoni($config['per_page'], $from)->result_array();
        $data['cek'] = $this->App_model->get_testimoni($config['per_page'], $from)->num_rows();
        $this->template->load('template', 'app/testimoni', $data);
    }

    public function upload()
    {
        $ds          = DIRECTORY_SEPARATOR;
        if ($_POST['param'] == 'gallery') {
            $storeFolder = realpath(FCPATH . 'assets/gambar/gallery/');
        } else if ($_POST['param'] == 'testimoni') {
            $storeFolder = realpath(FCPATH . 'assets/gambar/testimoni/');
        } else if ($_POST['param'] == 'produk') {
            $storeFolder = realpath(FCPATH . 'assets/gambar/produk/');
        }
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
                if ($_POST['param'] == 'gallery') {
                    $this->App_model->upload_gallery($image_name);
                } else if ($_POST['param'] == 'testimoni') {
                    $this->App_model->upload_testimoni($image_name);
                }  else if ($_POST['param'] == 'produk') {
                    $id = $_POST['produk_id'];
                    $this->App_model->upload_produk($image_name, $id);
                }

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

    public function del_testimoni($id)
    {
        $row = $this->App_model->get('pb_testimoni', $id, 'id')->row_array();
        $this->db->where('id', $id);
        $this->db->delete('pb_testimoni');
        unlink(realpath(FCPATH . 'assets/gambar/testimoni/' . $row['testimoni']));
        // unlink($lokasi);
        $this->session->set_flashdata('berhasil', 'Data Testimoni Berhasil dihapus ');
        redirect('app/testimoni');
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
                    $type = $this->input->post('type');
                    if ($type == '1') {
                        $nominal = $this->input->post('persen');
                    } else if ($type == '2') {
                        $nominal = str_replace('.', '', $this->input->post('nominal'));
                    }
                    $this->App_model->produk_tambah($id, $judul, $harga, $type, $nominal, $ukuran, $isi, $gambar, $status);
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

    public function set_publish($id)
    {
        $status = $this->uri->segment(4);
        $key = $this->uri->segment(5);

        if ($key == 'gallery') {
            $limit = 3;
            $primary_key = 'galery_id';
            $tabel = 'pb_gallery';
        } else if($key == 'testimoni') {
            $limit = 5;
            $primary_key = 'id';
            $tabel = 'pb_testimoni';
        }

        $query = "SELECT * FROM " . $tabel;
        $query .= " WHERE status = '1'"; 
        $cek = $this->db->query($query)->num_rows();

        if (strval($status) == '0') {
            if ($cek >= $limit) {
                $this->session->set_flashdata('gagal', 'Gagal dipublish, Ketentuannya hanya bisa Publish ' . $limit . ' Gambar');
            } else {
                $this->App_model->set_publish($id, '1', $primary_key, $tabel);
                $this->session->set_flashdata('berhasil', ucfirst($key) . ' Berhasil dipublish');
            }
        } else {
            $this->App_model->set_publish($id, '0', $primary_key, $tabel);
            $this->session->set_flashdata('berhasil', ucfirst($key) . ' Berhasil diunpublish');
        }
        
        redirect('app/' . $key);
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
}

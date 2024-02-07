<?php

class App_model extends CI_Model
{
    public function get($tb, $id = null, $param = null, $tb2 = null, $param2 = null)
    {
        $this->db->select('*');
        $this->db->from($tb);
        if ($tb2 != null) {
            $this->db->join($tb2, $param2 = $param2);
        }
        if ($id != null) {
            $this->db->where($param, $id);
        }
        // $this->db->order_by($order, 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function get2($tb, $id = null, $param = null, $tb2 = null, $param2 = null, $limit = null, $end = null, $like = null, $key1 = null, $key2 = null, $key3 = null, $key4 = null, $key5 = null, $tb3 = null, $id3 = null)
    {
        $db2 = $this->load->database('tokoklbi', TRUE);
        $db2->select('*');
        $db2->from($tb);
        if ($tb2 != null) {
            $db2->join($tb2, $param2 = $param2);
        }
        if ($id != null) {
            $db2->where($param, $id);
        }
        if ($tb3 != null) {
            $db2->where($tb3, $id3);
        }
        if ($like != null) {
            $db2->like($key1, $like);
            $db2->or_like($key2, $like);
            $db2->or_like($key3, $like);
            $db2->or_like($key4, $like);
            $db2->or_like($key5, $like);
        }
        if ($limit != null) {
            $db2->limit($limit, $end);
        }
        // $db2->order_by($order, 'DESC');
        $query = $db2->get();
        return $query;
    }


    public function promo_tambah($post)
    {
        $cek = $this->db->query("SELECT id from pb_promo WHERE status = '1'")->num_rows();
        $data = $this->db->query("SELECT id from pb_promo WHERE status = '1'")->row_array();
        if ($post['status'] == '1') {
            if ($cek > 0) {
                $this->db->where('id', $data['id']);
                $this->db->update('pb_promo', ['status' => '0']);
            }
        }
        
        $param = [
            'judul' => ucfirst($post['judul']),
            'value' => $post['keterangan'],
            'status' => $post['status'],
        ];
        $this->db->insert('pb_promo', $param);
    }

    public function promo_ubah($post)
    {
        $cek = $this->db->query("SELECT id from pb_promo WHERE status = '1'")->num_rows();
        $data = $this->db->query("SELECT id from pb_promo WHERE status = '1'")->row_array();
        if ($post['status'] == '1') {
            if ($cek > 0) {
                $this->db->where('id', $data['id']);
                $this->db->update('pb_promo', ['status' => '0']);
            }
        }
        
        $param['judul'] = ucfirst($post['judul']);
        $param['value'] = $post['keterangan'];
        $param['status'] = $post['status'];
        $this->db->where('id', $post['id']);
        $this->db->update('pb_promo', $param);
    }

    public function setting_ubah($post)
    {
        $param = [
            'nama' => $post['nama'],
            'email' => $post['email'],
            'alamat' => $post['alamat'],
            'nomer' => $post['nomer'],
            'fb' => $post['fb'],
            'ig' => $post['ig'],
            'tt' => $post['tiktok'],
        ];
        if (!empty($_FILES['image']['name'])) {
            $row = $this->get('pb_setting', $post['setting_id'], 'id')->row_array();
            if ($row['logo'] != '' || $row['logo'] != null) {
                unlink(FCPATH . 'assets/gambar/' . $row['logo']);
            }
            $param['logo'] = $this->uploadImage('image', 'assets/gambar');
        } else {
            $param['logo'] = $post['lama'];
        }
        $this->db->where('id', $post['setting_id']);
        $this->db->update('pb_setting', $param);
    }

    function get_gallery($number, $offset)
    {
        return $this->db->get('pb_gallery', $number, $offset);
    }

    function get_testimoni($number, $offset)
    {
        return $this->db->get('pb_testimoni', $number, $offset);
    }

    public function upload_gallery($post)
    {
        $param = [
            'foto' => $post,
            'tgl_foto' => date('Y-m-d')
        ];
        $this->db->insert('pb_gallery', $param);
    }

    public function upload_testimoni($post)
    {
        $param = [
            'testimoni' => $post,
            'created_at' => date('Y-m-d H:i:s')
        ];
        $this->db->insert('pb_testimoni', $param);
    }

    public function upload_produk($post, $id)
    {
        $param = [
            'foto' => $post,
            'produk_id' => $id
        ];
        $this->db->insert('pb_foto_produk', $param);
    }

    public function produk_tambah($id, $judul, $harga, $type, $nominal, $ukuran, $isi, $thumbnail, $status)
    {
        $custom_url = strtolower(str_replace(' ', '-', $judul));
        $param = [
            'produk_id' => $id,
            'nama' => $judul,
            'harga' => $harga, 
            'diskon' => $type, 
            'nominal_diskon' => $nominal, 
            'ukuran' => $ukuran,
            'keterangan' => $isi,
            'thumbnail' => $thumbnail,
            'status' => $status,
            'slug' => $custom_url . '.html',
            'created_at' => date('Y-m-d H:i:s'),
        ];
        $this->db->insert('pb_produk', $param);
    }

    public function produk_ubah($post)
    {
        $custom_url = strtolower(str_replace(' ', '-', $post['judul']));
        $param['nama'] = ucfirst($post['judul']);
        $param['keterangan'] = html_entity_decode($post['isi']);
        $param['harga'] = str_replace('.', '', $post['harga']);
        $param['diskon'] = $post['type'];
        if ($post['type'] == '1') {
            $param['nominal_diskon'] = $post['persen'];
        } else  if ($post['type'] == '2') {
            $param['nominal_diskon'] = str_replace('.', '', $post['nominal']);;
        } else {
            $param['nominal_diskon'] = 0;
        }
        $param['ukuran'] = "P" . $post['panjang'] . " X L" . $post['lebar'] . " X T" . $post['tinggi'];
        $param['slug'] = $custom_url . '.html';
        if (!empty($_FILES['image']['name'])) {
            $row = $this->get('pb_produk', $post['produk_id'], 'produk_id')->row_array();
            if ($row['thumbnail'] != '' || $row['thumbnail'] != null) {
                unlink(FCPATH . 'assets/gambar/thumbnail/' . $row['thumbnail']);
            }
            $param['thumbnail'] = $this->uploadImage('image', 'assets/gambar/thumbnail');
        } else {
            $param['thumbnail'] = $post['lama'];
        }
        $this->db->where('produk_id', $post['produk_id']);
        $this->db->update('pb_produk', $param);
    }

    public function set_status($id, $status)
    {
        $param['status'] = $status;
        $this->db->where('produk_id', $id);
        $this->db->update('pb_produk', $param);
    }

    public function set_publish($id, $status, $primary, $tabel, $kolom)
    {
        $param = [
            $kolom => $status
        ];
        // $param['status'] = $status;
        $this->db->where($primary, $id);
        $this->db->update($tabel, $param);
    }

    private function uploadImage($param, $lokasi)
    {
        $directory = realpath(FCPATH . $lokasi);
        $config['upload_path'] = $directory;
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size']     = '1048';
        $config['file_name']  = round(microtime(true) * 1000);

        $this->load->library('upload', $config);
        if ($this->upload->do_upload($param)) {
            $data = array('upload_data' => $this->upload->data());
            $config['image_library'] = 'gd2';
            $config['source_image'] = $directory . '/' . $data['upload_data']['file_name']; 
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = FALSE;
            // $config['quality'] = '60%';
            // $config['width'] = 280;
            // $config["height"] = 320;
            $config['new_image'] = $directory . '/' . $data['upload_data']['file_name']; 
            $this->load->library('image_lib', $config); 
            $this->image_lib->resize();

            $image = $data['upload_data']['file_name'];

            // return $this->upload->data('file_name');
            return $image;
        } else {
            echo $this->upload->display_errors();
        }
    }
}

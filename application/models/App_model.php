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


    public function qna_tambah($post)
    {
        $param = [
            'pertanyaan' => ucfirst($post['pertanyaan']),
            'jawaban' => $post['jawaban']
        ];
        $this->db->insert('tbl_qna', $param);
    }

    public function qna_ubah($post)
    {
        $param['pertanyaan'] = ucfirst($post['pertanyaan']);
        $param['jawaban'] = $post['jawaban'];
        $this->db->where('qna_id', $post['id']);
        $this->db->update('tbl_qna', $param);
    }

    public function kontak_tambah($post)
    {
        $param = [
            'nama_kontak' => ucfirst($post['nama']),
            'nomer_kontak' => $post['nomer'],
            'jabatan' => $post['jabatan']
        ];
        $this->db->insert('tbl_kontak', $param);
    }

    public function kontak_ubah($post)
    {
        $param = [
            'nama_kontak' => ucfirst($post['nama']),
            'nomer_kontak' => $post['nomer'],
            'jabatan' => $post['jabatan']
        ];
        $this->db->where('kontak_id', $post['id']);
        $this->db->update('tbl_kontak', $param);
    }

    function get_gallery($number, $offset)
    {
        return $this->db->get('pb_gallery', $number, $offset);
    }

    public function upload($post)
    {
        $param = [
            'foto' => $post,
            'tgl_foto' => date('Y-m-d')
        ];
        $this->db->insert('pb_gallery', $param);
    }

    public function upload2($post, $id)
    {
        $param = [
            'foto' => $post,
            'produk_id' => $id
        ];
        $this->db->insert('pb_foto_produk', $param);
    }

    public function produk_tambah($id, $judul, $harga, $ukuran, $isi, $thumbnail, $status)
    {
        $custom_url = strtolower(str_replace(' ', '-', $judul));
        $param = [
            'produk_id' => $id,
            'nama' => $judul,
            'harga' => $harga,
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
        $param['ukuran'] = "P" . $post['panjang'] . " X L" . $post['lebar'] . " X T" . $post['tinggi'];
        $param['slug'] = $custom_url . '.html';
        if (!empty($_FILES['image']['name'])) {
            $row = $this->get('pb_produk', $post['produk_id'], 'produk_id')->row_array();
            if ($row['thumbnail'] != '' || $row['thumbnail'] != null) {
                unlink(FCPATH . 'assets/gambar/thumbnail/' . $row['thumbnail']);
            }
            $param['thumbnail'] = $this->uploadImage('image');
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

    private function uploadImage($param)
    {
        $config['upload_path'] = realpath(FCPATH . 'assets/gambar/thumbnail');
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size']     = '1048';
        $config['file_name']  = round(microtime(true) * 1000);

        $this->load->library('upload', $config);
        if ($this->upload->do_upload($param)) {
            return $this->upload->data('file_name');
        } else {
            echo $this->upload->display_errors();
        }
    }
}

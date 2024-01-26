<?php

class Fungsi
{
    function user_login()
    {
        $ci = get_instance();
        $ci->load->model('Auth_model');
        $sesi = $ci->session->userdata('user_id');
        $hasil = $ci->Auth_model->get('tbl_user', $sesi, 'user_id')->row();
        return $hasil;
    }

    function kode_otomatis($param3)
    {
        $ci = get_instance();
        $query = "SELECT MAX(substr(produk_id, 4, 3)) as kode from pb_produk";
        $ambil = $ci->db->query($query)->row_array();

        $tambah = $ambil['kode'] == null ? 0 : (int)$ambil['kode'];
        $tambah = $tambah + 1;
        // return $tambah;
        if (($tambah > 10 and $tambah > 100) or $tambah == 100) {
            return "$param3" . $tambah;
        } elseif ($tambah > 10 or $tambah == 10) {
            return "$param3" . "0" . $tambah;
        } else {
            return "$param3" . "00" . $tambah;
        }
    }

}

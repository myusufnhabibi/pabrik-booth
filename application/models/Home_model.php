<?php

class Home_model extends CI_Model
{
    public function get($tb, $id = null, $param = null, $tb2 = null, $param2 = null, $order = null, $offset = null, $limit = null)
    {
        $this->db->select('*');
        $this->db->from($tb);
        if ($tb2 != null) {
            $this->db->join($tb2, $param2 = $param2);
        }
        if ($id != null) {
            $this->db->where($param, $id);
        }
        $this->db->order_by($order, 'DESC');
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query;
    }

    public function get_kontak($arg)
    {
        return $this->db->query("SELECT nama_kontak, nomer_kontak, jabatan FROM tbl_kontak WHERE jabatan = '$arg' LIMIT 1");
    }
  
  	public function get_site() {
		$this->db->select('url, tgl_buat');
		$this->db->where('status','1');
	    return $this->db->order_by('tgl_buat', 'desc')->get('tbl_kegiatan')->result_array();
	}
}

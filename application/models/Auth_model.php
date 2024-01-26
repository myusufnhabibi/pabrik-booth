<?php

class Auth_model extends CI_Model
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

    public function do_login_user($post)
    {
        $user = $this->db->get_where('tbl_user', ['username' => $post['username']])->row_array();

        if ($user) {
            if (sha1($post['password']) == $user['password']) {
                $data = [
                    'user_id' => $user['user_id'],
                ];
                $this->session->set_userdata($data);
                redirect('app/beranda');
            } else {
                $this->session->set_flashdata('pesan', 'Username/ Password anda salah');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('pesan', 'Username/ Password anda salah');
            redirect('auth');
        }
    }

    public function ubahPwd($post)
    {
        $param['password'] = sha1($post['pwd1']);
        $this->db->where('user_id', $this->fungsi->user_login()->user_id);
        $this->db->update('tbl_user', $param);
    }
}

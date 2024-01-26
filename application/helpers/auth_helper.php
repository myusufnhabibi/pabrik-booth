<?php

function belum_login()
{
    $ci = get_instance();
    $user_id = $ci->session->userdata('user_id');
    if (!$user_id) {
        redirect('auth');
    }
}

function sudah_login()
{
    $ci = get_instance();
    $user_id = $ci->session->userdata('user_id');
    if ($user_id) {
        redirect('app/beranda');
    }
}

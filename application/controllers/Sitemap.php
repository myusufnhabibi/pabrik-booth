<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class sitemap extends CI_Controller {

	public function index(){
		$this->load->model('Home_model');
		$post = $this->Home_model->get_site();
        $data = [
            'post'   => $post,
        ];
        $this->load->view('sitemap', $data);
	}

}
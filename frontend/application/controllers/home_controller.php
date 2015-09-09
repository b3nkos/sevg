<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Home_controller extends CI_Controller {

	public function index() {
		$response['content'] = 'home';
		$response['title'] = 'Index';
		$this->load->view('includes/template', $response);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/home.php */

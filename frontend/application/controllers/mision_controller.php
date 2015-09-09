<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mision_controller extends CI_Controller {

	public function index() {
		$response['content'] = 'mision/index';
		$response['title'] = 'Misión';
		$this->load->view('includes/template', $response);
	}

}

/* End of file mision_controller.php */
/* Location: ./application/controllers/mision_controller.php */
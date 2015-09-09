<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Evento_controller extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('evento_model');
		$this->load->helper('date');
	}

	public function index() {
		if($this->session->userdata('Email') === FALSE)
			redirect('home');
		$response['title'] = 'Evento';
		$response['content'] = 'evento/index';
		$response['eventos'] = $this->evento_model->get_events();
		$this->load->view('includes/template', $response);
	}

	public function get_event($eventId) {
		echo json_encode( $this->evento_model->get_events($eventId) );
		return true;
	}

}

/* End of file evento_controller.php */
/* Location: ./application/controllers/evento_controller.php */
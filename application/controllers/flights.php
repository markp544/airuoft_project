<?php
class Flights extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	public function index() {
		$this->load->helper(array('form', 'url'));
		$this->load->model('flights_model');
		
		$flights = $this->flights_model->getFlights();
		
		$data['flights'] = $flights;
		
		$data['title'] = 'Flights Available';
		$data['main'] = 'flights_view.php';	//??
		
		$this->load->view('flights_view',$data);

	}
}
?>
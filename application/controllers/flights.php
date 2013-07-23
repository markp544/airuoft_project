<?php
class Flights extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	public function index() {
		$this->load->model('flights_model');
		
		$flights = $this->flights_model->getFlights();
		$campus = $this->flights_model->get_campus_table();
		
		$data['flights'] = $flights;
		$data['campus'] = $campus;
		
		$data['title'] = 'Flights Available';
		$data['main'] = 'flights.php';	//??
		//print_r($data['flights']);
		$this->load->view('flights',$data);

	}
}
?>
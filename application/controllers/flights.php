<?php
class Flights extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	public function index() {
		$this->load->model('Flights_model');
		
		$flights = $this->Flights_model->getFlights();
		
		$data['flights'] = $flights;
		
		$data['title'] = 'Flights Avaiable';
		$data['main'] = 'flights.php';
		
		$this->load->view('flights',$data);

	}
}
?>
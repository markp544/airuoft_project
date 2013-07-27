<?php
class Seats extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->database();
	}
	
	public function index() {
		$this->load->helper('url');
		//$data['main'] = 'seatview.php';
		$data['main'] = 'seatview2.php';
		$data['seat1'] = "white";
		$data['seat2'] = "yellow";
		$data['seat3'] = "green";
		$this->load->view('template',$data);
	}
	
	public function getSeats($fid) {
		$this->load->helper('url');
		$this->load->model('seats_model');
		$seats = $this->seats_model->getSeats($fid);
		$data['seats'] = $seats;
		$data['title'] = "Seat Selection";
		$data['main'] = 'seatview2.php';
		$this->load->view('template',$data);
	}
}
?>
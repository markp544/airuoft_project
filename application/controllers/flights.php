<?php
class Flights extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
	}
	
	public function index() {
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
				
		
		//Validation rules.
		$this->form_validation->set_rules('date','Date','required|callback_validDate');
		$this->form_validation->set_rules('campus','Campus','required|preg_match("/[12]{1}/",$campus)==1');
		
		if($this->form_validation->run() == FALSE) {
			$this->form_validation->set_message('required','Validate form BITCH!!!');
			$data['main'] = 'index';
		} else {
			//Getting data from the view.
			$data['campus'] = $this->input->post('campus');
			$dates = $this->input->post('date');
			$data['date'] = $this->convertDate($dates);
			//var_dump($data['date']);
			//var_dump($data['campus']);

			$this->load->model('flights_model');
			$flights = $this->flights_model->getFlights($data['campus'],$data['date']);

			$data['flights'] = $flights;

			//var_dump($flights);
			$data['title'] = 'Flights Available';
			$data['main'] = 'flights_view.php';	//??
		}
		
		$this->load->view('template',$data);	//?
	}
	
	public function convertDate($date) {
		$this->load->helper('date');

		//Convert the date and pass the converted date to the model.
		$date = trim($date);
		$months = array('Jan'=>'01','Feb'=>'02','Mar'=>'03','Apr'=>'04','May'=>'05',
				'Jun'=>'06','Jul'=>'07','Aug'=>'08','Sep'=>'09','Oct'=>'10','Nov'=>'11','Dec'=>'12');
		$month = substr($date,4,3);
		$day = substr($date,8,2);
		$year = substr($date,11,4);
		$unix_time = gmmktime(0,0,0,$months[$month]*1,$day*1,$year*1);
		$date_res = substr(unix_to_human($unix_time),0,10);
		
		return $date_res;
	} 
	
	//A callback function to assist in form validation of dates.
	public function validDate($date) {
		return preg_match("/^(Sun|Mon|Tue|Wed|Thu|Fri|Sat) (Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep|Oct|Nov|Dec) (0[1-9]|[12][0-9]|3[01]) 2013$/",$date) == 1;
	}
}
?>
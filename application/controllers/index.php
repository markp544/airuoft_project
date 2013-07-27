<?php
class Index extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->library('session');
	}
	
	//Index function.
	function index() {
		$this->load->helper(array('form','url'));
		
		$this->load->library('form_validation');
		
		$this->load->view('index');
	}
	
	//May need a date validation mechanism.
	public function validDate($month,$year) {
		date_default_timezone_set('America/Toronto');
		if(intval($year) > intval(date('y'))) {
			return true;
		} else if (intval($year) == intval(date('y')) 
                && intval($month) >= intval(date('m'))) {
            return true;
        } else {
            return false;
        }
	}
	
}

?>
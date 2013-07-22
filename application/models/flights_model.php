<?php
class Flights extends CI_Model {
	
    function __construct() {
		parent::__construct();
		$this->load->database();
    }

    public function getFlights() {
    	//Hard coded campus and date for now, from st.George on the date July 29th.
        $query = $this->db->query("SELECT c1.name, t.time, f.available FROM 
        		campus AS c1, campus AS c2, timetable AS t, flight AS f WHERE 
        		f.timetable_id = t.id AND t.leavingfrom=c1.id AND 
        		t.goingto=c2.id AND f.date='2013-07-29' AND c1.id=1;");
		return $query->result();
    }

}
?>

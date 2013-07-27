<?php
class Flights_model extends CI_Model {
	
    function __construct() {
		parent::__construct();
		$this->load->database();
    }

    public function getFlights($c,$d) {
    	//Hard coded campus and date for now, from st.George on the date July 29th.
        $query = $this->db->query("SELECT f.id, c1.name, t.time, f.available FROM campus AS c1,
        		 campus AS c2, timetable AS t, flight AS f WHERE f.timetable_id = t.id AND
        		 t.leavingfrom = c1.id AND t.goingto = c2.id AND f.available > 0 AND
        		 f.date='$d' AND c1.id=$c;");
        
		return $query->result();
    }

}
?>

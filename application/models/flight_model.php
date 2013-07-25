<?php

class Flight_model extends CI_Model {

    function get_flights() {
        $query = $this->db->query("select c1.name as 'from', c2.name as 'to', t.time, f.date, f.available
								from flight f, timetable t, campus c1, campus c2
								where f.timetable_id = t.id and
								      t.leavingfrom = c1.id and
								      t.goingto = c2.id");
        return $query;
    }

    function populate() {
        for ($i = 1; $i < 15; $i++) {
            for ($j = 1; $j < 9; $j++) {
                $this->db->query("insert into flight (timetable_id, date, available) 
						          values ($j,adddate(current_date(), interval $i day),3)");
            }
        }
    }

    function delete() {
        $this->db->query("delete from flight");
    }

    function get_tickets() {
        $query = $this->db->query(
                "select f.date, t.seat, t.first, t.last, t.creditcardnumber, t.creditcardexpiration 
                        from flight f, ticket t
                        where f.id = t.flight_id");
        return $query;
    }

    function insert_ticket($flight_id, $seat, $first, $last, $credit_card, $expiry) {
        $result = false;
        $seats_available = $this->db->query("select f.id, f.available 
            from flight f 
            where $flight_id = f.id and 
                f.available > 0");

        if ($seats_available->num_rows() > 0) {
            $num_tickets = $this->db->query("select t.id from ticket t where $flight_id = t.flight_id");

            if ($num_tickets->num_rows() == $seats_available->result()->available) {

                //Begin transaction
                $this->db->trans_begin();
                $this->db->query("insert into ticket (first, last, creditcardnumber, creditcardexpiration, flight_id, seat) 
						          values ($first, $last, $credit_card, $expiry, $flight_id, $seat)");
                $this->db->query("update flight set available = 0 where id = $flight_id");

                if ($this->db->trans_status() == FALSE) {
                    $_SESSION["errmsg"] = $this->db->_error_message();
                    $_SESSION["errno"] = $this->db->_error_number();
                    $this->db->trans_rollback();
                } 
                else {
                    $this->db->trans_commit();
                    $result = true;
                }
            }
        }
        
        return result;
    }

}

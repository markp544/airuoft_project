<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Admin extends CI_Controller {

    function __construct() {
        // Call the Controller constructor
        parent::__construct();
    }

    function index() {
        $data['main'] = 'adminlinks';
        $this->load->view('adminview', $data);
    }

    function populate() {
        $this->load->model('flight_model');
        $this->flight_model->populate();

        //Then we redirect to the index page again
        redirect('', 'refresh');
    }

    function delete() {
        $this->load->model('flight_model');
        $this->flight_model->delete();

        //Then we redirect to the index page again
        redirect('', 'refresh');
    }

    function showTickets() {
        //First we load the library and the model
        $this->load->library('table');
        $this->load->model('flight_model');

        //Then we call our model's get_tickets function
        $flights = $this->flight_model->get_tickets();

        //If it returns some results we continue
        if ($flights->num_rows() > 0) {
            $this->table->set_heading('Flight Date', 'Seat Number', 'First Name', 
            'Last Name', 'Credit Card Number', 'Expiration Date');
            foreach ($flights->result() as $row) {
                if (strlen(strval($row->creditcardexpiration)) == 3) {
                    $expiry_date_format = '0' . substr($row->creditcardexpiration, 0, 1) . '/' . substr($row->creditcardexpiration, 1, 3);
                }
                else {
                   $expiry_date_format = substr($row->creditcardexpiration, 0, 2) . '/' . substr($row->creditcardexpiration, 2, 4); 
                }
               $this->table->add_row($row->date, $row->seat, $row->first, 
                    $row->last, $row->creditcardnumber, $expiry_date_format);
            }
            $data['flights'] = $this->table;
        } else {
            $data['flights'] = null;
        }

        $data['main'] = 'listTickets';
        $this->load->view('template', $data);
    }

}

?>

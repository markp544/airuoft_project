<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Validateinfo extends CI_Controller {

    public function index() {
        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
        
        $data['main'] = 'customerInfoForm';

        $this->load->view('template', $data);
    }

    function register() {
        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');

        if ($this->form_validation->run('registerCustomerInfo') == FALSE) {
            //$this->load->view('customerInfoForm');
            $data['main'] = 'customerInfoForm';
        } else {
            //$this->load->view('summary');
            $data['firstname'] = $this->input->post('firstname');
            $data['lastname'] = $this->input->post('lastname');
            $data['creditcard'] = $this->input->post('creditcard');
            $data['expirationdate'] = $this->input->post('expirationdate');
            $data['main'] = 'summary';
        }
        
        $this->load->view('template', $data);
        
    }

    function expirationDateCheck($date) {

        $datetrim = trim($date);
        $month = substr($datetrim, 0, 2);
        $year = substr($datetrim, 3, 2);
        
        $this->form_validation->set_message('expirationDateCheck', 
                'Invalid expiration date format.');
        if (preg_match("/^[0-9]{2}\/[0-9]{2}$/", $datetrim) == 1 
                && intval($year) >= 0
                && intval($month) > 0) {

            $this->form_validation->set_message('expirationDateCheck', 
                'Credit card is expired.');
            
            if ($this->validDate($month, $year)) {
                return true;
            }
        }
        return false;
    }

    public function validDate($month, $year) {
        date_default_timezone_set('America/Toronto');
        if (intval($year) > intval(date('y'))) {
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

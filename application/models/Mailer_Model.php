<?php

class Mailer_Model extends CI_Model {

    /**
     * send_email
     * @author Alamin mia
     * @param --- $data - information to place in the mail 
     * $templateName - html template to use in mail body          
     * @return --- none
     * modified by ----- alamin
     * date --- 15/07/2017 (mm/dd/yyyy  )
     */
    function send_email($data, $templateName) {
        //echo "<pre>";
        //print_r($data);

        /** START SENDING EMAIL */
        $this->load->library('email');
        $this->email->set_mailtype('html');
        $this->email->from($data['from_address'], $data['admin_full_name']);
        $this->email->to($data['to_address']);
        //$this->email->cc($data['cc_address']);
        $this->email->subject($data['subject']);
        $body = $this->load->view('pages/' . $templateName, $data, true);
        //for live we do
        echo $body;
        exit();
        //for live we do
        $this->email->message($body);
        //$this->email->send();
        $this->email->clear();
        /** END SENDING EMAIL */
    }

}

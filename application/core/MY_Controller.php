<?php
/**
 * Created by PhpStorm.
 * User: chusa
 * Date: 5/2/2019
 * Time: 5:47 PM
 */

class Admin_Controller extends CI_Controller {

    var $data;
    public function __construct() {
        parent::__construct();
            $this->load->model('User_model');
            $this->load->model('Admin_model','admin');
            $this->load->model('Dashboard_model','dashboard');
    
        if(!$this->session->userdata("role")){
            redirect('login');
        }
        $this->data['user'] = $this->User_model->get_user($this->session->userdata('id'));

        // if ($_SESSION['token'] != $this->data['user']['token']) {
        //      redirect('login/logout');
        // }
        $date = new DateTime("now", new DateTimeZone('Asia/Karachi') );
        $current_date = $date->format('m/d/Y');


        $complete = 0; $cancelled = 0; $process = 0;$pending = 0;
       
        $this->data['started'] = $process;
        $this->data['pending'] = $pending;
        $this->data['completed'] = $complete;
        $this->data['cancelled'] = $cancelled;
        
    }
}
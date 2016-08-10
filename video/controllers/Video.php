<?php 
class Video extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    ########### FRONT END  ####################
    public function index() {
       $this->load->view('templating/t-header');
       $this->load->view('templating/t-navbar');
       $this->load->view('v-large-menu-video');
       $this->load->view('templating/t-footer');
    }

    public function videobelajar(){
       $this->load->view('templating/t-header');
       $this->load->view('templating/t-navbar');
       $this->load->view('v-banner-videoBelajar');
       $this->load->view('v-container-all-videos');
       $this->load->view('templating/t-footer');
    }

    public function videobelajarsingle(){
       $this->load->view('templating/t-header');
       $this->load->view('templating/t-navbar');
       $this->load->view('v-banner-videoBelajar');
       $this->load->view('v-single-video');
       $this->load->view('templating/t-footer');
    }

    public function daftarvideo(){
       $this->load->view('templating/t-header');
       $this->load->view('templating/t-navbar');
       $this->load->view('v-banner-videoBelajar');
       $this->load->view('v-video-list');

       $this->load->view('templating/t-footer');
    }
    ########### FRONT END  ####################
    
    #----------# BACK END  #----------#
    public function uploadvideo(){
       $this->load->view('templating/t-header');
       $this->load->view('templating/t-navbar');
       $this->load->view('v-b-form-upload-video');
       $this->load->view('templating/t-footer');
    }   
     #----------# BACK END  #----------#



}
 ?>
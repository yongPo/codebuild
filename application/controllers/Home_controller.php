<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
    class Home_controller extends CI_Controller{


    	function __construct(){
    		parent::__construct();
    		$this->load->model("default/home_model");
    		$this->template->set_title('Pages');
	    	$this->template->set_template('default');
    	}

         public function index($slug){
         	$data = $this->home_model->getPage($slug);
         	if($data == null){
    			$this->template->load('default/404');
         	}else{
         		$this->template->load_sub('contents', $data);
				$this->template->load('default/page');
         	}
        }
}
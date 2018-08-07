<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
    class Pages extends CI_Controller{
    	function __construct(){
	    parent::__construct();
			$this->load->model("admin/page_model");

	    $styles = array(

			);

			$js = array(
					'assets/backend/js/pages/tables/jquery-datatable.js'
			);

			$this->template->set_additional_css($styles);
			$this->template->set_additional_js($js);

	    //$this->_checkLogin();
	    $this->template->set_title('Pages');
	    $this->template->set_template('admin');

  }
        public function index($page = 'home'){
	        //$this->template->load_sub('sales_count', $this->transaction_model->get_sales_count());
			$this->template->load('backend/pages/index');
        }

        public function save(){
			$extra_js = '
				$(document).ready(function() {
				  $("#summernote").summernote();
				  $(".note-editable").attr("style","min-height:300px")
				});
			';

			
			$this->template->extra_js($extra_js);

	        $this->form_validation->set_rules('title', 'Title', 'required');
	        $this->form_validation->set_rules('body', 'Content', 'required');

			if($this->form_validation->run() === FALSE){
				$this->template->load('admin/pages/create');
			}else{
				$slug = url_title($this->input->post('title'), "dash", TRUE);

				$data = array(
					'title' => $this->input->post('title'),
					'body' => $this->input->post('body'),
					'slug' => $slug,
					'post_type' => 'page',
					'is_deleted' => '0'
				);

				$data_id = $this->page_model->save($data);
				redirect('cb-admin/edit/page/'.$data_id);
			}
        }
      
		public function delete($id){
            // Check log in
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }

            $this->post_model->delete($id);

            //Set Message
            $this->session->set_flashdata('post_deleted', 'Your post has been deleted');

            redirect('posts');
        }

        public function edit($id){
        	$extra_js = '
				$(document).ready(function() {
				  $("#summernote").summernote();
				  $(".note-editable").attr("style","min-height:300px")
				});
			';

			
			$this->template->extra_js($extra_js);
        	$this->template->set_title('Edit Page');
        	$this->template->load_sub('data', $this->page_model->get_by_id($id));
           
            $this->template->load('admin/pages/edit');

        }

        public function update(){
            // Check log in
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }

            $this->post_model->update();

            //Set Message
            $this->session->set_flashdata('post_updated', 'Your post has been updated');

            redirect('posts');
        }
    }
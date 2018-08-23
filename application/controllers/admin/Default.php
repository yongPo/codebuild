<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
    class Default extends CI_Controller{
    	
    	function __construct(){
	    parent::__construct();
			$this->load->model("");

	    	$styles = array();
			$js = array();

			$this->template->set_additional_css($styles);
			$this->template->set_additional_js($js);

		    $this->template->set_title('Pages');
		    $this->template->set_template('admin');

 	}
        
        public function index(){
	        $this->template->load_sub('contents', $this->page_model->get());
			$this->template->load('admin/pages/index');
        }

        public function save(){
        	
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
            $this->page_model->delete($id);

           	redirect('cb-admin/list/page/');
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

			$this->form_validation->set_rules('title', 'Title', 'required');
	        $this->form_validation->set_rules('body', 'Content', 'required');

			if($this->form_validation->run() === FALSE){
				$this->template->load_sub('data', $this->page_model->get_by_id($id));
           
            	$this->template->load('admin/pages/edit');
			}else{
			$slug = url_title($this->input->post('title'), "dash", TRUE);

			$data = array(
				'title' => $this->input->post('title'),
				'slug' => $slug,
				'body' => $this->input->post('body'),
				'updated_at' => date('Y-m-d H:i:s')
			);
			
        	$this->template->load_sub('data', $this->page_model->get_by_id($id));
        	$this->template->load_sub('contents', $this->page_model->update($id, $data));
           
            redirect('cb-admin/edit/page/'.$id);

        }
    }
}
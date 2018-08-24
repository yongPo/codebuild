<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
    class Slider extends CI_Controller{
    	
    	function __construct(){
	    parent::__construct();
			$this->load->model("admin/slider_model");
			$this->load->model("admin/crudpage_model");

	    	$styles = array('assets/plugins/dropzone/dropzone.css');
			$js = array('assets/backend/js/pages/tables/jquery-datatable.js','assets/plugins/dropzone/dropzone.js');

			$this->template->set_additional_css($styles);
			$this->template->set_additional_js($js);
			$extra_js = '
				$(document).ready(function() {
				  $("#summernote").summernote();
				  $(".note-editable").attr("style","min-height:300px")

				  function readURL(input) {
					  if (input.files && input.files[0]) {
					    var reader = new FileReader();

					    reader.onload = function(e) {
					      $(".imgFile").attr("src", e.target.result);
					    }

					    reader.readAsDataURL(input.files[0]);
					  }
					}

					$(`#fileUpload`).change(function() {
					  $(".imgFile").removeClass("d-none");
					  readURL(this);
					});

					$(".type1").click(function(){
						$("#type1").click();
						$(".type1Form").removeClass("d-none");
					});
					$(".type2").click(function(){
						$("#type2").click();
						$(".type1Form").addClass("d-none");
					});
				});

			';
			$this->template->extra_js($extra_js);

		    $this->template->set_title('Pages');
		    $this->template->set_template('admin');

 	}
        
        public function index(){
        	$postType = 'post-slider';
	        $this->template->load_sub('contents', $this->crudpage_model->getList($postType));

			$this->template->load('admin/slider/index');
        }

        public function save(){

        	$this->template->set_title('Add New Slide');

	        $this->form_validation->set_rules('title', 'Title', 'required');

			if($this->form_validation->run() === FALSE){

				$termType = 'category-slider';
        		$this->template->load_sub('categories', $this->crudpage_model->getCategory($termType));

				$this->template->load('admin/slider/create');
			}else{
				$slug = url_title($this->input->post('title'), "dash", TRUE);
				var_dump($_POST);
	        	exit();
				$data = array(
					'title' => $this->input->post('title'),
					'body' => $this->input->post('body'),
					'slug' => $slug,
					'post_type' => 'post-slider',
					'is_deleted' => '0'
				);

				$data_id = $this->crudpage_model->savePage($data);
				redirect('cb-admin/edit/slider/'.$data_id);
			}
        }
      
		public function delete($id){
            $this->crudpage_model->deletePage($id);

           	redirect('cb-admin/list/slider/');
        }

        public function edit($id){
        	$this->template->set_title('Edit Page');

			$this->form_validation->set_rules('title', 'Title', 'required');
	        $this->form_validation->set_rules('body', 'Content', 'required');

			if($this->form_validation->run() === FALSE){
				$this->template->load_sub('data', $this->crudpage_model->getPageInfo($id));
           
            	$this->template->load('admin/pages/edit');
			}else{
			$slug = url_title($this->input->post('title'), "dash", TRUE);

			$data = array(
				'title' => $this->input->post('title'),
				'slug' => $slug,
				'body' => $this->input->post('body'),
				'updated_at' => date('Y-m-d H:i:s')
			);
			
        	$this->template->load_sub('data', $this->crudpage_model->getPageInfo($id));
        	$this->template->load_sub('contents', $this->crudpage_model->updatePage($id, $data));
           
            redirect('cb-admin/edit/slider/'.$id);

        }
    }
    	public function categoryList(){
    		$this->template->set_title('Categories');
    		$this->template->load_sub('contents', $this->slider_model->getCategoryList());
    		$this->template->load('admin/slider/categories');
    	}
}
<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
    class Categories extends CI_Controller{

        public function index(){
            $data['title'] = 'Categories';

            $data['categories'] = $this->category_model->get();

            $this->template->load('admin', 'categories/index', $data);
        }

        public function create(){
            // Check log in
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }
            
            $data['title'] = 'Create Category';

            $this->form_validation->set_rules('name', 'Name', 'required');

            if($this->form_validation->run() === FALSE){
                return;
            }else{
                    $res = $this->category_model->create();
                    //Set Message
                    $this->session->set_flashdata('category_created', 'Your category has been created');
                    if(!empty($res)){
                        echo json_encode(array('data' => $res));    
                    }else{
                        $res['status'] = 'false';
                        return;
                    }
            }
        }

        public function posts($id){
            $data['title'] = $this->category_model->get_name($id)->name;

            $data['posts'] = $this->post_model->get_posts_by_category($id);
            
            $this->template->load('admin', 'posts/index', $data);
        }

        public function delete($id){
            // Check log in
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }

            $this->category_model->delete($id);

            //Set Message
            $this->session->set_flashdata('category_deleted', 'Your category has been deleted');

            redirect('categories');
        }
}
    
 
    
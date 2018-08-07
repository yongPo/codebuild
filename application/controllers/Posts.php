<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
    class Posts extends CI_Controller{
        public function index($offset = 0){
            // Pagination Config
            $config['base_url'] = base_url() . 'posts/index/';
            $config['total_rows'] = $this->post_model->record_count();
            $config['per_page'] = 10;
            $config['uri_segment'] = 3;
            $config['attributes'] = array('class' => 'pagination-link');

            // Init Pagination
            $this->pagination->initialize($config);

            $data['title'] = 'Latest Posts';

            $data['posts'] = $this->post_model->get(FALSE,  $config['per_page'], $offset);

            $this->template->load('admin', 'posts/index', $data);
        }

        public function view($slug = NULL){
        	$data['post'] = $this->post_model->get($slug);
            $post_id = $data['post']['id'];
            $data['comments'] = $this->comment_model->get($post_id);

        	if(empty($data['post'])){
        		show_404();
        	}

        	$data['title'] = $data['post']['title'];

            $this->template->load('admin', 'posts/view', $data);
        }

        public function create(){
            // Check log in
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }

        	$data['title'] = 'Create Post';

            $data['categories'] = $this->post_model->get_name();

        	$this->form_validation->set_rules('title', 'Title', 'required');
        	$this->form_validation->set_rules('body', 'Body', 'required');

        	if($this->form_validation->run() === FALSE){
                $this->template->load('admin', 'posts/create', $data);

        	}else{
                //Upload Image
                $config['upload_path'] = './assets/uploads';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';

                $this->load->library('upload', $config);

                if(!$this->upload->do_upload()){
                    $errors = array('error' => $this->upload->display_errors());
                    $post_image = 'noimage.png';
                }else{
                    $data = array('upload_data' => $this->upload->data());
                    $post_image = $_FILES['userfile']['name']; 
                }

        		$this->post_model->create($post_image);

                //Set Message
                $this->session->set_flashdata('post_created', 'Your post has been created');

        		redirect('posts');
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

        public function edit($slug){
            // Check log in
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }

            $data['post'] = $this->post_model->get($slug);

            // Check user
            if($this->session->userdata('user_id') !== $this->post_model->get($slug)['user_id']){

                redirect('posts');
            }

            $data['categories'] = $this->post_model->get_name();

            if(empty($data['post'])){
                show_404();
            }

            $data['title'] = 'Edit Post';

            $this->template->load('admin', 'posts/edit', $data);

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
    
 
    
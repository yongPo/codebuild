<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 	class Post_model extends CI_Model{
 		public function __construct(){
 			$this->load->database();
 		}

		public function get($slug = FALSE, $limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}

			if($slug === FALSE){
				$this->db->order_by('cb_posts.id', 'DESC');
				$this->db->join('cb_terms', 'cb_terms.id = cb_posts.terms_id');
				$query = $this->db->get_where('cb_posts', 
											array(
												'slug' => $slug , 
												'post_type' => 'post', 
												'cb_posts.is_deleted' => '0'
											));
				return $query->result_array();
			}
			$query = $this->db->get_where('cb_posts', 
											array(
												'slug' => $slug , 
												'post_type' => 'post', 
												'is_deleted' => '0'
											));
			return $query->row_array();
		}

		public function create($post_image){
			$slug = url_title($this->input->post('title'), "dash", TRUE);

			$data = array(
					'title' => $this->input->post('title'),
					'slug' => $slug,
					'body' => $this->input->post('body'),
					'image' => $post_image,
					'terms_id' => $this->input->post('category_id'),
					'post_type' => 'post',
					'user_id' => $this->session->userdata('user_id'),
					'is_deleted' => '0'
				);

			return $this->db->insert('cb_posts', $data);
		}

		public function delete($id){
			$this->db->where('id',$id);
			$data = array(
					'is_deleted' => '1',
					'deleted_at' => date('Y-m-d H:i:s')
				);

			$this->db->update('cb_posts', $data);
			return true;
		}

		public function update(){
			$slug = url_title($this->input->post('title'), "dash", TRUE);

			$data = array(
					'title' => $this->input->post('title'),
					'slug' => $slug,
					'body' => $this->input->post('body'),
					'terms_id' => $this->input->post('category_id'),
					'updated_at' => date('Y-m-d H:i:s')
				);
			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('cb_posts', $data);
		}

		public function get_name(){
			$this->db->order_by('name');
			$query = $this->db->get_where('cb_terms', 
											array(
												'term_type' => 'category', 
												'is_deleted' => '0'
											));

			return $query->result_array();
		}

		public function get_posts_by_category($category_id){
			$this->db->order_by('cb_posts.id', 'DESC');
			$this->db->join('cb_terms', 'cb_terms.id = cb_posts.terms_id');
				$query = $this->db->get_where('cb_posts', 
											array(
												'terms_id' => $category_id, 
												'post_type' => 'post', 
												'cb_posts.is_deleted' => '0'
											));
				return $query->result_array();
 		}
 		public function record_count(){
 			$query = $this->db->get_where('cb_posts', array(
 									'post_type' => 'post',
 									'is_deleted' => '0'
 								));
 			return $query->num_rows();
 		}
	}
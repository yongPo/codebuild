<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 	class Page_model extends CI_Model{
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

		public function save($data){
			$this->db->insert('cb_posts', $data);
			return $this->db->insert_id();
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

		public function update($id){
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

		public function get_by_id($id){
			$query = $this->db->get_where('cb_posts', 
											array(
												'id' => $id , 
												'post_type' => 'page', 
												'is_deleted' => '0'
											));
				return $query->row();
 		}
 		public function record_count(){
 			$query = $this->db->get_where('cb_posts', array(
 									'post_type' => 'post',
 									'is_deleted' => '0'
 								));
 			return $query->num_rows();
 		}
	}
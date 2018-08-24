<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 	class Slider_model extends CI_Model{
 		public function __construct(){
 			$this->load->database();
 		}

		public function get($slug = FALSE, $limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}

			if($slug === FALSE){
				$this->db->order_by('cb_posts.id', 'DESC');
				$query = $this->db->get_where('cb_posts', array('slug' => $slug , 'post_type' => 'page','is_deleted' => '0'));
				return $query->result();
			}
				$query = $this->db->get_where('cb_posts', array('slug' => $slug ,'post_type' => 'post','is_deleted' => '0'));
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

		public function update($id, $data){
			
			$this->db->where('id', $id);
			$query = $this->db->update('cb_posts', $data);
			return $query;
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

 		public function getSliderCategoryList(){
 			$data = $this->db->select('*')
 					->where(array( 'term_type' => 'category-slider' , 'is_deleted' => '0'))
 					->get('cb_terms');

			if($data->num_rows() > 0) {
				var_dump($data->result());
				return $data->result();
			}
			return [];
 		}
	}
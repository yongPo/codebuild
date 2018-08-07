<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 	class Category_model extends CI_Model{
 		public function __construct(){
 			$this->load->database();
 		}

 		public function get(){
			$this->db->order_by('created_at', 'DESC');
			$query = $this->db->get_where('cb_terms', 
											array(
												'term_type' => 'category', 
												'is_deleted' => '0'
											));

			return $query->result_array();
		}

 		public function create(){
 			$slug = url_title($this->input->post('name'), "dash", TRUE);
 			
 			$data = array(
 				'name' => $this->input->post('name'),
 				'term_slug' => $slug,
 				'term_type' => 'category',
 				'user_id' => $this->session->userdata('user_id')
 			);
 			$this->db->insert('cb_terms', $data);
 			$query = $this->db->insert_id();
 			if($this->db->affected_rows() > 0){
 				return $query;
 			}else{
 				return false;
 			}
 		}

 		public function get_name($id){
 			$query = $this->db->get_where('cb_terms', 
 											array(
 												'id' => $id, 
												'is_deleted' => '0'
 											));
 			return $query->row();
 		}
 		public function delete($id){
			$this->db->where('id',$id);
			$data = array(
					'is_deleted' => '1',
					'deleted_at' => date('Y-m-d H:i:s')
				);

			$this->db->update('cb_terms', $data);
			return true;
		}
 	}
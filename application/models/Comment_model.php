<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 	class Comment_model extends CI_Model{
 		public function __construct(){
 			$this->load->database();
 		}

 		public function create($post_id){
 			$data = array(
 				'post_id' => $post_id,
 				'name' => $this->input->post('name'),
 				'email' => $this->input->post('email'),
 				'content' => $this->input->post('content')
 			);
 			return $this->db->insert('cb_comments', $data);
 		}

 		public function get($post_id){
 			$query = $this->db->get_where('cb_comments', array(
 												'post_id' => $post_id,
 												'is_deleted' => '0'
 											));
 			return $query->result_array();
 		}
}
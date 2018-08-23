<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 	class Home_model extends CI_Model{
 		public function __construct(){
 			$this->load->database();
 		}

		public function getPage($slug){
			$data = $this->db->select('*')
					->where(array( 'slug' => $slug , 'post_type' => 'page', 'is_deleted' => '0'))
					->get('cb_posts');

			if($data->num_rows() > 0) {
				return $data->result();
			}
			return [];
		}
	}
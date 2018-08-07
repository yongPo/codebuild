<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 	class User_model extends CI_Model{
 		public function __construct(){
 			$this->load->database();
 		}

 		public function register($enc_password){
 			//User data array
 			$data = array(
 				'name' => $this->input->post('name'),
 				'email' => $this->input->post('email'),
 				'username' => $this->input->post('username'),
 				'password' => $enc_password,
 				'zipcode' => $this->input->post('zipcode'),
 			);

 			//Insert user
 			return $this->db->insert('cb_users', $data);
 		}

 		//Check username exist
 		public function check_username_exists($username){
 			$query = $this->db->get_where('cb_users', array('username' => $username));
 			if(empty($query->row_array())){
 				return true;
 			}else{
 				return false;
 			}
 		}

 		//Check email exist
 		public function check_email_exists($email){
 			$query = $this->db->get_where('cb_users', array('email' => $email));
 			if(empty($query->row_array())){
 				return true;
 			}else{
 				return false;
 			}
 		}

 		//Log user in
 		public function login($username, $password){
 			//validate
 			$this->db->where('username', $username);
 			$this->db->where('password', $password);

 			$result = $this->db->get('cb_users');

 			if ($result->num_rows() == 1) {
 				return $result->row(0)->id;
 			}else{
 				return false;
 			}
 		}
 	}
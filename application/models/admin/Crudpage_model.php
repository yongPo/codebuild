<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Crudpage_model extends CI_Model
{
    function __construct(){
        parent::__construct();
            $this->load->database();
    }

    public function getList($postType)
    {
    	$where = array('post_type' => $postType, 
    					'is_deleted' => '0');

    	$this->db->select('*')
    				->from('cb_posts')
    				->where($where);

    	$data = $this->db->get();

        if($data->num_rows()){
            return $data->result();
        }
        return [];
    }

    public function getCategory($termType)
    {
        $where = array('term_type' => $termType, 'is_deleted' => '0');
        $this->db->select('id, name, term_slug, term_type')
                            ->from('cb_terms')
                            ->where($where);
        $data = $this->db->get();

        if($data->num_rows()){
            return $data->result();
        }
        return [];
    }

    public function savePage($data)
    {
        $this->db->insert('cb_posts', $data);
        return $this->db->insert_id();
    }

    public function getPageInfo($id)
    {
        $this->db->select('*')
                ->from('cb_posts')
                ->where('id', $id);
        $data = $this->db->get();
        if($data->num_rows()){
            return $data->row();
        }
        return [];
    }

    public function updatePage($id, $data)
    {
        
        $this->db->where('id',$id);
        return $this->db->update('cb_posts', $data);
    }

    public function deletePage($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('cb_posts');
    }

}


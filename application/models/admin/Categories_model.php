<?php

class Categories_model extends CI_Model
{
    function __construct(){
        parent::__construct();
            $this->load->database();
    }

    public function getCategories($termType)
    {
        return $this->db->get_where("cb_terms", array('term_type' => 'category-'.$termType, 'is_deleted' => '0'));
    }

    function saveCategory($data)
    {
        return $this->db->insert('cb_terms', $data);
    }

    function getCategoryInfo($id)
    {
        $this->db->select('*')
                ->from('cb_terms')
                ->where('id', $id);
        $query = $this->db->get();
        if($query->num_rows()){
            return $query->row();
        }
        return [];
    }

    function updateCategory($id, $data)
    {
        
        $this->db->where('id',$id);
        return $this->db->update('cb_terms', $data);
    }

    function deleteCategory($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('cb_terms');
    }

}


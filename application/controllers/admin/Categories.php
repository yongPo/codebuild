<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

	function __construct(){
	    parent::__construct();
            $this->load->model("admin/categories_model");

	    $styles = array(
	    		'assets/backend/js/application.js',
	    		'assets/plugins/toastr/toastr.min.css'
			);

			$js = array(
				'assets/backend/js/application.js',
				'assets/plugins/bootbox/bootbox.min.js',
				'assets/plugins/toastr/toastr.min.js'
			);

			$this->template->set_additional_css($styles);
			$this->template->set_additional_js($js);

	    //$this->_checkLogin();
	    $this->template->set_title('Admin - Categories');
	    $this->template->set_template('admin');
    }

    public function index($categoryName)
	{
	$modelName = $categoryName . '_model';
	$this->load->model("admin/". $modelName);

    //$this->_checkLogin();
    $this->template->set_title('Categories');

    $data = $this->$modelName->getSliderCategoryList();
	$this->template->load_sub('contents', $data);

   	$this->template->load('admin/'.$categoryName.'/categories');

  }
    /**

    * Create from display on this method.

    *

    * @return Response

   */

   public function Datatable($termType)
   {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $query = $this->categories_model->getCategories($termType);
        $data = [];

        foreach($query->result() as $r) {
            //$created = date('F jS Y h:i:sa', strtotime($r->created_at));
            $action_btn = '<small><a href="javascript:void(0);" data-id="' . $r->id . '" class="btnCategoryEdit">Edit</a> | <a href="javascript:void(0);">View</a> | <a href="javascript:void(0);" class="text-danger btnCategoryDelete" data-id="' . $r->id . '">Delete</a></small>';
            // $edit_btn = ($r->id != 1) ? '<a href="javascript:void(0);" id="btnUserDelete"><i class="fa fa-fw fa-trash"></i> Delete</a>' : '' ;
            //$action = '<a href="javascript:void(0);" data-id="' . $r->id . '" class="btnCategoryEdit"><i class="fa fa-fw fa-edit"></i> Edit</a>  ' . $delete_btn;

            $data[] = array(

                $r->name . $action_btn,
                $r->term_slug,
                $r->id
           );

      }

        $result = array(
        	"draw" => $draw,
            "data" => $data
            //"recordsTotal" => $query->num_rows(),
            //"recordsFiltered" => $query->num_rows(),

        );

      echo json_encode($result);
      exit();

    }

    /**

    * Create category on this method.

    *

    * @return Response

   */

  public function save()
  {
      $response = array();

      $this->form_validation->set_rules('name','Title', 'required|is_unique[cb_terms.name]');
      
      if ($this->form_validation->run() == FALSE) {

          $response['validation_errors'] = validation_errors();
          $response['success'] = FALSE;

      }else{
        
        $name = $this->input->post('name');
        $slug = ($this->input->post('name') !== '') ? url_title($this->input->post('name'), "dash", TRUE) : $this->input->post('slug');
        $parent_category = $this->input->post('parent-category');
        $desc = $this->input->post('desc');
        $categoryType = $this->input->post('categoryType');
        
        $data = array(
            'name' => $name,
            'term_slug' => $slug,
            'parent_category' => $parent_category,
            'description' => $desc,
            'term_type' => $categoryType
        );

        $res = $this->categories_model->saveCategory($data);
        if ($res) {
            $response['message'] = 'Category Created Successfully';
            $response['success'] = TRUE;
        }else{
            $response['message'] = 'Error on creating category';
            $response['success'] = FALSE;
        }
      }

      echo json_encode($response);
      exit;
    }

    /**

    * Show Category details on this method.

    *

    * @return Response

   */

    public function edit()
    {
            $response = array();
            $id = $this->input->get('id');

            $data = $this->categories_model->getCategoryInfo($id);
            if ($data) {
                $response['category'] = $data;
                $response['success'] = TRUE;
            }else{
                $response['message'] = 'Error getting category data';
                $response['success'] = FALSE;
            }

            echo json_encode($response);
            exit;
    }

    /**

    * Update User details on this method.

    *

    * @return Response

   */

  public function update()
  {

      $response = array();
      $id = $this->input->post('categoryId');

      $this->form_validation->set_rules('name','Title', 'required|is_unique[cb_terms.name]');
      
      if ($this->form_validation->run() == FALSE) {

          $response['validation_errors'] = validation_errors();
          $response['success'] = FALSE;

      }else{
        
        $name = $this->input->post('name');
        $slug = ($this->input->post('name') !== '') ? url_title($this->input->post('name'), "dash", TRUE) : $this->input->post('slug');
        $parent_category = $this->input->post('parent-category');
        $desc = $this->input->post('desc');
        $categoryType = $this->input->post('categoryType');
        
        $data = array(
            'name' => $name,
            'term_slug' => $slug,
            'parent_category' => $parent_category,
            'description' => $desc,
            'term_type' => $categoryType
        );

          $res = $this->categories_model->updateCategory($id, $data);
          if ($res) {
              $response['message'] = 'Category Updated Successfully';
              $response['success'] = TRUE;
          }else{
              $response['message'] = 'Error on updating category';
              $response['success'] = FALSE;
          }
      }

      echo json_encode($response);
      exit;

  }
      /**

    * Delete user on this method.

    *

    * @return Response

   */

   public function delete()
   {
        $response = array();
        $res = $this->categories_model->deleteCategory($_POST['id']);

        if ($res) {
            $response['message'] = 'Category Successfully Deleted';
            $response['success'] = TRUE;
        }else{
            $response['message'] = 'Error on Deleting Category';
            $response['success'] = FALSE;
        }

        echo json_encode($response);
        exit;

   }

}


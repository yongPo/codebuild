<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
    class Dashboards extends CI_Controller{

        public function index($page = 'home'){
            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }

            $styles = array(
				'',
			);

			$js = array(
					''
			);
			$extra_js = '
	            
			';

	        $this->template->extra_js($extra_js);

			$this->template->set_additional_css($styles);
			$this->template->set_additional_js($js);

            $this->template->set_title('Dashboard');
	        $this->template->set_template('admin');

	        //$this->template->load_sub('sales_count', $this->transaction_model->get_sales_count());
			$this->template->load('backend/dashboard/index');
        }
    }
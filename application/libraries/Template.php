<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Template {

    var $use_template = '';

    var $use_template_file = '';

    var $template_data = array();

    var $CI;



    function __construct(){

        $this->CI =& get_instance();

        $this->template_data['nav'] = true; 

        $this->template_data['title'] = "CodeBuild";

    }

    //to set your title in your page

    function set_title($title = "CodeBuild"){

        $this->template_data['title'] = $title;

    }

    //to hide the nav bar if you want

    function set_nav($nav){

        if($nav){

            $this->template_data['nav'] = false;

        }else{

            $this->template_data['nav'] = true;         

        }

    }

    //set your additional css according to your page

    function set_additional_css($css_set){

        $this->template_data['additional_css'] = $css_set;

    }

    //set your additional js according to your page

    function set_additional_js($js_set){

        $this->template_data['add_js'] = $js_set;

    }



    function append_css($css){

        if(is_array($css)){

            foreach($css as $c){

                array_push($this->template_data['additional_css'],$c);

            }

        }else{

            array_push($this->template_data['additional_css'],$css);

        }



    }



    function append_js($js){

        if(is_array($js)){

            foreach($js as $j){

                array_push($this->template_data['add_js'],$j);

            }

        }else{

            array_push($this->template_data['add_js'],$js);

        }

    }

    //to set your template according to your page

    public function set_template($name,$file="template"){

        $this->use_template = $name;

        $this->use_template_file = $file;

    }

    //to append the all variables in your pages

    public function load_sub($key,$value){

        if(is_array($key)){

            $this->template_data = $key;

        }else{

            $this->template_data[$key] = $value;

        }

    }

    //function to include the load_sub variables to your subject view

    public function set_subview($key, $value){

        if(empty($value)){

            $this->template_data[$key] = "";

        }else{

            $this->template_data[$key] = $this->CI->load->view($value,$this->template_data,true);

        }

    }



    //your load_sub and set_subview variable will load in this function

    public function load($path,$from_db=false){

        if($from_db){

            $this->CI->load->helper("file");

            write_file("application/views/qazwsx.php",$path);

            $content = $this->CI->load->view("qazwsx",$this->template_data,true);



            $this->template_data["content"] = $content;

        }else{

            $content = $this->CI->load->view($path,$this->template_data,true);

            $this->template_data["content"] = $content;

        }



        $template_path = $this->use_template . "/" . $this->use_template_file;

        $this->CI->load->view("templates/".$template_path,$this->template_data);

    }

    //to include a extra_js in your <script> tag

    public function extra_js($extra_js){

        $this->template_data['extra_js']  = $extra_js;

    }

}

?>
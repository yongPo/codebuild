<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Shortcode extends CI_Controller
{
    function __construct ()
    {
        parent::__construct();
    }
    
    function index(){
        
        $str = 'Hello user [cb:user id=1|class=admin], talk to [cb:user id=2|class=user]';
        
        // Parse the string using the shortcode lib
        $this->load->library('shortcodes');
        $str = $this->shortcodes->parse($str);
        
        echo $str;
    }
}
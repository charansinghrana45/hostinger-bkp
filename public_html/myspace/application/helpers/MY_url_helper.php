<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

// ------------------------------------------------------------------------

if ( ! function_exists('base_url'))
{

	function article_image_path($str = '')
	{
            $CI = & get_instance();
            
            return $CI->config->item('article_image_read_path').$str.'/';
	}
    
}

// ------------------------------------------------------------------------


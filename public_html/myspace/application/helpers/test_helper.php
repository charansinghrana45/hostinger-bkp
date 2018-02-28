<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

// ------------------------------------------------------------------------

if(!function_exists('get_reverse_str'))
{
 
    function get_reverse_str($str)
    {
        $rev_str = '';

        for($i=strlen($str)-1; $i>=0; $i--)
        {
            $rev_str = $rev_str.$str[$i];
        }
          return $rev_str;
    }
}

// ------------------------------------------------------------------------


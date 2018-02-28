<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Upload extends CI_Upload
{
    
    public $str = 'Hello test library';
    
    public function __construct() {
        parent::__construct();
    }

    public function testdata()
    {
        return $this->str;
    }
    
}

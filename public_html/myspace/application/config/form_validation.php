<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(

    'add_article_rule' => array(
        array(
                'field' => 'title',
                'label' => 'Title',
                'rules' => 'required'
            
        ),
        array(
                'field' => 'body',
                'label' => 'Body',
                'rules' => 'required'
               
        )
	)
);


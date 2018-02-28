<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    public static function findOrFail()
    {
    	$data = ['ravi', 'kishan'];
    	
    	return $data;
    }
}

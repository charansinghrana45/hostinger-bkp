<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\AdminLoginRequest;

use Illuminate\Support\Facades\Input;

use Validator;

use Redirect;

use App\Customer;

use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
	private $test;

    public function index()
    {
    	return view('test');
    }

    public function formSubmit(AdminLoginRequest $request) 
    {
         	
    	$email = $request->email;

        DB::table('customers')->insert(['name'=>'smith','email' => $email,'phone'=>9874584758,'address'=>'new yoork']);
       
    	session()->flash('msg',__('admin/auth.login_success'));

        return redirect()->route('dashboard');

    }

    public function dashboard() 
    {
      
        $data = DB::table('customers')->get();
       
        $success_msg  = session()->get('msg');
    
        return view('dashboard',compact('data','success_msg'));
    }

}

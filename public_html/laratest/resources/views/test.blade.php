@extends('layout.master')

@section('content')
 
 {!! Form::open(['route'=>'f.submit','class'=>'form-horizontal']) !!}
  <fieldset>
    <legend>Login</legend>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Email</label>
      <div class="col-lg-4">
      {!! Form::email('email','', ['class'=>'form-control','id'=>'inputEmail','placeholder'=>'Email']) !!}
      </div>
       @if($errors->first('email'))
	   <div class="col-lg-5">
	    	<div class="alert alert-dismissible alert-danger">
			  <button type="button" class="close" data-dismiss="alert">&times;</button>
			 	<span>{{ $errors->first('email') }}</span>
			</div>
	    </div> 
	    @endif
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Password</label>
      <div class="col-lg-4">
       {!! Form::password('password',["value"=>"","class"=>"form-control", "id"=>"inputPassword", "placeholder"=>"Password"]) !!}
       </div>
       @if($errors->first('password'))
	   <div class="col-lg-5">
	    	<div class="alert alert-dismissible alert-danger">
			  <button type="button" class="close" data-dismiss="alert">&times;</button>
			 	<span>{{ $errors->first('password') }}</span>
			</div>
	    </div> 
	    @endif
    </div>
    <div class="form-group">
      <div class="col-lg-4 col-lg-offset-2">
        {!! Form::button('submit',["type"=>"submit","class"=>"btn btn-primary"]) !!}
      </div>
    </div>
  </fieldset>
{!! Form::close() !!}



@endsection
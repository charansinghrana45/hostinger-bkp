@extends('layout.master')

@push('css')
<style>
.customer-info:even {
	background-color: #073642;
}
</style>
@endpush
@section('content')

<div class="col-lg-12">
<div class="alert alert-dismissible alert-success col-lg-4">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <span> {{ $success_msg }} </span>
</div>
</div>

<div class="col-lg-12">
<div class="panel panel-default">
  <div class="panel-heading">Panel heading</div>
  <div class="panel-body">
    <table class="table table-striped table-hover">
	  <thead></thead>
	  <tbody>
	  @forelse($data as $customer)
	    <tr class="customer-info">
	      <td>
	      	<p>{{ $customer->name }}</p>
		    <p>{{ $customer->email }}</p>
		    <p>{{ $customer->phone }}</p>
		    <p>{{ $customer->address }}</p>
	      </td>
	    </tr>
	  @empty
		<tr>
			<td><p>currently no results available.</p></td>
		</tr>
	  @endforelse  
	  </tbody>
	</table> 
  </div>
</div>
</div>

@endsection('content')
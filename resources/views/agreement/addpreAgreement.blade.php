@extends('app')
@section('content')
	<h1>Choose Owner and Client </h1>

	<hr/>

	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	{!! Form::open(['action' => 'RentalAgreementController@create', 'method' => 'put']) !!}

	{!! Form::label('tenant', 'Tenant', ['class' => 'control-label']) !!}
	{!! Form::select('tenant', $clientList , null , ['class' => 'form-control']) !!}

	{!! Form::label('owner', 'Owner', ['class' => 'control-label']) !!}
	{!! Form::select('owner', $ownerList , null , ['class' => 'form-control']) !!}

	{!! Form::submit('Submit', ['class' => 'form-control']) !!}


	{!! Form::close() !!}




@endsection
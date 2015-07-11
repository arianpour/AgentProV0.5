@extends('app')
@section('content')
	<h1>Editing " {{ $client->name }} "</h1>
	<p class="lead">Edit and save this Client below, or
		<a href="{{ action('OwnerController@index') }}">
			go back to all owner.</a></p>
	<hr>
	@if($errors->any())
		<div class="alert alert-danger">
			@foreach($errors->all() as $error)
				<p>{{ $error }}</p>
			@endforeach
		</div>
	@endif

	{!! Form::model($client,
	['action' => ['OwnerController@update', $client],
	'method' => 'post'])
	!!}
	{!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
	{!! Form::text('name', null, ['class' => 'field']) !!}

	{!! Form::label('idNumber', 'IC/ passport No', ['class' => 'control-label']) !!}
	{!! Form::text('idNumber', null, ['class' => 'field']) !!}
	{!! Form::label('Nationality', 'Nationality', ['class' => 'control-label']) !!}
	{!! Form::select('nationality', ['Malaysia','Singapore'] , null , ['class' => 'field']) !!}
	{!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
	{!! Form::email('email', null, ['class' => 'form-control']) !!}
	{!! Form::label('phone', 'Phone no', ['class' => 'control-label']) !!}
	{!! Form::text('phoneNo', null, ['class' => 'field']) !!}
	{!! Form::submit('Update Client', ['class' => 'button']) !!}
	{!! Form::close() !!}

@endsection
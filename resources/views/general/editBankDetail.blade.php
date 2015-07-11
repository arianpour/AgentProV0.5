@extends('app')
@section('content')
	<h1>Editing " {{ $client->firstName }} {{ $client->lastName }} "</h1>
	<p class="lead">Edit and save this Client's Bank details below, or
		<a href="{{ action('OwnerController@index') }}">go back to all Owners List.</a></p>
	<hr>
	@if($errors->any())
		<div class="alert alert-danger">
			@foreach($errors->all() as $error)
				<p>{{ $error }}</p>
			@endforeach
		</div>
	@endif

	{!! Form::model($bank,
	['action' => ['BankDetailController@update', $bank],
	'method' => 'post'])
	!!}
	{!! Form::label('bankName', 'Bank Name', ['class' => 'control-label']) !!}
	{!! Form::text('bankName', null, ['class' => 'field']) !!}
	{!! Form::label('accountNo', 'Account Number', ['class' => 'control-label']) !!}
	{!! Form::text('accountNo', null, ['class' => 'field']) !!}

	{!! Form::submit('Update Bank Details', ['class' => 'button']) !!}
	{!! Form::close() !!}

@endsection
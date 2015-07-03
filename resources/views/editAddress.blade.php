@extends('app')
@section('content')

	<h1>Editing " {{ $client->name }}  "</h1>
	<!--TODO: fix the return page by if the pages redirect from owner,Client
	or property goes back to their listing -->
	<p class="lead">Edit and save this Address below.</p>
	<hr>
	@if($errors->any())
		<div class="alert alert-danger">
			@foreach($errors->all() as $error)
				<p>{{ $error }}</p>
			@endforeach
		</div>
	@endif
	{!! Form::model($address,
	['action' => ['AddressController@update', $address->id],
	'method' => 'post'])
	!!}

	{!! Form::label('unit', 'unit', ['class' => 'control-label']) !!}
	{!! Form::text('unit', null, ['class' => 'field']) !!}
	{!! Form::label('street', 'street', ['class' => 'control-label']) !!}
	{!! Form::text('street', null, ['class' => 'field']) !!}
	{!! Form::label('postcode', 'post Code', ['class' => 'control-label']) !!}
	{!! Form::text('postCode', null, ['class' => 'field']) !!}
	{!! Form::label('city', 'City', ['class' => 'control-label']) !!}
	{!! Form::text('city', null, ['class' => 'field']) !!}
	{!! Form::label('state', 'state', ['class' => 'control-label']) !!}
	{!! Form::text('state', null, ['class' => 'field']) !!}
	{!! Form::label('country', 'country', ['class' => 'control-label']) !!}
	{!! Form::text('country', null, ['class' => 'field']) !!}
	{!! Form::submit('Update address', ['class' => 'button']) !!}

	{!! Form::close() !!}


@endsection
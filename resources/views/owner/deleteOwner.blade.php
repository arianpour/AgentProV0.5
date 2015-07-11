@extends('app')
@section('content')

	<h1>{{ $client->firstName }} {{ $client->lastName }}</h1>

	<hr>

	<div class="row">
		<div class="col-md-6">
			<a href="{{ action('OwnerController@index') }}" class="btn btn-info">Back to all Owners</a>
			<a href="{{ action('OwnerController@edit', $client) }}" class="btn btn-primary">Edit owner</a>
		</div>
		<div class="col-md-6 text-right">
			{!! Form::open([
			'method' => 'DELETE',
			'action' => ['OwnerController@destroy', $owner->id]
			]) !!}
			{!! Form::submit('Delete this Owner?', ['class' => 'btn btn-danger']) !!}
			{!! Form::close() !!}
		</div>
	</div>

@endsection
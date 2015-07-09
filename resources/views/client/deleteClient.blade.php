@extends('app')
@section('content')

	<h1>{{ $client->firstName }} {{ $client->lastName }}</h1>

	<hr>

	<div class="row">
		<div class="col-md-6">
			<a href="{{ action('ClientController@index') }}" class="btn btn-info">Back to all Clients</a>
			<a href="{{ action('ClientController@edit', $client) }}" class="btn btn-primary">Edit client</a>
		</div>
		<div class="col-md-6 text-right">
			{!! Form::open([
			'method' => 'DELETE',
			'action' => ['ClientController@destroy', $client->id]
			]) !!}
			{!! Form::submit('Delete this Client?', ['class' => 'btn btn-danger']) !!}
			{!! Form::close() !!}
		</div>
	</div>

@endsection
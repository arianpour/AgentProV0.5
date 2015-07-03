@extends('app')
@section('content')

	@if(!$clientList->isEmpty())
		@foreach($clientList as $client)

			<ul>

				{{$client->name}}
				<p>{{ $client->idNumber}}</p>
				<p>
					<a href="{{ action('ClientController@show', $client->id) }}" class="btn btn-info">View Client</a>
					<a href="{{ action('ClientController@edit', $client->id) }}" class="btn btn-primary">Edit Client</a>
				</p>
				<hr>
			</ul>

		@endforeach
	@else
		<h1> No client added yet , please add new Client</h1>
	@endif

@endsection
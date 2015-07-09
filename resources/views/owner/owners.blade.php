@extends('app')
@section('content')


	@if(!$clientList->isEmpty())
		@foreach($clientList as $client)

			<ul>
				{{$client->name}}
				<p>{{ $client->idNumber}}</p>
				<p>
					<a href="{{ action('OwnerController@show', $client) }}" class="btn btn-info">View Owner</a>
					<a href="{{ action('OwnerController@edit', $client) }}" class="btn btn-primary">Edit Owner</a>
				</p>
				<hr>
			</ul>

		@endforeach
	@else
		<h1> No Owner added yet</h1>
	@endif

@endsection
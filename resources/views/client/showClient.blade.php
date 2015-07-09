@extends('app')
@section('content')
	<h1>{{ $client->name }}</h1>

	<p>IC / Passport No: {{ $client->idNumber }} </p>
	<p>Email: {{ $client->email }} </p>
	<p>Nationality: {{ $client->nationality }} </p>
	<p>Phone No: {{ $client->phoneNo }} </p>
	@foreach($address as $item)

		<p>Unit: {{$item->unit}}</p>
		<p>Street: {{$item->street}}</p>
		<p>City: {{$item->city}}</p>
		<p>State: {{$item->state}}</p>
		<p>post Code: {{$item->postCode}}</p>
		<p>Country: {{$item->country}}</p>
		<hr>
	@endforeach

	<a href="{{ action('ClientController@index') }}" class="btn btn-info">Back to all Tenant</a>
	<a href="{{ action('ClientController@edit', $client) }}" class="btn btn-primary">Edit Tenant Details</a>
	<a href="{{ action('AddressController@edit', $client) }}" class="btn btn-primary">Edit Address</a>
	<div class="pull-right">
		<a href="{{action('ClientController@destroy',$client)}}" class="btn btn-danger">Delete this Tenant</a>
	</div>
@endsection
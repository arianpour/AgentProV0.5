@extends('app')
@section('content')
	<h1>{{ $client->name }} </h1>

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

	@foreach($bankDetails as $item)

		<p>Bank Name: {{$item->bankName}}</p>
		<p>Account Number: {{$item->accountNo}}</p>

		<hr>
	@endforeach

	<hr/>



	@if($property)
		<p>Property Owned By this Owner:</p>
		@foreach($property as $pro)
			@foreach($pro as $item)

				<p>Unit: {{$item->unit}}</p>
				<p>Street: {{$item->street}}</p>
				<p>City: {{$item->city}}</p>
				<p>State: {{$item->state}}</p>
				<p>post Code: {{$item->postCode}}</p>
				<p>Country: {{$item->country}}</p>
				<a href="{{ action('PropertyController@edit', $item->id) }}" class="btn btn-primary">Edit This Property</a>
				<a href="{{ action('PropertyController@destroy',$item->id)}}" class="btn btn-danger">Delete this Property</a>
				<hr>
			@endforeach
		@endforeach
	@else
		<p>Add new property for this Owner</p>
		<hr/>
	@endif

	<a href="{{ action('OwnerController@index') }}" class="btn btn-info">Back to all Owner</a>
	<a href="{{ action('OwnerController@edit', $client) }}" class="btn btn-primary">Edit Owner Details</a>
	<a href="{{ action('AddressController@edit', $client) }}" class="btn btn-primary">Edit Address</a>
	<a href="{{ action('BankDetailController@edit', $client) }}" class="btn btn-primary">Edit Bank Details</a>
	<a href="{{ action('PropertyController@store', $client) }}" class="btn btn-primary">Add Property</a>

	<div class="pull-right">
		<a href="{{action('OwnerController@destroy',$client)}}" class="btn btn-danger">Delete this Owner</a>
	</div>
@endsection
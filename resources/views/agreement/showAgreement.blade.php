@extends('app')
@section('content')
	<h1>Agreement Details </h1>
	<hr>
	<p>The premise Address</p>
		<p>Unit: {{$address->unit}}</p>
		<p>Street: {{$address->street}}</p>
		<p>City: {{$address->city}}</p>
		<p>State: {{$address->state}}</p>
		<p>post Code: {{$address->postCode}}</p>
		<p>Country: {{$address->country}}</p>
	<a href="{{ action('AddressController@edit', $address) }}" class="btn btn-primary">Edit property Details</a>
		<hr>
	<p>Financial Particulars</p>
		<p>date Of Agreement: {{date("d M Y",strtotime($agreement->dateOfAgreement))}}</p>
		<p>commencing Date : {{date("d M Y",strtotime($agreement->commencingDate))}}</p>
		<p>expire Date : {{date("d M Y",strtotime($agreement->expireDate))}}</p>
		<p>rental Amount : {{$agreement->rentalAmount}}</p>
		<p>rental Deposit : {{$agreement->rentalDeposit}}</p>
		<p>utilities Deposit : {{$agreement->utilitiesDeposit}}</p>
		<p>other Deposit : {{$agreement->otherDeposit}}</p>
		<p>premise Use : {{$agreement->premiseUse}}</p>
	<a href="{{ action('RentalAgreementController@edit', $agreement) }}" class="btn btn-primary">Edit Rental Agreement Details</a>
	<hr>
	<p>Tenant Details</p>
		<p>name : {{$client->name}}</p>
		<p>nationality : {{$client->nationality}}</p>
		<p>email : {{$client->email}}</p>
		<p>idNumber : {{$client->idNumber}}</p>
		<p>phoneNo : {{$client->phoneNo}}</p>
	<a href="{{ action('ClientController@edit', $client) }}" class="btn btn-primary">Edit Client Details</a>
	<hr>
	<p>Owner Details</p>
		<p>name : {{$owner->name}}</p>
		<p>nationality : {{$owner->nationality}}</p>
		<p>email : {{$owner->email}}</p>
		<p>idNumber : {{$owner->idNumber}}</p>
		<p>phoneNo : {{$owner->phoneNo}}</p>
	<a href="{{ action('OwnerController@edit', $client) }}" class="btn btn-primary">Edit Owner Details</a>
	<hr>


	<a href="{{ action('RentalAgreementController@index') }}" class="btn btn-info">Back to all Rental Agreement</a>

	<div class="pull-right">
		<a href="{{action('RentalAgreementController@destroy',$agreement)}}" class="btn btn-danger">Delete this Rental Agreement</a>
	</div>
@endsection
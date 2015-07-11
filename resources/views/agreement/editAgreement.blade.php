@extends('app')
@section('content')
	<h1>Editing Agreement</h1>
	<p class="lead">Edit and save this Agreement below, or
		<a href="{{ action('RentalAgreementController@index') }}">go back to all Agreement.</a></p>
	<hr>
	@if($errors->any())
		<div class="alert alert-danger">
			@foreach($errors->all() as $error)
				<p>{{ $error }}</p>
			@endforeach
		</div>
	@endif

	{!! Form::model($agreement,
	['action' => ['RentalAgreementController@update', $agreement],
	'method' => 'post'])
	!!}

	{!! Form::label('property', 'Property Address', ['class' => 'control-label']) !!}
	{!! Form::select('property_id', $adds ,null , ['class' => 'form-control']) !!}

	{!! Form::label('dateOfAgreement', 'Date of Agreement', ['class' => 'control-label']) !!}
	{!! Form::input('date', 'dateOfAgreement' , null , ['class' => 'form-control']) !!}

	{!! Form::label('commencingDate', 'Commencing Date', ['class' => 'control-label']) !!}
	{!! Form::input('commencingDate', 'date' , null , ['class' => 'form-control']) !!}

	{!! Form::label('expireDate', 'expire Date', ['class' => 'control-label']) !!}
	{!! Form::input('expireDate', 'date' , null , ['class' => 'form-control']) !!}

	{!! Form::label('rentalAmount', 'rental Amount', ['class' => 'control-label']) !!}
	{!! Form::text('rentalAmount' , null , ['class' => 'form-control']) !!}

	{!! Form::label('rentalDeposit', 'rental Deposit Amount', ['class' => 'control-label']) !!}
	{!! Form::text('rentalDeposit' , null , ['class' => 'form-control']) !!}

	{!! Form::label('utilitiesDeposit', 'utilities Deposit Amount', ['class' => 'control-label']) !!}
	{!! Form::text('utilitiesDeposit' , null , ['class' => 'form-control']) !!}

	{!! Form::label('otherDeposit', 'other Deposit Amount', ['class' => 'control-label']) !!}
	{!! Form::text('otherDeposit', null , ['class' => 'form-control']) !!}

	{!! Form::label('premiseUse', 'premise Use ', ['class' => 'control-label']) !!}
	{!! Form::text('premiseUse' , null , ['class' => 'form-control']) !!}


	{!! Form::submit('Submit', ['class' => 'button']) !!}

	{!! Form::close() !!}


@endsection
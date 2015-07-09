@extends('app')
@section('content')
	<h1>Add new Agreement</h1>

	<hr/>

	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif


	{!! Form::open(['action' => 'RentalAgreementController@store', 'method' => 'post']) !!}


	{!! Form::label('property', 'Property', ['class' => 'control-label']) !!}
	{!! Form::select('property_id', $adds , null , ['class' => 'form-control']) !!}
	
	{!! Form::label('dateOfAgreement', 'Date of Agreement', ['class' => 'control-label']) !!}
	{!! Form::input('date', 'dateOfAgreement' , date('Y-m-d') , ['class' => 'form-control']) !!}

	{!! Form::label('commencingDate', 'Commencing Date', ['class' => 'control-label']) !!}
	{!! Form::input('commencingDate', 'date' , date('Y-m-d') , ['class' => 'form-control']) !!}

	{!! Form::label('expireDate', 'expire Date', ['class' => 'control-label']) !!}
	{!! Form::input('expireDate', 'date' , date('Y-m-d') , ['class' => 'form-control']) !!}

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
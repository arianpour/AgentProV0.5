@extends('app')
@section('content')
	<h1>{{Session::get('addressMessage')}}</h1>

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
	{!! Form::open(['action' => 'AddressController@store', 'method' => 'post']) !!}

	{!! Form::label('unit', 'unit', ['class' => 'control-label']) !!}

	{!! Form::text('unit', '', ['class' => 'field']) !!}
	{!! Form::label('street', 'street', ['class' => 'control-label']) !!}
	{!! Form::text('street', '', ['class' => 'field']) !!}
	{!! Form::label('postcode', 'post Code', ['class' => 'control-label']) !!}
	{!! Form::text('postCode', '', ['class' => 'field']) !!}
	{!! Form::label('city', 'City', ['class' => 'control-label']) !!}
	{!! Form::text('city', '', ['class' => 'field']) !!}
	{!! Form::label('state', 'state', ['class' => 'control-label']) !!}
	{!! Form::text('state', '', ['class' => 'field']) !!}
	{!! Form::label('country', 'country', ['class' => 'control-label']) !!}
	{!! Form::text('country', '', ['class' => 'field']) !!}
	{!! Form::submit('Submit', ['class' => 'button']) !!}

	{!! Form::close() !!}


@endsection
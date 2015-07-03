@extends('app')
@section('content')
	<h1>Choose Owner to add property address</h1>

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

	{!! Form::open(['action' => 'PropertyController@store', 'method' => 'post']) !!}

	{!! Form::label('chooseOwner', 'Choose Owner', ['class' => 'control-label']) !!}
	{!! Form::select('owner', $ownerList , null , ['class' => 'form-control']) !!}

	{!! Form::submit('Submit', ['class' => 'button']) !!}

	{!! Form::close() !!}


@endsection
@extends('app')
@section('content')
	<h1>Add bank Detail</h1>

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


	{!! Form::open(['action' => 'BankDetailController@store', 'method' => 'post']) !!}
	{!! Form::label('bankName', 'Bank Name', ['class' => 'control-label']) !!}
	{!! Form::text('bankName', null, ['class' => 'field']) !!}
	{!! Form::label('accountNo', 'Account Number', ['class' => 'control-label']) !!}
	{!! Form::text('accountNo',null, ['class' => 'field']) !!}

	{!! Form::submit('Submit', ['class' => 'button']) !!}

	{!! Form::close() !!}

@endsection
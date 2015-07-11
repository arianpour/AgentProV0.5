@extends('app')
@section('content')


	@if(!$agreementList->isEmpty())
		@foreach($agreementList as $agreement)

			<ul>
				{{$agreement->name}}
				<p>{{ $agreement->idNumber}}</p>
				<p>
					<a href="{{ action('RentalAgreementController@show', $agreement) }}" class="btn btn-info">View Agreement</a>
					<a href="{{ action('RentalAgreementController@edit', $agreement) }}" class="btn btn-primary">Edit Agreement</a>
				</p>
				<hr>
			</ul>

		@endforeach
	@else
		<h1> No Agreement added yet</h1>
	@endif

@endsection
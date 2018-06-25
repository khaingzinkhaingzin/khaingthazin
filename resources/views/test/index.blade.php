@extends('layouts.app')

<h3>
	@section('title')
		Home
	@endsection
</h3>

@section('content')
	<h1>This is my test page!</h1>
	@if(count($beatles) > 0)
		@foreach($beatles as $beatle) 

			<h3 class="name">{{ $beatle }}</h3>

		@endforeach
	@else
		<h1>Nothing to show.....</h1>
	@endif
@endsection
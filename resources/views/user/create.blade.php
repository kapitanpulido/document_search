@extends('layout.app')
@section('content')

<div class="container-fluid">
	<div class="animate fadeIn">

		@include('flash::message')
		@include('common.errors')
	
		{{ html()->form('POST', '/user')->id('user_form')->open() }}

      @include('user.fields')

    {{ html()->form()->close() }}
		
	</div>
</div>

@endsection

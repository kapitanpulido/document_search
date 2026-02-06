@extends('layout.app')
@section('content')

<div class="container-fluid">
	<div class="animate fadeIn">

		@include('flash::message')
		@include('common.errors')

		{{ html()->modelForm($user, 'PATCH', '/user/'.$user->encrypted_id)->id('user_form')->open() }}
		
			@include('user.fields')

		{{ html()->closeModelForm() }}

	</div>
</div>

@endsection

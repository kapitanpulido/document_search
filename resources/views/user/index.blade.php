@extends('layout.app')
@section('content')
<div class="container-fluid">
	<div class="animate fadeIn">

		@include('flash::message')

		<div class="card">
			<div class="card-header">

				{{ html()->form('GET', '/maintenance/user')->open() }}
					<div class="row">
						<div class="col text-start fs-3">
							User Accounts
						</div>
						<div class="col d-flex flex-row justify-content-end">
							
							&nbsp;
							
							{!! html()->input($type = 'button', $name = 'add_new', $value = 'Add New')->class('btn btn-primary')->attribute('onclick', 'window.location.href="/user/create"') !!}
						</div>
					</div>
				{{ html()->form()->close() }}
				
			</div>
			<div class="card-body">
				@if($users->count())
					@include('user.table')
				@else
					<div class="alert alert-danger">
						<i class="fa-solid fa-circle-exclamation"></i> No user found for the selected parameter.
					</div>
				@endif				
			</div>
		</div>

	</div>
</div>

@endsection

<div class="alert alert-danger d-none" id="error_msg"></div>

<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col text-start fs-3">
				{{ routeName() == 'user.create' ? 'Add New' : 'Update' }} User
			</div>
			<div class="col text-end">
				@if(routeName() == 'user.edit')
					<a class="btn btn-primary btn-md" href="{{ route('user.create') }}"><i class="fa fa-plus-square" aria-hidden="true"></i> Add New</a>
				@endif
			</div>
		</div>


	</div>
	<div class="card-body">
		<div class="container-fluid">

			

			<div class="row mb-3">
		    <div class="col-2">
					<i class="fa fa-asterisk fa-2xs text-danger" aria-hidden="true"></i> Name :
		    </div>
		    <div class="col">
					{{ html()->text('name')->class('form-control tooltips')->attributes(['placeholder' => 'Enter name', 'data-bs-toggle' => 'tooltip', 'title' => 'Max: 255 characters', 'maxlength' => '255'])->required() }}
		    </div>
		  </div>

			<div class="row mb-3">
		    <div class="col-2">
					<i class="fa fa-asterisk fa-2xs text-danger" aria-hidden="true"></i> Email :
		    </div>
		    <div class="col">
					{{ html()->email('email')->class('form-control tooltips')->attributes(['placeholder' => 'Enter email address', 'data-bs-toggle' => 'tooltip', 'title' => '&bull; Valid email format<br/>&bull; Max: 255 characters', 'data-bs-html' => 'true', 'maxlength' => '255'])->required() }}
		    </div>
		  </div>

			<div class="row mb-3">
			  <div class="col-2">
			    <i class="fa fa-asterisk fa-2xs text-danger" aria-hidden="true"></i> Status :
			  </div>
			  <div class="col-10">
			    {{ html()->select('is_active')->value($is_active)->options(activeOptions())->class('form-control')->required()->attributes(['data-bs-toggle' => 'tooltip', 'title' => 'Select status']) }}
			  </div>
			</div>


			@if(routeName() == 'user.edit')
			  <div class="row">
			    <div class="col-10 offset-2">
			      <div class="alert alert-info">
			        <i class="fa fa-info-circle" aria-hidden="true"></i>
			        Please leave the fields below blank if you are not updating them.
			      </div>
			    </div>
			  </div>
			@endif

			<div class="row mb-3">
			  <div class="col-2 text-right">
			    @if(routeName() == 'user.create')
			      <i class="fa fa-asterisk fa-2xs text-danger" aria-hidden="true"></i>
			    @endif
			    Password :
			  </div>
			  <div class="col-10">
			    @if(routeName() == 'user.create')
			      {{ html()->password('password')->class('form-control tooltips')->attributes(['placeholder' => 'Enter password', 'data-bs-toggle' => 'tooltip', 'title' => 'Max: 255 characters', 'maxlength' => '255'])->required() }}
			    @else
			      {{ html()->password('password')->class('form-control tooltips')->attributes(['placeholder' => 'Enter password', 'data-bs-toggle' => 'tooltip', 'title' => 'Max: 255 characters', 'maxlength' => '255']) }}
			    @endif
			  </div>
			</div>

			<div class="row mb-3">
			  <div class="col-2 text-right">
			    @if(routeName() == 'user.create')
			      <i class="fa fa-asterisk fa-2xs text-danger" aria-hidden="true"></i>
			    @endif
			    Confirm Password :
			  </div>
			  <div class="col-10">
			    @if(routeName() == 'user.create')
			      {{ html()->password('password_confirmation')->class('form-control tooltips')->attributes(['placeholder' => 'Enter password confirmation', 'data-bs-toggle' => 'tooltip', 'title' => 'Max: 255 characters', 'maxlength' => '255'])->required() }}
			    @else
			      {{ html()->password('password_confirmation')->class('form-control tooltips')->attributes(['placeholder' => 'Enter password confirmation', 'data-bs-toggle' => 'tooltip', 'title' => 'Max: 255 characters', 'maxlength' => '255']) }}
			    @endif
			  </div>
			</div>

			<div class="row">
				<div class="col-10 offset-2">
			    @php $button_label = routeName() == 'user.create' ? 'SAVE RECORD' : 'UPDATE RECORD' ; @endphp

			    {{ html()->input($type = 'submit', $name = 'submit_user', $value = $button_label)->class('btn btn-primary btn-lg') }}
				</div>
			</div>


		</div>
	</div>
</div>

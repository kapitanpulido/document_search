@extends('layout.app')

@section('content')
  <div class="card mb-4">
    <div class="card-header fs-3">
			Upload Documents
    </div>
    <div class="card-body container">
			<div class="alert alert-danger d-none" id="error_msg"></div>

			
			
			<form action="{{ route('upload.store') }}" method="POST" enctype="multipart/form-data">
				@csrf

				<div class="input-group">
					{{ html()->file('file')->class('form-control form-control-lg h-100 tooltips')->attributes(['name' => 'document', 'data-bs-toggle' => 'tooltip', 'data-bs-html' => 'true', 'title' => 'Browse file or<br/>Drag & Drop here.'])->required() }}

					{{ html()->input($type = 'submit', $name = 'upload_document', $value = 'Upload File')->class('btn btn-primary btn-lg') }}
				</div>
			</form>

			<br/><br/>

			@if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">{!! $message !!}</div>
      @endif

			@if ($errors->has('document'))
        <div class="alert alert-danger" id="lockout-message">
          <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
          {{ $errors->first('document') }}
        </div>
	    @endif

			<div class="card border-primary">
				<div class="card-header bg-primary text-white">
					<h4>Uploaded Documents:</h4>
				</div>
				<div class="card-body">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>TYPE</th>
								<th>FILENAME</th>
								<th class="text-center">UPLOADED AT</th>
								<th><i class="fa-solid fa-trash"></i></th>
							</tr>
						</thead>
						@foreach($documents as $document)
							<tr>
								<td>{!! mime($document->filetype) !!}</td>
								<td class="fs-5">
									<a href="{{ route('documents.download', $document->id) }}" target="_blank" class="fs-5 text-decoration-none link-primary" >
						        {{ $document->filename }}
						    	</a>
								</td>
								<td class="fs-5 text-center">{!!dateTimeFormat($document->created_at) !!}</td>
								<td onclick="deleteDocument('{{encrypt($document->id)}}', '{{ $document->filename }}')">
							    <i class="fa-solid fa-trash-can text-danger"></i>									
								</td>
							</tr>
						@endforeach
					</table>

					{{ $documents->links("pagination::bootstrap-4") }}
				</div>
			</div>

			

    </div>
  </div>

	<form id="update-form" method="POST" style="display:none;">
	    @csrf
	    @method('PATCH')
	</form>
@endsection

@extends('layout.app')

@section('content')
  <div class="card mb-4">
    <div class="card-header fs-3">
			Dashboard
			<a href="/user-manual#dashboard" class="float-end text-danger" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Click to see user manual."><i class="fa-solid fa-person-chalkboard"></i></a>
    </div>
    <div class="card-body">
			<div class="card">
				<div class='card-header bg-light fs-5'>
			    <i class="fa fa-area-chart" aria-hidden="true"></i>
					Weekly Statistics
			  </div>
				<div class="card-body">
					<canvas id="document_chart" height="60" width="300"></canvas>
				</div>
			</div>
			
			<div class="card border-primary mt-4">
				<div class="card-header bg-primary text-white">
					<h4>Uploaded Documents:</h4>
				</div>
				<div class="card-body">
					<table class="table table-striped">
						<thead>
							<tr><th>FILENAME</th><th>UPLOADED AT</th></tr>
						</thead>
						@foreach($documents as $document)
							<tr>
								<td>{{ $document->filename }}</td>
								<td>{!!dateTimeFormat($document->created_at) !!}</td>
							</tr>
						@endforeach
					</table>

					{{ $documents->links("pagination::bootstrap-4") }}
				</div>
			</div>

			
    </div>
  </div>

	

@endsection

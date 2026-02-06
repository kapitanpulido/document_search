<table class="table table-striped table-hover">
	<thead>
		<tr>		
			<th>Name</th>
			<th>Email</th>
			<th>Status</th>
		</tr>
	</thead>

	<tbody>
		@foreach($users as $user)
			
			<tr onclick="window.location='{{ route('user.edit', $user->encrypted_id) }}'" class="hand" data-bs-toggle="tooltip" data-bs-placement="top" title="Click to edit">
				
				<td>{{ $user->name }}</td>
				<td>{{ $user->email }}</td>
				<td>
					{!! $user->is_active ? '<div class="badge bg-success">Active</div>' : '<div class="badge bg-danger">Inactive</div>' !!}
				</td>
				
			</tr>

		@endforeach
	</tbody>
</table>
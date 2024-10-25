<table class="table table-striped table-bordered spTable">
	<thead>
		<tr>
			<th>ID</th>
			<th>Type</th>

			<th>Title</th>
			<th>Details</th>
			<th>File</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($files as $element)
			<tr>
				<td>{{ $element->id }}</td>
				<td>{{ $element->type }}</td>

				<td>{{ $element->title }}</td>
				<td>{{ $element->details }}</td>
				<td>
					<img src="{{ asset('storage/thumb/'.$element->file) }}" width="50">
				</td>
				<td>
					<button type="button" class="btn btn-xs btn-success my-1 mx-1" onclick="editFile({{ $element->id }})">Edit</button>
					<button type="button" class="btn btn-xs btn-danger" onclick="deleteFile({{ $element->id }})">Delete</button>
				</td>
			</tr>
		@endforeach

	</tbody>
</table>
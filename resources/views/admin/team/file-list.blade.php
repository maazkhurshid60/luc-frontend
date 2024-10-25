<table class="table">
    <thead>
        <tr>
            <td>{{ $team->name }}</td>
            <td>{{ $team->designation }}</td>
        </tr>
        <tr>
            <td>
                <label for="tool_label">Tool Label</label>
                <input type="text" class="form-control form-control-sm" id="tool_label" name="tool_label"
                    value="{{ $team->tool_label }}">
            </td>
            <td>
                <button class="btn btn-sm btn-primary float-right mt-4" onclick="updateLabel({{ $team->id }})">Update
                    Label</button>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <div class="alert alert-danger label-errors" style="display: none;"></div>
            </td>
        </tr>
    </thead>
</table>
<div class="card-body">
    <div class="team-files-container">
        <table class="table table-striped table-bordered spTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>File</th>
                    <th>Display Order</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($files as $element)
                    <tr>
                        <td>{{ $element->id }}</td>
                        <td>{{ $element->title }}</td>
                        <td>
                            <img src="{{ asset('storage/images/' . $element->file) }}" width="50" alt="file">
                        </td>
                        <td>{{ $element->display_order }}</td>
                        <td>
                            <button type="button" class="btn btn-xs btn-success my-1 mx-1"
                                onclick="editFile({{ $element->id }})">Edit</button>
                            <button type="button" class="btn btn-xs btn-danger"
                                onclick="deleteFile({{ $element->id }})">Delete</button>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>

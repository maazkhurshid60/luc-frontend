<div class="form-control my-1">
    <strong>Job Title :</strong>
    @if (!is_null($data->job_id))
        {{ $data->job->title }}
    @else
        Job Not found
    @endif
</div>
<div class="form-control my-1">
    <strong>CV :</strong>
    @if (!is_null($data->file))
        <a class="text-primary" href='{{ asset('storage/images/' . $data->file) }}'> Download CV</a>
    @else
        CV Not found
    @endif
</div>

<div class="form-control my-1">
    <strong>Name :</strong> {{ $data->name }}
</div>
<div class="form-control my-1">
    <strong>Email :</strong> {{ $data->email }}
</div>
<div class="form-control my-1">
    <strong>Contact :</strong> {{ $data->contact_no }}
</div>
<div class="border  my-1" style="padding: 10px">
    <strong>Description :</strong> {{ $data->description }}
</div>

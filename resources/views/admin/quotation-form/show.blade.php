<div class="form-control my-1">
    <strong>User :</strong><span class="text-success"> {{ $data->name }}</span>
</div>

<div class="form-control my-1">
    <strong>Email :</strong> {{ $data->email }}
</div>

<div class="form-control my-1">
    <strong>Contact :</strong> {{ $data->contact }}
</div>

<div class="border my-1" style="padding: 10px">
    <strong>Subject :</strong> {{ $data->subject }}
</div>

<div class="border my-1" style="padding: 10px">
    <strong>Message :</strong> {{ $data->message }}
</div>

<div class="border my-1" style="padding: 10px">
    <strong>Service:</strong>
    @if (!empty($data->service))
        <span>{{ ucwords(str_replace('_', ' ', $data->service)) }}</span>
    @else
        <span class="text-danger">No service selected by the user.</span>
    @endif
    
    
</div>

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
    <strong>Services:</strong>
    @if (!empty($data->service))
        @php
            $services = json_decode($data->services, true);
        @endphp
        @if (is_array($services) && count($services))
            <ul>
                @foreach ($services as $service)
                    <li>{{ ucwords(str_replace('_', ' ', $service)) }}</li>
                @endforeach
            </ul>
        @else
            <span class="text-danger">No services available.</span>
        @endif
    @else
        <span class="text-danger">No services available.</span>
    @endif
</div>

<div class="border my-1" style="padding: 10px">
    <strong>Technologies:</strong>
    @if (!empty($data->technology))
        @php
            $technologies = json_decode($data->technologies, true);
        @endphp
        @if (is_array($technologies) && count($technologies))
            <ul>
                @foreach ($technologies as $technology)
                    <li>{{ ucwords(str_replace('_', ' ', $technology)) }}</li>
                @endforeach
            </ul>
        @else
            <span class="text-danger">No technologies available.</span>
        @endif
    @else
        <span class="text-danger">No technologies available.</span>
    @endif
</div>

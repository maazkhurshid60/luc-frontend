<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Hiring Request</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        p {
            font-size: 16px;
            margin: 10px 0;
        }

        ul {
            list-style-type: disc;
            margin-left: 20px;
        }

        .divider {
            border-top: 1px solid #ddd;
            margin: 20px 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Contact Us</h1>

        <p><strong>Name:</strong> {{ $name }}</p>
        <p><strong>Email:</strong> {{ $email }}</p>
        <p><strong>Phone Number:</strong> {{ $number }}</p>
        <p>{{ $message }}</p>

        <h2>Services</h2>
        @if (!empty($services))
            <ul>
                @foreach ($services as $service)
                    <li>{{ ucwords(str_replace('_', ' ', $service)) }}</li>
                @endforeach
            </ul>
        @else
            <p>No services selected.</p>
        @endif

        <h2>Technologies</h2>
        @if (!empty($technologies))
            <ul>
                @foreach ($technologies as $technology)
                    <li>{{ ucwords(str_replace('_', ' ', $technology)) }}</li>
                @endforeach
            </ul>
        @else
            <p>No technologies selected.</p>
        @endif
    </div>
</body>

</html>

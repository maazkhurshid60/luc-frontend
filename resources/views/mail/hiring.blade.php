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
        <h1>New Hiring Request</h1>

        <p><strong>Job For:</strong> {{ $member }}</p>
        <p><strong>Lead Position:</strong> {{ $lead }}</p>
        <p><strong>Email:</strong> {{ $email }}</p>
        <p><strong>Contact Number:</strong> {{ $number }}</p>
        <p><strong>Subject:</strong> {{ $subject }}</p>
        
        <p>{{ $message }}</p>

        <h2>Services</h2>
        <ul>
            @foreach ($services as $service)
                <li>{{ ucwords(str_replace('_', ' ', $service)) }}</li>
            @endforeach
        </ul>

        <h2>Technologies</h2>
        <ul>
            @foreach ($technologies as $technology)
                <li>{{ ucwords(str_replace('_', ' ', $technology)) }}</li>
            @endforeach
        </ul>
    </div>

</body>

</html>

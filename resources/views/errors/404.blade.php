<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('assets/img/redstar-icon.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    @vite(['resources/scss/app.scss', 'resources/css/app.css', 'resources/js/app.js'])
    <style>
        .container1 {
            margin-top: 100px;
        }

        .text-center {
            text-align: center;
            font-family: 'Montserrat';
        }

        .image {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .image img {
            width: 50vw;
        }

        .btn-back {
            text-align: center;
            padding-bottom: 33px;
        }
    </style>
</head>

<body>
    @include('layouts.nav')
    <!-- 404 PAGE -->
    <section>
        <div class="wrapper">
            <div class="container1">
                <div class="image">
                    <img src="{{ asset('404.webp') }}" alt="404">
                </div>
            </div>
            <div style="display: flex; justify-content: center;">
                <a href="{{ url()->previous() }}" class="btn btn-back">Go Back</a>
            </div>
        </div>
    </section>
    <!-- end:  404 PAGE -->
    @include('layouts.footer')
</body>

</html>

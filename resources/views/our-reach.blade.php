@extends('layouts.main-layout')


@section('title', $data->page_title)

@section('custom-styles')
@endsection
@section('content')
    <div class="main">
        <div class="main">

            @include('partials.breadcrumbs', [
                'bg_image' => asset('assets/frontend/images/careers-hero-sec-bg.webp'),
                'home' => ['name' => 'Home', 'route' => 'index'],
                'parent' => '',
                'page_title' => $data->name,
            ])

            @include('partials.maps')

            <div class="container-fluid d-flex flex-column justify-content-center py-40px">
                <div class="container">
                    <div class="row">
                        <div class="d-flex flex-column justify-content-center  align-items-center  text-center">
                            <h2 class="head--2 mb-0 pyb-40 secondary--clr text-center ">
                                Our Projects
                            </h2>
                            <p class="body-txt1 mb-0 pyb-60 txt--clr text-center">
                                Nunc convallis semper justo quis tempor. Praesent molestie, lorem sed imperdiet tempor,
                                libero urna semper
                                urna, facilisis vulputate velit arcu vitae mi. Donec ac nisi ex.
                            </p>
                        </div>
                        @foreach ($projects as $index => $project)
                            @include('include.project-card')
                        @endforeach
                    </div>
                </div>
            </div>
            @include('partials.brands')
        </div>
    </div>
@endsection
@section('custom-js')
@endsection

@extends('layouts.main-layout')

@section('title', 'Home')

@section('custom-styles')
@section('content')
    <!-- 404 PAGE -->
    @include('partials.breadcrumbs', [
        'bg_image' => '',
        'home' => ['name' => 'Home', 'route' => 'index'],
        'parent' => '',
        'page_title' => 'Not Found',
    ])

    <section>
        <div class="wrapper">
            <div class="text-center">
                <h3>Sorry, this page isn't available.</h3>
                <p>the link you followed may be broken, or the page may have been removed.</p>
            </div>
            <div style="display: flex; justify-content: center;">
                <a href="{{ url()->previous() }}" class="btn btn-primary">Go Back</a>
            </div>
        </div>
    </section>
    <!-- end:  404 PAGE -->
@endsection

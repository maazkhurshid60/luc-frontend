@extends('layouts.main-layout')

@section('custom-styles')
@endsection
@section('content')
    <div class="main">
        @include('partials.hero')
        @include('partials.brands')
        @include('partials.about-us')
        @include('partials.counter')
        @include('partials.services')
        @include('partials.projects')
        @include('partials.maps')
        @include('partials.blogs')
        @include('partials.career')
        @include('partials.quotation')
        @include('partials.faqs')
    </div>
@endsection
@section('custom-js')
@endsection

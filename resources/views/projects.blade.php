@extends('layouts.main-layout')

@section('title', $data->page_title)

@section('meta-keywords', $data->meta_keywords ?? '')
@section('meta-description', $data->meta_description ?? '')

@if ($data->search_engine)
    @section('robots', 'nofollow, noindex')
@else
    @section('robots', 'follow, index')
@endif

@section('og-title', $data->og_title ?? '')
@section('og-description', $data->og_description ?? '')
@section('og-image', $data->og_image ?? '')
@section('og-type', $data->og_type ?? 'website')

@section('twitter-title', $data->twitter_title ?? '')
@section('twitter-description', $data->twitter_description ?? '')
@section('twitter-image', $data->twitter_image ?? '')

@section('custom-styles')
@endsection

@section('content')
    <div class="main">

        @include('partials.breadcrumbs', [
            'bg_image' => asset('assets/frontend/images/projects-bg.webp'),
            'home' => ['name' => 'Home', 'route' => 'index'],
            'parent' => '',
            'page_title' => $data->name,
        ])

        <div class="container-fluid d-flex flex-column justify-content-center py-40px">
            <div class="container">
                <div class="row">
                    <div class="d-flex flex-column justify-content-center  align-items-center  text-center">
                        <h2 class="head--2 mb-0 pyb-40 secondary--clr text-center ">
                            Our Projects
                        </h2>
                        <p class="body-txt1 mb-0 pyb-60 txt--clr text-center">
                            {{ $data->short_description }}
                        </p>
                    </div>
                    <div class="project-archive-filters pb-5 d-flex justify-content-end gap-4">
                        <div class="dropdown position-relative">
                            <button class="btn  dropdown-toggle body-txt2 secondary--clr ps-4" type="button"
                                id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                Location
                            </button>
                            <img src="{{ asset('assets/frontend/icons/location.svg') }}" alt=""
                                class="position-absolute "
                                style="filter: brightness(0) saturate(100%) invert(5%) sepia(74%) saturate(2638%) hue-rotate(220deg) brightness(97%) contrast(89%); left:10px;top:12px;width: 12px;">
                            <ul class="dropdown-menu py-3" aria-labelledby="filterDropdown">
                                <li class="cursor-pointer ps-3 py-2">
                                    <div class="form-check">
                                        <input class="form-check-input cursor-pointer" type="checkbox" value="option1"
                                            id="checkbox1">
                                        <label class="form-check-label cursor-pointer body-txt2 secondary--clr"
                                            for="checkbox1">
                                            Canada
                                        </label>
                                    </div>
                                </li>
                                <li class="cursor-pointer ps-3 py-2">
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" value="option2" id="checkbox2">
                                        <label class="form-check-label body-txt2 secondary--clr" for="checkbox2">
                                            Germany
                                        </label>
                                    </div>
                                </li>
                                <li class="cursor-pointer ps-3 py-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="option3" id="checkbox3">
                                        <label class="form-check-label body-txt2 secondary--clr" for="checkbox3">
                                            Bangladesh
                                        </label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="dropdown position-relative">
                            <button class="btn  dropdown-toggle body-txt2 secondary--clr ps-4" type="button"
                                id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                Filter By
                            </button>
                            <img src="{{ asset('assets/frontend/icons/funel-bars.svg') }}" alt=""
                                class="position-absolute "
                                style="filter: brightness(0) saturate(100%) invert(5%) sepia(74%) saturate(2638%) hue-rotate(220deg) brightness(97%) contrast(89%); left:10px;top:16px;width: 12px;">
                            <ul class="dropdown-menu py-3" aria-labelledby="filterDropdown">
                                <li class="cursor-pointer ps-3 py-2">
                                    <div class="form-check">
                                        <input class="form-check-input cursor-pointer" type="checkbox" value="option1"
                                            id="checkbox4">
                                        <label class="form-check-label cursor-pointer body-txt2 secondary--clr"
                                            for="checkbox4">
                                            Location
                                        </label>
                                    </div>
                                </li>
                                <li class="cursor-pointer ps-3 py-2">
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" value="option2" id="checkbox5">
                                        <label class="form-check-label body-txt2 secondary--clr" for="checkbox5">
                                            Project Type
                                        </label>
                                    </div>
                                </li>
                                <li class="cursor-pointer ps-3 py-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="option3" id="checkbox6">
                                        <label class="form-check-label body-txt2 secondary--clr" for="checkbox6">
                                            Industry
                                        </label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @foreach ($projects as $index => $project)
                        <div
                            class="project-content-wrapper d-flex {{ $index % 2 == 0 ? 'flex-md-row' : 'flex-md-row-reverse' }} flex-column mb-4 gap-md-0 gap-4">
                            <div class="project-img-wrap">
                                <a href="{{ url('projects/' . $project->slug) }}">
                                    <img src="{{ asset($project->image ? 'storage/images/' . $project->image : 'assets/frontend/images/project-img1.webp') }}"
                                        alt="" class="project--img">
                                </a>
                            </div>
                            <div
                                class="project-details-wrap d-flex flex-column justify-content-center align-items-md-start align-items-center {{ $index % 2 == 0 ? 'ps-md-4 ps-0' : '' }}">
                                <h3 class="head--3 secondary--clr mb-lg-4 mb-2 text-md-start text-center">
                                    {{ $project->name }}
                                </h3>
                                <p class="body-txt1 txt--clr mb-lg-4 mb-2 text-md-start text-center">
                                    {{ $project->description }}
                                </p>
                                <span class="fit-content">
                                    <a href="{{ url('projects/' . $project->slug) }}"
                                        class="text-decoration-none wht--clr primary-btn d-flex justify-content-center align-items-center">
                                        View Project
                                        <img src="{{ asset('assets/frontend/icons/arrow1.svg') }}" alt=""
                                            class="ms-2">
                                    </a>
                                </span>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>

        @include('partials.quotation-form')

        @include('partials.brands')

    </div>
@endsection
@section('custom-js')
@endsection

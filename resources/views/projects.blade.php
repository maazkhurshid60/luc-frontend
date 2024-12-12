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
                            <button class="btn dropdown-toggle body-txt2 secondary--clr ps-4" type="button"
                                id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                Filter By
                            </button>
                            <img src="{{ asset('assets/frontend/icons/funel-bars.svg') }}" alt=""
                                class="position-absolute"
                                style="filter: brightness(0) saturate(100%) invert(5%) sepia(74%) saturate(2638%) hue-rotate(220deg) brightness(97%) contrast(89%); left:10px;top:16px;width: 12px;">
                            <ul class="dropdown-menu py-3" aria-labelledby="filterDropdown">
                                <!-- Location Filter -->
                                <li class="cursor-pointer ps-3 py-2">
                                    <div class="form-check">
                                        <input class="form-check-input cursor-pointer" type="checkbox" name="country"
                                            value="all" id="filterAllCountries">
                                        <label class="form-check-label cursor-pointer body-txt2 secondary--clr"
                                            for="filterAllCountries">
                                            All Locations
                                        </label>
                                    </div>
                                </li>
                                @foreach ($countries as $country)
                                    <li class="cursor-pointer ps-3 py-2">
                                        <div class="form-check">
                                            <input class="form-check-input cursor-pointer" type="checkbox" name="country"
                                                value="{{ $country }}" id="filterCountry{{ $loop->index }}">
                                            <label class="form-check-label cursor-pointer body-txt2 secondary--clr"
                                                for="filterCountry{{ $loop->index }}">
                                                {{ $country }}
                                            </label>
                                        </div>
                                    </li>
                                @endforeach

                                <!-- Project Type Filter -->
                                @foreach ($sectors as $sector)
                                    <li class="cursor-pointer ps-3 py-2">
                                        <div class="form-check">
                                            <input class="form-check-input cursor-pointer" type="checkbox" name="sector"
                                                value="{{ $sector }}" id="filterSector{{ $loop->index }}">
                                            <label class="form-check-label cursor-pointer body-txt2 secondary--clr"
                                                for="filterSector{{ $loop->index }}">
                                                {{ $sector }}
                                            </label>
                                        </div>
                                    </li>
                                @endforeach

                                <!-- Industry Filter -->
                                @foreach ($industries as $industry)
                                    <li class="cursor-pointer ps-3 py-2">
                                        <div class="form-check">
                                            <input class="form-check-input cursor-pointer" type="checkbox" name="industry"
                                                value="{{ $industry }}" id="filterIndustry{{ $loop->index }}">
                                            <label class="form-check-label cursor-pointer body-txt2 secondary--clr"
                                                for="filterIndustry{{ $loop->index }}">
                                                {{ $industry }}
                                            </label>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>


                    </div>

                    <div id="projectsContainer">
                        @foreach ($projects as $index => $project)
                            @include('include.project-card')
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        @include('partials.quotation-form')

        @include('partials.brands')

    </div>
@endsection
@section('custom-js')
    <script>
        // document.querySelectorAll('.form-check-input').forEach(input => {
        //     input.addEventListener('change', () => {
        //         const params = new URLSearchParams();

        //         // Collect all checked inputs and append them to the query parameters
        //         document.querySelectorAll('.form-check-input:checked').forEach(checkedInput => {
        //             params.append(checkedInput.name, checkedInput.value);
        //         });

        //         // Construct the URL with query parameters
        //         const url = `/projects?${params.toString()}`;

        //         // Fetch the filtered projects and update the container
        //         fetch(url)
        //             .then(response => response.text())
        //             .then(html => {
        //                 document.querySelector('#projectsContainer').innerHTML = filtered;
        //             })
        //             .catch(error => console.error('Error fetching filtered projects:', error));
        //     });
        // });
        $(document).on('change', '.form-check-input', function() {
            const selectedFilters = {
                sector: $('input[name="sector"]:checked').val(),
                country: $('input[name="country"]:checked').val(),
                industry: $('input[name="industry"]:checked').val(),
            };

            $.ajax({
                url: '/projects',
                method: 'GET',
                data: selectedFilters,
                success: function(data) {
                    // Update the projects list dynamically
                    $('#projectsContainer').html(data);
                },
            });
        });
    </script>
@endsection

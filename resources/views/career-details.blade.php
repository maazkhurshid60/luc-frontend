@extends('layouts.main-layout')


@section('title', 'Software Engineer')

@section('custom-styles')
@endsection
@section('content')
    <div class="main">
        @include('partials.breadcrumbs', [
            'bg_image' => asset('assets/frontend/images/career-details-hero-bg.webp'),
            'home' => ['name' => __('lang.Home'), 'route' => 'index'],
            'parent' => ['name' => __('lang.careers'), 'route' => 'careers.index'],
            'page_title' => $data['page']->title,
        ])

        <div class="container-fluid py-40px">
            <div class="container">
                <div class="row pyb-60">
                    <div class="career-post-details-wrapper flex-column gap-4">
                        <div class="job-post-details text-center">
                            <img src="{{ $data['page']->file ? asset('storage/images/' . $data['page']->file) : asset('assets/frontend/icons/job-icon1.svg') }}"
                                alt="" class="pyb-40 job-img">
                            <p class="body-txt1 secondary--clr mb-4">{{ $data['settings']->siteName }}</p>
                            <h2 class="head--2 secondary--clr mb-4">{{ $data['page']->title }}</h2>
                            <span class="fit-content d-inline-block pyb-40"><a href="#"
                                    class="job-post-tag text-decoration-none primary--clr d-flex justify-content-center fw-sb">{{ $data['page']->category->title }}</a></span>
                            <div class="d-flex flex-wrap justify-content-center gap-2">
                                <span class="d-flex body-txt2 txt--clr me-lg-3 me-2 job-post-txt"><img
                                        src="{{ asset('assets/frontend/icons/meta-job-loc.svg') }}" alt=""
                                        class="me-2 ">
                                    <p class="mb-0 ">{{ $data['page']->location }}</p>
                                </span>
                                <span class="d-flex body-txt2 txt--clr me-lg-3 me-2 job-post-txt"><img
                                        src="{{ asset('assets/frontend/icons/meta-job-salary.svg') }}" alt=""
                                        class="me-2 ">
                                    <p class="mb-0 ">{{ $data['page']->salary }}</p>
                                </span>
                                <span class="d-flex body-txt2 txt--clr me-lg-3 me-2 job-post-txt"><img
                                        src="{{ asset('assets/frontend/icons/meta-job-type.svg') }}" alt=""
                                        class="me-2 ">
                                    <p class="mb-0 ">{{ $data['page']->type }}</p>
                                </span>
                                <span class="d-flex body-txt2 txt--clr me-lg-3 me-2 job-post-txt"><img
                                        src="{{ asset('assets/frontend/icons/calender.svg') }}" alt=""
                                        class="me-2" />
                                    <p class="mb-0">
                                        {{ \Carbon\Carbon::parse($data['page']->created_at)->diffForHumans() }}</p>
                                </span>
                            </div>
                        </div>
                        <hr class="grey--clr">
                        <div class="job-list-detail text-md-start text-center">
                            <div class="d-flex flex-sm-row flex-column justify-content-between align-items-center">
                                <h3 class="head--3 secondary--clr">{{ __('lang.job_description') }}</h3>
                                <span class="body-txt1 secondary--clr d-flex align-items-center mb-0">
                                    <p class="body-txt1 txt--clr mb-0">{{ __('lang.posted_on') }}</p>
                                    {{ \Carbon\Carbon::parse($data['page']->created_at)->diffForHumans() }}
                                </span>
                            </div>
                            {!! $data['page']->contents !!}

                            <div class="d-flex flex-column gap-2">
                                <span class="mb-2">
                                    <a href="#"
                                        class="text-decoration-none wht--clr primary-btn d-flex justify-content-center w-100"
                                        data-bs-toggle="modal" data-bs-target="#app_from">
                                        {{ __('lang.apply_now') }}<img
                                            src="{{ asset('assets/frontend/icons/arrow1.svg') }}" alt=""
                                            class="ms-2">
                                    </a>
                                </span>
                                <span class="mt-2">
                                    <a href="{{ route('careers.index') }}"
                                        class="text-decoration-none primary--clr body-txt2 fw-sb d-flex justify-content-center w-100">
                                        {{ __('lang.see_all_jobs') }}
                                    </a>
                                </span>
                            </div>
                            <div class="modal fade" id="app_from" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-wrapper container">
                                    <div class="modal-content">
                                        <div class="container position-relative modal-wrapper">
                                            <a href="#" class="text-decoration-none cursor-pointer"><i
                                                    class="fa-solid fa-xmark close-model primary--clr cursor-pointer position-absolute"
                                                    data-bs-dismiss="modal"></i></a>
                                            <div class="row px-2 py-3">
                                                <div class="col-md-12">
                                                    <h2 class="head--2 secondary--clr mb-4 text-center">Application Form
                                                    </h2>
                                                    <form id="jobApplicationForm"
                                                        class="row g-lg-4 g-2 justify-content-center"
                                                        enctype="multipart/form-data">
                                                        <input type="hidden" name="job_id" value="{{$data['page']->id}}">
                                                        <div class="col-7">
                                                            <label for="nameinput"
                                                                class="form-label mb-2 body-txt2 secondary--clr">Name</label>
                                                            <input type="text" class="form-control req-quote-input"
                                                                id="nameinput" name="name" placeholder="Full Name"
                                                                required>
                                                        </div>
                                                        <div class="col-7">
                                                            <label for="inputEmail4"
                                                                class="form-label mb-2 body-txt2 secondary--clr">Email</label>
                                                            <input type="email" class="form-control req-quote-input"
                                                                id="inputEmail4" name="email" placeholder="Email Address"
                                                                required>
                                                        </div>
                                                        <div class="col-7">
                                                            <div
                                                                class="phoneno-by-country position-relative d-flex flex-column">
                                                                <label for="phoneNumbr"
                                                                    class="form-label mb-2 body-txt2 secondary--clr w-100">Phone
                                                                    Number</label>
                                                                <input type="text" id="phoneNumbr"
                                                                    class="form-control w-100 req-quote-input"
                                                                    name="contact_no" placeholder="(555) 000-0000" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-7">
                                                            <label for="textArea"
                                                                class="form-label mb-2 body-txt2 secondary--clr">Cover
                                                                Letter</label>
                                                            <textarea class="form-control req-quote-input" id="textArea" name="description" rows="3"
                                                                placeholder="Tell us about your interest..." required></textarea>
                                                        </div>
                                                        <div class="col-7">
                                                            <label for="cv"
                                                                class="form-label mb-2 body-txt2 secondary--clr">Attach
                                                                your CV</label>
                                                            <input type="file" id="cv"
                                                                class="form-control w-100 cv-input" name="cv_file"
                                                                required>
                                                        </div>
                                                        <div class="col-7 d-flex justify-content-center">
                                                            <button type="submit"
                                                                class="btn primary-btn req-quote-sub wht--clr d-flex justify-content-center align-items-center w-100">
                                                                Submit
                                                                <img src="../assets/icons/arrow1.svg" alt=""
                                                                    class="ms-3">
                                                            </button>
                                                        </div>
                                                    </form>
                                                    <div id="formFeedback" class="col-7 mt-3 m-auto"></div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('custom-js')
    <script>
        document.getElementById('jobApplicationForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            const feedback = document.getElementById('formFeedback');
            feedback.innerHTML = '';
            for (const [key, value] of formData.entries()) {
                console.log(`${key}: ${value}`); // Logs each key-value pair
            }

            fetch('{{ route('careers.submit_application') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: formData,
                })
                .then(response => {
                    if (!response.ok) {
                        throw response;
                    }
                    return response.json();
                })
                .then(data => {
                    feedback.innerHTML = `<div class="alert alert-success">${data.success}</div>`;
                    document.getElementById('jobApplicationForm').reset(); // Reset the form
                })
                .catch(error => {
                    error.json().then(err => {
                        const errors = err.errors || ['Something went wrong. Please try again.'];
                        feedback.innerHTML =
                            `<div class="alert alert-danger">${errors.join('<br>')}</div>`;
                    });
                });
        });
    </script>
@endsection

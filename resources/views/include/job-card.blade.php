<div class="career-post-archive p-4 d-flex flex-lg-row flex-column gap-4 anime-scale">
    <div class="job-list-img">
        <img src="{{ $job->file ? asset('storage/images/' . $job->file) : asset('assets/frontend/icons/job-icon1.svg') }}"
            alt="Job Icon" class="job-icon" />
    </div>
    <div class="job-list-detail d-flex flex-column">
        <div class="d-flex align-items-center gap-2 mb-2">
            <h3 class="head--3 secondary--clr mb-0">
                {{ $job->title }}
            </h3>
            <span class="fit-content d-inline-block ps-sm-5 ps-0"><a href="#"
                    class="job-post-tag text-decoration-none primary--clr d-flex justify-content-center fw-sb">{{ $job->type }}</a></span>
        </div>
        <div class="d-flex flex-wrap mb-2 gap-2">
            <span class="d-flex body-txt2 txt--clr me-lg-3 me-2 job-post-txt"><img
                    src="{{ asset('assets/frontend/icons/meta-job-loc.svg') }}" alt="" class="me-2" />
                <p class="mb-0">{{ $job->location }}</p>
            </span>
            <span class="d-flex body-txt2 txt--clr me-lg-3 me-2 job-post-txt"><img
                    src="{{ asset('assets/frontend/icons/meta-job-salary.svg') }}" alt="" class="me-2" />
                <p class="mb-0">{{ $job->salary }}</p>
            </span>
            <span class="d-flex body-txt2 txt--clr me-lg-3 me-2 job-post-txt"><img
                    src="{{ asset('assets/frontend/icons/meta-job-type.svg') }}" alt="" class="me-2" />
                <p class="mb-0">{{ $job->job_type }}</p>
            </span>
            <span class="d-flex body-txt2 txt--clr me-lg-3 me-2 job-post-txt"><img
                    src="{{ asset('assets/frontend/icons/calender.svg') }}" alt="" class="me-2" />
                <p class="mb-0">{{ \Carbon\Carbon::parse($job->created_at)->diffForHumans() }}</p>
            </span>
            <span class="d-flex body-txt2 txt--clr me-lg-3 me-2 job-post-txt"><img
                    src="{{ asset('assets/frontend/icons/calender.svg') }}" alt="" class="me-2" />
                <p class="mb-0">{{ \App\Helpers\Helper::setDate($job->apply_before) }}</p>
            </span>
        </div>
        {{-- <p class="body-txt2 mb-3">
            Lorem ipsum dolor sit amet consectetur. Urna auctor laoreet
            at donec. Sed interdum laoreet accumsan sit netus
            craslaoreet. Nulla sed varius nibh mauris leo eu congue...
        </p> --}}
        <span class="mt-3"><a href="{{route('career.show',$job->slug)}}"
                class="text-decoration-none primary--clr secondary-btn d-flex justify-content-center"> {{ __('lang.VIEW_DETAILS') }}<img src="{{ asset('assets/frontend/icons/arrow2.svg') }}" alt=""
                    class="ms-2" /></a></span>
    </div>
</div>

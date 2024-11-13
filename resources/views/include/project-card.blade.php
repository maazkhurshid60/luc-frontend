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

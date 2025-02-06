 <!-- Projects Section Start-->
 <div class="container-fluid d-flex flex-column justify-content-center project-carousel-sec pyt-80 pyb-80 my-40px ">
     <div class="row ">
         <h2 class="head--2 wht--clr text-center pyb-40 mb-0">
             {{ __('lang.OUR_PROJECTS') }}
         </h2>
         <p class="body-txt1 wht--clr text-center pyb-60 mb-0 px-5">
             {{ __('lang.OUR_PROJECTS_DESC') }}
         </p>
         @if ($projects->isNotEmpty())
             <div class="project-slider d-flex align-items-center justify-content-center pyb-60">
                 @foreach ($projects as $project)
                     <div class="slick-slide col-4 d-flex justify-content-center">
                         <a href="{{ url('projects/' . $project->slug) }}">
                             <div class="inner project-content position-relative">
                                 <img src="{{ asset('assets/frontend/images/project-img-1.webp') }}"
                                     alt="{{ $project->name }}" class="img-fluid project-slide-img position-relative" />
                                 <div class="project-meta position-absolute p-4">
                                     <p class="body-txt2 wht--clr mb-2">{{ $project->category->title }}</p>
                                     <h3 class="head--3 wht--clr mb-4 ">{{ $project->name }}</h3>
                                     <span class="d-flex">
                                         <a href="{{ url('projects/' . $project->slug) }}"
                                             class="body-txt2 primary--clr text-decoration-none d-flex justify-content-center align-items-center">
                                             {{ __('lang.CASE_STUDY') }}
                                             <img src="{{ asset('assets/frontend/icons/arrow2.svg') }}" alt=""
                                                 class="ms-2" />
                                         </a>
                                     </span>
                                 </div>
                             </div>
                         </a>
                     </div>
                 @endforeach
             </div>
         @else
             <p class="text-center text-white">{{ __('lang.NO_PROJECTS_FOUND') }}</p>
         @endif

         <div class="d-flex justify-content-center">
             <span class=""><a href="{{ route('projects.index') }}"
                     class="text-decoration-none wht--clr primary-btn d-flex justify-content-center">{{ __('lang.DISCOVER') }}
                     <img src="{{ asset('assets/frontend/icons/arrow1.svg') }}" alt="" class="ms-2">
                 </a>
             </span>
         </div>
     </div>
 </div>
 <!-- Projects Section End-->

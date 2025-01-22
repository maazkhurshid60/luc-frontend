  <!-- Career Section Start-->
  <div class="container-fluid py-4">
      <div class="container">
        <div class="row">
            <h2 class="head--2 secondary--clr text-center pyb-40 mb-0">
                {{ __('lang.OUR_CAREERS') }}
            </h2>
            <p class="body-txt1 txt--clr text-center pyb-60 mb-0">
                {{ __('lang.CAREERS_DESCRIPTION') }}
            </p>
        </div>        
          <div class="row job-posts-listing d-flex justify-content-between gy-4 pyb-60 px-md-auto px-3">
              @foreach ($jobs as $job)
                  <div class="col-sm-12 col-md-6 mb-3">
                      @include('include.job-card')
                  </div>
              @endforeach
          </div>
          <div class="d-flex justify-content-center">
              <span class=""><a href="pages/careers.html"
                      class="text-decoration-none primary-btn d-flex justify-content-center">{{ __('lang.DISCOVER') }}
                      <img src="{{ asset('assets/frontend/icons/arrow1.svg') }}" alt="" class="ms-2">
                  </a>
              </span>
          </div>
      </div>
  </div>
  <!-- Career Section End-->

  <!-- Career Section Start-->
  <div class="container-fluid py-4">
      <div class="container">
          <div class="row">
              <h2 class="head--2 secondary--clr text-center pyb-40 mb-0">Our Careers</h2>
              <p class="body-txt1 txt--clr text-center pyb-60 mb-0">Nunc convallis semper justo quis tempor. Praesent
                  molestie, lorem
                  sed imperdiet tempor, libero urna semper urna, facilisis vulputate velit arcu vitae mi. Donec ac
                  nisi ex.
              </p>
          </div>
          {{-- <div class="row pyb-60 ">
              <div class="col-md-12">
                  <div class="careers-search-bar">
                      <form>
                          <div
                              class="form-row d-flex flex-md-row flex-column align-items-center justify-content-center ">
                              <div class="col-lg-5 col-md-6 col-12 position-relative">
                                  <label class="sr-only" for="inlineFormInput">Position</label>
                                  <input type="text" class="form-control mb-2 input--1" id="inlineFormInput"
                                      placeholder="What position are you looking for ?">
                                  <img src="{{ asset('assets/frontend/icons/magnifying-glass.svg') }}" alt=""
                                      class="position-absolute input--icons">
                              </div>
                              <div class="col-lg-3 col-md-3 col-12 pb-md-0 pb-4  position-relative">
                                  <!-- <div class="input-group mb-2 position-relative"> -->
                                  <label class="sr-only" for="inlineFormInputGroup">Location</label>
                                  <input type="text" class="form-control input--2 mb-2" id="inlineFormInputGroup"
                                      placeholder="Location">
                                  <img src="{{ asset('assets/frontend/icons/location.svg') }}" alt=""
                                      class="position-absolute input--icons">
                                  <!-- </div> -->
                              </div>
                              <div class="input-group custom-zero-width">
                                  <button type="submit"
                                      class="btn mb-2 search--btn wht--clr d-flex justify-content-center align-items-center">Search
                                      Job
                                      <img src="{{ asset('assets/frontend/icons/arrow1.svg') }}" alt=""
                                          class="ms-2"></button>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div> --}}
          <div class="row job-posts-listing d-flex justify-content-between gy-4 pyb-60 px-md-auto px-3">
              @foreach ($jobs as $job)
                  <div class="col-sm-12 col-md-6 mb-3">
                      @include('include.job-card')
                  </div>
              @endforeach
          </div>
          <div class="d-flex justify-content-center">
              <span class=""><a href="pages/careers.html"
                      class="text-decoration-none primary-btn d-flex justify-content-center">Discover All
                      <img src="{{ asset('assets/frontend/icons/arrow1.svg') }}" alt="" class="ms-2">
                  </a>
              </span>
          </div>
      </div>
  </div>
  <!-- Career Section End-->

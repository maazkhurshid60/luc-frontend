 <!-- Counter Section Start-->
 <div class="container-fluid afcon--counter-sec pyt-100 pyb-100 my-40px">
    <div class="container">
        <div class="row">
            <h2 class="head--1 wht--clr text-center mb-0 pyb-80">
                {{ __('lang.counter_title') }}
            </h2>
            <div class="row justify-content-center">
                @foreach ($counters as $counter)
                    <div class="col-md-3 col-4 text-center">
                        <p class="primary--clr counters-heading mb-0">{{ $counter->count }}+</p>
                        <p class="body-txt1 wht--clr mb-0">{{ $counter->title }}</p>
                    </div>
                @endforeach
            </div>            
        </div>
    </div>
</div>
 <!-- Counter Section End-->

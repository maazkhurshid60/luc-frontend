<div class="container-fluid d-flex flex-column justify-content-center py-40px afcon--our-services">
    <div class="container">
        <div class="row flex-column">
            <div class="services-sec d-flex flex-column justify-content-center  align-items-center  text-center">
                <h2 class="head--2 mb-0 pyb-40 secondary--clr text-center ">
                    {{ __('lang.related_blogs_title') }}
                </h2>
                <p class="body-txt1 mb-0 pyb-60 txt--clr text-center">
                    {{ __('lang.related_blogs_desc') }}
                </p>                
            </div>
            <div class="blog-sec">
                <div class="our--blog d-flex justify-content-between flex-wrap">
                    @foreach ($related as $blog)
                        @include('include.blog-card')
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

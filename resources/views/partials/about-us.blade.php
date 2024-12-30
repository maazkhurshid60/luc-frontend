<!-- About Us Section Start-->
<div class="container-fluid d-flex flex-column justify-content-center py-40px">
    <div class="container">
        <div class="row flex-md-row flex-column">
            <div class="hero-sec-img d-md-flex flex-column justify-content-center align-items-start">
                <img src="{{ asset($data->about_img ? 'storage/images/' . $data->about_img : 'assets/frontend/images/services-home.webp') }}"
                    class="img--2 w-100" alt="" />
            </div>
            <div
                class="hero-sec-text d-flex flex-column justify-content-center align-items-md-start align-items-center  text-md-start text-center">
                {!! $data->about_description !!}
                @if (request()->path() == '/')
                    <a href="{{ route('about-us.index') }}" class="text-decoration-none">
                        <button class="secondary-btn primary--clr">{{ __('lang.LEARN_MORE') }}
                            <img src="{{ asset('assets/frontend/icons/arrow2.svg') }}" alt="" class="ms-2" />
                        </button>
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- About Us Section Start-->

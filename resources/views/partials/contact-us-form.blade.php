<div class="container-fluid d-flex flex-column justify-content-center py-40px ">
    <div class="container">
        <div class="row  contact-form-sec justify-content-between gy-4 ">
            <div class="col-md-6 d-flex align-items-center px-0"><img
                    src="{{ asset('assets/frontend/images/contact-us-form-img.webp') }}" alt=""
                    class="contact-us-form-img">
            </div>
            <div class="col-md-6 ps-lg-5 ps-md-3 ps-0">
                <h2 class="head--2">{{ __('lang.contact_us') }}</h2>
                <p class="body-txt1 txt--clr">{{ __('lang.contact_us_description') }}</p>
                <form class="row g-lg-4 g-2" id="contactForm" method="POST" action="{{ route('submitForm') }}">
                    @csrf
                    <input type="hidden" id="formType" value="Contact Form">
                    <div class="col-lg-6 col-12">
                        <label for="nameinput"
                            class="form-label mb-2 body-txt2 secondary--clr">{{ __('lang.name') }}</label>
                        <input type="text" class="form-control req-quote-input" id="nameinput"
                            placeholder="{{ __('lang.placeholder_name') }}">
                    </div>
                    <div class="col-lg-6 col-12">
                        <label for="inputEmail4"
                            class="form-label mb-2 body-txt2 secondary--clr">{{ __('lang.email') }}</label>
                        <input type="email" class="form-control req-quote-input" id="inputEmail4"
                            placeholder="{{ __('lang.placeholder_email') }}">
                    </div>
                    <div class="col-12">
                        <label for="subjectsInput"
                            class="form-label mb-2 body-txt2 secondary--clr">{{ __('lang.subject') }}</label>
                        <input type="text" class="form-control req-quote-input" id="subjectsInput"
                            placeholder="{{ __('lang.placeholder_subject') }}">
                    </div>
                    <div class="col-12">
                        <div class="phoneno-by-country position-relative d-flex flex-column">
                            <label for="phoneNumbr"
                                class="form-label mb-2 body-txt2 secondary--clr w-100">{{ __('lang.phone_number') }}</label>
                            <input type="text" id="mobile_code" class="form-control w-100 req-quote-input"
                                placeholder="{{ __('lang.placeholder_phone') }}" />
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="textArea"
                            class="form-label mb-2 body-txt2 secondary--clr">{{ __('lang.message') }}</label>
                        <textarea class="form-control req-quote-input" id="textArea" rows="3"
                            placeholder="{{ __('lang.placeholder_message') }}"></textarea>
                    </div>
                    <span class="error-message text-danger"></span>
                    <div class="col-12 d-flex justify-content-center">
                        <button type="submit"
                            class="btn primary-btn req-quote-sub wht--clr d-flex justify-content-center align-items-center w-100">{{ __('lang.request_quote') }}
                            <img src="{{ asset('assets/frontend/icons/arrow1.svg') }}" alt=""
                                class="ms-3"></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

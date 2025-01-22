<!-- Quotation Section Start-->
<div class="container-fluid d-flex flex-column justify-content-center request-a-quote pyt-80 pyb-80 my-40px">
    <div class="container">
        <div class="row">
            <h2 class="head--2 wht--clr text-center pyb-40 mb-0">
                {{ __('lang.HAVE_A_PROJECT_IDEA') }}
            </h2>
            <p class="body-txt1 wht--clr text-center pyb-60 mb-0 px-5">
                {{ __('lang.PROJECT_DESCRIPTION') }}
            </p>
        </div>
        <div class="row request-quote-row">
            <div class="col-12 bg-white  request-quote-wrapper ">
                <h3 class="head--3 secondary--clr text-center mb-4">
                    {{ __('lang.REQUEST_A_QUOTE') }}
                </h3>
                <p class="body-txt2 txt--clr text-center mb-5">
                    {{ __('lang.REQUEST_DESCRIPTION') }}
                </p>
                <form class="row g-4" id="quoteForm" method="POST" action="{{ route('submitForm') }}">
                    @csrf
                    <input type="hidden" id="formType" value="Quote Form">
                    <div class="col-md-6">
                        <label for="nameinput"
                            class="form-label mb-2 body-txt2 secondary--clr">{{ __('lang.NAME') }}</label>
                        <input type="text" class="form-control req-quote-input" id="nameinput"
                            placeholder="{{ __('lang.FULL_NAME') }}">
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail4"
                            class="form-label mb-2 body-txt2 secondary--clr">{{ __('lang.EMAIL') }}</label>
                        <input type="email" class="form-control req-quote-input" id="inputEmail4"
                            placeholder="{{ __('lang.EMAIL_ADDRESS') }}">
                    </div>
                    <div class="col-12">
                        <label for="subjectsInput"
                            class="form-label mb-2 body-txt2 secondary--clr">{{ __('lang.SUBJECTS') }}</label>
                        <input type="text" class="form-control req-quote-input" id="subjectsInput"
                            placeholder="{{ __('lang.SUBJECT') }}">
                    </div>
                    <div class="col-12">
                        <label for="textArea"
                            class="form-label mb-2 body-txt2 secondary--clr">{{ __('lang.MESSAGE') }}</label>
                        <textarea class="form-control req-quote-input" id="textArea" rows="3"
                            placeholder="{{ __('lang.TELL_US_ABOUT_PROJECT') }}"></textarea>
                    </div>
                    <span class="error-message text-danger"></span>
                    <div class="col-12 d-flex justify-content-center">
                        <button type="submit" class=" primary-btn req-quote-sub wht--clr">{{ __('lang.SUBMIT') }}<img
                                src="{{ asset('assets/frontend/icons/arrow1.svg') }}" alt=""
                                class="ms-3"></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Quotation Section End-->

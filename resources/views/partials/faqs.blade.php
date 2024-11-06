 <!-- Faqs Section Start-->
 <div class="container-fluid py-40px">
     <div class="container">
         <div class="row">
             <div class="col-md-6 pb-mbl">
                 <h2 class="head--2 secondary--clr mb-0 pyb-40 text-center d-md-none d-block">Frequently Asked
                     Questions</h2>
                 <p class="body-txt1 txt--clr mb-0 pyb-60 text-center d-md-none d-block">Lorem ipsum dolor sit amet
                     consectetur. Consectetur accumsan
                     suspendisse
                     pharetra eros feugiat. Purus blandit neque amet accumsan suspendisse auctor sagittis ornare.</p>
                 <div class="faq-ques-sec p-4 ">
                     <div class="accordion accordion-flush" id="accordionFlushExample">
                         @foreach ($faqs as $faq)
                             <div class="accordion-item">
                                 <h2 class="accordion-header" id="flush-heading">
                                     <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                         data-bs-target="#flush-collapse{{ $faq->id }}" aria-expanded="false"
                                         aria-controls="flush-collapse">
                                         {{ $faq->question }}
                                     </button>
                                 </h2>
                                 <div id="flush-collapse{{ $faq->id }}" class="accordion-collapse collapse"
                                     aria-labelledby="flush-heading" data-bs-parent="#accordionFlushExample">
                                     <div class="accordion-body body-txt2 secondary--clr">{{ $faq->question }}</div>
                                 </div>
                             </div>
                         @endforeach
                     </div>
                 </div>
             </div>
             <div class="col-md-6 d-flex flex-column justify-content-center faqs-cta ">
                 <h2 class="head--2 secondary--clr mb-0 pyb-40 d-md-block d-none">Frequently Asked Questions</h2>
                 <p class="body-txt1 txt--clr mb-0 pyb-60 d-md-block d-none">Lorem ipsum dolor sit amet consectetur.
                     Consectetur accumsan
                     suspendisse
                     pharetra eros feugiat. Purus blandit neque amet accumsan suspendisse auctor sagittis ornare.</p>
                 <div
                     class="d-flex flex-sm-row flex-column gap-4 justify-content-md-start justify-content-center align-items-center">
                     <span>
                         <a href="{{ route('contact-us.index') }}"
                             class="text-decoration-none wht--clr primary-btn  d-flex justify-content-center">
                             <img src="{{ asset('assets/frontend/icons/customer-sup.svg') }}" alt=""
                                 class="me-2">
                             Help Center
                         </a>
                     </span>
                     <span>
                         <a href="{{ route('about-us.index') }}"
                             class="text-decoration-none primary--clr secondary-btn d-flex justify-content-center">
                             Learn More
                             <img src="{{ asset('assets/frontend/icons/arrow2.svg') }}" alt="" class="ms-2">
                         </a>
                     </span>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- Faqs Section End-->

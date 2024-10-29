<div class="container-fluid d-flex flex-column justify-content-center py-40px ">
    <div class="container">
        <div class="row  contact-form-sec justify-content-between gy-4 ">
            <div class="col-md-6 d-flex align-items-center px-0"><img
                    src="{{ asset('assets/frontend/images/contact-us-form-img.webp') }}" alt=""
                    class="contact-us-form-img">
            </div>
            <div class="col-md-6 ps-lg-5 ps-md-3 ps-0">
                <h2 class="head--2">Contact Us</h2>
                <p class="body-txt1 txt--clr">Got a project? Drop us a line if you want to work together on
                    something exciting. Or do you need our help? Feel free to contact us.</p>
                <form class="row g-lg-4 g-2">
                    <div class="col-lg-6 col-12">
                        <label for="nameinput" class="form-label mb-2 body-txt2 secondary--clr">Name</label>
                        <input type="text" class="form-control req-quote-input" id="nameinput"
                            placeholder="Full Name">
                    </div>
                    <div class="col-lg-6 col-12">
                        <label for="inputEmail4" class="form-label mb-2 body-txt2 secondary--clr">Email</label>
                        <input type="email" class="form-control req-quote-input" id="inputEmail4"
                            placeholder="Email Address">
                    </div>
                    <div class="col-12">
                        <label for="subjectsInput" class="form-label mb-2 body-txt2 secondary--clr">Subjects</label>
                        <input type="text" class="form-control req-quote-input" id="subjectsInput"
                            placeholder="Subject">
                    </div>
                    <div class="col-12">
                        <div class="phoneno-by-country position-relative d-flex flex-column">
                            <label for="phoneNumbr" class="form-label mb-2 body-txt2 secondary--clr w-100">Phone
                                Number</label>
                            <input type="text" id="mobile_code" class="form-control w-100 req-quote-input"
                                placeholder=" (555) 000-0000" name="name" />
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="textArea" class="form-label mb-2 body-txt2 secondary--clr">Message</label>
                        <textarea class="form-control req-quote-input" id="textArea" rows="3"
                            placeholder="Tell us about your project..."></textarea>
                    </div>
                    <div class="col-12 d-flex justify-content-center">
                        <button type="submit"
                            class="btn primary-btn req-quote-sub wht--clr d-flex justify-content-center align-items-center w-100">Request
                            A Quote
                            <img src="{{ asset('assets/frontend/icons/arrow1.svg') }}" alt=""
                                class="ms-3"></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

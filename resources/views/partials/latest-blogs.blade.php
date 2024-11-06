<!-- Blogs Section Start-->
<div class="container-fluid d-flex flex-column justify-content-center blog-carousel-sec pyt-80 pyb-80 my-40px">
    <div class="container">
        <div class="row">
            <h2 class="head--2 wht--clr text-center pyb-40 mb-0">
                Latest Blogs
            </h2>
            <p class="body-txt1 wht--clr text-center pyb-60 mb-0 px-5">
                Nunc convallis semper justo quis tempor. Praesent molestie, lorem sed imperdiet tempor, libero
                urna
                semper
                urna, facilisis vulputate velit arcu vitae mi. Donec ac nisi ex.
            </p>
            <div class="blog-slider d-flex align-items-center justify-content-center pyb-60">
                @foreach ($latest_blogs as $blog)
                    <div class="slick-slide col-12">
                        <div
                            class="inner blog-content position-relative p-4 bg-white d-flex flex-md-row flex-column gap-4 ">
                            <div class="blog-img-sec">
                                <a href="{{ url('/blog/' . $blog->slug) }}"><img
                                        src="{{ asset('storage/images/' . $blog->cover_image) }}" alt="Placeholder"
                                        class="img-fluid  position-relative blog-slider-img" /></a>
                            </div>
                            <div class="blog-detail-sec d-flex flex-column gap-lg-4  gap-3">
                                <h3 class="head--3 mb-0 blog-md-txt1">{{ $blog->title }}</h3>
                                <div class="blog-profile d-flex">
                                    <div class="me-3"><img
                                            src="{{ asset('assets/frontend/icons/blog-profile-pic.svg') }}"
                                            alt="">
                                    </div>
                                    <div>
                                        <h4 class="primary--font secondary--clr fs--20 fw-md mb-0 blog-md-txt1">
                                            {{ $blog->user }}</h4>
                                        <p class="txt--clr body-txt2 mb-0 blog-md-txt">5 min read</p>
                                    </div>
                                </div>
                                <div class="body-txt1 txt--clr mb-0 blog-md-txt1">Aenean interdum arcu sit amet nulla
                                    {{ $blog->short_description }}
                                    <a href="{{ url('/blog/' . $blog->slug) }}" class="blog-excerpt-readmore">Read
                                        More</a>
                                </div>
                                <div class="blog-meta d-flex justify-content-md-start justify-content-evenly">
                                    <span class="d-flex body-txt2 txt--clr me-lg-3 me-md-1 blog-md-txt"><img
                                            src="{{ asset('assets/frontend/icons/calender.svg') }}" alt=""
                                            class="me-lg-2 me-1 blog-meta-icons">
                                        <p class="body-txt2 txt--clr mb-0">
                                            {{ \Carbon\Carbon::parse($blog->date)->format('d-M-Y') }}</p>
                                    </span>
                                    {{-- <span class="d-flex body-txt2 txt--clr me-lg-3 me-md-1 blog-md-txt"><img
                                            src="{{ asset('assets/frontend/icons/thumbs-up-like.svg') }}" alt=""
                                            class="me-lg-2 me-1 blog-meta-icons">
                                        <p class="body-txt2 txt--clr mb-0">2,729 Like</p>
                                    </span> --}}
                                    {{-- <span class="d-flex body-txt2 txt--clr me-lg-3 me-md-1 blog-md-txt"><img
                                            src="{{ asset('assets/frontend/icons/comment-icons.svg') }}" alt=""
                                            class="me-lg-2 me-1 blog-meta-icons">
                                        <p class="body-txt2 txt--clr mb-0">273 Comments</p>
                                    </span> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="prev-next-btns d-flex justify-content-center gap-4">
                <button class="slick-prev"><img src="{{ asset('assets/frontend/icons/prev-arrow.svg') }}"
                        alt=""></button>
                <button class="slick-next"><img src="{{ asset('assets/frontend/icons/next-arrow.svg') }}"
                        alt=""></button>
            </div>
        </div>
    </div>
</div>
<!-- Blogs Section End-->

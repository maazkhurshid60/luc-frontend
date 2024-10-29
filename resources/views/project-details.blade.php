@extends('layouts.main-layout')


@section('title', 'PMR — Online Platform & Responsive Website Design')

@section('custom-styles')
@endsection
@section('content')
    <div class="main">

        @include('partials.breadcrumbs', [
            'bg_image' => asset('assets/frontend/images/project-details-bg.webp'),
            'home' => ['name' => 'Home', 'route' => 'index'],
            'parent' => ['name' => 'Projects', 'route' => 'projects.index'],
            'page_title' => 'PMR — Online Platform & Responsive Website Design',
        ])

        <div class="container-fluid py-40px">
            <div class="container">
                <div class="row">
                    <div
                        class="project-details-section d-flex flex-md-row flex-column justify-content-between gap-md-0 gap-4">
                        <div class="project--detail-content">
                            <img src="{{ asset('assets/frontend/images/project-detail-img.webp') }}" alt=""
                                class="mb-4 anime-img">
                            <h3 class="head--3 secondary--clr mb-4">Client XYZ Tech Solutions </h3>
                            <p class="body-txt1 txt--clr mb-4">Lorem ipsum dolor sit amet consectetur. Volutpat nunc morbi
                                ut eu non
                                neque elit. Sit gravida interdum pulvinar nunc cursus id. Vehicula curabitur mauris ut ut
                                vel metus
                                nunc. Lacus lorem ac purus semper magna elementum ut et ante. Magna at ac id rhoncus sit
                                bibendum
                                dictum. Ac consequat dolor sit vel. Pellentesque quis arcu eu sed mattis vitae ultrices
                                lacinia.
                                Sollicitudin lectus in semper quis. Facilisis ut nulla duis vel aenean mattis nisl in. A
                                fames quisque
                                auctor habitant venenatis. Quam porta nisl at diam eget aenean. Quam et nulla et ornare eu.
                                Ipsum orci dignissim ipsum sed pellentesque nec. Semper habitant interdum egestas at fames
                                volutpat nunc
                                vitae. Pharetra ac massa accumsan at pellentesque adipiscing. Mattis magna sed maecenas
                                tellus sit.
                                Habitasse ultricies egestas ut ultrices molestie adipiscing commodo egestas. Id phasellus
                                proin commodo
                                luctus felis in donec vel vestibulum. Luctus sit dignissim vitae nam lorem elementum.
                                Viverra lorem in
                                neque et fringilla. Ut quis eu egestas nisl magna cras. In egestas scelerisque volutpat
                                faucibus a. Urna
                                elit habitant pellentesque suspendisse in condimentum aenean rhoncus eget. Vel consectetur
                                mi dui quis
                                velit urna in tortor auctor. Quis sed vestibulum habitasse magna. Tincidunt maecenas diam
                                dignissim
                                blandit eu integer tellus.
                                Scelerisque suspendisse risus at convallis id viverra consequat mattis. Mauris massa egestas
                                amet
                                lacinia. Egestas purus est est amet ac ultrices. Volutpat laoreet eleifend scelerisque sed
                                commodo
                                consequat leo metus placerat. Id senectus facilisi nullam cras amet convallis augue
                                adipiscing at. Sed
                                ipsum ac at et. Tellus mauris sodales at vivamus sed neque.
                                Magna pharetra egestas sed malesuada eget odio quis convallis volutpat. Blandit enim
                                vestibulum
                                curabitur cras feugiat neque lacus etiam. Nulla tincidunt tortor interdum egestas. Ut sit mi
                                eu at. Sit
                                nulla pharetra urna vulputate. Tortor egestas aliquet cras odio. Id tempor mi ultrices
                                donec. <br>
                                Vitae nulla morbi nunc ut sed aliquet. Dui rhoncus est fames turpis eu magnis. Felis tellus
                                eget neque
                                ac risus urna duis interdum. Duis morbi erat dignissim fringilla tellus velit. Purus feugiat
                                pellentesque id elementum sem leo nisi lectus maecenas. Tempus porta dolor nibh ultrices
                                odio facilisi
                                nisi fermentum. Nulla feugiat mauris sed mauris quisque augue ullamcorper lectus. Egestas
                                sed ultricies
                                consectetur elit sem risus. Eu laoreet sem nisi in ullamcorper. Ut nisl a mollis amet.
                                Mauris et id
                                tortor ipsum sed morbi leo turpis bibendum. Interdum lacinia sed id arcu nulla augue
                                pharetra mi. Quis
                                blandit sapien sed venenatis malesuada elit id enim dignissim.</p>
                        </div>
                        <div class="project--detail-sidebar d-flex flex-column gap-4">
                            <div class="project-meta-details">
                                <h3 class="head--3 secondary--clr mb-0 pyb-40">Project Name</h3>
                                <div class="d-flex">
                                    <div class="col--1">
                                        <div class="pb-3">
                                            <h4 class="head--4 secondary--clr">Client:</h4>
                                            <p class="body-txt2 txt--clr">Client ABC Manufacturing</p>
                                        </div>
                                        <div class="pb-3">
                                            <h4 class="head--4 secondary--clr">Location:</h4>
                                            <p class="body-txt2 txt--clr">New York, USA</p>
                                        </div>
                                        <div class="pb-3">
                                            <h4 class="head--4 secondary--clr">Website:</h4>
                                            <p class="body-txt2 txt--clr"><a
                                                    href=">https://which-supervisor.net">https://which-supervisor.net</a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col--2">
                                        <div class="pb-3">
                                            <h4 class="head--4 secondary--clr">Date:</h4>
                                            <p class="body-txt2 txt--clr">Dec 01, 2024</p>
                                        </div>
                                        <div class="pb-3">
                                            <h4 class="head--4 secondary--clr">Consultant:</h4>
                                            <p class="body-txt2 txt--clr">Potential Company</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="project-sidebar-cta d-flex flex-column justify-content-center align-items-center gap-4 ">
                                <h3 class="head--3 wht--clr text-center mb-0">Request a Customized Solution for Your
                                    Business!</h3>
                                <p class="body-txt1 wht--clr text-center mb-0">Every business is unique. Request a tailored
                                    solution
                                    crafted specifically for your organization's challenges and goals.</p>
                                <span class=""><a href="#"
                                        class="text-decoration-none wht--clr primary-btn d-flex  justify-content-center">Contact
                                        Us</a></span>
                            </div>
                            <div class="side-bor--form">
                                <form class="row g-4">
                                    <div class="col-12">
                                        <label for="nameinput" class="form-label mb-2 body-txt2 secondary--clr">Name</label>
                                        <input type="text" class="form-control req-quote-input" id="nameinput"
                                            placeholder="Full Name">
                                    </div>
                                    <div class="col-12">
                                        <label for="inputEmail4"
                                            class="form-label mb-2 body-txt2 secondary--clr">Email</label>
                                        <input type="email" class="form-control req-quote-input" id="inputEmail4"
                                            placeholder="Email Address">
                                    </div>
                                    <div class="col-12">
                                        <label for="subjectsInput"
                                            class="form-label mb-2 body-txt2 secondary--clr">Services</label>
                                        <select class="form-select req-quote-input body-txt2 grey--clr "
                                            aria-label="Default select example">
                                            <option class="body-txt2 grey--clr" selected>Select Services</option>
                                            <option class="body-txt2 grey--clr" value="1">One</option>
                                            <option class="body-txt2 grey--clr" value="2">Two</option>
                                            <option class="body-txt2 grey--clr" value="3">Three</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="textArea"
                                            class="form-label mb-2 body-txt2 secondary--clr">Message</label>
                                        <textarea class="form-control req-quote-input" id="textArea" rows="3"
                                            placeholder="Tell us about your project..."></textarea>
                                    </div>
                                    <div class="col-12 d-flex justify-content-center">
                                        <button type="submit"
                                            class="btn primary-btn project-det-register wht--clr">Register<img
                                                src="{{ asset('assets/frontend/icons/arrow1.svg') }}" alt=""
                                                class="ms-3"></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid d-flex flex-column justify-content-center py-40px">
            <div class="container">
                <div class="row flex-md-row-reverse flex-column">
                    <div class="hero-sec-img-right d-md-flex flex-column justify-content-center align-items-end ">
                        <img src="{{ asset('assets/frontend/images/after-project-dtl-img1.webp') }}"
                            class="img--2 w-100 anime-img" alt="" />
                    </div>
                    <div class="hero-sec-text d-flex flex-column justify-content-center align-items-start  ">
                        <h2 class="head--3 secondary--clr line-ht3 mb-0 ">
                            What We Did?
                        </h2>
                        <p class="body-txt1 txt--clr mb-0">
                            Lorem ipsum dolor sit amet consectetur. Leo quisque justo turpis quam volutpat tellus risus
                            condimentum.
                            Aliquet morbi a in ultricies vitae sagittis. Neque adipiscing facilisi nullam nisl lacus enim in
                            consectetur. Quisque natoque quis amet mauris in cras sed ornare volutpat. Massa dictumst nibh
                            at varius
                            sit. Mi urna eget sodales orci tellus rhoncus. Diam in viverra integer id lacinia sit massa. Eu
                            congue ut
                            suspendisse nunc ut arcu nisi vestibulum adipiscing. Accumsan purus risus vel sit enim
                            pellentesque felis
                            habitant adipiscing. Eget sapien aenean placerat fermentum leo. Suscipit viverra erat et
                            malesuada eget
                            quam. Eget tortor fringilla sed nunc. Erat mi mattis id integer massa dignissim tincidunt nisi
                            mollis.
                            Pharetra lectus phasellus enim tincidunt sed vitae imperdiet nibh nec. Nunc gravida iaculis sed
                            ut lectus
                            luctus.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid d-flex flex-column justify-content-center py-40px">
            <div class="container">
                <div class="row flex-md-row flex-column">
                    <div class="hero-sec-img d-md-flex flex-column justify-content-center align-items-center ">
                        <img src="{{ asset('assets/frontend/images/after-project-dtl-img2.webp') }} "
                            class="img--2 w-100 anime-img" alt="" />
                    </div>
                    <div class="hero-sec-text d-flex flex-column justify-content-center align-items-start  ">
                        <h2 class="head--3 secondary--clr line-ht3 mb-0">
                            The Outcome
                        </h2>
                        <p class="body-txt1 txt--clr mb-0 ">
                            Lorem ipsum dolor sit amet consectetur. Leo quisque justo turpis quam volutpat tellus risus
                            condimentum.
                            Aliquet morbi a in ultricies vitae sagittis. Neque adipiscing facilisi nullam nisl lacus enim in
                            consectetur. Quisque natoque quis amet mauris in cras sed ornare volutpat. Massa dictumst nibh
                            at varius
                            sit. Mi urna eget sodales orci tellus rhoncus. Diam in viverra integer id lacinia sit massa. Eu
                            congue ut
                            suspendisse nunc ut arcu nisi vestibulum adipiscing. Accumsan purus risus vel sit enim
                            pellentesque felis
                            habitant adipiscing. Eget sapien aenean placerat fermentum leo. Suscipit viverra erat et
                            malesuada eget
                            quam. Eget tortor fringilla sed nunc. Erat mi mattis id integer massa dignissim tincidunt nisi
                            mollis.
                            Pharetra lectus phasellus enim tincidunt sed vitae imperdiet nibh nec. Nunc gravida iaculis sed
                            ut lectus
                            luctus.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid d-flex flex-column justify-content-center py-40px">
            <div class="container gap-4">
                <div class="row flex-md-row flex-column mb-4">
                    <img src="{{ asset('assets/frontend/images/projectdtl-gal1.webp') }}"
                        class="projectdtl-gal-img anime-img" alt="">
                </div>
                <div class="row gap-md-0 gap-4">
                    <div class="col-md-6">
                        <img src="{{ asset('assets/frontend/images/projectdtl-gal2.webp') }}"
                            class="projectdtl-gal-img anime-img" alt="">
                    </div>
                    <div class="col-md-6">
                        <img src="{{ asset('assets/frontend/images/projectdtl-gal3.webp') }}"
                            class="projectdtl-gal-img anime-img" alt="">
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('custom-js')
@endsection

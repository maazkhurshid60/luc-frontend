@extends('layouts.main-layout')


@section('title', $page->page_title)

@section('custom-styles')
@endsection

@section('content')
    <div class="main">

        @include('partials.breadcrumbs', [
            'bg_image' => asset('assets/frontend/images/blog-details-bg.webp'),
            'home' => ['name' => 'Home', 'route' => 'index'],
            'parent' => ['name' => 'Blogs', 'route' => 'blogs.index'],
            'page_title' => $page->title,
        ])

        <div class="container-fluid py-40px">
            <div class="container">
                <div class="row flex-md-row flex-column-reverse gap-md-0 gap-4 pyb-80">
                    <div class="col-md-6 d-flex align-items-center">
                        <div class="rblog-card-content d-flex flex-column ">
                            <div class="cat-tag-wrap mb-lg-3 mb-2 align-self-md-start align-self-center">
                                <span class="d-flex align-items-center body-txt2 primary--clr mb-0">
                                    <p class="body-txt2 primary--clr mb-0 blog-detail-cat-tag me-2">Technology</p>8 min
                                    read
                                </span>
                            </div>
                            <div class="position-relative text-md-start text-center">
                                <h2 class="head--2 secondary--clr mb-lg-3 mb-2">{{ $page->title }}
                                </h2>
                                <p class="body-txt1 txt--clr mb-lg-4 mb-2">Collaboration can make our teams stronger,
                                    and our individual designs better.</p>
                            </div>
                            <div class="blog-profile-img d-flex justify-content-md-start justify-content-center">
                                <div class="auth-profile-img me-lg-3 me-2">
                                    <img src="{{ asset('assets/icons/blog-auth-img.svg') }}" alt="">
                                </div>
                                <div class="blog-card-meta ">
                                    <h3 class="head--4 secondary--clr mb-0">{{ $page->user }}</h3>
                                    <div class="body-txt2 txt--clr mb-0">
                                        {{ \Carbon\Carbon::parse($page->date)->format('d-M-Y') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end align-items-center">
                        <img src="{{ asset('storage/images/' . $page->cover_image) }}" class="blog-dtl-fet-img anime-scale"
                            alt="">
                    </div>
                </div>
                <div class="row ">
                    <div
                        class="blog-details-section d-flex flex-md-row flex-column-reverse justify-content-between gap-md-0 gap-4">
                        <div class="blog--detail-content text-md-start text-center">
                            <p class="body-txt1 txt--clr mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Donec ullamcorper mattis lorem non. Ultrices praesent amet ipsum justo massa. Eu dolor
                                aliquet risus gravida nunc at feugiat consequat purus. Non massa enim vitae duis mattis.
                                Vel in ultricies vel fringilla.</p>
                            <hr class="grey--clr">
                            <h3 id="introduction" class="head--3 secondary--clr">Introduction</h3>
                            <p class="body-txt1 txt--clr mb-4">Mi tincidunt elit, id quisque ligula ac diam, amet. Vel
                                etiam suspendisse morbi eleifend faucibus eget vestibulum felis. Dictum quis montes, sit
                                sit. Tellus aliquam enim urna, etiam. Mauris posuere vulputate arcu amet, vitae nisi,
                                tellus tincidunt. At feugiat sapien varius id.</p>
                            <p class="body-txt1 txt--clr mb-4">Eget quis mi enim, leo lacinia pharetra, semper. Eget in
                                volutpat mollis at volutpat lectus velit, sed auctor. Porttitor fames arcu quis fusce
                                augue enim. Quis at habitant diam at. Suscipit tristique risus, at donec. In turpis vel
                                et quam imperdiet. Ipsum molestie aliquet sodales id est ac volutpat. </p>
                            <img src="{{ asset('assets/frontend/images/blog-detailcontent-img.webp') }}" alt=""
                                class="mb-4 anime-scale">
                            <div class="blog-detail-quote ps-4">
                                <h3 class="head--3">“In a world older and more complete than ours they move finished and
                                    complete, gifted with extensions of the senses we have lost or never attained,
                                    living by voices we shall never hear.”</h3>
                                <p class="body-txt1 secondary--clr mb-4">— Olivia Rhye, Product Designer</p>
                            </div>
                            <p class="body-txt1 txt--clr mb-4">Dolor enim eu tortor urna sed duis nulla. Aliquam
                                vestibulum, nulla odio nisl vitae. In aliquet pellentesque aenean hac vestibulum turpis
                                mi bibendum diam. Tempor integer aliquam in vitae malesuada fringilla.</p>
                            <p class="body-txt1 txt--clr mb-4">Elit nisi in eleifend sed nisi. Pulvinar at orci, proin
                                imperdiet commodo consectetur convallis risus. Sed condimentum enim dignissim adipiscing
                                faucibus consequat, urna. Viverra purus et erat auctor aliquam. Risus, volutpat
                                vulputate posuere purus sit congue convallis aliquet. Arcu id augue ut feugiat donec
                                porttitor neque. Mauris, neque ultricies eu vestibulum, bibendum quam lorem id. Dolor
                                lacus, eget nunc lectus in tellus, pharetra, porttitor.</p>
                            <p class="body-txt1 txt--clr mb-4">Ipsum sit mattis nulla quam nulla. Gravida id gravida ac
                                enim mauris id. Non pellentesque congue eget consectetur turpis. Sapien, dictum molestie
                                sem tempor. Diam elit, orci, tincidunt aenean tempus. Quis velit eget ut tortor tellus.
                                Sed vel, congue felis elit erat nam nibh orci.</p>
                            <h3 id="software" class="head--3">Lorem ipsum dolor sit amet</h3>
                            <p class="body-txt1 txt--clr mb-4">Pharetra morbi libero id aliquam elit massa integer
                                tellus. Quis felis aliquam ullamcorper porttitor. Pulvinar ullamcorper sit dictumst ut
                                eget a, elementum eu. Maecenas est morbi mattis id in ac pellentesque ac.</p>
                            <h3 id="resources" class="head--3">Lorem ipsum dolor sit amet</h3>
                            <p class="body-txt1 txt--clr mb-4">Sagittis et eu at elementum, quis in. Proin praesent
                                volutpat egestas sociis sit lorem nunc nunc sit. Eget diam curabitur mi ac. Auctor
                                rutrum lacus malesuada massa ornare et. Vulputate consectetur ac ultrices at diam dui
                                eget fringilla tincidunt. Arcu sit dignissim massa erat cursus vulputate gravida id. Sed
                                quis auctor vulputate hac elementum gravida cursus dis.</p>
                            <p class="body-txt1 txt--clr mb-0 ps-3">1. Lectus id duis vitae porttitor enim gravida
                                morbi.</p>
                            <p class="body-txt1 txt--clr mb-0 ps-3">2. Eu turpis posuere semper feugiat volutpat elit,
                                ultrices suspendisse. Auctor vel in vitae placerat.</p>
                            <p class="body-txt1 txt--clr mb-0 ps-3 mb-4">3. Suspendisse maecenas ac donec scelerisque
                                diam sed est duis purus.</p>
                            <img src="{{ asset('assets/frontend/images/blog-detailcontent-img2.webp') }}" alt=""
                                class="mb-4 anime-scale">
                            <p class="body-txt1 txt--clr mb-4">Lectus leo massa amet posuere. Malesuada mattis non
                                convallis quisque. Libero sit et imperdiet bibendum quisque dictum vestibulum in non.
                                Pretium ultricies tempor non est diam. Enim ut enim amet amet integer cursus. Sit ac
                                commodo pretium sed etiam turpis suspendisse at.</p>
                            <p class="body-txt1 txt--clr mb-4">Tristique odio senectus nam posuere ornare leo metus,
                                ultricies. Blandit duis ultricies vulputate morbi feugiat cras placerat elit. Aliquam
                                tellus lorem sed ac. Montes, sed mattis pellentesque suscipit accumsan. Cursus viverra
                                aenean magna risus elementum faucibus molestie pellentesque. Arcu ultricies sed mauris
                                vestibulum.</p>
                            <h3 id="conclusion" class="head--3">Conclusion</h3>
                            <p class="body-txt1 txt--clr mb-4">Morbi sed imperdiet in ipsum, adipiscing elit dui lectus.
                                Tellus id scelerisque est ultricies ultricies. Duis est sit sed leo nisl, blandit elit
                                sagittis. Quisque tristique consequat quam sed. Nisl at scelerisque amet nulla purus
                                habitasse.</p>
                            <p class="body-txt1 txt--clr mb-4">Nunc sed faucibus bibendum feugiat sed interdum. Ipsum
                                egestas condimentum mi massa. In tincidunt pharetra consectetur sed duis facilisis
                                metus. Etiam egestas in nec sed et. Quis lobortis at sit dictum eget nibh tortor commodo
                                cursus.</p>
                            <p class="body-txt1 txt--clr mb-4">Odio felis sagittis, morbi feugiat tortor vitae feugiat
                                fusce aliquet. Nam elementum urna nisi aliquet erat dolor enim. Ornare id morbi eget
                                ipsum. Aliquam senectus neque ut id eget consectetur dictum. Donec posuere pharetra odio
                                consequat scelerisque et, nunc tortor.</p>
                            <p class="body-txt1 txt--clr mb-4">Nulla adipiscing erat a erat. Condimentum lorem posuere
                                gravida enim posuere cursus diam.</p>
                        </div>
                        <div class="blog--detail-sidebar d-flex flex-column gap-4">
                            <div class="blog-content-table text-md-start text-center">
                                <hr class="grey--clr mb-4">
                                <h3 class="head--3 primary--clr">Table of contents</h3>
                                <a href="#introduction" class="text-decoration-none">
                                    <p class="body-txt1 txt--clr">Introduction</p>
                                </a>
                                <a href="#software" class="text-decoration-none">
                                    <p class="body-txt1 txt--clr">Software and tools</p>
                                </a>
                                <a href="#resources" class="text-decoration-none">
                                    <p class="body-txt1 txt--clr">Other resources</p>
                                </a>
                                <a href="#conclusion" class="text-decoration-none">
                                    <p class="body-txt1 txt--clr">Conclusion</p>
                                </a>
                                <hr class="grey--clr m-0">
                                <div
                                    class="blog-socail-icons d-flex justify-content-md-start justify-content-center align-items-center gap-lg-4 gap-2 mt-4">
                                    <a href="#" class="text-decoration-none">
                                        <span class="body-txt1 primary--clr d-flex align-items-center">
                                            <img src="{{ asset('assets/frontend/icons/copy.svg') }}" alt="">
                                            Copy Link
                                        </span>
                                    </a>
                                    <a href="#">
                                        <span>
                                            <img src="{{ asset('assets/frontend/icons/twitter--x.svg') }}" alt="">
                                        </span>
                                    </a>
                                    <a href="#">
                                        <span>
                                            <img src="{{ asset('assets/frontend/icons/fb.svg') }}" alt="">
                                        </span>
                                    </a>
                                    <a href="#">
                                        <span>
                                            <img src="{{ asset('assets/frontend/icons/linkedin.svg') }}" alt="">
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="grey--clr m-0">
            </div>
        </div>

        @include('partials.related-blogs', ['data' => $related])

    </div>
@endsection
@section('custom-js')
@endsection

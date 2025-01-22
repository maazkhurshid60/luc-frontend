<div class="our-blog-card mb-4 anime-scale">
    <div class="blog-img-wrap">
        <a href="{{ url('/blog/' . $blog->slug) }}">
            <img src="{{ asset('storage/images/' . $blog->cover_image) }}" alt="" class="blog-card-img" />
        </a>
    </div>
    <div class="blog-card-content position-relative">
        <a href="{{ url('/blog/' . $blog->slug) }}">
            <img src="{{ asset('assets/frontend/icons/forward-arrow.svg') }}" alt=""
                class="forward-arrow position-absolute" />
            <div class="cat-tag-wrap mb-lg-3 mb-2">
                <p class="body-txt2 primary--clr mb-0">{{ $blog->category->title }}</p>
            </div>
            <div class="">
                <h3 class="head--3 secondary--clr mb-lg-3 mb-2">
                    {{ $blog->title }}
                </h3>
                <p class="body-txt2 txt--clr mb-lg-4 mb-2">
                    {{ $blog->short_description }}
                </p>
            </div>
            <div class="blog-profile-img d-flex">
                <div class="auth-profile-img me-lg-3 me-2">
                    <img src="{{ asset('assets/frontend/icons/blog-auth-img.svg') }}" alt="" />
                </div>
                <div class="blog-card-meta">
                    <h3 class="head--4 secondary--clr mb-0">
                        {{ $blog->user }}
                    </h3>
                    <div class="body-txt2 txt--clr mb-0">
                        {{ \Carbon\Carbon::parse($blog->date)->format('d-M-Y') }}
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>

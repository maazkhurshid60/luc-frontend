<div class="line"></div>
<div class="bread-crumbs-container1 wrapper">
    <br>
    <h3>Related Articles</h3>
</div>
<br>
<section class="blog-container wrapper">
    @foreach ($related as $blog)
        <div class="container">
            <a href="{{ url('/blog' . '/' . $blog->slug) }}">
                <div class="blog-image">
                    <img src="{{ asset('storage/images/' . $blog->cover_image) }}" alt="Related blog image">
                </div>
                <div class="tech-blog">
                    <p class="date">{{ \Carbon\Carbon::parse($blog->date)->format('d-M-Y') }}</p>
                    <h1 class="heading">{{ $blog->title }}</h1>
                    <p>{{ $blog->short_description }} <a href="{{ url('/blog/' . $blog->slug) }}" class="read-more">Read
                            more</a></p>
                </div>
            </a>
        </div>
    @endforeach
</section>

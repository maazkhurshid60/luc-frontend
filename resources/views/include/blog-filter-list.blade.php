<div class="our--blog d-flex justify-content-between flex-wrap">
    @forelse ($blogs as $blog)
        @include('include.blog-card')
    @empty
        <h3>No Blogs found in this Category</h3>
    @endforelse
</div>

@include('include.pagination', ['paginator' => $blogs])

<div class="our--blog d-flex justify-content-between flex-wrap">
    @forelse ($blogs as $blog)
        @include('include.blog-card')
    @empty
        <h3>{{ __('lang.not_found_in_category') }}</h3>
    @endforelse
</div>
@if (!is_null($blogs) && !empty($blogs['items']))
    @include('include.pagination', ['paginator' => $blogs])
@endif

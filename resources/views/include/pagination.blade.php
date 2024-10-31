@if ($blogs->lastPage() > 1)
    <div class="pagination-wrapper mt-4">
        <div class="page-navigation">
            <nav aria-label="Page navigation">
                <ul class="pagination shop-pagination w-100 d-flex justify-content-between align-items-center">
                    <div class="back-link">
                        {{-- @if ($blogs->previousPageUrl()) --}}
                        <li class="page-item">
                            <a class="page-link back-button secondary-btn d-flex justify-content-center align-items-center pg-res-btn {{ !$blogs->previousPageUrl() ? 'disabled' : '' }}"
                                onclick="location.href='{{ $blogs->previousPageUrl() }}{{ $selected_category ? '&category_id=' . $selected_category : '' }}'"
                                aria-label="Back">
                                <img src="{{ asset('assets/frontend/icons/arrow2.svg') }}" alt=""
                                    class="rotate-z me-2" />
                                <p class="body-txt1 d-md-block d-none mb-0">
                                    Previous
                                </p>
                            </a>
                        </li>
                        {{-- @endif --}}
                    </div>
                    <div class="page-no d-flex">
                        @for ($i = 1; $i <= $blogs->lastPage(); $i++)
                            <li class="page-item">
                                <a class="page-link pg-items body-txt1 secondary--clr pg-item{{ $i == $blogs->currentPage() ? '-active' : 's' }}"
                                    href="{{ $blogs->url($i) }}{{ $selected_category ? '&category_id=' . $selected_category : '' }}">{{ $i }}</a>
                            </li>
                        @endfor

                    </div>
                    <div class="next-link">
                        {{-- @if ($blogs->nextPageUrl()) --}}
                        <li class="page-item">
                            <a class="page-link next-button secondary-btn d-flex justify-content-center align-items-center pg-res-btn {{ !$blogs->nextPageUrl() ? 'disabled' : '' }}"
                                onclick="location.href='{{ $blogs->nextPageUrl() }}{{ $selected_category ? '&category_id=' . $selected_category : '' }}'"
                                aria-label="Next">
                                <p class="body-txt1 d-md-block d-none mb-0">
                                    Next
                                </p>
                                <img src="{{ asset('assets/frontend/icons/arrow2.svg') }}" alt=""
                                    class="ms-2" />
                            </a>
                        </li>
                        {{-- @endif --}}
                    </div>
                </ul>
            </nav>
        </div>
    </div>
@endif

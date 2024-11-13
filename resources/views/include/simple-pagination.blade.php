{{-- @if ($paginator->lastPage() > 1) --}}
<div class="pagination-wrapper mt-4">
    <div class="page-navigation">
        <nav aria-label="Page navigation">
            <ul class="pagination shop-pagination w-100 d-flex justify-content-between align-items-center">
                <div class="back-link">
                    {{-- @if ($paginator->previousPageUrl()) --}}
                    <li class="page-item">
                        <a class="page-link back-button secondary-btn d-flex justify-content-center align-items-center pg-res-btn {{ !$paginator->previousPageUrl() ? 'disabled' : '' }}"
                            href="#" data-page="{{ $paginator->currentPage() - 1 }}" aria-label="Back">
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
                    @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                        <li class="page-item">
                            <a class="page-link pg-items body-txt1 secondary--clr pg-item{{ $i == $paginator->currentPage() ? '-active' : 's' }}"
                                href="#" data-page="{{ $i }}"
                                data-category="{{ isset($selected_category) }}">
                                {{ $i }}
                            </a>
                        </li>
                    @endfor

                </div>
                <div class="next-link">
                    {{-- @if ($paginator->nextPageUrl()) --}}
                    <li class="page-item">
                        <a class="page-link next-button secondary-btn d-flex justify-content-center align-items-center pg-res-btn {{ !$paginator->nextPageUrl() ? 'disabled' : '' }}"
                            href="#" data-page="{{ $paginator->currentPage() + 1 }}" aria-label="Next">
                            <p class="body-txt1 d-md-block d-none mb-0">
                                Next
                            </p>
                            <img src="{{ asset('assets/frontend/icons/arrow2.svg') }}" alt="" class="ms-2" />
                        </a>
                    </li>
                    {{-- @endif --}}
                </div>
            </ul>
        </nav>
    </div>
</div>
{{-- @endif --}}

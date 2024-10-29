<div class="container-fluid afcon--hero-section d-flex flex-column justify-content-center myb-40"
    style="background: url({{ $bg_image }});">
    <div class="container">
        <div class="row">
            <h1 class="head--1 wht--clr text-center">{{ $page_title }}</h1>
            <span class="body-txt1 bread-crumb text-center">
                @if (!empty($home))
                    <a href="{{ route($home['route']) }}" class="body-txt1 wht--clr text-decoration-none">
                        {{ $home['name'] }}
                    </a>
                    /
                @endif
                @if (!empty($parent))
                    <a href="{{ route($parent['route']) }}" class="body-txt1 wht--clr text-decoration-none">
                        {{ ucwords($parent['name']) }}
                    </a>
                    /
                @endif
                {{ $page_title }}
            </span>
        </div>
    </div>
</div>

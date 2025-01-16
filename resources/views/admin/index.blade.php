@extends('admin.layout.main-layout')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/"><i class="fa fa-dashboard"></i> {{ __('lang.Home') }}</a>
            </li>
            <li class="breadcrumb-item active">{{ __('lang.Dashboard') }}</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">

            <div class="col-xl-4 col-md-6 col-12">
                <div class="info-box" style="background-color:#fff;">
                    <span class="info-box-icon"><i class="fa fa-list"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">{{ __('lang.TOTAL_PROJECTS') }}</span>
                        <span class="info-box-number">{{ $counter['projects'] }}</span>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6 col-12">
                <div class="info-box" style="background-color:#fff;">
                    <span class="info-box-icon"><i class="fa fa-cogs"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">{{ __('lang.RECENT_SERVICES') }}</span>
                        <span class="info-box-number">{{ $counter['services'] }}</span>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6 col-12">
                <div class="info-box" style="background-color:#fff;">
                    <span class="info-box-icon"><i class="fa fa-flag"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">{{ __('lang.TOTAL_BLOGS') }}</span>
                        <span class="info-box-number">{{ $counter['blogs'] }}</span>
                    </div>
                </div>
            </div>

        </div>
        <br><br><br><br>
        <h1 class="text-center">{{ __('lang.WELCOME_MESSAGE') }} <strong class="text-primary">{{ __('lang.ADMIN_PANEL') }}</strong></h1>
    </section>
</div>
@endsection

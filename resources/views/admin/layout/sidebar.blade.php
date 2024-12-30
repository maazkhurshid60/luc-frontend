{{-- @section('sidebar') --}}
<aside class="main-sidebar">
    <!-- sidebar -->
    <section class="sidebar">

        <div class="user-panel">
            <div class="image float-left">
                @if (auth()->user()->image)
                    <img src="{{ asset('storage/images/' . $user_image) }}" class="rounded" alt="User Image">
                @else
                    <img src="{{ asset('assets/backend/images/' . $user_image) }}"class="rounded" alt="User Image">
                @endif
            </div>
            <div class="info float-left" style="left:67px">
                <p>{{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> {{ __('Online') }}</a>
            </div>
            <!-- search form -->

            <!-- /.search form -->
        </div>

        <!-- sidebar menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">{{ __('lang.main_navigation') }}</li>
            <li class="@if ($menu == 'dashboard') active selected @endif">
                <a href="{{ route('dashboard') }}">
                    <i class="fa fa-dashboard"></i> <span>{{ __('lang.dashboard') }}</span>
                </a>
            </li>
            @can('menu.view')
                <li class="@if ($menu == 'menu') active selected @endif">
                    <a href="{{ route('menu.index') }}">
                        <i class="fa fa-list"></i> <span>{{ __('lang.menu') }}</span>
                    </a>
                </li>
            @endcan
            @canany(['blog.view', 'blog-category.view'])
                <li class="treeview @if ($menu == 'blog' || $menu == 'blog-category') active menu-open @endif">
                    <a href="javascript:void(0)">
                        <i class="fa fa-newspaper-o"></i> <span>{{ __('lang.blogs') }}</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        @can('blog.view')
                            <li class="@if ($menu == 'blog') active @endif">
                                <a href="{{ route('blog.index') }}"><i class="fa fa-circle-o"></i> {{ __('lang.blog_list') }}</a>
                            </li>
                        @endcan
                        @can('blog-category.view')
                            <li class="@if ($menu == 'blog-category') active @endif">
                                <a href="{{ route('blog-category.index') }}"><i class="fa fa-circle-o"></i> {{ __('lang.blog_category') }}</a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcanany
            @canany(['service.view', 'company.view'])
                <li class="treeview @if ($menu == 'service' || $menu == 'company') active menu-open @endif">
                    <a href="javascript:void(0)">
                        <i class="fa fa-wrench" aria-hidden="true"></i> <span>{{ __('lang.company_services') }}</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        @can('company.view')
                            <li class="@if ($menu == 'company') active @endif">
                                <a href="{{ route('company.index') }}"><i class="fa fa-circle-o"></i> {{ __('lang.company_list') }}</a>
                            </li>
                        @endcan
                        @can('service.view')
                            <li class="@if ($menu == 'service') active @endif">
                                <a href="{{ route('service.index') }}"><i class="fa fa-circle-o"></i> {{ __('lang.services_list') }}</a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcanany
            @canany(['project.view', 'project-category.view'])
                <li class="treeview @if ($menu == 'project' || $menu == 'project-category') active menu-open @endif">
                    <a href="javascript:void(0)">
                        <i class="glyphicon glyphicon-th-large"></i> <span>{{ __('lang.projects') }}</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        @can('project-category.view')
                            <li class="@if ($menu == 'project-category') active @endif">
                                <a href="{{ route('project-category.index') }}"><i class="fa fa-circle-o"></i> {{ __('lang.categories') }}</a>
                            </li>
                        @endcan
                        @can('project.view')
                            <li class="@if ($menu == 'project') active @endif">
                                <a href="{{ route('project.index') }}"><i class="fa fa-circle-o"></i> {{ __('lang.project_list') }}</a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcanany
            @canany(['faq.view', 'faq-category.view'])
                <li class="treeview @if ($menu == 'faq' || $menu == 'faq-category') active menu-open @endif">
                    <a href="javascript:void(0)">
                        <i class="glyphicon glyphicon-question-sign"></i> <span>{{ __('lang.faqs') }}</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        @can('faq-category.view')
                            <li class="@if ($menu == 'faq-category') active @endif">
                                <a href="{{ route('faq-category.index') }}"><i class="fa fa-circle-o"></i> {{ __('lang.faq_categories') }}</a>
                            </li>
                        @endcan
                        @can('faq.view')
                            <li class="@if ($menu == 'faq') active @endif">
                                <a href="{{ route('faq.index') }}"><i class="fa fa-circle-o"></i> {{ __('lang.faqs_list') }}</a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcanany
            @canany(['team.view', 'service.view', 'slider.view', 'client.view', 'address.view', 'counter.view', 'lead.view'])
                <li class="treeview @if ($menu == 'general-tools') active menu-open @endif">
                    <a href="javascript:void(0)">
                        <i class="fa fa-tag"></i> <span>{{ __('lang.general_tools') }}</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        @can('quotation.view')
                            <li class="@if ($menu == 'quotation') active @endif">
                                <a href="{{ route('quoteationform.index') }}"><i class="fa fa-circle-o"></i> {{ __('lang.leads') }}</a>
                            </li>
                        @endcan
                        @can('aboutus-edits.view')
                            <li class="@if ($menu == 'aboutus-edits') active @endif">
                                <a href="{{ route('aboutdetails.index') }}"><i class="fa fa-circle-o"></i> {{ __('lang.about_details') }}</a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcanany
            @can('journey.view')
                <li class="@if ($menu == 'journey') active selected @endif">
                    <a href="{{ route('journey.index') }}">
                        <i class="fa fa-list"></i> <span>{{ __('lang.journey') }}</span>
                    </a>
                </li>
            @endcan
            @canany(['job.view', 'job-category.view', 'job-application.view'])
                <li class="treeview @if ($menu == 'careers') active menu-open @endif">
                    <a href="javascript:void(0)">
                        <i class="fa fa-briefcase"></i> <span>{{ __('lang.careers') }}</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        @can('job-category.view')
                            <li class="@if ($menu == 'job-category') active @endif">
                                <a href="{{ route('job-category.index') }}"><i class="fa fa-circle-o"></i> {{ __('lang.job_categories') }}</a>
                            </li>
                        @endcan
                        @can('job.view')
                            <li class="@if ($menu == 'job') active @endif">
                                <a href="{{ route('job.index') }}"><i class="fa fa-circle-o"></i> {{ __('lang.jobs') }}</a>
                            </li>
                        @endcan
                        @can('job-application.view')
                            <li class="@if ($menu == 'application') active @endif">
                                <a href="{{ route('application.index') }}"><i class="fa fa-circle-o"></i> {{ __('lang.applicants') }}</a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcanany
            @canany(['user.view', 'role.view'])
                <li class="treeview @if ($menu == 'user-management') active menu-open @endif">
                    <a href="javascript:void(0)">
                        <i class="fa fa-newspaper-o"></i> <span>{{ __('lang.user_management') }}</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        @can('user.view')
                            <li class="@if ($menu == 'user') active @endif">
                                <a href="{{ route('user.index') }}"><i class="fa fa-circle-o"></i> {{ __('lang.users_listing') }}</a>
                            </li>
                        @endcan
                        @can('role.view')
                            <li class="@if ($menu == 'role') active selected @endif">
                                <a href="{{ route('role.index') }}"><i class="fa fa-circle-o"></i> {{ __('lang.roles_permissions') }}</a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcanany
            @can('setting.view')
                <li class="@if ($menu == 'settings') active selected @endif">
                    <a href="{{ route('settings.index') }}">
                        <i class="fa fa-gear"></i> <span>{{ __('lang.settings') }}</span>
                    </a>
                </li>
            @endcan
        </ul>        
    </section>
    <!-- /.sidebar -->

</aside>

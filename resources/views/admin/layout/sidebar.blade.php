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
            <li class="header">{{ __('MAIN NAVIGATION') }}</li>
            <li class="@if ($menu == 'dashboard') active selected @endif">
                <a href="{{ route('dashboard') }}">
                    <i class="fa fa-dashboard"></i> <span>{{ __('Dashbaord') }}</span>
                </a>
            </li>
            @can('menu.view')
                <li class="@if ($menu == 'menu') active selected @endif">
                    <a href="{{ route('menu.index') }}">
                        <i class="fa fa-list"></i> <span>{{ __('Menu') }}</span>
                    </a>
                </li>
            @endcan
            @can('product.view')
                <li class="@if ($menu == 'product') active selected @endif">
                    <a href="{{ route('product.index') }}">
                        <i class="fa fa-barcode"></i> <span>{{ __('Products') }}</span>
                    </a>
                </li>
            @endcan
            @canany(['blog.view', 'blog-category.view'])
                <li class="treeview @if ($menu == 'blog' || $menu == 'blog-category') active menu-open @endif">
                    <a href="javascript:void(0)">
                        <i class="fa fa-newspaper-o"></i> <span>Blogs</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        @can('blog.view')
                            <li class="@if ($menu == 'blog') active @endif">
                                <a href="{{ route('blog.index') }}"><i class="fa fa-circle-o"></i> {{ __('Blogs List') }}</a>
                            </li>
                        @endcan
                        @can('blog-category.view')
                            <li class="@if ($menu == 'blog-category') active @endif">
                                <a href="{{ route('blog-category.index') }}"><i class="fa fa-circle-o"></i>
                                    {{ __('Blogs Category') }}</a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcanany
            @canany(['project.view', 'project-category.view'])
                <li class="treeview @if ($menu == 'project' || $menu == 'project-category') active menu-open @endif">
                    <a href="javascript:void(0)">
                        <i class="glyphicon glyphicon-th-large"></i> <span>Projects</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        @can('project-category.view')
                            <li class="@if ($menu == 'project-category') active @endif"><a
                                    href="{{ route('project-category.index') }}"><i class="fa fa-circle-o"></i> Categories</a>
                            </li>
                        @endcan
                        @can('project.view')
                            <li class="@if ($menu == 'project') active @endif"><a
                                    href="{{ route('project.index') }}"><i class="fa fa-circle-o"></i> Project List</a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcanany
            @canany(['faq.view', 'faq-category.view'])
                <li class="treeview @if ($menu == 'faq' || $menu == 'faq-category') active menu-open @endif">
                    <a href="javascript:void(0)">
                        <i class="glyphicon glyphicon-question-sign"></i> <span>FAQs</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        @can('faq.view')
                            <li class="@if ($menu == 'faq-category') active @endif"><a
                                    href="{{ route('faq-category.index') }}"><i class="fa fa-circle-o"></i> Categories</a>
                            </li>
                        @endcan
                        @can('faq.view')
                            <li class="@if ($menu == 'faq') active @endif"><a href="{{ route('faq.index') }}"><i
                                        class="fa fa-circle-o"></i> FAQs List</a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcanany
            @canany(['team.view', 'service.view', 'slider.view', 'client.view', 'address.view', 'counter.view',
                'lead.view'])
                <li class="treeview @if (
                    $menu == 'testimonial' ||
                        $menu == 'team' ||
                        $menu == 'service' ||
                        $menu == 'slider' ||
                        $menu == 'client' ||
                        $menu == 'address' ||
                        $menu == 'counter' ||
                        $menu == 'hiring-application') active menu-open @endif">
                    <a href="javascript:void(0)">
                        <i class="fa fa-tag"></i> <span>General Tools</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        @can('slider.view')
                            <li class="@if ($menu == 'slider') active @endif"><a
                                    href="{{ route('slider.index') }}"><i class="fa fa-circle-o"></i> Slider</a>
                            </li>
                        @endcan
                        @can('service.view')
                            <li class="@if ($menu == 'service') active @endif"><a
                                    href="{{ route('service.index') }}"><i class="fa fa-circle-o"></i> Services</a>
                            </li>
                        @endcan
                        @can('team.view')
                            <li class="@if ($menu == 'team') active @endif"><a
                                    href="{{ route('team.index') }}"><i class="fa fa-circle-o"></i> Hire a Pro</a>
                            </li>
                        @endcan
                        @can('lead.view')
                            <li class="@if ($menu == 'hiring-application') active @endif"><a
                                    href="{{ route('hiring-application.index') }}"><i class="fa fa-circle-o"></i> Potential
                                    Leads </a>
                            </li>
                        @endcan
                        @can('feedback.view')
                            <li class="@if ($menu == 'feedback') active @endif"><a
                                    href="{{ route('feedback.index') }}"><i class="fa fa-circle-o"></i> Feedbacks</a>
                            </li>
                        @endcan
                        @can('testimonial.view')
                            <li class="@if ($menu == 'testimonial') active @endif"><a
                                    href="{{ route('testimonial.index') }}"><i class="fa fa-circle-o"></i> Testmonial</a>
                            </li>
                        @endcan
                        @can('client.view')
                            <li class="@if ($menu == 'client') active @endif"><a
                                    href="{{ route('client.index') }}"><i class="fa fa-circle-o"></i> Clients</a>
                            </li>
                        @endcan
                        @can('address.view')
                            <li class="@if ($menu == 'address') active @endif"><a
                                    href="{{ route('address.index') }}"><i class="fa fa-circle-o"></i> Address</a>
                            </li>
                        @endcan
                        @can('counter.view')
                            <li class="@if ($menu == 'counter') active @endif"><a
                                    href="{{ route('counter.index') }}"><i class="fa fa-circle-o"></i> Counters</a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcanany
            @canany(['job.view', 'job-category.view', 'job-application.view'])
                <li class="treeview @if ($menu == 'job-category' || $menu == 'job' || $menu == 'application') active menu-open @endif">
                    <a href="javascript:void(0)">
                        <i class="fa fa-briefcase"></i> <span>Careers</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        @can('job-category.view')
                            <li class="@if ($menu == 'job-category') active @endif"><a
                                    href="{{ route('job-category.index') }}"><i class="fa fa-circle-o"></i> Job
                                    Categories</a>
                            </li>
                        @endcan
                        @can('job.view')
                            <li class="@if ($menu == 'job') active @endif"><a
                                    href="{{ route('job.index') }}"><i class="fa fa-circle-o"></i> Jobs</a>
                            </li>
                        @endcan
                        @can('job-application.view')
                            <li class="@if ($menu == 'application') active @endif"><a
                                    href="{{ route('application.index') }}"><i class="fa fa-circle-o"></i> Applicants</a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcanany
            @canany(['user.view', 'role.view'])
                <li class="treeview @if ($menu == 'user' || $menu == 'role') active menu-open @endif">
                    <a href="javascript:void(0)">
                        <i class="fa fa-newspaper-o"></i> <span>User Management</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        @can('user.view')
                            <li class="@if ($menu == 'user') active @endif">
                                <a href="{{ route('user.index') }}"><i class="fa fa-circle-o"></i>
                                    {{ __('Users Listing') }}</a>
                            </li>
                        @endcan
                        @can('role.view')
                            <li class="@if ($menu == 'role') active selected @endif">
                                <a href="{{ route('role.index') }}">
                                    <i class="fa fa-circle-o"></i> <span>{{ __('Roles & Permissions') }}</span></a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcanany
            @can('settings.view')
                <li class="@if ($menu == 'settings') active selected @endif">
                    <a href="{{ route('settings.index') }}">
                        <i class="fa fa-gear"></i> <span>{{ __('Settings') }}</span>
                    </a>
                </li>
            @endcan
        </ul>
    </section>
    <!-- /.sidebar -->

</aside>

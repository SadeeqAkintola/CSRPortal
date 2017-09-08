@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    {{--<section class="sidebar">--}}
        {{--<ul class="sidebar-menu">--}}

            {{--<li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">--}}
                {{--<a href="{{ route('admin.dashboard') }}">--}}
                    {{--<i class="fa fa-wrench"></i>--}}
                    {{--<span class="title">@lang('quickadmin.qa_dashboard')</span>--}}
                {{--</a>--}}
            {{--</li>--}}

            {{----}}
            {{--@can('event_access')--}}
            {{--<li class="{{ $request->segment(2) == 'events' ? 'active' : '' }}">--}}
                {{--<a href="{{ route('admin.events.index') }}">--}}
                    {{--<i class="fa fa-gears"></i>--}}
                    {{--<span class="title">@lang('quickadmin.events.title')</span>--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--@endcan--}}
            {{----}}
            {{--@can('ticket_access')--}}
            {{--<li class="{{ $request->segment(2) == 'tickets' ? 'active' : '' }}">--}}
                {{--<a href="{{ route('admin.tickets.index') }}">--}}
                    {{--<i class="fa fa-gears"></i>--}}
                    {{--<span class="title">@lang('quickadmin.tickets.title')</span>--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--@endcan--}}
            {{----}}
            {{--@can('payment_access')--}}
            {{--<li class="{{ $request->segment(2) == 'payments' ? 'active' : '' }}">--}}
                {{--<a href="{{ route('admin.payments.index') }}">--}}
                    {{--<i class="fa fa-gears"></i>--}}
                    {{--<span class="title">@lang('quickadmin.payments.title')</span>--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--@endcan--}}
            {{----}}
            {{--@can('user_management_access')--}}
            {{--<li class="treeview">--}}
                {{--<a href="#">--}}
                    {{--<i class="fa fa-users"></i>--}}
                    {{--<span class="title">@lang('quickadmin.user-management.title')</span>--}}
                    {{--<span class="pull-right-container">--}}
                        {{--<i class="fa fa-angle-left pull-right"></i>--}}
                    {{--</span>--}}
                {{--</a>--}}
                {{--<ul class="treeview-menu">--}}
                {{----}}
                {{--@can('role_access')--}}
                {{--<li class="{{ $request->segment(2) == 'roles' ? 'active active-sub' : '' }}">--}}
                        {{--<a href="{{ route('admin.roles.index') }}">--}}
                            {{--<i class="fa fa-briefcase"></i>--}}
                            {{--<span class="title">--}}
                                {{--@lang('quickadmin.roles.title')--}}
                            {{--</span>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--@endcan--}}
                {{--@can('user_access')--}}
                {{--<li class="{{ $request->segment(2) == 'users' ? 'active active-sub' : '' }}">--}}
                        {{--<a href="{{ route('admin.users.index') }}">--}}
                            {{--<i class="fa fa-user"></i>--}}
                            {{--<span class="title">--}}
                                {{--@lang('quickadmin.users.title')--}}
                            {{--</span>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--@endcan--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--@endcan--}}


            {{--@can('setup_management_access')--}}
                {{--<li class="treeview">--}}
                    {{--<a href="#">--}}
                        {{--<i class="fa fa-cogs"></i>--}}
                        {{--<span class="title">@lang('quickadmin.setup-management.title')</span>--}}
                        {{--<span class="pull-right-container">--}}
                        {{--<i class="fa fa-angle-left pull-right"></i>--}}
                    {{--</span>--}}
                    {{--</a>--}}
                    {{--<ul class="treeview-menu">--}}

                        {{--@can('setup_access')--}}
                            {{--<li class="{{ $request->segment(2) == 'companies' ? 'active active-sub' : '' }}">--}}
                                {{--<a href="{{ route('admin.roles.index') }}">--}}
                                    {{--<i class="fa fa-briefcase"></i>--}}
                                    {{--<span class="title">--}}
                                {{--@lang('quickadmin.roles.title')--}}
                            {{--</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                        {{--@endcan--}}
                        {{--@can('user_access')--}}
                            {{--<li class="{{ $request->segment(2) == 'users' ? 'active active-sub' : '' }}">--}}
                                {{--<a href="{{ route('admin.users.index') }}">--}}
                                    {{--<i class="fa fa-user"></i>--}}
                                    {{--<span class="title">--}}
                                {{--@lang('quickadmin.users.title')--}}
                            {{--</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                        {{--@endcan--}}
                    {{--</ul>--}}
                {{--</li>--}}
            {{--@endcan--}}
            {{----}}

            {{----}}

            {{--<li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">--}}
                {{--<a href="{{ route('auth.change_password') }}">--}}
                    {{--<i class="fa fa-key"></i>--}}
                    {{--<span class="title">Change password</span>--}}
                {{--</a>--}}
            {{--</li>--}}

            {{--<li>--}}
                {{--<a href="#logout" onclick="$('#logout').submit();">--}}
                    {{--<i class="fa fa-arrow-left"></i>--}}
                    {{--<span class="title">@lang('quickadmin.qa_logout')</span>--}}
                {{--</a>--}}
            {{--</li>--}}
        {{--</ul>--}}
    {{--</section>--}}




    <section class="sidebar">
    <ul class="sidebar-menu">

        <!-- Sidebar user panel (optional) -->
        <li class="">

                <a href="#"><i class="fa fa-circle text-success"></i> <span>Welcome! {{ Auth::user()->name}}</span></a>

                <!-- Status -->

        </li>


        {{--<li class="">--}}
            {{--<a href="#">--}}
                {{--<i class="fa fa-gears"></i>--}}
                {{--<span class="title">@lang('quickadmin.tickets.title')</span>--}}
            {{--</a>--}}
        {{--</li>--}}

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="/"><i class="fa fa-home" aria-hidden="true"></i> <span>Portal Home</span></a></li>


            <li class="treeview">
                <a href="#"><i class="fa fa-database" aria-hidden="true"></i> <span>Project Data Records</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>

                <ul class="treeview-menu">
                    @if ( Auth::user()->role_id != 2)
                        <li><a href="{{ url('/project') }}"><i class="fa fa-plus-square" aria-hidden="true"></i>Enter or Update Data Records</a></li>
                    @endif
                    <li><a href="{{ route('project.query') }}"><i class="fa fa-filter" aria-hidden="true"></i>
                            Query Project Data Records</a></li>

                </ul>

            </li>


            <li class="treeview">
                <a href="#"><i class="fa fa-file-text"></i> <span>Reports</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('report.plant') }}"><i class="fa fa-line-chart" aria-hidden="true"></i>By Plant</a></li>
                    <li><a href="{{ route('report.pillar') }}"><i class="fa fa-pie-chart" aria-hidden="true"></i>By Pillar</a></li>
                    <li><a href="{{ route('report.year') }}"><i class="fa fa-bar-chart" aria-hidden="true"></i>By Year</a></li>
                </ul>
            </li>



            <li class="treeview">
                <a href="#"><i class="fa fa-envelope"></i> <span>CPA Board</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/cpa-board') }}"><i class="fa fa-bell"></i>Enter or Update Records</a></li>

                </ul>
            </li>



            @can('user_management_access')
            <li class="treeview">
            <a href="#">
            <i class="fa fa-users"></i>
            <span class="title">@lang('quickadmin.user-management.title')</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">

            @can('role_access')
            <li class="{{ $request->segment(2) == 'roles' ? 'active active-sub' : '' }}">
            <a href="{{ route('admin.roles.index') }}">
            <i class="fa fa-briefcase"></i>
            <span class="title">
            @lang('quickadmin.roles.title')
            </span>
            </a>
            </li>
            @endcan
            @can('user_access')
            <li class="{{ $request->segment(2) == 'users' ? 'active active-sub' : '' }}">
            <a href="{{ route('admin.users.index') }}">
            <i class="fa fa-user"></i>
            <span class="title">
            @lang('quickadmin.users.title')
            </span>
            </a>
            </li>
            @endcan
            </ul>
            </li>
            @endcan




        @if ( Auth::user()->role_id == 1)
                <li class="treeview">
                    <a href="#"><i class="fa fa-cogs" aria-hidden="true"></i> <span>Admin Setup</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        {{--<li><a href="{{ url('user-management') }}">Users Setup</a></li>--}}

                        <li ><a href="{{ url('system-management/pillar') }}"><i class="fa fa-cog" aria-hidden="true"></i>Plan 2030 Pillar</a></li>
                        <li><a href="{{ url('system-management/target') }}"><i class="fa fa-cog" aria-hidden="true"></i>Targets</a></li>
                        <li><a href="{{ url('system-management/goal') }}"><i class="fa fa-cog" aria-hidden="true"></i>Goals</a></li>

{{--                        <li><a href="{{ url('system-management/company') }}">Company</a></li>--}}
                        <li><a href="{{ url('system-management/division') }}"><i class="fa fa-cog" aria-hidden="true"></i>Nigeria Operations</a></li>

                    </ul>
                </li>
            @endif

            {{--@can('ticket_access')--}}
                {{--<li class="{{ $request->segment(2) == 'tickets' ? 'active' : '' }}">--}}
                    {{--<a href="{{ route('admin.tickets.index') }}">--}}
                        {{--<i class="fa fa-gears"></i>--}}
                        {{--<span class="title">@lang('quickadmin.tickets.title')</span>--}}
                    {{--</a>--}}
                {{--</li>--}}
            {{--@endcan--}}
               </ul>
        <!-- /.sidebar-menu -->


        <li>
            <a href="#logout" onclick="$('#logout').submit();">
                <i class="fa fa-sign-out" aria-hidden="true"></i>
            <span class="title">@lang('quickadmin.qa_logout')</span>
            </a>
        </li>
    </ul>
    </section>

</aside>
{!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
<button type="submit">@lang('quickadmin.logout')</button>
{!! Form::close() !!}

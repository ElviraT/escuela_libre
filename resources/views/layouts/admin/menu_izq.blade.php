<div class="sidebar second" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul class="sidebar-vertical">

                <li class="menu-title"><span>Inicio</span></li>
                <li>
                    <a class="{{ @request()->routeIs('dashboard') ? 'active' : ' ' }}" href="{{ route('dashboard') }}"
                        onclick=" loading_show();"><i class="fe fe-home"></i> <span>
                            @lang('Dashboard')</span></a>
                </li>
                @canany(['chatify', 'tickets'])
                    <li class="submenu">
                        <a href="#"><i class="fe fe-grid"></i> <span> @lang('Applications')</span> <span
                                class="menu-arrow"></span></a>
                        <ul>
                            @can('chatify')
                                <li><a href="{{ route('chatify') }}"
                                        class="nav-link {{ @request()->routeIs('chatify') ? 'active' : ' ' }}"
                                        onclick=" loading_show();">@lang('Chat')</a>
                                </li>
                            @endcan
                            @can('tickets')
                                <li><a href="{{ route('tickets', '5') }}"
                                        class="nav-link {{ @request()->routeIs('tickets') || @request()->routeIs('tickets.edit') ? 'active' : ' ' }}"
                                        onclick=" loading_show();">@lang('Ticket')</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcanany
                @canany(['users', 'teachers', 'representatives', 'permissions'])
                    <li class="menu-title"><span>@lang('User Management')</span></li>
                    @canany(['users'])
                        <li class="submenu">
                            <a href="#"><i class="fe fe-users"></i> <span> @lang('Users')</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                @can('users')
                                    <li>
                                        <a class="{{ @request()->routeIs('users') ? 'active' : ' ' }}" href="{{ route('users') }}"
                                            onclick=" loading_show();">
                                            @lang('Users')
                                        </a>
                                    </li>
                                @endcan
                                @can('teachers')
                                    <li>
                                        <a class="{{ @request()->routeIs('teachers') ? 'active' : ' ' }}"
                                            href="{{ route('teachers') }}" onclick=" loading_show();">
                                            @lang('Teachers')
                                        </a>
                                    </li>
                                @endcan
                                @can('representatives')
                                    <li>
                                        <a class="{{ @request()->routeIs('representatives') || @request()->routeIs('representatives.alumno') ? 'active' : ' ' }}"
                                            href="{{ route('representatives') }}" onclick=" loading_show();">
                                            @lang('Representatives')
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcanany
                    @can('permissions')
                        <li>
                            <a class="{{ @request()->routeIs('permissions') || @request()->routeIs('permissions.create') ? 'active' : ' ' }}"
                                href="{{ route('permissions') }}" onclick=" loading_show();"><i class="fe fe-lock"></i> <span>
                                    @lang('Roles & Permission')</span>
                            </a>
                        </li>
                    @endcan
                @endcanany
                @canany(['settings', 'controls'])
                    <li class="menu-title"><span>@lang('Settings')</span></li>
                    <li>
                        <a class="{{ @request()->routeIs('settings') ? 'active' : ' ' }}" href="{{ route('settings') }}"
                            onclick=" loading_show();"><i class="fe fe-settings"></i>
                            <span>@lang('Setting')</span></a>
                    </li>
                    @can('controls')
                        <li>
                            <a class="{{ @request()->routeIs('controls') ||
                            @request()->routeIs('controls.grades') ||
                            @request()->routeIs('controls.groups') ||
                            @request()->routeIs('controls.matters') ||
                            @request()->routeIs('controls.modalities')
                                ? 'active'
                                : ' ' }}"
                                href="{{ route('controls') }}" onclick=" loading_show();"><i class="fe fe-award"></i>
                                <span>@lang('Study Control')</span></a>
                        </li>
                    @endcan
                @endcan
                @canany(['shedules.teacher'])
                    <li class="menu-title"><span>@lang('Classromm')</span></li>
                    <li class="submenu">
                        <a href="#"><i class="fe fe-calendar"></i> <span> @lang('Shedules')</span> <span
                                class="menu-arrow"></span></a>
                        <ul>
                            @can('shedules.teacher')
                                <li>
                                    <a class="{{ @request()->routeIs('shedules.teacher') ? 'active' : ' ' }}"
                                        href="{{ route('shedules.teacher') }}" onclick=" loading_show();">
                                        @lang('Schedules Teachers')
                                    </a>
                                </li>
                            @endcan
                            {{-- @can('shedules.teacher') --}}
                            <li>
                                <a class="{{ @request()->routeIs('shedules.classroom') ? 'active' : ' ' }}"
                                    href="{{ route('shedules.classroom') }}" onclick=" loading_show();">
                                    @lang('Class Room')
                                </a>
                            </li>
                            {{-- @endcan --}}
                        </ul>
                    </li>
                @endcan
            </ul>
        </div>
    </div>
</div>

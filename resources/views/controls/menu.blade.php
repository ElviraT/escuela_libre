<div class="col-xl-3 col-md-4">
    <div class="card">
        <div class="card-body">
            <div class="page-header">
                <div class="content-page-header">
                    <h5>@lang('Study Control')</h5>
                </div>
            </div>

            <div class="widget settings-menu mb-0">
                <ul>
                    @can('controls.grades')
                        <li class="nav-item">
                            <a href="{{ route('controls.grades') }}"
                                class="nav-link {{ @request()->routeIs('controls.grades') ? 'active' : ' ' }}">
                                <i class="fe fe-shield"></i> <span>@lang('Grades')</span>
                            </a>
                        </li>
                        <br>
                    @endcan
                    @can('controls.groups')
                        <li class="nav-item">
                            <a href="{{ route('controls.groups') }}"
                                class="nav-link {{ @request()->routeIs('controls.groups') ? 'active' : ' ' }}">
                                <i class="fe fe-users"></i> <span>@lang('Groups')</span>
                            </a>
                        </li>
                        <br>
                    @endcan
                    @can('controls.matters')
                        <li class="nav-item">
                            <a href="{{ route('controls.matters') }}"
                                class="nav-link {{ @request()->routeIs('controls.matters') ? 'active' : ' ' }}">
                                <i class="fe fe-book-open"></i> <span>@lang('Matters')</span>
                            </a>
                        </li>
                        <br>
                    @endcan
                </ul>
            </div>

        </div>
    </div>
</div>

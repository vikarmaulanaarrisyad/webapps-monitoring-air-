<aside class="main-sidebar elevation-4 sidebar-light-success">
    <a href="index3.html" class="brand-link bg-purple bg-info bg-light bg-white">
        <img src="{{ Storage::url(Auth()->user()->path_image) }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">APP Monitoring</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ Storage::url(Auth()->user()->path_image) }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth()->user()->name }}</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link {{ request()->is('dashboard*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-header">Master Data</li>
                <li class="nav-item">
                    <a href="{{ route('monitoring.index') }}"
                        class="nav-link {{ request()->is('monitoring*') ? 'active' : '' }}">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                            Monitoring
                        </p>
                    </a>
                </li>
                <li class="nav-header">Report</li>
                <li class="nav-item">
                    <a href="{{ route('report.index') }}"
                        class="nav-link {{ request()->is('report*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file-pdf"></i>
                        <p>
                            Laporan
                        </p>
                    </a>
                </li>

                <li class="nav-item {{ request()->is('ketinggianair*') ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('ketinggianair*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>
                            Data Ketinggian Air
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview"
                        style="{{ request()->is('ketinggianair*') ? 'display: block' : 'display: none' }}">
                        <li class="nav-item">
                            <a href="{{ route('perhari.index') }}"
                                class="nav-link {{ request()->is('ketinggianair/perhari*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Perhari</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('perbulan.index') }}"
                                class="nav-link {{ request()->is('ketinggianair/perbulan*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Perbulan</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-header">Akun</li>
                <li class="nav-item">
                    <a href="{{ route('profile.show') }}"
                        class="nav-link {{ request()->is('user/profile') ? 'active' : '' }}">
                        <i class="nav-icon far fa-user"></i>
                        <p>
                            Profile
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('profile.show.password') }}"
                        class="nav-link {{ request()->is('user/profile/password') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-unlock"></i>
                        <p>
                            Ubah Password
                        </p>
                    </a>
                </li>
                <li class="nav-item mt-2">
                    <a href="javascript:void(0)" class="nav-link"
                        onclick="document.querySelector('#form-logout').submit()">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                    <form action="{{ route('logout') }}" method="post" id="form-logout">
                        @csrf
                    </form>
                </li>

            </ul>
        </nav>
    </div>
</aside>

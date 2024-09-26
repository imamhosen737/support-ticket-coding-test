<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">

            @php
                $prefix = Request::route()->getPrefix();
                $route = Route::current()->getName();
            @endphp

            <div class="nav">
                <a class="nav-link {{ $route == 'dashboard' ? 'active' : '' }}" href="{{ route('dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                    Dashboard
                </a>

                <a class="nav-link {{ $prefix == 'student' ? '' : 'collapsed' }}" href="#"
                    data-bs-toggle="collapse" data-bs-target="#collapseLayouts1"
                    aria-expanded="{($prefix == 'student')?'true':'false'}}" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-school"></i></div>
                    Student Module
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <div class="collapse {{ $prefix == 'student' ? 'collapse show' : '' }}" id="collapseLayouts1"
                    aria-labelledby="headingOne" data-bs-parent="#collapseLayouts1">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ $route == 'student.index' ? 'active' : '' }}"
                            href="{{ route('student.index') }}"><i class="fas fa-angle-right"></i>&nbsp;Manage
                            Students</a>

                    </nav>
                </div>

                <a class="nav-link {{ $prefix == 'setup' ? '' : 'collapsed' }}" href="#" data-bs-toggle="collapse"
                    data-bs-target="#collapseLayouts2" aria-expanded="{($prefix == 'setup')?'true':'false'}}"
                    aria-controls="collapseLayoutst1">
                    <div class="sb-nav-link-icon"><i class="fas fa-wrench"></i></div>
                    Setup Module
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <div class="collapse {{ $prefix == 'setup' ? 'collapse show' : '' }}" id="collapseLayouts2"
                    aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ $route == 'custom-field.index' ? 'active' : '' }}"
                            href="{{ route('custom-field.index') }}"><i class="fas fa-angle-right"></i>&nbsp;Manage
                            Custom Field</a>

                    </nav>
                </div>

                <a class="nav-link {{ $prefix == 'setting' ? '' : 'collapsed' }} " href="#"
                    data-bs-toggle="collapse" data-bs-target="#collapseLayouts3"
                    aria-expanded="{($prefix =='setting')?'true':'false'}}" aria-controls="collapseLayoutst2">
                    <div class="sb-nav-link-icon"><i class="fas fa-cogs"></i></div>
                    Administrator Module
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <div class="collapse {{ $prefix == 'setting' ? 'collapse show' : '' }}" id="collapseLayouts3"
                    aria-labelledby="headingThree" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ $route == 'password.change' ? 'active' : '' }}"
                            href="{{ route('password.change') }}"><i class="fas fa-angle-right"></i>&nbsp; Password
                            Change</a>
                        <a class="nav-link {{ $route == 'user.edit' ? 'active' : '' }}"
                            href="{{ route('user.edit') }}"><i class="fas fa-angle-right"></i>&nbsp; User Update </a>
                    </nav>
                </div>

                <a class="nav-link  {{ $route == 'contact.us' ? 'active' : '' }}" href="{{ route('contact.us') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-blender-phone"></i></div>
                    Contact Us.
                </a>

                <a class="nav-link" href="{{ route('logout') }}"
                    onclick="return confirm('Are you sure logout from Admin Panel')">
                    <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                    Log Out
                </a>
            </div>
        </div>
    </nav>
</div>

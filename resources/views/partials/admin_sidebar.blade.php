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

                @if (Auth::guard('customer')->check())
                    <a class="nav-link {{ $prefix == 'ticket' ? '' : 'collapsed' }} " href="#"
                        data-bs-toggle="collapse" data-bs-target="#collapseLayouts2"
                        aria-expanded="{($prefix =='ticket')?'true':'false'}}" aria-controls="collapseLayoutst2">
                        <div class="sb-nav-link-icon"><i class="fas fa-issue"></i></div>
                        My Ticket
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>

                    <div class="collapse {{ $prefix == 'ticket' ? 'collapse show' : '' }}" id="collapseLayouts2"
                        aria-labelledby="headingThree" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link {{ $route == 'issue.ticket' ? 'active' : '' }}"
                                href="{{ route('issue.ticket') }}"><i class="fas fa-angle-right"></i>&nbsp; Issue New
                                Ticket</a>

                            <a class="nav-link {{ $route == 'ticket.list' ? 'active' : '' }}"
                                href="{{ route('ticket.list') }}"><i class="fas fa-angle-right"></i>&nbsp; Ticket
                                List</a>

                        </nav>
                    </div>
                @endif

                @if (Auth::check() && !Auth::guard('customer')->check())
                    <a class="nav-link {{ $prefix == 'admin' ? '' : 'collapsed' }} " href="#"
                        data-bs-toggle="collapse" data-bs-target="#collapseLayouts4"
                        aria-expanded="{($prefix =='admin')?'true':'false'}}" aria-controls="collapseLayoutst4">
                        <div class="sb-nav-link-icon"><i class="fas fa-issue"></i></div>
                        All Tickets
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>

                    <div class="collapse {{ $prefix == 'admin' ? 'collapse show' : '' }}" id="collapseLayouts4"
                        aria-labelledby="headingThree" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link {{ $route == 'ticket.list' ? 'active' : '' }}"
                                href="{{ route('ticket.all-ticket') }}"><i class="fas fa-angle-right"></i>&nbsp; Ticket
                                List</a>

                        </nav>
                    </div>
                @endif

                @if (Auth::check())
                    <a class="nav-link {{ $prefix == 'setting' ? '' : 'collapsed' }} " href="#"
                        data-bs-toggle="collapse" data-bs-target="#collapseLayouts3"
                        aria-expanded="{($prefix =='setting')?'true':'false'}}" aria-controls="collapseLayoutst2">
                        <div class="sb-nav-link-icon"><i class="fas fa-cogs"></i></div>
                        Administrator
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>

                    <div class="collapse {{ $prefix == 'setting' ? 'collapse show' : '' }}" id="collapseLayouts3"
                        aria-labelledby="headingThree" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link {{ $route == 'password.change' ? 'active' : '' }}"
                                href="{{ route('password.change') }}"><i class="fas fa-angle-right"></i>&nbsp; Password
                                Change</a>
                            <a class="nav-link {{ $route == 'user.edit' ? 'active' : '' }}"
                                href="{{ route('user.edit') }}"><i class="fas fa-angle-right"></i>&nbsp; User Update
                            </a>
                        </nav>
                    </div>

                @elseif (Auth::guard('customer')->check())
                    <a class="nav-link {{ $prefix == 'setting' ? '' : 'collapsed' }} " href="#"
                        data-bs-toggle="collapse" data-bs-target="#collapseLayouts3"
                        aria-expanded="{($prefix =='setting')?'true':'false'}}" aria-controls="collapseLayoutst2">
                        <div class="sb-nav-link-icon"><i class="fas fa-cogs"></i></div>
                        Administrator
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>

                    <div class="collapse {{ $prefix == 'setting' ? 'collapse show' : '' }}" id="collapseLayouts3"
                        aria-labelledby="headingThree" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link {{ $route == 'password.change' ? 'active' : '' }}"
                                href="{{ route('password.change') }}"><i class="fas fa-angle-right"></i>&nbsp; Password
                                Change</a>
                            <a class="nav-link {{ $route == 'user.edit' ? 'active' : '' }}"
                                href="{{ route('user.edit') }}"><i class="fas fa-angle-right"></i>&nbsp; User Update
                            </a>
                        </nav>
                    </div>
                @endif

                @if (Auth::check())
                    <a class="nav-link" href="{{ route('admin.logout') }}"
                        onclick="return confirm('Are you sure logout from Admin Panel')">
                        <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                        Log Out
                    </a>
                @elseif(Auth::guard('customer')->check())
                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="return confirm('Are you sure logout from Admin Panel')">
                        <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                        Log Out
                    </a>
                @endif

            </div>
        </div>
    </nav>
</div>

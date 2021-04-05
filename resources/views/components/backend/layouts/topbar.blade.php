<header class="topbar" data-navbarbg="skin6">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <div class="navbar-header" data-logobg="skin5">
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                <i class="ti-menu ti-close"></i>
            </a>
            <div class="navbar-brand text-center">
                <a href="{{ route('dashboard') }}" class="logo">
                        <span class="logo-text text-white">
                            {{ $webName }}
                        </span>
                </a>
            </div>
        </div>
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin6">
            <ul class="navbar-nav float-start me-auto">
                <li class="nav-item search-box">
                    <a class="nav-link waves-effect waves-dark" href="javascript:void(0)">
                        <div class="d-flex align-items-center">
                            <i class="mdi mdi-magnify font-20 me-1"></i>
                            <div class="ms-1 d-none d-sm-block">
                                <span>Search</span>
                            </div>
                        </div>
                    </a>
                    <form class="app-search position-absolute">
                        <input type="text" class="form-control" placeholder="Search &amp; enter">
                        <a class="srh-btn">
                            <i class="ti-close"></i>
                        </a>
                    </form>
                </li>
            </ul>
            <ul class="navbar-nav float-end">
                <li class="nav-item">
                    <a class="nav-link text-muted waves-effect waves-dark pro-pic" href="{{ route('profile') }}">
                        {{ auth()->user()->name }}
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>

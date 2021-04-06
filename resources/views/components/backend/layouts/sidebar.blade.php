<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('dashboard') }}"
                       aria-expanded="false">
                        <i class="mdi mdi-av-timer"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('category.index') }}"
                       aria-expanded="false">
                        <i class="mdi mdi-pin"></i>
                        <span class="hide-menu">Category</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('post.index') }}"
                       aria-expanded="false">
                        <i class="mdi mdi-newspaper"></i>
                        <span class="hide-menu">Posts</span>
                    </a>
                </li><li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('message') }}"
                       aria-expanded="false">
                        <i class="mdi mdi-message"></i>
                        <span class="hide-menu">Message</span>
                        <span class="ms-2 badge bg-info">{{ $inboxCount }}</span>
                    </a>
                </li>
                @can('isAdmin')
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('user.index') }}"
                       aria-expanded="false">
                        <i class="mdi mdi-account-multiple"></i>
                        <span class="hide-menu">Users</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('setting') }}"
                       aria-expanded="false">
                        <i class="mdi mdi-settings"></i>
                        <span class="hide-menu">Settings</span>
                    </a>
                </li>
                @endcan
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('profile') }}"
                       aria-expanded="false">
                        <i class="mdi mdi-account-network"></i>
                        <span class="hide-menu">Profile</span>
                    </a>
                </li>
                <livewire:auth.logout.index />
            </ul>
        </nav>
    </div>
</aside>

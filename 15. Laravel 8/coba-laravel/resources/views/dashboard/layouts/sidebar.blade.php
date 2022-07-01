<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="#">
                    <i class="bi bi-house-door"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/posts') ? 'active' : '' }}" href="/dashboard/posts">
                    <i class="bi bi-layout-text-sidebar-reverse"></i>
                    My Post
                </a>
            </li>
        </ul>
    </div>
</nav>

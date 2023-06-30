<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand" href="#">
            <div class="logo-img">
                <img height="35" src="{{ asset('img/Wellfounded_white.png')}}" class="header-brand-img" title="Wellfounded">
            </div>
        </a>
        <div class="sidebar-action"><i class="ik ik-arrow-left-circle"></i></div>
        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
    </div>

    @php
    $segment1 = request()->segment(1);
    $segment2 = request()->segment(2);
    @endphp

    <div class="sidebar-content">
    <div class="nav-container">
        <nav id="main-menu-navigation" class="navigation-main">
            <div class="nav-item ">
                <a href="#"><i class="ik ik-bar-chart-2"></i><span>
                        {{ __('Dashboard')}}</span></a>
            </div>
        </nav>
    </div>
    </div>
</div>
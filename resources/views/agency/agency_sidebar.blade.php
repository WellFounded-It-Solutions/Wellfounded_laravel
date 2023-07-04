<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand" href="{{route('agency.dashboard')}}">
            <div class="logo-img">
               <img height="35" src="{{ asset('img/Wellfounded_white.png')}}" class="header-brand-img" title="Wellfounded"> 
            </div>
        </a>
        <div class="sidebar-action"><i class="ik ik-arrow-left-circle"></i></div>
        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
    </div>


    
    <div class="sidebar-content">
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">
                <div class="nav-item {{ ($menu['menu'] == 'Dashboard') ? 'active' : '' }}">
                    <a href="{{url('/agency/dashboard')}}"><i class="ik ik-bar-chart-2"></i><span> {{ __('Dashboard')}}</span></a>
                </div>

                 <!-- start inventory pages -->
                 <div class="nav-item  {{ ($menu['menu'] == 'Manage Developer') ? 'active' : '' }}">
                    <a href="{{url('/agency/manage-developer')}}"><i class="ik ik-users"></i><span>{{ __('Manage Developer')}}</span> </a>
                </div>

            
                
        </div>
    </div>
</div>
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

    <!-- @php
        $segment1 = request()->segment(1);
        $segment2 = request()->segment(2);
    @endphp -->
    
    <div class="sidebar-content">
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">
                <div class="nav-item {{ ($segment2 == '/agency/dashboard') ? 'active' : '' }}">
                    <a href="{{url('/agency/dashboard')}}"><i class="ik ik-bar-chart-2"></i><span> {{ __('Dashboard')}}</span></a>
                   
                </div>

                <!-- start inventory pages -->
                 


               <!-- 
                
               <span class=" badge badge-success badge-right">{{ __('New')}}</span>     ====== bedge new
               
               
               
               <div class="nav-item {{ ($segment1 == 'products') ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="ik ik-headphones"></i><span>{{ __('Products')}}</span></a>
                    <div class="submenu-content">
                        <a href="{{url('products/create')}}" class="menu-item {{ ($segment1 == 'products' && $segment2 == 'create') ? 'active' : '' }}">{{ __('Add Product')}}</a>
                        <a href="{{url('products')}}" class="menu-item {{ ($segment1 == 'products' && $segment2 == '') ? 'active' : '' }}">{{ __('List Producs')}}</a>
                    </div>
                </div>
                <div class="nav-item {{ ($segment1 == 'categories') ? 'active' : '' }}">
                    <a href="{{url('categories')}}"><i class="ik ik-list"></i><span>{{ __('Categories')}}</span></a>
                </div>
                <div class="nav-item {{ ($segment1 == 'sales') ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="ik ik-shopping-cart"></i><span>{{ __('Sales')}}</span></a>
                    <div class="submenu-content">
                        <a href="{{url('sales/create')}}" class="menu-item {{ ($segment1 == 'sales' && $segment2 == 'create') ? 'active' : '' }}">{{ __('Add Sale')}}</a>
                        <a href="{{url('sales')}}" class="menu-item {{ ($segment1 == 'sales' && $segment2 == '') ? 'active' : '' }}">{{ __('List Sales')}}</a>
                    </div>
                </div>
                <div class="nav-item {{ ($segment1 == 'purchases') ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="ik ik-truck"></i><span>{{ __('Purchases')}}</span></a>
                    <div class="submenu-content">
                        <a href="{{url('purchases/create')}}" class="menu-item {{ ($segment1 == 'purchases' && $segment2 == 'create') ? 'active' : '' }}">{{ __('Add Purchase')}}</a>
                        <a href="{{url('purchases')}}" class="menu-item {{ ($segment1 == 'purchases' && $segment2 == '') ? 'active' : '' }}">{{ __('List Purchases')}}</a>
                    </div>
                </div>
                <div class="nav-item {{ ($segment1 == 'suppliers' || $segment1 == 'customers') ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="ik ik-users"></i><span>{{ __('People')}}</span></a>
                    <div class="submenu-content">
                        <a href="{{url('suppliers')}}" class="menu-item {{ ($segment1 == 'suppliers') ? 'active' : '' }}">{{ __('Suppliers')}}</a>
                        <a href="{{url('customers')}}" class="menu-item {{ ($segment1 == 'customers') ? 'active' : '' }}">{{ __('Customers')}}</a>
                    </div>
                </div> -->



                <!-- end inventory pages -->

                
        </div>
    </div>
</div>
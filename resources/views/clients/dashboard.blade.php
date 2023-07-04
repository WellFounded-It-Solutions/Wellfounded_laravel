@extends('clients.layout')
@section('title', 'Dashboard')
@section('content')

<!-- push external head elements to head -->
@push('head')
<link rel="stylesheet" href="{{ asset('plugins/weather-icons/css/weather-icons.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/owl.carousel/dist/assets/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/owl.carousel/dist/assets/owl.theme.default.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/chartist/dist/chartist.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/jvectormap/jquery-jvectormap.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/DataTables/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('/css/Managedeveloper.css') }}">
@endpush

<script>
    function openTab(tabName) {
        var i;
        var x = document.getElementsByClassName("tab");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        document.getElementById(tabName).style.display = "block";
    }
</script>

<div class="container-fluid">
    <div class="row">

        <div class="col-xl-12">
            @if ($message = Session::get('danger'))
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @endif
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
            @endif
        </div>


        <div class="col-xl-3 col-md-6">
            <div class="card prod-p-card card-red">
                <div class="card-body">
                    <div class="row align-items-center mb-30">
                        <div class="col">
                            <h6 class="mb-5 text-white">Average Price</h6>
                            <h3 class="mb-0 fw-700 text-white">$6,780</h3>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign text-green f-18"></i>
                        </div>
                    </div>
                    <p class="mb-0 text-white"><span class="label label-success mr-10">+52%</span>From Previous Month
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card prod-p-card card-green">
                <div class="card-body">
                    <div class="row align-items-center mb-30">
                        <div class="col">
                            <h6 class="mb-5 text-white">Average Price</h6>
                            <h3 class="mb-0 fw-700 text-white">$6,780</h3>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign text-green f-18"></i>
                        </div>
                    </div>
                    <p class="mb-0 text-white"><span class="label label-success mr-10">+52%</span>From Previous Month
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card prod-p-card card-green">
                <div class="card-body">
                    <div class="row align-items-center mb-30">
                        <div class="col">
                            <h6 class="mb-5 text-white">Average Price</h6>
                            <h3 class="mb-0 fw-700 text-white">$6,780</h3>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign text-green f-18"></i>
                        </div>
                    </div>
                    <p class="mb-0 text-white"><span class="label label-success mr-10">+52%</span>From Previous Month
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card prod-p-card card-green">
                <div class="card-body">
                    <div class="row align-items-center mb-30">
                        <div class="col">
                            <h6 class="mb-5 text-white">Average Price</h6>
                            <h3 class="mb-0 fw-700 text-white">$6,780</h3>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign text-green f-18"></i>
                        </div>
                    </div>
                    <p class="mb-0 text-white"><span class="label label-success mr-10">+52%</span>From Previous Month
                    </p>
                </div>
            </div>
        </div>


        <!-- page statustic chart end -->








    </div>
</div>

<div class="container-fluid">
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-6">
                <div class="page-header-title">
                    <i class="ik ik-users bg-blue"></i>
                    <div class="d-inline">
                        <h5>{{ __('Posted Requirements')}}</h5>
                        <span>{{ __('Create Update Remove requirements')}}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb" style="align-items: center;">
                        <li class="breadcrumb-item">
                            <a href="{{route('clients.dashboard')}}"><i class="ik ik-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">wellfounded</a>
                        </li>

                        <li class="breadcrumb-item active" aria-current="page">Manage Requirements &nbsp</li>
                        <div>

                            <div class="collapse d-md-block display-options" style="display: block !important;" id="displayOptions">
                                <span class="mr-3 d-inline-block float-md-left dispaly-option-buttons">
                                    <!-- <a href="#" class="mr-1 view-list active" onclick="openTab('Developer_Table')">
                                        <i class="ik ik-menu view-icon"></i>
                                    </a> -->

                                    <!-- <a href="#" class="mr-1 view-grid" onclick="openTab('Developer_Grid')">
                                        <i class="ik ik-grid view-icon"></i>
                                    </a> -->
                                </span>

                            </div>

                        </div>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="card  tab" id="Developer_Table">

        <!-- <div class="card-header d-block">
            <h3>{{ __('')}}</h3>
        </div> -->
        <div class="card-body" style="padding-top: 0px;overflow:scroll">
            <div class="dt-responsive" style="padding:15px">
                <table id="order-table" class="table table-striped table-bordered nowrap">
                    <thead>
                        <tr>
                            <th>{{ __('Title')}}</th>
                            <th>{{ __('No of developers')}}</th>
                            <th>{{ __('Experience')}}</th>
                            <th>{{ __('Budget')}}</th>
                            <th>{{ __('Primary Skills')}}</th>
                            <th>{{ __('Duration')}}</th>
                            <th>{{ __('Status')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clientRequirements as $clientRequirement)
                        <tr>
                            <td>{{ $clientRequirement->jobTitle }}</td>
                            <td>{{ $clientRequirement->noOfDevelopers }}</td>
                            <td>{{ $clientRequirement->experience }}</td>
                            <td>{{ $clientRequirement->budget }}</td>
                            <td>{{ $clientRequirement->skills }}</td>
                            <td>{{ $clientRequirement->duration }}</td>
                            <td>{{ $clientRequirement->status }}</td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>




    <div class="card tab" style="display:none; " id="Developer_Grid">

        <div class="card-header d-block">
            <h3>{{ __('Grid View')}}</h3>
        </div>


        <div class="card-body">
            <div class="dt-responsive">
                <div class="row">

                    <div class="col-md-3">
                        <div class="card sale-card">
                            <div class="card-body text-center">
                                <div class="profile-pic mb-20" style=" display: flex;column-gap: 10px;">
                                    <div data-label="40%" class="radial-bar radial-bar-40 radial-bar-lg radial-bar-danger" style="margin: 0px;">
                                        <img src="../img/users/3.jpg" alt="User-Image">
                                    </div>
                                    <div>
                                        <h4 class="mt-15 mb-0">John Doe</h4>
                                        <a href="#">3 years Exp </a>
                                    </div>
                                </div>
                                <div class="badge badge-pill badge-dark">Dashboard</div>
                                <div class="badge badge-pill badge-dark">UI</div>
                                <div class="badge badge-pill badge-dark">UX</div>
                                <div class="badge badge-pill badge-info" data-toggle="tooltip" data-placement="top" title="3 more">+3</div>
                            </div>
                            <div class="p-4 border-top mt-15">
                                <div class="row text-center">
                                    <div class="col-6 border-right">
                                        <a href="#" class="link d-flex align-items-center justify-content-center"><i class="ik ik-message-square f-20 mr-5"></i>Message</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="#" class="link d-flex align-items-center justify-content-center"><i class="ik ik-box f-20 mr-5"></i>Portfolio</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card sale-card">
                            <div class="card-body text-center">
                                <div class="profile-pic mb-20" style=" display: flex;column-gap: 10px;">
                                    <div data-label="40%" class="radial-bar radial-bar-40 radial-bar-lg radial-bar-danger" style="margin: 0px;">
                                        <img src="../img/users/3.jpg" alt="User-Image">
                                    </div>
                                    <div>
                                        <h4 class="mt-15 mb-0">John Doe</h4>
                                        <a href="#">3 years Exp </a>
                                    </div>
                                </div>
                                <div class="badge badge-pill badge-dark">Dashboard</div>
                                <div class="badge badge-pill badge-dark">UI</div>
                                <div class="badge badge-pill badge-dark">UX</div>
                                <div class="badge badge-pill badge-info" data-toggle="tooltip" data-placement="top" title="3 more">+3</div>
                            </div>
                            <div class="p-4 border-top mt-15">
                                <div class="row text-center">
                                    <div class="col-6 border-right">
                                        <a href="#" class="link d-flex align-items-center justify-content-center"><i class="ik ik-message-square f-20 mr-5"></i>Message</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="#" class="link d-flex align-items-center justify-content-center"><i class="ik ik-box f-20 mr-5"></i>Portfolio</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card sale-card">
                            <div class="card-body text-center">
                                <div class="profile-pic mb-20" style=" display: flex;column-gap: 10px;">
                                    <div data-label="40%" class="radial-bar radial-bar-40 radial-bar-lg radial-bar-danger" style="margin: 0px;">
                                        <img src="../img/users/3.jpg" alt="User-Image">
                                    </div>
                                    <div>
                                        <h4 class="mt-15 mb-0">John Doe</h4>
                                        <a href="#">3 years Exp </a>
                                    </div>
                                </div>
                                <div class="badge badge-pill badge-dark">Dashboard</div>
                                <div class="badge badge-pill badge-dark">UI</div>
                                <div class="badge badge-pill badge-dark">UX</div>
                                <div class="badge badge-pill badge-info" data-toggle="tooltip" data-placement="top" title="3 more">+3</div>
                            </div>
                            <div class="p-4 border-top mt-15">
                                <div class="row text-center">
                                    <div class="col-6 border-right">
                                        <a href="#" class="link d-flex align-items-center justify-content-center"><i class="ik ik-message-square f-20 mr-5"></i>Message</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="#" class="link d-flex align-items-center justify-content-center"><i class="ik ik-box f-20 mr-5"></i>Portfolio</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card sale-card">
                            <div class="card-body text-center">
                                <div class="profile-pic mb-20" style=" display: flex;column-gap: 10px;">
                                    <div data-label="40%" class="radial-bar radial-bar-40 radial-bar-lg radial-bar-danger" style="margin: 0px;">
                                        <img src="../img/users/3.jpg" alt="User-Image">
                                    </div>
                                    <div>
                                        <h4 class="mt-15 mb-0">John Doe</h4>
                                        <a href="#">3 years Exp </a>
                                    </div>
                                </div>
                                <div class="badge badge-pill badge-dark">Dashboard</div>
                                <div class="badge badge-pill badge-dark">UI</div>
                                <div class="badge badge-pill badge-dark">UX</div>
                                <div class="badge badge-pill badge-info" data-toggle="tooltip" data-placement="top" title="3 more">+3</div>
                            </div>
                            <div class="p-4 border-top mt-15">
                                <div class="row text-center">
                                    <div class="col-6 border-right">
                                        <a href="#" class="link d-flex align-items-center justify-content-center"><i class="ik ik-message-square f-20 mr-5"></i>Message</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="#" class="link d-flex align-items-center justify-content-center"><i class="ik ik-box f-20 mr-5"></i>Portfolio</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card sale-card">
                            <div class="card-body text-center">
                                <div class="profile-pic mb-20" style=" display: flex;column-gap: 10px;">
                                    <div data-label="40%" class="radial-bar radial-bar-40 radial-bar-lg radial-bar-danger" style="margin: 0px;">
                                        <img src="../img/users/3.jpg" alt="User-Image">
                                    </div>
                                    <div>
                                        <h4 class="mt-15 mb-0">John Doe</h4>
                                        <a href="#">3 years Exp </a>
                                    </div>
                                </div>
                                <div class="badge badge-pill badge-dark">Dashboard</div>
                                <div class="badge badge-pill badge-dark">UI</div>
                                <div class="badge badge-pill badge-dark">UX</div>
                                <div class="badge badge-pill badge-info" data-toggle="tooltip" data-placement="top" title="3 more">+3</div>
                            </div>
                            <div class="p-4 border-top mt-15">
                                <div class="row text-center">
                                    <div class="col-6 border-right">
                                        <a href="#" class="link d-flex align-items-center justify-content-center"><i class="ik ik-message-square f-20 mr-5"></i>Message</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="#" class="link d-flex align-items-center justify-content-center"><i class="ik ik-box f-20 mr-5"></i>Portfolio</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card sale-card">
                            <div class="card-body text-center">
                                <div class="profile-pic mb-20" style=" display: flex;column-gap: 10px;">
                                    <div data-label="40%" class="radial-bar radial-bar-40 radial-bar-lg radial-bar-danger" style="margin: 0px;">
                                        <img src="../img/users/3.jpg" alt="User-Image">
                                    </div>
                                    <div>
                                        <h4 class="mt-15 mb-0">John Doe</h4>
                                        <a href="#">3 years Exp </a>
                                    </div>
                                </div>
                                <div class="badge badge-pill badge-dark">Dashboard</div>
                                <div class="badge badge-pill badge-dark">UI</div>
                                <div class="badge badge-pill badge-dark">UX</div>
                                <div class="badge badge-pill badge-info" data-toggle="tooltip" data-placement="top" title="3 more">+3</div>
                            </div>
                            <div class="p-4 border-top mt-15">
                                <div class="row text-center">
                                    <div class="col-6 border-right">
                                        <a href="#" class="link d-flex align-items-center justify-content-center"><i class="ik ik-message-square f-20 mr-5"></i>Message</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="#" class="link d-flex align-items-center justify-content-center"><i class="ik ik-box f-20 mr-5"></i>Portfolio</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card sale-card">
                            <div class="card-body text-center">
                                <div class="profile-pic mb-20" style=" display: flex;column-gap: 10px;">
                                    <div data-label="40%" class="radial-bar radial-bar-40 radial-bar-lg radial-bar-danger" style="margin: 0px;">
                                        <img src="../img/users/3.jpg" alt="User-Image">
                                    </div>
                                    <div>
                                        <h4 class="mt-15 mb-0">John Doe</h4>
                                        <a href="#">3 years Exp </a>
                                    </div>
                                </div>
                                <div class="badge badge-pill badge-dark">Dashboard</div>
                                <div class="badge badge-pill badge-dark">UI</div>
                                <div class="badge badge-pill badge-dark">UX</div>
                                <div class="badge badge-pill badge-info" data-toggle="tooltip" data-placement="top" title="3 more">+3</div>
                            </div>
                            <div class="p-4 border-top mt-15">
                                <div class="row text-center">
                                    <div class="col-6 border-right">
                                        <a href="#" class="link d-flex align-items-center justify-content-center"><i class="ik ik-message-square f-20 mr-5"></i>Message</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="#" class="link d-flex align-items-center justify-content-center"><i class="ik ik-box f-20 mr-5"></i>Portfolio</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card sale-card">
                            <div class="card-body text-center">
                                <div class="profile-pic mb-20" style=" display: flex;column-gap: 10px;">
                                    <div data-label="40%" class="radial-bar radial-bar-40 radial-bar-lg radial-bar-danger" style="margin: 0px;">
                                        <img src="../img/users/3.jpg" alt="User-Image">
                                    </div>
                                    <div>
                                        <h4 class="mt-15 mb-0">John Doe</h4>
                                        <a href="#">3 years Exp </a>
                                    </div>
                                </div>
                                <div class="badge badge-pill badge-dark">Dashboard</div>
                                <div class="badge badge-pill badge-dark">UI</div>
                                <div class="badge badge-pill badge-dark">UX</div>
                                <div class="badge badge-pill badge-info" data-toggle="tooltip" data-placement="top" title="3 more">+3</div>
                            </div>
                            <div class="p-4 border-top mt-15">
                                <div class="row text-center">
                                    <div class="col-6 border-right">
                                        <a href="#" class="link d-flex align-items-center justify-content-center"><i class="ik ik-message-square f-20 mr-5"></i>Message</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="#" class="link d-flex align-items-center justify-content-center"><i class="ik ik-box f-20 mr-5"></i>Portfolio</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card sale-card">
                            <div class="card-body text-center">
                                <div class="profile-pic mb-20" style=" display: flex;column-gap: 10px;">
                                    <div data-label="40%" class="radial-bar radial-bar-40 radial-bar-lg radial-bar-danger" style="margin: 0px;">
                                        <img src="../img/users/3.jpg" alt="User-Image">
                                    </div>
                                    <div>
                                        <h4 class="mt-15 mb-0">John Doe</h4>
                                        <a href="#">3 years Exp </a>
                                    </div>
                                </div>
                                <div class="badge badge-pill badge-dark">Dashboard</div>
                                <div class="badge badge-pill badge-dark">UI</div>
                                <div class="badge badge-pill badge-dark">UX</div>
                                <div class="badge badge-pill badge-info" data-toggle="tooltip" data-placement="top" title="3 more">+3</div>
                            </div>
                            <div class="p-4 border-top mt-15">
                                <div class="row text-center">
                                    <div class="col-6 border-right">
                                        <a href="#" class="link d-flex align-items-center justify-content-center"><i class="ik ik-message-square f-20 mr-5"></i>Message</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="#" class="link d-flex align-items-center justify-content-center"><i class="ik ik-box f-20 mr-5"></i>Portfolio</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card sale-card">
                            <div class="card-body text-center">
                                <div class="profile-pic mb-20" style=" display: flex;column-gap: 10px;">
                                    <div data-label="40%" class="radial-bar radial-bar-40 radial-bar-lg radial-bar-danger" style="margin: 0px;">
                                        <img src="../img/users/3.jpg" alt="User-Image">
                                    </div>
                                    <div>
                                        <h4 class="mt-15 mb-0">John Doe</h4>
                                        <a href="#">3 years Exp </a>
                                    </div>
                                </div>
                                <div class="badge badge-pill badge-dark">Dashboard</div>
                                <div class="badge badge-pill badge-dark">UI</div>
                                <div class="badge badge-pill badge-dark">UX</div>
                                <div class="badge badge-pill badge-info" data-toggle="tooltip" data-placement="top" title="3 more">+3</div>
                            </div>
                            <div class="p-4 border-top mt-15">
                                <div class="row text-center">
                                    <div class="col-6 border-right">
                                        <a href="#" class="link d-flex align-items-center justify-content-center"><i class="ik ik-message-square f-20 mr-5"></i>Message</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="#" class="link d-flex align-items-center justify-content-center"><i class="ik ik-box f-20 mr-5"></i>Portfolio</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card sale-card">
                            <div class="card-body text-center">
                                <div class="profile-pic mb-20" style=" display: flex;column-gap: 10px;">
                                    <div data-label="40%" class="radial-bar radial-bar-40 radial-bar-lg radial-bar-danger" style="margin: 0px;">
                                        <img src="../img/users/3.jpg" alt="User-Image">
                                    </div>
                                    <div>
                                        <h4 class="mt-15 mb-0">John Doe</h4>
                                        <a href="#">3 years Exp </a>
                                    </div>
                                </div>
                                <div class="badge badge-pill badge-dark">Dashboard</div>
                                <div class="badge badge-pill badge-dark">UI</div>
                                <div class="badge badge-pill badge-dark">UX</div>
                                <div class="badge badge-pill badge-info" data-toggle="tooltip" data-placement="top" title="3 more">+3</div>
                            </div>
                            <div class="p-4 border-top mt-15">
                                <div class="row text-center">
                                    <div class="col-6 border-right">
                                        <a href="#" class="link d-flex align-items-center justify-content-center"><i class="ik ik-message-square f-20 mr-5"></i>Message</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="#" class="link d-flex align-items-center justify-content-center"><i class="ik ik-box f-20 mr-5"></i>Portfolio</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card sale-card">
                            <div class="card-body text-center">
                                <div class="profile-pic mb-20" style=" display: flex;column-gap: 10px;">
                                    <div data-label="40%" class="radial-bar radial-bar-40 radial-bar-lg radial-bar-danger" style="margin: 0px;">
                                        <img src="../img/users/3.jpg" alt="User-Image">
                                    </div>
                                    <div>
                                        <h4 class="mt-15 mb-0">John Doe</h4>
                                        <a href="#">3 years Exp </a>
                                    </div>
                                </div>
                                <div class="badge badge-pill badge-dark">Dashboard</div>
                                <div class="badge badge-pill badge-dark">UI</div>
                                <div class="badge badge-pill badge-dark">UX</div>
                                <div class="badge badge-pill badge-info" data-toggle="tooltip" data-placement="top" title="3 more">+3</div>
                            </div>
                            <div class="p-4 border-top mt-15">
                                <div class="row text-center">
                                    <div class="col-6 border-right">
                                        <a href="#" class="link d-flex align-items-center justify-content-center"><i class="ik ik-message-square f-20 mr-5"></i>Message</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="#" class="link d-flex align-items-center justify-content-center"><i class="ik ik-box f-20 mr-5"></i>Portfolio</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- push external js -->
@push('script')

<script src="{{ asset('plugins/moment/moment.js') }}"></script>
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap.min.js') }}"></script>
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>

<script src="{{ asset('js/widgets.js') }}"></script>
<script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>
<script src="{{ asset('js/datatables.js') }}"></script>

@endpush
@endsection
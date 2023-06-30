@extends('admin.layout')
@section('title', $menu['menu'])
@section('content')
@push('head')
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
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-6">
                <div class="page-header-title">
                    <i class="ik ik-users bg-blue"></i>
                    <div class="d-inline">
                        <h5>{{ __('Agencies Table')}}</h5>
                        <span>{{ __('Create Update Remove agencies')}}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb" style="align-items: center;">
                        <li class="breadcrumb-item">
                            <a href="{{route('dashboard')}}"><i class="ik ik-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">wellfounded</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Manage Agencies &nbsp&nbsp</li>
                        <div>

                            <div class="collapse d-md-block display-options" id="displayOptions">
                                <span class="mr-3 d-inline-block float-md-left dispaly-option-buttons">
                                    <a href="#" class="mr-1 view-list active" onclick="openTab('Developer_Table')">
                                        <i class="ik ik-menu view-icon"></i>
                                    </a>

                                    <a href="#" class="mr-1 view-grid" onclick="openTab('Developer_Grid')">
                                        <i class="ik ik-grid view-icon"></i>
                                    </a>
                                </span>

                            </div>

                        </div>
                    </ol>


                </nav>

            </div>
        </div>
    </div>
    <div class="card  tab" id="Developer_Table">


        <div class="card-header d-block">
            <h3>{{ __('Manage Agencies')}}</h3>
        </div>




        <div class="card-body">
            <div class="dt-responsive">
                <table id="order-table" class="table table-striped table-bordered nowrap">
                    <thead>
                        <tr>
                            <th>{{ __('Name')}}</th>
                            <th>{{ __('Email')}}</th>
                            <th>{{ __('Phone')}}</th>
                            <th>{{ __('Location')}}</th>
                            <th>{{ __('Organization Type')}}</th>
                            <th>{{ __('Organization Size')}}</th>
                            <th>{{ __('Added on')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{ $user->email}}</td>
                            <td>{{ $user->mobile}}</td>
                            <td>{{ $user->location}}</td>
                            <td>{{ $user->organizationType}}</td>
                            <td>{{ $user->organizationSize}}</td>
                            <td>
                                <?php $timestamp = strtotime($user->created_at);
                                $formattedDate = date("d-M-Y h:i A", $timestamp);
                                echo ($formattedDate); ?>
                            </td>
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
                    @foreach($users as $user)
                    <div class="col-md-4">
                        <div class="card sale-card">
                            <div class="card-body text-center">
                                <div class="profile-pic mb-20" style=" display: flex;column-gap: 10px;">
                                    <div data-label="40%" class="radial-bar radial-bar-0 radial-bar-lg radial-bar-danger" style="margin: 0px;">
                                        <img src="{{asset('')}}{{$user->portfolio}}" alt="User-Image">
                                    </div>
                                    <div>
                                        <h4 class="mt-15 mb-0">{{$user->name}}</h4>
                                        <a href="#">{{$user->location}}</a>
                                    </div>
                                </div>

                                <!-- <div class="badge badge-pill badge-dark">{{$user->location}}</div> -->
                                <div class="badge badge-pill badge-dark">{{$user->organizationType}}</div>
                                <div class="badge badge-pill badge-dark">{{$user->organizationSize}}</div>
                                <!-- <div class="badge badge-pill badge-dark">UX</div> -->
                                <!-- <div class="badge badge-pill badge-info" data-toggle="tooltip" data-placement="top" title="3 more">+3</div> -->
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
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
<script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>
<script src="{{ asset('js/datatables.js') }}"></script>
@endpush


@endsection
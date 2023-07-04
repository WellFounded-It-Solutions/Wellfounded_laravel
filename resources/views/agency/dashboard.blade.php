@extends('agency.layout')
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
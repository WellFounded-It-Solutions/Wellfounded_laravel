@extends('developer.layout')
@section('title', 'Dashboard')
@section('content')

<!-- push external head elements to head -->
@push('head')
<link rel="stylesheet" href="{{ asset('plugins/weather-icons/css/weather-icons.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/owl.carousel/dist/assets/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/owl.carousel/dist/assets/owl.theme.default.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/chartist/dist/chartist.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/jvectormap/jquery-jvectormap.css') }}">

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


    </div>
    <!-- page statustic chart end -->

    <div class="row">
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Timeline</h3>
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <li><i class="ik ik-chevron-left action-toggle"></i></li>
                            <li><i class="ik ik-minus minimize-card"></i></li>
                            <li><i class="ik ik-x close-card"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body timeline">
                    <div class="header bg-theme" style="background-image: url('../img/placeholder/placeimg_400_200_nature.jpg')">
                        <div class="color-overlay d-flex align-items-center">
                            <div class="day-number">8</div>
                            <div class="date-right">
                                <div class="day-name">Monday</div>
                                <div class="month">February 2018</div>
                            </div>
                        </div>
                    </div>
                    <ul>
                        <li>
                            <div class="bullet bg-pink"></div>
                            <div class="time">11am</div>
                            <div class="desc">
                                <h3>Attendance</h3>
                                <h4>Computer Class</h4>
                            </div>
                        </li>
                        <li>
                            <div class="bullet bg-green"></div>
                            <div class="time">12pm</div>
                            <div class="desc">
                                <h3>Design Team</h3>
                                <h4>Hangouts</h4>
                            </div>
                        </li>
                        <li>
                            <div class="bullet bg-orange"></div>
                            <div class="time">2pm</div>
                            <div class="desc">
                                <h3>Finish</h3>
                                <h4>Go to Home</h4>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Recent Chat</h3>
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <li><i class="ik ik-chevron-left action-toggle"></i></li>
                            <li><i class="ik ik-minus minimize-card"></i></li>
                            <li><i class="ik ik-x close-card"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body chat-box scrollable card-300">
                    <ul class="chat-list">
                        <li class="chat-item">
                            <div class="chat-img"><img src="../img/users/1.jpg" alt="user"></div>
                            <div class="chat-content">
                                <h6 class="font-medium">{{ __('James Anderson')}}</h6>
                                <div class="box bg-light-info">Lorem Ipsum is simply dummy text of the printing &amp;
                                    type setting industry.</div>
                            </div>
                            <div class="chat-time">10:56 am</div>
                        </li>
                        <li class="chat-item">
                            <div class="chat-img"><img src="../img/users/2.jpg" alt="user"></div>
                            <div class="chat-content">
                                <h6 class="font-medium">Bianca Doe</h6>
                                <div class="box bg-light-info">It’s Great opportunity to work.</div>
                            </div>
                            <div class="chat-time">10:57 am</div>
                        </li>
                        <li class="odd chat-item">
                            <div class="chat-content">
                                <div class="box bg-light-inverse">I would love to join the team.</div>
                                <br>
                            </div>
                        </li>
                        <li class="odd chat-item">
                            <div class="chat-content">
                                <div class="box bg-light-inverse">Whats budget of the new project.</div>
                                <br>
                            </div>
                            <div class="chat-time">10:59 am</div>
                        </li>
                        <li class="chat-item">
                            <div class="chat-img"><img src="../img/users/3.jpg" alt="user"></div>
                            <div class="chat-content">
                                <h6 class="font-medium">Angelina Rhodes</h6>
                                <div class="box bg-light-info">Well we have good budget for the project</div>
                            </div>
                            <div class="chat-time">11:00 am</div>
                        </li>
                    </ul>
                </div>
                <div class="card-footer chat-footer">
                    <div class="input-wrap">
                        <input type="text" placeholder="Type and enter" class="form-control">
                    </div>
                    <button type="button" class="btn btn-icon btn-theme"><i class="fa fa-paper-plane"></i></button>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card task-board">
                <div class="card-header">
                    <h3>{{ __('Todos')}}</h3>
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <li><i class="ik ik-chevron-left action-toggle"></i></li>
                            <li><i class="ik ik-rotate-cw reload-card" data-loading-effect="pulse"></i></li>
                            <li><i class="ik ik-minus minimize-card"></i></li>
                            <li><i class="ik ik-x close-card"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body todo-task">
                    <div class="dd" data-plugin="nestable">
                        <ol class="dd-list">
                            <li class="dd-item" data-id="1">
                                <div class="dd-handle">
                                    <h6>{{ __('Dashbaord')}}</h6>
                                    <p>{{ __('Lorem Ipsum is simply dummy text of the printing and typesetting industry.')}}
                                    </p>
                                </div>
                            </li>
                            <li class="dd-item" data-id="2">
                                <div class="dd-handle">
                                    <h6>{{ __('New project')}}</h6>
                                    <p>{{ __('It is a long established fact that a reader will be distracted.')}}</p>
                                </div>
                            </li>
                            <li class="dd-item" data-id="3">
                                <div class="dd-handle">
                                    <h6>{{ __('Feed Details')}}</h6>
                                    <p>{{ __('here are many variations of passages of Lorem Ipsum available, but the majority have suffered.')}}
                                    </p>
                                </div>
                            </li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card task-board">
                <div class="card-header">
                    <h3>{{ __('Todos')}}</h3>
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <li><i class="ik ik-chevron-left action-toggle"></i></li>
                            <li><i class="ik ik-rotate-cw reload-card" data-loading-effect="pulse"></i></li>
                            <li><i class="ik ik-minus minimize-card"></i></li>
                            <li><i class="ik ik-x close-card"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body todo-task">
                    <div class="dd" data-plugin="nestable">
                        <ol class="dd-list">
                            <li class="dd-item" data-id="1">
                                <div class="dd-handle">
                                    <h6>{{ __('Dashbaord')}}</h6>
                                    <p>{{ __('Lorem Ipsum is simply dummy text of the printing and typesetting industry.')}}
                                    </p>
                                </div>
                            </li>
                            <li class="dd-item" data-id="2">
                                <div class="dd-handle">
                                    <h6>{{ __('New project')}}</h6>
                                    <p>{{ __('It is a long established fact that a reader will be distracted.')}}</p>
                                </div>
                            </li>
                            <li class="dd-item" data-id="3">
                                <div class="dd-handle">
                                    <h6>{{ __('Feed Details')}}</h6>
                                    <p>{{ __('here are many variations of passages of Lorem Ipsum available, but the majority have suffered.')}}
                                    </p>
                                </div>
                            </li>
                        </ol>
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


@endpush
@endsection
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

    <div class="card  " style="margin-bottom: -4px !important;">
        <div class="card-header d-block">
            <h3>{{ __('Apply Filters')}}</h3>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="location">{{ __('Location') }}</label>
                        <select id="location" name="location[]" class="form-control select2" multiple>
                            <option value="India">India</option>
                            <option value="USA">USA</option>
                            <option value="France">France</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="organizationSize">{{ __('Organisation Size') }}</label>
                        <select id="organizationSize" name="organizationSize[]" class="form-control select2" multiple>
                            <option value="0 - 10">{{ __('0 - 10') }}</option>
                            <option value="11 - 50">{{ __('11 - 50') }}</option>
                            <option value="51 - 200">{{ __('51 - 200') }}</option>
                            <option value="201 - 500">{{ __('201 - 500') }}</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="organizationType">{{ __('Organisation type') }}</label>
                        <select id="organizationType" name="organizationType[]" class="form-control select2" multiple>
                            <option value="Self Employed">{{ __('Self Employed') }}</option>
                            <option value="Sole Proprietorship">{{ __('Sole Proprietorship') }}</option>
                            <option value="Privately Held">{{ __('Privately Held') }}</option>
                            <option value="Partnership">{{ __('Partnership') }}</option>
                            <option value="One Person Company">{{ __('One Person Company') }}</option>
                        </select>
                    </div>
                </div>



            </div>
        </div>
    </div>


    <div class="card  tab" id="Developer_Table">


        <!-- <div class="card-header d-block">
            <h3>{{ __('Manage Agencies')}}</h3>
        </div> -->




        <div class="card-body" style="padding-top: 0px;overflow:scroll">
            <div class="dt-responsive" style="padding:15px">
                <table id="order-table" class="table table-striped table-bordered nowrap">
                    <thead>
                        <tr>
                            <th>{{ __('Name')}}</th>
                            <th>{{ __('Email')}}</th>
                            <th>{{ __('Phone')}}</th>
                            <th>{{ __('Location')}}</th>
                            <th>{{ __('Organization Type')}}</th>
                            <th>{{ __('Organization Size')}}</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>
                                <a href="{{route('admin.agencyProfile', $user->id)}}">
                                    {{$user->name}}
                                </a>
                            </td>
                            <td>{{ $user->email}}</td>
                            <td>{{ $user->mobile}}</td>
                            <td>{{ $user->location}}</td>
                            <td>{{ $user->organizationType}}</td>
                            <td>{{ $user->organizationSize}}</td>

                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>




    <div class="card tab" style="display:none; " id="Developer_Grid">

        <!-- <div class="card-header d-block">
            <h3>{{ __('Grid View')}}</h3>
        </div> -->


        <div class="card-body">
            <div class="dt-responsive">
                <div class="row" id="gridView">
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


<script>
    $(document).ready(function() {

        $('.select2').select2();
        // Event listener for the filter elements
        $('#location, #skills_filter, #organizationSize, #organizationType').on('change', function() {
            // Call the filterData function when any filter value changes
            filterData();
        });

        // Function to perform the AJAX call and update the table
        function filterData() {
            // Retrieve the selected values from the filter elements
            var location = $('#location').val();
            var organizationSize = $('#organizationSize').val();
            var organizationType = $('#organizationType').val();

            // Send the AJAX request to the server
            $.ajax({
                url: '/admin/agency-data', // Replace with your server-side route or URL
                type: 'POST',
                data: {
                    location: location,
                    organizationSize: organizationSize,
                    organizationType: organizationType,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    // Update the table with the filtered data
                    console.log(response);
                    var html = '';
                    response.users.forEach(function(user) {
                        html += '<tr>';
                        html += '<td><a href="/admin/agency/profile/'+user.id+'">' + user.name + '</a></td>';
                        html += '<td>' + user.email + '</td>';
                        html += '<td>' + user.mobile + '</td>';
                        html += '<td>' + user.location + '</td>';
                        html += '<td>' + user.organizationType + '</td>';
                        html += '<td>' + user.organizationSize + '</td>';

                        html += '</tr>';
                    });
                    $('#order-table tbody').html(html);

                    var html2 = '';
                    response.users.forEach(function(user) {
                        html2 += '<div class="col-md-4">';
                        html2 += '<div class="card sale-card">';
                        html2 += '<div class="card-body text-center">';
                        html2 += '<div class="profile-pic mb-20" style=" display: flex;column-gap: 10px;">';

                        if (user.workingStatus == 'Open To Work') {
                            html2 += ' <div data-label="40%" class="radial-bar radial-bar-100 radial-bar-lg radial-bar-success" style="margin: 0px;">';
                        } else {
                            html2 += ' <div data-label="40%" class="radial-bar radial-bar-100 radial-bar-lg radial-bar-danger" style="margin: 0px;">';
                        }

                        html2 += '<img src="{!! asset("") !!}' + user.portfolio + '" alt="User-Image">';

                        html2 += '</div>';
                        html2 += ' <div>';
                        html2 += '<h4 class="mt-15 mb-0">' + user.name + '</h4>';

                        html2 += '<a href="#">' + user.location + '</a>';
                        html2 += '</div>';
                        html2 += '</div>';


                        html2 += '<div class="badge badge-pill badge-dark">' + user.organizationType + '</div>';
                        html2 += '<div class="badge badge-pill badge-dark">' + user.organizationSize + '</div>';
                        html2 += '</div>';
                        html2 += '<div class="p-4 border-top mt-15">';

                        html2 += '<div class="row text-center">';
                        html2 += ' <div class="col-6 border-right">';
                        html2 += '<a href="#" class="link d-flex align-items-center justify-content-center"><i class="ik ik-message-square f-20 mr-5"></i>Message</a>';
                        html2 += '</div>';
                        html2 += '<div class="col-6">';
                        html2 += '<a href="#" class="link d-flex align-items-center justify-content-center"><i class="ik ik-box f-20 mr-5"></i>Portfolio</a>';
                        html2 += '</div>';
                        html2 += '</div>';
                        html2 += '</div>';
                        html2 += '</div>';
                        html2 += '</div>';
                    });
                    $('#gridView').html(html2);
                },

                error: function(xhr, status, error) {
                    // Handle the error if any
                    console.error(error);
                }
            });
        }
    });
</script>


@push('script')
<script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>
<script src="{{ asset('js/datatables.js') }}"></script>
@endpush


@endsection
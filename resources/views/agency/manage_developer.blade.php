@extends('agency.layout')
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


        <div class="row align-items-end">
            <div class="col-lg-6">
                <a href="{{ route('agency.addDeveloper') }}" class="btn-sm btn-primary">{{ __('Add developer') }}</a>
            </div>

            <div class="col-lg-6">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb" style="align-items: center;">
                        <li class="breadcrumb-item">
                            <a href="{{route('agency.dashboard')}}"><i class="ik ik-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">wellfounded</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Manage Developers &nbsp&nbsp</li>
                        <div>

                            <div class="collapse d-md-block display-options" style="display: block !important;" id="displayOptions">
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
                        <label for="workingStatus_filter">{{ __('Working Status') }}</label>
                        <select id="workingStatus_filter" name="workingStatus[]" class="form-control select2" multiple>
                            <option value="Open To Work">Open To Work</option>
                            <option value="Hired">Hired</option>
                        </select>
                    </div>
                </div>
                
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




            </div>
        </div>
    </div>





    <div class="card  tab" id="Developer_Table">
        <!-- <div class="card-header d-block">
            <h3>{{ __('Manage Developers')}}</h3>
        </div> -->

        <div class="card-body" style="padding-top: 0px;overflow:scroll">


            <div class="dt-responsive" style="padding:15px">
                <table id="order-table" class="table table-striped table-bordered nowrap">
                    <thead>
                        <tr>
                            <th>{{ __('Name')}}</th>
                            <th>{{ __('Experience')}}</th>
                            <th>{{ __('Salary')}}</th>
                            <th>{{ __('Skills')}}</th>
                            <th>{{ __('Working Status')}}</th>
                            <th>{{ __('Employement Type')}}</th>
                            <th>{{ __('Working Status')}}</th>
                            <th>{{ __('Location')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                        <td>

                            <a href="{{route('agency.developerProfile', $user->id)}}">{{$user->name}}
                            </a>
                        </td>
                            <td>{{ $user->experience}}</td>
                            <td>{{ $user->salary}}</td>
                            <td>{{ $user->skills}}</td>
                            <td>{{ $user->workingStatus}}</td>
                            <td>{{$user->employementType}}</td>
                            <td>{{ $user->workingStatus}}</td>
                            <td>{{ $user->location}}</td>

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
                                <!-- <div class="profile-pic mb-20" style=" display: flex;column-gap: 10px;">
                                    <div data-label="40%" class="radial-bar radial-bar-100 radial-bar-lg @if($user->workingStatus  != 'Open To Work') radial-bar-danger @else radial-bar-success @endif" style="margin: 0px;">
                                        <img style="width: 70px;height:70px;" src="{{asset('')}}{{$user->portfolio}}" alt="User-Image">
                                    </div>
                                    <div>
                                        <h4 class="mt-15 mb-0">{{$user->name}}</h4>
                                        <a href="#">{{$user->experience}}</a>
                                    </div>
                                </div> -->

                                <div class="profile-pic mb-20" style=" display: flex;column-gap: 10px;">
                                    <div data-label="40%" class="radial-bar radial-bar-100 radial-bar-lg @if($user->workingStatus  != 'Open To Work') radial-bar-danger @else radial-bar-success @endif" style="margin: 0px;">
                                        <img src="{{asset('')}}{{$user->profilePic}}" alt="User-Image">
                                        <!-- ../img/users/3.jpg -->
                                    </div>
                                    <div>
                                        <h4 class="mt-15 mb-0">{{$user->name}}</h4>
                                        <a href="#">{{$user->experience}}</a>
                                    </div>
                                </div>

                                <?php
                                $skills = $user->skills;

                                // Split the string into an array using the comma as the delimiter
                                $skillArray = explode(",", $skills);
                                $count = 0;
                                // Initialize a variable to track the count of additional skills
                                $additionalSkillsCount = 0;

                                // Loop through the skills array and generate the HTML code
                                foreach ($skillArray as $skill) {
                                    // Trim any whitespace around the skill
                                    $skill = trim($skill);

                                    if ($count < 3) {
                                        echo '<div class="badge badge-pill badge-dark">' . $skill . '</div>';
                                    }
                                    $count++;
                                }

                                // Check if there are additional skills beyond the displayed ones
                                if (count($skillArray) > 3) {
                                    $additionalSkillsCount = count($skillArray) - 3;
                                    echo '<div class="badge badge-pill badge-info" data-toggle="tooltip" data-placement="top" title="' . $additionalSkillsCount . ' more">+' . $additionalSkillsCount . '</div>';
                                }
                                ?>

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

<!-- Include the necessary jQuery library -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

<script>
    $(document).ready(function() {

        $('.select2').select2();
        // Event listener for the filter elements
        $('#workingStatus_filter, #location').on('change', function() {
            // Call the filterData function when any filter value changes
            filterData();
        });

        // Function to perform the AJAX call and update the table
        function filterData() {
            // Retrieve the selected values from the filter elements
            var workingStatus = $('#workingStatus_filter').val();
            var location = $('#location').val();

            // Get other filter values as needed

            // Send the AJAX request to the server
            $.ajax({
                url: '/agency/developer-data', // Replace with your server-side route or URL
                type: 'POST',
                data: {
                    workingStatus: workingStatus,
                    location: location,

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
                        html += '<td><a href="/agency/developer/profile/'+user.id+'">' + user.name + '</a></td>';
                        html += '<td>' + user.experience + '</td>';
                        html += '<td>' + user.salary + '</td>';
                        html += '<td>' + user.skills + '</td>';
                        html += '<td>' + user.workingStatus + '</td>';
                        html += '<td>' + user.employementType + '</td>';
                        html += '<td>' + user.workingStatus + '</td>';
                        html += '<td>' + user.location + '</td>';
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

                        html2 += '<img src="{!! asset("") !!}' + user.profilePic + '" alt="User-Image">';

                        html2 += '</div>';
                        html2 += ' <div>';
                        html2 += '<h4 class="mt-15 mb-0">' + user.name + '</h4>';

                        html2 += '<a href="#">' + user.experience + '</a>';
                        html2 += '</div>';
                        html2 += '</div>';


                        var skills = user.skills;

                        // Split the string into an array using the comma as the delimiter
                        var skillArray = skills.split(",");
                        var count = 0;
                        // Initialize a variable to track the count of additional skills
                        var additionalSkillsCount = 0;

                        // Loop through the skills array and generate the HTML code
                        skillArray.forEach(function(skill) {
                            // Trim any whitespace around the skill
                            skill = skill.trim();

                            if (count < 3) {
                                html2 += '<div class="badge badge-pill badge-dark">' + skill + '</div>';
                            }
                            count++;
                        });

                        // Check if there are additional skills beyond the displayed ones
                        if (skillArray.length > 3) {
                            additionalSkillsCount = skillArray.length - 3;
                            html2 += '<div class="badge badge-pill badge-info" data-toggle="tooltip" data-placement="top" title="' + additionalSkillsCount + ' more">+' + additionalSkillsCount + '</div>';
                        }

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
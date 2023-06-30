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
                        <h5>{{ __('Developers Table')}}</h5>
                        <span>{{ __('Create Update Remove developers')}}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb" style="align-items: center;">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}"><i class="ik ik-home"></i></a>
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
        <div class="col-md-2">
            <div class="form-group">
                <label for="skills_filter">{{ __('Skills') }}</label>
                <select  id="skills_filter" name="skills[]" class="form-control select2" multiple>
                    @foreach (getSkills() as $row)
                    <option value="{{ $row->name }}" {{ old('skills') == $row->name ? 'selected' : '' }}>{{ $row->name }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="empType_filter">{{ __('Employement Type') }}</label>
                <select id="empType_filter" name="employementType[]" class="form-control select2" multiple>
                    <option {{ old('employementType') == 'Freelancer' ? 'selected' : '' }}>
                        {{ __('Freelancer') }}
                    </option>
                    <option {{ old('employementType') == 'Full Time' ? 'selected' : '' }}>
                        {{ __('Full Time') }}
                    </option>
                    <option {{ old('employementType') == 'Part Time' ? 'selected' : '' }}>
                        {{ __('Part Time') }}
                    </option>
                    <option {{ old('employementType') == 'Contract Basic' ? 'selected' : '' }}>
                        {{ __('Contract Basic') }}
                    </option>
                    <option {{ old('employementType') == 'Other' ? 'selected' : '' }}>
                        {{ __('Other') }}
                    </option>
                </select>
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label for="experience_filter">{{ __('Experience') }}</label>
                <select id="experience_filter" name="experience[]" class="form-control select2" multiple>
                    <!-- Options for the Salary filter -->
                    <option {{ old('experience') == '0 - 1 Years' ? 'selected' : '' }}>{{ __('0 - 1 Years') }}</option>
                    <option {{ old('experience') == '1 - 2 Years' ? 'selected' : '' }}>{{ __('1 - 2 Years') }}</option>
                    <option {{ old('experience') == '2 - 3 Years' ? 'selected' : '' }}>{{ __('2 - 3 Years') }}</option>
                    <option {{ old('experience') == '3 - 5 Years' ? 'selected' : '' }}>{{ __('3 - 5 Years') }}</option>
                    <option {{ old('experience') == '5 - 7 Years' ? 'selected' : '' }}>{{ __('5 - 7 Years') }}</option>
                    <option {{ old('experience') == '7 - 9 Years' ? 'selected' : '' }}>{{ __('7 - 9 Years') }}</option>
                    <!-- Add more options as needed -->
                </select>
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label for="salary_filter">{{ __('Salary') }}</label>
                <select class="form-control select2" id="salary_filter" multiple name="salary">
                    <option {{ old('salary') == 'Less then 100000' ? 'selected' : '' }}>{{ __('Less then 100000') }}</option>
                    <option {{ old('salary') == '1 lac to 2 lac' ? 'selected' : '' }}>{{ __('1 lac to 2 lac') }}</option>
                    <option {{ old('salary') == '2 lac to 3 lac' ? 'selected' : '' }}>{{ __('2 lac to 3 lac') }}</option>
                    <option {{ old('salary') == 'More then 3lac' ? 'selected' : '' }}>{{ __('More then 3lac') }}</option>

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

        <div class="card-body" style="padding-top: 0px;overflow:scroll" >


            <div class="dt-responsive" style="padding:15px">
                <table id="order-table" class="table table-striped table-bordered nowrap">
                    <thead>
                        <tr>
                            <th>{{ __('Name')}}</th>
                            <th>{{ __('Email')}}</th>
                            <th>{{ __('Phone')}}</th>
                            <th>{{ __('Experience')}}</th>
                            <th>{{ __('Salary')}}</th>
                            <th>{{ __('Skills')}}</th>
                            <th>{{ __('Working Status')}}</th>
                            <th>{{ __('Employement Type')}}</th>
                            <th>{{ __('Current Status')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{ $user->email}}</td>
                            <td>{{ $user->mobile}}</td>
                            <td>{{ $user->experience}}</td>
                            <td>{{ $user->salary}}</td>
                            <td>{{ $user->skills}}</td>
                            <td>{{ $user->workingStatus}}</td>
                            <td>{{$user->employementType}}</td>
                            <td>{{ $user->currentStatus}}</td>

                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>



    <!-- Include the necessary jQuery library -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

    <script>
        $(document).ready(function() {

            $('.select2').select2();
            // Event listener for the filter elements
            $('#workingStatus_filter, #skills_filter, #empType_filter, #experience_filter, #salary_filter').on('change', function() {
                // Call the filterData function when any filter value changes
                filterData();
            });

            // Function to perform the AJAX call and update the table
            function filterData() {
                // Retrieve the selected values from the filter elements
                var workingStatus = $('#workingStatus_filter').val();
                var skills = $('#skills_filter').val();
                var employementType = $('#empType_filter').val();
                var experience = $('#experience_filter').val();
                var salary = $('#salary_filter').val();
                // Get other filter values as needed

                // Send the AJAX request to the server
                $.ajax({
                    url: '/filter-data', // Replace with your server-side route or URL
                    type: 'GET',
                    data: {
                        workingStatus: workingStatus,
                        skills: skills,
                        employementType: employementType,
                        experience: experience,
                        salary: salary,
                        // Add other filter parameters
                    },
                    success: function(response) {
                        // Update the table with the filtered data
                        $('#order-table tbody').html(response);
                    },
                    error: function(xhr, status, error) {
                        // Handle the error if any
                        console.error(error);
                    }
                });
            }
        });
    </script>







    <div class="card tab" style="display:none; " id="Developer_Grid">

        <!-- <div class="card-header d-block">
            <h3>{{ __('Grid View')}}</h3>
        </div> -->


        <div class="card-body">
            <div class="dt-responsive">
                <div class="row">
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
                                        <img src="{{asset('')}}{{$user->portfolio}}" alt="User-Image">
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

@push('script')
<script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>
<script src="{{ asset('js/datatables.js') }}"></script>
@endpush


@endsection
@extends('clients.layout')
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
                        <h5>{{ __('Requirements')}}</h5>
                        <!-- <span>{{ __('Create Update Remove requirements')}}</span> -->
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
                        <li class="breadcrumb-item active" aria-current="page">Manage Requirements &nbsp&nbsp</li>
                        <div>

                            <div class="collapse d-md-block display-options" style="display: block !important;" id="displayOptions">
                                <span class="mr-3 d-inline-block float-md-left dispaly-option-buttons">
                                    <a href="#" class="mr-1 view-list active" onclick="openTab('Developer_Table')">
                                        <i class="ik ik-menu view-icon"></i>
                                    </a>

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

    <div class="card  " style="margin-bottom: -4px !important;">
        <div class="card-header d-block">
            <h3>{{ __('Apply Filters')}}</h3>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="status">{{ __('Status') }}</label>
                        <select id="status" name="status[]" class="form-control select2" multiple>
                            <option value="Ongoing">Ongoing</option>
                            <option value="Completed">Completed</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="skills_filter">{{ __('Skills') }}</label>
                        <select id="skills_filter" name="skills[]" class="form-control select2" multiple>
                            @foreach (getSkills() as $row)
                            <option value="{{ $row->name }}" {{ old('skills') == $row->name ? 'selected' : '' }}>{{ $row->name }}
                            </option>
                            @endforeach
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
                        @foreach($requirements as $clientRequirement)
                        <tr>
                        <td>
                                   <a href="{{route('client.updateClientRequirement')}}?id={{$clientRequirement->id}}"> {{ $clientRequirement->jobTitle }}</a></td>
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











</div>

<!-- Include the necessary jQuery library -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

<script>
    $(document).ready(function() {

        $('.select2').select2();
        // Event listener for the filter elements
        $('#status, #skills_filter').on('change', function() {
            // Call the filterData function when any filter value changes
            filterData();
        });

        // Function to perform the AJAX call and update the table
        function filterData() {
            // Retrieve the selected values from the filter elements
            var status = $('#status').val();
            var skills = $('#skills_filter').val();


            // Send the AJAX request to the server
            $.ajax({
                url: '/clients/requirement-data', // Replace with your server-side route or URL
                type: 'POST',
                data: {
                    status: status,
                    skills: skills,
                    // Add other filter parameters
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
                        html += '<td><a href="/clients/update/requirement?id='+user.id+'">' + user.jobTitle + '</a></td>';
                     
                            html += '<td>' + user.noOfDevelopers + '</td>';
                        
                        
                        html += '<td>' + user.experience + '</td>';
                        html += '<td>' + user.budget + '</td>';
                        html += '<td>' + user.skills + '</td>';
                        html += '<td>' + user.duration + '</td>';
                        html += '<td>' + user.status + '</td>';
                        html += '</tr>';
                    });
                    $('#order-table tbody').html(html);

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
@extends('developer.layout')
@section('title', $menu['menu'])
@section('content')

<!-- push external head elements to head -->
@push('head')

<link rel="stylesheet" href="{{ asset('plugins/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/summernote/dist/summernote-bs4.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/mohithg-switchery/dist/switchery.min.css') }}">

@endpush
<div class="container-fluid">
    <div class="page-header">
        <div class="row align-items-end">


            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-file-text bg-blue"></i>
                    <div class="d-inline">
                        <h5>{{ __('Profile')}}</h5>
                        <span>{{ __('View Update developer profile')}}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('developer.dashboard')}}"><i class="ik ik-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">wellfounded</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Profile</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 col-md-5">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <img src="@if($user->profilePic != ''){{asset($user->profilePic)}} @else {{asset('../img/user.jpg')}} @endif" class="rounded-circle" width="150" />
                        <h4 class="card-title mt-10">{{ $user['name']}}</h4>
                        <p class="card-subtitle">{{ $user['employementType']}}</p>
                        <div class="row text-center justify-content-md-center">
                            <div class="col-6">
                                @if($user->wellfounded_id)
                                <h4 class="sub-title" style="border-bottom: 0px;"><?= App\Models\User::find($user->added_by)->name; ?></h4>
                                @else
                                <h4 class="sub-title" style="border-bottom: 0px;">Wellfounded</h4>
                                @endif
                                <div class="row">
                                    <div class="col-7">
                                        <a target="_blank" style="padding-bottom:25px;" href="{{ asset($user->resume) }}" title="Download Resume" class="btn btn-primary mb-2">
                                            <span> Resume</span>
                                        </a>
                                    </div>
                                    <div class="col-5">

                                        <a target="_blank" style="padding-bottom:25px;" href="{{ asset($user->portfolio) }}" title="Download Portfolio" class="btn btn-primary">
                                            <span> Portfolio</span>
                                        </a>

                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <h5 class="sub-title" style="border-bottom: 0px;" id="workingStatus">{{$user->workingStatus}}</h5>
                                <input value="1" type="checkbox" @if($user->workingStatus == 'Open To Work') checked @endif class="js-single" onChange="handleCheckboxChange(this)" />


                            </div>
                        </div>

                    </div>
                </div>
                <hr class="mb-0">
                <div class="card-body">
                    <small class="text-muted d-block">{{ __('Headline')}} &nbsp; &nbsp;
                        <a href="{{url('/developer/profile/update')}}?id={{$user->id}}"> <i class="fas fa-edit"></i> </small></a>
                    <h6> @if($user->headline) {{$user->headline}} @else <i>Not available</i> @endif</h6>
                    <!-- <small class="text-muted d-block pt-10">{{ __('Phone')}} &nbsp; &nbsp;<i class="fas fa-edit"></i>  </small>
                    <h6>(123) 456 7890</h6> -->

                    <!-- <small class="text-muted d-block pt-10">{{ __('Address')}}</small>
                    <h6>71 Pilgrim Avenue Chevy Chase, MD 20815</h6> -->
                    <div class="map-box">
                        <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d248849.886539092!2d77.49085452149588!3d12.953959988118836!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae1670c9b44e6d%3A0xf8dfc3e8517e4fe0!2sBengaluru%2C+Karnataka!5e0!3m2!1sen!2sin!4v1542005497600" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe> -->
                    </div>
                    <!-- <small class="text-muted d-block pt-30">{{ __('Social Profile')}}</small> -->
                    <br />
                    <!-- <button class="btn btn-icon btn-facebook"><i class="fab fa-facebook-f"></i></button>
                    <button class="btn btn-icon btn-twitter"><i class="fab fa-twitter"></i></button>
                    <button class="btn btn-icon btn-instagram"><i class="fab fa-instagram"></i></button> -->
                </div>
            </div>
        </div>
        <style>
            .pencil {
                font-size: 17px;
                padding: 9px;
            }

            .pencil:hover {
                background-color: #ddd8d8;
                border-radius: 50%;
            }

            .trash {
                font-size: 17px;
                padding: 9px;
            }

            .trash:hover {
                background-color: #ddd8d8;
                border-radius: 50%;
            }
        </style>
        <div class="col-lg-8 col-md-7">
            <div class="card">
                <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-timeline-tab" data-toggle="pill" href="#current-month" role="tab" aria-controls="pills-timeline" aria-selected="true">{{ __('Experience')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " id="pills-education-tab" data-toggle="pill" href="#education-month" role="tab" aria-controls="pills-education" aria-selected="true">{{ __('Education')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " id="pills-certification-tab" data-toggle="pill" href="#certification-month" role="tab" aria-controls="pills-certification" aria-selected="true">{{ __('Certification')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#last-month" role="tab" aria-controls="pills-profile" aria-selected="false">{{ __('Profile')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-setting-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-setting" aria-selected="false">{{ __('Setting')}}</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="current-month" role="tabpanel" aria-labelledby="pills-timeline-tab">
                        <div class="card-body">

                            <div class="row mb-3">
                                <div class="col-sm-12" style="text-align: right;">
                                    <a href="#" data-toggle="modal" data-target="#myModal"><i class="trash ik ik-plus"></i></a>
                                </div>
                            </div>
                            <style>
                                .hide {
                                    display: none;
                                }
                            </style>

                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="myModalLabel">Add Job Experience</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <!-- Form inside the modal -->
                                            <form class="forms-sample" action="{{route('developer.storeExperience')}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="user_id" value="{{$user->id}}" id="">
                                                <div class="form-group">
                                                    <label for="job_title">Job Title</label>
                                                    <input type="text" required class="form-control" id="job_title" name="job_title">
                                                </div>
                                                <div class="form-group">
                                                    <label for="company_name">Company Name</label>
                                                    <input type="text" required class="form-control" id="company_name" name="company_name">
                                                </div>

                                                <div class="form-group">
                                                    <label for="company_name">Position</label>
                                                    <input type="text" required class="form-control" id="company_position" name="company_position">
                                                </div>

                                                <div class="form-group form-check" style="margin-left:-17px;">
                                                    <div class="border-checkbox-section">
                                                        <div class="border-checkbox-group border-checkbox-group-primary">
                                                            <input class="border-checkbox" checked type="checkbox" value="1" name="is_present" id="checkbox1">
                                                            <label class="border-checkbox-label" for="checkbox1">{{ __('I am currently working in this role')}}</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="joining_date">Joining Date</label>
                                                    <input type="date" required class="form-control" id="joining_date" value="" name="joining_date">
                                                </div>

                                                <div class="form-group hide" id="resignDateField">
                                                    <label for="resign_date">Resign Date</label>
                                                    <input type="date" value="" class="form-control" id="resign_date" name="resign_date">
                                                </div>

                                                <div class="form-group">
                                                    <label for="company_logo">Company Logo</label>
                                                    <input type="file" class="form-control-file" accept="image/png, image/gif, image/jpeg" id="company_logo" name="company_logo">
                                                </div>
                                                <div class="form-group">
                                                    <label for="description">Description</label>
                                                    <textarea class="form-control" required id="description" name="description" rows="3"></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <script>
                                $(document).ready(function() {
                                    $('#checkbox1').change(function() {
                                        var resignDateField = $('#resignDateField');
                                        var resignDateInput = $('#resign_date');

                                        if ($(this).is(':checked')) {
                                            resignDateField.addClass('hide');
                                            resignDateInput.removeAttr('required');
                                        } else {
                                            resignDateField.removeClass('hide');
                                            resignDateInput.attr('required', 'required');
                                        }
                                    });
                                });
                            </script>


                            <div class="profiletimeline mt-0">
                                <hr>
                                @foreach($experiences as $experience)
                                <div class="sl-item">
                                    <div class="sl-left">

                                        <img src="@if($experience->company_logo) {{asset($experience->company_logo)}} @else  {{asset('../img/users/3.jpg')}} @endif" alt="user" class="rounded-circle" />



                                    </div>
                                    <div class="sl-right">
                                        <div>
                                            <div class="row">

                                                <div class="col-sm-6">
                                                    <a href="javascript:void(0)" class="link">{{$experience->job_title}}</a> <br><span class="sl-date">{{$experience->company_name}} - {{$experience->company_position}}</span> <br><span class="sl-date">{{$experience->joining_date}} to @if($experience->is_present) Present @else {{$experience->resign_date}} @endif</span>
                                                    <p class="mt-10">{{$experience->description}}</p>
                                                </div>

                                                <div class="col-sm-5" style="text-align:right">
                                                    <div>

                                                        <a href="#" data-toggle="modal" data-target="#myModal_{{$experience->id}}"><i class="pencil ik ik-edit-2"></i></a>
                                                    </div>
                                                </div>
                                                <div class="col-sm-1" style="text-align:right">
                                                    <a href="#" data-toggle="modal" data-target="#deleteModal_{{$experience->id}}">
                                                        <i class="trash ik ik-trash"></i>
                                                    </a>

                                                </div>

                                                <!-- Delete Confirmation Modal -->
                                                <div class="modal fade" id="deleteModal_{{$experience->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel_{{$experience->id}}" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="deleteModalLabel_{{$experience->id}}">Confirmation</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Are you sure you want to delete this item?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                <a href="{{route('developer.deleteDeveloperExperience')}}?id={{$experience->id}}" type="button" class="btn btn-danger">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>



                                            </div>

                                        </div>
                                        <div class="like-comm mt-20">
                                            <!-- <a href="javascript:void(0)" class="link mr-10">2 comment</a> -->
                                            <!-- <a href="javascript:void(0)" class="link mr-10"><i class="fa fa-heart text-danger"></i> 5 Love</a> -->
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <!-- Modal -->
                                <div class="modal fade" id="myModal_{{$experience->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel{{$user->id}}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myModalLabel">Update Job Experience</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <div class="modal-body">
                                                <!-- Form inside the modal -->
                                                <form class="forms-sample" action="{{route('developer.updateExperience')}}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="user_id" value="{{$user->id}}" id="">
                                                    <input type="hidden" name="id" value="{{$experience->id}}" id="">
                                                    <div class="form-group">
                                                        <label for="job_title">Job Title</label>
                                                        <input type="text" required class="form-control" id="job_title" value="{{$experience->job_title}}" name="job_title">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="company_name">Company Name</label>
                                                        <input type="text" required class="form-control" id="company_name" value="{{$experience->company_name}}" name="company_name">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="company_name">Position</label>
                                                        <input type="text" required class="form-control" id="company_position" value="{{$experience->company_position}}" name="company_position">
                                                    </div>

                                                    <div class="form-group form-check" style="margin-left:-17px;">
                                                        <div class="border-checkbox-section">
                                                            <div class="border-checkbox-group border-checkbox-group-primary">
                                                                <input class="border-checkbox" @if($experience->is_present) checked @endif type="checkbox" value="1" name="is_present" id="checkbox1_{{$experience->id}}">
                                                                <label class="border-checkbox-label" for="checkbox1_{{$experience->id}}">{{ __('I am currently working in this role')}}</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="joining_date">Joining Date</label>
                                                        <input type="date" required class="form-control" id="joining_date_{{$experience->id}}" value="{{$experience->joining_date}}" name="joining_date">
                                                    </div>


                                                    <div class="form-group hide" id="resignDateField_{{ $experience->id }}">
                                                        <label for="resign_date">Resign Date</label>
                                                        <input type="date" value="" class="form-control" id="resign_date_{{$experience->id}}" value="{{$experience->resign_date}}" name="resign_date">
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="company_logo">Company Logo</label>
                                                        <input type="file" class="form-control-file" accept="image/png, image/gif, image/jpeg" id="company_logo" name="company_logo">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="description">Description</label>
                                                        <textarea class="form-control" required id="description" name="description" rows="3">{{$experience->description}}</textarea>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    $(document).ready(function() {
                                        $('#checkbox1_{!! $experience->id !!}').change(function() {
                                            var resignDateField = $('#resignDateField_{!! $experience->id !!}');
                                            var resignDateInput = $('#resign_date_{!! $experience->id !!}');

                                            if ($(this).is(':checked')) {
                                                resignDateField.addClass('hide');
                                                resignDateInput.removeAttr('required');
                                            } else {
                                                resignDateField.removeClass('hide');
                                                resignDateInput.attr('required', 'required');
                                            }
                                        });
                                    });
                                </script>


                                @endforeach

                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade show " id="education-month" role="tabpanel" aria-labelledby="pills-education-tab">
                        <div class="card-body">

                            <div class="row mb-3">
                                <div class="col-sm-12" style="text-align: right;">
                                    <a href="#" data-toggle="modal" data-target="#education"><i class="trash ik ik-plus"></i></a>
                                </div>
                            </div>
                            <style>
                                .hide {
                                    display: none;
                                }
                            </style>

                            <!-- Modal -->
                            <div class="modal fade" id="education" tabindex="-1" role="dialog" aria-labelledby="educationLable" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="educationLable">Add Education</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <!-- Form inside the modal -->
                                            <form class="forms-sample" action="{{route('developer.storeEducation')}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="user_id" value="{{$user->id}}" id="">
                                                
                                                <div class="form-group">
                                                    <label for="institute_name">Institute Name</label>
                                                    <input type="text" required class="form-control" id="institute_name" name="institute_name">
                                                </div>

                                                <div class="form-group">
                                                    <label for="education_title">Course Title</label>
                                                    <input type="text" required class="form-control" id="education_title" name="education_title">
                                                </div>

                                                <div class="form-group">
                                                    <label for="course_name">Course Name</label>
                                                    <input type="text" required class="form-control" id="course_name" name="course_name">
                                                </div>

                                                <div class="form-group form-check" style="margin-left:-17px;">
                                                    <div class="border-checkbox-section">
                                                        <div class="border-checkbox-group border-checkbox-group-primary">
                                                            <input class="border-checkbox" checked type="checkbox" value="1" name="is_present" id="checkbox2">
                                                            <label class="border-checkbox-label" for="checkbox2">{{ __('I am currently studying in this institute')}}</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="joining_date_certification">Joining Date</label>
                                                    <input type="date" required class="form-control" id="joining_date_certification" value="" name="joining_date">
                                                </div>

                                                <div class="form-group hide" id="completion_date_field">
                                                    <label for="completion_date">Completion Date</label>
                                                    <input type="date" value="" class="form-control" id="completion_date" name="completion_date">
                                                </div>

                                                <div class="form-group">
                                                    <label for="institute_logo">Institute Logo</label>
                                                    <input type="file" class="form-control-file" accept="image/png, image/gif, image/jpeg" id="institute_logo" name="institute_logo">
                                                </div>

                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <script>
                                $(document).ready(function() {
                                    $('#checkbox2').change(function() {
                                        var resignDateField = $('#completion_date_field');
                                        var resignDateInput = $('#completion_date');

                                        if ($(this).is(':checked')) {
                                            resignDateField.addClass('hide');
                                            resignDateInput.removeAttr('required');
                                        } else {
                                            resignDateField.removeClass('hide');
                                            resignDateInput.attr('required', 'required');
                                        }
                                    });
                                });
                            </script>


                            <div class="profiletimeline mt-0">
                                <hr>
                                @foreach($educations as $education)
                                <div class="sl-item">
                                    <div class="sl-left">

                                        <img src="@if($education->institute_logo) {{asset($education->institute_logo)}} @else  {{asset('../img/users/3.jpg')}} @endif" alt="user" class="rounded-circle" />



                                    </div>
                                    <div class="sl-right">
                                        <div>
                                            <div class="row">

                                                <div class="col-sm-6">
                                                    <a href="javascript:void(0)" class="link">{{$education->education_title}}</a> <br><span class="sl-date">{{$education->institute_name}} - {{$education->course_name}}</span> <br><span class="sl-date">{{$education->joining_date}} to @if($education->is_present) Present @else {{$education->completion_date}} @endif</span>
                                                    <p class="mt-10">

                                                    </p>
                                                </div>

                                                <div class="col-sm-5" style="text-align:right">
                                                    <div>

                                                        <a href="#" data-toggle="modal" data-target="#education_{{$education->id}}"><i class="pencil ik ik-edit-2"></i></a>
                                                    </div>
                                                </div>
                                                <div class="col-sm-1" style="text-align:right">
                                                    <a href="#" data-toggle="modal" data-target="#deleteModal2_{{$education->id}}">
                                                        <i class="trash ik ik-trash"></i>
                                                    </a>

                                                </div>

                                                <!-- Delete Confirmation Modal -->
                                                <div class="modal fade" id="deleteModal2_{{$education->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModal2Label_{{$education->id}}" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="deleteModalLabel_{{$experience->id}}">Confirmation</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Are you sure you want to delete this item?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                <a href="{{route('developer.deleteDeveloperEducation')}}?id={{$education->id}}" type="button" class="btn btn-danger">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>



                                            </div>

                                        </div>
                                        <div class="like-comm mt-20">
                                            <!-- <a href="javascript:void(0)" class="link mr-10">2 comment</a> -->
                                            <!-- <a href="javascript:void(0)" class="link mr-10"><i class="fa fa-heart text-danger"></i> 5 Love</a> -->
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <!-- Modal -->
                                <div class="modal fade" id="education_{{$education->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel{{$user->id}}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myModalLabel">Update Education</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <div class="modal-body">
                                                <!-- Form inside the modal -->
                                                <form class="forms-sample" action="{{route('developer.updateEducation')}}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="user_id" value="{{$user->id}}" id="">
                                                    <input type="hidden" name="id" value="{{$education->id}}" id="">

                                                    <div class="form-group">
                                                        <label for="institute_name">Institute Name</label>
                                                        <input type="text" required class="form-control" id="institute_name" value="{{$education->institute_name}}" name="institute_name">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="education_title">Course Title</label>
                                                        <input type="text" required class="form-control" id="education_title" value="{{$education->education_title}}" name="education_title">
                                                    </div>
                                                 

                                                    <div class="form-group">
                                                        <label for="course_name">Course Name</label>
                                                        <input type="text" required class="form-control" id="course_name" value="{{$education->course_name}}" name="course_name">
                                                    </div>


                                                    <div class="form-group form-check" style="margin-left:-17px;">
                                                        <div class="border-checkbox-section">
                                                            <div class="border-checkbox-group border-checkbox-group-primary">
                                                                <input class="border-checkbox" @if($education->is_present) checked @endif type="checkbox" value="1" name="is_present" id="checkbox2_{{$education->id}}">
                                                                <label class="border-checkbox-label" for="checkbox2_{{$education->id}}">{{ __('I am currently working in this institute')}}</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="joining_date">Joining Date</label>
                                                        <input type="date" required class="form-control" id="joining_date_{{$education->id}}" value="{{$education->joining_date}}" name="joining_date">
                                                    </div>



                                                    <div class="form-group hide" id="completion_date_field_{{ $education->id }}">
                                                        <label for="completion_date_{{ $education->id }}">Completion Date</label>
                                                        <input type="date" value="" class="form-control" id="completion_date_{{ $education->id }}" name="completion_date">
                                                    </div>



                                                    <div class="form-group">
                                                        <label for="institute_logo">Institute Logo</label>
                                                        <input type="file" class="form-control-file" accept="image/png, image/gif, image/jpeg" id="institute_logo" name="institute_logo">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                     $(document).ready(function() {
                                        $('#checkbox2_{!! $education->id !!}').change(function() {
                                            var resignDateField = $('#completion_date_field_{!! $education->id !!}');
                                            var resignDateInput = $('#completion_date_{!! $education->id !!}');

                                            if ($(this).is(':checked')) {
                                                resignDateField.addClass('hide');
                                                resignDateInput.removeAttr('required');
                                            } else {
                                                resignDateField.removeClass('hide');
                                                resignDateInput.attr('required', 'required');
                                            }
                                        });
                                    });
                                </script>


                                @endforeach

                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade show " id="certification-month" role="tabpanel" aria-labelledby="pills-certification-tab">
                        <div class="card-body">

                            <div class="row mb-3">
                                <div class="col-sm-12" style="text-align: right;">
                                    <a href="#" data-toggle="modal" data-target="#certification"><i class="trash ik ik-plus"></i></a>
                                </div>
                            </div>


                            <!-- Modal -->
                            <div class="modal fade" id="certification" tabindex="-1" role="dialog" aria-labelledby="certification" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="myModalLabel">Add Licenses & Certifications</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <!-- Form inside the modal -->
                                            <form class="forms-sample" action="{{route('developer.storeCertification')}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="user_id" value="{{$user->id}}" id="">
                                                <div class="form-group">
                                                    <label for="certification_name">Name</label>
                                                    <input type="text" required class="form-control" id="certification_name" name="name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="issuing_organisation">Issuing Organisation</label>
                                                    <input type="text" required class="form-control" id="issuing_organisation" name="issuing_organisation">
                                                </div>



                                                <div class="form-group">
                                                    <label for="issuing_date">Issuing Date</label>
                                                    <input type="date" required class="form-control" id="issuing_date" value="" name="issuing_date">
                                                </div>


                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="profiletimeline mt-0">
                                <hr>
                                @foreach($certifications as $certification)
                                <div class="sl-item">
                                    <div class="sl-left">

                                        <img src="@if($user->profilePic != ''){{asset($user->profilePic)}} @else {{asset('../img/user.jpg')}} @endif" alt="user" class="rounded-circle" />

                                    </div>
                                    <div class="sl-right">
                                        <div>
                                            <div class="row">

                                                <div class="col-sm-6">
                                                    <a href="javascript:void(0)" class="link">{{$certification->name}}</a> <br><span class="sl-date">{{$certification->issuing_date}} </span>
                                                    <p class="mt-10">{{$certification->issuing_organisation}}</p>
                                                </div>

                                                <div class="col-sm-5" style="text-align:right">
                                                    <div>

                                                        <a href="#" data-toggle="modal" data-target="#certification_{{$certification->id}}"><i class="pencil ik ik-edit-2"></i></a>
                                                    </div>
                                                </div>
                                                <div class="col-sm-1" style="text-align:right">
                                                    <a href="#" data-toggle="modal" data-target="#deleteModal3_{{$certification->id}}">
                                                        <i class="trash ik ik-trash"></i>
                                                    </a>

                                                </div>

                                                <!-- Delete Confirmation Modal -->
                                                <div class="modal fade" id="deleteModal3_{{$certification->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel_{{$certification->id}}" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="deleteModalLabel_{{$certification->id}}">Confirmation</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Are you sure you want to delete this item?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                <a href="{{route('developer.deleteDeveloperCertification')}}?id={{$certification->id}}" type="button" class="btn btn-danger">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>



                                            </div>

                                        </div>
                                        <div class="like-comm mt-20">
                                            <!-- <a href="javascript:void(0)" class="link mr-10">2 comment</a> -->
                                            <!-- <a href="javascript:void(0)" class="link mr-10"><i class="fa fa-heart text-danger"></i> 5 Love</a> -->
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <!-- Modal -->
                                <div class="modal fade" id="certification_{{$certification->id}}" tabindex="-1" role="dialog" aria-labelledby="certificationlLabel{{$certification->id}}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="certificationlLabel">Update Add Licenses & Certifications</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <div class="modal-body">
                                                <!-- Form inside the modal -->
                                                <form class="forms-sample" action="{{route('developer.updateCertification')}}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="user_id" value="{{$user->id}}" id="">
                                                    <input type="hidden" name="id" value="{{$certification->id}}" id="">
                                                    <div class="form-group">
                                                        <label for="job_title">Name</label>
                                                        <input type="text" required class="form-control" id="certification" value="{{$certification->name}}" name="name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="issuing_organisation_{{$certification->id}}">Issuing Organisation</label>
                                                        <input type="text" required class="form-control" id="issuing_organisation" value="{{$certification->issuing_organisation}}" name="issuing_organisation">
                                                    </div>



                                                    <div class="form-group">
                                                        <label for="issuing_date_{{$certification->id}}">Issuing Date</label>
                                                        <input type="date" required class="form-control" id="issuing_date_{{$certification->id}}issuing_date_{{$certification->id}}" value="{{$certification->issuing_date}}" name="issuing_date">
                                                    </div>


                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    checkbox = document.querySelector('#checkbox1_{!! $certification->id !!}');
                                    resignDateField = document.querySelector('#resignDateField_{!! $certification->id !!}');
                                    resignDateInput = document.querySelector('#resign_date_{!! $certification->id !!}');

                                    checkbox.addEventListener('change', function() {
                                        if (this.checked) {
                                            resignDateField.classList.add('hide');
                                            resignDateInput.removeAttribute('required');
                                        } else {
                                            resignDateField.classList.remove('hide');
                                            resignDateInput.setAttribute('required', 'required');
                                        }
                                    });
                                </script>


                                @endforeach

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="last-month" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 col-6"> <strong>{{ __('Full Name')}}</strong>
                                    <br>
                                    <p class="text-muted">{{$user->name}}</p>
                                </div>
                                @if($user->added_by == 0)
                                <div class="col-md-3 col-6"> <strong>{{ __('Mobile')}}</strong>
                                    <br>
                                    <p class="text-muted">{{$user->mobile}}</p>
                                </div>
                                <div class="col-md-3 col-6"> <strong>{{ __('Email')}}</strong>
                                    <br>
                                    <p class="text-muted">{{$user->email}}</p>
                                </div>

                                @else

                                @endif
                                <div class="col-md-3 col-6"> <strong>{{ __('Location')}}</strong>
                                    <br>
                                    <p class="text-muted">{{$user->location}}</p>
                                </div>
                            </div>
                            <hr>
                            <p>
                                {{$user->remark}}
                            </p>
                            <h4 class="mt-30">{{ __('Skill Set')}}</h4>
                            <hr>

                            <?php
                            $skills = explode(',', $user->skills);
                            $colors = ['success', 'warning', 'danger', 'info'];
                            $count = 1;
                            foreach ($skills as $skill) {
                                $colorClass = $colors[$count % count($colors)]; // Get the color class based on the count
                            ?>
                                <h6 class="mt-30">{{ __($skill) }} <span class="pull-right">100%</span></h6>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-<?php echo $colorClass; ?>" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                        <span class="sr-only">50% Complete</span>
                                    </div>
                                </div>
                            <?php
                                $count++;
                            }
                            ?>





                        </div>
                    </div>
                    <div class="tab-pane fade" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="example-name">{{ __('Full Name')}}</label>
                                <input type="text" placeholder="Name" class="form-control" name="example-name" value="{{$user->name}}" disabled id="example-name">
                            </div>
                            @if($user->added_by == 0)

                            <div class="form-group">
                                <label for="example-email">{{ __('Email')}}</label>
                                <input type="email" placeholder="johnathan@admin.com" class="form-control" name="example-email" disabled value="{{$user->email}}" id="example-email">
                            </div>

                            <div class="form-group">
                                <label for="example-phone">{{ __('Phone No')}}</label>
                                <input type="text" placeholder="123 456 7890" id="example-phone" name="example-phone" disabled value="{{$user->mobile}}" class="form-control">
                            </div>
                            @endif

                            <div class="form-group">
                                <label for="example-message">{{ __('About us')}}</label>
                                <textarea name="example-message" name="" disabled rows="5" class="form-control">{{$user->remark}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="example-country">{{ __('Country')}}</label>
                                <select name="example-message" disabled id="example-message" class="form-control">
                                    <option @if($user->location == 'India') selected @endif value="India">India</option>
                                    <option @if($user->location == 'USA') selected @endif value="USA">USA</option>
                                    <option @if($user->location == 'France') selected @endif value="France">France</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="example-country">{{ __('Salary Expectation (Per Month)')}}</label>
                                <input type="text" disabled name="salary" value="{{ $user->salary }}" required class="form-control" id="salary" placeholder="Salary (per month)">
                                <!-- <select name="example-message" disabled id="example-message" class="form-control">
                                    <option @if($user->salary == 'Less then 100000') selected @endif>{{ __('Less then 100000') }}</option>
                                    <option @if($user->salary == '1 lac to 2 lac') selected @endif>{{ __('1 lac to 2 lac') }}</option>
                                    <option @if($user->salary == '2 lac to 3 lac') selected @endif>{{ __('2 lac to 3 lac') }}</option>
                                    <option @if($user->salary == 'More then 3lac') selected @endif>{{ __('More then 3lac') }}</option>
                                </select> -->
                            </div>

                            <a href="{{route('developer.updateDeveloperProfile')}}" class="btn btn-success" type="button">Update Profile</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function handleCheckboxChange(checkbox) {
        var isChecked = $(checkbox).is(':checked');
        let workingStatus = 'Hired';
        if (isChecked == true) {
            workingStatus = 'Open To Work';
        }

        // Make an AJAX request
        $.ajax({
            url: "{!! route('developer.changeDeveloperWorkingStatus') !!} ",
            method: 'POST',
            data: {
                workingStatus: workingStatus,
                user_id: "{!! $user->id !!}"
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {

                if (isChecked) {
                    toastr.success('Working Status changed', 'Open to work');
                } else {
                    toastr.error('Working Status changed', 'Hired');
                }
                var workingStatus = isChecked ? 'Open To Work' : 'Hired';
                $('#workingStatus').text(workingStatus);

            },
            error: function() {
                toastr.error('Failed to update working status', 'Error');
                // Restore the checkbox state if there was an error
                $(checkbox).prop('checked', !isChecked);
            }
        });
    }
</script>


<!-- push external js -->
@push('script')
<script src="{{ asset('plugins/select2/dist/js/select2.min.js') }}"></script>
<script src="{{ asset('plugins/summernote/dist/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
<script src="{{ asset('plugins/jquery.repeater/jquery.repeater.min.js') }}"></script>
<script src="{{ asset('plugins/mohithg-switchery/dist/switchery.min.js') }}"></script>

<script src="{{ asset('js/form-advanced.js') }}"></script>
@endpush
@endsection
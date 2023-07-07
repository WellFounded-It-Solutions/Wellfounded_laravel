@extends('agency.layout')
@section('title', $menu['menu'])
@section('content')

<!-- push external head elements to head -->
@push('head')

<link rel="stylesheet" href="{{ asset('plugins/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/summernote/dist/summernote-bs4.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/mohithg-switchery/dist/switchery.min.css') }}">
<!-- Add the slick-theme.css if you want default styling -->
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<!-- Add the slick-theme.css if you want default styling -->
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />

@endpush
<div class="container-fluid">
    <div class="page-header">
        <div class="row align-items-end">


            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-file-text bg-blue"></i>
                    <div class="d-inline">
                        <h5>{{ __('Profile')}}</h5>
                        <span>{{ __('View Update agency profile')}}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('agency.dashboard')}}"><i class="ik ik-home"></i></a>
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
                        <img src="@if($user->logo != ''){{asset($user->logo)}} @else {{asset('../img/user.jpg')}} @endif" class="rounded-circle" width="150" />
                        <h4 class="card-title mt-10">{{ $user['name']}}</h4>
                        <p class="card-subtitle">@if($user['tagline']) {{$user['tagline']}} @else Update tagline @endif &nbsp; <a href="{{url('/admin/agency/profile/update')}}?id={{$user->id}}"> <i class="fas fa-edit"></i></a></p>
                        <div class="row text-center justify-content-md-center">
                            <div class="col-4"><a href="javascript:void(0)" class="link">
                                    <i class="ik ik-user"></i>
                                    <font class="font-medium"><?php $no_of_deve = \App\Models\User::where('added_by', $user->id)->get();
                                                                echo (count($no_of_deve)); ?></font>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
                <hr class="mb-0">



                <div class="card-body">
                    <small class="text-muted d-block">{{ __('Email')}} &nbsp; &nbsp; <a href="{{url('/agency/profile/update')}}?id={{$user->id}}"> <i class="fas fa-edit"></i></a></small>
                    <h6> @if($user->email) {{$user->email}} @else <i>Not available</i> @endif</h6>
                    <small class="text-muted d-block pt-10">Phone &nbsp; &nbsp; <a href="{{url('/agency/profile/update')}}?id={{$user->id}}"> <i class="fas fa-edit"></i></a></small>
                    <h6> @if($user->mobile) {{$user->mobile}} @else <i>Not available</i> @endif</h6>
                    <small class="text-muted d-block pt-10">Location &nbsp; &nbsp; <a href="{{url('/agency/profile/update')}}?id={{$user->id}}"> <i class="fas fa-edit"></i></a></small>
                    <h6> @if($user->location) {{$user->location}} @else <i>Not available</i> @endif</h6>

                    <small class="text-muted d-block pt-10">Website &nbsp; &nbsp; <a href="{{url('/agency/profile/update')}}?id={{$user->id}}"> <i class="fas fa-edit"></i></a></small>
                    <h6><a href="{{$user->website}}"> @if($user->website) {{$user->website}} @else <i>Not available</i> @endif</a></h6>

                    <div class="map-box">
                        <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d248849.886539092!2d77.49085452149588!3d12.953959988118836!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae1670c9b44e6d%3A0xf8dfc3e8517e4fe0!2sBengaluru%2C+Karnataka!5e0!3m2!1sen!2sin!4v1542005497600" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen=""></iframe> -->
                    </div>
                    <small class="text-muted d-block pt-30">Social Profile</small>
                    <br>
                    @if($user['facebook'])
                    <a href="{{$user['facebook']}}" target="_blank" class="btn btn-icon btn-facebook"><i class="fab fa-facebook-f"></i></a>
                    @endif
                    @if($user['instagram'])
                    <a href="{{$user['instagram']}}" target="_blank" class="btn btn-icon btn-instagram"><i class="fab fa-instagram"></i></a>
                    @endif
                    @if($user['linkedin'])
                    <a href="{{$user['linkedin']}}" target="_blank" class="btn btn-icon btn-linkedin"><i class="fab fa-linkedin"></i></a>
                    @endif
                    @if($user['skype'])
                    <a href="{{$user['skype']}}" target="_blank" class="btn btn-icon btn-linkedin"><i class="fab fa-skype"></i></a>
                    @endif

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

            .fade-overlay {
                position: relative;
                display: inline-block;
            }

            .fade-img {
                opacity: 0.5;
                /* Adjust the opacity value as per your preference */
                transition: opacity 0.3s ease;
            }

            .fade-overlay:hover .fade-img {
                opacity: 1;
                cursor: pointer;
            }

            .pointer {
                cursor: pointer;
            }

            .overlay-text {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                font-size: 20px;
                /* Adjust the font size as per your preference */
                color: white;
                /* Adjust the text color as per your preference */
            }
        </style>
        <div class="col-lg-8 col-md-7 mb-3" style="max-height:630px;overflow:scroll;">
            <div class="card">
                <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">

                    <li class="nav-item">
                        <a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#last-month" role="tab" aria-controls="pills-profile" aria-selected="false">{{ __('Profile')}}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " id="pills-timeline-tab" data-toggle="pill" href="#current-month" role="tab" aria-controls="pills-timeline" aria-selected="true">{{ __('Documents')}}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="pills-setting-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-setting" aria-selected="false">{{ __('Setting')}}</a>
                    </li>



                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade " id="current-month" role="tabpanel" aria-labelledby="pills-timeline-tab">
                        <div class="card-body">

                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <h4 class="">{{ __('Documents')}}</h4>
                                </div>
                                <div class="col-sm-5" style="text-align: right;">
                                    <a href="#" data-toggle="modal" data-target="#documentEdit">
                                        <i class="trash ik ik-edit"></i>
                                    </a>
                                </div>
                                <div class="col-sm-1" style="text-align: right;">
                                    <a href="#" data-toggle="modal" data-target="#documentUpload">
                                        <i class="trash ik ik-plus"></i>
                                    </a>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="documentEdit" tabindex="-1" role="dialog" aria-labelledby="documentEditLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="documentEditLabel">Manage Documents</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($documents as $image)
                                                        <tr>
                                                            <td>
                                                                {{$image->name}}
                                                            </td>
                                                            <td>
                                                                <a href="{{route('agency.deleteDocument')}}?id={{$image->id}}">
                                                                    <i class="trash ik ik-trash"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="documentUpload" tabindex="-1" role="dialog" aria-labelledby="documentUploadLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="documentUploadLabel">Add Documents</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="forms-sample" action="{{route('agency.storeDocuments')}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="user_id" value="{{$user->id}}" id="">
                                                <input type="hidden" name="is_portfolio" value="0" id="">

                                                <div class="form-group">
                                                    <label for="image">Name</label>
                                                    <input type="text" required class="form-control" name="name">
                                                </div>

                                                <div class="form-group">
                                                    <label for="image">Upload</label>
                                                    <input type="file" accept="application/pdf" required class="form-control" name="images[]">
                                                </div>
                                                <button type="submit" class="btn btn-primary">Upload</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="profiletimeline mt-0">
                                <div class="sl-item">

                                    <div class="sl-right">

                                        <div class="row mt-2">
                                            @foreach($documents as $doc)
                                            <div class="col-lg-4 col-md-6 mb-1" style="max-height: 108px;">
                                                <div class="card" style="height:100%;">
                                                    <div class="card-body">
                                                        <h5 class="card-title">{{$doc->name}}</h5>
                                                        <a href="{{asset($doc->image)}}" target="_blank" class="btn btn-primary">Download</a>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>

                                    </div>
                                </div>
                                <hr>
                            </div>


                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <h4 class="">{{ __('Images')}}</h4>
                                </div>
                                <div class="col-sm-5" style="text-align: right;">
                                    <a href="#" data-toggle="modal" data-target="#imageEdit">
                                        <i class="trash ik ik-edit"></i>
                                    </a>
                                </div>
                                <div class="col-sm-1" style="text-align: right;">
                                    <a href="#" data-toggle="modal" data-target="#imageUpload">
                                        <i class="trash ik ik-plus"></i>
                                    </a>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="imageEdit" tabindex="-1" role="dialog" aria-labelledby="imageUploadLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="imageUploadLabel">Manage Images</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Image</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($images as $image)
                                                        <tr>
                                                            <td>
                                                                <div style="width: 100px;">
                                                                    <img style="width: 100%;" src="{{asset($image->image)}}" alt="">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <a href="{{route('agency.deleteImage')}}?id={{$image->id}}">
                                                                    <i class="trash ik ik-trash"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="imageUpload" tabindex="-1" role="dialog" aria-labelledby="imageUploadLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="imageUploadLabel">Add Images</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="forms-sample" action="{{route('agency.storeImages')}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="user_id" value="{{$user->id}}" id="">

                                                <div class="form-group">
                                                    <label for="image">Add images</label>
                                                    <input type="file" multiple accept="image/png, image/gif, image/jpeg" required class="form-control" name="images[]">
                                                </div>
                                                <button type="submit" class="btn btn-primary">Upload</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="profiletimeline mt-0">
                                <div class="sl-item">

                                    <div class="sl-right">
                                        <div>

                                            <div class="row">
                                                @php
                                                $count = 0;
                                                $remainingCount=0;
                                                @endphp

                                                @foreach($images as $image)
                                                @if($count < 7) <div class="col-lg-3 col-md-6 mb-20">
                                                    <img src="{{asset($image->image)}}" class="img-fluid rounded pointer gallery-image2" />
                                            </div>
                                            @else

                                            @php
                                            $remainingCount = count($images) - $count;
                                            break;
                                            @endphp
                                            @endif

                                            @php
                                            $count++;
                                            @endphp
                                            @endforeach

                                            @if($remainingCount > 0)

                                            <div class="col-lg-3 col-md-6 mb-20">
                                                <div class="fade-overlay">
                                                    <img src="{{asset($images[7]->image)}}" class="img-fluid rounded fade-img gallery-image2" alt="Image">
                                                    <div class="overlay-text"><b class="pointer gallery-image2" style="    color: #3c3939;font-size: 27px;"> +{{ $remainingCount }}</b></div>
                                                </div>
                                                <p class="card-text">Number of images: {{ $remainingCount }}</p>
                                            </div>
                                            @endif

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <h4 class="">{{ __('Portfolio')}}</h4>
                            </div>
                            <div class="col-sm-5" style="text-align: right;">
                                <a href="#" data-toggle="modal" data-target="#portfolioEdit">
                                    <i class="trash ik ik-edit"></i>
                                </a>
                            </div>
                            <div class="col-sm-1" style="text-align: right;">
                                <a href="#" data-toggle="modal" data-target="#portfolioUpload">
                                    <i class="trash ik ik-plus"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="portfolioEdit" tabindex="-1" role="dialog" aria-labelledby="portfolioEditlabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="portfolioEditlabel">Manage Portfolio</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($portfolios as $image)
                                                    <tr>
                                                        <td>
                                                            {{$image->name}}
                                                        </td>
                                                        <td>
                                                            <a href="{{route('agency.deleteDocument')}}?id={{$image->id}}">
                                                                <i class="trash ik ik-trash"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="portfolioUpload" tabindex="-1" role="dialog" aria-labelledby="portfolioUploadLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="portfolioUploadLabel">Add Portfolios</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="forms-sample" action="{{route('agency.storeDocuments')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{$user->id}}" id="">
                                            <input type="hidden" name="is_portfolio" value="1" id="">

                                            <div class="form-group">
                                                <label for="image">Name</label>
                                                <input type="text" required class="form-control" name="name">
                                            </div>

                                            <div class="form-group">
                                                <label for="image">Upload</label>
                                                <input type="file" accept="application/pdf" required class="form-control" name="images[]">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Upload</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>



                        <div class="profiletimeline mt-0">
                            <div class="sl-item">

                                <div class="sl-right">

                                    <div class="row mt-2">
                                        @foreach($portfolios as $doc)
                                        <div class="col-lg-4 col-md-6 mb-1" style="max-height: 108px;">
                                            <div class="card" style="height:100%;">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{$doc->name}}</h5>
                                                    <a href="{{asset($doc->image)}}" target="_blank" class="btn btn-primary">Download</a>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                            <hr>
                        </div>





                        <!-- Modal -->
                        <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div id="gallery1" class="gallery">

                                        @foreach($images as $image)
                                        <div class="gallery-item">
                                            <img src="{{asset($image->image)}}" class="img-fluid rounded" />
                                        </div>
                                        @endforeach


                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            $(document).ready(function() {

                                $('.gallery-image2').on('click', function() {
                                    $('#imageModal').modal('show');



                                    setTimeout(function() {
                                        $('.gallery').slick({
                                            // infinite: true,
                                            speed: 300,
                                            slidesToShow: 1,
                                            adaptiveHeight: true
                                        });
                                    }, 200); // Delay in mi


                                });

                                $('#imageModal').on('hidden.bs.modal', function() {
                                    // $('.gallery').slick('unslick');
                                });
                            });
                        </script>


                    </div>
                </div>



                <div class="tab-pane fade show active" id="last-month" role="tabpanel" aria-labelledby="pills-profile-tab">
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
                            {{$user->about}}
                        </p>
                        <div class="row mt-30">
                            <div class="col-sm-6">
                                <h4 class="">{{ __('Skill Set')}}</h4>
                            </div>
                            <div class="col-sm-6" style="text-align: right;">
                                <a href="#" data-toggle="modal" data-target="#skills"><i class="trash ik ik-plus"></i></a>
                            </div>



                            <!-- Modal -->
                            <div class="modal fade" id="skills" tabindex="-1" role="dialog" aria-labelledby="skills" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="myModalLabel">Add Skil Set</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <!-- Form inside the modal -->
                                            <form class="forms-sample" action="{{route('agency.storeSkills')}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="user_id" value="{{$user->id}}" id="">

                                                <div class="form-group">
                                                    <label for="skill_name">Skill Name</label>
                                                    <input type="text" required class="form-control" id="skill_name" name="skill_name">
                                                </div>

                                                <div class="form-group">
                                                    <label for="noOfDevelopers">No. of developers</label>
                                                    <input type="text" required class="form-control" id="noOfDevelopers" name="noOfDevelopers">
                                                </div>


                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>




                        </div>


                        <hr>
                        <?php
                        $colors = ['success', 'warning', 'danger', 'info'];
                        $count = 1;
                        foreach ($skills as $skill) {
                            $colorClass = $colors[$count % count($colors)]; // Get the color class based on the count
                        ?>

                            <div class="row mt-30 mb-2">
                                <div class="col-sm-6">
                                    <h6 class="">{{ __($skill->skill_name) }} <span class="pull-right">- {{$skill->noOfDevelopers}} Developer</span></h6>

                                </div>

                                <div class="col-sm-5" style="text-align:right">
                                    <div>

                                        <a href="#" data-toggle="modal" data-target="#skilledit_{{$skill->id}}"><i class="pencil ik ik-edit-2"></i></a>
                                    </div>
                                </div>
                                <div class="col-sm-1" style="text-align:right">
                                    <a href="#" data-toggle="modal" data-target="#skillsDeleteModal_{{$skill->id}}">
                                        <i class="trash ik ik-trash"></i>
                                    </a>
                                </div>

                                <!-- Delete Confirmation Modal -->
                                <div class="modal fade" id="skillsDeleteModal_{{$skill->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel_{{$skill->id}}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel_{{$skill->id}}">Confirmation</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to delete this item?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <a href="{{route('agency.deleteAgencySkill')}}?id={{$skill->id}}" type="button" class="btn btn-danger">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-<?php echo $colorClass; ?>" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                    <span class="sr-only">50% Complete</span>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="skilledit_{{$skill->id}}" tabindex="-1" role="dialog" aria-labelledby="skilleditLabel_{{$skill->id}}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="skilleditLabel_{{$skill->id}}">Update Skill Set</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <!-- Form inside the modal -->
                                            <form class="forms-sample" action="{{route('agency.updateSkills')}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="user_id" value="{{$user->id}}" id="">
                                                <input type="hidden" name="id" value="{{$skill->id}}" id="">
                                                <div class="form-group">
                                                    <label for="skill_name">Skill Name</label>
                                                    <input type="text" required class="form-control" value="{{$skill->skill_name}}" id="skill_name" name="skill_name">
                                                </div>

                                                <div class="form-group">
                                                    <label for="noOfDevelopers">No. of developers</label>
                                                    <input type="text" required class="form-control" id="noOfDevelopers" value="{{$skill->noOfDevelopers}}" name="noOfDevelopers">
                                                </div>


                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </form>
                                        </div>
                                    </div>
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
                            <textarea name="example-message" name="" disabled rows="5" class="form-control">{{$user->about}}</textarea>
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
                            <select name="example-message" disabled id="example-message" class="form-control">
                                <option @if($user->salary == 'Less then 100000') selected @endif>{{ __('Less then 100000') }}</option>
                                <option @if($user->salary == '1 lac to 2 lac') selected @endif>{{ __('1 lac to 2 lac') }}</option>
                                <option @if($user->salary == '2 lac to 3 lac') selected @endif>{{ __('2 lac to 3 lac') }}</option>
                                <option @if($user->salary == 'More then 3lac') selected @endif>{{ __('More then 3lac') }}</option>
                            </select>
                        </div>

                        <a href="{{url('/agency/profile/update')}}?id={{$user->id}}" class="btn btn-success" type="button">Update Profile</a>

                    </div>
                </div>

            </div>
        </div>


    </div>
</div>

</div>




<!-- push external js -->
@push('script')
<script src="{{ asset('plugins/select2/dist/js/select2.min.js') }}"></script>
<script src="{{ asset('plugins/summernote/dist/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
<script src="{{ asset('plugins/jquery.repeater/jquery.repeater.min.js') }}"></script>
<script src="{{ asset('plugins/mohithg-switchery/dist/switchery.min.js') }}"></script>

<script src="{{ asset('js/form-advanced.js') }}"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

@endpush
@endsection
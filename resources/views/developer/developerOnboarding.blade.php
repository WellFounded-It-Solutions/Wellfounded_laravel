@extends('developer.layout')
@section('title', $menu['menu'])
@section('content')


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

    <div class="col-xl-9 col-lg-9 col-md-9 m-auto">
        <div class="card">
            <div class="card-header">
                <h3>{{ __('Update Developer Profile') }}</h3>
            </div>
            <div class="card-body">
                <form class="forms-sample" action="{{ route('developer.developerOnboardingPost') }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <input type="hidden" value="{{$user->id}}" name="id">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName1">{{ __('Name') }}</label>
                                <input type="text" class="form-control" id="exampleInputName1" required name="name" value="{{ old('name', $user->name)  }}" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleSelectGender">{{ __('Gender') }}</label>
                                <select class="form-control" name="gender" required id="exampleSelectGender">
                                    <option {{ old('gender') == 'Male' ? 'selected' : '' }}>{{ __('Male') }}</option>
                                    <option {{ old('gender') == 'Female' ? 'selected' : '' }}>{{ __('Female') }}
                                    </option>
                                </select>
                            </div>
                        </div>

                    </div>
                    @if($user->added_by == 0)
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputMobile">{{ __('Mobile') }}</label>
                                <input type="number" class="form-control" required value="{{$user->mobile }}" name="mobile" placeholder="Mobile">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail3">{{ __('Email address') }}</label>
                                <input type="email" class="form-control" required value="{{ $user->email }}" readonly id="exampleInputEmail3" name="email">
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleEmployementType">{{ __('Employement Type') }}</label>
                                <select class="form-control" name="employementType" required id="exampleEmployementType">
                                    <option {{ $user->employementType == 'Freelancer' ? 'selected' : '' }}>
                                        {{ __('Freelancer') }}
                                    </option>
                                    <option {{ $user->employementType  == 'Full Time' ? 'selected' : '' }}>
                                        {{ __('Full Time') }}
                                    </option>
                                    <option {{$user->employementType == 'Part Time' ? 'selected' : '' }}>
                                        {{ __('Part Time') }}
                                    </option>
                                    <option {{ $user->employementType  == 'Contract Basic' ? 'selected' : '' }}>
                                        {{ __('Contract Basic') }}
                                    </option>
                                    <option {{ $user->employementType  == 'Other' ? 'selected' : '' }}>
                                        {{ __('Other') }}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleWorkingStatus">{{ __('Working Status') }}</label>
                                <select class="form-control" name="workingStatus" required id="exampleWorkingStatus">
                                    <option {{ $user->workingStatus  == 'Open To Work' ? 'selected' : '' }}>
                                        {{ __('Open To Work') }}
                                    </option>
                                    <option {{$user->workingStatus  == 'Hired' ? 'selected' : '' }}>{{ __('Hired') }}
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleEmployementType">{{ __('Ready To Contract Job') }}</label>
                                <select class="form-control" name="contractJob" required id="exampleEmployementType">
                                    <option {{ $user->contractJob == 'Yes' ? 'selected' : '' }}>{{ __('Yes') }}
                                    </option>
                                    <option {{ $user->contractJob== 'No' ? 'selected' : '' }}>{{ __('No') }}
                                    </option>

                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">{{ __('Skills') }} </label>
                                <select class="form-control select2" name="skills[]" required multiple="multiple">
                                    <?php $skills = explode(',', $user->skills); ?>
                                    @foreach (getSkills() as $row)
                                    <option value="{{ $row->name }}" @if(in_array($row->name, $skills))
                                        selected
                                        @endif
                                        >{{ $row->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">{{ __('Experience') }} </label>
                                <select class="form-control select2" required name="experience">
                                    <option {{$user->experience  == '0 - 1 Years' ? 'selected' : '' }}>{{ __('0 - 1 Years') }}</option>
                                    <option {{ $user->experience == '1 - 2 Years' ? 'selected' : '' }}>{{ __('1 - 2 Years') }}</option>
                                    <option {{ $user->experience == '2 - 3 Years' ? 'selected' : '' }}>{{ __('2 - 3 Years') }}</option>
                                    <option {{ $user->experience == '3 - 5 Years' ? 'selected' : '' }}>{{ __('3 - 5 Years') }}</option>
                                    <option {{ $user->experience == '5 - 7 Years' ? 'selected' : '' }}>{{ __('5 - 7 Years') }}</option>
                                    <option {{ $user->experience == '7 - 9 Years' ? 'selected' : '' }}>{{ __('7 - 9 Years') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputSalary">{{ __('Salary Expectation (Per Month)') }}</label>
                                <!-- <input type="text" name="" value="{{ old('salary') }}" required
                                        class="form-control" id="salary" placeholder="Salary (per month)"> -->
                                <select class="form-control select2" required name="salary">
                                    <option {{ $user->salary == 'Less then 100000' ? 'selected' : '' }}>{{ __('Less then 100000') }}</option>
                                    <option {{ $user->salary == '1 lac to 2 lac' ? 'selected' : '' }}>{{ __('1 lac to 2 lac') }}</option>
                                    <option {{ $user->salary == '2 lac to 3 lac' ? 'selected' : '' }}>{{ __('2 lac to 3 lac') }}</option>
                                    <option {{ $user->salary == 'More then 3lac' ? 'selected' : '' }}>{{ __('More then 3lac') }}</option>

                                </select>


                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">{{ __('Location') }} </label>
                                <select name="location" required class="form-control select2">
                                    <option {{ $user->location == 'India' ? 'selected' : '' }} value="India">India</option>
                                    <option {{ $user->location == 'USA' ? 'selected' : '' }} value="USA">USA</option>
                                    <option {{ $user->location == 'France' ? 'selected' : '' }} value="France">France</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputSalary">{{ __('Country') }}</label>
                                <input type="text" name="country" value="{{ $user->country }}" required class="form-control" id="exampleInputSalary" placeholder="Country">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>{{ __('Resume upload') }}</label>
                        <input accept=".pdf, .doc, .docx" type="file" name="resume" class="file-upload-default">
                        @error('resume')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload document">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">{{ __('Upload') }}</button>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>{{ __('Portfolio upload') }}</label>
                        <input accept=".pdf, .doc, .docx" type="file" name="portfolio" class="file-upload-default">
                        @error('portfolio')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload document">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">{{ __('Upload') }}</button>
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>{{ __('Profile Pic') }}</label>
                        <input accept="image/png, image/gif, image/jpeg" type="file" name="profilePic" class="file-upload-default">
                        @error('profilePic')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">{{ __('Upload') }}</button>
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleTextarea1">{{ __('About Yourself') }}</label>
                        <textarea class="form-control" required name="remark" id="exampleTextarea1" rows="4">{{ $user->remark }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleTextarea1">{{ __('Headline') }}</label>
                        <textarea class="form-control" required name="headline" id="headline" rows="4">{{ $user->headline }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">{{ __('Submit') }}</button>
                    <a href="{{route('admin.developerProfile', $user->id)}}" type="button" class="btn btn-light">{{ __('Cancel') }}</a>
                </form>
            </div>
        </div>
    </div>
</div>
@push('script')
<script src="{{ asset('js/form-components.js') }}"></script>
@endpush
@endsection
@extends('agency.layout')
@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-xl-9 col-lg-9 col-md-9 m-auto">
            <div class="card">
                <div class="card-header">
                    <h3>{{ __('Agency Onboarding Form') }}</h3>
                </div>
                <div class="card-body">
                    <form class="forms-sample" action="{{ route('agency.onboardingPost') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputName1">{{ __('Full Name') }}</label>
                                    <input type="text" class="form-control" id="exampleInputName1" required
                                        name="name" value="{{ auth()->user()->name }}" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputMobile">{{ __('Mobile') }}</label>
                                    <input type="number" class="form-control" required value="{{ auth()->user()->mobile }}"
                                        name="mobile" id="exampleInputMobile" placeholder="Mobile">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail3">{{ __('Email') }}</label>
                                    <input type="email" class="form-control" readonly required
                                        value="{{ auth()->user()->email }}" name="email" id="exampleInputEmail3"
                                        placeholder="Mobile">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail3">{{ __('Website') }}</label>
                                    <input type="text" class="form-control" required
                                        value="{{ old('website', auth()->user()->website) }}" name="website"
                                        id="exampleInputEmail3" placeholder="Website">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleSelectGender">{{ __('Designation') }}</label>
                                    <select class="form-control" required name="designation" id="exampleSelectGender">
                                        <option value="">{{ __('Select Designation') }}</option>
                                        <option {{ old('designation') == 'Founder' ? 'selected' : '' }}>
                                            {{ __('Founder') }}</option>
                                        <option {{ old('designation') == 'Chief Executive Officer' ? 'selected' : '' }}>
                                            {{ __('Chief Executive Officer') }}</option>
                                        <option {{ old('designation') == 'Chief Technology Officer' ? 'selected' : '' }}>
                                            {{ __('Chief Technology Officer') }}</option>
                                        <option {{ old('designation') == 'Chief Technology Officer' ? 'selected' : '' }}>
                                            {{ __('Chief Technology Officer') }}</option>
                                        <option {{ old('designation') == 'Business Development' ? 'selected' : '' }}>
                                            {{ __('Business Development') }}</option>
                                        <option {{ old('designation') == 'Sales' ? 'selected' : '' }}>{{ __('Sales ') }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleEmployementType">{{ __('Organization size') }}</label>
                                    <select class="form-control" required name="organizationSize">
                                        <option value="">{{ __('Select Size') }}</option>
                                        <option {{ old('organizationSize') == '0 - 10' ? 'selected' : '' }}>
                                            {{ __('0 - 10') }}</option>
                                        <option {{ old('organizationSize') == '11 - 50' ? 'selected' : '' }}>
                                            {{ __('11 - 50') }}</option>
                                        <option {{ old('organizationSize') == '51 - 200' ? 'selected' : '' }}>
                                            {{ __('51 - 200') }}</option>
                                        <option {{ old('organizationSize') == '201 - 500' ? 'selected' : '' }}>
                                            {{ __('201 - 500') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleWorkingStatus">{{ __('Organization type') }}</label>
                                    <select class="form-control" required name="organizationType" id="exampleWorkingStatus">
                                        <option value="">{{ __('Select Type') }}</option>
                                        <option {{ old('organizationType') == 'Self Employed' ? 'selected' : '' }}>
                                            {{ __('Self Employed') }}</option>
                                        <option {{ old('organizationType') == 'Sole Proprietorship' ? 'selected' : '' }}>
                                            {{ __('Sole Proprietorship') }}</option>
                                        <option {{ old('organizationType') == 'Privately Held' ? 'selected' : '' }}>
                                            {{ __('Privately Held') }}</option>
                                        <option {{ old('organizationType') == 'Partnership' ? 'selected' : '' }}>
                                            {{ __('Partnership') }}</option>
                                        <option {{ old('organizationType') == 'One Person Company' ? 'selected' : '' }}>
                                            {{ __('One Person Company') }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="exampleWorkingStatus">{{ __('Linkedin') }}</label>
                                <div class="input-group input-group-primary">

                                    <span class="input-group-prepend"><label class="input-group-text"><i
                                                class="ik ik-linkedin"></i></label></span>
                                    <input type="text" class="form-control" name="linkedin"
                                        value="{{ old('linkedin') }}" placeholder="https://linkedin.com/company">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleWorkingStatus">{{ __('Instagram') }}</label>
                                <div class="input-group input-group-primary">

                                    <span class="input-group-prepend"><label class="input-group-text"><i
                                                class="ik ik-instagram"></i></label></span>
                                    <input type="text" class="form-control" name="instagram"
                                        value="{{ old('instagram') }}" placeholder="https://instagram.com">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="exampleWorkingStatus">{{ __('Facebook') }}</label>
                                <div class="input-group input-group-primary">

                                    <span class="input-group-prepend"><label class="input-group-text"><i
                                                class="ik ik-facebook"></i></label></span>
                                    <input type="text" class="form-control" name="facebook"
                                        value="{{ old('facebook') }}" placeholder="input-group-primary">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleWorkingStatus">{{ __('Skype') }}</label>
                                <div class="input-group input-group-primary">

                                    <span class="input-group-prepend"><label class="input-group-text"><i
                                                class="ik ik-video"></i></label></span>
                                    <input type="text" class="form-control" name="skype"
                                        value="{{ old('skype') }}" placeholder="input-group-primary">
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">{{ __('Location') }} </label>
                                    <select name="location" required class="form-control select2">
                                        <option value="India">India</option>
                                        <option value="USA">USA</option>
                                        <option value="France">France</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputSalary">{{ __('Country') }}</label>
                                    <input type="text" name="country" class="form-control"
                                        value=" {{ old('country') }}" id="exampleInputSalary" placeholder="Country">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>{{ __('Upload Logo') }}</label>
                            <input type="file" accept="image/png, image/gif, image/jpeg" name="logo" class="file-upload-default">
                            @error('logo')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled
                                    placeholder="Upload Image">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary"
                                        type="button">{{ __('Upload') }}</button>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>{{ __('Upload Legal Document') }}</label>
                            <input type="file" accept=".pdf, .doc, .docx" name="document" class="file-upload-default">
                            @error('document')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled
                                    placeholder="Upload document">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary"
                                        type="button">{{ __('Upload') }}</button>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>{{ __('GST Upload') }}</label>
                            <input type="file" accept=".pdf, .doc, .docx" name="document" class="file-upload-default">
                            @error('gst')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled
                                    placeholder="Upload document">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary"
                                        type="button">{{ __('Upload') }}</button>
                                </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleTextarea1">{{ __('Company About') }}</label>
                            <textarea class="form-control" id="exampleTextarea1" name="about" rows="4"> {{ old('about') }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">{{ __('Submit') }}</button>
                        <button type="reset" class="btn btn-light">{{ __('Reset') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('script')
        <script src="{{ asset('js/form-components.js') }}"></script>
    @endpush
@endsection

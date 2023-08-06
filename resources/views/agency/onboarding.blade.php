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
                <form class="forms-sample" action="{{ route('agency.onboardingPost') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName1">{{ __('Full Name') }}</label>
                                <input type="text" class="form-control" id="exampleInputName1" required name="name" value="{{ auth()->user()->name }}" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputMobile">{{ __('Mobile') }}</label>
                                <input type="number" class="form-control" required value="{{ auth()->user()->mobile }}" name="mobile" id="exampleInputMobile" placeholder="Mobile">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail3">{{ __('Email') }}</label>
                                <input type="email" class="form-control" readonly required value="{{ auth()->user()->email }}" name="email" id="exampleInputEmail3" placeholder="Mobile">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail3">{{ __('Website') }}</label>
                                <input type="text" class="form-control" required value="{{ old('website', auth()->user()->website) }}" name="website" id="exampleInputEmail3" placeholder="Website">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleSelectGender">{{ __('Designation') }}</label>
                                <select class="form-control" required name="designation" id="exampleSelectGender">
                                    <option value="">{{ __('Select Designation') }}</option>
                                    <option {{ old('designation') == 'Founder' ? 'selected' : '' }}>
                                        {{ __('Founder') }}
                                    </option>
                                    <option {{ old('designation') == 'Chief Executive Officer' ? 'selected' : '' }}>
                                        {{ __('Chief Executive Officer') }}
                                    </option>
                                    <option {{ old('designation') == 'Chief Technology Officer' ? 'selected' : '' }}>
                                        {{ __('Chief Technology Officer') }}
                                    </option>
                                    <option {{ old('designation') == 'Chief Technology Officer' ? 'selected' : '' }}>
                                        {{ __('Chief Technology Officer') }}
                                    </option>
                                    <option {{ old('designation') == 'Business Development' ? 'selected' : '' }}>
                                        {{ __('Business Development') }}
                                    </option>
                                    <option {{ old('designation') == 'Sales' ? 'selected' : '' }}>{{ __('Sales ') }}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="organisationName">{{ __('Organization Name') }}</label>
                                <input type="text" class="form-control" required value="{{ old('organisationName') }}" name="organisationName" id="organisationName" placeholder="Organisation Name ">
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
                                        {{ __('0 - 10') }}
                                    </option>
                                    <option {{ old('organizationSize') == '11 - 50' ? 'selected' : '' }}>
                                        {{ __('11 - 50') }}
                                    </option>
                                    <option {{ old('organizationSize') == '51 - 200' ? 'selected' : '' }}>
                                        {{ __('51 - 200') }}
                                    </option>
                                    <option {{ old('organizationSize') == '201 - 500' ? 'selected' : '' }}>
                                        {{ __('201 - 500') }}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleWorkingStatus">{{ __('Organization type') }}</label>
                                <select class="form-control" required name="organizationType" id="exampleWorkingStatus">
                                    <option value="">{{ __('Select Type') }}</option>
                                    <option {{ old('organizationType') == 'Self Employed' ? 'selected' : '' }}>
                                        {{ __('Self Employed') }}
                                    </option>
                                    <option {{ old('organizationType') == 'Sole Proprietorship' ? 'selected' : '' }}>
                                        {{ __('Sole Proprietorship') }}
                                    </option>
                                    <option {{ old('organizationType') == 'Privately Held' ? 'selected' : '' }}>
                                        {{ __('Privately Held') }}
                                    </option>
                                    <option {{ old('organizationType') == 'Partnership' ? 'selected' : '' }}>
                                        {{ __('Partnership') }}
                                    </option>
                                    <option {{ old('organizationType') == 'One Person Company' ? 'selected' : '' }}>
                                        {{ __('One Person Company') }}
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="exampleWorkingStatus">{{ __('Linkedin') }}</label>
                            <div class="input-group input-group-primary">

                                <span class="input-group-prepend"><label class="input-group-text"><i class="ik ik-linkedin"></i></label></span>
                                <input type="text" class="form-control" name="linkedin" value="{{ old('linkedin') }}" placeholder="https://linkedin.com/company">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="exampleWorkingStatus">{{ __('Instagram') }}</label>
                            <div class="input-group input-group-primary">

                                <span class="input-group-prepend"><label class="input-group-text"><i class="ik ik-instagram"></i></label></span>
                                <input type="text" class="form-control" name="instagram" value="{{ old('instagram') }}" placeholder="https://instagram.com">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="exampleWorkingStatus">{{ __('Facebook') }}</label>
                            <div class="input-group input-group-primary">

                                <span class="input-group-prepend"><label class="input-group-text"><i class="ik ik-facebook"></i></label></span>
                                <input type="text" class="form-control" name="facebook" value="{{ old('facebook') }}" placeholder="input-group-primary">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="exampleWorkingStatus">{{ __('Skype') }}</label>
                            <div class="input-group input-group-primary">

                                <span class="input-group-prepend"><label class="input-group-text"><i class="ik ik-video"></i></label></span>
                                <input type="text" class="form-control" name="skype" value="{{ old('skype') }}" placeholder="input-group-primary">
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">{{ __('Location') }} </label>
                                <select name="location" id="location" required class="form-control select2">

                                    <option value="DZ"> Algeria</option>
                                    <option value="AS"> American Samoa</option>
                                    <option value="AD"> Andorra</option>
                                    <option value="AR"> Argentina</option>
                                    <option value="AU"> Australia</option>
                                    <option value="AT"> Austria</option>
                                    <option value="AZ"> Azerbaijan</option>
                                    <option value="BD"> Bangladesh</option>
                                    <option value="BY"> Belarus</option>
                                    <option value="BE"> Belgium</option>
                                    <option value="BM"> Bermuda</option>
                                    <option value="BR"> Brazil</option>
                                    <option value="BG"> Bulgaria</option>
                                    <option value="CA"> Canada</option>
                                    <option value="CL"> Chile</option>
                                    <option value="CO"> Colombia</option>
                                    <option value="CR"> Costa Rica</option>
                                    <option value="HR"> Croatia</option>
                                    <option value="CY"> Cyprus</option>
                                    <option value="CZ"> Czechia</option>
                                    <option value="DK"> Denmark</option>
                                    <option value="DO"> Dominican Republic</option>
                                    <option value="EE"> Estonia</option>
                                    <option value="FO"> Faroe Islands</option>
                                    <option value="FI"> Finland</option>
                                    <option value="FR"> France</option>
                                    <option value="GF"> French Guiana</option>
                                    <option value="DE"> Germany</option>
                                    <option value="GL"> Greenland</option>
                                    <option value="GP"> Guadeloupe</option>
                                    <option value="GU"> Guam</option>
                                    <option value="GT"> Guatemala</option>
                                    <option value="GG"> Guernsey</option>
                                    <option value="HT"> Haiti</option>
                                    <option value="HU"> Hungary</option>
                                    <option value="IS"> Iceland</option>
                                    <option value="IN"> India</option>
                                    <option value="IE"> Ireland</option>
                                    <option value="IM"> Isle of Man</option>
                                    <option value="IT"> Italy</option>
                                    <option value="JP"> Japan</option>
                                    <option value="JE"> Jersey</option>
                                    <option value="LV"> Latvia</option>
                                    <option value="LI"> Liechtenstein</option>
                                    <option value="LT"> Lithuania</option>
                                    <option value="LU"> Luxembourg</option>
                                    <option value="MW"> Malawi</option>
                                    <option value="MY"> Malaysia</option>
                                    <option value="MT"> Malta</option>
                                    <option value="MH"> Marshall Islands</option>
                                    <option value="MQ"> Martinique</option>
                                    <option value="YT"> Mayotte</option>
                                    <option value="MX"> Mexico</option>
                                    <option value="FM"> Micronesia</option>
                                    <option value="MD"> Moldova</option>
                                    <option value="MC"> Monaco</option>
                                    <option value="MA"> Morocco</option>
                                    <option value="NL"> Netherlands</option>
                                    <option value="NC"> New Caledonia</option>
                                    <option value="NZ"> New Zealand</option>
                                    <option value="MK"> North Macedonia</option>
                                    <option value="MP"> Northern Mariana Islands</option>
                                    <option value="NO"> Norway</option>
                                    <option value="PK"> Pakistan</option>
                                    <option value="PW"> Palau</option>
                                    <option value="PE"> Peru</option>
                                    <option value="PH"> Philippines</option>
                                    <option value="PL"> Poland</option>
                                    <option value="PT"> Portugal</option>
                                    <option value="PR"> Puerto Rico</option>
                                    <option value="RO"> Romania</option>
                                    <option value="RU"> Russia</option>
                                    <option value="RE"> Réunion</option>
                                    <option value="PM"> Saint Pierre and Miquelon</option>
                                    <option value="SM"> San Marino</option>
                                    <option value="RS"> Serbia</option>
                                    <option value="SG"> Singapore</option>
                                    <option value="SK"> Slovakia</option>
                                    <option value="SI"> Slovenia</option>
                                    <option value="ZA"> South Africa</option>
                                    <option value="KR"> South Korea</option>
                                    <option value="ES"> Spain</option>
                                    <option value="LK"> Sri Lanka</option>
                                    <option value="SJ"> Svalbard and Jan Mayen</option>
                                    <option value="SE"> Sweden</option>
                                    <option value="CH"> Switzerland</option>
                                    <option value="TH"> Thailand</option>
                                    <option value="TR"> Turkey</option>
                                    <option value="VI"> U.S. Virgin Islands</option>
                                    <option value="UA"> Ukraine</option>
                                    <option value="GB"> United Kingdom</option>
                                    <option value="US"> United States</option>
                                    <option value="UY"> Uruguay</option>
                                    <option value="VA"> Vatican City</option>
                                    <option value="WF"> Wallis and Futuna</option>
                                    <option value="AX"> Åland</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pinCode">{{ __('Pin Code') }}</label>
                                <input type="text" name="pinCode" class="form-control" value=" {{ old('pinCode') }}" id="pinCode" placeholder="Enter Pin Code">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="country">{{ __('State') }}</label>
                                <input type="text" name="country" class="form-control" value=" {{ old('country') }}" id="country" placeholder="State">
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
                            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">{{ __('Upload') }}</button>
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
                            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload document">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">{{ __('Upload') }}</button>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>{{ __('GST Upload') }}</label>
                        <input type="file" accept=".pdf, .doc, .docx" name="gst" class="file-upload-default">
                        @error('gst')
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
                        <label for="exampleTextarea1">{{ __('Company About') }}</label>
                        <textarea required class="form-control" id="exampleTextarea1" name="about" rows="4"> {{ old('about') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">{{ __('Submit') }}</button>
                    <button type="reset" class="btn btn-light">{{ __('Reset') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        function getState() {
            var pinCode = $('#pinCode').val();
            var countryCode = $('#location').val();

            if (pinCode != "" && countryCode != "") {
                $.ajax({
                    url: 'http://api.geonames.org/postalCodeSearchJSON',
                    method: 'GET',
                    data: {
                        postalcode: pinCode,
                        country: countryCode,
                        username: 'vaibhav.singh2207'
                    },
                    success: function(response) {
                        if (response.postalCodes.length > 0) {
                            $('#country').val(response.postalCodes[0].adminName1);
                        } else {
                            $('#country').val('');
                        }
                    },
                    error: function(error) {
                        // Handle error here
                    }
                });
            } else {
                $('#country').val('');
            }


        }

        $('#pinCode').on('keyup', function() {
            getState();
        });

        $('#location').on('change', function() {
            getState();
        });

    });
</script>

@push('script')
<script src="{{ asset('js/form-components.js') }}"></script>
@endpush
@endsection
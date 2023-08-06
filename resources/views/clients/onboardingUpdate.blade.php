@extends('clients.layout')
@section('title', $menu['menu'])

@section('content')
<div class="row">
    <div class="col-xl-9 col-lg-9 col-md-9 m-auto">
        <div class="card">
            <div class="card-header">
                <h3>{{ __('Update Client') }}</h3>
            </div>
            <div class="card-body">
                <form class="forms-sample" action="{{ route('client.clientOnboardingPost') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{$user->id}}" name="id">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName1">{{ __('Full Name') }}</label>
                                <input type="text" class="form-control" id="exampleInputName1" required name="name" value="{{ $user->name }}" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputMobile">{{ __('Mobile') }}</label>
                                <input type="number" class="form-control" required value="{{ $user->mobile }}" name="mobile" id="exampleInputMobile" placeholder="Mobile">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail3">{{ __('Email') }}</label>
                                <input type="email" class="form-control" readonly required value="{{ $user->email }}" name="email" id="exampleInputEmail3" placeholder="Mobile">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail3">{{ __('Website') }}</label>
                                <input type="text" class="form-control" required value="{{ $user->website }}" name="website" id="exampleInputEmail3" placeholder="Website">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleSelectGender">{{ __('Designation') }}</label>
                                <select class="form-control" required name="designation" id="exampleSelectGender">
                                    <option value="">{{ __('Select Designation') }}</option>
                                    <option {{ $user['designation'] == 'Founder' ? 'selected' : '' }}>
                                        {{ __('Founder') }}
                                    </option>
                                    <option {{ $user['designation'] == 'Chief Executive Officer' ? 'selected' : '' }}>
                                        {{ __('Chief Executive Officer') }}
                                    </option>
                                    <option {{ $user['designation'] == 'Chief Technology Officer' ? 'selected' : '' }}>
                                        {{ __('Chief Technology Officer') }}
                                    </option>
                                    <option {{ $user['designation'] == 'Chief Technology Officer' ? 'selected' : '' }}>
                                        {{ __('Chief Technology Officer') }}
                                    </option>
                                    <option {{$user['designation'] == 'Business Development' ? 'selected' : '' }}>
                                        {{ __('Business Development') }}
                                    </option>
                                    <option {{ $user['designation'] == 'Sales' ? 'selected' : '' }}>{{ __('Sales ') }}
                                    </option>
                                    <option value="Freelancer" {{ $user['designation'] == 'Freelancer' ? 'selected' : '' }}>Freelancer</option>
                                    <option value="Consultant" {{ $user['designation'] == 'Consultant' ? 'selected' : '' }}>Consultant</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="organisationName">{{ __('Organization Name') }}</label>
                                <input type="text" class="form-control" required value="{{ old('organisationName',$user->organisationName) }}" name="organisationName" id="organisationName" placeholder="Organisation Name ">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleEmployementType">{{ __('Organization size') }}</label>
                                <select class="form-control" required name="organizationSize">
                                    <option value="">{{ __('Select Size') }}</option>
                                    <option {{ $user['organizationSize'] == '0 - 10' ? 'selected' : '' }}>
                                        {{ __('0 - 10') }}
                                    </option>
                                    <option {{ $user['organizationSize'] == '11 - 50' ? 'selected' : '' }}>
                                        {{ __('11 - 50') }}
                                    </option>
                                    <option {{ $user['organizationSize'] == '51 - 200' ? 'selected' : '' }}>
                                        {{ __('51 - 200') }}
                                    </option>
                                    <option {{ $user['organizationSize'] == '201 - 500' ? 'selected' : '' }}>
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
                                    <option {{ $user['organizationType'] == 'Self Employed' ? 'selected' : '' }}>
                                        {{ __('Self Employed') }}
                                    </option>
                                    <option {{ $user['organizationType'] == 'Sole Proprietorship' ? 'selected' : '' }}>
                                        {{ __('Sole Proprietorship') }}
                                    </option>
                                    <option {{ $user['organizationType'] == 'Privately Held' ? 'selected' : '' }}>
                                        {{ __('Privately Held') }}
                                    </option>
                                    <option {{ $user['organizationType'] == 'Partnership' ? 'selected' : '' }}>
                                        {{ __('Partnership') }}
                                    </option>
                                    <option {{ $user['organizationType'] == 'One Person Company' ? 'selected' : '' }}>
                                        {{ __('One Person Company') }}
                                    </option>
                                    <option value="Freelancing" {{ $user['organizationType'] == 'Freelancing' ? 'selected' : '' }}>Freelancing</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="exampleWorkingStatus">{{ __('Linkedin') }}</label>
                            <div class="input-group input-group-primary">

                                <span class="input-group-prepend"><label class="input-group-text"><i class="ik ik-linkedin"></i></label></span>
                                <input type="text" class="form-control" name="linkedin" value="{{ $user['linkedin'] }}" placeholder="https://linkedin.com/company">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="exampleWorkingStatus">{{ __('Instagram') }}</label>
                            <div class="input-group input-group-primary">

                                <span class="input-group-prepend"><label class="input-group-text"><i class="ik ik-instagram"></i></label></span>
                                <input type="text" class="form-control" name="instagram" value="{{ $user['instagram'] }}" placeholder="https://instagram.com">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="exampleWorkingStatus">{{ __('Facebook') }}</label>
                            <div class="input-group input-group-primary">

                                <span class="input-group-prepend"><label class="input-group-text"><i class="ik ik-facebook"></i></label></span>
                                <input type="text" class="form-control" name="facebook" value="{{ old('facebook', $user['facebook']) }}" placeholder="input-group-primary">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="exampleWorkingStatus">{{ __('Skype') }}</label>
                            <div class="input-group input-group-primary">

                                <span class="input-group-prepend"><label class="input-group-text"><i class="ik ik-video"></i></label></span>
                                <input type="text" class="form-control" name="skype" value="{{ old('skype', $user['skype']) }}" placeholder="input-group-primary">
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">{{ __('Location') }} </label>
                                <select name="location" id="location" required class="form-control select2">
                                    <option {{ $user['location'] == 'DZ' ? 'selected' : '' }} value="DZ">Algeria</option>
                                    <option {{ $user['location'] == 'AS' ? 'selected' : '' }} value="AS">American Samoa</option>
                                    <option {{ $user['location'] == 'AD' ? 'selected' : '' }} value="AD">Andorra</option>
                                    <option {{ $user['location'] == 'AR' ? 'selected' : '' }} value="AR">Argentina</option>
                                    <option {{ $user['location'] == 'AU' ? 'selected' : '' }} value="AU">Australia</option>
                                    <option {{ $user['location'] == 'AT' ? 'selected' : '' }} value="AT">Austria</option>
                                    <option {{ $user['location'] == 'AZ' ? 'selected' : '' }} value="AZ">Azerbaijan</option>
                                    <option {{ $user['location'] == 'BD' ? 'selected' : '' }} value="BD">Bangladesh</option>
                                    <option {{ $user['location'] == 'BY' ? 'selected' : '' }} value="BY">Belarus</option>
                                    <option {{ $user['location'] == 'BE' ? 'selected' : '' }} value="BE">Belgium</option>
                                    <option {{ $user['location'] == 'BM' ? 'selected' : '' }} value="BM">Bermuda</option>
                                    <option {{ $user['location'] == 'BR' ? 'selected' : '' }} value="BR">Brazil</option>
                                    <option {{ $user['location'] == 'BG' ? 'selected' : '' }} value="BG">Bulgaria</option>
                                    <option {{ $user['location'] == 'CA' ? 'selected' : '' }} value="CA">Canada</option>
                                    <option {{ $user['location'] == 'CL' ? 'selected' : '' }} value="CL">Chile</option>
                                    <option {{ $user['location'] == 'CO' ? 'selected' : '' }} value="CO">Colombia</option>
                                    <option {{ $user['location'] == 'CR' ? 'selected' : '' }} value="CR">Costa Rica</option>
                                    <option {{ $user['location'] == 'HR' ? 'selected' : '' }} value="HR">Croatia</option>
                                    <option {{ $user['location'] == 'CY' ? 'selected' : '' }} value="CY">Cyprus</option>
                                    <option {{ $user['location'] == 'CZ' ? 'selected' : '' }} value="CZ">Czechia</option>
                                    <option {{ $user['location'] == 'DK' ? 'selected' : '' }} value="DK">Denmark</option>
                                    <option {{ $user['location'] == 'DO' ? 'selected' : '' }} value="DO">Dominican Republic</option>
                                    <option {{ $user['location'] == 'EE' ? 'selected' : '' }} value="EE">Estonia</option>
                                    <option {{ $user['location'] == 'FO' ? 'selected' : '' }} value="FO">Faroe Islands</option>
                                    <option {{ $user['location'] == 'FI' ? 'selected' : '' }} value="FI">Finland</option>
                                    <option {{ $user['location'] == 'FR' ? 'selected' : '' }} value="FR">France</option>
                                    <option {{ $user['location'] == 'GF' ? 'selected' : '' }} value="GF">French Guiana</option>
                                    <option {{ $user['location'] == 'DE' ? 'selected' : '' }} value="DE">Germany</option>
                                    <option {{ $user['location'] == 'GL' ? 'selected' : '' }} value="GL">Greenland</option>
                                    <option {{ $user['location'] == 'GP' ? 'selected' : '' }} value="GP">Guadeloupe</option>
                                    <option {{ $user['location'] == 'GU' ? 'selected' : '' }} value="GU">Guam</option>
                                    <option {{ $user['location'] == 'GT' ? 'selected' : '' }} value="GT">Guatemala</option>
                                    <option {{ $user['location'] == 'GG' ? 'selected' : '' }} value="GG">Guernsey</option>
                                    <option {{ $user['location'] == 'HT' ? 'selected' : '' }} value="HT">Haiti</option>
                                    <option {{ $user['location'] == 'HU' ? 'selected' : '' }} value="HU">Hungary</option>
                                    <option {{ $user['location'] == 'IS' ? 'selected' : '' }} value="IS">Iceland</option>
                                    <option {{ $user['location'] == 'IN' ? 'selected' : '' }} value="IN">India</option>
                                    <option {{ $user['location'] == 'IE' ? 'selected' : '' }} value="IE">Ireland</option>
                                    <option {{ $user['location'] == 'IM' ? 'selected' : '' }} value="IM">Isle of Man</option>
                                    <option {{ $user['location'] == 'IT' ? 'selected' : '' }} value="IT">Italy</option>
                                    <option {{ $user['location'] == 'JP' ? 'selected' : '' }} value="JP">Japan</option>
                                    <option {{ $user['location'] == 'JE' ? 'selected' : '' }} value="JE">Jersey</option>
                                    <option {{ $user['location'] == 'LV' ? 'selected' : '' }} value="LV">Latvia</option>
                                    <option {{ $user['location'] == 'LI' ? 'selected' : '' }} value="LI">Liechtenstein</option>
                                    <option {{ $user['location'] == 'LT' ? 'selected' : '' }} value="LT">Lithuania</option>
                                    <option {{ $user['location'] == 'LU' ? 'selected' : '' }} value="LU">Luxembourg</option>
                                    <option {{ $user['location'] == 'MW' ? 'selected' : '' }} value="MW">Malawi</option>
                                    <option {{ $user['location'] == 'MY' ? 'selected' : '' }} value="MY">Malaysia</option>
                                    <option {{ $user['location'] == 'MT' ? 'selected' : '' }} value="MT">Malta</option>
                                    <option {{ $user['location'] == 'MH' ? 'selected' : '' }} value="MH">Marshall Islands</option>
                                    <option {{ $user['location'] == 'MQ' ? 'selected' : '' }} value="MQ">Martinique</option>
                                    <option {{ $user['location'] == 'YT' ? 'selected' : '' }} value="YT">Mayotte</option>
                                    <option {{ $user['location'] == 'MX' ? 'selected' : '' }} value="MX">Mexico</option>
                                    <option {{ $user['location'] == 'FM' ? 'selected' : '' }} value="FM">Micronesia</option>
                                    <option {{ $user['location'] == 'MD' ? 'selected' : '' }} value="MD">Moldova</option>
                                    <option {{ $user['location'] == 'MC' ? 'selected' : '' }} value="MC">Monaco</option>
                                    <option {{ $user['location'] == 'MA' ? 'selected' : '' }} value="MA">Morocco</option>
                                    <option {{ $user['location'] == 'NL' ? 'selected' : '' }} value="NL">Netherlands</option>
                                    <option {{ $user['location'] == 'NC' ? 'selected' : '' }} value="NC">New Caledonia</option>
                                    <option {{ $user['location'] == 'NZ' ? 'selected' : '' }} value="NZ">New Zealand</option>
                                    <option {{ $user['location'] == 'MK' ? 'selected' : '' }} value="MK">North Macedonia</option>
                                    <option {{ $user['location'] == 'MP' ? 'selected' : '' }} value="MP">Northern Mariana Islands</option>
                                    <option {{ $user['location'] == 'NO' ? 'selected' : '' }} value="NO">Norway</option>
                                    <option {{ $user['location'] == 'PK' ? 'selected' : '' }} value="PK">Pakistan</option>
                                    <option {{ $user['location'] == 'PW' ? 'selected' : '' }} value="PW">Palau</option>
                                    <option {{ $user['location'] == 'PE' ? 'selected' : '' }} value="PE">Peru</option>
                                    <option {{ $user['location'] == 'PH' ? 'selected' : '' }} value="PH">Philippines</option>
                                    <option {{ $user['location'] == 'PL' ? 'selected' : '' }} value="PL">Poland</option>
                                    <option {{ $user['location'] == 'PT' ? 'selected' : '' }} value="PT">Portugal</option>
                                    <option {{ $user['location'] == 'PR' ? 'selected' : '' }} value="PR">Puerto Rico</option>
                                    <option {{ $user['location'] == 'RO' ? 'selected' : '' }} value="RO">Romania</option>
                                    <option {{ $user['location'] == 'RU' ? 'selected' : '' }} value="RU">Russia</option>
                                    <option {{ $user['location'] == 'RE' ? 'selected' : '' }} value="RE">Réunion</option>
                                    <option {{ $user['location'] == 'PM' ? 'selected' : '' }} value="PM">Saint Pierre and Miquelon</option>
                                    <option {{ $user['location'] == 'SM' ? 'selected' : '' }} value="SM">San Marino</option>
                                    <option {{ $user['location'] == 'RS' ? 'selected' : '' }} value="RS">Serbia</option>
                                    <option {{ $user['location'] == 'SG' ? 'selected' : '' }} value="SG">Singapore</option>
                                    <option {{ $user['location'] == 'SK' ? 'selected' : '' }} value="SK">Slovakia</option>
                                    <option {{ $user['location'] == 'SI' ? 'selected' : '' }} value="SI">Slovenia</option>
                                    <option {{ $user['location'] == 'ZA' ? 'selected' : '' }} value="ZA">South Africa</option>
                                    <option {{ $user['location'] == 'KR' ? 'selected' : '' }} value="KR">South Korea</option>
                                    <option {{ $user['location'] == 'ES' ? 'selected' : '' }} value="ES">Spain</option>
                                    <option {{ $user['location'] == 'LK' ? 'selected' : '' }} value="LK">Sri Lanka</option>
                                    <option {{ $user['location'] == 'SJ' ? 'selected' : '' }} value="SJ">Svalbard and Jan Mayen</option>
                                    <option {{ $user['location'] == 'SE' ? 'selected' : '' }} value="SE">Sweden</option>
                                    <option {{ $user['location'] == 'CH' ? 'selected' : '' }} value="CH">Switzerland</option>
                                    <option {{ $user['location'] == 'TH' ? 'selected' : '' }} value="TH">Thailand</option>
                                    <option {{ $user['location'] == 'TR' ? 'selected' : '' }} value="TR">Turkey</option>
                                    <option {{ $user['location'] == 'VI' ? 'selected' : '' }} value="VI">U.S. Virgin Islands</option>
                                    <option {{ $user['location'] == 'UA' ? 'selected' : '' }} value="UA">Ukraine</option>
                                    <option {{ $user['location'] == 'GB' ? 'selected' : '' }} value="GB">United Kingdom</option>
                                    <option {{ $user['location'] == 'US' ? 'selected' : '' }} value="US">United States</option>
                                    <option {{ $user['location'] == 'UY' ? 'selected' : '' }} value="UY">Uruguay</option>
                                    <option {{ $user['location'] == 'VA' ? 'selected' : '' }} value="VA">Vatican City</option>
                                    <option {{ $user['location'] == 'WF' ? 'selected' : '' }} value="WF">Wallis and Futuna</option>
                                    <option {{ $user['location'] == 'AX' ? 'selected' : '' }} value="AX">Åland</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pinCode">{{ __('Pin Code') }}</label>
                                <input type="text" name="pinCode" class="form-control" value=" {{ old('pinCode', $user['pinCode']) }}" id="pinCode" placeholder="Enter Pin Code">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="country">{{ __('State') }}</label>
                                <input type="text" name="country" class="form-control" value=" {{ old('country', $user['country']) }}" id="country" placeholder="State">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>{{ __('Upload Logo') }}</label>
                        <input type="file" name="logo" accept="image/png, image/gif, image/jpeg" class="file-upload-default">
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
                        <textarea class="form-control" id="exampleTextarea1" name="about" rows="4"> {{ old('about', $user->about) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="tagline">{{ __('Tagline') }}</label>
                        <textarea class="form-control" id="tagline" name="tagline" rows="4" required> {{ old('tagline', $user->tagline) }}</textarea>
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
@extends('admin.layout')
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
                <form class="forms-sample" action="{{ route('admin.developerOnboardingPost') }}" method="POST" enctype="multipart/form-data">

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
                                <input type="text" name="salary" value="{{  $user->salary  }}"  required class="form-control" id="salary" placeholder="Salary (per month)">
                                <!-- <select class="form-control select2" required name="salary">
                                    <option {{ $user->salary == 'Less then 100000' ? 'selected' : '' }}>{{ __('Less then 100000') }}</option>
                                    <option {{ $user->salary == '1 lac to 2 lac' ? 'selected' : '' }}>{{ __('1 lac to 2 lac') }}</option>
                                    <option {{ $user->salary == '2 lac to 3 lac' ? 'selected' : '' }}>{{ __('2 lac to 3 lac') }}</option>
                                    <option {{ $user->salary == 'More then 3lac' ? 'selected' : '' }}>{{ __('More then 3lac') }}</option>
                                </select> -->


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
                                <input type="text" name="pinCode" required class="form-control" value=" {{ old('pinCode', $user['pinCode']) }}" id="pinCode" placeholder="Enter Pin Code">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="country">{{ __('State') }}</label>
                                <input type="text" required name="country" class="form-control" value=" {{ old('country', $user['country']) }}" id="country" placeholder="State">
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
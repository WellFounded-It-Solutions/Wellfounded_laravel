@extends('agency.layout')
@section('title', $menu['menu'])
@section('content')
@push('head')
<link rel="stylesheet" href="{{ asset('plugins/DataTables/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('/css/Managedeveloper.css') }}">
@endpush



<div class="row">
    <div class="col-xl-9 col-lg-9 col-md-9 m-auto">
        <div class="card">
            <div class="card-header">
                <h3>{{ __('Add Developer') }}</h3>
            </div>
            <div class="card-body">
                <form class="forms-sample" action="{{ route('agency.addDeveloperPost') }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName1">{{ __('Name') }}</label>
                                <input type="text" class="form-control" id="exampleInputName1" required name="name" value="{{ old('name') }}" placeholder="Name">
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

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleEmployementType">{{ __('Employement Type') }}</label>
                                <select class="form-control" name="employementType" required id="exampleEmployementType">
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleWorkingStatus">{{ __('Working Status') }}</label>
                                <select class="form-control" name="workingStatus" required id="exampleWorkingStatus">
                                    <option {{ old('workingStatus') == 'Open To Work' ? 'selected' : '' }}>
                                        {{ __('Open To Work') }}
                                    </option>
                                    <option {{ old('workingStatus') == 'Hired' ? 'selected' : '' }}>{{ __('Hired') }}
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
                                    <option {{ old('contractJob') == 'Yes' ? 'selected' : '' }}>{{ __('Yes') }}
                                    </option>
                                    <option {{ old('contractJob') == 'No' ? 'selected' : '' }}>{{ __('No') }}
                                    </option>

                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">{{ __('Skills') }} </label>
                                <select class="form-control select2" name="skills[]" required multiple="multiple">
                                    @foreach (getSkills() as $row)
                                    <option value="{{ $row->name }}" {{ old('skills') == $row->name ? 'selected' : '' }}>{{ $row->name }}
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
                                    <option {{ old('experience') == '0 - 1 Years' ? 'selected' : '' }}>{{ __('0 - 1 Years') }}</option>
                                    <option {{ old('experience') == '1 - 2 Years' ? 'selected' : '' }}>{{ __('1 - 2 Years') }}</option>
                                    <option {{ old('experience') == '2 - 3 Years' ? 'selected' : '' }}>{{ __('2 - 3 Years') }}</option>
                                    <option {{ old('experience') == '3 - 5 Years' ? 'selected' : '' }}>{{ __('3 - 5 Years') }}</option>
                                    <option {{ old('experience') == '5 - 7 Years' ? 'selected' : '' }}>{{ __('5 - 7 Years') }}</option>
                                    <option {{ old('experience') == '7 - 9 Years' ? 'selected' : '' }}>{{ __('7 - 9 Years') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputSalary">{{ __('Salary Expectation (Per Month)') }}</label>
                                <input type="text" name="salary" value="{{ old('salary') }}" required class="form-control" id="salary" placeholder="Salary (per month)">
                                <!-- <select class="form-control select2" required name="salary">
                                    <option {{ old('salary') == 'Less then 100000' ? 'selected' : '' }}>{{ __('Less then 100000') }}</option>
                                    <option {{ old('salary') == '1 lac to 2 lac' ? 'selected' : '' }}>{{ __('1 lac to 2 lac') }}</option>
                                    <option {{ old('salary') == '2 lac to 3 lac' ? 'selected' : '' }}>{{ __('2 lac to 3 lac') }}</option>
                                    <option {{ old('salary') == 'More then 3lac' ? 'selected' : '' }}>{{ __('More then 3lac') }}</option>

                                </select> -->


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
                        <label for="exampleTextarea1">{{ __('About Developer') }}</label>
                        <textarea class="form-control" required name="remark" id="exampleTextarea1" rows="4">{{ old('remark') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">{{ __('Submit') }}</button>
                    <button class="btn btn-light">{{ __('Cancel') }}</button>
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
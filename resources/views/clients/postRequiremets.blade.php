@extends('clients.layout')
@section('content')
<div class="row">
    <div class="col-xl-9 col-lg-9 col-md-9 m-auto">
        <div class="card">
            <div class="card-header">
                <h3>{{ __('Post Requirement') }}</h3>
            </div>
            <div class="card-body">
                <form class="forms-sample" action="{{ route('clients.postRequirementSave') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jobTitle">{{ __('Job Title') }}</label>
                                <input type="text" class="form-control" id="jobTitle" required name="jobTitle" value="{{ old('jobTitle') }}" placeholder="Job Title">
                            </div>
                        </div>



                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">{{ __('Job Description') }}</label>
                                <textarea class="form-control" required name="description" id="description" rows="4">{{ old('description') }}</textarea>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="noOfDevelopers">{{ __('Number of developers') }}</label>
                                <input type="number" min="0" class="form-control" required value="{{ old('noOfDevelopers')}}" name="noOfDevelopers" id="noOfDevelopers" placeholder="No. of developers">
                            </div>
                        </div>

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
                                <label for="budget">{{ __('Budget') }}</label>
                                <input type="number" min="0" class="form-control" required value="{{ old('budget')}}" name="budget" id="budget" placeholder="Budget">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="duration">{{ __('Duration') }}</label>
                                <select class="form-control" required name="duration">
                                    <option {{ old('duration') == '1 Month' ? 'selected' : '' }}>
                                        {{ __('1 Month') }}
                                    </option>
                                    <option {{ old('duration') == '1 - 3 Months' ? 'selected' : '' }}>
                                        {{ __('1 - 3 Months') }}
                                    </option>
                                    <option {{ old('duration') == '3 - 6 Months' ? 'selected' : '' }}>
                                        {{ __('3 - 6 Months') }}
                                    </option>
                                    <option {{ old('duration') == '6 - 12 Months' ? 'selected' : '' }}>
                                        {{ __('6 - 12 Months') }}
                                    </option>
                                    <option {{ old('duration') == 'More then 12 Months' ? 'selected' : '' }}>
                                        {{ __('More then 12 Months') }}
                                    </option>
                                </select>
                            </div>
                        </div>
                       
                    </div>
                    <div class="row">

                    <div class="col-md-6">
                            <div class="form-group">
                                <label for="">{{ __('Primary Skills') }} </label>
                                <select class="form-control select2" name="skills[]" required multiple="multiple">
                                    @foreach (getSkills() as $row)
                                    <option value="{{ $row->name }}" {{ old('skills') == $row->name ? 'selected' : '' }}>{{ $row->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="secondarySkills">{{ __('Secondary Skills') }}</label>
                                <select class="form-control select2" name="secondarySkills[]" required multiple="multiple">
                                
                                    @foreach (getSkills() as $row)
                                    <option value="{{ $row->name }}"
                                        >{{ $row->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="developerType">{{ __('Developer Type') }}</label>
                                <select class="form-control" required name="developerType">
                                    <option {{ old('developerType') == 'Remote' ? 'selected' : '' }}>
                                        {{ __('Remote') }}
                                    </option>
                                    <option {{ old('developerType') == 'On Site' ? 'selected' : '' }}>
                                        {{ __('On Site') }}
                                    </option>
                                    <option {{ old('developerType') == 'Hybrid' ? 'selected' : '' }}>
                                        {{ __('Hybrid') }}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jobType">{{ __('Job Type') }}</label>
                                <select class="form-control" required name="jobType">
                                    <option {{ old('jobType') == 'Contarct' ? 'selected' : '' }}>
                                        {{ __('Contarct') }}
                                    </option>
                                    <option {{ old('jobType') == 'Fulltime' ? 'selected' : '' }}>
                                        {{ __('Fulltime') }}
                                    </option>
                                    <option {{ old('jobType') == 'Part time' ? 'selected' : '' }}>
                                        {{ __('Part time') }}
                                    </option>
                                </select>
                            </div>
                        </div>
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
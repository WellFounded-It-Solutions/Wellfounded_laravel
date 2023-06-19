@extends('clients.layout')
@section('title', 'Manage Developer')
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
                        <h5>{{ __('Developers Table')}}</h5>
                        <span>{{ __('Create Update Remove developers')}}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb" style="align-items: center;">
                        <li class="breadcrumb-item">
                            <a href="{{route('dashboard')}}"><i class="ik ik-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">wellfounded</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Manage Developers</li>
                        <div>
                            <ol style="padding: 0px;display: flex;margin-left: 1rem;background-color: #e9ecef;">
                                <li class="breadcrumbb breadcrumbb-item">
                                    <a href="#" onclick="openTab('Developer_Table')"><i class="ik ik-list"></i></a>
                                </li>
                                <li class="breadcrumbb breadcrumbb-item">
                                    <a href="#" onclick="openTab('Developer_Grid')"><i class="ik ik-grid"></i></a>
                                </li>
                            </ol>
                        </div>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="card  tab" id="Developer_Table">

        <div class="card-header d-block">
            <h3>{{ __('Default Ordering')}}</h3>
        </div>
        <div class="card-body">
            <div class="dt-responsive">
                <table id="order-table" class="table table-striped table-bordered nowrap">
                    <thead>
                        <tr>
                            <th>{{ __('Name')}}</th>
                            <th>{{ __('Position')}}</th>
                            <th>{{ __('Office')}}</th>
                            <th>{{ __('Age')}}</th>
                            <th>{{ __('Start date')}}</th>
                            <th>{{ __('Salary')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ __('Tiger Nixon')}}</td>
                            <td>{{ __('System Architect')}}</td>
                            <td>{{ __('Edinburgh')}}</td>
                            <td>{{ __('61')}}</td>
                            <td>{{ __('2011/04/25')}}</td>
                            <td>{{ __('$320,800')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Garrett Winters')}}</td>
                            <td>{{ __('Accountant')}}</td>
                            <td>{{ __('Tokyo')}}</td>
                            <td>{{ __('63')}}</td>
                            <td>{{ __('2011/07/25')}}</td>
                            <td>{{ __('$170,750')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Ashton Cox')}}</td>
                            <td>{{ __('Junior Technical Author')}}</td>
                            <td>{{ __('San Francisco')}}</td>
                            <td>{{ __('66')}}</td>
                            <td>{{ __('2009/01/12')}}</td>
                            <td>{{ __('$86,000')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Cedric Kelly')}}</td>
                            <td>{{ __('Senior Javascript Developer')}}</td>
                            <td>{{ __('Edinburgh')}}</td>
                            <td>{{ __('22')}}</td>
                            <td>{{ __('2012/03/29')}}</td>
                            <td>{{ __('$433,060')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Airi Satou')}}</td>
                            <td>{{ __('Accountant')}}</td>
                            <td>{{ __('Tokyo')}}</td>
                            <td>{{ __('33')}}</td>
                            <td>{{ __('2008/11/28')}}</td>
                            <td>{{ __('$162,700')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Brielle Williamson')}}</td>
                            <td>{{ __('Integration Specialist')}}</td>
                            <td>{{ __('New York')}}</td>
                            <td>{{ __('61')}}</td>
                            <td>{{ __('2012/12/02')}}</td>
                            <td>{{ __('$372,000')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Herrod Chandler')}}</td>
                            <td>{{ __('Sales Assistant')}}</td>
                            <td>{{ __('San Francisco')}}</td>
                            <td>{{ __('59')}}</td>
                            <td>{{ __('2012/08/06')}}</td>
                            <td>{{ __('$137,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Rhona Davidson')}}</td>
                            <td>{{ __('Integration Specialist')}}</td>
                            <td>{{ __('Tokyo')}}</td>
                            <td>{{ __('55')}}</td>
                            <td>{{ __('2010/10/14')}}</td>
                            <td>{{ __('$327,900')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Colleen Hurst')}}</td>
                            <td>{{ __('Javascript Developer')}}</td>
                            <td>{{ __('San Francisco')}}</td>
                            <td>{{ __('39')}}</td>
                            <td>{{ __('2009/09/15')}}</td>
                            <td>{{ __('$205,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Sonya Frost')}}</td>
                            <td>{{ __('Software Engineer')}}</td>
                            <td>{{ __('Edinburgh')}}</td>
                            <td>{{ __('23')}}</td>
                            <td>{{ __('2008/12/13')}}</td>
                            <td>{{ __('$103,600')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Jena Gaines')}}</td>
                            <td>{{ __('Office Manager')}}</td>
                            <td>{{ __('London')}}</td>
                            <td>{{ __('30')}}</td>
                            <td>{{ __('2008/12/19')}}</td>
                            <td>{{ __('$90,560')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Quinn Flynn')}}</td>
                            <td>{{ __('Support Lead')}}</td>
                            <td>{{ __('Edinburgh')}}</td>
                            <td>{{ __('22')}}</td>
                            <td>{{ __('2013/03/03')}}</td>
                            <td>{{ __('$342,000')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Charde Marshall')}}</td>
                            <td>{{ __('Regional Director')}}</td>
                            <td>{{ __('San Francisco')}}</td>
                            <td>{{ __('36')}}</td>
                            <td>{{ __('2008/10/16')}}</td>
                            <td>{{ __('$470,600')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Haley Kennedy')}}</td>
                            <td>{{ __('Senior Marketing Designer')}}</td>
                            <td>{{ __('London')}}</td>
                            <td>{{ __('43')}}</td>
                            <td>{{ __('2012/12/18')}}</td>
                            <td>{{ __('$313,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Tatyana Fitzpatrick')}}</td>
                            <td>{{ __('Regional Director')}}</td>
                            <td>{{ __('London')}}</td>
                            <td>{{ __('19')}}</td>
                            <td>{{ __('2010/03/17')}}</td>
                            <td>{{ __('$385,750')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Michael Silva')}}</td>
                            <td>{{ __('Marketing Designer')}}</td>
                            <td>{{ __('London')}}</td>
                            <td>{{ __('66')}}</td>
                            <td>{{ __('2012/11/27')}}</td>
                            <td>{{ __('$198,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Paul Byrd')}}</td>
                            <td>{{ __('Chief Financial Officer (CFO)')}}</td>
                            <td>{{ __('New York')}}</td>
                            <td>{{ __('64')}}</td>
                            <td>{{ __('2010/06/09')}}</td>
                            <td>{{ __('$725,000')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Gloria Little')}}</td>
                            <td>{{ __('Systems Administrator')}}</td>
                            <td>{{ __('New York')}}</td>
                            <td>{{ __('59')}}</td>
                            <td>{{ __('2009/04/10')}}</td>
                            <td>{{ __('$237,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Bradley Greer')}}</td>
                            <td>{{ __('Software Engineer')}}</td>
                            <td>{{ __('London')}}</td>
                            <td>{{ __('41')}}</td>
                            <td>{{ __('2012/10/13')}}</td>
                            <td>{{ __('$132,000')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Dai Rios')}}</td>
                            <td>{{ __('Personnel Lead')}}</td>
                            <td>{{ __('Edinburgh')}}</td>
                            <td>{{ __('35')}}</td>
                            <td>{{ __('2012/09/26')}}</td>
                            <td>{{ __('$217,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Tiger Nixon')}}</td>
                            <td>{{ __('System Architect')}}</td>
                            <td>{{ __('Edinburgh')}}</td>
                            <td>{{ __('61')}}</td>
                            <td>{{ __('2011/04/25')}}</td>
                            <td>{{ __('$320,800')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Garrett Winters')}}</td>
                            <td>{{ __('Accountant')}}</td>
                            <td>{{ __('Tokyo')}}</td>
                            <td>{{ __('63')}}</td>
                            <td>{{ __('2011/07/25')}}</td>
                            <td>{{ __('$170,750')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Ashton Cox')}}</td>
                            <td>{{ __('Junior Technical Author')}}</td>
                            <td>{{ __('San Francisco')}}</td>
                            <td>{{ __('66')}}</td>
                            <td>{{ __('2009/01/12')}}</td>
                            <td>{{ __('$86,000')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Cedric Kelly')}}</td>
                            <td>{{ __('Senior Javascript Developer')}}</td>
                            <td>{{ __('Edinburgh')}}</td>
                            <td>{{ __('22')}}</td>
                            <td>{{ __('2012/03/29')}}</td>
                            <td>{{ __('$433,060')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Airi Satou')}}</td>
                            <td>{{ __('Accountant')}}</td>
                            <td>{{ __('Tokyo')}}</td>
                            <td>{{ __('33')}}</td>
                            <td>{{ __('2008/11/28')}}</td>
                            <td>{{ __('$162,700')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Brielle Williamson')}}</td>
                            <td>{{ __('Integration Specialist')}}</td>
                            <td>{{ __('New York')}}</td>
                            <td>{{ __('61')}}</td>
                            <td>{{ __('2012/12/02')}}</td>
                            <td>{{ __('$372,000')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Herrod Chandler')}}</td>
                            <td>{{ __('Sales Assistant')}}</td>
                            <td>{{ __('San Francisco')}}</td>
                            <td>{{ __('59')}}</td>
                            <td>{{ __('2012/08/06')}}</td>
                            <td>{{ __('$137,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Rhona Davidson')}}</td>
                            <td>{{ __('Integration Specialist')}}</td>
                            <td>{{ __('Tokyo')}}</td>
                            <td>{{ __('55')}}</td>
                            <td>{{ __('2010/10/14')}}</td>
                            <td>{{ __('$327,900')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Colleen Hurst')}}</td>
                            <td>{{ __('Javascript Developer')}}</td>
                            <td>{{ __('San Francisco')}}</td>
                            <td>{{ __('39')}}</td>
                            <td>{{ __('2009/09/15')}}</td>
                            <td>{{ __('$205,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Sonya Frost')}}</td>
                            <td>{{ __('Software Engineer')}}</td>
                            <td>{{ __('Edinburgh')}}</td>
                            <td>{{ __('23')}}</td>
                            <td>{{ __('2008/12/13')}}</td>
                            <td>{{ __('$103,600')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Jena Gaines')}}</td>
                            <td>{{ __('Office Manager')}}</td>
                            <td>{{ __('London')}}</td>
                            <td>{{ __('30')}}</td>
                            <td>{{ __('2008/12/19')}}</td>
                            <td>{{ __('$90,560')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Quinn Flynn')}}</td>
                            <td>{{ __('Support Lead')}}</td>
                            <td>{{ __('Edinburgh')}}</td>
                            <td>{{ __('22')}}</td>
                            <td>{{ __('2013/03/03')}}</td>
                            <td>{{ __('$342,000')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Charde Marshall')}}</td>
                            <td>{{ __('Regional Director')}}</td>
                            <td>{{ __('San Francisco')}}</td>
                            <td>{{ __('36')}}</td>
                            <td>{{ __('2008/10/16')}}</td>
                            <td>{{ __('$470,600')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Haley Kennedy')}}</td>
                            <td>{{ __('Senior Marketing Designer')}}</td>
                            <td>{{ __('London')}}</td>
                            <td>{{ __('43')}}</td>
                            <td>{{ __('2012/12/18')}}</td>
                            <td>{{ __('$313,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Tatyana Fitzpatrick')}}</td>
                            <td>{{ __('Regional Director')}}</td>
                            <td>{{ __('London')}}</td>
                            <td>{{ __('19')}}</td>
                            <td>{{ __('2010/03/17')}}</td>
                            <td>{{ __('$385,750')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Michael Silva')}}</td>
                            <td>{{ __('Marketing Designer')}}</td>
                            <td>{{ __('London')}}</td>
                            <td>{{ __('66')}}</td>
                            <td>{{ __('2012/11/27')}}</td>
                            <td>{{ __('$198,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Paul Byrd')}}</td>
                            <td>{{ __('Chief Financial Officer (CFO)')}}</td>
                            <td>{{ __('New York')}}</td>
                            <td>{{ __('64')}}</td>
                            <td>{{ __('2010/06/09')}}</td>
                            <td>{{ __('$725,000')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Gloria Little')}}</td>
                            <td>{{ __('Systems Administrator')}}</td>
                            <td>{{ __('New York')}}</td>
                            <td>{{ __('59')}}</td>
                            <td>{{ __('2009/04/10')}}</td>
                            <td>{{ __('$237,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Bradley Greer')}}</td>
                            <td>{{ __('Software Engineer')}}</td>
                            <td>{{ __('London')}}</td>
                            <td>{{ __('41')}}</td>
                            <td>{{ __('2012/10/13')}}</td>
                            <td>{{ __('$132,000')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Dai Rios')}}</td>
                            <td>{{ __('Personnel Lead')}}</td>
                            <td>{{ __('Edinburgh')}}</td>
                            <td>{{ __('35')}}</td>
                            <td>{{ __('2012/09/26')}}</td>
                            <td>{{ __('$217,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Tiger Nixon')}}</td>
                            <td>{{ __('System Architect')}}</td>
                            <td>{{ __('Edinburgh')}}</td>
                            <td>{{ __('61')}}</td>
                            <td>{{ __('2011/04/25')}}</td>
                            <td>{{ __('$320,800')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Garrett Winters')}}</td>
                            <td>{{ __('Accountant')}}</td>
                            <td>{{ __('Tokyo')}}</td>
                            <td>{{ __('63')}}</td>
                            <td>{{ __('2011/07/25')}}</td>
                            <td>{{ __('$170,750')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Ashton Cox')}}</td>
                            <td>{{ __('Junior Technical Author')}}</td>
                            <td>{{ __('San Francisco')}}</td>
                            <td>{{ __('66')}}</td>
                            <td>{{ __('2009/01/12')}}</td>
                            <td>{{ __('$86,000')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Cedric Kelly')}}</td>
                            <td>{{ __('Senior Javascript Developer')}}</td>
                            <td>{{ __('Edinburgh')}}</td>
                            <td>{{ __('22')}}</td>
                            <td>{{ __('2012/03/29')}}</td>
                            <td>{{ __('$433,060')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Airi Satou')}}</td>
                            <td>{{ __('Accountant')}}</td>
                            <td>{{ __('Tokyo')}}</td>
                            <td>{{ __('33')}}</td>
                            <td>{{ __('2008/11/28')}}</td>
                            <td>{{ __('$162,700')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Brielle Williamson')}}</td>
                            <td>{{ __('Integration Specialist')}}</td>
                            <td>{{ __('New York')}}</td>
                            <td>{{ __('61')}}</td>
                            <td>{{ __('2012/12/02')}}</td>
                            <td>{{ __('$372,000')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Herrod Chandler')}}</td>
                            <td>{{ __('Sales Assistant')}}</td>
                            <td>{{ __('San Francisco')}}</td>
                            <td>{{ __('59')}}</td>
                            <td>{{ __('2012/08/06')}}</td>
                            <td>{{ __('$137,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Rhona Davidson')}}</td>
                            <td>{{ __('Integration Specialist')}}</td>
                            <td>{{ __('Tokyo')}}</td>
                            <td>{{ __('55')}}</td>
                            <td>{{ __('2010/10/14')}}</td>
                            <td>{{ __('$327,900')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Colleen Hurst')}}</td>
                            <td>{{ __('Javascript Developer')}}</td>
                            <td>{{ __('San Francisco')}}</td>
                            <td>{{ __('39')}}</td>
                            <td>{{ __('2009/09/15')}}</td>
                            <td>{{ __('$205,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Sonya Frost')}}</td>
                            <td>{{ __('Software Engineer')}}</td>
                            <td>{{ __('Edinburgh')}}</td>
                            <td>{{ __('23')}}</td>
                            <td>{{ __('2008/12/13')}}</td>
                            <td>{{ __('$103,600')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Jena Gaines')}}</td>
                            <td>{{ __('Office Manager')}}</td>
                            <td>{{ __('London')}}</td>
                            <td>{{ __('30')}}</td>
                            <td>{{ __('2008/12/19')}}</td>
                            <td>{{ __('$90,560')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Quinn Flynn')}}</td>
                            <td>{{ __('Support Lead')}}</td>
                            <td>{{ __('Edinburgh')}}</td>
                            <td>{{ __('22')}}</td>
                            <td>{{ __('2013/03/03')}}</td>
                            <td>{{ __('$342,000')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Charde Marshall')}}</td>
                            <td>{{ __('Regional Director')}}</td>
                            <td>{{ __('San Francisco')}}</td>
                            <td>{{ __('36')}}</td>
                            <td>{{ __('2008/10/16')}}</td>
                            <td>{{ __('$470,600')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Haley Kennedy')}}</td>
                            <td>{{ __('Senior Marketing Designer')}}</td>
                            <td>{{ __('London')}}</td>
                            <td>{{ __('43')}}</td>
                            <td>{{ __('2012/12/18')}}</td>
                            <td>{{ __('$313,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Tatyana Fitzpatrick')}}</td>
                            <td>{{ __('Regional Director')}}</td>
                            <td>{{ __('London')}}</td>
                            <td>{{ __('19')}}</td>
                            <td>{{ __('2010/03/17')}}</td>
                            <td>{{ __('$385,750')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Michael Silva')}}</td>
                            <td>{{ __('Marketing Designer')}}</td>
                            <td>{{ __('London')}}</td>
                            <td>{{ __('66')}}</td>
                            <td>{{ __('2012/11/27')}}</td>
                            <td>{{ __('$198,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Paul Byrd')}}</td>
                            <td>{{ __('Chief Financial Officer (CFO)')}}</td>
                            <td>{{ __('New York')}}</td>
                            <td>{{ __('64')}}</td>
                            <td>{{ __('2010/06/09')}}</td>
                            <td>{{ __('$725,000')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Gloria Little')}}</td>
                            <td>{{ __('Systems Administrator')}}</td>
                            <td>{{ __('New York')}}</td>
                            <td>{{ __('59')}}</td>
                            <td>{{ __('2009/04/10')}}</td>
                            <td>{{ __('$237,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Bradley Greer')}}</td>
                            <td>{{ __('Software Engineer')}}</td>
                            <td>{{ __('London')}}</td>
                            <td>{{ __('41')}}</td>
                            <td>{{ __('2012/10/13')}}</td>
                            <td>{{ __('$132,000')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Dai Rios')}}</td>
                            <td>{{ __('Personnel Lead')}}</td>
                            <td>{{ __('Edinburgh')}}</td>
                            <td>{{ __('35')}}</td>
                            <td>{{ __('2012/09/26')}}</td>
                            <td>{{ __('$217,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Tiger Nixon')}}</td>
                            <td>{{ __('System Architect')}}</td>
                            <td>{{ __('Edinburgh')}}</td>
                            <td>{{ __('61')}}</td>
                            <td>{{ __('2011/04/25')}}</td>
                            <td>{{ __('$320,800')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Garrett Winters')}}</td>
                            <td>{{ __('Accountant')}}</td>
                            <td>{{ __('Tokyo')}}</td>
                            <td>{{ __('63')}}</td>
                            <td>{{ __('2011/07/25')}}</td>
                            <td>{{ __('$170,750')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Ashton Cox')}}</td>
                            <td>{{ __('Junior Technical Author')}}</td>
                            <td>{{ __('San Francisco')}}</td>
                            <td>{{ __('66')}}</td>
                            <td>{{ __('2009/01/12')}}</td>
                            <td>{{ __('$86,000')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Cedric Kelly')}}</td>
                            <td>{{ __('Senior Javascript Developer')}}</td>
                            <td>{{ __('Edinburgh')}}</td>
                            <td>{{ __('22')}}</td>
                            <td>{{ __('2012/03/29')}}</td>
                            <td>{{ __('$433,060')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Airi Satou')}}</td>
                            <td>{{ __('Accountant')}}</td>
                            <td>{{ __('Tokyo')}}</td>
                            <td>{{ __('33')}}</td>
                            <td>{{ __('2008/11/28')}}</td>
                            <td>{{ __('$162,700')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Brielle Williamson')}}</td>
                            <td>{{ __('Integration Specialist')}}</td>
                            <td>{{ __('New York')}}</td>
                            <td>{{ __('61')}}</td>
                            <td>{{ __('2012/12/02')}}</td>
                            <td>{{ __('$372,000')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Herrod Chandler')}}</td>
                            <td>{{ __('Sales Assistant')}}</td>
                            <td>{{ __('San Francisco')}}</td>
                            <td>{{ __('59')}}</td>
                            <td>{{ __('2012/08/06')}}</td>
                            <td>{{ __('$137,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Rhona Davidson')}}</td>
                            <td>{{ __('Integration Specialist')}}</td>
                            <td>{{ __('Tokyo')}}</td>
                            <td>{{ __('55')}}</td>
                            <td>{{ __('2010/10/14')}}</td>
                            <td>{{ __('$327,900')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Colleen Hurst')}}</td>
                            <td>{{ __('Javascript Developer')}}</td>
                            <td>{{ __('San Francisco')}}</td>
                            <td>{{ __('39')}}</td>
                            <td>{{ __('2009/09/15')}}</td>
                            <td>{{ __('$205,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Sonya Frost')}}</td>
                            <td>{{ __('Software Engineer')}}</td>
                            <td>{{ __('Edinburgh')}}</td>
                            <td>{{ __('23')}}</td>
                            <td>{{ __('2008/12/13')}}</td>
                            <td>{{ __('$103,600')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Jena Gaines')}}</td>
                            <td>{{ __('Office Manager')}}</td>
                            <td>{{ __('London')}}</td>
                            <td>{{ __('30')}}</td>
                            <td>{{ __('2008/12/19')}}</td>
                            <td>{{ __('$90,560')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Quinn Flynn')}}</td>
                            <td>{{ __('Support Lead')}}</td>
                            <td>{{ __('Edinburgh')}}</td>
                            <td>{{ __('22')}}</td>
                            <td>{{ __('2013/03/03')}}</td>
                            <td>{{ __('$342,000')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Charde Marshall')}}</td>
                            <td>{{ __('Regional Director')}}</td>
                            <td>{{ __('San Francisco')}}</td>
                            <td>{{ __('36')}}</td>
                            <td>{{ __('2008/10/16')}}</td>
                            <td>{{ __('$470,600')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Haley Kennedy')}}</td>
                            <td>{{ __('Senior Marketing Designer')}}</td>
                            <td>{{ __('London')}}</td>
                            <td>{{ __('43')}}</td>
                            <td>{{ __('2012/12/18')}}</td>
                            <td>{{ __('$313,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Tatyana Fitzpatrick')}}</td>
                            <td>{{ __('Regional Director')}}</td>
                            <td>{{ __('London')}}</td>
                            <td>{{ __('19')}}</td>
                            <td>{{ __('2010/03/17')}}</td>
                            <td>{{ __('$385,750')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Michael Silva')}}</td>
                            <td>{{ __('Marketing Designer')}}</td>
                            <td>{{ __('London')}}</td>
                            <td>{{ __('66')}}</td>
                            <td>{{ __('2012/11/27')}}</td>
                            <td>{{ __('$198,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Paul Byrd')}}</td>
                            <td>{{ __('Chief Financial Officer (CFO)')}}</td>
                            <td>{{ __('New York')}}</td>
                            <td>{{ __('64')}}</td>
                            <td>{{ __('2010/06/09')}}</td>
                            <td>{{ __('$725,000')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Gloria Little')}}</td>
                            <td>{{ __('Systems Administrator')}}</td>
                            <td>{{ __('New York')}}</td>
                            <td>{{ __('59')}}</td>
                            <td>{{ __('2009/04/10')}}</td>
                            <td>{{ __('$237,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Bradley Greer')}}</td>
                            <td>{{ __('Software Engineer')}}</td>
                            <td>{{ __('London')}}</td>
                            <td>{{ __('41')}}</td>
                            <td>{{ __('2012/10/13')}}</td>
                            <td>{{ __('$132,000')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Dai Rios')}}</td>
                            <td>{{ __('Personnel Lead')}}</td>
                            <td>{{ __('Edinburgh')}}</td>
                            <td>{{ __('35')}}</td>
                            <td>{{ __('2012/09/26')}}</td>
                            <td>{{ __('$217,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Tiger Nixon')}}</td>
                            <td>{{ __('System Architect')}}</td>
                            <td>{{ __('Edinburgh')}}</td>
                            <td>{{ __('61')}}</td>
                            <td>{{ __('2011/04/25')}}</td>
                            <td>{{ __('$320,800')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Garrett Winters')}}</td>
                            <td>{{ __('Accountant')}}</td>
                            <td>{{ __('Tokyo')}}</td>
                            <td>{{ __('63')}}</td>
                            <td>{{ __('2011/07/25')}}</td>
                            <td>{{ __('$170,750')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Ashton Cox')}}</td>
                            <td>{{ __('Junior Technical Author')}}</td>
                            <td>{{ __('San Francisco')}}</td>
                            <td>{{ __('66')}}</td>
                            <td>{{ __('2009/01/12')}}</td>
                            <td>{{ __('$86,000')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Cedric Kelly')}}</td>
                            <td>{{ __('Senior Javascript Developer')}}</td>
                            <td>{{ __('Edinburgh')}}</td>
                            <td>{{ __('22')}}</td>
                            <td>{{ __('2012/03/29')}}</td>
                            <td>{{ __('$433,060')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Airi Satou')}}</td>
                            <td>{{ __('Accountant')}}</td>
                            <td>{{ __('Tokyo')}}</td>
                            <td>{{ __('33')}}</td>
                            <td>{{ __('2008/11/28')}}</td>
                            <td>{{ __('$162,700')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Brielle Williamson')}}</td>
                            <td>{{ __('Integration Specialist')}}</td>
                            <td>{{ __('New York')}}</td>
                            <td>{{ __('61')}}</td>
                            <td>{{ __('2012/12/02')}}</td>
                            <td>{{ __('$372,000')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Herrod Chandler')}}</td>
                            <td>{{ __('Sales Assistant')}}</td>
                            <td>{{ __('San Francisco')}}</td>
                            <td>{{ __('59')}}</td>
                            <td>{{ __('2012/08/06')}}</td>
                            <td>{{ __('$137,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Rhona Davidson')}}</td>
                            <td>{{ __('Integration Specialist')}}</td>
                            <td>{{ __('Tokyo')}}</td>
                            <td>{{ __('55')}}</td>
                            <td>{{ __('2010/10/14')}}</td>
                            <td>{{ __('$327,900')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Colleen Hurst')}}</td>
                            <td>{{ __('Javascript Developer')}}</td>
                            <td>{{ __('San Francisco')}}</td>
                            <td>{{ __('39')}}</td>
                            <td>{{ __('2009/09/15')}}</td>
                            <td>{{ __('$205,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Sonya Frost')}}</td>
                            <td>{{ __('Software Engineer')}}</td>
                            <td>{{ __('Edinburgh')}}</td>
                            <td>{{ __('23')}}</td>
                            <td>{{ __('2008/12/13')}}</td>
                            <td>{{ __('$103,600')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Jena Gaines')}}</td>
                            <td>{{ __('Office Manager')}}</td>
                            <td>{{ __('London')}}</td>
                            <td>{{ __('30')}}</td>
                            <td>{{ __('2008/12/19')}}</td>
                            <td>{{ __('$90,560')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Quinn Flynn')}}</td>
                            <td>{{ __('Support Lead')}}</td>
                            <td>{{ __('Edinburgh')}}</td>
                            <td>{{ __('22')}}</td>
                            <td>{{ __('2013/03/03')}}</td>
                            <td>{{ __('$342,000')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Charde Marshall')}}</td>
                            <td>{{ __('Regional Director')}}</td>
                            <td>{{ __('San Francisco')}}</td>
                            <td>{{ __('36')}}</td>
                            <td>{{ __('2008/10/16')}}</td>
                            <td>{{ __('$470,600')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Haley Kennedy')}}</td>
                            <td>{{ __('Senior Marketing Designer')}}</td>
                            <td>{{ __('London')}}</td>
                            <td>{{ __('43')}}</td>
                            <td>{{ __('2012/12/18')}}</td>
                            <td>{{ __('$313,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Tatyana Fitzpatrick')}}</td>
                            <td>{{ __('Regional Director')}}</td>
                            <td>{{ __('London')}}</td>
                            <td>{{ __('19')}}</td>
                            <td>{{ __('2010/03/17')}}</td>
                            <td>{{ __('$385,750')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Michael Silva')}}</td>
                            <td>{{ __('Marketing Designer')}}</td>
                            <td>{{ __('London')}}</td>
                            <td>{{ __('66')}}</td>
                            <td>{{ __('2012/11/27')}}</td>
                            <td>{{ __('$198,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Paul Byrd')}}</td>
                            <td>{{ __('Chief Financial Officer (CFO)')}}</td>
                            <td>{{ __('New York')}}</td>
                            <td>{{ __('64')}}</td>
                            <td>{{ __('2010/06/09')}}</td>
                            <td>{{ __('$725,000')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Gloria Little')}}</td>
                            <td>{{ __('Systems Administrator')}}</td>
                            <td>{{ __('New York')}}</td>
                            <td>{{ __('59')}}</td>
                            <td>{{ __('2009/04/10')}}</td>
                            <td>{{ __('$237,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Bradley Greer')}}</td>
                            <td>{{ __('Software Engineer')}}</td>
                            <td>{{ __('London')}}</td>
                            <td>{{ __('41')}}</td>
                            <td>{{ __('2012/10/13')}}</td>
                            <td>{{ __('$132,000')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Dai Rios')}}</td>
                            <td>{{ __('Personnel Lead')}}</td>
                            <td>{{ __('Edinburgh')}}</td>
                            <td>{{ __('35')}}</td>
                            <td>{{ __('2012/09/26')}}</td>
                            <td>{{ __('$217,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Tiger Nixon')}}</td>
                            <td>{{ __('System Architect')}}</td>
                            <td>{{ __('Edinburgh')}}</td>
                            <td>{{ __('61')}}</td>
                            <td>{{ __('2011/04/25')}}</td>
                            <td>{{ __('$320,800')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Garrett Winters')}}</td>
                            <td>{{ __('Accountant')}}</td>
                            <td>{{ __('Tokyo')}}</td>
                            <td>{{ __('63')}}</td>
                            <td>{{ __('2011/07/25')}}</td>
                            <td>{{ __('$170,750')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Ashton Cox')}}</td>
                            <td>{{ __('Junior Technical Author')}}</td>
                            <td>{{ __('San Francisco')}}</td>
                            <td>{{ __('66')}}</td>
                            <td>{{ __('2009/01/12')}}</td>
                            <td>{{ __('$86,000')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Cedric Kelly')}}</td>
                            <td>{{ __('Senior Javascript Developer')}}</td>
                            <td>{{ __('Edinburgh')}}</td>
                            <td>{{ __('22')}}</td>
                            <td>{{ __('2012/03/29')}}</td>
                            <td>{{ __('$433,060')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Airi Satou')}}</td>
                            <td>{{ __('Accountant')}}</td>
                            <td>{{ __('Tokyo')}}</td>
                            <td>{{ __('33')}}</td>
                            <td>{{ __('2008/11/28')}}</td>
                            <td>{{ __('$162,700')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Brielle Williamson')}}</td>
                            <td>{{ __('Integration Specialist')}}</td>
                            <td>{{ __('New York')}}</td>
                            <td>{{ __('61')}}</td>
                            <td>{{ __('2012/12/02')}}</td>
                            <td>{{ __('$372,000')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Herrod Chandler')}}</td>
                            <td>{{ __('Sales Assistant')}}</td>
                            <td>{{ __('San Francisco')}}</td>
                            <td>{{ __('59')}}</td>
                            <td>{{ __('2012/08/06')}}</td>
                            <td>{{ __('$137,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Rhona Davidson')}}</td>
                            <td>{{ __('Integration Specialist')}}</td>
                            <td>{{ __('Tokyo')}}</td>
                            <td>{{ __('55')}}</td>
                            <td>{{ __('2010/10/14')}}</td>
                            <td>{{ __('$327,900')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Colleen Hurst')}}</td>
                            <td>{{ __('Javascript Developer')}}</td>
                            <td>{{ __('San Francisco')}}</td>
                            <td>{{ __('39')}}</td>
                            <td>{{ __('2009/09/15')}}</td>
                            <td>{{ __('$205,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Sonya Frost')}}</td>
                            <td>{{ __('Software Engineer')}}</td>
                            <td>{{ __('Edinburgh')}}</td>
                            <td>{{ __('23')}}</td>
                            <td>{{ __('2008/12/13')}}</td>
                            <td>{{ __('$103,600')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Jena Gaines')}}</td>
                            <td>{{ __('Office Manager')}}</td>
                            <td>{{ __('London')}}</td>
                            <td>{{ __('30')}}</td>
                            <td>{{ __('2008/12/19')}}</td>
                            <td>{{ __('$90,560')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Quinn Flynn')}}</td>
                            <td>{{ __('Support Lead')}}</td>
                            <td>{{ __('Edinburgh')}}</td>
                            <td>{{ __('22')}}</td>
                            <td>{{ __('2013/03/03')}}</td>
                            <td>{{ __('$342,000')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Charde Marshall')}}</td>
                            <td>{{ __('Regional Director')}}</td>
                            <td>{{ __('San Francisco')}}</td>
                            <td>{{ __('36')}}</td>
                            <td>{{ __('2008/10/16')}}</td>
                            <td>{{ __('$470,600')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Haley Kennedy')}}</td>
                            <td>{{ __('Senior Marketing Designer')}}</td>
                            <td>{{ __('London')}}</td>
                            <td>{{ __('43')}}</td>
                            <td>{{ __('2012/12/18')}}</td>
                            <td>{{ __('$313,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Tatyana Fitzpatrick')}}</td>
                            <td>{{ __('Regional Director')}}</td>
                            <td>{{ __('London')}}</td>
                            <td>{{ __('19')}}</td>
                            <td>{{ __('2010/03/17')}}</td>
                            <td>{{ __('$385,750')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Michael Silva')}}</td>
                            <td>{{ __('Marketing Designer')}}</td>
                            <td>{{ __('London')}}</td>
                            <td>{{ __('66')}}</td>
                            <td>{{ __('2012/11/27')}}</td>
                            <td>{{ __('$198,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Paul Byrd')}}</td>
                            <td>{{ __('Chief Financial Officer (CFO)')}}</td>
                            <td>{{ __('New York')}}</td>
                            <td>{{ __('64')}}</td>
                            <td>{{ __('2010/06/09')}}</td>
                            <td>{{ __('$725,000')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Gloria Little')}}</td>
                            <td>{{ __('Systems Administrator')}}</td>
                            <td>{{ __('New York')}}</td>
                            <td>{{ __('59')}}</td>
                            <td>{{ __('2009/04/10')}}</td>
                            <td>{{ __('$237,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Bradley Greer')}}</td>
                            <td>{{ __('Software Engineer')}}</td>
                            <td>{{ __('London')}}</td>
                            <td>{{ __('41')}}</td>
                            <td>{{ __('2012/10/13')}}</td>
                            <td>{{ __('$132,000')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Dai Rios')}}</td>
                            <td>{{ __('Personnel Lead')}}</td>
                            <td>{{ __('Edinburgh')}}</td>
                            <td>{{ __('35')}}</td>
                            <td>{{ __('2012/09/26')}}</td>
                            <td>{{ __('$217,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Tiger Nixon')}}</td>
                            <td>{{ __('System Architect')}}</td>
                            <td>{{ __('Edinburgh')}}</td>
                            <td>{{ __('61')}}</td>
                            <td>{{ __('2011/04/25')}}</td>
                            <td>{{ __('$320,800')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Garrett Winters')}}</td>
                            <td>{{ __('Accountant')}}</td>
                            <td>{{ __('Tokyo')}}</td>
                            <td>{{ __('63')}}</td>
                            <td>{{ __('2011/07/25')}}</td>
                            <td>{{ __('$170,750')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Ashton Cox')}}</td>
                            <td>{{ __('Junior Technical Author')}}</td>
                            <td>{{ __('San Francisco')}}</td>
                            <td>{{ __('66')}}</td>
                            <td>{{ __('2009/01/12')}}</td>
                            <td>{{ __('$86,000')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Cedric Kelly')}}</td>
                            <td>{{ __('Senior Javascript Developer')}}</td>
                            <td>{{ __('Edinburgh')}}</td>
                            <td>{{ __('22')}}</td>
                            <td>{{ __('2012/03/29')}}</td>
                            <td>{{ __('$433,060')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Airi Satou')}}</td>
                            <td>{{ __('Accountant')}}</td>
                            <td>{{ __('Tokyo')}}</td>
                            <td>{{ __('33')}}</td>
                            <td>{{ __('2008/11/28')}}</td>
                            <td>{{ __('$162,700')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Brielle Williamson')}}</td>
                            <td>{{ __('Integration Specialist')}}</td>
                            <td>{{ __('New York')}}</td>
                            <td>{{ __('61')}}</td>
                            <td>{{ __('2012/12/02')}}</td>
                            <td>{{ __('$372,000')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Herrod Chandler')}}</td>
                            <td>{{ __('Sales Assistant')}}</td>
                            <td>{{ __('San Francisco')}}</td>
                            <td>{{ __('59')}}</td>
                            <td>{{ __('2012/08/06')}}</td>
                            <td>{{ __('$137,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Rhona Davidson')}}</td>
                            <td>{{ __('Integration Specialist')}}</td>
                            <td>{{ __('Tokyo')}}</td>
                            <td>{{ __('55')}}</td>
                            <td>{{ __('2010/10/14')}}</td>
                            <td>{{ __('$327,900')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Colleen Hurst')}}</td>
                            <td>{{ __('Javascript Developer')}}</td>
                            <td>{{ __('San Francisco')}}</td>
                            <td>{{ __('39')}}</td>
                            <td>{{ __('2009/09/15')}}</td>
                            <td>{{ __('$205,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Sonya Frost')}}</td>
                            <td>{{ __('Software Engineer')}}</td>
                            <td>{{ __('Edinburgh')}}</td>
                            <td>{{ __('23')}}</td>
                            <td>{{ __('2008/12/13')}}</td>
                            <td>{{ __('$103,600')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Jena Gaines')}}</td>
                            <td>{{ __('Office Manager')}}</td>
                            <td>{{ __('London')}}</td>
                            <td>{{ __('30')}}</td>
                            <td>{{ __('2008/12/19')}}</td>
                            <td>{{ __('$90,560')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Quinn Flynn')}}</td>
                            <td>{{ __('Support Lead')}}</td>
                            <td>{{ __('Edinburgh')}}</td>
                            <td>{{ __('22')}}</td>
                            <td>{{ __('2013/03/03')}}</td>
                            <td>{{ __('$342,000')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Charde Marshall')}}</td>
                            <td>{{ __('Regional Director')}}</td>
                            <td>{{ __('San Francisco')}}</td>
                            <td>{{ __('36')}}</td>
                            <td>{{ __('2008/10/16')}}</td>
                            <td>{{ __('$470,600')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Haley Kennedy')}}</td>
                            <td>{{ __('Senior Marketing Designer')}}</td>
                            <td>{{ __('London')}}</td>
                            <td>{{ __('43')}}</td>
                            <td>{{ __('2012/12/18')}}</td>
                            <td>{{ __('$313,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Tatyana Fitzpatrick')}}</td>
                            <td>{{ __('Regional Director')}}</td>
                            <td>{{ __('London')}}</td>
                            <td>{{ __('19')}}</td>
                            <td>{{ __('2010/03/17')}}</td>
                            <td>{{ __('$385,750')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Michael Silva')}}</td>
                            <td>{{ __('Marketing Designer')}}</td>
                            <td>{{ __('London')}}</td>
                            <td>{{ __('66')}}</td>
                            <td>{{ __('2012/11/27')}}</td>
                            <td>{{ __('$198,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Paul Byrd')}}</td>
                            <td>{{ __('Chief Financial Officer (CFO)')}}</td>
                            <td>{{ __('New York')}}</td>
                            <td>{{ __('64')}}</td>
                            <td>{{ __('2010/06/09')}}</td>
                            <td>{{ __('$725,000')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Gloria Little')}}</td>
                            <td>{{ __('Systems Administrator')}}</td>
                            <td>{{ __('New York')}}</td>
                            <td>{{ __('59')}}</td>
                            <td>{{ __('2009/04/10')}}</td>
                            <td>{{ __('$237,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Bradley Greer')}}</td>
                            <td>{{ __('Software Engineer')}}</td>
                            <td>{{ __('London')}}</td>
                            <td>{{ __('41')}}</td>
                            <td>{{ __('2012/10/13')}}</td>
                            <td>{{ __('$132,000')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Dai Rios')}}</td>
                            <td>{{ __('Personnel Lead')}}</td>
                            <td>{{ __('Edinburgh')}}</td>
                            <td>{{ __('35')}}</td>
                            <td>{{ __('2012/09/26')}}</td>
                            <td>{{ __('$217,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Tiger Nixon')}}</td>
                            <td>{{ __('System Architect')}}</td>
                            <td>{{ __('Edinburgh')}}</td>
                            <td>{{ __('61')}}</td>
                            <td>{{ __('2011/04/25')}}</td>
                            <td>{{ __('$320,800')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Garrett Winters')}}</td>
                            <td>{{ __('Accountant')}}</td>
                            <td>{{ __('Tokyo')}}</td>
                            <td>{{ __('63')}}</td>
                            <td>{{ __('2011/07/25')}}</td>
                            <td>{{ __('$170,750')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Ashton Cox')}}</td>
                            <td>{{ __('Junior Technical Author')}}</td>
                            <td>{{ __('San Francisco')}}</td>
                            <td>{{ __('66')}}</td>
                            <td>{{ __('2009/01/12')}}</td>
                            <td>{{ __('$86,000')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Cedric Kelly')}}</td>
                            <td>{{ __('Senior Javascript Developer')}}</td>
                            <td>{{ __('Edinburgh')}}</td>
                            <td>{{ __('22')}}</td>
                            <td>{{ __('2012/03/29')}}</td>
                            <td>{{ __('$433,060')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Airi Satou')}}</td>
                            <td>{{ __('Accountant')}}</td>
                            <td>{{ __('Tokyo')}}</td>
                            <td>{{ __('33')}}</td>
                            <td>{{ __('2008/11/28')}}</td>
                            <td>{{ __('$162,700')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Brielle Williamson')}}</td>
                            <td>{{ __('Integration Specialist')}}</td>
                            <td>{{ __('New York')}}</td>
                            <td>{{ __('61')}}</td>
                            <td>{{ __('2012/12/02')}}</td>
                            <td>{{ __('$372,000')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Herrod Chandler')}}</td>
                            <td>{{ __('Sales Assistant')}}</td>
                            <td>{{ __('San Francisco')}}</td>
                            <td>{{ __('59')}}</td>
                            <td>{{ __('2012/08/06')}}</td>
                            <td>{{ __('$137,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Rhona Davidson')}}</td>
                            <td>{{ __('Integration Specialist')}}</td>
                            <td>{{ __('Tokyo')}}</td>
                            <td>{{ __('55')}}</td>
                            <td>{{ __('2010/10/14')}}</td>
                            <td>{{ __('$327,900')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Colleen Hurst')}}</td>
                            <td>{{ __('Javascript Developer')}}</td>
                            <td>{{ __('San Francisco')}}</td>
                            <td>{{ __('39')}}</td>
                            <td>{{ __('2009/09/15')}}</td>
                            <td>{{ __('$205,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Sonya Frost')}}</td>
                            <td>{{ __('Software Engineer')}}</td>
                            <td>{{ __('Edinburgh')}}</td>
                            <td>{{ __('23')}}</td>
                            <td>{{ __('2008/12/13')}}</td>
                            <td>{{ __('$103,600')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Jena Gaines')}}</td>
                            <td>{{ __('Office Manager')}}</td>
                            <td>{{ __('London')}}</td>
                            <td>{{ __('30')}}</td>
                            <td>{{ __('2008/12/19')}}</td>
                            <td>{{ __('$90,560')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Quinn Flynn')}}</td>
                            <td>{{ __('Support Lead')}}</td>
                            <td>{{ __('Edinburgh')}}</td>
                            <td>{{ __('22')}}</td>
                            <td>{{ __('2013/03/03')}}</td>
                            <td>{{ __('$342,000')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Charde Marshall')}}</td>
                            <td>{{ __('Regional Director')}}</td>
                            <td>{{ __('San Francisco')}}</td>
                            <td>{{ __('36')}}</td>
                            <td>{{ __('2008/10/16')}}</td>
                            <td>{{ __('$470,600')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Haley Kennedy')}}</td>
                            <td>{{ __('Senior Marketing Designer')}}</td>
                            <td>{{ __('London')}}</td>
                            <td>{{ __('43')}}</td>
                            <td>{{ __('2012/12/18')}}</td>
                            <td>{{ __('$313,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Tatyana Fitzpatrick')}}</td>
                            <td>{{ __('Regional Director')}}</td>
                            <td>{{ __('London')}}</td>
                            <td>{{ __('19')}}</td>
                            <td>{{ __('2010/03/17')}}</td>
                            <td>{{ __('$385,750')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Michael Silva')}}</td>
                            <td>{{ __('Marketing Designer')}}</td>
                            <td>{{ __('London')}}</td>
                            <td>{{ __('66')}}</td>
                            <td>{{ __('2012/11/27')}}</td>
                            <td>{{ __('$198,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Paul Byrd')}}</td>
                            <td>{{ __('Chief Financial Officer (CFO)')}}</td>
                            <td>{{ __('New York')}}</td>
                            <td>{{ __('64')}}</td>
                            <td>{{ __('2010/06/09')}}</td>
                            <td>{{ __('$725,000')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Gloria Little')}}</td>
                            <td>{{ __('Systems Administrator')}}</td>
                            <td>{{ __('New York')}}</td>
                            <td>{{ __('59')}}</td>
                            <td>{{ __('2009/04/10')}}</td>
                            <td>{{ __('$237,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Bradley Greer')}}</td>
                            <td>{{ __('Software Engineer')}}</td>
                            <td>{{ __('London')}}</td>
                            <td>{{ __('41')}}</td>
                            <td>{{ __('2012/10/13')}}</td>
                            <td>{{ __('$132,000')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Dai Rios')}}</td>
                            <td>{{ __('Personnel Lead')}}</td>
                            <td>{{ __('Edinburgh')}}</td>
                            <td>{{ __('35')}}</td>
                            <td>{{ __('2012/09/26')}}</td>
                            <td>{{ __('$217,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Tiger Nixon')}}</td>
                            <td>{{ __('System Architect')}}</td>
                            <td>{{ __('Edinburgh')}}</td>
                            <td>{{ __('61')}}</td>
                            <td>{{ __('2011/04/25')}}</td>
                            <td>{{ __('$320,800')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Garrett Winters')}}</td>
                            <td>{{ __('Accountant')}}</td>
                            <td>{{ __('Tokyo')}}</td>
                            <td>{{ __('63')}}</td>
                            <td>{{ __('2011/07/25')}}</td>
                            <td>{{ __('$170,750')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Ashton Cox')}}</td>
                            <td>{{ __('Junior Technical Author')}}</td>
                            <td>{{ __('San Francisco')}}</td>
                            <td>{{ __('66')}}</td>
                            <td>{{ __('2009/01/12')}}</td>
                            <td>{{ __('$86,000')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Cedric Kelly')}}</td>
                            <td>{{ __('Senior Javascript Developer')}}</td>
                            <td>{{ __('Edinburgh')}}</td>
                            <td>{{ __('22')}}</td>
                            <td>{{ __('2012/03/29')}}</td>
                            <td>{{ __('$433,060')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Airi Satou')}}</td>
                            <td>{{ __('Accountant')}}</td>
                            <td>{{ __('Tokyo')}}</td>
                            <td>{{ __('33')}}</td>
                            <td>{{ __('2008/11/28')}}</td>
                            <td>{{ __('$162,700')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Brielle Williamson')}}</td>
                            <td>{{ __('Integration Specialist')}}</td>
                            <td>{{ __('New York')}}</td>
                            <td>{{ __('61')}}</td>
                            <td>{{ __('2012/12/02')}}</td>
                            <td>{{ __('$372,000')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Herrod Chandler')}}</td>
                            <td>{{ __('Sales Assistant')}}</td>
                            <td>{{ __('San Francisco')}}</td>
                            <td>{{ __('59')}}</td>
                            <td>{{ __('2012/08/06')}}</td>
                            <td>{{ __('$137,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Rhona Davidson')}}</td>
                            <td>{{ __('Integration Specialist')}}</td>
                            <td>{{ __('Tokyo')}}</td>
                            <td>{{ __('55')}}</td>
                            <td>{{ __('2010/10/14')}}</td>
                            <td>{{ __('$327,900')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Colleen Hurst')}}</td>
                            <td>{{ __('Javascript Developer')}}</td>
                            <td>{{ __('San Francisco')}}</td>
                            <td>{{ __('39')}}</td>
                            <td>{{ __('2009/09/15')}}</td>
                            <td>{{ __('$205,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Sonya Frost')}}</td>
                            <td>{{ __('Software Engineer')}}</td>
                            <td>{{ __('Edinburgh')}}</td>
                            <td>{{ __('23')}}</td>
                            <td>{{ __('2008/12/13')}}</td>
                            <td>{{ __('$103,600')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Jena Gaines')}}</td>
                            <td>{{ __('Office Manager')}}</td>
                            <td>{{ __('London')}}</td>
                            <td>{{ __('30')}}</td>
                            <td>{{ __('2008/12/19')}}</td>
                            <td>{{ __('$90,560')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Quinn Flynn')}}</td>
                            <td>{{ __('Support Lead')}}</td>
                            <td>{{ __('Edinburgh')}}</td>
                            <td>{{ __('22')}}</td>
                            <td>{{ __('2013/03/03')}}</td>
                            <td>{{ __('$342,000')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Charde Marshall')}}</td>
                            <td>{{ __('Regional Director')}}</td>
                            <td>{{ __('San Francisco')}}</td>
                            <td>{{ __('36')}}</td>
                            <td>{{ __('2008/10/16')}}</td>
                            <td>{{ __('$470,600')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Haley Kennedy')}}</td>
                            <td>{{ __('Senior Marketing Designer')}}</td>
                            <td>{{ __('London')}}</td>
                            <td>{{ __('43')}}</td>
                            <td>{{ __('2012/12/18')}}</td>
                            <td>{{ __('$313,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Tatyana Fitzpatrick')}}</td>
                            <td>{{ __('Regional Director')}}</td>
                            <td>{{ __('London')}}</td>
                            <td>{{ __('19')}}</td>
                            <td>{{ __('2010/03/17')}}</td>
                            <td>{{ __('$385,750')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Michael Silva')}}</td>
                            <td>{{ __('Marketing Designer')}}</td>
                            <td>{{ __('London')}}</td>
                            <td>{{ __('66')}}</td>
                            <td>{{ __('2012/11/27')}}</td>
                            <td>{{ __('$198,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Paul Byrd')}}</td>
                            <td>{{ __('Chief Financial Officer (CFO)')}}</td>
                            <td>{{ __('New York')}}</td>
                            <td>{{ __('64')}}</td>
                            <td>{{ __('2010/06/09')}}</td>
                            <td>{{ __('$725,000')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Gloria Little')}}</td>
                            <td>{{ __('Systems Administrator')}}</td>
                            <td>{{ __('New York')}}</td>
                            <td>{{ __('59')}}</td>
                            <td>{{ __('2009/04/10')}}</td>
                            <td>{{ __('$237,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Bradley Greer')}}</td>
                            <td>{{ __('Software Engineer')}}</td>
                            <td>{{ __('London')}}</td>
                            <td>{{ __('41')}}</td>
                            <td>{{ __('2012/10/13')}}</td>
                            <td>{{ __('$132,000')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Dai Rios')}}</td>
                            <td>{{ __('Personnel Lead')}}</td>
                            <td>{{ __('Edinburgh')}}</td>
                            <td>{{ __('35')}}</td>
                            <td>{{ __('2012/09/26')}}</td>
                            <td>{{ __('$217,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Tiger Nixon')}}</td>
                            <td>{{ __('System Architect')}}</td>
                            <td>{{ __('Edinburgh')}}</td>
                            <td>{{ __('61')}}</td>
                            <td>{{ __('2011/04/25')}}</td>
                            <td>{{ __('$320,800')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Garrett Winters')}}</td>
                            <td>{{ __('Accountant')}}</td>
                            <td>{{ __('Tokyo')}}</td>
                            <td>{{ __('63')}}</td>
                            <td>{{ __('2011/07/25')}}</td>
                            <td>{{ __('$170,750')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Ashton Cox')}}</td>
                            <td>{{ __('Junior Technical Author')}}</td>
                            <td>{{ __('San Francisco')}}</td>
                            <td>{{ __('66')}}</td>
                            <td>{{ __('2009/01/12')}}</td>
                            <td>{{ __('$86,000')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Cedric Kelly')}}</td>
                            <td>{{ __('Senior Javascript Developer')}}</td>
                            <td>{{ __('Edinburgh')}}</td>
                            <td>{{ __('22')}}</td>
                            <td>{{ __('2012/03/29')}}</td>
                            <td>{{ __('$433,060')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Airi Satou')}}</td>
                            <td>{{ __('Accountant')}}</td>
                            <td>{{ __('Tokyo')}}</td>
                            <td>{{ __('33')}}</td>
                            <td>{{ __('2008/11/28')}}</td>
                            <td>{{ __('$162,700')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Brielle Williamson')}}</td>
                            <td>{{ __('Integration Specialist')}}</td>
                            <td>{{ __('New York')}}</td>
                            <td>{{ __('61')}}</td>
                            <td>{{ __('2012/12/02')}}</td>
                            <td>{{ __('$372,000')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Herrod Chandler')}}</td>
                            <td>{{ __('Sales Assistant')}}</td>
                            <td>{{ __('San Francisco')}}</td>
                            <td>{{ __('59')}}</td>
                            <td>{{ __('2012/08/06')}}</td>
                            <td>{{ __('$137,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Rhona Davidson')}}</td>
                            <td>{{ __('Integration Specialist')}}</td>
                            <td>{{ __('Tokyo')}}</td>
                            <td>{{ __('55')}}</td>
                            <td>{{ __('2010/10/14')}}</td>
                            <td>{{ __('$327,900')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Colleen Hurst')}}</td>
                            <td>{{ __('Javascript Developer')}}</td>
                            <td>{{ __('San Francisco')}}</td>
                            <td>{{ __('39')}}</td>
                            <td>{{ __('2009/09/15')}}</td>
                            <td>{{ __('$205,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Sonya Frost')}}</td>
                            <td>{{ __('Software Engineer')}}</td>
                            <td>{{ __('Edinburgh')}}</td>
                            <td>{{ __('23')}}</td>
                            <td>{{ __('2008/12/13')}}</td>
                            <td>{{ __('$103,600')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Jena Gaines')}}</td>
                            <td>{{ __('Office Manager')}}</td>
                            <td>{{ __('London')}}</td>
                            <td>{{ __('30')}}</td>
                            <td>{{ __('2008/12/19')}}</td>
                            <td>{{ __('$90,560')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Quinn Flynn')}}</td>
                            <td>{{ __('Support Lead')}}</td>
                            <td>{{ __('Edinburgh')}}</td>
                            <td>{{ __('22')}}</td>
                            <td>{{ __('2013/03/03')}}</td>
                            <td>{{ __('$342,000')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Charde Marshall')}}</td>
                            <td>{{ __('Regional Director')}}</td>
                            <td>{{ __('San Francisco')}}</td>
                            <td>{{ __('36')}}</td>
                            <td>{{ __('2008/10/16')}}</td>
                            <td>{{ __('$470,600')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Haley Kennedy')}}</td>
                            <td>{{ __('Senior Marketing Designer')}}</td>
                            <td>{{ __('London')}}</td>
                            <td>{{ __('43')}}</td>
                            <td>{{ __('2012/12/18')}}</td>
                            <td>{{ __('$313,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Tatyana Fitzpatrick')}}</td>
                            <td>{{ __('Regional Director')}}</td>
                            <td>{{ __('London')}}</td>
                            <td>{{ __('19')}}</td>
                            <td>{{ __('2010/03/17')}}</td>
                            <td>{{ __('$385,750')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Michael Silva')}}</td>
                            <td>{{ __('Marketing Designer')}}</td>
                            <td>{{ __('London')}}</td>
                            <td>{{ __('66')}}</td>
                            <td>{{ __('2012/11/27')}}</td>
                            <td>{{ __('$198,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Paul Byrd')}}</td>
                            <td>{{ __('Chief Financial Officer (CFO)')}}</td>
                            <td>{{ __('New York')}}</td>
                            <td>{{ __('64')}}</td>
                            <td>{{ __('2010/06/09')}}</td>
                            <td>{{ __('$725,000')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Gloria Little')}}</td>
                            <td>{{ __('Systems Administrator')}}</td>
                            <td>{{ __('New York')}}</td>
                            <td>{{ __('59')}}</td>
                            <td>{{ __('2009/04/10')}}</td>
                            <td>{{ __('$237,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Bradley Greer')}}</td>
                            <td>{{ __('Software Engineer')}}</td>
                            <td>{{ __('London')}}</td>
                            <td>{{ __('41')}}</td>
                            <td>{{ __('2012/10/13')}}</td>
                            <td>{{ __('$132,000')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Dai Rios')}}</td>
                            <td>{{ __('Personnel Lead')}}</td>
                            <td>{{ __('Edinburgh')}}</td>
                            <td>{{ __('35')}}</td>
                            <td>{{ __('2012/09/26')}}</td>
                            <td>{{ __('$217,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Tiger Nixon')}}</td>
                            <td>{{ __('System Architect')}}</td>
                            <td>{{ __('Edinburgh')}}</td>
                            <td>{{ __('61')}}</td>
                            <td>{{ __('2011/04/25')}}</td>
                            <td>{{ __('$320,800')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Garrett Winters')}}</td>
                            <td>{{ __('Accountant')}}</td>
                            <td>{{ __('Tokyo')}}</td>
                            <td>{{ __('63')}}</td>
                            <td>{{ __('2011/07/25')}}</td>
                            <td>{{ __('$170,750')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Ashton Cox')}}</td>
                            <td>{{ __('Junior Technical Author')}}</td>
                            <td>{{ __('San Francisco')}}</td>
                            <td>{{ __('66')}}</td>
                            <td>{{ __('2009/01/12')}}</td>
                            <td>{{ __('$86,000')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Cedric Kelly')}}</td>
                            <td>{{ __('Senior Javascript Developer')}}</td>
                            <td>{{ __('Edinburgh')}}</td>
                            <td>{{ __('22')}}</td>
                            <td>{{ __('2012/03/29')}}</td>
                            <td>{{ __('$433,060')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Airi Satou')}}</td>
                            <td>{{ __('Accountant')}}</td>
                            <td>{{ __('Tokyo')}}</td>
                            <td>{{ __('33')}}</td>
                            <td>{{ __('2008/11/28')}}</td>
                            <td>{{ __('$162,700')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Brielle Williamson')}}</td>
                            <td>{{ __('Integration Specialist')}}</td>
                            <td>{{ __('New York')}}</td>
                            <td>{{ __('61')}}</td>
                            <td>{{ __('2012/12/02')}}</td>
                            <td>{{ __('$372,000')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Herrod Chandler')}}</td>
                            <td>{{ __('Sales Assistant')}}</td>
                            <td>{{ __('San Francisco')}}</td>
                            <td>{{ __('59')}}</td>
                            <td>{{ __('2012/08/06')}}</td>
                            <td>{{ __('$137,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Rhona Davidson')}}</td>
                            <td>{{ __('Integration Specialist')}}</td>
                            <td>{{ __('Tokyo')}}</td>
                            <td>{{ __('55')}}</td>
                            <td>{{ __('2010/10/14')}}</td>
                            <td>{{ __('$327,900')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Colleen Hurst')}}</td>
                            <td>{{ __('Javascript Developer')}}</td>
                            <td>{{ __('San Francisco')}}</td>
                            <td>{{ __('39')}}</td>
                            <td>{{ __('2009/09/15')}}</td>
                            <td>{{ __('$205,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Sonya Frost')}}</td>
                            <td>{{ __('Software Engineer')}}</td>
                            <td>{{ __('Edinburgh')}}</td>
                            <td>{{ __('23')}}</td>
                            <td>{{ __('2008/12/13')}}</td>
                            <td>{{ __('$103,600')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Jena Gaines')}}</td>
                            <td>{{ __('Office Manager')}}</td>
                            <td>{{ __('London')}}</td>
                            <td>{{ __('30')}}</td>
                            <td>{{ __('2008/12/19')}}</td>
                            <td>{{ __('$90,560')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Quinn Flynn')}}</td>
                            <td>{{ __('Support Lead')}}</td>
                            <td>{{ __('Edinburgh')}}</td>
                            <td>{{ __('22')}}</td>
                            <td>{{ __('2013/03/03')}}</td>
                            <td>{{ __('$342,000')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Charde Marshall')}}</td>
                            <td>{{ __('Regional Director')}}</td>
                            <td>{{ __('San Francisco')}}</td>
                            <td>{{ __('36')}}</td>
                            <td>{{ __('2008/10/16')}}</td>
                            <td>{{ __('$470,600')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Haley Kennedy')}}</td>
                            <td>{{ __('Senior Marketing Designer')}}</td>
                            <td>{{ __('London')}}</td>
                            <td>{{ __('43')}}</td>
                            <td>{{ __('2012/12/18')}}</td>
                            <td>{{ __('$313,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Tatyana Fitzpatrick')}}</td>
                            <td>{{ __('Regional Director')}}</td>
                            <td>{{ __('London')}}</td>
                            <td>{{ __('19')}}</td>
                            <td>{{ __('2010/03/17')}}</td>
                            <td>{{ __('$385,750')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Michael Silva')}}</td>
                            <td>{{ __('Marketing Designer')}}</td>
                            <td>{{ __('London')}}</td>
                            <td>{{ __('66')}}</td>
                            <td>{{ __('2012/11/27')}}</td>
                            <td>{{ __('$198,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Paul Byrd')}}</td>
                            <td>{{ __('Chief Financial Officer (CFO)')}}</td>
                            <td>{{ __('New York')}}</td>
                            <td>{{ __('64')}}</td>
                            <td>{{ __('2010/06/09')}}</td>
                            <td>{{ __('$725,000')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Gloria Little')}}</td>
                            <td>{{ __('Systems Administrator')}}</td>
                            <td>{{ __('New York')}}</td>
                            <td>{{ __('59')}}</td>
                            <td>{{ __('2009/04/10')}}</td>
                            <td>{{ __('$237,500')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Bradley Greer')}}</td>
                            <td>{{ __('Software Engineer')}}</td>
                            <td>{{ __('London')}}</td>
                            <td>{{ __('41')}}</td>
                            <td>{{ __('2012/10/13')}}</td>
                            <td>{{ __('$132,000')}}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Dai Rios')}}</td>
                            <td>{{ __('Personnel Lead')}}</td>
                            <td>{{ __('Edinburgh')}}</td>
                            <td>{{ __('35')}}</td>
                            <td>{{ __('2012/09/26')}}</td>
                            <td>{{ __('$217,500')}}</td>
                        </tr>
                    </tbody>

                </table>
            </div>
        </div>
    </div>




    <div class="card tab" style="display:none; " id="Developer_Grid">

        <div class="card-header d-block">
            <h3>{{ __('Grid View')}}</h3>
        </div>


        <div class="card-body">
            <div class="dt-responsive">
                <div class="row">

                    <div class="col-md-3">
                        <div class="card sale-card">
                            <div class="card-body text-center">
                                <div class="profile-pic mb-20" style=" display: flex;column-gap: 10px;">
                                    <div data-label="40%"
                                        class="radial-bar radial-bar-40 radial-bar-lg radial-bar-danger"
                                        style="margin: 0px;">
                                        <img src="../img/users/3.jpg" alt="User-Image">
                                    </div>
                                    <div>
                                        <h4 class="mt-15 mb-0">John Doe</h4>
                                        <a href="#">3 years Exp </a>
                                    </div>
                                </div>
                                <div class="badge badge-pill badge-dark">Dashboard</div>
                                <div class="badge badge-pill badge-dark">UI</div>
                                <div class="badge badge-pill badge-dark">UX</div>
                                <div class="badge badge-pill badge-info" data-toggle="tooltip" data-placement="top"
                                    title="3 more">+3</div>
                            </div>
                            <div class="p-4 border-top mt-15">
                                <div class="row text-center">
                                    <div class="col-6 border-right">
                                        <a href="#" class="link d-flex align-items-center justify-content-center"><i
                                                class="ik ik-message-square f-20 mr-5"></i>Message</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="#" class="link d-flex align-items-center justify-content-center"><i
                                                class="ik ik-box f-20 mr-5"></i>Portfolio</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card sale-card">
                            <div class="card-body text-center">
                                <div class="profile-pic mb-20" style=" display: flex;column-gap: 10px;">
                                    <div data-label="40%"
                                        class="radial-bar radial-bar-40 radial-bar-lg radial-bar-danger"
                                        style="margin: 0px;">
                                        <img src="../img/users/3.jpg" alt="User-Image">
                                    </div>
                                    <div>
                                        <h4 class="mt-15 mb-0">John Doe</h4>
                                        <a href="#">3 years Exp </a>
                                    </div>
                                </div>
                                <div class="badge badge-pill badge-dark">Dashboard</div>
                                <div class="badge badge-pill badge-dark">UI</div>
                                <div class="badge badge-pill badge-dark">UX</div>
                                <div class="badge badge-pill badge-info" data-toggle="tooltip" data-placement="top"
                                    title="3 more">+3</div>
                            </div>
                            <div class="p-4 border-top mt-15">
                                <div class="row text-center">
                                    <div class="col-6 border-right">
                                        <a href="#" class="link d-flex align-items-center justify-content-center"><i
                                                class="ik ik-message-square f-20 mr-5"></i>Message</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="#" class="link d-flex align-items-center justify-content-center"><i
                                                class="ik ik-box f-20 mr-5"></i>Portfolio</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card sale-card">
                            <div class="card-body text-center">
                                <div class="profile-pic mb-20" style=" display: flex;column-gap: 10px;">
                                    <div data-label="40%"
                                        class="radial-bar radial-bar-40 radial-bar-lg radial-bar-danger"
                                        style="margin: 0px;">
                                        <img src="../img/users/3.jpg" alt="User-Image">
                                    </div>
                                    <div>
                                        <h4 class="mt-15 mb-0">John Doe</h4>
                                        <a href="#">3 years Exp </a>
                                    </div>
                                </div>
                                <div class="badge badge-pill badge-dark">Dashboard</div>
                                <div class="badge badge-pill badge-dark">UI</div>
                                <div class="badge badge-pill badge-dark">UX</div>
                                <div class="badge badge-pill badge-info" data-toggle="tooltip" data-placement="top"
                                    title="3 more">+3</div>
                            </div>
                            <div class="p-4 border-top mt-15">
                                <div class="row text-center">
                                    <div class="col-6 border-right">
                                        <a href="#" class="link d-flex align-items-center justify-content-center"><i
                                                class="ik ik-message-square f-20 mr-5"></i>Message</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="#" class="link d-flex align-items-center justify-content-center"><i
                                                class="ik ik-box f-20 mr-5"></i>Portfolio</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card sale-card">
                            <div class="card-body text-center">
                                <div class="profile-pic mb-20" style=" display: flex;column-gap: 10px;">
                                    <div data-label="40%"
                                        class="radial-bar radial-bar-40 radial-bar-lg radial-bar-danger"
                                        style="margin: 0px;">
                                        <img src="../img/users/3.jpg" alt="User-Image">
                                    </div>
                                    <div>
                                        <h4 class="mt-15 mb-0">John Doe</h4>
                                        <a href="#">3 years Exp </a>
                                    </div>
                                </div>
                                <div class="badge badge-pill badge-dark">Dashboard</div>
                                <div class="badge badge-pill badge-dark">UI</div>
                                <div class="badge badge-pill badge-dark">UX</div>
                                <div class="badge badge-pill badge-info" data-toggle="tooltip" data-placement="top"
                                    title="3 more">+3</div>
                            </div>
                            <div class="p-4 border-top mt-15">
                                <div class="row text-center">
                                    <div class="col-6 border-right">
                                        <a href="#" class="link d-flex align-items-center justify-content-center"><i
                                                class="ik ik-message-square f-20 mr-5"></i>Message</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="#" class="link d-flex align-items-center justify-content-center"><i
                                                class="ik ik-box f-20 mr-5"></i>Portfolio</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card sale-card">
                            <div class="card-body text-center">
                                <div class="profile-pic mb-20" style=" display: flex;column-gap: 10px;">
                                    <div data-label="40%"
                                        class="radial-bar radial-bar-40 radial-bar-lg radial-bar-danger"
                                        style="margin: 0px;">
                                        <img src="../img/users/3.jpg" alt="User-Image">
                                    </div>
                                    <div>
                                        <h4 class="mt-15 mb-0">John Doe</h4>
                                        <a href="#">3 years Exp </a>
                                    </div>
                                </div>
                                <div class="badge badge-pill badge-dark">Dashboard</div>
                                <div class="badge badge-pill badge-dark">UI</div>
                                <div class="badge badge-pill badge-dark">UX</div>
                                <div class="badge badge-pill badge-info" data-toggle="tooltip" data-placement="top"
                                    title="3 more">+3</div>
                            </div>
                            <div class="p-4 border-top mt-15">
                                <div class="row text-center">
                                    <div class="col-6 border-right">
                                        <a href="#" class="link d-flex align-items-center justify-content-center"><i
                                                class="ik ik-message-square f-20 mr-5"></i>Message</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="#" class="link d-flex align-items-center justify-content-center"><i
                                                class="ik ik-box f-20 mr-5"></i>Portfolio</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card sale-card">
                            <div class="card-body text-center">
                                <div class="profile-pic mb-20" style=" display: flex;column-gap: 10px;">
                                    <div data-label="40%"
                                        class="radial-bar radial-bar-40 radial-bar-lg radial-bar-danger"
                                        style="margin: 0px;">
                                        <img src="../img/users/3.jpg" alt="User-Image">
                                    </div>
                                    <div>
                                        <h4 class="mt-15 mb-0">John Doe</h4>
                                        <a href="#">3 years Exp </a>
                                    </div>
                                </div>
                                <div class="badge badge-pill badge-dark">Dashboard</div>
                                <div class="badge badge-pill badge-dark">UI</div>
                                <div class="badge badge-pill badge-dark">UX</div>
                                <div class="badge badge-pill badge-info" data-toggle="tooltip" data-placement="top"
                                    title="3 more">+3</div>
                            </div>
                            <div class="p-4 border-top mt-15">
                                <div class="row text-center">
                                    <div class="col-6 border-right">
                                        <a href="#" class="link d-flex align-items-center justify-content-center"><i
                                                class="ik ik-message-square f-20 mr-5"></i>Message</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="#" class="link d-flex align-items-center justify-content-center"><i
                                                class="ik ik-box f-20 mr-5"></i>Portfolio</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card sale-card">
                            <div class="card-body text-center">
                                <div class="profile-pic mb-20" style=" display: flex;column-gap: 10px;">
                                    <div data-label="40%"
                                        class="radial-bar radial-bar-40 radial-bar-lg radial-bar-danger"
                                        style="margin: 0px;">
                                        <img src="../img/users/3.jpg" alt="User-Image">
                                    </div>
                                    <div>
                                        <h4 class="mt-15 mb-0">John Doe</h4>
                                        <a href="#">3 years Exp </a>
                                    </div>
                                </div>
                                <div class="badge badge-pill badge-dark">Dashboard</div>
                                <div class="badge badge-pill badge-dark">UI</div>
                                <div class="badge badge-pill badge-dark">UX</div>
                                <div class="badge badge-pill badge-info" data-toggle="tooltip" data-placement="top"
                                    title="3 more">+3</div>
                            </div>
                            <div class="p-4 border-top mt-15">
                                <div class="row text-center">
                                    <div class="col-6 border-right">
                                        <a href="#" class="link d-flex align-items-center justify-content-center"><i
                                                class="ik ik-message-square f-20 mr-5"></i>Message</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="#" class="link d-flex align-items-center justify-content-center"><i
                                                class="ik ik-box f-20 mr-5"></i>Portfolio</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card sale-card">
                            <div class="card-body text-center">
                                <div class="profile-pic mb-20" style=" display: flex;column-gap: 10px;">
                                    <div data-label="40%"
                                        class="radial-bar radial-bar-40 radial-bar-lg radial-bar-danger"
                                        style="margin: 0px;">
                                        <img src="../img/users/3.jpg" alt="User-Image">
                                    </div>
                                    <div>
                                        <h4 class="mt-15 mb-0">John Doe</h4>
                                        <a href="#">3 years Exp </a>
                                    </div>
                                </div>
                                <div class="badge badge-pill badge-dark">Dashboard</div>
                                <div class="badge badge-pill badge-dark">UI</div>
                                <div class="badge badge-pill badge-dark">UX</div>
                                <div class="badge badge-pill badge-info" data-toggle="tooltip" data-placement="top"
                                    title="3 more">+3</div>
                            </div>
                            <div class="p-4 border-top mt-15">
                                <div class="row text-center">
                                    <div class="col-6 border-right">
                                        <a href="#" class="link d-flex align-items-center justify-content-center"><i
                                                class="ik ik-message-square f-20 mr-5"></i>Message</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="#" class="link d-flex align-items-center justify-content-center"><i
                                                class="ik ik-box f-20 mr-5"></i>Portfolio</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card sale-card">
                            <div class="card-body text-center">
                                <div class="profile-pic mb-20" style=" display: flex;column-gap: 10px;">
                                    <div data-label="40%"
                                        class="radial-bar radial-bar-40 radial-bar-lg radial-bar-danger"
                                        style="margin: 0px;">
                                        <img src="../img/users/3.jpg" alt="User-Image">
                                    </div>
                                    <div>
                                        <h4 class="mt-15 mb-0">John Doe</h4>
                                        <a href="#">3 years Exp </a>
                                    </div>
                                </div>
                                <div class="badge badge-pill badge-dark">Dashboard</div>
                                <div class="badge badge-pill badge-dark">UI</div>
                                <div class="badge badge-pill badge-dark">UX</div>
                                <div class="badge badge-pill badge-info" data-toggle="tooltip" data-placement="top"
                                    title="3 more">+3</div>
                            </div>
                            <div class="p-4 border-top mt-15">
                                <div class="row text-center">
                                    <div class="col-6 border-right">
                                        <a href="#" class="link d-flex align-items-center justify-content-center"><i
                                                class="ik ik-message-square f-20 mr-5"></i>Message</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="#" class="link d-flex align-items-center justify-content-center"><i
                                                class="ik ik-box f-20 mr-5"></i>Portfolio</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card sale-card">
                            <div class="card-body text-center">
                                <div class="profile-pic mb-20" style=" display: flex;column-gap: 10px;">
                                    <div data-label="40%"
                                        class="radial-bar radial-bar-40 radial-bar-lg radial-bar-danger"
                                        style="margin: 0px;">
                                        <img src="../img/users/3.jpg" alt="User-Image">
                                    </div>
                                    <div>
                                        <h4 class="mt-15 mb-0">John Doe</h4>
                                        <a href="#">3 years Exp </a>
                                    </div>
                                </div>
                                <div class="badge badge-pill badge-dark">Dashboard</div>
                                <div class="badge badge-pill badge-dark">UI</div>
                                <div class="badge badge-pill badge-dark">UX</div>
                                <div class="badge badge-pill badge-info" data-toggle="tooltip" data-placement="top"
                                    title="3 more">+3</div>
                            </div>
                            <div class="p-4 border-top mt-15">
                                <div class="row text-center">
                                    <div class="col-6 border-right">
                                        <a href="#" class="link d-flex align-items-center justify-content-center"><i
                                                class="ik ik-message-square f-20 mr-5"></i>Message</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="#" class="link d-flex align-items-center justify-content-center"><i
                                                class="ik ik-box f-20 mr-5"></i>Portfolio</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card sale-card">
                            <div class="card-body text-center">
                                <div class="profile-pic mb-20" style=" display: flex;column-gap: 10px;">
                                    <div data-label="40%"
                                        class="radial-bar radial-bar-40 radial-bar-lg radial-bar-danger"
                                        style="margin: 0px;">
                                        <img src="../img/users/3.jpg" alt="User-Image">
                                    </div>
                                    <div>
                                        <h4 class="mt-15 mb-0">John Doe</h4>
                                        <a href="#">3 years Exp </a>
                                    </div>
                                </div>
                                <div class="badge badge-pill badge-dark">Dashboard</div>
                                <div class="badge badge-pill badge-dark">UI</div>
                                <div class="badge badge-pill badge-dark">UX</div>
                                <div class="badge badge-pill badge-info" data-toggle="tooltip" data-placement="top"
                                    title="3 more">+3</div>
                            </div>
                            <div class="p-4 border-top mt-15">
                                <div class="row text-center">
                                    <div class="col-6 border-right">
                                        <a href="#" class="link d-flex align-items-center justify-content-center"><i
                                                class="ik ik-message-square f-20 mr-5"></i>Message</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="#" class="link d-flex align-items-center justify-content-center"><i
                                                class="ik ik-box f-20 mr-5"></i>Portfolio</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card sale-card">
                            <div class="card-body text-center">
                                <div class="profile-pic mb-20" style=" display: flex;column-gap: 10px;">
                                    <div data-label="40%"
                                        class="radial-bar radial-bar-40 radial-bar-lg radial-bar-danger"
                                        style="margin: 0px;">
                                        <img src="../img/users/3.jpg" alt="User-Image">
                                    </div>
                                    <div>
                                        <h4 class="mt-15 mb-0">John Doe</h4>
                                        <a href="#">3 years Exp </a>
                                    </div>
                                </div>
                                <div class="badge badge-pill badge-dark">Dashboard</div>
                                <div class="badge badge-pill badge-dark">UI</div>
                                <div class="badge badge-pill badge-dark">UX</div>
                                <div class="badge badge-pill badge-info" data-toggle="tooltip" data-placement="top"
                                    title="3 more">+3</div>
                            </div>
                            <div class="p-4 border-top mt-15">
                                <div class="row text-center">
                                    <div class="col-6 border-right">
                                        <a href="#" class="link d-flex align-items-center justify-content-center"><i
                                                class="ik ik-message-square f-20 mr-5"></i>Message</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="#" class="link d-flex align-items-center justify-content-center"><i
                                                class="ik ik-box f-20 mr-5"></i>Portfolio</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
<script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>
<script src="{{ asset('js/datatables.js') }}"></script>
@endpush


@endsection
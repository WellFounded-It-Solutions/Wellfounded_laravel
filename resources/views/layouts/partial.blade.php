<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>@yield('title', '') | Radmin - Laravel Admin Starter</title>
    <!-- initiate head with meta tags, css and script -->
    @include('include.head')
    <style>
        .content_design {
            background-color: #F6F7FB;
            padding: 50px 0;
        }
    </style>
</head>

<body id="app">
    <div class="wrapper">
        <div class="page-wrap">

            <div class="content_design">
                <!-- yeild contents here -->
                @yield('content')
            </div>

            <!-- initiate footer section-->
            @include('include.footer')

        </div>
    </div>
    <!-- initiate scripts-->
    @include('include.script')
</body>

</html>

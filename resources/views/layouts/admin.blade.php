<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>RivalAppz - User Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="">
    <meta name="msapplication-tap-highlight" content="no">

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>

    <link href="{{ url('assets/css/main.css') }}" rel="stylesheet">
    <link href="{{ url('assets/css/custom.css') }}" rel="stylesheet">

    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
	<script type="text/javascript" src="{{ url('assets/scripts/main.js') }}"></script>
	
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
	<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

    <script src="{{ asset('assets/scripts/sweetalert/sweetalert.min.js') }}"></script>

    <style>
        input[readonly] {
            cursor: text;
            background-color: #fff !important;
        }
    </style>

</head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">

    	<!-- Top Header -->
        @include('../lib/header')

        <!-- UI Theme Settings -->
        @include('../lib/theme_settings')   

        Main Section
        <div class="app-main">
        	<!-- Side Bar -->
            @include('../lib/sidebar')  

            <div class="app-main__outer">
            	<!-- Main Content -->
                @yield('content')

                <!-- Footer -->
                @include('../lib/footer')
            </div>   
        </div>
    </div>

    @yield('script')
</body>
</html>

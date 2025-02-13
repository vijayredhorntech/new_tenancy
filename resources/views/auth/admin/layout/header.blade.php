<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title> @yield('title','HSGroup')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    
    @yield('style')

    <!-- Favicon -->
   @include('auth.admin.layout.link')

   <style>

        * {
            margin: 0px;
            padding: 0px;
        }


        .dropdown-option {
            padding-top: 10px;
            padding-bottom: 10px;
            padding-left: 2.5rem;
            padding-right: 2.5rem;
            border-top: 1px solid #f3f4f6;
            border-bottom: 1px solid #f3f4f6;
        }

        .dropdown-option:hover {
            background-color: rgba(255, 66, 22, 0.13);
            border-bottom:1px solid #ff4216;
            border-top:1px solid #ff4216;
            cursor: pointer;
            transition: all 0.6s;
        }

         input[type="date"]::-webkit-inner-spin-button,
         input[type="date"]::-webkit-calendar-picker-indicator {
             display: none !important;
             -webkit-appearance: none !important;
         }
        select {
            -webkit-appearance: none !important; /* Hides the arrow in WebKit-based browsers (Chrome, Safari, Edge) */
            -moz-appearance: none !important;    /* Hides the arrow in Firefox */
            appearance: none !important;         /* Standard property */
            background: #f3f4f6 !important ;         /* Removes background if needed */
        }
    </style>

</head>
<body>
    <div class="w-100 position-relative bg-center bg-cover d-flex p-0"  >
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
       @include('auth.admin.layout.sidebar')
        <div class="content">
            @include('auth.admin.layout.navbar')
             <div style="min-height: 93.2vh; background: linear-gradient(rgba(0,0,0,0.68), rgba(0,0,0,0.5)), url({{asset('assets/images/backgroundImage.jpg')}}); background-size: cover; background-position: center;">
                 @yield('content')
             </div>
        </div>
    </div>
    @yield('admin_script')
    <!-- JavaScript Libraries -->

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/admin/lib/chart/chart.min.js"></script>
    <script src="/admin/lib/easing/easing.min.js"></script>
    <script src="/admin/lib/waypoints/waypoints.min.js"></script>
    <script src="/admin/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="/admin/lib/tempusdominus/js/moment.min.js"></script>
    <script src="/admin/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="/admin/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="/admin/js/main.js"></script>
    <script src="/admin/js/custom_admin.js"></script>

</body>

</html>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>@yield('title')</title>

    <!-- vendor css -->
    <link href="{{asset('assets/backend/lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('assets/backend/lib/Ionicons/css/ionicons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/backend/lib/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet">
    <link href="{{asset('assets/backend/lib/datatables/jquery.dataTables.css')}}" rel="stylesheet">
    <link href="{{asset('assets/backend/lib/rickshaw/rickshaw.min.css')}}"  rel="stylesheet">
    <link href="{{asset('assets/backend/lib/highlightjs/github.css')}}" rel="stylesheet">
    <link href="{{asset('assets/backend/lib/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/backend/lib/summernote/summernote-bs4.css')}}" rel="stylesheet">
    <link href="{{asset('assets/backend/lib/spectrum/spectrum.css')}}" rel="stylesheet">
    <link href="{{asset('assets/backend/lib/tagsinput/bootstrap-tagsinput.css')}}" rel="stylesheet">

    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{asset('assets/backend/css/starlight.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/style.css')}}">
  </head>

  <body>

    <!-- ########## START: LEFT PANEL ########## -->
    @include('admin.inc.logo')
    @include('admin.inc.sidebar')
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    @include('admin.inc.header')
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: RIGHT PANEL ########## -->
    
    <!-- ########## END: RIGHT PANEL ########## --->

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        @yield('content')
        <!-- row -->
      {{-- @include('admin.inc.footer') --}}
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <script src="{{asset('assets/backend/lib/jquery/jquery.js')}}"></script>
    <script src="{{asset('assets/backend/lib/popper.js/popper.js')}}"></script>
    <script src="{{asset('assets/backend/lib/bootstrap/bootstrap.js')}}"></script>
    <script src="{{asset('assets/backend/lib/jquery-ui/jquery-ui.js')}}"></script>
    <script src="{{asset('assets/backend/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js')}}"></script>
    <script src="{{asset('assets/backend/lib/jquery.sparkline.bower/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('assets/backend/lib/d3/d3.js')}}"></script>
    <script src="{{asset('assets/backend/lib/rickshaw/rickshaw.min.js')}}"></script>
    <script src="{{asset('assets/backend/lib/chart.js/Chart.js')}}"></script>
    <script src="{{asset('assets/backend/lib/Flot/jquery.flot.js')}}"></script>
    <script src="{{asset('assets/backend/lib/Flot/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('assets/backend/lib/Flot/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('assets/backend/lib/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('assets/backend/lib/datatables-responsive/dataTables.responsive.js')}}"></script>
    <script src="{{asset('assets/backend/lib/flot-spline/jquery.flot.spline.js')}}"></script>
    <script src="{{asset('assets/backend/lib/highlightjs/highlight.pack.js')}}"></script>
    <script src="{{asset('assets/backend/lib/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/backend/lib/spectrum/spectrum.js')}}"></script>
    <script src="{{asset('assets/backend/lib/summernote/summernote-bs4.min.js')}}"></script>
    <script src="{{asset('assets/backend/lib/tagsinput/bootstrap-tagsinput.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/backend/js/sweetalert2@11.js')}}"></script>
    <script src="{{asset('assets/backend/js/starlight.js')}}"></script>
    <script src="{{asset('assets/backend/js/ResizeSensor.js')}}"></script>
    <script src="{{asset('assets/backend/js/dashboard.js')}}"></script>
    <script src="{{asset('assets/backend/js/custom.js')}}"></script>
    @yield('scripts')
  </body>
</html>

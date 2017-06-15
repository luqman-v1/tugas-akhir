<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{url('bootstrap/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{url('plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
  <link rel="stylesheet" href="{{url('plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}">
  <link rel="stylesheet" href="{{url('plugins/pace/pace.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{url('dist/css/skins/_all-skins.min.css')}}">
  <link href="{{ url('dist/sweetalert.css') }}" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{url('plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}">
  <link rel="stylesheet" href="{{url('plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}">
  <link rel="stylesheet" href="{{url('css/style.css')}}">

  @yield('css')

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-yellow sidebar-mini">
<div class="wrapper">

   @include('layouts.header')
   @include('layouts.side')

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    @yield('content')
    
  </div>
  <!-- /.content-wrapper -->

  @include('layouts.footer')


</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="{{url('plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{url('bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{url('plugins/chained/jquery.chained.js')}}"></script>
<!-- FastClick -->
<script src="{{url('plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('dist/js/app.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{url('plugins/sparkline/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{url('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{url('plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- SlimScroll 1.3.0 -->
<script src="{{url('plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- ChartJS 1.0.1 -->
<script src="{{url('plugins/chartjs/Chart.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <script src="{{url('dist/js/pages/dashboard2.js')}}"></script> --}}
<!-- AdminLTE for demo purposes -->
<script src="{{url('dist/js/demo.js')}}"></script>
<script src="{{url('dist/sweetalert.min.js') }}"></script>
<script src="{{url('dist/sweetalert-dev.js') }}"></script>
<!-- DataTables -->
  <!-- Jquery DataTable Plugin Js -->
    <script src="{{url('plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
    <script src="{{url('plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
    <script src="{{url('plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
    <script src="{{url('plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
    <script src="{{url('plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script>
    <script src="{{url('plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>
    <script src="{{url('plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
    <script src="{{url('plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
    <script src="{{url('plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>
{{-- tag input --}}
<script src="{{url('plugins/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>
{{-- validation --}}
<script src="{{url('plugins/jquery-validation/jquery.validate.js')}}"></script>
<script src="{{url('plugins/jquery-validation/form-validation.js')}}"></script>
<script src="{{url('plugins/pace/pace.min.js')}}"></script>
<script src="{{url('plugins/momentjs/moment.js')}}"></script>
<script src="{{url('plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>



@include('sweet::alert')
@yield('js')
</body>
</html>

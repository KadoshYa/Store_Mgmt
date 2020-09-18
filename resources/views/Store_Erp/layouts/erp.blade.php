<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title','Adika Erp')</title>
    <link rel="icon" href="{{asset('Store_Erp/img/favicon.png')}}">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('Store_Erp/asset/css/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Store_Erp/asset/css/dataTables.bootstrap4.css') }}">    
   <!-- Theme style -->
   <link rel="stylesheet" href="{{ asset('Store_Erp/asset/css/adminlte.min.css') }}">
   <!-- overlayScrollbars -->
   <link rel="stylesheet" href="{{ asset('Store_Erp/asset/css/OverlayScrollbars.min.css') }}">
   <link rel="stylesheet" href="{{ asset('Store_Erp/asset/css/sweetalert2.min.css') }}">
   <link rel="stylesheet" href="{{ asset('Store_Erp/asset/css/toastr.min.css') }}" >
 
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">
</head>
<body>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">

@include('Store_Erp.layouts.header')
@include('Store_Erp.layouts.nav')

<!--main-container-part-->

<div class="content-wrapper">

@yield('content')
        

</div>
@include('Store_Erp.layouts.footer')

<!-- jQuery -->

</div>
<!-- ./wrapper -->

<script src="{{ asset('Store_Erp/asset/js/jquery.min.js') }}"></script>

<script src="{{ asset('Store_Erp/asset/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('Store_Erp/asset/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('Store_Erp/asset/js/adminlte.min.js') }}"></script>

<!-- DataTables -->
<script src="{{ asset('Store_Erp/asset/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('Store_Erp/asset/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('Store_Erp/asset/js/sweetalert2.min.js') }}"></script>
<script src="{{ asset('Store_Erp/asset/js/toastr.min.js') }}" ></script> 
<!-- AdminLTE App -->
<script>
  $(function () {
    $("#example1").DataTable({  });;
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>    


@yield('jsblock')
<script>

@if(Session::has('success'))
toastr.success("{{Session::get('success')}}");
@endif
@if(Session::has('info'))
toastr.info("Adika Help Center", "{{Session::get('info')}}");
@endif
@if(Session::has('warning'))
toastr.warning("{{Session::get('warning')}}");
@endif
@if(Session::has('error'))
toastr.error("Failed!", "{{Session::get('error')}}", {
            "timeOut": "0",
            "extendedTImeout": "0"
        });
@endif
</script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Schoolpay - Dashboard</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="{{asset('dashboard/assets/images/favicon.png')}}">

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="{{asset('dashboard/assets/plugins/morris/morris.css')}}">

    <!-- Sweet Alert -->
    <link href="{{asset('dashboard/assets/plugins/sweet-alert2/sweetalert2.min.css')}}" rel="stylesheet">

    <!-- DataTables -->
    <link href="{{asset('dashboard/assets/plugins/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('dashboard/assets/plugins/datatables/buttons.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('dashboard/assets/plugins/datatables/responsive.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('dashboard/assets/plugins/datatables/scroller.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('dashboard/assets/plugins/datatables/dataTables.colVis.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('dashboard/assets/plugins/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('dashboard/assets/plugins/datatables/fixedColumns.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('dashboard/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Icons CSS -->
    <link href="{{asset('dashboard/assets/css/icons.css')}}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{asset('dashboard/assets/css/style.css')}}" rel="stylesheet">

</head>


<body>

    <div id="page-wrapper">
        <!-- navbar -->
        @include('inc.dashnav')
        <!-- body content -->
        @yield('content')

    </div>
    <!-- End #page-wrapper -->



    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{asset('dashboard/assets/js/jquery-2.1.4.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/jquery.slimscroll.min.js')}}"></script>
    <!-- js for flip -->
    <script src="{{asset('dashboard/assets/js/jquery.flip.js')}}"></script>
    <!-- custom js -->
    <script src="{{asset('dashboard/assets/js/customjs.js')}}"></script>

    <!--Morris Chart-->
    <script src="{{asset('dashboard/assets/plugins/morris/morris.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/plugins/raphael/raphael-min.js')}}"></script>

    <!-- Dashboard init -->
    <script src="{{asset('dashboard/assets/pages/jquery.dashboard.js')}}"></script>

    <!-- Sweet-Alert  -->
    <script src="{{asset('dashboard/assets/plugins/sweet-alert2/sweetalert2.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/pages/jquery.sweet-alert.init.js')}}"></script>

    <!-- Datatable js -->
    <script src="{{asset('dashboard/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/plugins/datatables/dataTables.bootstrap.js')}}"></script>
    <script src="{{asset('dashboard/assets/plugins/datatables/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/plugins/datatables/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/plugins/datatables/jszip.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/plugins/datatables/pdfmake.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/plugins/datatables/vfs_fonts.js')}}"></script>
    <script src="{{asset('dashboard/assets/plugins/datatables/buttons.html5.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/plugins/datatables/buttons.print.min.js')}}"></script>
    <!-- init -->
    <script src="{{asset('dashboard/assets/pages/jquery.datatables.init.js')}}"></script>

    <!-- App Js -->
    <script src="{{asset('dashboard/assets/js/jquery.app.js')}}"></script>

</body>
</html>
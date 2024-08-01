<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>NIMA | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{asset('nima.png')}}" alt="NIMA_LOGO" height="60" width="60">
        </div>

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">


                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </li>
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/" class="brand-link" style="text-decoration: none;">
                <img src="{{ asset('nima.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">NIMA Association</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        @if (Auth::check())
                            <a href="{{route('profile.index')}}" class="d-block" style="text-decoration: none;">{{ Auth::user()->name }}</a>
                        @else
                            <p class="btn btn-danger">Please Login</p>
                        @endif

                    </div>
                </div>

                <!-- SidebarSearch Form -->


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        @if (Auth::check())
                        @if (Auth::user()->role=='dean')
                     
                    
                            
                        
                        <li class="nav-item">
                            <a href="{{ route('students.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-database"></i>
                                <p>
                                    Students
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('teachers.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-chalkboard-teacher"></i>
                                <p>
                                    Teachers
                                </p>
                            </a>
                        </li>
                        <li class="nav-item"><a href="{{route('staff.index')}}" class="nav-link"><i class="nav-icon fas fa-user"></i>
                        <p>Staff</p>
                        </a></li>
                        <li class="nav-item">
                            <a href="{{ route('department.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-pen-nib"></i>
                                <p>
                                     Departments
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('semester.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p> Semesters</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('income.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-dollar"></i>
                                <p>
                                    Incomes
                                </p>
                            </a>
                        </li>
                        <li class="nav-item"><a href="{{ route('expenses.index') }}" class="nav-link"><i
                                    class="nav-icon fas fa-dollar"></i>
                                    <p>
                                Expenses</p>
                                </a>
                            </li>
                            <li class="nav-item"><a href="{{ route('meeting.index') }}" class="nav-link"><i
                                class="nav-icon fas fa-coffee" aria-hidden="true"></i>
                                <p>Meetings</p>
                            
                            </a>
                        </li>
                        <li class="nav-item"><a href="{{ route('asset.index') }}" class="nav-link"><i
                            class="nav-icon fas fa-warehouse" aria-hidden="true"></i>
                            
                            <p>Assets</p>
                        
                        </a>
                    </li>
                    <li class="nav-item"><a href="{{ route('report.index') }}" class="nav-link"><i
                        class="nav-icon fas fa-book" aria-hidden="true"></i>
                        
                        <p>Reports</p>
                    
                    </a>
                </li>
                            @elseif (Auth::user()->role=='admin')
                                <li class="nav-item">
                                    <li class="nav-item">
                                        <a href="{{ route('students.index') }}" class="nav-link">
                                            <i class="nav-icon fas fa-database"></i>
                                            <p>
                                                Students
                                            </p>
                                        </a>
                                    </li>
            
                                    <li class="nav-item">
                                        <a href="{{ route('teachers.index') }}" class="nav-link">
                                            <i class="nav-icon fas fa-person-chalkboard"></i>
                                            <p>
                                                Teachers
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item"><a href="{{route('staff.index')}}" class="nav-link"><i class="nav-icon fas fa-user"></i>
                                    <p>Staff</p>
                                    </a></li>
                                    <li class="nav-item">
                                        <a href="{{ route('department.index') }}" class="nav-link">
                                            <i class="nav-icon fas fa-pen-nib"></i>
                                            <p>
                                                 Departments
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('semester.index') }}" class="nav-link">
                                            <i class="nav-icon fas fa-book"></i>
                                            <p> Semesters</p>
                                        </a>
                                    </li>
                                </li>
                                <li class="nav-item"><a href="{{ route('asset.index') }}" class="nav-link"><i
                                    class="nav-icon fas fa-warehouse" aria-hidden="true"></i>
                                    
                                    <p>Assets</p>
                                
                                </a>
                            </li>
                                @elseif (Auth::user()->role=="manager")
                                <li class="nav-item">
                                    <li class="nav-item">
                                        <a href="{{ route('students.index') }}" class="nav-link">
                                            <i class="nav-icon fas fa-database"></i>
                                            <p>
                                                Students
                                            </p>
                                        </a>
                                    </li>
            
                                    <li class="nav-item">
                                        <a href="{{ route('teachers.index') }}" class="nav-link">
                                            <i class="nav-icon fas fa-person-chalkboard"></i>
                                            <p>
                                                Teachers
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item"><a href="{{route('staff.index')}}" class="nav-link"><i class="nav-icon fas fa-user"></i>
                                    <p>Staff</p>
                                    </a></li>
                                    <li class="nav-item">
                                        <a href="{{ route('department.index') }}" class="nav-link">
                                            <i class="nav-icon fas fa-pen-nib"></i>
                                            <p>
                                                 Departments
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('semester.index') }}" class="nav-link">
                                            <i class="nav-icon fas fa-book"></i>
                                            <p> Semesters</p>
                                        </a>
                                    </li>
                                </li>
                                @elseif (Auth::user()->role=="teacher")
                                <li class="nav-item">
                                    <li class="nav-item">
                                        <a href="{{ route('students.index') }}" class="nav-link">
                                            <i class="nav-icon fas fa-database"></i>
                                            <p>
                                                Students
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item"><a href="{{ route('asset.index') }}" class="nav-link"><i
                                        class="nav-icon fas fa-warehouse" aria-hidden="true"></i>
                                        
                                        <p>Assets</p>
                                    
                                    </a>
                                </li>
                                    @else
                                    <li class="nav-item">
                                        <li class="nav-item">
                                            <a href="{{ route('students.index') }}" class="nav-link">
                                                <i class="nav-icon fas fa-database"></i>
                                                <p>
                                                    Students
                                                </p>
                                            </a>
                                        </li>    
                                @endif
                                @else
                                    Login
                                @endif
                            
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <div id="app">
            <div class="content-wrapper">
                <main class="py-4">
                    @yield('content')
                </main>
            </div>
        </div>
        <footer class="main-footer">
            <strong>Copyright &copy; {{ date('Y') }} <a href="nima.test">NIMA</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0-Alpha
            </div>
        </footer>
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
    </div>
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('fontawesome/js/all.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>

    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('fontawesom/js/all.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    {{-- <script src="{{asset('get.js')}}"></script> --}}
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            $("#department").change(function() {
                var id = $("#department").val();
                $.ajax({
                    url: "/getData",
                    method: "post",
                    data: {
                        id: id
                    },

                    cache: false,
                    success: function(data) {
                        console.log(data);
                        $("#sem").html(data);
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            });
        });
    </script>
    <script>
        $(function() {
            // Summernote
            $('#details').summernote()

        })
    </script>
     <script>
        $(function() {
            // Summernote
            $('#agenda').summernote()
        })
    </script>
      <script>
        $(function() {
            // Summernote
            $('#decision').summernote();
            $('#members').summernote();
        })
    </script>
</body>

</html>

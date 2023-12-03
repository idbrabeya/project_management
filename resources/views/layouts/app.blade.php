<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>project_management</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- App favicon -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link rel="shortcut icon" href="{{asset('dashboard/assets/images/favicon.ico')}}">
        {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}


        {{-- font --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"/>
        {{-- sweetalert --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
</head>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" integrity="sha512-gOQQLjHRpD3/SEOtalVq50iDn4opLVup2TF8c4QPI3/NmUPNZOk2FG0ihi8oCU/qYEsw4P6nuEZT2lAG0UNYaw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- App css -->
        <link href="{{asset('dashboard/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('dashboard/assets/css/icons.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('dashboard/assets/css/metismenu.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('dashboard/assets/css/style.css')}}" rel="stylesheet" type="text/css" />
        <script src="{{asset('dashboard/assets/js/modernizr.min.js')}}"></script>
     <style>
            .swal2-popup {
            height: 370px;
            }
            .buttonload {
             background-color: #4CAF50;
             border: none;
             color: white;
              padding: 12px 24px;
             font-size: 16px;
              margin: 25px;
            }
            .fa {
            margin-left: -12px;
            margin-right: 8px;
            }
        @keyframes spin {
        0% {transform: rotate(0deg);}
        100% {transform: rotate(360deg);}
        }
     </style>
    </head>


    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">

                <div class="slimscroll-menu" id="remove-scroll">

                    <!-- LOGO -->
                    <div class="topbar-left">
                        <a href="/" class="logo">
                            <span>
                                <img src="{{asset('dashboard/assets/images/logo.png')}}" alt="" height="30">
                            </span>
                            <i>
                                <img src="{{asset('dashboard/assets/images/logo_sm.png')}}" alt="" height="28">
                            </i>
                        </a>
                    </div>

                    <!-- User box -->
                    <div class="user-box">
                        <div class="user-img">
                            <img src="{{asset('dashboard/assets/images').'/'. Auth::user()->profile_photo }}" alt="user-img" title="Mat Helme" class="rounded-circle img-fluid">
                        </div>
                        <h5><a href="#">{{Auth::user()->name}}</a> </h5>
                        <p class="text-muted">
                            @if (Auth::user()->role==2)
                                Admin
                            @else
                                Employee
                            @endif
                        </p>
                    </div>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul class="metismenu" id="side-menu">

                            <!--<li class="menu-title">Navigation</li>-->

                            <li>
                                <a href="{{route('home')}}">
                                    <i class="fi-air-play"></i><span>Home</span>
                                </a>
                            </li>
                         @if (Auth::user()->role==2)
                         <li>
                            <a href="{{route('employee')}}">
                                <i class="fas fa-users"></i> <span> Employee </span>
                            </a>
                        </li>
                         @endif
                         @if(Auth::user()->role!=2)
                            <li>
                                <a href="{{ route('update_form') }}">
                                    <i class="fi-command"></i> <span> Daily Update </span>
                                </a>
                            </li>
                        @endif
                        <li>
                            <a href="{{route('form.list')}}">
                                <i class="fi-paper-stack"></i> <span> Daily Update List </span>
                            </a>
                        </li> 
                        @if(Auth::user()->role==2)
                            <li>
                                <a href="#"><i class="fi-layout"></i><span> Question </span><span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{route('question_create')}}">Question Create</a></li>
                                    <li><a href="{{route('question.list')}}">Question List</a></li>
                                </ul>
                            </li>
                            @endif
                        </ul>
                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>
                </div>
                <!-- Sidebar -left -->
            </div>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->

            <div class="content-page">

                <!-- Top Bar Start -->
                <div class="topbar">

                    <nav class="navbar-custom">

                        <ul class="list-unstyled topbar-right-menu float-right mb-0">

                            <li class="hide-phone app-search">
                                <form>
                                    <input type="text" placeholder="Search..." class="form-control">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </li>
                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                    <img src="{{asset('dashboard/assets/images').'/'. Auth::user()->profile_photo }}" alt="user" class="rounded-circle"> <span class="ml-1">{{Auth::user()->name}} <i class="mdi mdi-chevron-down"></i> </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                                    <!-- item-->


                                    <!-- item-->
                                    <a href="{{ route('profile_edit') }}" class="dropdown-item notify-item">

                                        <i class="fi-head"></i> <span>My Account</span>
                                    </a>

                                    <!-- item-->
                                    <a href="{{ route('logout') }}" class="dropdown-item notify-item" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        <i class="fi-power"></i> <span>Logout</span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                        </ul>

                        <ul class="list-inline menu-left mb-0">
                            <li class="float-left">
                                <button class="button-menu-mobile open-left disable-btn">
                                    <i class="dripicons-menu"></i>
                                </button>
                            </li>
                            <li>
                               @yield('breadcrumb')

                            </li>

                        </ul>

                    </nav>

                </div>
                <!-- Top Bar End -->
                <!-- Start Page content -->
                <div class="content">
                    <div class="container-fluid">
                       @yield('content')
                    </div> <!-- container -->
                </div> <!-- content -->
                <footer class="footer text-right">
                    {{\Carbon\Carbon::today()->format('Y')}} © Todo. - API solutions.com
                </footer>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->



        <!-- jQuery  -->
        {{-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> --}}

        <script src="{{asset('dashboard/assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('dashboard/assets/js/popper.min.js')}}"></script>
        <script src="{{asset('dashboard/assets/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('dashboard/assets/js/metisMenu.min.js')}}"></script>
        <script src="{{asset('dashboard/assets/js/waves.js')}}"></script>
        <script src="{{asset('dashboard/assets/js/jquery.slimscroll.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <!-- Flot chart -->
        <script src="{{asset('dashboard/assets/plugins/flot-chart/jquery.flot.min.js')}}"></script>
        <script src="{{asset('dashboard/assets/plugins/flot-chart/jquery.flot.time.js')}}"></script>
        <script src="{{asset('dashboard/assets/plugins/flot-chart/jquery.flot.tooltip.min.js')}}"></script>
        <script src="{{asset('dashboard/assets/plugins/flot-chart/jquery.flot.resize.js')}}"></script>
        <script src="{{asset('dashboard/assets/plugins/flot-chart/jquery.flot.pie.js')}}"></script>
        <script src="{{asset('dashboard/assets/plugins/flot-chart/jquery.flot.crosshair.js')}}"></script>
        <script src="{{asset('dashboard/assets/plugins/flot-chart/curvedLines.js')}}"></script>
        <script src="{{asset('dashboard/assets/plugins/flot-chart/jquery.flot.axislabels.js')}}"></script>

        <script src="{{asset('dashboard/assets/plugins/jquery-knob/jquery.knob.js')}}"></script>

        <!-- Dashboard Init -->
        <script src="{{asset('dashboard/assets/pages/jquery.dashboard.init.js')}}"></script>

        <!-- App js -->
        <script src="{{asset('dashboard/assets/js/jquery.core.js')}}"></script>
        <script src="{{asset('dashboard/assets/js/jquery.app.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'success') }}";

    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif
</script>
     @yield('scripts')
    </body>

</html>

<!DOCTYPE html>
<html lang="en" dir="">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>
        @yield('title',config('yone.title',''))
    </title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet" />
    <link href="{{asset('dist/admin/css/admin.css')}}" rel="stylesheet" />
    <link href="{{asset('/css/app.css?v='.date('i'))}}" rel="stylesheet" />

    <link href="http://demos.ui-lib.com/gull/dist-assets/css/plugins/perfect-scrollbar.min.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/652354d01e.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
    <style type="text/css">
        .text-dark, .text-dark a{
            color:#222!important;
        }
    </style>
</head>

<body class="text-left">
    <div class="app-admin-wrap layout-sidebar-large navbar-fixed" >
      
        <div class="main-header bg-primary text-white">
            <div class="logo">
                <img src="http://demos.ui-lib.com/gull/dist-assets/images/logo.png" alt="">
            </div>
        
           @include('layouts.front.header-left')
            <div style="margin: auto"></div>
            <div class="header-part-right">
                <!-- Full screen toggle -->
                <i class="i-Full-Screen header-icon d-none d-sm-inline-block" data-fullscreen></i>
                <!-- Grid menu Dropdown -->
               {{--  <div class="dropdown">
                    <i class="i-Safe-Box text-muted header-icon" role="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <div class="menu-icon-grid">
                            <a href="#"><i class="i-Shop-4"></i> Home</a>
                            <a href="#"><i class="i-Library"></i> UI Kits</a>
                            <a href="#"><i class="i-Drop"></i> Apps</a>
                            <a href="#"><i class="i-File-Clipboard-File--Text"></i> Forms</a>
                            <a href="#"><i class="i-Checked-User"></i> Sessions</a>
                            <a href="#"><i class="i-Ambulance"></i> Support</a>
                        </div>
                    </div>
                </div> --}}
                <!-- Notificaiton -->
               {{--  <div class="dropdown">
                    <div class="badge-top-container" role="button" id="dropdownNotification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="badge badge-primary">3</span>
                        <i class="i-Bell text-muted header-icon"></i>
                    </div>
                    <!-- Notification dropdown -->
                    <div class="dropdown-menu dropdown-menu-right notification-dropdown rtl-ps-none" aria-labelledby="dropdownNotification" data-perfect-scrollbar data-suppress-scroll-x="true">
                        <div class="dropdown-item d-flex">
                            <div class="notification-icon">
                                <i class="i-Speach-Bubble-6 text-primary mr-1"></i>
                            </div>
                            <div class="notification-details flex-grow-1">
                                <p class="m-0 d-flex align-items-center">
                                    <span>New message</span>
                                    <span class="badge badge-pill badge-primary ml-1 mr-1">new</span>
                                    <span class="flex-grow-1"></span>
                                    <span class="text-small text-muted ml-auto">10 sec ago</span>
                                </p>
                                <p class="text-small text-muted m-0">James: Hey! are you busy?</p>
                            </div>
                        </div>
                        <div class="dropdown-item d-flex">
                            <div class="notification-icon">
                                <i class="i-Receipt-3 text-success mr-1"></i>
                            </div>
                            <div class="notification-details flex-grow-1">
                                <p class="m-0 d-flex align-items-center">
                                    <span>New order received</span>
                                    <span class="badge badge-pill badge-success ml-1 mr-1">new</span>
                                    <span class="flex-grow-1"></span>
                                    <span class="text-small text-muted ml-auto">2 hours ago</span>
                                </p>
                                <p class="text-small text-muted m-0">1 Headphone, 3 iPhone x</p>
                            </div>
                        </div>
                        <div class="dropdown-item d-flex">
                            <div class="notification-icon">
                                <i class="i-Empty-Box text-danger mr-1"></i>
                            </div>
                            <div class="notification-details flex-grow-1">
                                <p class="m-0 d-flex align-items-center">
                                    <span>Product out of stock</span>
                                    <span class="badge badge-pill badge-danger ml-1 mr-1">3</span>
                                    <span class="flex-grow-1"></span>
                                    <span class="text-small text-muted ml-auto">10 hours ago</span>
                                </p>
                                <p class="text-small text-muted m-0">Headphone E67, R98, XL90, Q77</p>
                            </div>
                        </div>
                        <div class="dropdown-item d-flex">
                            <div class="notification-icon">
                                <i class="i-Data-Power text-success mr-1"></i>
                            </div>
                            <div class="notification-details flex-grow-1">
                                <p class="m-0 d-flex align-items-center">
                                    <span>Server Up!</span>
                                    <span class="badge badge-pill badge-success ml-1 mr-1">3</span>
                                    <span class="flex-grow-1"></span>
                                    <span class="text-small text-muted ml-auto">14 hours ago</span>
                                </p>
                                <p class="text-small text-muted m-0">Server rebooted successfully</p>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- Notificaiton End -->
                <!-- User avatar dropdown -->
                <div class="dropdown">
                    <div class="user col align-self-end">
                        <img src="http://demos.ui-lib.com/gull/dist-assets/images/faces/1.jpg" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="dropdown-menu dropdown-menu-right text-dark" aria-labelledby="userDropdown">
                            @if(Auth::User())
                                <div class="dropdown-header">
                                <i class="i-Lock-User mr-1 text-capitalize"></i> {{Auth::User()->name}}
                                </div>
                                <a class="dropdown-item" href="{{route('d.index')}}">Admin</a>
                                <a class="dropdown-item">Billing history</a>
                                <a class="dropdown-item" href="signin.html">Sign out</a>


                            @else
                             <a class="dropdown-item" href="{{route('login')}}">Login</a>

                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

      
        <!-- =============== Left side End ================-->
        <div class="main-content-wrap  d-flex flex-column" style="margin-top: 50px;">

            <!-- ============ Body content start ============= -->
            <div class="main-content">
                @yield('header-content')

                 @yield('content')

            
                <!-- end of main-content -->
            </div><!-- Footer Start -->

            <div class="flex-grow-1"></div>
            <div class="app-footer">
                @yield('footer-content')
            </div>
            <!-- fotter end -->
        </div>
    </div><!-- ============ Search UI Start ============= -->
   
    </div>
    <!-- ============ Search UI End ============= -->
 
    <script src="http://demos.ui-lib.com/gull/dist-assets/js/plugins/bootstrap.bundle.min.js"></script>
    <script src="http://demos.ui-lib.com/gull/dist-assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script type="text/javascript" src="{{asset('/js/affix.js?v='.date('i'))}}"></script>
    <script src="http://demos.ui-lib.com/gull/dist-assets/js/scripts/script.min.js"></script>
    <script src="http://demos.ui-lib.com/gull/dist-assets/js/scripts/sidebar.large.script.min.js"></script>
    @yield('js')
</body>


<!-- Mirrored from demos.ui-lib.com/gull/html/layout1/blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Oct 2020 12:47:44 GMT -->
</html>
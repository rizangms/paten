<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <title>SIM</title>

    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('assets/app/images/favicon.ico') }}" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
    <!-- waves.css -->
    <link rel="stylesheet" href="{{ asset('assets/app/pages/waves/css/waves.min.css') }}" type="text/css" media="all">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app/css/bootstrap/css/bootstrap.min.css') }}">
    <!-- waves.css -->
    <link rel="stylesheet" href="{{ asset('assets/app/pages/waves/css/waves.min.css') }}" type="text/css" media="all">
    <!-- themify icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app/icon/themify-icons/themify-icons.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app/icon/font-awesome/css/font-awesome.min.css') }}">
    <!-- scrollbar.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app/css/jquery.mCustomScrollbar.css') }}">
    <!-- am chart export.css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css') }}" type="text/css" media="all" />
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app/css/style.css') }}">
    <style type="text/css">
      .newmessage {
        background-color: rgba(220, 55, 55, 1);
        -webkit-transition: background-color 5s ease-out !important;
        -moz-transition: background-color 5s ease-out !important;
        transition: background-color 5s ease-out !important;
      }
      .newmessage.hovered {
        background-color: rgba(220, 55, 55, 0);
      }
    </style>
    <!-- css  -->
    @yield('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/app/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <!-- end css -->
    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.33.1/dist/sweetalert2.all.min.js"></script>
    <script type="text/javascript">
      var base_url = "{{ url('/') }}";
    </script>
    <!-- end js -->
</head>
<body>

    <!-- Pre-loader start -->
    <div class="theme-loader">
      <div class="loader-track">
          <div class="preloader-wrapper">
              <div class="spinner-layer spinner-blue">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
              <div class="spinner-layer spinner-red">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
            
              <div class="spinner-layer spinner-yellow">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
            
              <div class="spinner-layer spinner-green">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
          </div>
      </div>
    </div>

    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
      <div class="pcoded-overlay-box"></div>
      <div class="pcoded-container navbar-wrapper">
          <nav class="navbar header-navbar pcoded-header">
              <div class="navbar-wrapper">
                  <div class="navbar-logo">
                      <a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!">
                          <i class="ti-menu"></i>
                      </a>
                      <div class="container">
                        <a href="{{ url('/home') }}">
                          <!-- <img class="img-fluid" src="{{ asset('assets/app/images/logo.png') }}" alt="Theme-Logo" /> -->
                            <h4 class="pt-2 text-white">SIM-PATEN</h4>
                        </a>
                      </div>
                      <a class="mobile-options waves-effect waves-light">
                          <i class="ti-more"></i>
                      </a>
                  </div>
                
                  <div class="navbar-container container-fluid">
                      <ul class="nav-left">
                          <li>
                              <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                          </li>
                          <li>
                              <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                                  <i class="ti-fullscreen"></i>
                              </a>
                          </li>
                      </ul>
                      <ul class="nav-right">
                          <li class="header-notification" id="notify_off">
                              <a href="#!" class="waves-effect waves-light">
                                  <i class="ti-bell"></i>
                                  <span id="lampu_notif"></span>
                              </a>
                              <ul class="show-notification" id="show_notify">
                                  <li>
                                      <h6>Notifikasi</h6>
                                      <label id="notify_label" class="label label-danger"></label>
                                  </li>
                                  <span id="show_the_notify"></span>
                              </ul>
                          </li>
                          <li class="user-profile header-notification">
                              <a href="#!" class="waves-effect waves-light">
                                  <img src="{{ asset('assets/app/images/spora_digital_1548137880.png') }}" class="img-radius" alt="User-Profile-Image">
                                  <span>Admin</span>
                                  <i class="ti-angle-down"></i>
                              </a>
                              <ul class="show-notification profile-notification">
                                  <li class="waves-effect waves-light">
                                      <a href="#">
                                          <i class="ti-settings"></i> Settings
                                      </a>
                                  </li>
                                  <li class="waves-effect waves-light">
                                      <a href="#">
                                          <i class="ti-user"></i> Profile
                                      </a>
                                  </li>
                                  <li class="waves-effect waves-light">
                                      <a href="#">
                                          <i class="ti-email"></i> My Messages
                                      </a>
                                  </li>
                                  <li class="waves-effect waves-light">
                                      <a href="#">
                                          <i class="ti-lock"></i> Lock Screen
                                      </a>
                                  </li>
                                  <li class="waves-effect waves-light">
                                      <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                          <i class="ti-layout-sidebar-left"></i> {{ __('Logout') }}
                                      </a>
                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                  </li>
                              </ul>
                          </li>
                      </ul>
                  </div>
              </div>
          </nav>

          <div class="pcoded-main-container">
              <div class="pcoded-wrapper">
                  <nav class="pcoded-navbar">
                      <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                      <div class="pcoded-inner-navbar main-menu">
                          <div class="">
                              <div class="main-menu-header">
                                  <img class="img-80 img-radius" src="{{ asset('assets/app/images/spora_digital_1548137880.png') }}" alt="User-Profile-Image">
                                  <div class="user-details">
                                      <span id="more-details">Admin<i class="fa fa-caret-down"></i></span>
                                  </div>
                              </div>
        
                              <div class="main-menu-content">
                                  <ul>
                                      <li class="more-details">
                                          <a href="#"><i class="ti-user"></i>View Profile</a>
                                          <a href="#"><i class="ti-settings"></i>Settings</a>
                                          <a href="{{ route('logout') }}"><i class="ti-layout-sidebar-left"></i>Logout</a>
                                      </li>
                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                  </ul>
                              </div>
                          </div>
                          <div class="pcoded-navigation-label pt-4" data-i18n="nav.category.navigation">Menu</div>
                          <ul id="nav" class="pcoded-item pcoded-left-item">
                              <li>
                                  <a href="{{ route('home') }}" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                      <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                              </li>
                              <li>
                                  <a href="{{ url('/users') }}" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-user"></i><b>D</b></span>
                                      <span class="pcoded-mtext" data-i18n="nav.dash.main">Pengguna</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                              </li>
                              <li>
                                  <a href="{{ url('/posts') }}" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-view-list-alt"></i><b>D</b></span>
                                      <span class="pcoded-mtext" data-i18n="nav.dash.main">Post</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                              </li>
                              <li>
                                  <a href="{{ url('/pengaturan') }}" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-settings"></i><b>D</b></span>
                                      <span class="pcoded-mtext" data-i18n="nav.dash.main">Pengaturan</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                              </li>
                          </ul>
                      </div>
                  </nav>
                  <div class="pcoded-content">
                                        
                    <!-- conten  -->
                    @yield('content')
                    <!-- end content -->

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Required Jquery -->
    <script type="text/javascript" src="{{ asset('assets/app/js/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/app/js/jquery-ui/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/app/js/popper.js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/app/js/bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/app/pages/widget/excanvas.js') }}"></script>
    <!-- waves js -->
    <script src="{{ asset('assets/app/pages/waves/js/waves.min.js') }}"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="{{ asset('assets/app/js/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="{{ asset('assets/app/js/modernizr/modernizr.js') }}"></script>
    <!-- slimscroll js -->
    <!-- <script type="text/javascript" src="{{ asset('assets/app/js/SmoothScroll.js') }}"></script> -->
    <script src="{{ asset('assets/app/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <!-- Chart js -->
    <script type="text/javascript" src="{{ asset('assets/app/js/chart.js/Chart.js') }}"></script>
    <!-- amchart js -->
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="{{ asset('assets/app/pages/widget/amchart/gauge.js') }}"></script>
    <script src="{{ asset('assets/app/pages/widget/amchart/serial.js') }}"></script>
    <script src="{{ asset('assets/app/pages/widget/amchart/light.js') }}"></script>
    <script src="{{ asset('assets/app/pages/widget/amchart/pie.min.js') }}"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <!-- menu js -->
    <script src="{{ asset('assets/app/js/pcoded.min.js') }}"></script>
    <script src="{{ asset('assets/app/js/vertical-layout.min.js') }}"></script>
    <!-- custom js -->
    <script type="text/javascript" src="{{ asset('assets/app/pages/dashboard/custom-dashboard.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/app/js/script.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/app/js/custom/app-custom.js') }}"></script>
    <!-- js  -->
    @yield('js')
    <!-- end js -->
</body>
</html>

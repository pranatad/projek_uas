
<!DOCTYPE html>
<html lang="id">

<head>
    <title>SUPER INVENTORY</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="#">
    <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('assets') }}\images\auth\logo.png" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components') }}\bootstrap\css\bootstrap.min.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}\icon\icofont\css\icofont.css">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}\icon\feather\css\feather.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}\css\style.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}\css\jquery.mCustomScrollbar.css">
    <!-- Data Table -->
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components') }}/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/pages/data-table/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components') }}/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
    <!-- Required Jquery -->
    <script type="text/javascript" src="{{ asset('bower_components') }}\jquery\js\jquery.min.js"></script>
    
</head>

<body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
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
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="feather icon-menu"></i>
                        </a>
                        <a href="{{ route('home') }}">
                            <img class="img-fluid" width="20%" height="20%" src="{{ asset('assets') }}\images\auth\logo-white.png" alt="Theme-Logo">
                            <span>supertory</span>
                        </a>
                        <a class="mobile-options">
                            <i class="feather icon-more-horizontal"></i>
                        </a>
                    </div>

                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li class="header-search">
                                <div class="main-search morphsearch-search">
                                    <div class="input-group">
                                        <span class="input-group-addon search-close"><i class="feather icon-x"></i></span>
                                        <input type="text" class="form-control">
                                        <span class="input-group-addon search-btn"><i class="feather icon-search"></i></span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()">
                                    <i class="feather icon-maximize full-screen"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            <li class="header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="feather icon-bell"></i>
                                        <span class="badge bg-c-pink">1</span>
                                    </div>
                                    <ul class="show-notification notification-view dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <h6>Notifications</h6>
                                            <label class="label label-danger">New</label>
                                        </li>
                                        <li>
                                            <div class="media">
                                                <img class="d-flex align-self-center img-radius" src="{{ asset('assets') }}\images\avatar-6.jpg" alt="Generic placeholder image">
                                                <div class="media-body">
                                                    <h5 class="notification-user">Pimpinan</h5>
                                                    <p class="notification-msg">Selamat bekerja dan jangan lupa semangat!</p>
                                                    <span class="notification-time">1 months ago.</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="user-profile header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="{{ asset('assets') }}\images\user.png" class="img-radius" alt="User-Profile-Image">
                                        <span>@guest @else{{ Auth::user()->name }} @endguest</span>
                                        <i class="feather icon-chevron-down"></i>
                                    </div>
                                    <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <a data-toggle="modal" data-target="#editProfile">
                                                <i class="feather icon-user"></i> Profil
                                            </a>
                                        </li>
                                        <li>
                                            <a data-toggle="modal" data-target="#changePassword">
                                                <i class="feather icon-lock"></i> Ganti Password
                                            </a>
                                        </li>
                                        <li>
                                            <a onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                                <i class="feather icon-log-out"></i> Logout
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>

                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="pcoded-navigatio-lavel">Navigation</div>
                            @yield('menu')
                        </div>
                    </nav>
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('updateprofile') }}" method="POST">
        @method('PUT')
        @csrf
        <div class="modal made" tabindex="-1" id="editProfile" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">Update profile</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" value="@guest @else{{ Auth::user()->id }} @endguest" name="id" required />
                        <input type="text" class="form-control" value="@guest @else{{ Auth::user()->name }} @endguest" autocomplete="off" name="nama" placeholder="Name" required /> <br>
                        <input type="email" class="form-control" value="@guest @else{{ Auth::user()->email }} @endguest" readonly autocomplete="off" name="email" placeholder="Email" required /> <br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-inverse btn-sm">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form action="{{ route('changepassword') }}" method="POST">
        @method('PUT')
        @csrf
        <div class="modal made" tabindex="-1" id="changePassword" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">Change Password</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" value="@guest @else{{ Auth::user()->id }} @endguest" name="id" required />
                        <input type="text" class="form-control" autocomplete="off" name="password" placeholder="New Password" required /> <br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-inverse btn-sm">Change Password</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script type="text/javascript" src="{{ asset('bower_components') }}\jquery-ui\js\jquery-ui.min.js"></script>
    <script type="text/javascript" src="{{ asset('bower_components') }}\popper.js\js\popper.min.js"></script>
    <script type="text/javascript" src="{{ asset('bower_components') }}\bootstrap\js\bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="{{ asset('bower_components') }}\jquery-slimscroll\js\jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="{{ asset('bower_components') }}\modernizr\js\modernizr.js"></script>
    <!-- Chart js -->
    <script type="text/javascript" src="{{ asset('bower_components') }}\chart.js\js\Chart.js"></script>
    <!-- Data table -->
    <script src="{{ asset('bower_components') }}\datatables.net\js\jquery.dataTables.min.js"></script>
    <script src="{{ asset('bower_components') }}\datatables.net-buttons\js\dataTables.buttons.min.js"></script>
    <script src="{{ asset('assets') }}\pages\data-table\js\jszip.min.js"></script>
    <script src="{{ asset('assets') }}\pages\data-table\js\pdfmake.min.js"></script>
    <script src="{{ asset('assets') }}\pages\data-table\js\vfs_fonts.js"></script>
    <script src="{{ asset('bower_components') }}\datatables.net-buttons\js\buttons.print.min.js"></script>
    <script src="{{ asset('bower_components') }}\datatables.net-buttons\js\buttons.html5.min.js"></script>
    <script src="{{ asset('bower_components') }}\datatables.net-bs4\js\dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('bower_components') }}\datatables.net-responsive\js\dataTables.responsive.min.js"></script>
    <script src="{{ asset('bower_components') }}\datatables.net-responsive-bs4\js\responsive.bootstrap4.min.js"></script>
    <!-- amchart js -->
    <script src="{{ asset('assets') }}\pages\widget\amchart\amcharts.js"></script>
    <script src="{{ asset('assets') }}\pages\widget\amchart\serial.js"></script>
    <script src="{{ asset('assets') }}\pages\widget\amchart\light.js"></script>
    <script src="{{ asset('assets') }}\js\jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets') }}\js\SmoothScroll.js"></script>
    <script src="{{ asset('assets') }}\js\pcoded.min.js"></script>
    <!-- custom js -->
    <script src="{{ asset('assets') }}\js\vartical-layout.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets') }}\pages\dashboard\custom-dashboard.js"></script>
    <script type="text/javascript" src="{{ asset('assets') }}\js\script.min.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

<script>
    $('#simpletable').DataTable({
        responsive: true
    });

    $('#simpletablemodal').DataTable({
        responsive: true
    });

    $('#simpletablemodaltwo').DataTable({
        responsive: true
    });
</script>

</body>

</html>

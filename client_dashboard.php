<!-- add_manager.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Client Performance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/lib/chartist/chartist.min.css" rel="stylesheet">
    <link href="assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="assets/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="assets/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="assets/css/lib/weather-icons.css" rel="stylesheet" />
    <link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/lib/unix.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="">


<div class="sidebar sidebar-gestures">
        <div class="nano">
            <div class="nano-content">
                <ul>
                    <li class="label">Main</li>
                    <li class="active"><a href="client_dashboard.php" class="sidebar-sub-toggle"><i class="ti-home"></i> Dashboard </a></li>
                    <li><a href="view_client_performance2.php" class=""><i class="ti-home"></i> Client Performance </a></li>

                    <li><a href="logout.php"><i class="ti-close"></i> Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="header">
        <div class="pull-left">
            <div class="logo"><a href="index.html"><!-- <img src="assets/images/logo.png" alt="" /> --><span>Webstrot Admin</span></a></div>
            <!-- <div class="hamburger sidebar-toggle">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </div> -->
        </div>
        <div class="pull-right p-r-15">
            <ul>
                <li class="header-icon dib"><a href="#search"><i class="ti-search"></i></a></li>
                <li class="header-icon dib"><i class="ti-bell"></i>
                    <div class="drop-down">
                        <div class="dropdown-content-heading">
                            <span class="text-left">Recent Notifications</span>
                        </div>
                        <div class="dropdown-content-body">
                            <ul>
                                <li>
                                    <a href="#">
                                        <img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/3.jpg" alt="" />
                                        <div class="notification-content">
                                            <small class="notification-timestamp pull-right">02:34 PM</small>
                                            <div class="notification-heading">Mr.  Ajay</div>
                                            <div class="notification-text">5 members joined today </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/3.jpg" alt="" />
                                        <div class="notification-content">
                                            <small class="notification-timestamp pull-right">02:34 PM</small>
                                            <div class="notification-heading">Mr.  Ajay</div>
                                            <div class="notification-text">likes a photo of you</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/3.jpg" alt="" />
                                        <div class="notification-content">
                                            <small class="notification-timestamp pull-right">02:34 PM</small>
                                            <div class="notification-heading">Mr.  Ajay</div>
                                            <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/3.jpg" alt="" />
                                        <div class="notification-content">
                                            <small class="notification-timestamp pull-right">02:34 PM</small>
                                            <div class="notification-heading">Mr.  Ajay</div>
                                            <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="text-center">
                                    <a href="#" class="more-link">See All</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="header-icon dib"><i class="ti-email"></i>
                    <div class="drop-down">
                        <div class="dropdown-content-heading">
                            <span class="text-left">2 New Messages</span>
                            <a href="email.html"><i class="ti-pencil-alt pull-right"></i></a>
                        </div>
                        <div class="dropdown-content-body">
                            <ul>
                                <li class="notification-unread">
                                    <a href="#">
                                        <img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/1.jpg" alt="" />
                                        <div class="notification-content">
                                            <small class="notification-timestamp pull-right">02:34 PM</small>
                                            <div class="notification-heading">Mr.  Ajay</div>
                                            <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-unread">
                                    <a href="#">
                                        <img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/2.jpg" alt="" />
                                        <div class="notification-content">
                                            <small class="notification-timestamp pull-right">02:34 PM</small>
                                            <div class="notification-heading">Mr.  Ajay</div>
                                            <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/3.jpg" alt="" />
                                        <div class="notification-content">
                                            <small class="notification-timestamp pull-right">02:34 PM</small>
                                            <div class="notification-heading">Mr.  Ajay</div>
                                            <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/2.jpg" alt="" />
                                        <div class="notification-content">
                                            <small class="notification-timestamp pull-right">02:34 PM</small>
                                            <div class="notification-heading">Mr.  Ajay</div>
                                            <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="text-center">
                                    <a href="#" class="more-link">See All</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="header-icon dib"><img class="avatar-img" src="assets/images/avatar/1.jpg" alt="" /> <span class="user-avatar"> Ajay <i class="ti-angle-down f-s-10"></i></span>
                    <div class="drop-down dropdown-profile">
                        <div class="dropdown-content-heading">
                            <span class="text-left">Upgrade Now</span>
                            <p class="trial-day">30 Days Trail</p>
                        </div>
                        <div class="dropdown-content-body">
                            <ul>
                                <li><a href="#"><i class="ti-user"></i> <span>Profile</span></a></li>
                                <li><a href="#"><i class="ti-wallet"></i> <span>My Balance</span></a></li>
                                <li><a href="#"><i class="ti-write"></i> <span>My Task</span></a></li>
                                <li><a href="#"><i class="ti-calendar"></i> <span>My Calender</span></a></li>
                                <li><a href="#"><i class="ti-email"></i> <span>Inbox</span></a></li>
                                <li><a href="#"><i class="ti-settings"></i> <span>Setting</span></a></li>
                                <li><a href="#"><i class="ti-help-alt"></i> <span>Help</span></a></li>
                                <li><a href="#"><i class="ti-lock"></i> <span>Lock Screen</span></a></li>
                                <li><a href="#"><i class="ti-power-off"></i> <span>Logout</span></a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid col-md-8" style="left: 350px;">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Hello, <span>Welcome Here</span></h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li class="active">Home</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <div id="main-content">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-eight">
                                    <div class="stat-header">
                                        <div class="header-title pull-left">Daily Visit</div>
                                        <div class="card-option drop-menu pull-right"><i class="ti-more-alt" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="link"></i>
                                            <ul class="card-option-dropdown dropdown-menu">
                                                <li><a href="#"><i class="ti-loop"></i> Update data</a></li>
                                                <li><a href="#"><i class="ti-menu-alt"></i> Detail log</a></li>
                                                <li><a href="#"><i class="ti-pulse"></i> Statistics</a></li>
                                                <li><a href="#"><i class="ti-power-off"></i> Clear ist</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="stat-content">
                                        <div class="pull-left">
                                            <i class="ti-arrow-up color-success"></i>
                                            <span class="stat-digit"> 14,2158.35</span>
                                        </div>
                                        <div class="pull-right">
                                            <span class="progress-stats">70%</span>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-primary w-70" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
                                            <span class="sr-only">70% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-eight">
                                    <div class="stat-header">
                                        <div class="header-title pull-left">Bounce Rate</div>
                                        <div class="card-option drop-menu pull-right"><i class="ti-more-alt" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="link"></i>
                                            <ul class="card-option-dropdown dropdown-menu">
                                                <li><a href="#"><i class="ti-loop"></i> Update data</a></li>
                                                <li><a href="#"><i class="ti-menu-alt"></i> Detail log</a></li>
                                                <li><a href="#"><i class="ti-pulse"></i> Statistics</a></li>
                                                <li><a href="#"><i class="ti-power-off"></i> Clear ist</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="stat-content">
                                        <div class="pull-left">
                                            <i class="ti-arrow-up color-success"></i>
                                            <span class="stat-digit"> 14,2158.35</span>
                                        </div>
                                        <div class="pull-right">
                                            <span class="progress-stats">70%</span>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-success w-70" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
                                            <span class="sr-only">70% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-eight">
                                    <div class="stat-header">
                                        <div class="header-title pull-left">Growth Rate</div>
                                        <div class="card-option drop-menu pull-right"><i class="ti-more-alt" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="link"></i>
                                            <ul class="card-option-dropdown dropdown-menu">
                                                <li><a href="#"><i class="ti-loop"></i> Update data</a></li>
                                                <li><a href="#"><i class="ti-menu-alt"></i> Detail log</a></li>
                                                <li><a href="#"><i class="ti-pulse"></i> Statistics</a></li>
                                                <li><a href="#"><i class="ti-power-off"></i> Clear ist</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="stat-content">
                                        <div class="pull-left">
                                            <i class="ti-arrow-down color-danger"></i>
                                            <span class="stat-digit"> 14,2158.35</span>
                                        </div>
                                        <div class="pull-right">
                                            <span class="progress-stats">70%</span>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-warning w-70" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
                                            <span class="sr-only">70% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-eight">
                                    <div class="stat-header">
                                        <div class="header-title pull-left">Page Views</div>
                                        <div class="card-option drop-menu pull-right"><i class="ti-more-alt" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="link"></i>
                                            <ul class="card-option-dropdown dropdown-menu">
                                                <li><a href="#"><i class="ti-loop"></i> Update data</a></li>
                                                <li><a href="#"><i class="ti-menu-alt"></i> Detail log</a></li>
                                                <li><a href="#"><i class="ti-pulse"></i> Statistics</a></li>
                                                <li><a href="#"><i class="ti-power-off"></i> Clear ist</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="stat-content">
                                        <div class="pull-left">
                                            <i class="ti-arrow-down color-danger"></i>
                                            <span class="stat-digit"> 14,2158.35</span>
                                        </div>
                                        <div class="pull-right">
                                            <span class="progress-stats">70%</span>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-success w-70" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
                                            <span class="sr-only">70% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card alert">
                                        <div class="card-body">
                                            <div class="ct-chart"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card alert">
                                        <div class="card-body">
                                            <div class="ct-svg-chart"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /# column -->
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card alert">
                                        <div class="card-header">
                                            <h4 class="m-l-5">Twitter Stats </h4>
                                            <div class="card-header-right-icon">
                                                <ul>
                                                    <li><i class="ti-reload"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="media-stats-content text-center">
                                                <div class="row">
                                                    <div class="col-lg-4 border-bottom">
                                                        <div class="stats-content">
                                                            <div class="stats-digit">5482</div>
                                                            <div class="stats-text">Followers</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 border-bottom border-left">
                                                        <div class="stats-content">
                                                            <div class="stats-digit">8320</div>
                                                            <div class="stats-text">New Followers</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 border-bottom  border-left">
                                                        <div class="stats-content">
                                                            <div class="stats-digit">4712</div>
                                                            <div class="stats-text">New Tweets</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="stats-content">
                                                            <div class="stats-digit">3652</div>
                                                            <div class="stats-text">Retweets</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 border-left">
                                                        <div class="stats-content">
                                                            <div class="stats-digit">9874</div>
                                                            <div class="stats-text">Mentions</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 border-left">
                                                        <div class="stats-content">
                                                            <div class="stats-digit">1254</div>
                                                            <div class="stats-text">Favorites</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card alert">
                                        <div class="card-header">
                                            <h4 class="m-l-5">Facebook Stats </h4>
                                            <div class="card-header-right-icon">
                                                <ul>
                                                    <li><i class="ti-reload"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="media-stats-content text-center">
                                                <div class="row">
                                                    <div class="col-lg-4 border-bottom">
                                                        <div class="stats-content">
                                                            <div class="stats-digit">9275</div>
                                                            <div class="stats-text">Fans</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 border-bottom border-left">
                                                        <div class="stats-content">
                                                            <div class="stats-digit">6984</div>
                                                            <div class="stats-text">New Fans</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 border-bottom  border-left">
                                                        <div class="stats-content">
                                                            <div class="stats-digit">2144</div>
                                                            <div class="stats-text">Post Reach</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="stats-content">
                                                            <div class="stats-digit">6584</div>
                                                            <div class="stats-text">Interaction</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 border-left">
                                                        <div class="stats-content">
                                                            <div class="stats-digit">4580</div>
                                                            <div class="stats-text">Page Impressions</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 border-left">
                                                        <div class="stats-content">
                                                            <div class="stats-digit">2540</div>
                                                            <div class="stats-text">Talking About</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card alert bg-linkedin">
                                        <div class="card-header">
                                            <h4 class="m-l-5">Linkedin Stats </h4>
                                            <div class="card-header-right-icon">
                                                <ul>
                                                    <li><i class="ti-reload"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="media-stats-content text-center">
                                                <div class="row">
                                                    <div class="col-lg-4 border-bottom">
                                                        <div class="stats-content">
                                                            <div class="stats-digit">9654</div>
                                                            <div class="stats-text">Followers</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 border-bottom border-left">
                                                        <div class="stats-content">
                                                            <div class="stats-digit">1254</div>
                                                            <div class="stats-text">New Followers</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 border-bottom  border-left">
                                                        <div class="stats-content">
                                                            <div class="stats-digit">6580</div>
                                                            <div class="stats-text">Impressions</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="stats-content">
                                                            <div class="stats-digit">5740</div>
                                                            <div class="stats-text">Click</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 border-left">
                                                        <div class="stats-content">
                                                            <div class="stats-digit">3987</div>
                                                            <div class="stats-text">Like</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 border-left">
                                                        <div class="stats-content">
                                                            <div class="stats-digit">5568</div>
                                                            <div class="stats-text">Avg: Engagement</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card alert">
                                        <div class="card-header">
                                            <h4 class="m-l-5">Youtube Stats </h4>
                                            <div class="card-header-right-icon">
                                                <ul>
                                                    <li><i class="ti-reload"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="media-stats-content text-center">
                                                <div class="row">
                                                    <div class="col-lg-4 border-bottom">
                                                        <div class="stats-content">
                                                            <div class="stats-digit">9358</div>
                                                            <div class="stats-text">Subscribers</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 border-bottom border-left">
                                                        <div class="stats-content">
                                                            <div class="stats-digit">6584</div>
                                                            <div class="stats-text">New Subscribers</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 border-bottom  border-left">
                                                        <div class="stats-content">
                                                            <div class="stats-digit">12470</div>
                                                            <div class="stats-text">Lifetime Views</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="stats-content">
                                                            <div class="stats-digit">4795</div>
                                                            <div class="stats-text">View This Month</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 border-left">
                                                        <div class="stats-content">
                                                            <div class="stats-digit">5480</div>
                                                            <div class="stats-text">Likes</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 border-left">
                                                        <div class="stats-content">
                                                            <div class="stats-digit">147</div>
                                                            <div class="stats-text">Comments</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card alert">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Platform</th>
                                                            <th>Visitors</th>
                                                            <th>Goals</th>
                                                            <th>GCR</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Facebook</td>
                                                            <td>2,456</td>
                                                            <td>99</td>
                                                            <td>6.59%</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Twitter</td>
                                                            <td>1,006</td>
                                                            <td>88</td>
                                                            <td>2.48%</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Linked in</td>
                                                            <td>923</td>
                                                            <td>55</td>
                                                            <td>6.24%</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Google Plus</td>
                                                            <td>180</td>
                                                            <td>69</td>
                                                            <td>2.50%</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Youtube</td>
                                                            <td>457</td>
                                                            <td>77</td>
                                                            <td>4.1%</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card alert">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Device</th>
                                                            <th>Visits</th>
                                                            <th>Avg. time</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Unknown</td>
                                                            <td>2,456</td>
                                                            <td>00:02:36</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Apple iPad</td>
                                                            <td>1,006</td>
                                                            <td>00:03:41</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Apple iPhone</td>
                                                            <td>68</td>
                                                            <td>00:04:10</td>
                                                        </tr>
                                                        <tr>
                                                            <td>HTC Desire</td>
                                                            <td>38</td>
                                                            <td>00:01:40</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Samsung</td>
                                                            <td>20</td>
                                                            <td>00:04:54</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /# column -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="card alert">
                                        <div class="card-body">
                                            <div class="ct-pie-chart"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="card p-0">
                                        <div class="stat-widget-three home-widget-three">
                                            <div class="stat-icon bg-facebook">
                                                <i class="ti-facebook"></i>
                                            </div>
                                            <div class="stat-content">
                                                <div class="stat-digit">8,268</div>
                                                <div class="stat-text">Likes</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card p-0">
                                        <div class="stat-widget-three home-widget-three">
                                            <div class="stat-icon bg-youtube">
                                                <i class="ti-youtube"></i>
                                            </div>
                                            <div class="stat-content">
                                                <div class="stat-digit">12,545</div>
                                                <div class="stat-text">Subscribes</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card p-0">
                                        <div class="stat-widget-three home-widget-three">
                                            <div class="stat-icon bg-twitter">
                                                <i class="ti-twitter"></i>
                                            </div>
                                            <div class="stat-content">
                                                <div class="stat-digit">7,982</div>
                                                <div class="stat-text">Tweets</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card p-0">
                                        <div class="stat-widget-three home-widget-three">
                                            <div class="stat-icon bg-danger">
                                                <i class="ti-linkedin"></i>
                                            </div>
                                            <div class="stat-content">
                                                <div class="stat-digit">9,658</div>
                                                <div class="stat-text">Followers</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="card alert">
                                                <div class="card-body">
                                                    <div class="stat-widget-seven">
                                                        <div class="stat-icon">
                                                            <i class="ti-reload pull-left"></i>
                                                            <div class="card-option drop-menu pull-right"><i class="ti-settings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="link"></i>
                                                                <ul class="card-option-dropdown dropdown-menu">
                                                                    <li><a href="#"><i class="ti-loop"></i> Update data</a></li>
                                                                    <li><a href="#"><i class="ti-menu-alt"></i> Detail log</a></li>
                                                                    <li><a href="#"><i class="ti-pulse"></i> Statistics</a></li>
                                                                    <li><a href="#"><i class="ti-power-off"></i> Clear ist</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="stat-content">
                                                            <div class="stat-heading">
                                                                <div class="count-header">Total Visit</div>
                                                                <div class="stat-count">6,45,840</div>
                                                            </div>
                                                            <div class="gradient-circle" id="visitor-circle">
                                                                <i class="ti-cup"></i>
                                                            </div>
                                                            <div class="stat-footer">
                                                                <div class="row m-0">
                                                                    <div class="col-lg-6 p-0 text-left">
                                                                        <div class="analytic-arrow">
                                                                            <i class="ti-arrow-up"></i>
                                                                            <i class="ti-arrow-down"></i>
                                                                        </div>
                                                                        <div class="stat-count">3,25,840</div>
                                                                        <div class="count-header">Average Visit</div>
                                                                    </div>
                                                                    <div class="col-lg-6 p-0 text-right">
                                                                        <div class="analytic-arrow">
                                                                            <i class="ti-arrow-up"></i>
                                                                            <i class="ti-arrow-down"></i>
                                                                        </div>
                                                                        <div class="stat-count">1,65,210</div>
                                                                        <div class="count-header">Unique Visit</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="card alert">
                                                <div class="card-body">
                                                    <div class="stat-widget-seven">
                                                        <div class="stat-icon">
                                                            <i class="ti-reload pull-left"></i>
                                                            <div class="card-option drop-menu pull-right"><i class="ti-settings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="link"></i>
                                                                <ul class="card-option-dropdown dropdown-menu">
                                                                    <li><a href="#"><i class="ti-loop"></i> Update data</a></li>
                                                                    <li><a href="#"><i class="ti-menu-alt"></i> Detail log</a></li>
                                                                    <li><a href="#"><i class="ti-pulse"></i> Statistics</a></li>
                                                                    <li><a href="#"><i class="ti-power-off"></i> Clear ist</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="stat-content">
                                                            <div class="stat-heading">
                                                                <div class="count-header">Page Views</div>
                                                                <div class="stat-count">9,47,570</div>
                                                            </div>
                                                            <div class="gradient-circle" id="pageviews-circle">
                                                                <i class="ti-wallet"></i>
                                                            </div>
                                                            <div class="stat-footer">
                                                                <div class="row m-0">
                                                                    <div class="col-lg-6 p-0 text-left">
                                                                        <div class="analytic-arrow">
                                                                            <i class="ti-arrow-up"></i>
                                                                            <i class="ti-arrow-down"></i>
                                                                        </div>
                                                                        <div class="stat-count">3,48,420</div>
                                                                        <div class="count-header">Average Views</div>
                                                                    </div>
                                                                    <div class="col-lg-6 p-0 text-right">
                                                                        <div class="analytic-arrow">
                                                                            <i class="ti-arrow-up"></i>
                                                                            <i class="ti-arrow-down"></i>
                                                                        </div>
                                                                        <div class="stat-count">1,92,035</div>
                                                                        <div class="count-header">Today Views</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card alert">
                                <div class="card-body">
                                    <div class="ct-bar-chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card alert">
                                <div class="card-header">
                                    <h4 class="f-s-14">Facebook Source (Last 90 Days)</h4>
                                </div>
                                <div class="card-body">
                                    <div class="current-progress">
                                        <div class="progress-content">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="progress-text">Page Profile</div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="current-progressbar">
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-primary w-40" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                                                40%
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="progress-content">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="progress-text">Favorite</div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="current-progressbar">
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-primary w-60" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
                                                                60%
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="progress-content">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="progress-text">Like Story</div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="current-progressbar">
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-primary w-70" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
                                                                70%
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="progress-content">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="progress-text">Mobile</div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="current-progressbar">
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-primary w-90" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                                                                90%
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /# column -->
                        <div class="col-lg-4">
                            <div class="card bg-primary">
                                <div class="weather-widget">
                                    <div id="weather-one" class="weather-one p-22"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="testimonial-widget-one p-17">
                                    <div class="testimonial-widget-one owl-carousel owl-theme">
                                        <div class="item">
                                            <div class="testimonial-content">
                                                <div class="testimonial-text">
                                                    <i class="fa fa-quote-left"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation <i class="fa fa-quote-right"></i>
                                                </div>
                                                <img class="testimonial-author-img" src="assets/images/avatar/1.jpg" alt="" />
                                                <div class="testimonial-author">TYRION LANNISTER</div>
                                                <div class="testimonial-author-position">Founder-Ceo. Dell Corp</div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="testimonial-content">
                                                <div class="testimonial-text">
                                                    <i class="fa fa-quote-left"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation <i class="fa fa-quote-right"></i>
                                                </div>
                                                <img class="testimonial-author-img" src="assets/images/avatar/1.jpg" alt="" />
                                                <div class="testimonial-author">TYRION LANNISTER</div>
                                                <div class="testimonial-author-position">Founder-Ceo. Dell Corp</div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="testimonial-content">
                                                <div class="testimonial-text">
                                                    <i class="fa fa-quote-left"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation <i class="fa fa-quote-right"></i>
                                                </div>
                                                <img class="testimonial-author-img" src="assets/images/avatar/1.jpg" alt="" />
                                                <div class="testimonial-author">TYRION LANNISTER</div>
                                                <div class="testimonial-author-position">Founder-Ceo. Dell Corp</div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="testimonial-content">
                                                <div class="testimonial-text">
                                                    <i class="fa fa-quote-left"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation <i class="fa fa-quote-right"></i>
                                                </div>
                                                <img class="testimonial-author-img" src="assets/images/avatar/1.jpg" alt="" />
                                                <div class="testimonial-author">TYRION LANNISTER</div>
                                                <div class="testimonial-author-position">Founder-Ceo. Dell Corp</div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="testimonial-content">
                                                <div class="testimonial-text">
                                                    <i class="fa fa-quote-left"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation <i class="fa fa-quote-right"></i>
                                                </div>
                                                <img class="testimonial-author-img" src="assets/images/avatar/1.jpg" alt="" />
                                                <div class="testimonial-author">TYRION LANNISTER</div>
                                                <div class="testimonial-author-position">Founder-Ceo. Dell Corp</div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="testimonial-content">
                                                <div class="testimonial-text">
                                                    <i class="fa fa-quote-left"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation <i class="fa fa-quote-right"></i>
                                                </div>
                                                <img class="testimonial-author-img" src="assets/images/avatar/1.jpg" alt="" />
                                                <div class="testimonial-author">TYRION LANNISTER</div>
                                                <div class="testimonial-author-position">Founder-Ceo. Dell Corp</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card alert">
                                <div class="card-header">
                                    <h4 class="f-s-14">Todo</h4>
                                </div>
                                <div class="todo-list">
                                    <div class="tdl-holder">
                                        <div class="tdl-content">
                                            <ul>
                                                <li>
                                                    <label>
                                                        <input type="checkbox"><i></i><span>Post three to six times on Twitter.</span>
                                                        <a href='#' class="ti-close"></a>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label>
                                                        <input type="checkbox" checked><i></i><span>Post one to two times on Facebook.</span>
                                                        <a href='#' class="ti-close"></a>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label>
                                                        <input type="checkbox"><i></i><span>Post two to three times to Instagram and LinkedIn. </span>
                                                        <a href='#' class="ti-close"></a>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label>
                                                        <input type="checkbox" checked><i></i><span>Follow back those who follow you</span>
                                                        <a href='#' class="ti-close"></a>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label>
                                                        <input type="checkbox" checked><i></i><span>Connect with one new person</span>
                                                        <a href='#' class="ti-close"></a>
                                                    </label>
                                                </li>
                                            </ul>
                                        </div>
                                        <input type="text" class="tdl-new form-control" placeholder="Write new item and hit 'Enter'...">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /# column -->
                        <div class="col-lg-4">
                            <div class="card alert">
                                <div class="card-header">
                                    <h4 class="f-s-14">Timeline</h4>
                                </div>
                                <div class="card-body">
                                    <ul class="timeline">
                                        <li>
                                            <div class="timeline-badge primary"><i class="fa fa-smile-o"></i></div>
                                            <div class="timeline-panel">
                                                <div class="timeline-heading">
                                                    <h5 class="timeline-title">Youtube, a video-sharing website, goes live.</h5>
                                                </div>
                                                <div class="timeline-body">
                                                    <p>10 minutes ago</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="timeline-badge warning"><i class="fa fa-sun-o"></i></div>
                                            <div class="timeline-panel">
                                                <div class="timeline-heading">
                                                    <h5 class="timeline-title">Mashable, a news website and blog, goes live.</h5>
                                                </div>
                                                <div class="timeline-body">
                                                    <p>20 minutes ago</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="timeline-badge danger"><i class="fa fa-times-circle-o"></i></div>
                                            <div class="timeline-panel">
                                                <div class="timeline-heading">
                                                    <h5 class="timeline-title">Google acquires Youtube.</h5>
                                                </div>
                                                <div class="timeline-body">
                                                    <p>30 minutes ago</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="timeline-badge success"><i class="fa fa-check-circle-o"></i></div>
                                            <div class="timeline-panel">
                                                <div class="timeline-heading">
                                                    <h5 class="timeline-title">StumbleUpon is acquired by eBay. </h5>
                                                </div>
                                                <div class="timeline-body">
                                                    <p>15 minutes ago</p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /# card -->
                        </div>
                        <div class="col-lg-4">
                            <div class="card p-0">
                                <div class="profile-widget-one">
                                    <div class="profile-one-user-photo">
                                        <div class="profile-one-bg">
                                            <img class="img-responsive" src="assets/images/profile-bg.jpg" alt="" />
                                            <div class="bg-overlay"></div>
                                        </div>
                                        <div class="user-photo"><img src="assets/images/user-female.png" alt="" /></div>
                                    </div>
                                    <div class="profile-one-user-content">
                                        <ul>
                                            <li>
                                                <div class="user-social">
                                                    <h4>Tweets</h4>
                                                    <div class="social-digit">15.5k</div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="user-earning">
                                                    <h4>Followers</h4>
                                                    <div class="social-digit">5412</div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="user-sold">
                                                    <h4>Following</h4>
                                                    <div class="social-digit">1234</div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="profile-one-user-button text-center">
                                        <button class="btn btn-primary btn-outline profile-btn-one">View Profile</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /# column -->
                    </div>
                    <!-- /# row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="footer">
                                <p>This dashboard was generated on <span id="date-time"></span> <a href="#" class="page-refresh">Refresh Dashboard</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <canvas id="fb-chart" width="400" height="400"></canvas>
    </div>
    <script src="assets/js/lib/jquery.min.js"></script>
    <!-- jquery vendor -->
    <script src="assets/js/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="assets/js/lib/menubar/sidebar.js"></script>
    <script src="assets/js/lib/preloader/pace.min.js"></script>
    <!-- sidebar -->
    <script src="assets/js/lib/bootstrap.min.js"></script>
    <!-- bootstrap -->


    <script>
        function printPDF() {
            window.print();
        }
    </script>
    <script>
        $(document).ready(function () {
            function fetchClientPerformance() {
                $.ajax({
                    type: "GET",
                    url: "fetch_client_performance.php",
                    dataType: "json",
                    success: function (data) {
                        console.log(data);
                        if (data.error) {
                            console.log(data.error);
                        } else {
                            // Set the data in the corresponding spans
                            $("#client-id").text(data.clientId);
                            $("#report-creation-date").text(data.reportCreationDate);

                            $("#search_views").text(data.search_views);
                            $("#calls").text(data.calls);
                            $("#directions").text(data.directions);
                            $("#google_reviews").text(data.google_reviews);
                            $("#average_ratings").text(data.average_ratings);
                            $("#review_responses").text(data.review_responses);
                            $("#geo_grid_rankings").text(data.geo_grid_rankings);
                            $("#online_authority").text(data.online_authority);
                            $("#fb_likes").text(data.fb_likes);
                            $("#fb_shares").text(data.fb_shares);
                            $("#fb_reach").text(data.fb_reach);
                            $("#instagram_followers").text(data.instagram_followers);
                            $("#instagram_engagement").text(data.instagram_engagement);
                            $("#instagram_reach").text(data.instagram_reach);
                            $("#monthly_posts").text(data.monthly_posts);
                            $("#citations").text(data.citations);
                            $("#medical_blogs").text(data.medical_blogs);
                            $("#animation_videos").text(data.animation_videos);
                            $("#testimonial_videos").text(data.testimonial_videos);
                            $("#educational_videos").text(data.educational_videos);
                            $("#case_studies").text(data.case_studies);
                            $("#website_performance").text(data.website_performance);
                            $("#website_accessibility").text(data.website_accessibility);
                            $("#website_best_practices").text(data.website_best_practices);
                            $("#website_seo").text(data.website_seo);
                            $("#keyword_rankings").text(data.keyword_rankings);
                            // Add the rest of the new fields here

                            // Create a pie chart
                            var ctx = document.getElementById("fb-chart").getContext("2d");
                            var fbChart = new Chart(ctx, {
                                type: "pie",
                                data: {
                                    labels: ["FB Likes", "FB Shares", "FB Reach"],
                                    datasets: [{
                                        data: [data.fb_likes, data.fb_shares, data
                                            .fb_reach
                                        ],
                                        backgroundColor: ["#36A2EB", "#FF6384",
                                            "#FFCE56"
                                        ],
                                        hoverBackgroundColor: ["#36A2EB", "#FF6384",
                                            "#FFCE56"
                                        ],
                                    }],
                                },
                                options: {
                                    responsive: true,
                                    legend: {
                                        position: "bottom",
                                    },
                                },
                            });
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });
            }

            fetchClientPerformance();
        });
    </script>
</body>

</html>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>shopbee</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="This is shopbee's business background management system" name="description" />
        <meta content="xinfos.sanfu" name="author" />
        
        <link rel="shortcut icon" href="/assets/images/favicon.ico">
        
        <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/app.min.css" rel="stylesheet" type="text/css" />
        <style>
            .form-required {
                color: #d40000;
                color: var(--theme-error-2,#d40000);
                margin-right: 5px;
                font-size: 15px;
                vertical-align: middle
            }
        </style>
    </head>
    <body class="loading">
        <!--- top --->
        <div class="navbar-custom topnav-navbar">
            <div class="container-fluid">
                <!--- site logo begin--->
                <a href="index.html" class="topnav-logo">
                    <span class="topnav-logo-lg">
                        <img src="/assets/images/logo-light.png" alt="" height="45">
                    </span>
                    <span class="topnav-logo-sm">
                        <img src="/assets/images/logo_sm.png" alt="" height="45">
                    </span>
                </a>
                <!--- site logo end--->

                <!--- topbar menu begin --->
                <ul class="list-unstyled topbar-right-menu float-right mb-0">
                    <!--- switching sites begin --->
                    <li class="dropdown notification-list topbar-dropdown d-none d-lg-block">
                        <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" id="topbar-languagedrop" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            <img src="/assets/images/flags/us.jpg" alt="user-image" class="mr-1" height="12">
                            <span class="align-middle">English</span>
                            <i class="mdi mdi-chevron-down"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated topbar-dropdown-menu" aria-labelledby="topbar-languagedrop">
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="/assets/images/flags/germany.jpg" alt="user-image" class="mr-1" height="12">
                                <span class="align-middle">German</span>
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="/assets/images/flags/italy.jpg" alt="user-image" class="mr-1" height="12">
                                <span class="align-middle">Italian</span>
                            </a>
                        </div>
                    </li>
                    <!--- switching sites end --->

                    <!--- notification list begin --->
                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" id="topbar-notifydrop" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="dripicons-bell noti-icon"></i>
                            <span class="noti-icon-badge"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-lg" aria-labelledby="topbar-notifydrop">
                            <div class="dropdown-item noti-title">
                                <h5 class="m-0">
                                    <span class="float-right">
                                        <a href="javascript: void(0);" class="text-dark">
                                            <small>Clear All</small>
                                        </a>
                                    </span>Notification
                                </h5>
                            </div>
                            
                            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 456px;">
                                <div class="slimscroll" style="max-height: 230px; overflow: hidden; width: auto; height: 456px;">
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-primary">
                                            <i class="mdi mdi-comment-account-outline"></i>
                                        </div>
                                        <p class="notify-details">Caleb Flakelar commented on Admin
                                            <small class="text-muted">1 min ago</small>
                                        </p>
                                    </a>
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-info">
                                            <i class="mdi mdi-account-plus"></i>
                                        </div>
                                        <p class="notify-details">New user registered.
                                            <small class="text-muted">5 hours ago</small>
                                        </p>
                                    </a>
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon">
                                            <img src="/assets/images/users/avatar-2.jpg" class="img-fluid rounded-circle" alt="">
                                        </div>
                                        <p class="notify-details">Cristina Pride</p>
                                        <p class="text-muted mb-0 user-msg">
                                            <small>Hi, How are you? What about our next meeting</small>
                                        </p>
                                    </a>
                                </div>
                                <div class="slimScrollBar" style="background: rgb(158, 165, 171); width: 8px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 138.482px;"></div><div class="slimScrollRail" style="width: 8px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;">
                                </div>
                            </div>
                            
                            <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                                View All
                            </a>
                        </div>
                    </li>
                    <!--- notification list end --->

                    <!--- site fast setting begin ---->
                    <!-- <li class="dropdown notification-list">
                        <a class="nav-link right-bar-toggle" href="javascript: void(0);">
                            <i class="dripicons-gear noti-icon"></i>
                        </a>
                    </li> -->
                    <!--- site fast setting end ---->

                    <!--- user profile begin ---->
                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user arrow-none mr-0" data-toggle="dropdown" id="topbar-userdrop" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            <span class="account-user-avatar">
                                <img src="/assets/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
                            </span>
                            <span>
                                <span class="account-user-name"><?php echo \Auth::user()->email;?></span>
                                <span class="account-position"><?php echo \Auth::user()->position;?></span>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated topbar-dropdown-menu profile-dropdown" aria-labelledby="topbar-userdrop">
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="mdi mdi-account-circle mr-1"></i>
                                <span>管理账号</span>
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="mdi mdi-account-edit mr-1"></i>
                                <span>访问店铺</span>
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="mdi mdi-cellphone-lock mr-1"></i>
                                <span>锁屏</span>
                            </a>
                            <a href="/seller/logout" class="dropdown-item notify-item">
                                <i class="mdi mdi-clock-out mr-1"></i>
                                <span>登出</span>
                            </a>
                        </div>
                    </li>
                    <!--- user profile end ---->
                </ul>
                <!--- topbar menu end --->
                
                <a class="button-menu-mobile disable-btn">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                
                <!--- search box begin --->
                <div class="app-search">
                    <form>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="搜索...">
                            <span class="mdi mdi-magnify"></span>
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">搜索</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!--- search box end --->
            </div>
        </div>
        <!--- top --->

        <!--- container --->
        <div class="container-fluid">
            <div class="wrapper">
                <!--- left side menu begin --->
                <div class="left-side-menu active">
                    @yield('sidebar', View::make('layouts.sidebar'))
                </div>
                <div class="content-page">
                <!--- left side menu end --->
                
                    <!--- content begin --->
                    <div class="content">
                        @yield('content')
                    </div>
                    <!--- content end --->

                    <!--- footer begin --->
                    <!-- <footer class="footer">
                        <div class="row">
                            <div class="col-md-6"> 2019 - 2020 © shopbee - xinfos.com </div>
                            <div class="col-md-6">
                                <div class="text-md-right footer-links d-none d-md-block">
                                    <a href="javascript: void(0);">About</a>
                                    <a href="javascript: void(0);">Support</a>
                                    <a href="javascript: void(0);">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </footer> -->
                    <!--- footer end --->
                </div>
            </div>
        </div>
        <!--- container --->

        <div class="rightbar-overlay"></div>

        <script src="/assets/js/app.min.js"></script>
     </body>
</html>
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
    <body>
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

                    <!--- user profile begin ---->
                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user arrow-none mr-0" data-toggle="dropdown" id="topbar-userdrop" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            <span class="account-user-avatar">
                                <img src="/assets/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle" height="30">
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
            </div>
        </div>
        <!--- top --->

        <!--- container --->
        <div class="container-fluid active">
            <div class="wrapper">
                <div class="content-page">
                    <!--- content begin --->
                    <div class="content">
                        @yield('content')
                    </div>
                    <!--- content end --->
                </div>
            </div>
        </div>
        <!--- container --->

        <div class="rightbar-overlay"></div>
<!--         <footer class="footer">
            <div class="row">
                <div class="col-md-6">
                    2019 - 2020 © SanFu - ShopBee.xinfos.com
                </div>
                <div class="col-md-6">
                    <div class="text-md-right footer-links d-none d-md-block">
                        <a href="javascript: void(0);">关于</a>
                        <a href="javascript: void(0);">支持</a>
                        <a href="javascript: void(0);">联系我们</a>
                    </div>
                </div>
            </div>
        </footer> -->

        <script src="/assets/js/app.min.js"></script>
     </body>
</html>
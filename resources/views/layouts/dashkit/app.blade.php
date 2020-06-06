<!DOCTYPE>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc." />

        <link rel="shortcut icon" href="/assets/dashkit/images/logo.png"/>

        <!-- Libs CSS -->
        <link rel="stylesheet" href="/assets/dashkit/fonts/feather/feather.css" />

        <!-- Theme CSS -->
        <link rel="stylesheet" href="/assets/dashkit/css/app.css">
        <link rel="stylesheet" href="/assets/dashkit/css/theme.min.css" id="stylesheetLight">
        <link rel="stylesheet" href="/assets/dashkit/css/theme-dark.min.css" id="stylesheetDark">
        <link rel="stylesheet" href="/assets/dashkit/css/boxicons.min.css" id="boxicons">
    
        <!-- Libs JS -->
        <script src="/assets/js/jquery-3.4.1.min.js"></script>
        <script src="/assets/dashkit/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

        <title>Dashkit</title>
    </head>
    
    <body>
        <!-- SideBar -->
        @yield('sidebar', View::make('layouts.dashkit.sidebar'))
        <!-- Main Conetent -->
        <div class="main-content">
            <nav class="navbar navbar-expand-md navbar-light d-none d-md-flex" id="topbar">
                <div class="container-fluid">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item sf-breadcrumb-item"></li>
                        </ol>
                    </nav>
                </div>
            </nav>
            @yield('content')
        </div>
        <!-- Theme JS -->
        <script type="text/javascript" src="/assets/dashkit/js/theme.min.js"></script>
        <script type="text/javascript" src="/js/ckfinder/ckfinder.js"></script>
    </body>
</html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">

    <link rel="shortcut icon" href="/assets/dashkit/images/logo.png" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="/assets/dashkit/css/theme.min.css" id="stylesheetLight">
    <link rel="stylesheet" href="/assets/dashkit/css/theme.min.css" id="stylesheetDark">

    <!-- Libs CSS -->
    <link rel="stylesheet" href="/assets/dashkit/fonts/feather/feather.css" />

    <!-- Libs JS -->
    <script src="/assets/dashkit/libs/jquery/dist/jquery-3.4.1.min.js"></script>
    <script src="/assets/dashkit/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <title>Dashkit</title>
</head>

<body>
    <!-- SideBar -->
    @yield('sidebar', View::make('layouts.dashkit.top_sidebar'))
    <!-- Main Conetent -->
    <div class="main-content">
        @yield('content')
    </div>

    <!-- Theme JS -->
    <script type="text/javascript" src="/assets/dashkit/js/theme.min.js"></script>

</body>

</html>
<!DOCTYPE>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc." />
        
        <link rel="shortcut icon" href="/assets/dashkit/images/logo.png"/>

        <link rel="stylesheet" href="/assets/dashkit/fonts/feather/feather.css" />
        <!-- Theme CSS -->
        <link rel="stylesheet" href="/assets/dashkit/css/theme.min.css" id="stylesheetLight">
        <link rel="stylesheet" href="/assets/dashkit/css/theme-dark.min.css" id="stylesheetDark">
        
        <!-- Title -->
        <title>Dashkit</title>
    </head>
    
    <body class="d-flex align-items-center bg-auth border-top border-top-2 border-primary">
        <div class="container">
            @yield('content')
        </div>
        <!-- Libs JS -->
        <script src="/assets/dashkit/libs/jquery/dist/jquery.min.js"></script>
        <script src="/assets/dashkit/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Theme JS -->
        <script src="/assets/dashkit/js/theme.min.js"></script>
    </body>
</html>
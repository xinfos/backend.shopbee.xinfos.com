<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8" />
            <title>Shopbee</title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
            <meta content="Coderthemes" name="author" />
            
            <link rel="shortcut icon" href="/assets/images/favicon.ico">
            <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
            <link href="/assets/css/app.min.css" rel="stylesheet" type="text/css" />
        </head>
        
        <body class="authentication-bg">
            <div class="account-pages mt-5 mb-5">
                <div class="container">
                    <div class="row justify-content-center">
                        @yield('auth_content')
                    </div>
                </div>
            </div>
            
            <footer class="footer footer-alt">
                2019 - 2020 © shopbee - xinfos.com
            </footer>
            <script src="/assets/js/app.min.js"></script>
        </body>
</html>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc." />
        
        <link rel="shortcut icon" href="/assets/dashkit/images/logo.png"/>

        <!-- Libs CSS -->
        <link rel="stylesheet" href="/assets/dashkit/fonts/feather/feather.css" />
        <link rel="stylesheet" href="/assets/dashkit/libs/flatpickr/dist/flatpickr.min.css" />
        <link rel="stylesheet" href="/assets/dashkit/libs/quill/dist/quill.core.css" />
        <link rel="stylesheet" href="/assets/dashkit/libs/highlightjs/styles/vs2015.css" />
        
        <!-- Map -->
        <!-- <link href="https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.css" rel="stylesheet" /> -->
        
        <!-- Theme CSS -->
        <link rel="stylesheet" href="/assets/dashkit/css/app.css">
        <link rel="stylesheet" href="/assets/dashkit/css/theme.min.css" id="stylesheetLight">
        <link rel="stylesheet" href="/assets/dashkit/css/theme-dark.min.css" id="stylesheetDark">
       
        <style>
        body {
            font-size:14px;
            /* background-color:white; */
        }
        </style>
        <script src="/assets/js/jquery-3.4.1.min.js"></script>
        <!-- Title -->
        <title>Dashkit</title>
    </head>
    
    <body>
        <!-- Modal: Search -->
        <div class="modal fade" id="sidebarModalSearch" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-vertical" role="document">
                <div class="modal-content">
                    <div class="modal-body" data-toggle="lists" data-options='{"valueNames": ["name"]}'>   
                        <!-- Form -->
                        <form class="mb-4">
                            <div class="input-group input-group-merge input-group-rounded">
                                <!-- Input -->
                                <input type="search" class="form-control form-control-prepended search" placeholder="Search">
                                <!-- Prepend -->
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <span class="fe fe-search"></span>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- List group -->
                        <div class="my-n3">
                            <div class="list-group list-group-flush list">
                                <a class="list-group-item" href="./team-overview.html">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <!-- Avatar -->
                                            <div class="avatar">
                                                <img src="./assets/img/avatars/teams/team-logo-1.jpg" alt="..." class="avatar-img rounded">
                                            </div>
                                        </div>
                                        <div class="col ml-n2">
                                            <!-- Title -->
                                            <h4 class="text-body mb-1 name">Airbnb</h4>
                                            <!-- Time -->
                                            <p class="small text-muted mb-0">
                                                <span class="fe fe-clock"></span> <time datetime="2018-05-24">Updated 2hr ago</time>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Modal: Activity -->
        <div class="modal fade" id="sidebarModalActivity" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-vertical" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- Title -->
                        <h4 class="modal-title">通知</h4>
                        <!-- Navs -->
                        <ul class="nav nav-tabs nav-tabs-sm modal-header-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#modalActivityAction">操作记录</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#modalActivityUser">系统通知</a>
                            </li>
                        </ul>
                    </div>
                    <div class="modal-body">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="modalActivityAction">
                                <!-- List group -->
                                <div class="list-group list-group-flush list-group-activity my-n3">
                                    <a class="list-group-item text-reset" href="#!">
                                        <div class="row">
                                            <div class="col-auto">
                                                <!-- Avatar -->
                                                <div class="avatar avatar-sm">
                                                    <div class="avatar-title font-size-lg bg-primary-soft rounded-circle text-primary">
                                                        <i class="fe fe-mail"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col ml-n2">
                                                <!-- Heading -->
                                                <h5 class="mb-1">发布商品</h5>
                                                <!-- Text -->
                                                <p class="small text-gray-700 mb-0">Sent to all 1,851 subscribers over a 24 hour period</p>
                                                <!-- Time -->
                                                <small class="text-muted">2m ago</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="list-group-item text-reset" href="#!">
                                        <div class="row">
                                            <div class="col-auto">
                                                <!-- Avatar -->
                                                <div class="avatar avatar-sm">
                                                    <div class="avatar-title font-size-lg bg-primary-soft rounded-circle text-primary">
                                                        <i class="fe fe-archive"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col ml-n2">
                                                <!-- Heading -->
                                                <h5 class="mb-1">New project "Goodkit" created</h5>
                                                <!-- Text -->
                                                <p class="small text-gray-700 mb-0">Looks like there might be a new theme soon.</p>
                                                <!-- Time -->
                                                <small class="text-muted">2h ago</small>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            
                            <div class="tab-pane fade" id="modalActivityUser">
                                <!-- List group -->
                                <div class="list-group list-group-flush list-group-activity my-n3">
                                    <a class="list-group-item text-reset" href="#!">
                                        <div class="row">
                                            <div class="col-auto">
                                                <!-- Avatar -->
                                                <div class="avatar avatar-sm avatar-online">
                                                    <img class="avatar-img rounded-circle" src="./assets/img/avatars/profiles/avatar-1.jpg" alt="..." />
                                                </div>
                                            </div>
                                            <div class="col ml-n2">
                                                <!-- Heading -->
                                                <h5 class="mb-1">Dianna Smiley</h5>
                                                <!-- Text -->
                                                <p class="small text-gray-700 mb-0">Uploaded the files "Launchday Logo" and "New Design".</p>
                                                <!-- Time -->
                                                <small class="text-muted">2m ago</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="list-group-item text-reset" href="#!">
                                        <div class="row">
                                            <div class="col-auto">
                                                <!-- Avatar -->
                                                <div class="avatar avatar-sm avatar-online">
                                                    <img class="avatar-img rounded-circle" src="./assets/img/avatars/profiles/avatar-2.jpg" alt="..." />
                                                </div>
                                            </div>
                                            <div class="col ml-n2">
                                                <!-- Heading -->
                                                <h5 class="mb-1">Ab Hadley</h5>
                                                <!-- Text -->
                                                <p class="small text-gray-700 mb-0">Shared the "Why Dashkit?" post with 124 subscribers.</p>
                                                <!-- Time -->
                                                <small class="text-muted">1h ago</small>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- SideBar -->
        @yield('sidebar', View::make('layouts.dashkit.sidebar'))
        <!-- MAIN CONTENT -->
        <div class="main-content">
            @yield('content')
        </div>

        <!-- JAVASCRIPT
        ================================================== -->
        <!-- Libs JS -->
        <script src="/assets/dashkit/libs/jquery/dist/jquery.min.js"></script>
        <script src="/assets/dashkit/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <!-- <script src="/assets/dashkit/libs/@shopify/draggable/lib/es5/draggable.bundle.legacy.js"></script> -->
        <script src="/assets/dashkit/libs/autosize/dist/autosize.min.js"></script>
        <script src="/assets/dashkit/libs/chart.js/dist/Chart.min.js"></script>
        <!-- <script src="/assets/dashkit/libs/dropzone/dist/min/dropzone.min.js"></script> -->
        <script src="/assets/dashkit/libs/flatpickr/dist/flatpickr.min.js"></script>
        <!-- <script src="/assets/dashkit/libs/highlightjs/highlight.pack.min.js"></script> -->
        <script src="/assets/dashkit/libs/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
        <script src="/assets/dashkit/libs/list.js/dist/list.min.js"></script>
        <script src="/assets/dashkit/libs/quill/dist/quill.min.js"></script>
        <script src="/assets/dashkit/libs/select2/dist/js/select2.full.min.js"></script>
        <!-- <script src="/assets/dashkit/libs/chart.js/Chart.extension.js"></script> -->
        
        <!-- Map -->
        <script src='/assets/dashkit/libs/mapbox/dist/mapbox-gl.js'></script>

        <!-- Theme JS -->
        <script src="/assets/dashkit/js/theme.min.js"></script>
    </body>
</html>

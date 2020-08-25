<div class="modal fade" id="sf-modal-sidebar-message" tabindex="-1" role="dialog" aria-hidden="true">
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
                                            <img class="avatar-img rounded-circle" src="/assets/images/users/avatar-1.jpg" alt="..." />
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<nav class="navbar navbar-vertical navbar-vertical-sm fixed-left navbar-expand-md sf-token" id="sf-navbar-first" sf-token="{{ csrf_token() }}">
    <div class="container-fluid">
        <div class="dropdown navbar-brand">
            <a href="#" class="navbar-user-link" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="/assets/dashkit/images/logo.svg" class="navbar-brand-img mx-auto" alt="...">
            </a>
            <div class="dropdown-menu dropdown-menu-left dropdown-menu-card" style="margin-top:-13px;">
                <div class="card-header" style="background-color: #f7f8fa;">
                    <h5 class="card-header-title">管理</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush list my-n3">
                        <li class="list-group-item" style="padding-top: 10px;padding-bottom: 0px;">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h5 class="mb-1 name">
                                        <p>切换店铺</p>
                                    </h5>
                                </div>
                                <div class="col-auto" style="margin-bottom:12px;">
                                    <a href="#!" class=""><i class="fe fe-chevron-right"></i></a>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <a href="#" class="avatar avatar-sm">
                                        <img src="/assets/dashkit/images/avatars/avatar-1.jpg" alt="..." class="avatar-img rounded-circle">
                                    </a>
                                </div>
                                <div class="col ml-n2">
                                    <h4 class="mb-1 name">13520928996</h4>
                                    <p class="small mb-0" style="font-size:10px;"><span class="text-success">●</span> 在线 </p>
                                </div>
                                <div class="col-auto">
                                    <a href="#!" class="btn btn-sm btn-white">管理账号</a>
                  
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav" style="margin-top:8px;"></ul>
            <div class="mt-auto"></div>
            <div class="mb-4">
                <a href="#sf-modal-sidebar-message" class="btn btn-sm btn-block btn-primary" data-toggle="modal">
                    <i class="fe fe-message-square"></i> <span class="d-md-none ml-2">消息通知</span>
                </a>
            </div>
        </div>
    </div>
</nav>

<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light" id="sf-navbar-second"></nav>
<script src="/assets/dashkit/js/sidebar/dist/sidebar.js"></script>
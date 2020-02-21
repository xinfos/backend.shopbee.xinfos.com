<style type="text/css">
    .sf-navbar-second {
        margin-left:56px;
        width:144px;
        padding-left: 0px;
        padding-right: 0px;
        z-index:0;
    }

    .sf-navbar-heading  {
        padding-left: 24px;
        font-size:16px;
        color:#000000c9
    }
</style> 
<nav class="navbar navbar-vertical navbar-vertical-sm fixed-left navbar-expand-md navbar-dark sf-token sf-nav-first" sf-token="{{ csrf_token() }}">
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
            <ul class="navbar-nav mt-3"></ul>
            <hr class="navbar-divider my-3">
            <div class="mt-auto"></div>
            <div class="mb-4" data-toggle="tooltip" data-placement="right" data-template="<div class=&quot;tooltip d-none d-md-block&quot; role=&quot;tooltip&quot;><div class=&quot;arrow&quot;></div><div class=&quot;tooltip-inner&quot;></div></div>" title="" data-original-title="消息通知">
                <a href="#sidebarModalActivity" class="btn btn-sm btn-block btn-primary" data-toggle="modal">
                    <i class="fe fe-message-square"></i> <span class="d-md-none ml-2">消息通知</span>
                </a>
            </div>
        </div>
    </div>
</nav>

<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light sf-navbar-second" style="margin-left:56px;
        width:144px;
        padding-left: 0px;
        padding-right: 0px;
        z-index:0;">
    <h4 class="navbar-heading sf-navbar-heading mb-2" style="        padding-left: 24px;
        font-size:16px;
        color:#000000c9">商品中心</h4>
    <hr class="navbar-divider d-none d-md-block mt-1 mb-4">
    <div class="collapse navbar-collapse" id="sidebarSmallCollapse" style="margin: 0px;">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#sidebarBasics" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="sidebarBasics">商品管理</a>
                <div class="collapse show" id="sidebarBasics">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item active">
                            <a href="../docs/getting-started.html" class="nav-link">商品库</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>

<script>
    $(function(){
        var sidebarMenu = {
            _cfg: {
                menu: {},
                url: "/menu"
            },
            init: function() {
                this._request({'_token': $('.sf-token').attr('sf-token'),}, sidebarMenu._renderFirstMenu);
            },
            _renderFirstMenu:function(menu) {
                var htm = '';
                for(var i = 0; i< menu.length; i++) {
                    htm += '<li class="nav-item dropright active">'
                        + '<a class="nav-link dropdown-toggle" href="' + menu[i].menu_addr + '" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" title="' + menu[i].menu_title + '">'
                        + '<i class="' + menu[i].menu_icon + '" style="color:white;"></i> <span class="d-md-none">'  + menu[i].menu_title + '</span>'
                        + '</a>'
                        + '</li>';
                }
                $('.sf-nav-first .navbar-collapse ul').append(htm);
                console.log(htm)
            },
            _renderSecondMenu: function(menu) {

            },
            _request: function(data, callback) {
                $.ajax({
                    type: 'POST',
                    url: this._cfg.url,
                    dataType: 'json',
                    data: data,
                    success : function(resp) {
                        if (resp.code == 200) {
                            callback(resp.data);
                        }
                    },
                    error : function(e){
                        console.log(e.status);
                        console.log(e.responseText);
                    }
                });
            },
        };
        sidebarMenu.init();
    });
</script>
$(function () {
    var sidebarMenu = {
        _cfg: {
            menu: {},
            url: "/menu"
        },
        init: function () {
            // console.log(22222);
            // var menu = JSON.parse(localStorage.getItem("menu"));
            // console.log(menu.length);
            // console.log(typeof (menu));

            // if (menu !== "null" || menu !== null || menu !== undefined || menu !== '' || !(menu instanceof Array)) {
            //     console.log(333);
            //     sidebarMenu._renderFirstMenu(menu);
            //     return
            // }
            // console.log(1111);
            this._request({
                '_token': $('.sf-token').attr('sf-token'),
            }, sidebarMenu._renderFirstMenu);

        },
        _getCurrentPath: function (url) {
            var v = url.match(/\/(.*?)\//i);
            return v[1];
        },
        _getCurrentURL: function (url) {
            if (url.length < 3)
                return url;

            var v = url.match(/\/(.*)\/(.*)/i);
            return v[1];
        },
        _renderFirstMenu: function (menu) {
            var menuJSON = JSON.stringify(menu);
            localStorage.setItem("menu", menuJSON);

            var htm = '';

            var currentPath = sidebarMenu._getCurrentPath(window.location.pathname);
            for (var i = 0; i < menu.length; i++) {

                var menuPath = sidebarMenu._getCurrentPath(menu[i].menu_addr);
                var isActive = '';
                if (menuPath == currentPath) {
                    isActive = 'sf-active';
                }

                htm += '<li class="nav-item sf-nav-item">' +
                    '<a class="nav-link ' + isActive + '" href="' + menu[i].menu_addr + '"  data-menu="' + menu[i].menu_id + '">' +
                    '<i class="' + menu[i].menu_icon + '"></i>' + menu[i].title +
                    '</a>' +
                    '</li>';

                sidebarMenu._initSecondMenu(menu[i], isActive);
            }
            $('#sf-navbar-first .navbar-collapse ul').append(htm);
        },
        _initSecondMenu: function (menu, isActive) {
            if (menu.sub_menu.length <= 0) {
                return false;
            }
            var m1 = menu.sub_menu;

            var htm = '';

            var isHide = isActive == '' ? 'sf-hide' : '';
            var htm = '<div class="m_s_' + menu.menu_id + ' ' + isHide + '">' +
                '<h4 class="sf-navbar-heading">' + menu.title + '</h4>' +
                '<hr class="navbar-divider d-none d-md-block mt-0">' +
                '<div class="collapse navbar-collapse" style="margin: 0px;">' +
                '<ul class="navbar-nav">';

            var sub = [];
            for (var i = 0; i < m1.length; i++) {
                htm += '<li class="nav-item">' +
                    '<a class="nav-link" href="#m_' + m1[i].menu_id + '" data-toggle="collapse" role="button" aria-haspopup="true" aria-expanded="false" aria-controls="m_' + m1[i].menu_id + '">' + m1[i].title + '</a>' +
                    '<div class="collapse show" id="m_' + m1[i].menu_id + '">' +
                    '<ul class="nav nav-sm flex-column" style="padding-left:15px;padding-right:15px;">';

                var m2 = m1[i].sub_menu;
                for (var j = 0; j < m2.length; j++) {
                    console.log(m2[j].is_show);

                    var isActive = '';
                    if (window.location.pathname == m2[j].menu_addr) {
                        isActive = 'sf-active';
                        $('.sf-breadcrumb-item').empty().text(m2[j].title);
                    }

                    if (sub = sidebarMenu._inThridMenu(window.location.pathname, m2[j].sub_menu)) {
                        isActive = 'sf-active';
                        $('.sf-breadcrumb-item').empty().text(m2[j].title + ' / ' + sub.title);
                    }

                    htm += '<li class="nav-item nav-menu">' +
                        '<a href="' + m2[j].menu_addr + '" class="nav-link ' + isActive + ' m_' + m2[j].menu_id + '">' + m2[j].title + '</a>' +
                        '</li>';
                }
                htm += '</ul></div></li>';
            }
            htm += '</ul></div></div>';

            $('#sf-navbar-second').append(htm);
        },
        _inThridMenu: function (pathname, menu) {
            if (menu.length <= 0) {
                return false;
            }
            for (var i = 0; i < menu.length; i++) {
                if (pathname == menu[i].menu_addr) {
                    return menu[i];
                }
            }
        },
        _enterSecondMenu: function (menu_id) {
            $('#sf-navbar-second > .m_s_' + menu_id).css({
                'display': ''
            });
        },
        _leaveSecondMenu: function (menu_id) {
            $('#sf-navbar-second > .m_s_' + menu_id).css({
                'display': 'none'
            });
        },
        _request: function (data, callback) {
            $.ajax({
                type: 'POST',
                url: this._cfg.url,
                dataType: 'json',
                data: data,
                success: function (resp) {
                    if (resp.code == 200) {
                        callback(resp.data);
                    }
                },
                error: function (e) {}
            });
        },
    };
    sidebarMenu.init();

    $("body").on("mouseenter", ".sf-nav-item", function () {
        var menu_id = $(this).attr('data-menu');
        sidebarMenu._enterSecondMenu(menu_id);
    });

    $("body").on("mouseleave", ".sf-nav-item", function () {
        var menu_id = $(this).attr('data-menu');
        sidebarMenu._leaveSecondMenu(menu_id);
    });
});
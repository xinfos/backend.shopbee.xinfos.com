$(function () {
    var treeTable = function (el, opt) {
        this._el = this.$element = el;
        this._opt = opt;
        this.init();
    }

    treeTable.prototype = {
        _el: '',
        _opt: {
            ajaxRequestUrl: '',
            ajaxType: 'POST',
            ajaxDataType: 'JSON',
            ajaxData: {},
            ajaxReturnSuccCode: 200,
            disableCache: true,
        },
        init: function () {
            this._opt.ajaxData = {
                'cat_id': 10000
            };
            this.ajaxRequestData(this.ajaxRender);
            this.addBindEvent();
        }
    };

    treeTable.prototype.ajaxRender = function (that, data) {

        var len = data.length;
        var depth, pid = 0;
        if (data.length > 0) {
            depth = data[0].depth - 1;
            pid = data[0].pid;
        }

        var nbspHtm = '';
        for (var j = 0; j < depth * 2; j++) {
            nbspHtm += '  &nbsp; &nbsp; ';
        }

        var htm = '';
        for (var i = 0; i < data.length; i++) {
            var isShow = '<span class="badge badge-soft-danger">不显示</span>'
            if (data[i].is_show == 1) {
                isShow = '<span class="badge badge-soft-success">显示</span>';
            }

            var isState = '<span class="badge badge-soft-danger">停用</span>';
            if (data[i].is_show == 1) {
                isState = '<span class="badge badge-soft-success">启用</span>';
            }
            htm += '<tr class="l-' + data[i].cat_id + ' l-c-' + pid + '" lvl=' + depth + '>' +
                '<td scope="row">' +
                '<a href="javascript:void(0)" class="sf-child" data-filter="collapse" data-value=' + data[i].cat_id + '>' + nbspHtm + '<i class="fe fe-chevron-right"></i> &nbsp; &nbsp;' + data[i].name + '</a></td>' +
                '<td>' + data[i].alias + '</td>' +
                '<td>' + isShow + '</td>' +
                '<td>' + isState + '</td>' +
                '<td class="text-right"><a href="javascript:void(0);" class="sf-btn-edit">编辑</a> | <a href="javascript:" class="sf-btn-del">删除</a></td>' +
                '</tr>'
        }

        that.addChild(pid, htm)
    };

    //请求数据
    treeTable.prototype.ajaxRequestData = function (callbackFunc) {
        var that = this;
        $.ajax({
            type: this._opt.ajaxType,
            url: this._opt.ajaxRequestUrl,
            dataType: this._opt.ajaxDataType,
            data: this._opt.ajaxData,
            success: function (resp) {
                var data = [];
                if (resp.code == that._opt.ajaxReturnSuccCode) {
                    data = resp.data;
                }
                callbackFunc(that, data);
            },
            error: function () {
                console.log("get data err");
            }
        });
    }

    treeTable.prototype.addChild = function (pid, child) {
        if ($('tr').hasClass('l-' + pid)) {
            $('.l-' + pid).after(child);
        } else {
            this._el.append(child);
        }
    };

    treeTable.prototype.addBindEvent = function () {
        var that = this;
        $(document).on('click', '.sf-child', function () {
            that._opt.ajaxData = {
                'cat_id': $(this).attr("data-value"),
            };
            switch ($(this).attr("data-filter")) {
                case "collapse": //折叠
                    that.expand($(this).attr("data-value"));
                    break;
                case "expand": //展开
                    that.collapse($(this).attr("data-value"));
                    break;
                default:
                    break;
            }
        });
    };

    //展开
    treeTable.prototype.expand = function (pid) {

        if ($('.l-' + pid + '> td > a > i').hasClass('fe-chevron-right')) {
            $('.l-' + pid + '> td > a > i').removeClass('fe-chevron-right');
            $('.l-' + pid + '> td > a > i').addClass('fe-chevron-down');
            $('.l-' + pid + '> td > a').attr({
                'data-filter': 'expand'
            });
        }
        this.ajaxRequestData(this.ajaxRender);
    }

    //折叠
    treeTable.prototype.collapse = function (pid) {
        var that = this;
        if ($('.l-' + pid + '> td > a > i').hasClass('fe-chevron-down')) {
            $('.l-' + pid + '> td > a > i').removeClass('fe-chevron-down');
            $('.l-' + pid + '> td > a > i').addClass('fe-chevron-right');
            $('.l-' + pid + '> td > a').attr({
                'data-filter': 'collapse'
            });
        }
        var self = $('.l-' + pid);

        $('.l-c-' + pid).each(function () {
            var a = $(this).children().children().first('a');
            var cPid = a.attr("data-value");
            if (cPid > 0) {
                return that.collapse(cPid);
            }
            console.log(cPid);
        });
        $('.l-c-' + pid).remove();
    }




    $.fn.treeTable = function (opt) {
        new treeTable(this, opt);
    };


})
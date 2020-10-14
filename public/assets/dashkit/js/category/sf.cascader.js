$(function () {

    const liClsName = 'sf-cascader-res__opt';
    const activeClsName = 'sf-cascader-active';
    const contetClsName = 'sf-cascader-content';
    const cascaderClsName = 'sf-cascader';

    var template = '';

    var sFCascader = function (el, opt) {
        var self = this;
        self._el = self.$element = el;
        if (typeof opt != "undefined") {
            self._opt = opt;
        }
        self._init()
    }


    sFCascader.prototype = {

        _opt: {
            initLevel: 1,
            currentLevel: 1,
            isLocalData: false,
            isRemoteData: true,
            api: {
                list: '/product/category/sub',
            }
        },
        /**
         * 获取层级内容
         * @method _init
         * @for sFCascader
         * @param opt object 配置对象
         * @return bool
         */
        _init: function () {
            var self = this;
            var m = $('.' + cascaderClsName);
            m.on("click", function () {
                //已展示，则收回
                if (m.siblings().hasClass(contetClsName)) {
                    $('.' + contetClsName).fadeOut("fast", function () {
                        $(this).remove();
                    });
                    return false;
                }
                self._getLevelData(10000, self._opt.initLevel);
            });
        },
        _shrink: function () {

        },
        _expand: function () {},
        /**
         * 获取层级内容
         * @method _getLevelData
         * @for sFCascader
         * @param int lvl 层级
         * @return bool
         */
        _getLevelData: function (catId, level) {
            var that = this;
            //1、是否数据本地读取
            if (that._opt.isLocalData) {
                var data = [];
                that._renderLevelData(that, level, data);
                return;
            }

            //2、是否需要远程读取
            if (that._opt.isRemoteData) {
                that._ajaxPostRequest(that._opt.api.list, level, {
                    "cat_id": catId
                }, that._renderLevelData);
                return;
            }
        },
        /**
         * 渲染层级数据
         * @method _renderLevelData
         * @for sFCascader
         * @param int lvl 层级
         * @return bool
         */
        _renderLevelData: function (that, level, data) {
            if (!data instanceof Array || data.length <= 0) {
                return false;
            }

            var liHtm = '';
            for (var i = 0; i < data.length; i++) {
                liHtm += '<li class="sf-cascader-res__opt sf-cascader-' + data[i].cat_id + '" sf-pid="' + data[i].pid + '" sf-data="' + data[i].cat_id + '" sf-val="' + data[i].name + '">' + data[i].name +
                    '<span class="sf-right"><i class="fe fe-chevron-right"></i></span>' +
                    '</li>';
            }

            var ulHtm = '<div class="sf-cascader-content sf-li-' + level + '" sf-level="' + level + '"><div class="sf-cascader-res">' +
                '<ul class="sf-cascader-res__opts">' + liHtm + '</ul></div></div>';

            $('#sf-category-pid').parent().append(ulHtm);
            that._addlistenEvent();
            that._dlistenEvent();
        },
        _getParentName: function (pid) {
            return $('.sf-cascader-' + pid).attr('sf-val');
        },
        _getParentPid: function (pid) {
            return $('.sf-cascader-' + pid).attr('sf-pid');
        },
        _dlistenEvent: function () {
            var that = this;
            var liJqObject = $('.' + liClsName);
            liJqObject.off("click").one('click', function () {
                var level = that._getCurrentLevel(this);
                var cateName = $(this).attr('sf-val');
                var catId = $(this).attr('sf-data');
                // $('.' + cascaderClsName).val();
                if (level <= 1) {
                    $('.' + cascaderClsName).val(cateName);
                    $('.' + cascaderClsName).attr({
                        "sf-data": catId,
                    })
                    $('.' + contetClsName).fadeOut("fast", function () {
                        $(this).remove();
                    });
                    return;
                }
                var pid = $(this).attr('sf-pid')
                var pNames = [cateName];
                for (var i = level; i > 1; i--) {
                    pName = that._getParentName(pid);
                    pid = that._getParentPid(pid);
                    pNames.unshift(pName);
                }
                $('.' + cascaderClsName).val(pNames.join(' / '));
                $('.' + cascaderClsName).attr({
                    "sf-data": catId,
                })
                $('.' + contetClsName).fadeOut("fast", function () {
                    $(this).remove();
                });
            });

        },
        _addlistenEvent: function () {
            var that = this;
            var liJqObject = $('.' + liClsName);
            liJqObject.hover(function () {
                //判断当前是否已经是`active`状态
                if ($(this).hasClass(activeClsName)) {
                    return false
                }

                //判断同级元素是否含有`active`状态
                $(this).siblings().each(function (idx, el) {
                    if ($(el).hasClass(activeClsName)) {
                        $(el).removeClass(activeClsName);
                        return false;
                    }
                });

                $(this).addClass(activeClsName);

                var level = that._getCurrentLevel(this);
                var nextLevel = level + 1;

                for (var j = level + 1; j < 4; j++) {
                    if ($('.sf-li-' + j).length > 0) {
                        $('.sf-li-' + j).remove();
                    }
                }
                that._getLevelData($(this).attr('sf-data'), (level + 1));
            });
        },
        _getCurrentLevel: function (el) {
            var level = $(el).parent().parent().parent().attr('sf-level');
            return parseInt(level);
        },
        /**
         * 公共封装POST请求方法
         * @method _ajaxPostRequest
         * @for sFCascader
         * @param string url 请求地址
         * @param Object params 请求参数
         * @param Function callback 异步处理回调数据
         * @return bool
         */
        _ajaxPostRequest: function (url, level, params, callback) {
            var that = this;
            $.ajax({
                type: 'post',
                url: url,
                dataType: 'json',
                data: params,
                success: function (resp) {
                    if (resp.code != 200) {
                        // console.log("[err]: data empty");
                        return;
                    }
                    callback(that, level, resp.data);
                },
                error: function () {}
            });
        },
    }


    $.fn.extend({
        sFCascader: function (opt) {
            return new sFCascader($(this), opt)
        }
    });

});
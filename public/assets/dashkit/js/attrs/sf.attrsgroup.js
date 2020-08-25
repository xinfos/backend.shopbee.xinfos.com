$(function () {

    const api = {
        "create": "/product/attrs/add",
        "edit": "/product/attrs/edit"
    };

    const frm = {
        create: '#fromCreateAttrs'
    }

    var sAttrsGroup = function (el, opt) {
        this.el = el;
        this.init();
    }

    sAttrsGroup.prototype.init = function () {
        var self = this;
    }

    sAttrsGroup.prototype.modal = function () {}

    sAttrsGroup.prototype._getAttrVals = function () {
        return $('.sf-attr-vals').val();
    }

    //表单验证
    sAttrsGroup.prototype.verify = function (data) {
        return true;
    }

    //将form表单转换成JSON格式
    sAttrsGroup.prototype.serializeJson = function () {
        var arr = $(frm.create).serializeArray();
        var arrJSON = {};
        $(arr).each(function () {
            arrJSON[this.name] = this.value;
        });
        return arrJSON;
    }

    //保存属性
    sAttrsGroup.prototype.saveSubmit = function () {
        var self = this;
        var formValuesJSON = self.serializeJson()
        if (!self.verify(formValuesJSON)) {
            return false;
        }
        self._ajaxPostRequest(api.create, formValuesJSON, this._parseSaveResult);
    }

    //处理保存结果
    sAttrsGroup.prototype._parseSaveResult = function (that, resp) {
        if (resp.code != 200) {
            return false;
        }
        $('.sf-tbody-attrs').empty().append();
        console.log(resp);
    }

    //请求
    sAttrsGroup.prototype._ajaxPostRequest = function (url, params, callbackFunc) {
        var that = this;
        $.ajax({
            type: 'post',
            url: url,
            dataType: 'json',
            data: params,
            success: function (resp) {
                callbackFunc(that, resp);
            },
            error: function () {}
        });
    }


    $.fn.extend({
        sAttrsGroup: function (opt) {
            return new sAttrsGroup($(this), opt)
        }
    });
    $.fn.serializeJson = function () {
        var serializeObj = {};
        var array = this.serializeArray();
        var str = this.serialize();
        $(array).each(function () {
            if (serializeObj[this.name]) {
                if ($.isArray(serializeObj[this.name])) {
                    serializeObj[this.name].push(this.value);
                } else {
                    serializeObj[this.name] = [serializeObj[this.name], this.value];
                }
            } else {
                serializeObj[this.name] = this.value;
            }
        });
        return serializeObj;
    };
    $('.sf-btn-saveAttrs').on('click', function () {
        $(frm.create).sAttrsGroup().saveSubmit();
    });
});
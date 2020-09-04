$(function () {
    const api = {
        "create": "/product/attrs/value/create",
        "edit": "/product/attrs/edit"
    };

    const clsName = {
        createBtn: ".sf-btn-save-attrsvals",
        listTable: ".sf-tb-list-attrsvals",
        listTbody: ".sf-tb-list-attrsvals > tbody",
    }

    var templateTr = '<tr>' +
        '<td>#</td>' +
        '<td><div class="form-group"><input type="text" name="unit" class="form-control" id="sf-attr-unit"></div></td>' +
        '<td><a href="#" class="sf-btn-attrsvals-save">保存 |</a><a href="#">取消</a></td>' +
        '</tr>';




    var sAttrsVals = function (el, opt) {
        this.el = el;
        this.init();
    }

    sAttrsVals.prototype.init = function () {
        var self = this;
    }


    sAttrsVals.prototype.addTr = function () {
        var self = this;
        $(clsName.listTbody).append(templateTr);
        $('.sf-btn-attrsvals-save').on('click', function () {
            self.saveSubmit();
        });
    }

    sAttrsVals.prototype.saveSubmit = function () {
        var self = this;
        var data = {
            "value": 1,
        }
        if (!self._verify(data)) {
            return false;
        }
        self._ajaxPostRequest(api.create, data, this._parseSaveResult);
    }

    sAttrsVals.prototype._verify = function (data) {
        var rules = [{
            'value': 'required'
        }];
        var err = {
            'value.required': '属性名不能为空',
        };
        return Validator.make(data, rules, err);
    }

    //处理保存结果
    sAttrsVals.prototype._parseSaveResult = function (that, resp) {
        if (resp.code != 200) {
            return false;
        }
        $('.sf-tbody-attrs').empty().append();
        console.log(resp);
    }

    //请求
    sAttrsVals.prototype._ajaxPostRequest = function (url, params, callbackFunc) {
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
        sAttrsVals: function (opt) {
            return new sAttrsVals($(this), opt)
        }
    });

    $(clsName.createBtn).on('click', function () {
        $(clsName.listTable).sAttrsVals().addTr();
    });
})
$(function () {
    var category = {
        _api: {
            add: '/product/category/add',
            edit: '/product/category/edit',
        },
        _template: {
            createfrm: $('#formCreateCategory'),
        },
        _serializeJson: function (obj) {
            var arr = obj.serializeArray();
            var arrJSON = {};
            $(arr).each(function () {
                arrJSON[this.name] = this.value;
            });
            arrJSON["pid"] = $('#sf-category-pid').attr('sf-data');
            return arrJSON;
        },
        _addVerify: function (data) {
            var rules = [{
                'cat_name,pid': 'required',
            }];
            var err = {
                'cat_name.required': '分类名不能为空',
                'pid.required': '父级分类不能为空',
            };
            return Validator.make(data, rules, err);
        },
        _parseAddResult: function (that, resp) {
            var alertClsName = 'alert-primary';
            if (resp.code != 200) {
                alertClsName = 'alert-danger';
            }

            $(".sf-alert-el").fadeIn("fast", function () {
                $('.alert-content').html(resp.msg);
                $('.alert').addClass(alertClsName);
                $(".alert").fadeIn("slow", function () {
                    $(this).css({
                        "display": ""
                    });
                }).delay(1500).fadeOut("slow", function () {
                    $(this).css({
                        "display": "none"
                    });
                    $(this).removeClass(alertClsName);
                    if (resp.code == 200) {
                        $('#modalCreateCategory').modal('hide');
                    }
                });
            })
        },
        _add: function () {
            var self = this;
            var formValuesJSON = self._serializeJson(this._template.createfrm);
            if (!self._addVerify(formValuesJSON)) {
                return false;
            }
            self._ajaxPostRequest(self._api.add, formValuesJSON, self._parseAddResult);
        },
        _edit: function () {

        },
        _parseEditResult: function () {

        },
        _ajaxPostRequest: function (url, params, callback) {
            var that = this;
            $.ajax({
                type: 'post',
                url: url,
                dataType: 'json',
                data: params,
                success: function (resp) {
                    callback(that, resp);
                },
                error: function () {}
            });
        }
    }

    var isClick = true;
    $(".sf-category-add").off('click').on("click", function () {
        if (isClick) {
            isClick = false;
            //事件
            category._add();
            //定时器
            setTimeout(function () {
                isClick = true;
            }, 1000); //一秒内不能重复点击
        }
    });

    // $('.sf-category-add').off("click").bind('click', function () {
    //     category._add();
    // });
});
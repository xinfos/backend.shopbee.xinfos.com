$(function () {
    var category = {
        _api: {
            add: '/product/category/add',
            edit: '/product/category/edit',
        },
        _template: {
            createfrm: $('#formCreateCategory'),
            editfrm: $('#formEditCategory')
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
        _editVerify: function (data) {
            var rules = [{
                'cat_id,cat_name,pid': 'required',
            }];
            var err = {
                'cat_id.required': '没有找到对应的分类信息',
                'cat_name.required': '分类名不能为空',
                'pid.required': '父级分类不能为空',
            };
            return Validator.make(data, rules, err);
        },
        _parseEditResult: function (that, resp) {
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
        _edit: function () {
            var self = this;
            var formValuesJSON = self._serializeJson(this._template.editfrm);
            formValuesJSON["desc"] = EditEditor.getData();
            if (!self._editVerify(formValuesJSON)) {
                return false;
            }
            self._ajaxPostRequest(self._api.edit, formValuesJSON, self._parseEditResult);
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

    $(document).on('click', '.sf-btn-edit', function () {
        var id = $(this).parent().parent().children(':first-child').children().attr("data-value");
        if (id <= 0) {
            return false
        }
        window.location.href = "/setting/product/category/edit?id=" + id
    });

    $(document).on('click', '.sf-btn-del', function () {
        var pid = $(this).parent().parent().first(':a').attr('data-value');
        console.log(pid)
    });

    $('.sf-btn-save').on('click', function () {
        category._edit();
    });
});
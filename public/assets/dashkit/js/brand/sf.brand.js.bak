$(function () {
    var brand = {
        _api: {
            add: '/product/category/add',
            edit: '/product/category/edit',
            del: '/product/category/del'
        },
        _template: {
            createfrm: $('#formCreateBrand'),
            editfrm: $('#formEditBrand')
        },
        _alert: {
            succ: '<div class="alert alert-primary alert-dismissible fade show" role="alert">模板已删除!' +
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                '<span aria-hidden="true">×</span>' +
                '</button>' +
                '</div>',
            err: '<div class="alert alert-danger alert-dismissible fade show" role="alert">模板删除失败!' +
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                '<span aria-hidden="true">×</span>' +
                '</button>' +
                '</div>',
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
                'id,pid': 'required',
            }];
            var err = {
                'id.required': '分类名不能为空',
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
            console.log(formValuesJSON);
            if (!self._editVerify(formValuesJSON)) {
                return false;
            }
            self._ajaxPostRequest(self._api.edit, formValuesJSON, self._parseEditResult);
        },
        _parseDelResult: function (that, resp) {
            if (resp.code != 200) {
                $(".sf-alert-el").fadeIn("slow", function () {
                    $(this).empty().append(that._alert.err);
                }).delay(1500).fadeOut("slow", function () {
                    $(this).empty();
                });
                return false;
            }
            $(".sf-alert-el").fadeIn("slow", function () {
                $('.sf-alert-el').empty().append(that._alert.succ);
                $('.sf-tr-' + that._template.id).remove();
            }).delay(150000000).fadeOut("slow", function () {
                $(this).empty();
            });
        },
        _del: function (brandId) {
            var self = this;
            if (brandId <= 0) {
                return false;
            }
            self._ajaxPostRequest(self._api.del, {
                'id': brandId
            }, self._parseDelResult);
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

    //添加
    $('.sf-btn-save').on('click', function () {
        brand._add();
    });

    //编辑
    $('.sf-btn-edit').on('click', function () {
        brand._edit();
    });

    //删除
    $('.sf-btn-del').on('click', function () {
        var brandId = $(this).parent().parent().attr('data-value');
        $.confirm({
            title: '提示',
            content: '是否确认删除该品牌?!',
            confirmButton: '是',
            cancelButton: '否',
            confirmButtonClass: 'sf-btn sf-btn-primary',
            cancelButtonClass: 'sf-btn sf-btn-white',
            confirm: function () {
                brand._del(brandId);
            },
            cancel: function () {}
        });
    });

    $('#sf-category-pid').sFCascader();

    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
});
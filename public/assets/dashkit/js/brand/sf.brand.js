$(function () {
    var brand = {
        _api: {
            add: '/product/category/add',
            edit: '/product/category/edit',
        },
        _template: {
            createfrm: $('#formCreateBrand'),
            editfrm: $('#formEditBrand')
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
        _edit: function () {
            var self = this;
            var formValuesJSON = self._serializeJson(this._template.editfrm);
            console.log(formValuesJSON);
            if (!self._editVerify(formValuesJSON)) {
                return false;
            }
            self._ajaxPostRequest(self._api.add, formValuesJSON, self._parseAddResult);
        },
        _del: function () {
            var self = this;
            var formValuesJSON = self._serializeJson(this._template.editfrm);
            console.log(formValuesJSON);
            if (!self._editVerify(formValuesJSON)) {
                return false;
            }
            self._ajaxPostRequest(self._api.add, formValuesJSON, self._parseAddResult);
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
            content: '是否确认删除该模板?!',
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
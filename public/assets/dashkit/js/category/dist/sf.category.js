var _methods = {
    add: {
        api: "/product/category/add",
        rule: [{
            'cat_name,pid': 'required'
        }],
        errmsg: {
            'cat_name.required': '分类名不能为空',
            'pid.required': '父级分类不能为空',
        },
        frm: $('#formCreateCategory'),
    },
    edit: {
        api: "/product/category/update",
        rule: [{
            'cat_id,cat_name,pid': 'required',
        }],
        errmsg: {
            'cat_id.required': '没有找到对应的分类信息',
            'cat_name.required': '分类名不能为空',
            'pid.required': '父级分类不能为空',
        },
        frm: $('#formEditCategory'),
    },
    del: {
        api: "/product/category/del",
        rule: [{
            'cat_id': 'required',
        }],
        errmsg: {
            'cat_id.required': '没有找到对应的分类信息',
        },
        tips: {
            title: '提示',
            content: '是否确认删除该分类?!',
            confirmButton: '是',
            cancelButton: '否',
            confirmButtonClass: 'sf-btn sf-btn-primary',
            cancelButtonClass: 'sf-btn sf-btn-white',
            confirm: function () {},
            cancel: function () {}
        }
    }
}

$(function () {
    //add category
    $('.sf-btn-add').on('click', function () {
        var formValuesJSON = SF._serializeFormJSON(_methods.add.frm);
        formValuesJSON['pid'] = $('#sf-category-pid').attr('sf-data');
        SF.AjaxSubmit(_methods.add, formValuesJSON, function (obj, resp) {
            if (resp.code == 200) {
                $('#modalCreateCategory').modal('hide');
                return SF._showSucc(resp.msg);
            }
            return SF._showFail(resp.msg);
        });
    });

    //edit category
    $(document).on('click', '.sf-btn-edit', function () {
        var id = $(this).parent().parent().children(':first-child').children().attr("data-value");
        if (id <= 0) {
            return false
        }
        window.location.href = "/setting/product/category/edit?id=" + id
    });

    //edit category
    $('.sf-btn-save').on('click', function () {
        var formValuesJSON = SF._serializeFormJSON(_methods.edit.frm);
        formValuesJSON['pid'] =  $('#sf-category-pid').attr('sf-data');
        SF.AjaxSubmit(_methods.edit, formValuesJSON, function (obj, resp) {
            if (resp.code == 200) {
                return SF._showSucc(resp.msg);
            }
            return SF._showFail(resp.msg);
        });
    });

    //cancel edit category
    $(document).on('click', '.sf-btn-save-cancel', function () {
        window.location.href = "/setting/product/category/list";
    });

    //del category
    $(document).on('click', '.sf-btn-del', function () {
        var params = {
            "cat_id": $(this).parent().parent().children(':first-child').children().attr("data-value")
        }
        SF.Bind(_methods.del, params, function (that, resp) {
            if (resp.code == 200) {
                $('.l-' + params.cat_id).remove();
                return SF._showSucc(resp.msg);
            }
            return SF._showFail(resp.msg);
        });
    });
});
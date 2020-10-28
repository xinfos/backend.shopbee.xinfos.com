var _attrsMethods = {
    create: {
        api: "/product/attrs/create",
        rule: [{
            'name': 'required'
        }],
        errmsg: {
            'name.required': '属性名不能为空',
        },
        frm: $('#formCreateAttrs'),
    },
    edit: {
        api: "/product/attrs/update",
        rule: [{
            'attr_id,name': 'required',
        }],
        errmsg: {
            'attr_id.required': '没有找到对应的属性',
            'name.required': '属性名不能为空',
        },
        frm: $('#formEditAttrs'),
    },
    delete: {
        api: "/product/attrs/del",
        rule: [{
            'attr_id': 'required',
        }],
        errmsg: {
            'attr_id.required': '没有找到对应的属性',
        },
        tips: {
            title: '提示',
            content: '是否确认删除该属性?!',
            confirmButton: '是',
            cancelButton: '否',
            confirmButtonClass: 'sf-btn sf-btn-primary',
            cancelButtonClass: 'sf-btn sf-btn-white',
            confirm: function () {},
            cancel: function () {}
        }
    }
}

//create attr event
$(document).on('click', '.sf-btn-create', function () {
    SF.FrmSubmit(_attrsMethods.create, function (obj, resp) {
        if (resp.code == 200) {
            return SF._showSucc(resp.msg);
        }
        return SF._showFail(resp.msg);
    });
});

//delete attr event
$(document).on('click', '.sf-btn-del', function () {
    var params = {
        "attr_id": $(this).parent().parent().attr("data-value")
    }

    SF.Bind(_attrsMethods.delete, params, function (that, resp) {
        if (resp.code == 200) {
            $('.li-' + params.attr_id).remove();
            return SF._showSucc(resp.msg);
        }
        return SF._showFail(resp.msg);
    });
});

$(document).on('click', '.sf-btn-save', function () {
    var formValuesJSON = SF._serializeFormJSON(_attrsMethods.edit.frm)
    if (formValuesJSON.is_numeric == 1 && formValuesJSON.unit.length <= 0) { 
        SF._displayInputErr('unit', '需要填写单位');
        return;
    }
    SF.AjaxSubmit(_attrsMethods.edit, formValuesJSON, function (obj, resp) {
        if (resp.code == 200) {
            return SF._showSucc(resp.msg);
        }
        return SF._showFail(resp.msg);
    });
});
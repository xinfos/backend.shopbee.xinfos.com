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
        console.log(resp);
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
        SF._displayInputErr('unit', '1111');
        return;
    }
    SF.AjaxSubmit(_attrsMethods.edit, formValuesJSON, function (obj, resp) {
        console.log(resp);
        return;
        if (resp.code == 200) {
        }
    });
});



// $('.sf-attrgroup-add').on('click', function () {
//     htm = '<tr><td><input class="sf-input-sm"></td><td class="text-center"><a class="sf-btn sf-attrgroup-submit" href="javascript:void(0);">确认</a></td></tr>';
//     $('table > tbody').append(htm);
// });

// $(document).on('click', '.sf-attrgroup-edit', function () {
//     var that = $(this).parent().parent()
//     var Obj = that.children(':first-child');
//     template = '<td><input class="sf-input-sm" value="' + Obj.html() + '"></td><td class="text-center"><a class="sf-btn sf-attrgroup-submit" href="javascript:void(0);">确认</a></td>';
//     $(that).empty().html(template);
// });

// $(document).on('click', '.sf-attrgroup-submit', function () {
//     var that = $(this).parent().parent()
//     var Obj = that.children(':first-child').children();
//     if (!Obj.val()) {
//         return false
//     }
//     var params = {
//         "name": Obj.val(),
//         "cat_id": $('.sf-attrgroup-cate').val(),
//     };
//     SF.AjaxSubmit(_methods.addAttrsGroup, params, function (obj, resp) {
//         if (resp.code == 200) {
//             var dHtml = '<input type="hidden" name="attrgroups" value="' + resp.data.group_id + '" />';
//             var template = '<td>' + params.name + '</td><td class="text-center">' + dHtml + '<a class="sf-btn sf-attrgroup-edit" href="javascript:void(0);">编辑</a></td>';
//             $(that).empty().html(template);
//             return;
//         }
//     });
// });

// $(document).on('click', '.sf-attrgroup-spec-search', function () {
//     var specAttrName = $('.sf-attrgroup-spec-search').val();
//     var params = {
//         "search": specAttrName
//     };
//     SF.AjaxSubmit(_methods.searchSpecAttr, params, function (obj, resp) {
//         console.log(resp);
//         if (resp.code != 200) {

//             return false;
//         }
//         var htm = "";
//         for (var i = 0; i < resp.data.length; i++) {
//             var idTag = 'sepc-' + resp.data[i].attr_id;
//             htm += '<span><input type="checkbox" value="' + resp.data[i].attr_id + '" class="sf-spec-attr-checkbox" id="' + idTag + '"/><label for="' + idTag + '">' + resp.data[i].attr_name + '</label></span>'
//         }
//         $('.sf-spec-attr-checklist').empty().append(htm);
//         console.log(htm);
//     });
// });


// $(document).on('click', '.sf-spec-attr-checkbox', function () {
//     var attrId = $(this).val();
//     var clsActive = 'active-' + attrId;
//     if ($(this).prop('checked')) {
//         if ($('.sf-filter-list > ul > li').hasClass(clsActive)) {
//             return false;
//         }
//         var attrName = $(this).siblings().html();
//         var htm = '<li class="active ' + clsActive + '">' + attrName + '<i class="fe fe-x sf-remove"></i></li>';
//         $('.sf-filter-list > ul').append(htm);
//         return false;
//     }

// });

// $(document).on('click', '.sf-remove', function () {
//     $(this).parent().remove();
// });

// $(document).on('click', '.sf-spec-all-remove', function () {
//     $('.sf-filter-list > ul').empty();
// });

// $('.sf-btn-create').on('click', function () {
//     SF.FrmSubmit(_methods.addAttrsTemplate, function (that, resp) {
//         console.log(resp);
//     });
// });
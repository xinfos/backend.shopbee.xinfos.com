var _methods = {
    addAttrsGroup: {
        api: "/product/attrsgroup/add",
        rule: [{
            'name,cat_id': 'required'
        }],
        errmsg: {
            'name.required': '属性组名称不能为空',
            'cat_id.required': '所属分类不能为空',
        }
    },
    addAttrsTemplate: {
        api: "/product/attrs/template/add",
        rule: [{
            'name,cat_id': 'required'
        }],
        errmsg: {
            'name.required': '模板名称不能为空',
            'cat_id.required': '所属分类不能为空',
        },
        frm: $('#formAttrsTemplate'),
    },
    edit: {
        api: "/product/category/edit",
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
    },
    searchSpecAttr: {
        api: "/product/attrs/query",
        rule: [{
            'search': 'required',
        }],
        errmsg: {
            'search.required': '搜索内容不能为空',
        }
    },
}

$('.sf-attrgroup-add').on('click', function () {
    htm = '<tr><td><input class="sf-input-sm"></td><td class="text-center"><a class="sf-btn sf-attrgroup-submit" href="javascript:void(0);">确认</a></td></tr>';
    $('table > tbody').append(htm);
});

$(document).on('click', '.sf-attrgroup-edit', function () {
    var that = $(this).parent().parent()
    var Obj = that.children(':first-child');
    template = '<td><input class="sf-input-sm" value="' + Obj.html() + '"></td><td class="text-center"><a class="sf-btn sf-attrgroup-submit" href="javascript:void(0);">确认</a></td>';
    $(that).empty().html(template);
});

$(document).on('click', '.sf-attrgroup-submit', function () {
    var that = $(this).parent().parent()
    var Obj = that.children(':first-child').children();
    if (!Obj.val()) {
        return false
    }
    var params = {
        "name": Obj.val(),
        "cat_id": $('.sf-attrgroup-cate').val(),
    };
    SF.AjaxSubmit(_methods.addAttrsGroup, params, function (obj, resp) {
        if (resp.code == 200) {
            var dHtml = '<input type="hidden" name="attrgroups" value="' + resp.data.group_id + '" />';
            var template = '<td>' + params.name + '</td><td class="text-center">' + dHtml + '<a class="sf-btn sf-attrgroup-edit" href="javascript:void(0);">编辑</a></td>';
            $(that).empty().html(template);
            return;
        }
    });
});

$(document).on('click', '.sf-attrgroup-spec-search', function () {
    var specAttrName = $('.sf-attrgroup-spec-search').val();
    var params = {
        "search": specAttrName
    };
    SF.AjaxSubmit(_methods.searchSpecAttr, params, function (obj, resp) {
        console.log(resp);
        if (resp.code != 200) {

            return false;
        }
        var htm = "";
        for (var i = 0; i < resp.data.length; i++) {
            var idTag = 'sepc-' + resp.data[i].attr_id;
            htm += '<span><input type="checkbox" value="' + resp.data[i].attr_id + '" class="sf-spec-attr-checkbox" id="' + idTag + '"/><label for="' + idTag + '">' + resp.data[i].attr_name + '</label></span>'
        }
        $('.sf-spec-attr-checklist').empty().append(htm);
        console.log(htm);
    });
});


$(document).on('click', '.sf-spec-attr-checkbox', function () {
    var attrId = $(this).val();
    var clsActive = 'active-' + attrId;
    if ($(this).prop('checked')) {
        if ($('.sf-filter-list > ul > li').hasClass(clsActive)) {
            return false;
        }
        var attrName = $(this).siblings().html();
        var htm = '<li class="active ' + clsActive + '">' + attrName + '<i class="fe fe-x sf-remove"></i></li>';
        $('.sf-filter-list > ul').append(htm);
        return false;
    }

});

$(document).on('click', '.sf-remove', function () {
    $(this).parent().remove();
});

$(document).on('click', '.sf-spec-all-remove', function () {
    $('.sf-filter-list > ul').empty();
});

$('.sf-btn-create').on('click', function () {
    SF.FrmSubmit(_methods.addAttrsTemplate, function (that, resp) {
        console.log(resp);
    });
});
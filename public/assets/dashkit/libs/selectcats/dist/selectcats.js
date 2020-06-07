var  JSElement=document.createElement("script");
 
JSElement.setAttribute("type","text/javascript");
 
JSElement.setAttribute("src","/assets/dashkit/libs/bootstrapvalidator/dist/frm.js");
 
document.body.appendChild(JSElement);

var cateFrm = {
    _cfg: {
        _arrow:" <font>&gt;</font> ",
        _getcates_api: "http://127.0.0.1:8085/v1/category/sub",
        _getcate_api: "/product/category/get",
        _cats: [],
        _breadcrumb:"",
    },
    init: function() {
        this._select(0, 10000, 1);
    },
    _select: function(id, pid, level) {
        this._getCategorysJSONData({"pid": pid}, id, level);
    },
    _add: function() {
        var data = {
            "cat_name": $('#inputCatName').val(),
            "cat_alias": $('#inputCatAlias').val(),
            "cat_desc": $('#inputCatDesc').val(),
            "_token": $('.categoryModal').attr('csrf_token'),
        };
        console.log(data);
		var r = [{'cat_name':'required'}];
		var err = {
			'cat_name.required':'分类名称不能为空',
		};
		if(Validator.make(data, r, err)){
			frm.submit(data, "/category/add", function(){
                $('#catgoryModal').modal('hide');
                $('li[cat-value='+data.cat_id+'] a').text(data.cat_name);
			});
		}
    },
    _sub: function() {
        var data = {
            "pid":$('#inputCatParentID').val(),
            "cat_name": $('#inputCatName').val(),
            "cat_alias": $('#inputCatAlias').val(),
            "cat_desc": $('#inputCatDesc').val(),
            "_token": $('.categoryModal').attr('csrf_token'),
        };
        console.log(data);
		var r = [{'cat_name':'required'}];
		var err = {
			'cat_name.required':'分类名称不能为空',
		};
		if(Validator.make(data, r, err)){
			frm.submit(data, "/category/subadd", function(){
                $('#catgoryModal').modal('hide');
                $('li[cat-value='+data.cat_id+'] a').text(data.cat_name);
			});
		}
    },
    _put: function() {
        var data = {
            "cat_id": $('#inputCatID').val(),
            "cat_name": $('#inputCatName').val(),
            "cat_alias": $('#inputCatAlias').val(),
            "cat_desc": $('#inputCatDesc').val(),
            "_token": $('.categoryModal').attr('csrf_token'),
        };
        console.log(data);
		var r = [{'cat_id,cat_name':'required'}];
		var err = {
            'cat_id.required':"分类数据异常",
			'cat_name.required':'分类名称不能为空',
		};
		if(Validator.make(data, r, err)){
			frm.submit(data, "/category/edit", function(){
                $('#catgoryModal').modal('hide');
                $('li[cat-value='+data.cat_id+'] a').text(data.cat_name);
			});
		}
    },
    _get: function(catId, reShow) {
        $.ajax({
            type : "post",
            contentType: "application/json;charset=UTF-8",
            url : this._cfg._getcate_api,
            dataType: 'json',
            data : JSON.stringify({
                "cat_id": catId,
                "_token": $('.categoryModal').attr('csrf_token'),
            }),
            success : function(resp) {
                if(resp.code == 200) {
                    cateFrm._renderGet(resp.data, reShow);
                }
            },
            error : function(e){
                console.log(e.status);
                console.log(e.responseText);
            }
        });
    },
    _del: function(catId) {
        var data = {
            "cat_id": catId,
            "_token": $('.categoryModal').attr('csrf_token'),
        };
		var r = [{'cat_id':'required'}];
		var err = {
            'cat_id.required':"分类数据异常",
		};
		if(Validator.make(data, r, err)){
			frm.submit(data, "/category/del", function(){
                $('#deleteModal').modal('hide');
                $('.modal-backdrop').remove();
                $('li[cat-value='+data.cat_id+']').remove();
			});
		}
    },
    _renderSelect: function(id, data, level) {
        _htm = "";
        subLevel = level + 1;
        if (data.length > 0) {
            for(var i = 0; i < data.length; i++) {
                _htm += '<li class="cateLi" ondblclick="cateFrm._get(' + data[i].cat_id + ', 0);" onClick="cateFrm._select(' + i + ',' + data[i].cat_id + ', ' + subLevel + ');" cat-value="' + data[i].cat_id + '"><a href="javascript:void(0);">' + data[i].name + '</a></li>';   
            }
            this._cfg._cats[level] = data;

            $(".cat-" + (level-1) + " li").eq(id).addClass("active").siblings("li").removeClass("active");
            $(".cat-" + level).html(_htm).show();
            $(".cat-" + (level+1)).hide();
        }

        $(".cat-" + (level-1) + " li").eq(id).addClass("active").siblings("li").removeClass("active");
        
        if (level == 2) {
            for(var i = 2; i <= 4; i++) {
                $(".cat-breadcrumb-" + i).empty();
                $(".cat-" + i + " li").removeClass("active");
            }
        }
        var _breadcrumb = $(".cat-" + (level-1) + " li").eq(id).text();
        if (level > 2) {
            _breadcrumb = this._cfg._arrow + _breadcrumb;
        }

        $(".cat-breadcrumb-" + (level-1)).html(_breadcrumb);
    },
    _renderAdd: function() {
        $('#catgoryModal').modal('hide');
        var htm = '<div class="modal fade fixed-right" id="catgoryModal" tabindex="-1" role="dialog" aria-hidden="true">'
                +'<div class="modal-dialog modal-dialog-vertical" role="document">'
                +'<form class="modal-content form-category">'
                +'<div class="modal-body">'
                +'<a class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></a>'
                +'<div class="text-center"><img src="/assets/dashkit/images/designer-life.svg" class="img-fluid mb-3"></div>'
                +'<h2 class="text-center mb-2">新建分类</h2><hr class="mb-4">'
                +'<div class="form-group" style="display:none;"><label for="inputCatID">分类名称</label><input type="text" name="cat_id" id="inputCatID" class="form-control"></div>'
                +'<div class="form-group"><label for="inputCatName">分类名称</label><input type="text" name="cat_name" id="inputCatName" class="form-control"></div>'
                +'<div class="form-group"><label for="inputCatAlias">分类别名</label><input type="text" name="cat_alias" id="inputCatAlias" class="form-control"></div>'
                +'<div class="form-group"><label for="inputCatDesc">分类描述</label><textarea name="cat_desc" id="inputCatDesc" class="form-control" rows="5"></textarea></div>'
                +'</div>'
                +'<div class="modal-footer border-0">'
                +'<button type="button" class="btn btn-sm btn-block btn-primary mt-auto" onclick="cateFrm._add(this);">保 存</button>'
                +'</div></form></div></div>';
                
        $('.categoryModal').children().remove();
        $('.categoryModal').append(htm);
        $('#catgoryModal').modal('show');
    },
    _renderSub:function(obj) {
        var data = {
            "pid": $('#inputCatID').val(),
        };

        var htm = '<div class="modal fade fixed-right" id="catgoryModal" tabindex="-1" role="dialog" aria-hidden="true">'
                +'<div class="modal-dialog modal-dialog-vertical" role="document">'
                +'<form class="modal-content form-category">'
                +'<div class="modal-body">'
                +'<a class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></a>'
                +'<div class="text-center"><img src="/assets/dashkit/images/designer-life.svg" class="img-fluid mb-3"></div>'
                +'<h2 class="text-center mb-2">新增子分类</h2><hr class="mb-4">'
                +'<div class="form-group"><label for="inputCatName">分类名称</label><input type="text" name="cat_name" id="inputCatName" class="form-control"></div>'
                +'<div class="form-group"><label for="inputCatParentID">父级分类名称</label><input type="text" id="inputCatParentID" class="form-control" readonly="readonly" value="' + data.pid  + '"></div>'
                +'<div class="form-group"><label for="inputCatAlias">分类别名</label><input type="text" name="cat_alias" id="inputCatAlias" class="form-control"></div>'
                +'<div class="form-group"><label for="inputCatDesc">分类描述</label><textarea name="cat_desc" id="inputCatDesc" class="form-control" rows="5"></textarea></div>'
                +'</div>'
                +'<div class="modal-footer border-0">'
                +'<button type="button" class="btn btn-sm btn-block btn-primary mt-auto" onclick="cateFrm._sub(this);">保 存</button>'
                +'</div></form></div></div>';
            
            $('.categoryModal').children().remove();
            $('.categoryModal').append(htm);
            $('#catgoryModal').modal('show');  
    },
    _renderDel: function(obj) {
        var data = {
            "cat_id": $('#inputCatID').val(),
            "cat_name": $('#inputCatName').val(),
        };
        var htm = '<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-modal="true">'
        +'<div class="modal-dialog" role="document">'
        +'<div class="modal-content">'
        +'<div class="modal-card card">'
        +'<div class="card-header">'
        +'<h4 class="card-header-title"><i class="fe fe-trash-2"></i> 提示</h4>'
        +'<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>'
        +'<div class="card-header"><p>请再次确认，是否要删除 <span style="color:red;"> `' + data.cat_name + '` </span> 该分类信息?</p></div>'
        +'<div class="card-footer">'
        +'<button type="button" class="btn btn-sm btn-primary mr" onclick="cateFrm._del(' + data.cat_id + ');">删除</button>'
        +'<button type="button" class="btn btn-sm btn-white mr" data-dismiss="modal" aria-label="Close">取消</button>'
        +'</div></div></div></div></div>'

          $('.categoryModal').children().remove();
          $('.categoryModal').append(htm);
          $('#deleteModal').modal({'backdrop':false, 'show': true});
    },
    _renderPut: function(obj) {
        $('#catgoryModal input[readonly]').removeAttr("readonly");
        $('#catgoryModal textarea[readonly]').removeAttr("readonly");
        $('#catgoryModal .modal-footer').children().remove();
        $('#catgoryModal .modal-footer').append('<button type="button" class="btn btn-block btn-primary mt-auto btn-put" onClick="cateFrm._put();">保 存</button>')
    },
    _renderGet: function(data, reShow) {
        $('#catgoryModal').modal('hide');
        var parentCatName = $('li[cat-value='+data.parent_cat_id+'] a').text();
        var htm = '<div class="modal fade fixed-right" id="catgoryModal" tabindex="-1" role="dialog" aria-hidden="true">'
                +'<div class="modal-dialog modal-dialog-vertical" role="document">'
                +'<form class="modal-content form-category">'
                +'<div class="modal-body">'
                +'<a class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></a>'
                +'<div class="text-center"><img src="/assets/dashkit/images/designer-life.svg" class="img-fluid mb-3"></div>'
                +'<h2 class="text-center mb-2">当前分类 ID:' + data.cat_id + '</h2><hr class="mb-4">'
                +'<div class="form-group" style="display:none;"><input type="text" name="cat_id" id="inputCatID" class="form-control" value="' + data.cat_id  + '"></div>'
                +'<div class="form-group"><label for="inputCatName">分类名称</label><input type="text" name="cat_name" id="inputCatName" class="form-control" readonly="readonly" value="' + data.name + '"></div>'
                +'<div class="form-group"><label for="inputCatParentID">父级分类名称</label><input type="text" class="form-control" disabled="disabled" value="' + parentCatName + '"></div>'
                +'<div class="form-group" style="display:none;"><input type="text" id="inputCatParentID" class="form-control" disabled="disabled" value="' + parentCatName + '"></div>'
                +'<div class="form-group"><label for="inputCatAlias">分类别名</label><input type="text" name="cat_alias" id="inputCatAlias" class="form-control" readonly="readonly" value="' + data.alias + '"></div>'
                +'<div class="form-group"><label for="inputCatDesc">分类描述</label><textarea name="cat_desc" id="inputCatDesc" class="form-control" rows="5" readonly="readonly">' + data.desc + '</textarea></div>'
                +'</div>'
                +'<div class="modal-footer border-0">'
                +'<button type="button" class="btn btn-sm btn-block btn-primary mt-auto" onclick="cateFrm._renderPut(this);">编 辑</button>'
                +'<button type="button" class="btn btn-sm btn-block btn-success mt-auto" onclick="cateFrm._renderSub(this);">新增子分类</button>'
                +'<button type="button" class="btn btn-sm btn-block btn-danger mt-auto" onclick="cateFrm._renderDel(this);"> 删 除</button>'
                +'</div></form></div></div>';
                
        $('.categoryModal').children().remove();
        $('.categoryModal').append(htm);
        $('#catgoryModal').modal('show');
    },
    _request: function(data) {
        $.ajax({
            type : "post",
            contentType: "application/json;charset=UTF-8",
            url : cateFrm._cfg._getcates_api,
            dataType: 'json',
            data : JSON.stringify(data),
            success : function(resp) {
                if (resp.code != 200) {
                    cateFrm._renderSelect(id, [], level);
                    return false;
                }
                cateFrm._renderSelect(id, resp.data.list, level);
            },
            error : function(e){
                console.log(e.status);
                console.log(e.responseText);
            }
        });
    },
    _getCategorysJSONData: function(data, id, level) {
        $.ajax({
            type : "post",
            contentType: "application/json;charset=UTF-8",
            url : cateFrm._cfg._getcates_api,
            dataType: 'json',
            data : JSON.stringify(data),
            success : function(resp) {
                if (resp.code != 200) {
                    cateFrm._renderSelect(id, [], level);
                    return false;
                }
                cateFrm._renderSelect(id, resp.data.list, level);
            },
            error : function(e){
                console.log(e.status);
                console.log(e.responseText);
            }
        });
    }
};

cateFrm.init();
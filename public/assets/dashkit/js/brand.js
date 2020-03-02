$(function(){ 
    var BrandFrm = {
        _cfg: {
            
        },
        _init: function() {
            
        },
        _renderAttachment: function() {
            
        },
        _renderAdd: function() {
            $('#sf-modal').modal('hide');
            var htm = '<div class="modal fade fixed-right" id="sf-modal" tabindex="-1" role="dialog" aria-hidden="true">'
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
                    
            $('.sf-modal').children().remove();
            $('.sf-modal').append(htm);
            $('#sf-modal').modal('show');
        },
        _request: function(data) {
            
        }
    };
    
    $('.sf-btn-create').on('click', function() {
        BrandFrm._renderAdd();
    });
});
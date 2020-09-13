$(function () {
    var sAttrsTemplate = {
        _template: {
            id: 0,
            content: '',
            succAlert: '<div class="alert alert-primary alert-dismissible fade show" role="alert">模板已删除!' +
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                '<span aria-hidden="true">×</span>' +
                '</button>' +
                '</div>',
            failAlert: '<div class="alert alert-danger alert-dismissible fade show" role="alert">模板删除失败!' +
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                '<span aria-hidden="true">×</span>' +
                '</button>' +
                '</div>',
        },
        _api: {
            del: '/product/attrsgroup/del'
        },
        _parseDelResult: function (that, resp) {
            if (resp.code != 200) {
                $(".sf-alert-el").fadeIn("slow", function () {
                    $(this).empty().append(that._template.failAlert);
                }).delay(1500).fadeOut("slow", function () {
                    $(this).empty();
                });
                return false;
            }
            $(".sf-alert-el").fadeIn("slow", function () {
                $('.sf-alert-el').empty().append(that._template.succAlert);
                $('.sf-tr-' + that._template.id).remove();
            }).delay(150000000).fadeOut("slow", function () {
                $(this).empty();
            });
        },
        //请求
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
        },
        del: function (templateId) {
            if (templateId <= 0) {
                return false;
            }
            this._template.id = templateId;
            this._ajaxPostRequest(this._api.del, {
                "template_id": templateId
            }, this._parseDelResult);
        }
    };

    $('.sf-btn-del').on('click', function () {
        var templateId = $(this).parent().parent().attr('tr-data');
        $.confirm({
            title: '提示',
            content: '是否确认删除该模板?!',
            confirmButton: '是',
            cancelButton: '否',
            confirmButtonClass: 'sf-btn sf-btn-primary',
            cancelButtonClass: 'sf-btn sf-btn-white',
            confirm: function () {
                sAttrsTemplate.del(templateId);
            },
            cancel: function () {}
        });
    });
})
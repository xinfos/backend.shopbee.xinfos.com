$(function () {
    const api = {
        "create": "/product/attrs/add",
        "edit": "/product/attrs/edit"
    };

    var template = '<div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">' +
        '<div class="modal-dialog" role="document">' +
        '<div class="modal-content">' +
        '<div class="modal-header">' +
        '<h4 class="modal-title">模板</h4>' +
        '<ul class="nav nav-tabs nav-tabs-sm modal-header-tabs">' +
        '<li class="nav-item">' +
        '<a class="nav-link active" data-toggle="tab">新增模板</a>' +
        '</li>' +
        '</ul>' +
        '</div>' +
        '<div class="modal-body">' +
        '<div class="row justify-content-center">' +
        '<div class="col-12 col-lg-10 col-xl-10">111</div>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</div>';

    var sAttrsVals = function (el, opt) {
        this.el = el;
        this.init();
    }

    sAttrsVals.prototype.init = function () {
        var self = this;
    }

    sAttrsVals.prototype.addTr = function () {
        console.log(333);
    }

    sAttrsVals.prototype.save = function () {
        console.log(1);
    }

    $.fn.extend({
        sAttrsVals: function (opt) {
            return new sAttrsVals($(this), opt)
        }
    });

    $('.sf-btn-saveAttrsVals').on('click', function () {
        // $(frm.create).sAttrsVals().save();
    });

    //展示modal
    $('.sf-btn-attrsvals-modal').on('click', function () {
        $('.sf-s').sAttrsVals().addTr();
    });
})
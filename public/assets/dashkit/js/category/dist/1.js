(function ($) {

    const modalHtml = '';

    var CategorySelector = function (el, opt) {

    };

    //init - 初始化数据
    CategorySelector.prototype.init = function () {
        var self = this;
    };

    //modal - 唤起数据
    CategorySelector.prototype.modal = function () {

    }

    //render - 数据渲染
    CategorySelector.prototype.render = function (data) {

    };

    $.fn.extend({
        CategorySelector: function (opt) {
            return new CategorySelector($(this), opt)
        }
    });
})(jQuery);
$(function () {

    const inputText = 1;
    const inputSelect = 2;

    var Product = function (el, opts) {
        this.init();
    }

    //原始对象
    Product.prototype = {
        _el: '',
        _opt: {
            ajaxRequestUrl: '',
            ajaxType: 'POST',
            ajaxDataType: 'JSON',
            ajaxReturnSuccCode: 200,
        },
        _url: {
            brandListUrl: "/product/brand/list",
            AttrsListUrl: "/product/category/attrs",
        }
    };

    //初始化
    Product.prototype.init = function () {
        this._getCategoryAttrs(this._url.AttrsListUrl, 10003);
        this.getBrandData(this._url.brandListUrl, 10010);
    }

    //检查数据
    Product.prototype.check = function () {

    }

    //检查商品标题
    Product.prototype.verifyProductName = function () {
        $('#product_name').value();
    }

    //计算字符串长度
    Product.prototype.calcStrLength = function (str) {
        var l = str.length;
        var unicodeLen = 0;
        for (i = 0; i < l; i++) {
            if ((str.charCodeAt(i) > 127)) {
                unicodeLen++;
            }
            unicodeLen++;
        }
        return unicodeLen;
    }
    //获取商品分类属性
    Product.prototype._getCategoryAttrs = function (url, catId) {
        this._opt.ajaxRequestUrl = url;
        this.ajaxRequestData({
            'cat_id': catId
        }, this.renderAttrs);
    };

    //渲染分类属性
    Product.prototype.renderAttrs = function (that, data) {
        if (data.length <= 0) {
            return false;
        }
        for (var i = 0; i < data.length; i++) {
            if (!(data[i].attrs instanceof Array) || data[i].attrs.length <= 0) {
                continue;
            }
            for (var j = 0; j < data[i].attrs.length; j++) {
                that.renderAttrView(that, data[i].attrs[j]);
            }
        }
    }

    //初始化渲染属性
    Product.prototype.renderAttrView = function (that, prop) {
        switch (prop.fill_type) {
            case inputText:
                that.renderAttrInputText(that, prop);
                break;
            case inputSelect:
                that.renderAttrInputSelect(that, prop);
                break;
        }
    }

    //渲染input框
    Product.prototype.renderAttrInputText = function (that, prop) {

        var requiredHtm, unitHtm = '';
        if (prop.unit.length > 0) {
            unitHtm = '<div class="input-group-append">' +
                '<div class="input-group-text">' +
                '<span>' + prop.unit + '</span>' +
                '</div>' +
                '</div>'
        }
        //是否为必填项
        if (prop.is_required == 1) {
            requiredHtm = '<em class="sf-required">*</em>';
        } else {
            requiredHtm = "&nbsp;&nbsp;&nbsp;"
        }

        var textType = 'type="text"';
        if (prop.is_numeric == 1) {
            textType = 'type="number" min=0'
        }

        var htm = '<div class="col-12 col-md-6 mb-2">' +
            '<div class="form-group">' +
            '<label>' + requiredHtm + prop.attr_name + '：</label>' +
            '<div class="input-group ml-3 mb-3">' +
            '<input ' + textType + '" id="product_name" class="form-control form-control-appended">' +
            unitHtm +
            '</div>' +
            '<small class="form-text text-muted ml-3">' +
            ' 标题和描述关键词是否违规自检工具：商品合规工具。' +
            '</small>' +
            '</div>' +
            '</div>';
        $('.props').append(htm);
    }
    //渲染select框
    Product.prototype.renderAttrInputSelect = function (that, prop) {

        var options = '';
        // var data = [];
        if (prop.values instanceof Array && prop.values.length > 0) {
            for (var i = 0; i < prop.values.length; i++) {
                options += '<option id="' + prop.values[i].val_id + '">' + prop.values[i].val + '</option>';
            }
        }
        var htm = '<div class="col-12 col-md-6 mb-2">' +
            '<div class="form-group">' +
            '<label><em class="sf-required">*</em>' + prop.attr_name + '：</label>' +
            '<div class="input-group input-group-merge ml-3 mb-3">' +
            '<select id="sel-' + prop.attr_id + '" class="custom-select">' + options + '</select>' +
            '</div>' +
            '<small class="form-text text-muted ml-3">' +
            ' 标题和描述关键词是否违规自检工具：商品合规工具。' +
            '</small>' +
            '</div>' +
            '</div>';

        $('.props').append(htm);
    }


    //获取商品分类品牌
    Product.prototype.getBrandData = function (url, catId) {
        this._opt.ajaxRequestUrl = url;
        this.ajaxRequestData({
            'cat_id': catId
        }, this.renderBrandSelect);
    };

    //渲染品牌
    Product.prototype.renderBrandSelect = function (that, data) {
        if (data.list.length <= 0) {
            return false;
        }
        var htm = '';
        for (var i = 0; i < data.list.length; i++) {
            htm += '<option id = "' + data.list[i].brand_id + '" > ' + data.list[i].brand_name + ' </option>';
        }
        $('#product_brand').empty().append(htm);
    }

    //ajax请求数据
    Product.prototype.ajaxRequestData = function (data, callbackFunc) {
        var that = this;
        $.ajax({
            type: this._opt.ajaxType,
            url: this._opt.ajaxRequestUrl,
            dataType: this._opt.ajaxDataType,
            data: data,
            success: function (resp) {
                var respData = [];
                if (resp.code == that._opt.ajaxReturnSuccCode) {
                    respData = resp.data;
                }
                callbackFunc(that, respData);
            },
            error: function () {}
        });
    }

    $.fn.Product = function (opts) {
        new Product(this, opts);
    };


    $('#product_name').on('input', function () {

        var productName = $(this).val();

        value = $(this).val();
        if (value.length > 6) {
            $(this).addClass("is-invalid");
            $('.input-word-length').empty().html('<span class="text-danger">' + value.length + "</span>");
            return false;
        }
        $('.input-word-length').empty().html(value.length);
    });

    // $('#product_brand').on('select', function () {
    //     alert(1);
    // });
});




// <script type="text/javascript">


// 	//滚动条
// 	var basicInfoScrollTop = $('#basic-info').offset().top;
// 	var saleInfoScrollTop = $('#sale-info').offset().top;
// 	var imageInfoScrollTop = $('#image-info').offset().top;
// 	var payInfoScrollTop = $('#pay-info').offset().top;
// 	var logisticsInfoScrollTop = $('#logistics-info').offset().top;
// 	var afterSaleInfoScrollTop = $('#after-sale-info').offset().top;

// 	$(window).scroll(function(){

// 		var scrollTop = document.documentElement.scrollTop || window.pageYOffset || document.body.scrollTop;
// 		if(scrollTop < basicInfoScrollTop) {

// 		} else if(scrollTop >= basicInfoScrollTop && scrollTop < saleInfoScrollTop) {
// 			console.log("basic");
// 		} else if(scrollTop >= saleInfoScrollTop && scrollTop < imageInfoScrollTop) {
// 			console.log("sale");
// 		} else if(scrollTop >= imageInfoScrollTop && scrollTop < payInfoScrollTop) {
// 			console.log("image");
// 		} else if(scrollTop >= payInfoScrollTop && scrollTop < logisticsInfoScrollTop) {
// 			console.log("pay");
// 		} else if(scrollTop >= logisticsInfoScrollTop && scrollTop < afterSaleInfoScrollTop) {
// 			console.log("logistics");
// 		} else {
// 			console.log("after-sale");
// 		}
// 	});

// 	//调整表单大小
// 	window.onresize=function(){
// 		console.log(document.body.clientWidth);
// 		if (document.body.clientWidth > 1200) {
// 			$('.sf-product-frm').removeClass('col-lg-10 col-xl-10');
// 			$('.sf-product-frm').addClass('col-lg-8 col-xl-8');
// 		} else {
// 			$('.sf-product-frm').removeClass('col-lg-8 col-xl-8');
// 			$('.sf-product-frm').addClass('col-lg-10 col-xl-10');
// 		}
// 	}

// </script>
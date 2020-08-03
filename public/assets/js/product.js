$(function(){


	var Product = function(el,opts){
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
        }
    };

    //初始化
    Product.prototype.init = function() {
    	console.log(1);
    }

    //初始化渲染属性
    Product.prototype.renderAttrView = function () {

    }

    //检查数据
    Product.prototype.check = function() {

    }

    //检查商品标题
   	Product.prototype.verifyProductName = function() {
   		$('#product_name').value();
   	}

    //计算字符串长度
    Product.prototype.calcStrLength = function(str) {
    	var l = str.length;
    	var unicodeLen = 0;
    	for(i=0; i<l; i++) {
    		if ((str.charCodeAt(i)>127)){
    			unicodeLen ++;
    		}
    		unicodeLen ++;
    	}
    	return unicodeLen ;
    }

    //ajax请求数据
   	Product.prototype.ajaxRequestData = function(callbackFunc) {
   		var that = this;
        params._token = that._ajax.token;
        $.ajax({
            type: this._options.ajaxType,
            url: this._options.ajaxRequestUrl,
            dataType: this._options.ajaxDataType,
            data: params,
            success:function(resp) {
                var data = [];
                if(resp.code == that._options.ajaxReturnSuccCode) {
                    data = resp.data;
                }
                callbackFunc(that, data);
            },
            error: function() {}
        });
   	}




    $.fn.Product = function(opts){
        new Product(this, opts);
    };



 	$('#product_name').on('input',function(){
 		
 		var productName = $(this).val();

 		

 		value = $(this).val();
 		


 		$('.input-word-length').html(1);


 		console.log(value.length);
 	});
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
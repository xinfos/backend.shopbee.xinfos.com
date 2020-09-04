@extends('layouts.dashkit.app')

@section('content')

<style type="text/css">
.sf-product-frm {
    font-size: 13px;
}
.sf-text-13 {
    font-size: 13px;
} 

.sf-product-push {
	margin:0 auto;
	text-align:center;
	left: 0;
	position: relative;
	bottom: 0;
	width: 100%;
	height: 80px;
	z-index: 100;
	background-color: #ffffff;
	border-top: 1px solid #e3ebf6;
    bottom:0px;
}
.sf-product-push-body{
	margin-top: 30px;
}
input::placeholder{
	font-size:13px;
}
</style>

<link rel="stylesheet" href="/assets/dashkit/libs/transfer/css/jquery.transfer-icon.css">
<link rel="stylesheet" href="/assets/dashkit/libs/transfer/css/jquery.transfer.css">

<div class="row justify-content-center content" style="margin:0px;background-color:#f7f8fa;">
	<div class="sf-product-frm col-12 col-lg-10 col-xl-10">
		<div class="header mt-md-5">
			<div class="header-body">
				<div class="row align-items-center">
					<div class="col">
						<h1 class="header-title">新建 - 分类属性模板</h1>
					</div>
				</div>
			</div>
		</div>
		<!-- Form -->
		<form class="sf-product-frm">
			<div class="row align-items-center mt-4">
				<div class="col-auto">
					<div class="row align-items-center">
						<div class="col mt-2">
							<h5 class="mb-1">商品类目：手机</h5>
						</div>
					</div>
				</div>
				<div class="col-auto">
					<a href="#" class="sf-btn sf-btn-primary sf-btn-create">切换类目</a>
				</div>
			</div>

			<!-- basic-info -->
			<hr class="my-4" id="basic-info">
			<div class="card">
				<div class="card-header">
					<h3 class="card-header-title">基础信息</h3>
				</div>
				<div class="card-body">
					<div class="col-5">
						<div class="form-group">
							<label><em class="sf-required">*</em>属性模板名称：</label>
							<small class="form-text text-muted ml-3">
								标识区分属性之间的模板。
							</small>
							<div class="input-group input-group-merge ml-3 mb-3">
								<input type="text" id="product_name" class="form-control form-control-appended" placeholder="最多允许输入15个汉字（30字符）">
								<div class="input-group-append">
									<div class="input-group-text sf-text-13">
										<span class="input-word-length">0</span><span>/30</span>
									</div>
								</div>
							</div>
						</div>
					</div>
                    <div class="col-5">
                        <div class="form-group">
                            <label><em class="sf-required">*</em>是否启用模板</label>
                            <small class="form-text text-muted ml-3">
                                启用模板后，可在添加商品中使用
                            </small>
                            <div class="btn-group-toggle ml-3" data-toggle="buttons">
                                <label class="btn btn-white mr-2">
                                    <input type="radio" name="state" class="sf-attrgroup-sate" value="1"> <i class="fe fe-check-circle"></i> 启用
                                </label>
                                <label class="btn btn-white ml-2 active">
                                    <input type="radio" name="state" class="sf-attrgroup-sate" value="2" checked="checked"> <i class="fe fe-x-circle"></i> 停用
                                </label>
                            </div>
                        </div>
                    </div>
				</div>
			</div>

			<!-- spec-info -->
            <div class="attr-info" style="">
                <hr class="my-4" id="attr-info">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-header-title">模板属性</h3>
                    </div>
                    <div class="card-body">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label><em class="sf-required">*</em>属性</label>
                                <small class="form-text text-muted ml-3">
                                    本类目下，宝贝价格必须在100.00元-999999.00元之间。
                                </small>
                                <!--  Radio -->
                                <div class="input-group input-group-merge  ml-3 mb-3">
                                    <div>
                                        <span id="selectedItemSpan"></span>
                                    </div>
                                    <div class="transfer"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</form>
	</div>
    <div class="sf-product-push">
        <div class="sf-product-push-body">
            <a href="#" class="sf-btn sf-btn-primary sf-btn-create">保存</a>
            <a href="#" class="sf-btn btn-info sf-btn-create">取消</a>
        </div>
    </div>
</div>


<script src="/assets/dashkit/libs/transfer/dist/jquery.transfer.single.js"></script>
<script type="text/javascript">
    $('.sf-attrgroup-sate').on('click',function(){
        var state = $(this).val();
        if (state == 1) {
            $('.attr-info').fadeIn('slow', function(){
                $(this).css({'display':'block'});
            });
        } else if (state == 2) {
            $('.attr-info').fadeOut('slow', function(){
                $(this).css({'display':'none'});
            });
        }
    });

    var languages = [{
    "language": "jQuery",
    "value": 122
}, {
    "language": "AngularJS",
    "value": 132
}, {
    "language": "ReactJS",
    "value": 422
}, {
    "language": "VueJS",
    "value": 232
}, {
    "language": "JavaScript",
    "value": 765
}, {
    "language": "Java",
    "value": 876
}, {
    "language": "Python",
    "value": 453
}, {
    "language": "TypeScript",
    "value": 125
}, {
    "language": "PHP",
    "value": 633
}, {
    "language": "Ruby on Rails",
    "value": 832
}];


var settings = {
    "inputId": "languageInput",
    "data": languages,
    "itemName": "language",
    "container": "transfer",
    "valueName": "value",
    "itemLabelText": '属性',
    "itemSelectedLabelText":'已选中属性',
    "callable": function(data, names) {
        console.log("Selected ID：" + data)
        $("#selectedItemSpan").text(names)
    }
};

Transfer.transfer(settings);



</script>

@endsection

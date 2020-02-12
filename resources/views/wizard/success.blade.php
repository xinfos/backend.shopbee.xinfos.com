@extends('layouts.base')

@section('content')

<link rel="stylesheet" type="text/css" href="/assets/css/wizard.css">

<div data-reactroot="" class="team">
	<div class="head">
		<h2>创建微商城店铺</h2>
	</div>
	<div class="zent-loading-container zent-loading-container-static" style="height: initial;">
		<div class="team-content">
			<div>
		        <div class="zent-steps zent-steps-breadcrumb step-block">
		            <div class="zent-steps-item is-finish is-clicked" style="width: 25%;">
		                <div class="zent-steps-step">1. 选择店铺类型</div>
		            </div>
		            <div class="zent-steps-item is-finish is-clicked" style="width: 25%;">
		                <div class="zent-steps-step">2. 选择版本</div>
		            </div>
		            <div class="zent-steps-item is-finish is-clicked" style="width: 25%;">
		                <div class="zent-steps-step">3. 经营信息</div>
		            </div>
		            <div class="zent-steps-item is-finish is-clicked" style="width: 25%;">
		                <div class="zent-steps-step">4. 店铺信息</div>
		            </div>
		            <div class="zent-steps-item step-5 is-clicked" style="width: 25%;">
		                <div class="zent-steps-step">5. 完成</div>
		            </div>
		        </div>
				<div class="create-shop">
                    <div class="progress">
                        <div class="progress-bar lg bg-success process-info" role="progressbar">0%</div>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
       var pro = 0;
        //定时函数进行更新
        var update=setInterval(function(){

            //文字提示
            $(".process-info").text("店铺创建中：" + pro + "%");
            //动态改变div的宽度占比
            $(".process-info").css({"width": pro + "%"});
            //控制更新
            if(pro == 100){
                //清除定时器，停止更新
				clearInterval(update);
				$('.step-5').addClass('is-finish')
            }
            //进度改变
            pro++;
        },100);
</script>
@endsection
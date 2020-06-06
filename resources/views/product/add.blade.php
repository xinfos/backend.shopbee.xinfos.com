@extends('layouts.dashkit.app')

@section('content')
<style>
    .card-body div {
        font-size:12px;
	}
</style>
<div class="row justify-content-center">
	<div class="col-12 col-lg-11 col-xl-10">
		<!-- Header -->
		<div class="header mt-md-5">
			<div class="header-body">
				<div class="row align-items-center">
					<div class="col">
						<!-- Pretitle -->
						<!-- <h6 class="header-pretitle">概述</h6> -->
						<!-- Title -->
						<h1 class="header-title">商品发布</h1>
					</div>
				</div><!-- / .row -->
				<div class="row align-items-center">
					<div class="col">
						<!-- Nav -->
						<ul class="nav nav-tabs nav-overflow header-tabs">
							<li class="nav-item">
								<a href="#" class="nav-link active">基础信息</a>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link">销售信息</a>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link">图文描述</a>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link">支付信息</a>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link">物流信息</a>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link">售后服务</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- Form -->
		<form>
			<div class="row align-items-center mt-4 ml-1">
				<div class="col-auto">
					<div class="row align-items-center">
						<div class="col mt-2">
							<h5 class="mb-1">当前类目：手机</h5>
						</div>
					</div> <!-- / .row -->
				</div>
				<div class="col-auto">
					<a href="#" class="sf-btn sf-btn-primary sf-btn-create">切换类目</a>
				</div>
			</div><!-- / .row -->
			
			<!-- Divider -->
			<hr class="my-4">
			<div class="card">
				<div class="card-header">
					<!-- Heading -->
					<h5 class="card-header-title">基础信息</h5>
				</div>
				<div class="card-body">
					<div class="col-12 col-md-6">
						<!-- First name -->
						<div class="form-group">
							<!-- Label -->
							<label>宝贝类型</label>
							<!--  Radio -->
							<!-- <input type="radio" class="form-control"> -->
							<div class="col-md-8 btn-group-toggle d-flex" data-toggle="buttons">
								<label class="btn btn-white col">
									<input type="radio" name="navPosition" id="navPositionSidenav" value="1"> 全新
								</label>
								<label class="btn btn-white col ml-2">
									<input type="radio" name="navPosition" id="navPositionTopnav" value="2"> 二手
								</label>
							</div>
						</div>
					</div>
					<div class="col-12">
						<!-- First name -->
						<div class="form-group">
							<!-- Label -->
							<label>宝贝标题：</label>
							<!--  Radio -->
							<small class="form-text text-muted">
								标题和描述关键词是否违规自检工具：商品合规工具。
							</small>
							<input type="text" class="form-control" placeholder="最多允许输入30个汉字（60字符）">
						</div>
					</div>
					<div class="col-12">
						<!-- First name -->
						<div class="form-group">
							<!-- Label -->
							<label>类目属性：</label>
							<!--  Radio -->
							<small class="form-text text-muted">
								错误填写宝贝属性，可能会引起宝贝下架或搜索流量减少，影响您的正常销售，请认真准确填写！。
							</small>
							<div class="row col-10" style="margin-left:15px;">
								<div class="col-10  mt-4"></div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label>类目属性：</label>
										<input type="text" class="form-control">
									 </div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label>类目属性：</label>
										<input type="text" class="form-control">
									 </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<!-- Divider -->
			<hr class="my-4">
			<div class="card">
				<div class="card-header">
					<!-- Heading -->
					<h5 class="card-header-title">销售信息</h5>
				</div>
				<div class="card-body">
					<div class="col-12 col-md-6">
						<!-- First name -->
						<div class="form-group">
							<!-- Label -->
							<label>一口价：</label>
							<small class="form-text text-muted">
								本类目下，宝贝价格必须在100.00元-999999.00元之间。
							</small>
							<!--  Radio -->
							<div class="input-group input-group-merge mb-3">
								<input type="number" class="form-control form-control-appended" placeholder="">
								<div class="input-group-append">
									<div class="input-group-text">
										<span>元</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-md-6">
						<!-- First name -->
						<div class="form-group">
							<!-- Label -->
							<label>商品条形码：</label>
							<small class="form-text text-muted">
							</small>
							<!--  Radio -->
							<div class="input-group input-group-merge mb-3">
								<input type="text" class="form-control form-control-appended" placeholder="">
								<div class="input-group-append">
									<div class="input-group-text">
										<i class="bx bx-barcode"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<!-- Divider -->
			<hr class="my-4">
			<div class="card">
				<div class="card-header">
					<!-- Heading -->
					<h5 class="card-header-title">图文描述</h5>
				</div>
				<div class="card-body">
					<div class="col-12 col-md-12">
						<!-- First name -->
						<div class="form-group">
							<!-- Label -->
							<label>电脑端宝贝图片：</label>
							<small class="form-text text-muted">
							宝贝主图大小不能超过3MB；700*700 以上图片上传后宝贝详情页自动提供放大镜功能。第5张图为白底图会大大增加手淘曝光机会 查看规范
							</small>
							<!--  Radio -->
						</div>
					</div>
				</div>
			</div>


			<!-- Divider -->
			<hr class="my-4">
			<div class="card">
				<div class="card-header">
					<!-- Heading -->
					<h5 class="card-header-title">支付信息</h5>
				</div>
				<div class="card-body">
					<div class="col-12 col-md-12">
						<!-- First name -->
						<div class="form-group">
							<!-- Label -->
							<label>付款方式：</label>
							<small class="form-text text-muted"></small>
							<!--  Radio -->
						</div>
					</div>
				</div>
			</div>



              <!-- Button -->
              <button class="btn btn-primary">
                Save changes
              </button>

              <!-- Divider -->
              <hr class="my-5">

              <div class="row">
                <div class="col-12 col-md-6">

                  <!-- Public profile -->
                  <div class="form-group">

                    <!-- Label -->
                    <label class="mb-1">
                      Public profile
                    </label>

                    <!-- Form text -->
                    <small class="form-text text-muted">
                      Making your profile public means that anyone on the Dashkit network will be able to find you.
                    </small>

                    <div class="row">
                      <div class="col-auto">

                        <!-- Switch -->
                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="switchOne">
                          <label class="custom-control-label" for="switchOne"></label>
                        </div>

                      </div>
                      <div class="col ml-n2">

                        <!-- Help text -->
                        <small class="text-muted">
                          You're currently invisible
                        </small>

                      </div>
                    </div> <!-- / .row -->
                  </div>

                </div>
                <div class="col-12 col-md-6">

                  <!-- Allow for additional Bookings -->
                  <div class="form-group">

                    <!-- Label -->
                    <label class="mb-1">
                      Allow for additional Bookings
                    </label>

                    <!-- Form text -->
                    <small class="form-text text-muted">
                      If you are available for hire outside of the current situation, you can encourage others to hire you.
                    </small>

                    <div class="row">
                      <div class="col-auto">

                        <!-- Switch -->
                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="switchTwo" checked="">
                          <label class="custom-control-label" for="switchTwo"></label>
                        </div>

                      </div>
                      <div class="col ml-n2">

                        <!-- Help text -->
                        <small class="text-muted">
                          You're currently available
                        </small>

                      </div>
                    </div> <!-- / .row -->
                  </div>

                </div>
              </div> <!-- / .row -->

              <!-- Divider -->
              <hr class="mt-4 mb-5">

              <div class="row justify-content-between">
                <div class="col-12 col-md-6">

                  <!-- Heading -->
                  <h4>
                    Delete your account
                  </h4>

                  <!-- Text -->
                  <p class="small text-muted mb-md-0">
                    Please note, deleting your account is a permanent action and will no be recoverable once completed.
                  </p>

                </div>
                <div class="col-auto">

                  <!-- Button -->
                  <button class="btn btn-danger">
                    Delete
                  </button>

                </div>
              </div> <!-- / .row -->

            </form>

            <br><br>

          </div>
        </div>

<button id="ckfinder-modal" class="button-a button-a-background" style="float: left">Open Modal</button>
<script>
	var button = document.getElementById( 'ckfinder-modal' );

	button.onclick = function() {
		CKFinder.modal( {
			chooseFiles: true,
			width: 800,
			height: 600,
			onInit: function( finder ) {
				finder.on( 'files:choose', function( evt ) {
					var file = evt.data.files.first();
					var output = document.getElementById( 'output' );
					output.innerHTML = 'Selected: ' + escapeHtml( file.get( 'name' ) ) + '<br>URL: ' + escapeHtml( file.getUrl() );
				} );

				finder.on( 'file:choose:resizedImage', function( evt ) {
					var output = document.getElementById( 'output' );
					output.innerHTML = 'Selected resized image: ' + escapeHtml( evt.data.file.get( 'name' ) ) + '<br>url: ' + escapeHtml( evt.data.resizedUrl );
				} );
			}
		} );
	};
</script>
@endsection
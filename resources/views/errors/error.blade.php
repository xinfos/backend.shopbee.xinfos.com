@extends('layouts.dashkit.top_app')

@section('content')

<div class="header"></div>
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-12 col-md-5 col-xl-4 my-5">
			<div class="text-center mt-6">
				<h1 class="text-uppercase mb-4">
					<?php echo $code; ?> 错误
				</h1>
				<h4 class="display-5 mb-3"><?php echo $msg; ?> 😭</h4>
				<a href="/shop/list" class="sf-btn sf-btn-primary mt-3">
					返回店铺首页
				</a>
			</div>
		</div>
	</div>
</div>
@endsection
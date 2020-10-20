@extends('layouts.dashkit.app')
@section('content')
<style>
    body {
        /* background-color: #fff; */
        font-size: 13px;
    }
</style>

<div class="header"></div>
<div class="container-fluid">
    <div class="row justify-content-center mt-4">
        <div class="col-12">
            <div class="row">
                <div class="col-12 col-lg-6 col-xl">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col text-center">
                                    <div class="h1 mt-3 mb-3"><?php echo !empty($data['statistis']['stay_paid']) ? $data['statistis']['stay_paid'] : 0; ?> <small>单</small></div>
                                    <div class="mb-2">
                                        <h5 class="mt-1">待付款</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl">
                    <a href="#" class="">
                        <div class="card sf-bordered">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col text-center">
                                        <div class="h1 mt-3 mb-3"><?php echo !empty($data['statistis']['stay_delivered']) ? $data['statistis']['stay_delivered'] : 0; ?> <small>单</small></div>
                                        <div class="mb-2">
                                            <h5 class="mt-1">待发货</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-lg-6 col-xl">
                    <a href="#" class="">
                        <div class="card sf-bordered">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col text-center">
                                        <div class="h1 mt-3 mb-3"><?php echo !empty($data['statistis']['stay_sign']) ? $data['statistis']['stay_sign'] : 0; ?> <small>单</small></div>
                                        <div class="mb-2">
                                            <h5 class="mt-1">待签收</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-lg-6 col-xl">
                    <a href="#" class="">
                        <div class="card sf-bordered">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col text-center">
                                        <div class="h1 mt-3 mb-3"><?php echo !empty($data['statistis']['stay_refund']) ? $data['statistis']['stay_refund'] : 0; ?> <small>单</small></div>
                                        <div class="mb-2">
                                            <h5 class="mt-1">待退款</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-lg-6 col-xl">
                    <a href="#" class="">
                        <div class="card sf-bordered">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col text-center">
                                        <div class="h1 mt-3 mb-3"><?php echo !empty($data['statistis']['stay_comment']) ? $data['statistis']['stay_comment'] : 0; ?> <small>单</small></div>
                                        <div class="mb-2">
                                            <h5 class="mt-1">待评价</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-lg-6 col-xl">
                    <a href="#" class="">
                        <div class="card sf-bordered">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col text-center">
                                        <div class="h1 mt-3 mb-3"><?php echo !empty($data['statistis']['abnormal_logistics']) ? $data['statistis']['abnormal_logistics'] : 0; ?> <small>单</small></div>
                                        <div class="mb-2">
                                            <h5 class="mt-1">物流异常</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <hr class="my-2">
            <div class="row">
                <div class="col-12 col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-title">实时数据</h5>
                            <span class="text-muted">数据更新时间：<?php echo date('Y-m-d H:i:s'); ?></span>
                            <div class="custom-control">
                                <a href="#" class=""><i class="fe fe-rotate-cw"></i></a>
                            </div>
                        </div>
                        <div class="card-body" style="padding-bottom: 0px;">
                            <div class="row">
                                <div class="col-12 col-lg-6 col-xl sf-col-xl">
                                    <a href="javascript:void(0);">
                                        <div class="card sf-bordered">
                                            <div class="card-body">
                                                <div class="row align-items-center">
                                                    <div class="col text-center">
                                                        <div class="h1 mt-3 mb-3"><?php echo !empty($data['statistis']['abnormal_logistics']) ? $data['statistis']['abnormal_logistics'] : 0; ?> <small>单</small></div>
                                                        <div class="mb-2"><span class="sf-h3 mt-1">物流异常</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-12 col-lg-6 col-xl sf-col-xl">
                                    <div class="card sf-bordered">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col text-center">
                                                    <div class="h1 mt-3 mb-3"><?php echo !empty($data['statistis']['abnormal_logistics']) ? $data['statistis']['abnormal_logistics'] : 0; ?></div>
                                                    <div class="mb-2"><span class="sf-h3 mt-1">物流异常</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 col-xl sf-col-xl">
                                    <div class="card sf-bordered">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col text-center">
                                                    <div class="h1 mt-3 mb-3"><?php echo !empty($data['statistis']['abnormal_logistics']) ? $data['statistis']['abnormal_logistics'] : 0; ?></div>
                                                    <div class="mb-2"><span class="sf-h3 mt-1">物流异常</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-lg-6 col-xl sf-col-xl">
                                    <div class="card sf-bordered">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col text-center">
                                                    <div class="h1 mt-3 mb-3"><?php echo !empty($data['statistis']['abnormal_logistics']) ? $data['statistis']['abnormal_logistics'] : 0; ?></div>
                                                    <div class="mb-2"><span class="sf-h3 mt-1">物流异常</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 col-xl sf-col-xl">
                                    <div class="card sf-bordered">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col text-center">
                                                    <div class="h1 mt-3 mb-3"><?php echo !empty($data['statistis']['abnormal_logistics']) ? $data['statistis']['abnormal_logistics'] : 0; ?></div>
                                                    <div class="mb-2"><span class="sf-h3 mt-1">物流异常</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 col-xl sf-col-xl">
                                    <div class="card sf-bordered">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col text-center">
                                                    <div class="h1 mt-3 mb-3"><?php echo !empty($data['statistis']['abnormal_logistics']) ? $data['statistis']['abnormal_logistics'] : 0; ?></div>
                                                    <div class="mb-2"><span class="sf-h3 mt-1">物流异常</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-title">店铺名称：<?php echo $data['info']['name']; ?></h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-lg-6 col-xl sf-col-xl">
                                    <a href="javascript:void(0);">
                                        <div class="card sf-bordered">
                                            <div class="card-body">
                                                <div class="row align-items-center">
                                                    <div class="col text-center">
                                                        <div class="h1 mt-3 mb-3"><?php echo !empty($data['statistis']['abnormal_logistics']) ? $data['statistis']['abnormal_logistics'] : '0.0%'; ?></div>
                                                        <div class="mb-2"><span class="sf-h3 mt-1">店铺DSR</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-12 col-lg-6 col-xl sf-col-xl">
                                    <div class="card sf-bordered">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col text-center">
                                                    <div class="h1 mt-3 mb-3"><?php echo !empty($data['statistis']['abnormal_logistics']) ? $data['statistis']['abnormal_logistics'] : '0.0%'; ?></div>
                                                    <div class="mb-2"><span class="sf-h3 mt-1">客服回复率</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 col-xl sf-col-xl">
                                    <div class="card sf-bordered">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col text-center">
                                                    <div class="h1 mt-3 mb-3"><?php echo !empty($data['statistis']['abnormal_logistics']) ? $data['statistis']['abnormal_logistics'] : 0; ?></div>
                                                    <div class="mb-2"><span class="sf-h3 mt-1">物流服务</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 col-xl sf-col-xl">
                                    <div class="card sf-bordered">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col text-center">
                                                    <div class="h2 mt-3 mb-3"><?php echo !empty($data['statistis']['abnormal_logistics']) ? $data['statistis']['abnormal_logistics'] : 0; ?></div>
                                                    <div class="mb-2"><span class="sf-h3 mt-1">售后服务</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mt-3">
                                <div class="card">
                                    <div class="card-body">
                                        <button class="sf-btn sf-btn-white">测试</button>
                                        <button class="sf-btn sf-btn-white">测试</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 col-xl">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-header-title">常用功能</h4>
                        </div>
                        <div class="card-body">
                            <div class="card">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
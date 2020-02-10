@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card card-body">
        <h5 class="card-title"><?php echo $info['name'];?></h5>
            <p class="card-text">
                <?php if($info['state'] == 1) { ?>
                    <span class="badge badge-success">营业中</span>
                <?php } else { ?>
                    <span class="badge badge-danger">打烊</span>
                <?php } ?>
            </p>
        </div> 
    </div> 
</div>

<div class="row">
    <div class="col-xl-3 col-lg-6">
        <div class="card widget-flat">
            <div class="card-body">
                <div class="float-right">
                    <i class="mdi mdi-currency-btc widget-icon bg-danger rounded-circle text-white"></i>
                </div>
                <h5 class="text-muted font-weight-normal mt-0" title="Revenue">Revenue</h5>
                <h3 class="mt-3 mb-3">$6,254</h3>
                <p class="mb-0 text-muted">
                    <span class="badge badge-info mr-1">
                        <i class="mdi mdi-arrow-down-bold"></i> 7.00%
                    </span>
                    <span class="text-nowrap">Since last month</span>
                </p>
            </div>
        </div>
    </div> 
    
    <div class="col-xl-3 col-lg-6">
        <div class="card widget-flat">
            <div class="card-body">
                <div class="float-right">
                    <i class="mdi mdi-pulse widget-icon"></i>
                </div>
                <h5 class="text-muted font-weight-normal mt-0" title="Growth">Growth</h5>
                <h3 class="mt-3 mb-3">+ 30.56%</h3>
                <p class="mb-0 text-muted">
                    <span class="text-success mr-2">
                        <i class="mdi mdi-arrow-up-bold"></i> 
                        4.87%
                    </span>
                    <span class="text-nowrap">Since last month</span>
                </p>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-lg-6">
        <div class="card widget-flat bg-success text-white">
            <div class="card-body">
                <div class="float-right">
                    <i class="mdi mdi-account-multiple widget-icon bg-white text-success"></i>
                </div>
                <h6 class="text-uppercase mt-0" title="Customers">Customers</h6>
                <h3 class="mt-3 mb-3">36,254</h3>
                <p class="mb-0">
                    <span class="badge badge-light-lighten mr-1">
                        <i class="mdi mdi-arrow-up-bold"></i> 
                        5.27%
                    </span>
                    <span class="text-nowrap">Since last month</span>
                </p>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-lg-6">
        <div class="card widget-flat bg-primary text-white">
            <div class="card-body">
                <div class="float-right">
                    <i class="mdi mdi-currency-usd widget-icon bg-light-lighten rounded-circle text-white"></i>
                </div>
                <h5 class="font-weight-normal mt-0" title="Revenue">Revenue</h5>
                <h3 class="mt-3 mb-3 text-white">$10,245</h3>
                <p class="mb-0">
                    <span class="badge badge-info mr-1">
                        <i class="mdi mdi-arrow-up-bold"></i>
                        17.26%
                    </span>
                    <span class="text-nowrap">Since last month</span>
                </p>
            </div>
        </div>
    </div> 
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">常用功能</h4>
                <br />
                <div class="button-list">
                    <button type="button" class="btn btn-outline-primary">
                        <i class="mdi mdi-clipboard-arrow-up"></i>
                        <span>发布商品</span>
                    </button>
                    <button type="button" class="btn btn-outline-warning">
                        <i class="mdi mdi-clipboard-arrow-up"></i>
                        <span>订单查询</span>
                    </button>
                    <button type="button" class="btn btn-outline-danger">
                        <i class="mdi mdi-clipboard-arrow-up"></i>
                        <span>交易概览</span>
                    </button>
                    <button type="button" class="btn btn-outline-success">
                        <i class="mdi mdi-clipboard-arrow-up"></i>
                        <span>客户查询</span>    
                    </button>
                    <button type="button" class="btn btn-outline-info">
                        <i class="mdi mdi-clipboard-arrow-up"></i>
                        <span>店铺设置</span>
                    </button>
                </div>
            </div> 
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-4">
        <div class="card text-white bg-info overflow-hidden">
            <div class="card-body">
                <div class="toll-free-box text-center">
                    <h4>
                        <i class="mdi mdi-deskphone"></i> Toll Free : 1-234-567-8901
                    </h4>
                </div>
            </div> 
        </div>
    </div> 
    
    <div class="col-lg-4">
        <div class="card text-white bg-danger overflow-hidden">
            <div class="card-body">
                <div class="toll-free-box text-center">
                    <h4>
                        <i class="mdi mdi-headset"></i> Need help ? Just contact us
                    </h4>
                </div>
            </div> 
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card bg-success text-white">
            <div class="card-body">
                <div class="text-center">
                    <h4>
                        <i class="mdi mdi-deskphone"></i> Toll Free : 1-234-567-8901
                    </h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
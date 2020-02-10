@extends('layouts.base')

@section('content')

<link rel="stylesheet" type="text/css" href="/assets/css/wizard.css">

<div class="row">
    <div class="col-1"></div>
    <div class="col-lg-10 shop">
        <div class="card d-block">
            <div class="card-header" style="background:#f1f1f1;border-bottom-width: 0px">
                <a href="/wizard/choose" class="btn btn-sm btn-primary float-right">创建店铺</a>
                <h4 class="card-title">店铺列表</h4>
                <h6 class="card-subtitle text-muted">Your shop List</h6>
            </div>
            <div class="card-body" style="background:#fafbfe;border:5px solid #f1f1f1;border-top-width: 0px">
                <div class="row">
                    <?php if(!empty($lists['list'])) { ?>
                            <?php foreach($lists['list'] as $v) {?>
                                <div class="col-lg-4">
                                    <div class="card d-block">
                                        <div class="card-body" style="border-top: 2px solid red;">
                                            <h4 class="mt-0">
                                                <a href="apps-projects-details.html" class="text-title"><?php echo $v['name'];?> </a>
                                            </h4>
                                            <?php if($v['state'] == 1) { ?>
                                                <div class="badge badge-success mb-2">营业中</div>
                                            <?php } else { ?>
                                                <div class="badge badge-danger mb-2">打烊</div>
                                            <?php } ?>
                                                <div class="badge badge-danger mb-2">商城</div>
                                            <p class="text-muted font-3 mb-2"><?php echo $v['desc'];?></p>
                                            <br>
                                            <a href="/shop/dashboard" class="card-link text-custom">管理</a>
                                            <a href="javascript: void(0);" class="card-link text-custom">删除</a>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                    <?php } ?>
                </div>
            </div> 
        </div>
    </div>
</div>
@endsection
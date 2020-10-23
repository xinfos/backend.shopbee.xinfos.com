@extends('layouts.dashkit.app')

@section('content')
<style>

</style>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10 col-xl-10">
            <!-- Header -->
            <div class="header mt-md-5">
                <div class="header-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <h1 class="header-title">店铺信息</h1>
                        </div>
                    </div>
                    <!-- / .row -->
                    <div class="row align-items-center">
                        <div class="col">
                            <!-- Nav -->
                            <ul class="nav nav-tabs nav-overflow header-tabs">
                                <li class="nav-item">
                                    <a href="javascript:void(0);" class="nav-link active">基本信息</a>
                                </li>
                                <li class="nav-item">
                                    <a href="/shop/contact" class="nav-link">联系方式</a>
                                </li>
                                <li class="nav-item">
                                    <a href="account-billing.html" class="nav-link">主体信息</a>
                                </li>
                                <li class="nav-item">
                                    <a href="account-members.html" class="nav-link">品牌资质认证</a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void(0);" class="nav-link">跨境电商认证</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <form class="mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-header-title">基础信息</h3>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled mb-0">
                            <li>
                                <p class="mb-4">
                                    <span class="sf-label-right">店铺编号：</span>
                                    <span class="ml-2">
                                        <?php echo !empty($data['shop_id']) ? $data['shop_id'] : 0; ?>
                                    </span>
                                </p>
                                <p class="mb-4">
                                    <span class="sf-label-right">店铺名称：</span>
                                    <span class="ml-2">
                                        <?php echo !empty($data['name']) ? $data['name'] : ""; ?>
                                    </span>
                                    <span class="ml-3">
                                        <a href=" javascript:void(0);">修改</a>
                                    </span>
                                </p>
                                <p class="mb-4">
                                    <span class="sf-label-right" style="vertical-align:top;">店铺LOGO：</span>
                                    <span class="ml-2">
                                        <span id="cupload-edit"></span>
                                    </span>
                                    <span class="ml-3" style="vertical-align:top;">
                                        <a href="javascript:void(0);" style="vertical-align:top;">店铺logo上传规则</a>
                                    </span>
                                </p>
                                <p class="mb-4">
                                    <span class="sf-label-right">店铺认证：</span>
                                    <span class="ml-2">个人店铺</span>
                                </p>
                                <p class="mb-4">
                                    <span class="sf-label-right">创建时间：</span>
                                    <span class="ml-2">个人店铺</span>
                                </p>
                                <p class="mb-0">
                                    <span class="sf-label-right" style="vertical-align:top;">创建时间：</span>
                                    <span class="ml-2">
                                        <textarea rows="5" name="name" style="width:400px;display:inline-block;" class="form-control" placeholder="最多允许输入15个汉字（30字符"></textarea>
                                    </span>
                                    <span class="ml-3 mb-3">
                                        <a href=" javascript:void(0);">保存</a>
                                    </span>
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="/assets/dashkit/libs/cupload/cupload.js"></script>
<script>
    $(function() {
        var cuploadEdit = new Cupload({
            ele: '#cupload-edit',
            name: 'brand_logo',
            num: 1,
            data: ['https://dss1.bdstatic.com/70cFuXSh_Q1YnxGkpoWK1HF6hhy/it/u=1051202618,2738087073&fm=26&gp=0.jpg'],
        });
    });
</script>
@endsection
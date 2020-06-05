@extends('layouts.dashkit.app')

@section('content')
<style>
    .card-body div {
        font-size:13px;
    }
</style>
<div class="header"></div>
<div class="container-fluid" >
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-header-title">新增商家地址</h5>
                </div>
                <div class="card-body">
                    <div class="col-12 col-lg-10 col-xl-10">
                        <form>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>商家联系人：</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>联系方式：</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <label>省（直辖市）</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <label>联系方式：</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <label>联系方式：</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <label>联系方式：</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="mb-1">详细地址：</label>
                                        <small class="form-text text-muted">
                                            请填写详细地址，如街道名称，门牌号码等信息.
                                        </small>
                                        <input type="email" class="form-control" placeholder=" 请填写详细地址，如街道名称，门牌号码等信息.">
                                    </div>
                                </div>
                            </div> <!-- / .row -->
                            <!-- <hr class="my-3"> -->
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label class="mb-1">地址类型e</label>
                                        <small class="form-text text-muted">
                                        Making your profile public means that anyone on the Dashkit network will be able to find you.
                                        </small>
                                        <div class="row">
                                            <div class="col-auto">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="switchOne">
                                                    <label class="custom-control-label" for="switchOne"></label>
                                                </div>
                                            </div>
                                            <div class="col ml-n2">
                                                <small class="text-muted">You're currently invisible</small>
                                            </div>
                                        </div> <!-- / .row -->
                                    </div>
                                </div>
                            </div> <!-- / .row -->
                            <hr class="mb-4">
                            <button class="btn btn-primary">保 存</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



        <!-- <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-header-title">新增商家地址</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group col-lg-6">
                            <label for="staff_name"><em class="form-required">*</em>联系人:</label>
                            <input type="text" class="form-control" id="staff_name" placeholder="请填写联系人姓名">
                        </div>
                        <div class="form-row col-lg-6">
                            <div class="form-group col-md-4">
                                <label for="inputState" class="col-form-label"><em class="form-required">*</em>联系方式：</label>
                                <select id="inputState" class="form-control">
                                    <option>中国 +86</option>
                                </select>
                            </div>
                            <div class="form-group col-md-8">
                                <label for="inputZip" class="col-form-label"><em class="form-required"></em>&nbsp;</label>
                                <input type="text" class="form-control" id="inputZip" placeholder="请填写手机号">
                            </div>
                        </div>
                        <div class="form-row col-lg-6">
                            <div class="form-group col-md-4">
                                <label for="inputState" class="col-form-label"><em class="form-required">*</em>座机号：</label>
                                <input type="text" class="form-control" id="inputZip" placeholder="请填写区号">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputZip" class="col-form-label"><em class="form-required"></em>&nbsp;</label>
                                <input type="text" class="form-control" id="inputZip" placeholder="请填写座机号">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputZip" class="col-form-label"><em class="form-required"></em>&nbsp;</label>
                                <input type="text" class="form-control" id="inputZip" placeholder="分机号 (选填)">
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="staff_name"><em class="form-required">*</em>联系地址:</label>
                            <input type="text" class="form-control" id="staff_name">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="staff_name"><em class="form-required">*</em>详细地址：</label>
                            <input type="text" class="form-control" id="staff_name" placeholder="请填写详细地址，如街道名称，门牌号码等信息">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="staff_name"><em class="form-required">*</em>地址类型:</label>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">退货地址</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck2">
                                <label class="custom-control-label" for="customCheck2">收票地址</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck2">
                                <label class="custom-control-label" for="customCheck2">发货地址</label>
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <button type="submit" class="btn btn-info mr-2">保 存</button>
                            <a href="/address/list" class="btn btn-light">取 消</a>
                        </div>
                    </form>
                </div>
            </div> 
        </div> -->

@endsection

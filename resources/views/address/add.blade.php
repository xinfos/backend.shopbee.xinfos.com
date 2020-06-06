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
                                        <select class="custom-select" data-toggle="select">
                                            <option>My first option</option>
                                            <option>Another option</option>
                                            <option>Third option is here</option>
                                        </select>
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
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label class="mb-1">退货地址</label>
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
                                                <small class=""></small>
                                            </div>
                                        </div> <!-- / .row -->
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label class="mb-1">收票地址</label>
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
                                                <small class=""></small>
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
<script src="/assets/dashkit/libs/select2/dist/js/select2.full.min.js"></script>
@endsection

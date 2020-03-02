@extends('layouts.dashkit.app')

@section('content')

<div class="header"></div>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3 header-title">新建门店</h4>
                    <form>
                        <div class="form-group col-lg-6">
                            <label for="staff_name"><em class="form-required">*</em>门店名称：:</label>
                            <input type="text" class="form-control" id="staff_name" placeholder="门店名称最长20字">
                        </div>
                        <div class="form-row col-lg-6">
                            <div class="form-group col-md-4">
                                <label for="inputState" class="col-form-label"><em class="form-required">*</em>员工帐号</label>
                                <select id="inputState" class="form-control">
                                    <option>中国 +86</option>
                                </select>
                            </div>
                            <div class="form-group col-md-8">
                                <label for="inputZip" class="col-form-label"><em class="form-required"></em>&nbsp;</label>
                                <input type="text" class="form-control" id="inputZip">
                            </div>
                            <p class="text-muted">&nbsp;这里为员工登录后台的子账号</p>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="staff_name"><em class="form-required">*</em>门店名称：:</label>
                            <input type="text" class="form-control" id="staff_name">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="staff_name"><em class="form-required">*</em>所属店铺角色:</label>
                            <select class="form-control">
                                
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="staff_name"><em class="form-required">*</em>可操作权限:</label>
                        </div>
                        <div class="form-group col-lg-6">
                            <button type="submit" class="btn btn-info mr-2">保 存</button>
                            <a href="/staff/list" class="btn btn-light">取 消</a>
                        </div>
                    </form>
                </div>
            </div> 
        </div>
    </div>
</div>
@endsection
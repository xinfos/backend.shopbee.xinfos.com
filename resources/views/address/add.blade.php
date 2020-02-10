@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title">新增商家地址</h4>
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
    </div>
</div>
@endsection
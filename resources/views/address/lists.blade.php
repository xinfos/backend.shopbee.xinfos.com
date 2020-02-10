@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="/address/add" class="btn btn-success btn-sm mb-2 mr-2 float-right">新建地址</a>
                <h4 class="header-title mt-1">商家地址库</h4>
                <br>
                				
                <div class="table-responsive">
                    <table class="table table-centered mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th style="width: 20px;">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">&nbsp;</label>
                                    </div>
                                </th>
                                <th>联系人</th>
                                <th>联系方式</th>
                                <th>地址</th>
                                <th>地址类型</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck7">
                                        <label class="custom-control-label" for="customCheck7">&nbsp;</label>
                                    </div>
                                </td>
                                <td>
                                    杨先生
                                </td>
                                <td>
                                    13520928991
                                </td>
                                <td>
                                    北京市北京市东城区雍和宫大厦E座
                                </td>
                                <td>
                                    退货地址 <span class="badge badge-success">默认</span>
                                </td>
                                <td>
                                    <a href="javascript:void(0);">编辑</a>
                                    <a href="javascript:void(0);">删除</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div> 
        </div> 
    </div> 
</div>
@endsection
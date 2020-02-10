@extends('layouts.app')

@section('content')

<!-- 商品名称：

商品分组：
商品类型：
销量：
-
价格：
元
-
元
库存扣减方式： -->

<!-- <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="/staff/add" class="btn btn-success btn-sm mb-2 mr-2 float-right">发布商品</a>
                <h4 class="header-title mt-1">商品管理</h4>
                <br>
                <div class="card" style="background:#EFF0F2;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group mb-3">
                                    <label>商品名称</label>
                                    <input type="text" class="form-control" placeholder="输入商品名称、编/条码">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group mb-3">
                                    <label>商品类型</label>
                                    <select class="form-control">
                                        <option value="1">全部</option>
                                        <option value="1">实物商品</option>
                                        <option value="1">虚拟商品</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group mb-3">
                                    <label>员工姓名</label>
                                    <input type="text" class="form-control" placeholder="门店名称最长20字">
                                </div>
                            </div>
                            <div class="form-row col-lg-3">
                                <div class="col-auto  col-sm-5">
                                    <label>价格</label>
                                    <input type="text" class="form-control mb-2" id="inlineFormInput" placeholder="Jane Doe">
                                </div>
                                <div class="col-auto  col-sm-2">
                                    <label>&nbsp;</label>
                                    <span class="mb-2" >-</span>
                                </div>
                                <div class="col-auto col-sm-5">
                                    <label>&nbsp;</label>
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control " id="inlineFormInputGroup" placeholder="Username">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group mb-3">
                                    <label>员工手机号</label>
                                    <input type="text" class="form-control" pse>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="text-lg-left">
                                    <button type="button" class="btn btn-primary mb-2 mr-2">
                                        <i class="dripicons-search mr-1"></i> 
                                        搜 索
                                    </button>
                                    <button type="button" class="btn btn-light mb-2">导 出</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                                <th>员工姓名</th>
                                <th>联系方式</th>
                                <th>角色</th>
                                <th>添加人</th>
                                <th>添加时间</th>
                                <th>状态</th>
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
                                    <a href="apps-ecommerce-orders-details.html" class="text-body font-weight-bold">#BM9703</a>
                                </td>
                                <td>
                                    13520928991
                                </td>
                                <td>
                                    普通员工
                                </td>
                                <td>
                                    Admin
                                </td>
                                <td>
                                    2020-02-02 20:20:20
                                </td>
                                <td>
                                    <h5><span class="badge badge-success-lighten"><i class="mdi mdi-check"></i> 启用</span></h5>
                                </td>
                                <td>
                                    <a href="javascript:void(0);">查看</a>
                                    <a href="javascript:void(0);">编辑</a>
                                    <a href="javascript:void(0);">更换</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div> 
        </div> 
    </div> 
</div> -->
<div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row mb-2">
                                            <div class="col-lg-12">
                                                <form class="form-inline">
                                                    <div class="form-group mb-2">
                                                        <label for="inputPassword2" class="sr-only">Search</label>
                                                        <input type="search" class="form-control" id="inputPassword2" placeholder="Search...">
                                                    </div>
                                                    <div class="form-group mx-sm-3 mb-2">
                                                        <label for="status-select" class="mr-2">Status</label>
                                                        <select class="custom-select" id="status-select">
                                                            <option selected="">Choose...</option>
                                                            <option value="1">Paid</option>
                                                        </select>
                                                    </div>
                                                </form>                            
                                            </div>
                                        </div>
                
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
                                                        <th>Order ID</th>
                                                        <th>Date</th>
                                                        <th>Payment Status</th>
                                                        <th>Total</th>
                                                        <th>Payment Method</th>
                                                        <th>Order Status</th>
                                                        <th style="width: 125px;">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck2">
                                                                <label class="custom-control-label" for="customCheck2">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                        <td><a href="apps-ecommerce-orders-details.html" class="text-body font-weight-bold">#BM9708</a> </td>
                                                        <td>
                                                            August 05 2018 <small class="text-muted">10:29 PM</small>
                                                        </td>
                                                        <td>
                                                            <h5><span class="badge badge-success-lighten"><i class="mdi mdi-coin"></i> Paid</span></h5>
                                                        </td>
                                                        <td>
                                                            $176.41
                                                        </td>
                                                        <td>
                                                            Mastercard
                                                        </td>
                                                        <td>
                                                            <h5><span class="badge badge-info-lighten">Shipped</span></h5>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck3">
                                                                <label class="custom-control-label" for="customCheck3">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                        <td><a href="apps-ecommerce-orders-details.html" class="text-body font-weight-bold">#BM9707</a> </td>
                                                        <td>August 04 2018 <small class="text-muted">08:18 AM</small></td>
                                                        <td>
                                                            <h5><span class="badge badge-warning-lighten"><i class="mdi mdi-timer-sand"></i> Awaiting Authorization</span></h5>
                                                        </td>
                                                        <td>
                                                            $1,458.65
                                                        </td>
                                                        <td>
                                                            Visa
                                                        </td>
                                                        <td>
                                                            <h5><span class="badge badge-warning-lighten">Processing</span></h5>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck4">
                                                                <label class="custom-control-label" for="customCheck4">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                        <td><a href="apps-ecommerce-orders-details.html" class="text-body font-weight-bold">#BM9706</a> </td>
                                                        <td>August 04 2018 <small class="text-muted">10:29 PM</small></td>
                                                        <td>
                                                            <h5><span class="badge badge-success-lighten"><i class="mdi mdi-coin"></i> Paid</span></h5>
                                                        </td>
                                                        <td>
                                                            $801.99
                                                        </td>
                                                        <td>
                                                            Credit Card
                                                        </td>
                                                        <td>
                                                            <h5><span class="badge badge-warning-lighten">Processing</span></h5>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck5">
                                                                <label class="custom-control-label" for="customCheck5">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                        <td><a href="apps-ecommerce-orders-details.html" class="text-body font-weight-bold">#BM9705</a> </td>
                                                        <td>August 03 2018 <small class="text-muted">07:56 AM</small></td>
                                                        <td>
                                                            <h5><span class="badge badge-success-lighten"><i class="mdi mdi-coin"></i> Paid</span></h5>
                                                        </td>
                                                        <td>
                                                            $215.35
                                                        </td>
                                                        <td>
                                                            Mastercard
                                                        </td>
                                                        <td>
                                                            <h5><span class="badge badge-success-lighten">Delivered</span></h5>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck6">
                                                                <label class="custom-control-label" for="customCheck6">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                        <td><a href="apps-ecommerce-orders-details.html" class="text-body font-weight-bold">#BM9704</a> </td>
                                                        <td>May 22 2018 <small class="text-muted">07:22 PM</small></td>
                                                        <td>
                                                            <h5><span class="badge badge-danger-lighten"><i class="mdi mdi-cancel"></i> Payment Failed</span></h5>
                                                        </td>
                                                        <td>
                                                            $2,514.36
                                                        </td>
                                                        <td>
                                                            Paypal
                                                        </td>
                                                        <td>
                                                            <h5><span class="badge badge-danger-lighten">Cancelled</span></h5>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck7">
                                                                <label class="custom-control-label" for="customCheck7">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                        <td><a href="apps-ecommerce-orders-details.html" class="text-body font-weight-bold">#BM9703</a> </td>
                                                        <td>April 02 2018 <small class="text-muted">03:02 AM</small></td>
                                                        <td>
                                                            <h5><span class="badge badge-success-lighten"><i class="mdi mdi-coin"></i> Paid</span></h5>
                                                        </td>
                                                        <td>
                                                            $183.20
                                                        </td>
                                                        <td>
                                                            Payoneer
                                                        </td>
                                                        <td>
                                                            <h5><span class="badge badge-info-lighten">Shipped</span></h5>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck8">
                                                                <label class="custom-control-label" for="customCheck8">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                        <td><a href="apps-ecommerce-orders-details.html" class="text-body font-weight-bold">#BM9702</a> </td>
                                                        <td>March 18 2018 <small class="text-muted">11:19 PM</small></td>
                                                        <td>
                                                            <h5><span class="badge badge-warning-lighten"><i class="mdi mdi-timer-sand"></i> Awaiting Authorization</span></h5>
                                                        </td>
                                                        <td>
                                                            $1,768.41
                                                        </td>
                                                        <td>
                                                            Visa
                                                        </td>
                                                        <td>
                                                            <h5><span class="badge badge-warning-lighten">Processing</span></h5>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck9">
                                                                <label class="custom-control-label" for="customCheck9">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                        <td><a href="apps-ecommerce-orders-details.html" class="text-body font-weight-bold">#BM9701</a> </td>
                                                        <td>February 01 2018 <small class="text-muted">07:22 AM</small></td>
                                                        <td>
                                                            <h5><span class="badge badge-info-lighten"><i class="mdi mdi-cash"></i> Unpaid</span></h5>
                                                        </td>
                                                        <td>
                                                            $3,582.99
                                                        </td>
                                                        <td>
                                                            Paypal
                                                        </td>
                                                        <td>
                                                            <h5><span class="badge badge-info-lighten">Shipped</span></h5>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck10">
                                                                <label class="custom-control-label" for="customCheck10">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                        <td><a href="apps-ecommerce-orders-details.html" class="text-body font-weight-bold">#BM9700</a> </td>
                                                        <td>January 22 2018 <small class="text-muted">08:09 PM</small></td>
                                                        <td>
                                                            <h5><span class="badge badge-success-lighten"><i class="mdi mdi-coin"></i> Paid</span></h5>
                                                        </td>
                                                        <td>
                                                            $923.95
                                                        </td>
                                                        <td>
                                                            Credit Card
                                                        </td>
                                                        <td>
                                                            <h5><span class="badge badge-success-lighten">Delivered</span></h5>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck11">
                                                                <label class="custom-control-label" for="customCheck11">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                        <td><a href="apps-ecommerce-orders-details.html" class="text-body font-weight-bold">#BM9699</a> </td>
                                                        <td>January 17 2018 <small class="text-muted">02:30 PM</small></td>
                                                        <td>
                                                            <h5><span class="badge badge-success-lighten"><i class="mdi mdi-coin"></i> Paid</span></h5>
                                                        </td>
                                                        <td>
                                                            $5,177.68
                                                        </td>
                                                        <td>
                                                            Mastercard
                                                        </td>
                                                        <td>
                                                            <h5><span class="badge badge-info-lighten">Shipped</span></h5>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                        </td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
@endsection
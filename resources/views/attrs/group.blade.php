@extends('layouts.dashkit.app')

@section('content')
<div class="header"></div>
<div class="container-fluid" >
    <div class="row justify-content-center" style="margin:0px;">
        <div class="col-12" style="padding: 0px;">

            <div class="card" data-list="{&quot;valueNames&quot;: [&quot;orders-order&quot;, &quot;orders-product&quot;, &quot;orders-date&quot;, &quot;orders-total&quot;, &quot;orders-status&quot;, &quot;orders-method&quot;]}">
              <div class="card-header">
     <h5 class="card-header-title">商品属性组</h5>
                <!-- Search -->
                <div class="card-header">
                   
                    <button class="sf-btn sf-btn-primary sf-btn-create" data-toggle="modal" data-target="#modalMembers">新建分类属性模板</button>
                </div>

                <!-- Dropdown -->
                <div class="dropdown">
                  <button class="btn btn-sm btn-white dropdown-toggle" type="button" id="bulkActionDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Bulk action
                  </button>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="bulkActionDropdown">
                    <a class="dropdown-item" href="#!">Action</a>
                    <a class="dropdown-item" href="#!">Another action</a>
                    <a class="dropdown-item" href="#!">Something else here</a>
                  </div>
                </div>

              </div>
              <div class="table-responsive">
                <table class="table table-sm table-nowrap card-table">
                  <thead>
                    <tr>
                      <th>

                        <!-- Checkbox -->
                        <div class="custom-control custom-checkbox table-checkbox">
                          <input type="checkbox" class="list-checkbox-all custom-control-input" name="ordersSelect" id="ordersSelectAll">
                          <label class="custom-control-label" for="ordersSelectAll">&nbsp;</label>
                        </div>

                      </th>
                      <th>
                        <a href="#" class="text-muted list-sort" data-sort="orders-order">
                          Order
                        </a>
                      </th>
                      <th>
                        <a href="#" class="text-muted list-sort" data-sort="orders-product">
                          Product
                        </a>
                      </th>
                      <th>
                        <a href="#" class="text-muted list-sort" data-sort="orders-date">
                          Date
                        </a>
                      </th>
                      <th>
                        <a href="#" class="text-muted list-sort" data-sort="orders-total">
                          Total
                        </a>
                      </th>
                      <th>
                        <a href="#" class="text-muted list-sort" data-sort="orders-status">
                          Status
                        </a>
                      </th>
                      <th colspan="2">
                        <a href="#" class="text-muted list-sort" data-sort="orders-method">
                          Payment method
                        </a>
                      </th>
                    </tr>
                  </thead>
                  <tbody class="list"><tr>
                      <td>

                        <!-- Checkbox -->
                        <div class="custom-control custom-checkbox table-checkbox">
                          <input type="checkbox" class="list-checkbox custom-control-input" name="ordersSelect" id="ordersSelectOne">
                          <label class="custom-control-label" for="ordersSelectOne">&nbsp;</label>
                        </div>

                      </td>
                      <td class="orders-order">
                        #6520
                      </td>
                      <td class="orders-product">
                        5' x 3' Wall Poster
                      </td>
                      <td class="orders-date">

                        <!-- Time -->
                        <time datetime="2018-07-30">07/30/18</time>

                      </td>
                      <td class="orders-total">
                        $55.25
                      </td>
                      <td class="orders-status">

                        <!-- Badge -->
                        <div class="badge badge-soft-success">
                          Shipped
                        </div>

                      </td>
                      <td class="orders-method">
                        Mastercard
                      </td>
                      <td class="text-right">

                        <!-- Dropdown -->
                        <div class="dropdown">
                          <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fe fe-more-vertical"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a href="#!" class="dropdown-item">
                              Action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Another action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Something else here
                            </a>
                          </div>
                        </div>

                      </td>
                    </tr><tr>
                      <td>

                        <!-- Checkbox -->
                        <div class="custom-control custom-checkbox table-checkbox">
                          <input type="checkbox" class="list-checkbox custom-control-input" name="ordersSelect" id="ordersSelectOne">
                          <label class="custom-control-label" for="ordersSelectOne">&nbsp;</label>
                        </div>

                      </td>
                      <td class="orders-order">
                        #6521
                      </td>
                      <td class="orders-product">
                        XL Logo Tee
                      </td>
                      <td class="orders-date">

                        <!-- Time -->
                        <time datetime="2018-07-30">07/30/18</time>

                      </td>
                      <td class="orders-total">
                        $14.99
                      </td>
                      <td class="orders-status">

                        <!-- Badge -->
                        <div class="badge badge-soft-success">
                          Shipped
                        </div>

                      </td>
                      <td class="orders-method">
                        Paypal
                      </td>
                      <td class="text-right">

                        <!-- Dropdown -->
                        <div class="dropdown">
                          <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fe fe-more-vertical"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a href="#!" class="dropdown-item">
                              Action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Another action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Something else here
                            </a>
                          </div>
                        </div>

                      </td>
                    </tr><tr>
                      <td>

                        <!-- Checkbox -->
                        <div class="custom-control custom-checkbox table-checkbox">
                          <input type="checkbox" class="list-checkbox custom-control-input" name="ordersSelect" id="ordersSelectOne">
                          <label class="custom-control-label" for="ordersSelectOne">&nbsp;</label>
                        </div>

                      </td>
                      <td class="orders-order">
                        #6522
                      </td>
                      <td class="orders-product">
                        Flexfit Hat
                      </td>
                      <td class="orders-date">

                        <!-- Time -->
                        <time datetime="2018-07-28">07/28/18</time>

                      </td>
                      <td class="orders-total">
                        $25.50
                      </td>
                      <td class="orders-sratus">

                        <!-- Badge -->
                        <div class="badge badge-soft-warning">
                          Processing
                        </div>

                      </td>
                      <td class="orders-method">
                        Visa
                      </td>
                      <td class="text-right">

                        <!-- Dropdown -->
                        <div class="dropdown">
                          <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fe fe-more-vertical"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a href="#!" class="dropdown-item">
                              Action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Another action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Something else here
                            </a>
                          </div>
                        </div>

                      </td>
                    </tr><tr>
                      <td>

                        <!-- Checkbox -->
                        <div class="custom-control custom-checkbox table-checkbox">
                          <input type="checkbox" class="list-checkbox custom-control-input" name="ordersSelect" id="ordersSelectOne">
                          <label class="custom-control-label" for="ordersSelectOne">&nbsp;</label>
                        </div>

                      </td>
                      <td class="orders-order">
                        #6523
                      </td>
                      <td class="orders-product">
                        Reversible Hoodie
                      </td>
                      <td class="orders-date">

                        <!-- Time -->
                        <time datetime="2018-07-27">07/27/18</time>

                      </td>
                      <td class="orders-total">
                        $64.99
                      </td>
                      <td class="orders-status">

                        <!-- Badge -->
                        <div class="badge badge-soft-danger">
                          Cancelled
                        </div>

                      </td>
                      <td class="orders-method">
                        Amex
                      </td>
                      <td class="text-right">

                        <!-- Dropdown -->
                        <div class="dropdown">
                          <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fe fe-more-vertical"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a href="#!" class="dropdown-item">
                              Action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Another action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Something else here
                            </a>
                          </div>
                        </div>

                      </td>
                    </tr><tr>
                      <td>

                        <!-- Checkbox -->
                        <div class="custom-control custom-checkbox table-checkbox">
                          <input type="checkbox" class="list-checkbox custom-control-input" name="ordersSelect" id="ordersSelectOne">
                          <label class="custom-control-label" for="ordersSelectOne">&nbsp;</label>
                        </div>

                      </td>
                      <td class="orders-order">
                        #6524
                      </td>
                      <td class="orders-product">
                        Geometric Print Shorts
                      </td>
                      <td class="orders-date">

                        <!-- Time -->
                        <time datetime="2018-07-25">07/25/18</time>

                      </td>
                      <td class="orders-total">
                        $31.99
                      </td>
                      <td class="orders-status">

                        <!-- Badge -->
                        <div class="badge badge-soft-success">
                          Shipped
                        </div>

                      </td>
                      <td class="orders-method">
                        Paypal
                      </td>
                      <td class="text-right">

                        <!-- Dropdown -->
                        <div class="dropdown">
                          <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fe fe-more-vertical"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a href="#!" class="dropdown-item">
                              Action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Another action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Something else here
                            </a>
                          </div>
                        </div>

                      </td>
                    </tr><tr>
                      <td>

                        <!-- Checkbox -->
                        <div class="custom-control custom-checkbox table-checkbox">
                          <input type="checkbox" class="list-checkbox custom-control-input" name="ordersSelect" id="ordersSelectOne">
                          <label class="custom-control-label" for="ordersSelectOne">&nbsp;</label>
                        </div>

                      </td>
                      <td class="orders-order">
                        #6525
                      </td>
                      <td class="orders-product">
                        Super Mug
                      </td>
                      <td class="orders-date">

                        <!-- Time -->
                        <time datetime="2018-07-22">07/22/18</time>

                      </td>
                      <td class="orders-total">
                        $9.99
                      </td>
                      <td class="orders-status">

                        <!-- Badge -->
                        <div class="badge badge-soft-success">
                          Shipped
                        </div>

                      </td>
                      <td class="orders-method">
                        Mastercard
                      </td>
                      <td class="text-right">

                        <!-- Dropdown -->
                        <div class="dropdown">
                          <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fe fe-more-vertical"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a href="#!" class="dropdown-item">
                              Action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Another action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Something else here
                            </a>
                          </div>
                        </div>

                      </td>
                    </tr><tr>
                      <td>

                        <!-- Checkbox -->
                        <div class="custom-control custom-checkbox table-checkbox">
                          <input type="checkbox" class="list-checkbox custom-control-input" name="ordersSelect" id="ordersSelectOne">
                          <label class="custom-control-label" for="ordersSelectOne">&nbsp;</label>
                        </div>

                      </td>
                      <td class="orders-order">
                        #6526
                      </td>
                      <td class="orders-product">
                        MD Pocket Tee
                      </td>
                      <td class="orders-date">

                        <!-- Time -->
                        <time datetime="2018-07-22">07/22/18</time>

                      </td>
                      <td class="orders-total">
                        $19.99
                      </td>
                      <td class="orders-status">

                        <!-- Badge -->
                        <div class="badge badge-soft-warning">
                          Processing
                        </div>

                      </td>
                      <td class="orders-method">
                        Amex
                      </td>
                      <td class="text-right">

                        <!-- Dropdown -->
                        <div class="dropdown">
                          <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fe fe-more-vertical"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a href="#!" class="dropdown-item">
                              Action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Another action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Something else here
                            </a>
                          </div>
                        </div>

                      </td>
                    </tr><tr>
                      <td>

                        <!-- Checkbox -->
                        <div class="custom-control custom-checkbox table-checkbox">
                          <input type="checkbox" class="list-checkbox custom-control-input" name="ordersSelect" id="ordersSelectOne">
                          <label class="custom-control-label" for="ordersSelectOne">&nbsp;</label>
                        </div>

                      </td>
                      <td class="orders-order">
                        #6527
                      </td>
                      <td class="orders-product">
                        Custom Coffee Blend
                      </td>
                      <td class="orders-date">

                        <!-- Time -->
                        <time datetime="2018-07-21">07/21/18</time>

                      </td>
                      <td class="orders-total">
                        $11.99
                      </td>
                      <td class="orders-sratus">

                        <!-- Badge -->
                        <div class="badge badge-soft-success">
                          Shipped
                        </div>

                      </td>
                      <td class="orders-method">
                        Visa
                      </td>
                      <td class="text-right">

                        <!-- Dropdown -->
                        <div class="dropdown">
                          <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fe fe-more-vertical"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a href="#!" class="dropdown-item">
                              Action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Another action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Something else here
                            </a>
                          </div>
                        </div>

                      </td>
                    </tr></tbody>
                </table>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
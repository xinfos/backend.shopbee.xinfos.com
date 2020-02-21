@extends('layouts.dashkit.app')

@section('content')
<div class="row justify-content-center">
          <div class="col-12">

            <!-- Header -->
            <div class="header mt-md-5">
              <div class="header-body">
                <div class="row align-items-center">
                  <div class="col">

                    <!-- Pretitle -->
                    <h6 class="header-pretitle">
                      Overview
                    </h6>

                    <!-- Title -->
                    <h1 class="header-title">
                      Orders
                    </h1>

                  </div>
                  <div class="col-auto">

                    <!-- Button -->
                    <a href="#" class="btn btn-primary lift">
                      New order
                    </a>

                  </div>
                </div> <!-- / .row -->
                <div class="row align-items-center">
                  <div class="col">

                    <!-- Nav -->
                    <ul class="nav nav-tabs nav-overflow header-tabs">
                      <li class="nav-item">
                        <a href="#!" class="nav-link active">
                          All <span class="badge badge-pill badge-soft-secondary">823</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#!" class="nav-link">
                          Pending <span class="badge badge-pill badge-soft-secondary">24</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#!" class="nav-link">
                          Processing <span class="badge badge-pill badge-soft-secondary">3</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#!" class="nav-link">
                          Refunded <span class="badge badge-pill badge-soft-secondary">71</span>
                        </a>
                      </li>
                    </ul>

                  </div>
                </div>
              </div>
            </div>

            <!-- Card -->
            <div class="card" data-toggle="lists" data-options="{&quot;valueNames&quot;: [&quot;orders-order&quot;, &quot;orders-product&quot;, &quot;orders-date&quot;, &quot;orders-total&quot;, &quot;orders-status&quot;, &quot;orders-method&quot;]}">
              <div class="card-header">

                <!-- Search -->
                <form>
                  <div class="input-group input-group-flush">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fe fe-search"></i>
                      </span>
                    </div>
                    <input class="form-control search" type="search" placeholder="Search">
                  </div>
                </form>

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
                          <input type="checkbox" class="custom-control-input" name="ordersSelect" id="ordersSelectAll">
                          <label class="custom-control-label" for="ordersSelectAll">&nbsp;</label>
                        </div>

                      </th>
                      <th>
                        <a href="#" class="text-muted sort" data-sort="orders-order">
                          Order
                        </a>
                      </th>
                      <th>
                        <a href="#" class="text-muted sort" data-sort="orders-product">
                          Product
                        </a>
                      </th>
                      <th>
                        <a href="#" class="text-muted sort" data-sort="orders-date">
                          Date
                        </a>
                      </th>
                      <th>
                        <a href="#" class="text-muted sort" data-sort="orders-total">
                          Total
                        </a>
                      </th>
                      <th>
                        <a href="#" class="text-muted sort" data-sort="orders-status">
                          Status
                        </a>
                      </th>
                      <th colspan="2">
                        <a href="#" class="text-muted sort" data-sort="orders-method">
                          Payment method
                        </a>
                      </th>
                    </tr>
                  </thead>
                  <tbody class="list"><tr>
                      <td>

                        <!-- Checkbox -->
                        <div class="custom-control custom-checkbox table-checkbox">
                          <input type="checkbox" class="custom-control-input" name="ordersSelect" id="ordersSelectOne">
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
                          <input type="checkbox" class="custom-control-input" name="ordersSelect" id="ordersSelectOne">
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
                          <input type="checkbox" class="custom-control-input" name="ordersSelect" id="ordersSelectOne">
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
                          <input type="checkbox" class="custom-control-input" name="ordersSelect" id="ordersSelectOne">
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
                          <input type="checkbox" class="custom-control-input" name="ordersSelect" id="ordersSelectOne">
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
                          <input type="checkbox" class="custom-control-input" name="ordersSelect" id="ordersSelectOne">
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
                          <input type="checkbox" class="custom-control-input" name="ordersSelect" id="ordersSelectOne">
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
                          <input type="checkbox" class="custom-control-input" name="ordersSelect" id="ordersSelectOne">
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
@endsection
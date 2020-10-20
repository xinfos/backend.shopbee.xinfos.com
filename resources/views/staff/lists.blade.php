@extends('layouts.dashkit.app')

@section('content')
<link rel="stylesheet" href="/assets/dashkit/css/staff/app.css">
<div class="header"></div>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-header-title">店铺员工列表</h5>
                    <a href="#" class="sf-btn sf-btn-primary sf-btn-create">新建员工</a>
                </div>
                <div class="card-body">
                    <form>
                        <section class="sf-search" id="sf-search">
                            <div class="sf-form-group">
                                <label class="sf-label">
                                    员工姓名或手机号:
                                </label>
                                <input class="sf-form-control" name="" placeholder="员工姓名或手机号" value="">
                            </div>
                            <div class="sf-form-group">
                                <label class="sf-label">状态:</label>
                                <select name="state" class="sf-form-control multiselect">
                                    <option value="0">全部</option>
                                    <option value="1">启用</option>
                                    <option value="2">停用</option>
                                </select>
                            </div>
                            <div class="sf-form-group">
                                <label class="sf-label">&nbsp;</label>
                                <button class="sf-btn sf-btn-primary sf-btn-search mr-2" data-type="reload">搜索</button>
                                <button class="sf-btn sf-btn-white">重置</button>
                            </div>
                        </section>
                        <div class="mt-4"></div>
                        <div class="table-responsive">
                            <table class="table" id="sf-brand-tb">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="custom-control custom-checkbox table-checkbox">
                                                <input type="checkbox" class="custom-control-input">
                                                <label class="custom-control-label" for="">&nbsp;</label>
                                            </div>
                                        </th>
                                        <th>员工姓名</th>
                                        <th>联系地址</th>
                                        <th>联系电话</th>
                                        <th>营业时间</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($data)) { ?>
                                        <?php foreach ($data as $k => $v) { ?>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
</div>

<div class="sf-modal csrf_token" csrf_token="{{ csrf_token() }}"></div>

<script src="/assets/dashkit/js/modalfrm.sf.js"></script>
<script type="text/javascript">
    $(function() {

    });
    var treetable = $('#treetable').BootstrapTreeTable({
        expandlevel: 1,
        expandAll: false,
        collapseAll: false,
        maxResult: ''
    });
</script>
@endsection
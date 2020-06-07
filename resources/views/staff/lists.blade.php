@extends('layouts.dashkit.app')

@section('content')
<?php var_dump($data);exit;?>
<link rel="stylesheet" href="/assets/dashkit/css/staff/app.css">
<div class="header"></div>
<div class="container-fluid" >
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
                                <input class="sf-form-control" name=""  placeholder="员工姓名或手机号" value="">
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
                                    <?php if (!empty($data)) {?>
                                        <?php foreach ($data as $k => $v) {?>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        <?php }?>
                                    <?php }?>
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
    $('.sf-btn-create').modalFrm({
        unique: "sf-staff",
        data: {
            title: '新建员工',
            input: [
                {
                    label: "员工姓名",
                    components: [
                        {
                            name: "staff_name",
                            type: "text",
                            vType: "string",
                            placeholder: "请输入员工姓名",
                        }
                    ],
                    required: true
                },
                {
                    label: "员工手机号码",
                    components: [
                        {
                            name: "country_code",
                            type: "select",
                            vType: "string",
                            placeholder: "",
                        },
                        {
                            name: "staff_mobile",
                            type: "mobile",
                            vType: "string",
                            placeholder: "",
                        }
                    ],
                    required: true
                },
                {
                    label: "员工工号",
                    components: [
                        {
                            name: "staff_no",
                            type: "text",
                            vType: "string",
                            placeholder: "请输入员工在公司的工号"
                        }
                    ],
                    required: true
                }
            ],
            bind: [
                {
                    el: "country_code",
                    methods: "multiselect",
                    options: {
                        multiple: false,
                        selectedHtmlValue: '单选'
                    }
                }
            ],
            rules: [
                {'staff_name,country_code,staff_mobile':'required'},
                {'staff_mobile':'mobile'}
            ],
            errors: {
                'staff_name.required':'姓名不能为空',
                'country_code.required': '手机区号不能空',
                'staff_mobile.required': '联系方式不能为空',
                'staff_mobile.mobile': '联系方式格式不正确',
            },
        }
    });
});
</script>
@endsection
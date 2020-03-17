@extends('layouts.dashkit.app')

@section('content')
<link rel="stylesheet" href="/assets/dashkit/css/staff/app.css">
<link rel="stylesheet" href="/assets/dashkit/js/layui/css/layui.css">
<div class="header"></div>
<div class="container-fluid" >
    <div class="row justify-content-center" style="margin:0px;">
        <div class="col-12" style="padding: 0px;">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-header-title">店铺员工列表</h5>
                    <a href="#" class="sf-btn sf-btn-primary sf-btn-create">新建员工</a>
                </div>
                <div class="card-body">
                    <section class="sf-search" id="sf-search">
                        <div class="sf-form-group">
                            <label class="sf-label">
                                员工姓名或手机号:
                            </label>
                            <input class="sf-form-control" name="s_account" id="s_account" placeholder="员工姓名或手机号" value="">
                        </div>
                        <div class="sf-form-group">
                            <label class="sf-label">状态:</label>
                            <select name="s_state" class="sf-form-control multiselect" id="s_state">
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
                    <div class="table-responsive">
                        <table class="table table-sm table-nowrap layui-hide" id="test" lay-filter="test"></table>
                        <script type="text/html" id="barDemo">
                            <a href="#">编辑</a>
                            <a href="#">删除</a>
                        </script>
                    </div>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
</div>

<div class="sf-modal csrf_token" csrf_token="{{ csrf_token() }}"></div>


<script src="/assets/dashkit/js/select.jquery.js"></script>
<script src="/assets/dashkit/js/modalfrm.sf.js"></script>
<script src="/assets/dashkit/js/layui/layui.js" charset="utf-8"></script>
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


    layui.use('table', function() {
        var table = layui.table;
        table.render({
            elem: '#test',
            url: '/shop/staff/getlist',
            // toolbar: '#toolbarDemo',
            // defaultToolbar: ['filter', 'exports'],
            title: '用户数据表',
            cols: [
                [{
                    type: 'checkbox',
                }, {
                    field: 'id',
                    title: '<b>ID</b>',
                    sort: true
                }, {
                    field: 'staff_name',
                    title: '<b>员工姓名</b>',
                }, {
                    field: 'staff_mobile',
                    title: '<b>联系方式</b>',
                    templet: function(res) {
                        return res.staff_mobile;
                    }
                },{
                    fixed: 'right',
                    title: '<b>操作</b>',
                    toolbar: '#barDemo',
                    width: 150
                }]
            ],
            page: true,
            response: {
                statusCode: 200,
            },
        });

        //头工具栏事件
        table.on('toolbar(test)', function(obj) {
            var checkStatus = table.checkStatus(obj.config.id);
            switch (obj.event) {
                case 'getCheckData':
                    var data = checkStatus.data;
                    layer.alert(JSON.stringify(data));
                    break;
                case 'getCheckLength':
                    var data = checkStatus.data;
                    layer.msg('选中了：' + data.length + ' 个');
                    break;
                case 'isAll':
                    layer.msg(checkStatus.isAll ? '全选' : '未全选');
                    break;

                    //自定义头工具栏右侧图标 - 提示
                case 'LAYTABLE_TIPS':
                    layer.alert('这是工具栏右侧自定义的一个图标按钮');
                    break;
            };
        });

        //监听行工具事件
        table.on('tool(test)', function(obj) {
            var data = obj.data;
            //console.log(obj)
            if (obj.event === 'del') {
                layer.confirm('真的删除行么', function(index) {
                    obj.del();
                    layer.close(index);
                });
            } else if (obj.event === 'edit') {
                layer.prompt({
                    formType: 2,
                    value: data.email
                }, function(value, index) {
                    obj.update({
                        email: value
                    });
                    layer.close(index);
                });
            }
        });

        var $ = layui.$, active = {
            reload: function(){
                var s_account = $('#s_account');
                console.log(1);
                //执行重载
                table.reload('test', {
                    page: {
                        curr: 1 //重新从第 1 页开始
                    },
                    where: {
                        sid: 1,
                        account: s_account.val(),
                        state: 1
                    }
                }, 'data');
            }
    };
    
    $('.sf-btn-search').on('click', function(){
        var type = $(this).data('type');
        active[type] ? active[type].call(this) : '';
        });
    });
});
</script>
@endsection
define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'user/index',
                    add_url: 'user/add',
                    edit_url: 'user/edit',
                    del_url: 'user/del',
                    multi_url: 'user/multi',
                    dragsort_url: '',
                    table: 'user',
                }
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                escape: false,
                pk: 'id',
                sortName: 'updatetime',
                pagination: false,
                commonSearch: false,
                columns: [
                    [
                        {checkbox: true},
                        {field: 'id', title: __('Id')},
                        {field: 'privilege', title: __('特权')},
                        {field: 'name', title: __('Name'), align: 'left'},
                        {field: 'phone', title: __('手机号')},
                        {field: 'email', title: __('Email'), operate: false, formatter: Table.api.formatter.flag},
                        {field: 'qq', title: __('QQ'), operate: false, formatter: Table.api.formatter.image},
                        {field: 'wechat', title: __('微信')},
                        {field: 'updatetime', title: __('上次登入时间'), operate: false, formatter: Table.api.formatter.status},
                        {field: 'createtime', title: __('创建时间'), table: table, events: Table.api.events.operate, formatter: Table.api.formatter.operate},
                        {field: 'operate', title: __('操作'), table: table, events: Table.api.events.operate, formatter: Table.api.formatter.operate}
                    ]
                ]
            });

            // 为表格绑定事件
            Table.api.bindevent(table);
        },
        add: function () {
            Controller.api.bindevent();
        },
        edit: function () {
            Controller.api.bindevent();
        },
        api: {
            bindevent: function () {
                $(document).on("change", "#c-type", function () {
                    $("#c-deletetime option[data-type='all']").prop("selected", true);
                    $("#c-deletetime option").removeClass("hide");
                    $("#c-deletetime option[data-type!='" + $(this).val() + "'][data-type!='all']").addClass("hide");
                    $("#c-deletetime").selectpicker("refresh");
                });
                Form.api.bindevent($("form[role=form]"));
            }
        }
    };
    return Controller;
});
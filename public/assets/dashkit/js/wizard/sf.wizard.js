var _wizardMethods = {
    createShop: {
        api: "/shop/create",
        rule: [{
            'name,city,address,is_agree': 'required'
        }],
        errmsg: {
            'name.required': '店铺名称不能为空',
            'city.required': '店铺所在地址不能为空',
            'address.required': '具体的地址信息不能为空',
            'is_agree.required': '请阅读并同意相关条例',
        },
        frm: $('#formCreateShop')
    }
}

$(function () {
    $('.sf-create-shop').on('click', function () {
        SF.FrmSubmit(_wizardMethods.createShop, function (that, resp) {
            if (resp.code != 200) {
                SF._showFail(resp.msg);
                return;
            }
            return window.location.href = "/shop/wizard/success";
        });
    });
});
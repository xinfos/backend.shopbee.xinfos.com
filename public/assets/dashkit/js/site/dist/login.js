$(function () {
    var Frm = {
        _cfg: {
            url: "/login"
        },
        isMobile: function (v) {
            var reg = /^[1][3,4,5,7,8][0-9]{9}$/;
            return reg.test(v);
        },
        validateMobile: function () {
            var _self = $(".sf-input-mobile")
            var v = _self.val();
            if ((v.length == 11 && !this.isMobile(v)) || v.length > 11 || v.length <= 10) {
                _self.addClass('is-invalid');
                $('.sf-input-mobile-err').remove();
                _self.parent().append('<div class="invalid-feedback sf-input-mobile-err">请输入正确的手机号</div>');
                return false;
            } else {
                _self.removeClass('is-invalid');
                $('.sf-input-mobile-err').remove();
                return true;
            }
        },
        validateSmscode: function () {
            var _self = $(".sf-input-smscode")
            var v = _self.val();
            if (v.length != 6) {
                _self.addClass('is-invalid');
                $('.sf-input-smscode-err').remove();
                _self.parent().append('<div class="invalid-feedback sf-input-smscode-err">请填写短信验证码</div>');
                return false;
            } else {
                _self.removeClass('is-invalid');
                $('.sf-input-smscode-err').remove();
                return true;
            }
        },
        validatePwd: function () {
            var _self = $(".sf-input-pwd")
            var v = _self.val();
            if (v.length > 15 || v.length < 8) {
                _self.addClass('is-invalid');
                $('.sf-input-pwd-err').remove();
                _self.parent().append('<div class="invalid-feedback sf-input-pwd-err">密码长度为8-15</div>');
                return false;
            } else {
                _self.removeClass('is-invalid');
                $('.sf-input-pwd-err').remove();
                return true;
            }
        },
        validateConfirm: function () {
            var _self = $(".sf-input-pwd-confirm");
            var v = _self.val();
            var pwd = $(".sf-input-pwd").val();
            if (v != pwd) {
                _self.addClass('is-invalid');
                $('.sf-input-pwd-confirm-err').remove();
                _self.parent().append('<div class="invalid-feedback sf-input-pwd-confirm-err">两次密码不一致</div>');
                return false;
            } else {
                _self.removeClass('is-invalid');
                $('.sf-input-pwd-confirm-err').remove();
                return true;
            }
        },
        login: function () {
            var isValidate1 = this.validateMobile();
            // var isValidate2 = this.validateSmscode();
            // var isValidate3 = this.validatePwd();
            // var isValidate4 = this.validateConfirm();

            if (isValidate1 == false) {
                return false;
            }

            var data = {
                'mobile': $('.sf-input-mobile').val(),
                'password': $('.sf-input-pwd').val(),
                '_token': $('.sf-token').attr('sf-token'),
            }
            $.ajax({
                type: 'POST',
                url: this._cfg.url,
                dataType: 'json',
                data: data,
                success: function (resp) {
                    if (resp.code != 200) {
                        spop({
                            template: resp.msg,
                            position: 'top-center',
                            style: 'error',
                            autoclose: 1200
                        });
                        return false;
                    }
                    spop({
                        template: resp.msg,
                        position: 'top-center',
                        style: 'success',
                        autoclose: 1500
                    });
                    setTimeout(function () {
                        window.location.href = "/shop/list";
                    }, 1600);
                },
                error: function () {

                }
            });
            return false;
        }
    }

    $(".sf-input-mobile").bind('input propertychange', function () {
        Frm.validateMobile();
    });

    // $(".sf-input-pwd").bind('input propertychange', function() {
    //     Frm.validatePwd();
    // });

    $(".sf-btn-login").bind("click", function () {
        Frm.login();
    });
});
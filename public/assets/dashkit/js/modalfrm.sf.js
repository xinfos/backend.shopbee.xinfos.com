$(function(){
    var Validator = {
        message:{
            'required':'不能为空',
            'email' : '邮箱格式不正确',
            'mobile' : '手机格式不正确',
            'number' : '不是数字',
            'identity': '身份证格式不正确',
            'url': '链接格式不正确',
        },
        required:function(v) {
            var reg = new RegExp("^[ ]+$");
            if(v =='undefined' || v == '' || v == null || v.length == 0 || reg.test(v) || JSON.stringify(v) === '{}') {
                return false;
            }
            return true;
        },
        email:function(v) {
            var reg = /^[a-z0-9]+([._\\-]*[a-z0-9])*@([a-z0-9]+[-a-z0-9]*[a-z0-9]+.){1,63}[a-z0-9]+$/;
            return reg.test(v);
        },
        number:function(v) {
            var reg = /^[-]{0,1}[0-9]{1,}$/;
            return reg.test(v);
        },
        mobile:function(v) {
            var reg = /^1[3|4|5|7|8][0-9]{9}$/;
            return reg.test(v);
        },
        url:function(v) {
            var reg = /(http|ftp|https):\/\/[\w\-_]+(\.[\w\-_]+)+([\w\-\.,@?^=%&:/~\+#]*[\w\-\@?^=%&/~\+#])?/;
            return reg.test(v);		
        },
        identity:function(v) { 
            var city={
                11:"北京",12:"天津",13:"河北",14:"山西",
                15:"内蒙古",21:"辽宁",22:"吉林",23:"黑龙江 ",
                31:"上海",32:"江苏",33:"浙江",34:"安徽",35:"福建",
                36:"江西",37:"山东",41:"河南",42:"湖北 ",43:"湖南",
                44:"广东",45:"广西",46:"海南",50:"重庆",51:"四川",
                52:"贵州",53:"云南",54:"西藏 ",61:"陕西",62:"甘肃",
                63:"青海",64:"宁夏",65:"新疆",71:"台湾",81:"香港",
                82:"澳门",91:"国外"};
    
            if(!v || !/^\d{6}(18|19|20)?\d{2}(0[1-9]|1[12])(0[1-9]|[12]\d|3[01])\d{3}(\d|X)$/i.test(v)){
                return false;
            }
    
            if(!city[v.substr(0,2)]){
                return false;
            }
            return true;
        },
        make:function(data, rule, errMsg){
            if(Validator.required(data)) {
                for(var i=0; i < rule.length; i++) {
                    var sr = [];
                    var sf = [];
                    for(var k in rule[i]) {
                        (k.indexOf(",") != -1) ? sf = sf.concat(k.split(',')) : sf.push(k);
                        (rule[i][k].indexOf("|") != -1) ? sr = sr.concat(rule[i][k].split('|')) : sr.push(rule[i][k]);
                        for(var kk in sr) {
                            for(var kkk in sf) {
                                var ret = Validator[sr[kk]](data[sf[kkk]]);
                                // console.log('[' + sr[kk] + '||' + sf[kkk] + '||' + ret + ']');
                                if (!ret) {
                                    err = errMsg.hasOwnProperty(sf[kkk] + '.' + sr[kk]) ? errMsg[sf[kkk] + '.' + sr[kk]] : (sf[kkk] + Validator.message[sr[kk]]);
                                    $('.sf-form-control[name="' + sf[kkk] + '"]').addClass('is-invalid');
                                    $('.invalid-feedback').remove();
                                    $('.sf-form-control[name="' + sf[kkk] + '"]').parent().append('<div class="invalid-feedback">' + err + '</div>');
                                    return ret;
                                }
                            }
                        }
                    }
                }
            }
            return true;
        }
    };

    var modalFrm = function(el,opt){
        this._cfg.el = this.$element = el;
        this._cfg.unique = opt.unique;
        this._data = opt.data;
        this.init();
    };

    modalFrm.prototype = {
        _cfg: {
            el:null,
            unique:'',
            parent: $('.sf-modal'),
        },
        _inputType:{
            textarea: "textarea",
            select: "select",
            mobile: "mobile"
        },
        _data: {
            title: '',
            input: [],
            bind: [],
            rules: [],
            errors: {},
        },
        _errCode:{
            succ: 200,
            fail: 201
        },
        defaultBindEvents: [
            {el: "sf-btn-save", event:'click', methods: "_eventSubmitNewData", options: {}},
            {el: 'input[type="mobile"]', event:'input propertychange', methods: "_eventValidateMobile", options: {}}
        ],
        _template: function() {
            if (this._data.input.length <= 0) {
                return false;
            }

            var t = this._data.input;
            var inputHtml = '';
            for (var i = 0; i < t.length; i++) {
                inputHtml += this._input(t[i]);
            }

            var html = '<div class="modal fade fixed-right" id="' + this._cfg.unique + '" tabindex="-1" role="dialog" aria-hidden="true">'
            +'<div class="modal-dialog modal-dialog-vertical" role="document">'
            +'<div class="modal-content">'
            +'<div class="modal-body">'
            +'<a class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></a>'
            +'<div class="text-center"><img src="/assets/dashkit/images/designer-life.svg" class="img-fluid mb-3"></div>'
            +'<h2 class="text-center mb-4">' + this._data.title + '</h2><hr class="mb-5">'
            + '<div class="sf-staff-area">' + inputHtml 
            + '<div class="sf-form-group"><label class="sf-label">&nbsp;</label><button class="sf-btn sf-btn-primary mr-2 sf-btn-save">保存</button></div>'
            + '</div></div><div class="modal-footer border-0"></div></div></div></div>'
            
            return html;
        },
        _input: function(d) {    
            if (d.components.length <= 0) {
                return "";
            }

            var _inputHtml = '';
            for(var i = 0; i < d.components.length; i++) {
                switch(d.components[i].type){
                    case this._inputType.select:
                        _inputHtml += this._inputSelect(d.components[i]);
                        break;
                    case this._inputType.textarea:
                        _inputHtml += this._inputTextarea(d.components[i]);
                        break;
                    case this._inputType.mobile:
                        _inputHtml += this._inputMobile(d.components[i]);
                        break;
                    default :
                        _inputHtml += this._inputText(d.components[i]);
                }
            }

            var required = '';
            if (d.required) {
                required = '<em class="sf-required">*</em>';
            }
            return '<div class="sf-form-group"><label class="sf-label">'+ required + d.label+':</label>'+_inputHtml+'</div>';
        },
        _inputText: function(d) {
            return '<input type="text" name="'+d.name+'" id="'+d.name+'" class="sf-input-'+d.name+' sf-form-control">';
        },
        _inputMobile: function(d) {
            return '<input type="mobile" name="'+d.name+'" id="'+d.name+'" class="sf-input-'+d.name+' sf-form-control">';
        },
        _inputTextarea: function(d) {
            return '<textarea name="'+d.name+'" id="'+d.name+'" class="form-control" rows="5"></textarea>';
        },
        _inputSelect: function(d) {
            options = '<option value="86">🇨🇳 +86</option><option value="54">🇦🇷 +54</option>';
            return '<select name="'+d.name+'" class="sf-select-'+d.name+' sf-form-control" id="'+d.name+'">'+options+'</select>';
        },
        _getFormValues: function(components) {
            switch(components.type){
                case 'text':
                case 'mobile':
                    return this._getInputValue(components.name);
                case 'select':
                    return this._getSelectValue(components.name);
                default :
                    return "";
            }
        },
        _getInputValue(name) {
            return $('.sf-input-' + name).val();
        },
        _getSelectValue(name) {
            return $('#'+name+' option[data-select="true"]').val();
        },
        _event: function(method, el, event, options) {
            switch(method){
                case 'multiselect':
                    this._eventBindMultiSelect(el, event, options);
                    break;
                case '_eventSubmitNewData':
                    this._eventBindSubmitNewData(el, event, options);
                    break;
                case '_eventValidateMobile':
                    this._eventValidateMobile(el, event, options);
                    break;
                default :
                    break;
            }
        },
        _eventBindMultiSelect: function(el, event, options) {
            $('#' + el).multiselect(options);
        },
        _eventBindSubmitNewData: function(el, event, options) {
            var that = this;
            $('.' + el).bind(event, function(){
                that._eventSubmitNewData();
            });
        },
        _eventBindSubmitUpdateData: function() {
            
        },
        _eventBindSubmitDeleteData: function() {

        },
        _eventSubmitNewData: function() {
            var data = {};
            for (var i = 0; i < this._data.input.length; i++) {
                for (var j = 0; j < this._data.input[i].components.length; j++) {
                    data[this._data.input[i].components[j].name] = this._getFormValues(this._data.input[i].components[j]);
                }
            }
            console.log(data);
            var that = this;
            if(Validator.make(data, this._data.rules, this._data.errors)){
                that._ajaxPostRequest(data, '/category/add', function(){
                    alert(1);
                });
            }
        },
        _eventValidateMobile: function(el, event, options) {
            var that = this;
            $(el).bind(event, function(){
                console.log(111);
                var _self =  $(el);
                var v = _self.val();
                if((v.length == 11 && !Validator.mobile(v)) || v.length > 11 || v.length <= 10) {
                    _self.addClass('is-invalid');
                    $('.sf-input-mobile-err').remove();
                    _self.parent().append('<div class="invalid-feedback sf-input-mobile-err">请输入正确的手机号</div>');
                    return false;
                } else {
                    _self.removeClass('is-invalid');
                    $('.sf-input-mobile-err').remove();
                    return true;
                }
            });
        },
        _ajaxPostRequest: function(data, api, callBackFunc) {
            $.ajax({
                type:"POST",
                url:api,
                data:data,
                dataType:'json',
                success: function(resp) {
                    modalFrm.showTips(resp.code == modalFrm._errCode.succ ? 'success' : 'error', resp.msg);
                    if(resp.code == modalFrm.code.succ) {
                        callBackFunc();
                    }
                },
                error: function(request) {
                }
            });
        },
        showTips:function(tipType, tipConent) {
            spop({
                template: tipConent,
                position: 'top-center',
                style: tipType,
                autoclose: 2588
            });
            return false;
        },
        noTips:function(tag) {
            $('.tip-' + tag +' .help-block').text('');
            $('.tip-' + tag).removeClass('has-error');
        },
        init: function() {
            var that = this;
            this._cfg.el.bind('click', function(){
                that.show();
                that.bind();
            });
        },
        show: function() {
            this._cfg.parent.empty().append(this._template());
            $('#' + this._cfg.unique).modal('show');  
        },
        hide: function() {

        },
        bind: function() {
            var e = [];
            if (this._data.bind.length > 0) {
                e = this._data.bind.concat(this.defaultBindEvents);
            } else {
                e = this.defaultBindEvents;
            }
            console.log(e);
            console.log($('input[type="mobile"]'));
            var that = this;
            for (var i = 0; i < e.length; i++) {
                that._event(e[i].methods, e[i].el, e[i].event, e[i].options);
            }
        }
    };
    
    $.fn.modalFrm = function(options){
        new modalFrm(this, options);
    };

    $(document).on("input", "input", function(e){
        $(this).removeClass('is-invalid');
    });
    
});
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
							console.log('[' + sr[kk] + '||' + sf[kkk] + '||' + ret + ']');
							if (!ret) {
								err = errMsg.hasOwnProperty(sf[kkk] + '.' + sr[kk]) ? errMsg[sf[kkk] + '.' + sr[kk]] : (sf[kkk] + Validator.message[sr[kk]]);
                                $('input[name="' + sf[kkk] + '"]').addClass('is-invalid');
                                $('input[name="' + sf[kkk] + '"]').parent().append('<div class="invalid-feedback">' + err + '</div>');
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

var frm = {
	code:{
		'succ': 200,
		'fail': 201
	},
	submit:function(data, apiUrl, callBackFunc) {
		$.ajax({
			type:"POST",
			url:apiUrl,
			data:data,
			dataType:'json',
			success: function(resp) {
                frm.showTips(resp.code == frm.code.succ ? 'success' : 'error', resp.msg);
				if(resp.code == frm.code.succ) {
					callBackFunc();
                }
			},
			error: function(request) {
				console.log('[err] : connection is fail');
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
	}
}

$(document).on("input", "input", function(e){
    $(this).removeClass('is-invalid');
});

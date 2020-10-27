var Validator = {
	message: {
		'required': '不能为空',
		'email': '邮箱格式不正确',
		'mobile': '手机格式不正确',
		'number': '不是数字',
		'identity': '身份证格式不正确',
		'url': '链接格式不正确',
	},
	required: function (v) {
		var reg = new RegExp("^[ ]+$");
		if (v == 'undefined' || v == '' || v == null || v.length == 0 || reg.test(v) || JSON.stringify(v) === '{}') {
			return false;
		}
		return true;
	},
	email: function (v) {
		var reg = /^[a-z0-9]+([._\\-]*[a-z0-9])*@([a-z0-9]+[-a-z0-9]*[a-z0-9]+.){1,63}[a-z0-9]+$/;
		return reg.test(v);
	},
	number: function (v) {
		var reg = /^[-]{0,1}[0-9]{1,}$/;
		return reg.test(v);
	},
	mobile: function (v) {
		var reg = /^1[3|4|5|7|8][0-9]{9}$/;
		return reg.test(v);
	},
	url: function (v) {
		var reg = /(http|ftp|https):\/\/[\w\-_]+(\.[\w\-_]+)+([\w\-\.,@?^=%&:/~\+#]*[\w\-\@?^=%&/~\+#])?/;
		return reg.test(v);
	},
	identity: function (v) {
		var city = {
			11: "北京",
			12: "天津",
			13: "河北",
			14: "山西",
			15: "内蒙古",
			21: "辽宁",
			22: "吉林",
			23: "黑龙江 ",
			31: "上海",
			32: "江苏",
			33: "浙江",
			34: "安徽",
			35: "福建",
			36: "江西",
			37: "山东",
			41: "河南",
			42: "湖北 ",
			43: "湖南",
			44: "广东",
			45: "广西",
			46: "海南",
			50: "重庆",
			51: "四川",
			52: "贵州",
			53: "云南",
			54: "西藏 ",
			61: "陕西",
			62: "甘肃",
			63: "青海",
			64: "宁夏",
			65: "新疆",
			71: "台湾",
			81: "香港",
			82: "澳门",
			91: "国外"
		};

		if (!v || !/^\d{6}(18|19|20)?\d{2}(0[1-9]|1[12])(0[1-9]|[12]\d|3[01])\d{3}(\d|X)$/i.test(v)) {
			return false;
		}

		if (!city[v.substr(0, 2)]) {
			return false;
		}
		return true;
	},
	clacLength(v) {
		var len = 0;
		for (var i = 0; i < v.length; i++) {
			var a = v.charAt(i);
			if (a.match(/[^\x00-\xff]/ig) != null) {
				len += 2;
			} else {
				len += 1;
			}
		}
		return len;
	},
	make: function (data, rule, errMsg) {
		if (Validator.required(data)) {
			for (var i = 0; i < rule.length; i++) {
				var sr = [];
				var sf = [];
				for (var k in rule[i]) {
					(k.indexOf(",") != -1) ? sf = sf.concat(k.split(',')): sf.push(k);
					(rule[i][k].indexOf("|") != -1) ? sr = sr.concat(rule[i][k].split('|')): sr.push(rule[i][k]);
					for (var kk in sr) {
						for (var kkk in sf) {
							var ret = Validator[sr[kk]](data[sf[kkk]]);
							console.log('[' + sr[kk] + '||' + sf[kkk] + '||' + ret + ']');
							if (!ret) {
								err = errMsg.hasOwnProperty(sf[kkk] + '.' + sr[kk]) ? errMsg[sf[kkk] + '.' + sr[kk]] : (sf[kkk] + Validator.message[sr[kk]]);
								$('input[name="' + sf[kkk] + '"]').addClass('is-invalid');
								$('.invalid-feedback').remove();
								$('input[name="' + sf[kkk] + '"]').parent().append('<div class="invalid-feedback">' + err + '</div>');
								return ret;
							} else {
								console.log(sf[kkk]);
								// $('input[name="' + sf[kkk] + '"]').removeClass('');
								$('.is-invalid').removeClass('is-invalid');
								$('.invalid-feedback').remove();
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
	code: {
		'succ': 200,
		'fail': 201
	},
	submit: function (data, apiUrl, callBackFunc) {
		$.ajax({
			type: "POST",
			url: apiUrl,
			data: data,
			dataType: 'json',
			success: function (resp) {
				frm.showTips(resp.code == frm.code.succ ? 'success' : 'error', resp.msg);
				if (resp.code == frm.code.succ) {
					callBackFunc();
				}
			},
			error: function (request) {
				console.log('[err] : connection is fail');
			}
		});
	},
	showTips: function (tipType, tipConent) {
		spop({
			template: tipConent,
			position: 'top-center',
			style: tipType,
			autoclose: 2588
		});
		return false;
	},
	noTips: function (tag) {
		$('.tip-' + tag + ' .help-block').text('');
		$('.tip-' + tag).removeClass('has-error');
	}
}

var SF = {
	_method: {
		add: {
			api: "",
			rule: [],
			errmsg: {},
			frm: null,
			callback: null,
		}
	},
	_displayInputErr: function (inputName, msg) {
		$('input[name="' + inputName + '"]').addClass('is-invalid');
		$('.invalid-feedback').remove();
		$('input[name="' + inputName + '"]').parent().append('<div class="invalid-feedback">' + msg + '</div>');
	},
	_displayErr: function (that, msg) {
		var m = '<div class="invalid-feedback">' + msg + '</div>';
		var isExists = false;
		$(that).siblings().each(function () {
			if ($(this).hasClass('invalid-feedback')) {
				isExists = true;
				return false;
			}
		});
		if (!isExists) {
			$(that).parent().append(m);
		}
	},
	_showSucc: function (msg) {
		var template = '<div class="alert alert-primary alert-dismissible fade show" role="alert">' +
			msg +
			'<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
			'<span aria-hidden="true">×</span>' +
			'</button>' +
			'</div>';
		$(".sf-alert-el").fadeIn("fast", function () {
			$(this).empty().append(template);
		}).delay(1500).fadeOut("slow", function () {
			$(this).empty();
		});
	},
	_showFail: function (msg) {
		var template = '<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
			'<strong>错误提示：</strong>' +
			msg +
			'<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
			'<span aria-hidden="true">×</span>' +
			'</button>' +
			'</div>';
		$(".sf-alert-el").fadeIn("fast", function () {
			$(this).empty().append(template);
		}).delay(3000).fadeOut("slow", function () {
			$(this).empty();
		});
	},
	_getType: function (obj) {
		return Object.prototype.toString.call(obj).slice(8, -1);
	},
	_serializeFormJSON: function (that) {
		var arr = that.serializeArray();
		var arrJSON = {};

		$(arr).each(function () {
			if (arrJSON.hasOwnProperty(this.name)) {
				if (SF._getType(arrJSON[this.name]) != 'Array') {
					var firstItem = arrJSON[this.name];
					arrJSON[this.name] = new Array();
					arrJSON[this.name].push(firstItem);
				}
				arrJSON[this.name].push(this.value);
			} else {
				arrJSON[this.name] = this.value;
			}
		});
		return arrJSON;
	},
	_parse: function (that, resp) {
		var alertClassName = "alert-primary";
		if (resp.code != 200) {
			alertClassName = "alert-danger";
		}
		var alertObj = $('.alert');
		$(".sf-alert-el").fadeIn("fast", function () {
			$('.alert-content').html(resp.msg);
			alertObj.addClass(alertClassName);
			alertObj.fadeIn("slow", function () {
				$(this).css({
					"display": ""
				});
			}).delay(1500).fadeOut("slow", function () {
				$(this).css({
					"display": "none"
				});
				$(this).removeClass(alertClassName);
				if (resp.code == 200) {
					$('#modalCreateCategory').modal('hide');
				}
			});
		});
	},
	_confirm: function (method, params, callback) {
		$.confirm({
			title: method.tips.title,
			content: method.tips.content,
			confirmButton: method.tips.confirmButton,
			cancelButton: method.tips.cancelButton,
			confirmButtonClass: method.tips.confirmButtonClass,
			cancelButtonClass: method.tips.cancelButtonClass,
			confirm: function () {
				SF.AjaxSubmit(method, params, callback)
			},
			cancel: function () {}
		});
	},
	_ajaxPost: function (url, params, succCallback, errCallBack) {
		var that = this;
		$.ajax({
			type: 'post',
			url: url,
			dataType: 'json',
			data: params,
			success: function (resp) {
				succCallback(that, resp);
			},
			error: function () {}
		});
	},
	FrmSubmit: function (method, callback) {
		var formValuesJSON = this._serializeFormJSON(method.frm);
		if (!Validator.make(formValuesJSON, method.rule, method.errmsg)) {
			return false;
		}

		if (typeof callback === "function") {
			return this._ajaxPost(method.api, formValuesJSON, callback);
		}

		if (typeof method.callback === "function") {
			return this._ajaxPost(method.api, formValuesJSON, method.callback);
		}

		return this._ajaxPost(method.api, formValuesJSON, this._parse);
	},
	AjaxSubmit: function (method, params, callback) {
		if (!Validator.make(params, method.rule, method.errmsg)) {
			return false;
		}
		if (typeof callback === "function") {
			return this._ajaxPost(method.api, params, callback);
		}

		if (typeof method.callback === "function") {
			return this._ajaxPost(method.api, params, method.callback);
		}
		return this._ajaxPost(method.api, params, this._parse);
	},
	Bind: function (method, params, callback) {
		var self = this;
		if (JSON.stringify(method.tips) !== '{}') {
			return self._confirm(method, params, callback);
		}
		return self.AjaxSubmit(method, params, callback);
	}
};


$(document).on("input", "input", function (e) {
	$(this).removeClass('is-invalid');


	if ($(this).attr('maxlength') > 0) {
		var props = {
			name: $(this).attr('name'),
			maxVallength: $(this).attr('maxlength'),
			currentVallength: Validator.clacLength($(this).val()),
		};

		var tipsObj = $('.' + props.name + '-length');
		if (props.currentVallength > props.maxVallength) {
			$(this).addClass("is-invalid");
			tipsObj.empty().html('<span class="text-danger">' + props.currentVallength + "</span>");
			var errmsg = '最多填写' + props.maxVallength + '个汉字（' + props.currentVallength + '个字符）';
			SF._displayErr(this, errmsg);
			return false;
		}
		tipsObj.empty().html(props.currentVallength);
	}

});

// window.onbeforeunload = function (e) {
//     var dialogText = '如果重新加载页面，系统可能不会保存您所做的修改';
//     e.returnValue = dialogText;
//     return dialogText;
// };

// 禁用enter键
document.onkeydown = function () {
	if (window.event && window.event.keyCode == 13) {
		window.event.returnValue = false;
	}
};
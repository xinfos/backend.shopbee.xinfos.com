var crumbs = [];
var sort = {
	_api: {
		list: '/product/category/sub',
		search: '/product/category/search'
	},
	_arrow: ' <font>&gt;</font> ',
	init: function () {
		var that = this;
		this._ajaxPostRequest(that._api.list, {
			"cat_id": 10000,
		}, 1, this._renderView);
	},
	search: function (name) {
		this._ajaxPostRequest(this._api.search, {
			"keyword": name
		}, 0, this._searchView);
	},
	selected: function (catId, level, idx) {
		var that = this;
		var liObject = $('#sort' + level + ' li');
		if (liObject.eq(idx).hasClass("active")) {
			that._releaseBtn();
			return false;
		}
		liObject.eq(idx).addClass("active").siblings("li").removeClass("active");
		crumbs[level - 1] = liObject.eq(idx).children().html();
		for (var i = level; i < 3; i++) {
			crumbs.splice(i, 1);
		}
		this._crumbsView();
		this._ajaxPostRequest(that._api.list, {
			"cat_id": catId
		}, (level + 1), this._renderView);
	},
	_searchView: function (that, level, resp) {
		if (resp.data.length <= 0) {
			$('#sort' + level).html('<li class="no-result">暂无相关分类</li>');
			return false;
		}
	},
	_crumbsView: function () {
		var express = crumbs.join(this._arrow);
		$("#selectedSort").html(express);
	},
	_releaseBtn: function () {
		if ($('#sort3 li').hasClass("active")) {
			$("#releaseBtn").removeAttr("disabled");
			return false;
		}
		$("#releaseBtn").attr({
			"disabled": "disabled"
		});
	},
	_hiddenView: function (level) {
		$('#sort' + (level)).empty();
	},
	_renderView: function (that, level, resp) {
		that._hiddenView(level);
		that._releaseBtn();
		if (resp.data.length <= 0) {
			$('#sort' + level).html('<li class="no-result">暂无相关分类</li>');
			return false;
		}
		var htm = "";
		for (var i = 0; i < resp.data.length; i++) {
			htm += '<li class="li-' + resp.data[i].cat_id + '"onClick="sort.selected(' + resp.data[i].cat_id + ', ' + level + ',' + i + ');"><a href="javascript:void(0)">' + resp.data[i].name + '</a></li>';
		}
		$('#sort' + level).html(htm);
	},
	_ajaxPostRequest: function (url, params, level, callback) {
		var that = this;
		$.ajax({
			type: 'post',
			url: url,
			dataType: 'json',
			data: params,
			success: function (resp) {
				callback(that, level, resp);
			},
			error: function () {}
		});
	}
}

$('.sf-btn-search').on('click', function () {
	return sort.search($('.sf-search-name').val());
});

sort.init();
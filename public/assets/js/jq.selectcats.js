var wizardCatsPlugin = {
    _cfg: {
        _arrow:" <font>&gt;</font> ",
        _url: "http://127.0.0.1:8184/v1/category/sub",
        _cats: [],
        _breadcrumb:"",
    },
    init: function() {
        this._select(0, 0, 1);
    },
    _select: function(id, pid, level) {
        this._request('post', this._cfg._url, {"pid": pid}, id, level);
    },
    _render: function(id, data, level) {
        _htm = "";
        subLevel = level + 1;
        if (data.length > 0) {
            for(var i = 0; i < data.length; i++) {
                _htm += '<li onClick="wizardCatsPlugin._select(' + i + ',' + data[i].cat_id + ', ' + subLevel + ');" cat-value="' + data[i].cat_id + '"><a href="javascript:void(0)">' + data[i].name + '</a></li>';   
            }
            this._cfg._cats[level] = data;

            $(".cat-" + (level-1) + " li").eq(id).addClass("active").siblings("li").removeClass("active");
            $(".cat-" + level).html(_htm).show();
            $(".cat-" + (level+1)).hide();
        }

        $(".cat-" + (level-1) + " li").eq(id).addClass("active").siblings("li").removeClass("active");
        
        if (level == 2) {
            for(var i = 2; i <= 4; i++) {
                $(".cat-breadcrumb-" + i).empty();
                console.log("cat" + i);
                $(".cat-" + i + " li").removeClass("active");
            }
        }
        var _breadcrumb = $(".cat-" + (level-1) + " li").eq(id).text();
        if (level > 2) {
            _breadcrumb = this._cfg._arrow + _breadcrumb;
        }

        $(".cat-breadcrumb-" + (level-1)).html(_breadcrumb);
    },
    _getBreadcrumb: function(level, id) {
    },
    _parseResult: function(id, resp, level) {
        if (resp.code != 200) {
            this._render(id, [], level);
            return false;
        }
        this._render(id, resp.data.list, level);
    },
    _request: function(type, url, data, id, level) {
        $.ajax({
            type : type,
            contentType: "application/json;charset=UTF-8",
            url : url,
            dataType: 'json',
            data : JSON.stringify(data),
            success : function(resp) {
                wizardCatsPlugin._parseResult(id, resp, level);
            },
            error : function(e){
                console.log(e.status);
                console.log(e.responseText);
            }
        });
    }
}
wizardCatsPlugin.init();

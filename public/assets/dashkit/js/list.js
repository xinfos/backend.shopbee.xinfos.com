$(function(){
    var DataList = function(el,opt){
        this._cfg.el = this.$element = el;
        this._cfg.url = opt.url;
        this._cfg.thead = opt.thead;
        this.init();
    }

    DataList.prototype = {
        _cfg: {
            el: {},
            url: "",
            thead: [],
            succ: 200,
            token: $('.csrf_token').attr('csrf_token'),
        },
        init: function() {
            this._renderThead();
            this._request({cat_id:10010, '_token': this._cfg.token}, this._renderTbody);
        },
        _renderThead: function() {
            if(this._cfg.thead.length <= 0) {
                return false;
            }
            var htm = '<thead>'
                    + '<tr><th><div class="custom-control custom-checkbox table-checkbox"><input type="checkbox" class="custom-control-input" name="ordersSelect" id="ordersSelectAll"><label class="custom-control-label" for="ordersSelectAll">&nbsp;</label></div></th>';
            
            for (var i = 0; i < this._cfg.thead.length; i++) {
                if (this._cfg.thead[i].sort == 1) {
                    htm += '<th><a href="#" class="sort" data-sort="orders-' + this._cfg.thead[i].tag + '">' + this._cfg.thead[i].name + '</a></th>';
                } else {
                    htm += '<th>' + this._cfg.thead[i].name + '</th>';
                }
            }
            htm += '</thead>';
            this._cfg.el.append(htm);
        },
        _renderTbody: function(resp) {
            var htm = '<tbody class="list">';
            
            var that = DataList.prototype;

            if (resp.code != that._cfg.succ) {
                return false;
            }

            var d = resp.data;
            
            for (var i = 0; i < d.length; i++) {
                htm += '<tr>'
                    + '<td><div class="custom-control custom-checkbox table-checkbox"><input type="checkbox" class="custom-control-input"><label class="custom-control-label" for="ordersSelectOne">&nbsp;</label></div></td>';
                for( var j = 0; j < DataList.prototype._cfg.thead.length; j++) {
                    htm += '<td>'+ d[i][DataList.prototype._cfg.thead[j].tag] +'</td>'
                }
                htm += '</tr>';
            }
            
            htm += '</tbody>';

            that._cfg.el.append(htm);
        },
        _request: function(data, callbackFunc) {
            $.ajax({
                type: 'POST',
                url: this._cfg.url,
                dataType: 'json',
                data: data,
                success:function(resp) {
                    callbackFunc(resp);
                },
                error: function() {

                }
            });
        }
    };

    $.fn.DataList = function(options){
        new DataList(this, options);
    };
});
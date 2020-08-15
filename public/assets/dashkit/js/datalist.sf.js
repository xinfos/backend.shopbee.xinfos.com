$(function () {
    var DataList = function (el, opt) {
        this._el = this.$element = el;
        this._options = opt;
        console.log(this._options);
        this.init();
    }

    DataList.prototype = {
        _el: '',
        _options: {
            ajaxRequestUrl: '',
            ajaxRequestToken: $('.csrf_token').attr('csrf_token'),
            ajaxType: 'POST',
            ajaxDataType: 'JSON',
            ajaxReturnSuccCode: 200,
            sections: [],
            columns: [],
            disableCache: true,
        },
        _ajax: {
            url: "",
            token: $('.csrf_token').attr('csrf_token'),
            type: 'POST',
            dataType: 'JSON',
        },
        _pagination: {
            size: 1,
        },
        _isValueEmpty: function (v) {
            switch (typeof v) {
                case 'undefined':
                    return true;
                case 'string':
                    if (v.replace(/(^[ \t\n\r]*)|([ \t\n\r]*$)/g, '').length == 0) return true;
                    break;
                case 'boolean':
                    if (!v) return true;
                    break;
                case 'number':
                    if (0 === v || isNaN(v)) return true;
                    break;
                case 'object':
                    if (null === v || v.length === 0) return true;
                    for (var i in v) {
                        return false;
                    }
                    return true;
            }
            return false;
        },
        _event: function (method, el, event, options) {
            switch (method) {
                case 'multiselect':
                    this._eventBindMultiSelect(el, event, options);
                    break;
                default:
                    break;
            }
        },
        _eventBindMultiSelect: function (el, event, options) {
            $('#' + el).multiselect(options);
        },
        _eventPage: function () {
            var that = this;
            $('.page-item').bind('click', function () {
                if ($(this).hasClass('active')) {
                    return false;
                }
                var jumpPage = $(this).text();
                that._ajaxRequestData({
                    page: jumpPage
                }, that._initListTbody);
            });
        },
        _initSection: function (s) {
            if (this._isValueEmpty(s.columns)) {
                return;
            }
            var html = '';
            for (var i = 0; i < s.columns.length; i++) {
                html += this._initSectionTemplate(s.columns[i]);
            }

            $('#' + s.el).append(html + this._initSectionSearchAction());
            for (var j = 0; j < s.events.length; j++) {
                this._event(s.events[j].methods, s.events[j].el, s.events[j].event, s.events[j].options);
            }
        },
        _initSectionTemplate: function (s) {
            switch (s.type) {
                case 'text':
                    return this._initSectionText(s);
                case 'select':
                    return this._initSectionSelect(s);
                default:
                    return '';
            }
        },
        _initSectionSearchAction() {
            var actionHtml = '<div class="sf-form-group">' +
                '<label class="sf-label">&nbsp;</label>' +
                '<button class="sf-btn sf-btn-primary sf-btn-search mr-2">搜索</button>' +
                '<button class="sf-btn sf-btn-white">重置</button>' +
                '</div>';
            return actionHtml;
        },
        _initSectionText: function (s) {
            if (this._isValueEmpty(s.label)) {
                s.label = '&nbsp;'
            }
            var inputLabel = '<label class="sf-label">' + s.label + ': </label>';

            var inputName = '';
            if (!this._isValueEmpty(s.field)) {
                inputName = 'name="' + s.field + '"';
            }

            var inputPlaceholder = '';
            if (!this._isValueEmpty(s.placeholder)) {
                inputPlaceholder = 'placeholder="' + s.placeholder + '"';
            }
            input = '<input class="sf-form-control" ' + inputName + ' ' + inputPlaceholder + ' value="">';

            return '<div class="sf-form-group">' + inputLabel + input + '</div>';
        },
        _initSectionSelect(s) {
            if (this._isValueEmpty(s.filter)) {
                console.log('[err]:select filter exception.');
                return;
            }

            if (this._isValueEmpty(s.label)) {
                s.label = '&nbsp;'
            }
            var inputLabel = '<label class="sf-label">' + s.label + ': </label>';

            var options = this._initSectionSelectOptions(s.filter.option);
            var selectHtml = '<select name="' + s.field + '" class="sf-form-control multiselect" id="' + s.field + '">' + options + '</select>';

            return '<div class="sf-form-group">' + inputLabel + selectHtml + '</div>';
        },
        _initSectionSelectOptions: function (o) {
            if (this._isValueEmpty(o)) {
                console.log('[err]:select options exception.');
                return;
            }
            var optionHtml = '';
            for (var i = 0; i < o.length; i++) {
                optionHtml += '<option value="' + o[i].value + '">' + o[i].text + '</option>';
            }
            return optionHtml;
        },
        _initListThead: function (c) {
            var thHtml = '<th><div class="custom-control custom-checkbox table-checkbox"><input type="checkbox" class="custom-control-input"><label class="custom-control-label">&nbsp;</label></div></th>';
            for (var i = 0; i < c.length; i++) {
                thHtml += '<th><a href="#" class="sort" data-sort="orders-' + c[i].key + '">' + c[i].text + '</a></th>';
            }
            thHtml += '<th>操作</th>';

            this._el.append('<thead><tr>' + thHtml + '</tr></thead>');
        },
        _initListTbody: function (that, d) {
            var html = '';
            if (that._isValueEmpty(d)) {
                colspan = that._options.columns.length + 2;
                html = '<tr><td class="sf-list-empty-content" colspan="' + colspan + '">暂无数据</td></tr></tbody>';
            } else {
                var c = that._options.columns
                for (var i = 0; i < d.length; i++) {
                    html += '<tr>';
                    html += that._initListTbodyCheckBox();
                    for (var j = 0; j < c.length; j++) {
                        html += '<td>' + d[i][c[j].key] + '</td>';
                    }
                    html += '</tr>';
                }
            }
            if (that._el.hasClass('list')) {
                console.log(111111);
                console.log(11);
                return;
            }

            that._el.append('<tbody class="list"> ' + html + '</tbody>');
        },
        _initListTbodyCheckBox: function () {
            var html = '<td>' +
                '<div class="custom-control custom-checkbox table-checkbox">' +
                '<input type="checkbox" class="custom-control-input">' +
                '<label class="custom-control-label">&nbsp;</label>' +
                '</div>' +
                '</td>';
            return html;
        },
        _initList: function () {
            if (!this._isValueEmpty(this._options.sections)) {
                this._initSection(this._options.sections);
            }
            if (this._isValueEmpty(this._options.columns)) {
                console.log("[err]:columns config exception.");
                return false;
            }
        },
        _ajaxRequestData: function (params, callbackFunc) {
            var that = this;
            params._token = that._ajax.token;
            $.ajax({
                type: this._options.ajaxType,
                url: this._options.ajaxRequestUrl,
                dataType: this._options.ajaxDataType,
                data: params,
                success: function (resp) {
                    var data = [];
                    if (resp.code == that._options.ajaxReturnSuccCode) {
                        data = resp.data;
                    }
                    callbackFunc(that, data);
                },
                error: function () {}
            });
        },
        init: function () {
            this._initList();
        }
    };

    $.fn.DataList = function (options) {
        new DataList(this, options);
    };
});
; (function($) {
	$.fn.multiselect = function(options) {
		var defaults = {
			selectedHtmlValue: '请选择',
			titleEventType: 'click',
			optionEventType: 'click',
			selectedIcon: '<i class="fe fe-chevron-down arrow"></i>',
			selectedProperty: 'data-select',
			multiple: true,
			setWidth: '180px',
			setMaxOptionNum: 8,
			optionsHoverStyle: 'sf-select-options_hover',
			change: function() {},
			mutiConfEvent: function() {}
		};
		var options = $.extend(defaults, options);
		this.each(function() {
			var _tDom = this,
			_t = $(_tDom);
			var _thisHtmlValue, _thisValue, newSelect, newSelectTitle, selectedOption = '',
			newOptions = '',
			selected = '',
			sArea, newOptionsHeight, titleText = '';
			if (_t.next().is('div.sf-select')) {
				_t.next().remove();
			}
			_t.find('option').each(function(i) {
				var _this = $(this);
				_thisHtmlValue = _this.html().substr(0, options.setMaxOptionNum);
				_thisValue = _this.val();
				if (_t.attr('data-default') == _thisValue) {
					_this.attr(options.selectedProperty, true);
				}
				if (options.multiple) {
					if (_this.attr(options.selectedProperty)) {
						selectedOption = 'data-select="true"';
						selected = options.selectedIcon;
						titleText += _this.html() + ',';
					} else {
						selectedOption = '';
						selected = '';
					}
				} else {
					if (_this.attr(options.selectedProperty)) {
						selectedOption = 'data-select="true"';
						titleText = _this.html();
					} else {
						selectedOption = '';
						selected = '';
					}
				}
				newOptions += "<li data-value='" + _thisValue + "' " + selectedOption + " >" + _thisHtmlValue + selected + "</li>";
            });
			var a = titleText ? titleText: options.selectedHtmlValue;
			newSelectTitle = '<lable class="sf-select-title"><span>' + a + '</span><i class="fe fe-chevron-down arrow"></i></lable>';
			sArea = (options.multiple) ? '<li class="sArea"><button onclick="javascript:return false;" value="确定">确定</button></li>': '';
			newOptionsHeight = options.setMaxOptionNum * 30;
			newOptions = '<ul class="sf-select-options" style="width:' + options.setWidth + ';max-height:' + newOptionsHeight + 'px;overflow-y:auto;">' + newOptions + sArea + '</ul>';
			newSelect = '<div class="sf-select">' + newSelectTitle + newOptions + '</div>';
			_t.css('display', 'none').after(newSelect);
			var optionSwitch = 0,
			_thisNewSelect = _t.next(),
			n_o,
			_p;
			_thisNewSelect.find('.sf-select-title').on(options.titleEventType,
			function() {
				var n_o = $(this).next('.sf-select-options'),
				_p = $(this).find('i.arrow'),
				_t = $(this);
				if (optionSwitch) {
					_p.removeClass('arrow_turn');
					n_o.slideUp("fast",
					function() {
						optionSwitch = 0;
					});
				} else {
					_p.addClass('arrow_turn');
					n_o.slideDown("fast",
					function() {
						optionSwitch = 1;
						$(document).one(options.titleEventType,
						function(event) {
							var target_p = $(event.target).parents('.sf-select');
							if (target_p.html() != _thisNewSelect.html()) {
								_p.removeClass('arrow_turn');
								n_o.slideUp("fast",
								function() {
									optionSwitch = 0;
								});
							}
						});
					});
				}
			});
			_thisNewSelect.find('.sf-select-options li').on(options.optionEventType,
			function() {
				var thisLi = $(this);
				var thisIndex = _thisNewSelect.find('.sf-select-options li').index(thisLi);
				if (!options.multiple) {
					_thisNewSelect.find('.sf-select-title span').html(thisLi.html());
					_thisNewSelect.find('.sf-select-title').trigger(options.titleEventType);
					if (!thisLi.attr(options.selectedProperty)) {
						_thisNewSelect.find('.sf-select-options li').removeAttr(options.selectedProperty);
						_t.find('option[' + options.selectedProperty + '="true"]').removeAttr(options.selectedProperty);
						add.call(_t.find('option').eq(thisIndex));
						options.change.call(_t.find('option[' + options.selectedProperty + '="true"]'));
					}
				} else {
					if (!thisLi.attr(options.selectedProperty)) {
						thisLi.append(options.selectedIcon);
						add.call(_t.find('option[' + options.selectedProperty + '="true"]'));
					} else {
						thisLi.removeAttr(options.selectedProperty);
						_t.find('option').eq(thisIndex).removeAttr(options.selectedProperty);
						thisLi.find('i.fa').remove();
					}
				}
				function add() {
					_t.find('option').eq(thisIndex).attr(options.selectedProperty, true);
					thisLi.attr(options.selectedProperty, true);
				}
				return false;
			});
			if (options.multiple) {
				_thisNewSelect.find('.sArea').off(options.optionEventType);
				_thisNewSelect.find('.sArea button').on('click',
				function(event) {
					var divValue = '',
					textVal = '',
					selectLi = $(this).parents('ul.sf-select-options').find('li[' + options.selectedProperty + '="true"]');
					if (selectLi.length > 0) {
						selectLi.each(function() {
							var _pi = $(this).find('i');
							_pi.remove();
							divValue += $(this).html() + ',';
							$(this).append(_pi);
						});
						_thisNewSelect.find('.sf-select-title span').html(divValue);
					} else {
						_thisNewSelect.find('.sf-select-title span').html(options.selectedHtmlValue);
					}
					_thisNewSelect.find('.sf-select-title i.arrow').removeClass('arrow_turn');
					_thisNewSelect.find('.sf-select-options').slideUp("fast",
					function() {
						optionSwitch = 0;
					});
					options.mutiConfEvent.call(_tDom);
				});
			}
		});
	};
})(jQuery);
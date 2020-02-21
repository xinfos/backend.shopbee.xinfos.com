var ATTR_FALLBACKED = 'data-fallbacked';
var reloadCallback = null;
var reloadCallbackArr = [];

// link 或 script 在 DOM 节点上链接的属性名
var attrMap = {
	script: 'src',
	link: 'href'
};

// link or script 在 document 上的属性名称
var documentAttrMap = {
	script: 'scripts',
	link: 'styleSheets'
}
// our cdn host list
var cdnHostList = ['b.yzcdn.cn', 'su.yzcdn.cn'];

var _cdnMonitor = _cdnMonitor || {};
_cdnMonitor.hasError = false;
_cdnMonitor.ravenConfig = function() {
	try {
		Raven.config('https://b1db7f90dbcc4fc4801c2d9e4b72ede0@crash.youzan.com/112', {
			environment: 'prod',
			ignoreUrls: ['https://assets.giocdn.com/vds.js'],
			// 只监听内部cdn
			whitelistUrls: [/\/\/b\.yzcdn\.cn/, /\/\/su\.yzcdn\.cn/],
			tags: {
				app: 'retail-node-goods'
			}
		}).install();

		Raven.setUserContext({
			id: 45448874,
			shopname: 'EDG 汽车',
			ip_address: '111.207.107.178',
			username: '13520928996',
			usermobile: '+86-13520928996',
			access_token: '8b29263494e82a00660bf1f1fac221',
			role_name: '高级管理员（老板）'
		})
	} catch(e) {
		console.log(e);
	}
}

_cdnMonitor.ravenConfig();

// 缓存raven.js
_cdnMonitor.cacheRaven = function() {
	//  正常运行的时候如果不存在raven就通过ajax来获取
	if (!localStorage.getItem('raven')) {
		var timeout = 5000,
		url = '//b.yzcdn.cn/libs/ravenjs/raven.min.js',
		xhr = new XMLHttpRequest();
		xhr.open('GET', url);
		xhr.onreadystatechange = function() {
			if (xhr.readyState === 4) {
				if ((xhr.status === 200) || ((xhr.status === 0) && xhr.responseText)) {
					localStorage.setItem('raven', xhr.responseText);
				} else {
					console.log("fail to cache raven.js");
				}
			}
		};
		xhr.send();
	}
}

_cdnMonitor.cacheRaven();

// 显示刷新页面提示信息
_cdnMonitor.refreshPage = function() {
	// 页面刷新信息只显示一次
	if (this.hasError) {
		return;
	}

	this.hasError = true;

	var elId = "refreshElement";
	var refreshEl = document.getElementById(elId);

	if (refreshEl) {
		refreshEl.style.display = "block";
	} else {
		refreshEl = document.createElement('div');
		var refreshElStyle = {
			display: "block",
			width: "500px",
			height: "42px",
			zIndex: "10",
			color: "#fff",
			textAlign: "center",
			lineHeight: "42px",
			backgroundColor: "red",
			position: "absolute",
			top: "100px",
			left: (document.documentElement.clientWidth - 500) / 2 + 'px'
		};

		refreshEl.id = elId;
		refreshEl.innerHTML = '资源加载失败，请重新刷新页面';

		for (var cssKey in refreshElStyle) {
			if (refreshElStyle.hasOwnProperty(cssKey)) {
				refreshEl.style[cssKey] = refreshElStyle[cssKey];
			}
		}

		document.documentElement.appendChild(refreshEl);
	}

	setTimeout(function() {
		refreshEl.style.display = 'none';
	},
	3000);
}

_cdnMonitor.executeJsString = function(code, callback) {
	var scriptEl = document.createElement("script");

	scriptEl.innerHTML = code;
	document.body.appendChild(scriptEl);
}

function cdnFallback(requestFailedDomNode) {
	var nodeName = requestFailedDomNode.nodeName.toLowerCase();
	var attr = attrMap[nodeName];
	var requestFailedUrl = requestFailedDomNode[attr];
	if (requestFailedDomNode.getAttribute(ATTR_FALLBACKED)) {
		// 第二次加载失败 则提示用户刷新页面 并上报 sentry
		_cdnMonitor.refreshPage();
		if (typeof Raven === 'undefined') {
			var raven = localStorage.getItem('raven');
			//  如果localStorage不存在raven
			if (!raven) {
				_cdnMonitor.refreshPage();
				return;
			}
			//  运行raven.js
			_cdnMonitor.executeJsString(raven);
			//  配置sentry
			_cdnMonitor.ravenConfig();
		}
		// return;
		typeof Raven === 'object' && window.Raven.captureMessage("'cdn: " + requestFailedUrl + "'" + " load failed", {
			level: 'warning',
			extra: {
				type: nodeName,
				url: requestFailedUrl
			},
			tags: {
				type: 'cdn-fail'
			}
		});
		return;
	}

	if (!attr) {
		return;
	}

	document.addEventListener('DOMContentLoaded',
	function() {
		reloadCallback && reloadCallback();
		reloadCallbackArr.length && reloadCallbackArr.forEach(function(cb) {
			cb();
		});
	});

	if (nodeName === 'script' && checkNeedReloadAll(requestFailedDomNode)) {
		if (!reloadCallback) {
			// 仅 reload 一次，并且由最初失败的 script 触发
			reloadCallback = function() {
				var nodeList = Array.prototype.slice.call(document[documentAttrMap[nodeName]]);
				var errorNodeIndex = nodeList.map(function(obj) {
					return obj[attr];
				}).indexOf(requestFailedDomNode[attr]);
				// 重载 error 资源及其之后的所有资源
				var needReloadNodeList = nodeList.slice(errorNodeIndex).filter(function(node) {
					return checkNeedReloadAll(node);
				});
				needReloadNodeList.forEach(function(node) {
					replaceNode(node, attr, nodeName);
				});
			}
		}
	} else {
		// css文件或者是非业务代码只重新加载失败的资源
		reloadCallbackArr.push(function() {
			replaceNode(requestFailedDomNode, attr, nodeName);
		});
	}
}

function checkNeedReloadAll(node) {
	// 失败后需要加载自身及其之后的代码，目前仅考虑业务代码
	return isRetailCode(node);
}

function isRetailCode(node) {
	if (node && node.src && node.src.includes('retail')) {
		return true;
	}
	return false;
}

function replaceNode(node, attr, nodeName) {
	var host = getUrlHost(node[attr]);
	if (!host || !checkIsOurHost(host)) {
		return;
	}
	var newUrl = node[attr].replace(host, getFallbackHost(host));
	var ele = document.createElement(nodeName);
	ele[attr] = newUrl;
	ele.onerror = function() {
		window._cdnFallback(ele);
	};
	// 标记该节点已经 fallback 过了
	ele.setAttribute(ATTR_FALLBACKED, 1);
	ele.setAttribute('crossorigin', 'anonymous');
	if (nodeName === 'link') {
		ele.rel = 'stylesheet';
		node.parentNode.replaceChild(ele, node);
	}
	if (nodeName === 'script') {
		// 保证所有浏览器都同步顺序执行重载后的脚本
		ele.async = false;
		document.head.appendChild(ele);
		node.parentNode.removeChild(node);
	}
}

function checkIsOurHost(host) {
	return cdnHostList.indexOf(host) !== -1;
}

function getUrlHost(url) {
	var matchList = url.match(/(https?:)?\/\/(.*?)\/.*/);
	return matchList ? matchList[2] : null;
}

function getFallbackHost(failedHost) {
	var otherHost = cdnHostList.filter(function(item) {
		return item !== failedHost;
	});
	return otherHost[0];
};
var _cdnFallback = cdnFallback;
try {
	var logger = new WebLogger({
		autoHashDisplay: true,
		autoHistoryDisplay: true,
		plat: {
			yai: 'retail_b',
			biz: 'retail_b'
		},
		user: {
			li: 672187267,
			m: '+86-13520928996'
		},
		event: {
			si: 45448874,
			pt: 'goodsStorage',
			params: {
				shopName: 'EDG 汽车',
				userName: '13520928996'
			}
		}
	}) logger.init();
	window.Logger = logger;
} catch(err) {
	console.log(err);
} < /script>
		<script type="text/javascript ">
			var _vds = _vds || [];
window._vds = _vds;
_vds.push(['setAccountId', '767813e963734402a8256e1096b88331']);
// 启用 hashtag 作为页面收集
_vds.push(['enableHT', true]);

var userId = 672187267;
var kdtId = 45448874;

userId && _vds.push(['setCS1', 'user_id', userId]);
kdtId && _vds.push(['setCS2', 'kdt_id', kdtId]);

(function() {
    (function() {
        var vds = document.createElement('script');
        vds.type = 'text/javascript';
        vds.async = true;
        vds.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'assets.giocdn.com/vds.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(vds, s);
    })();
})();"
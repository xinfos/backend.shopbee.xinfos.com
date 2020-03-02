$(function(){
    var AttachmentFrm = {
        _cfg: {
            succ: 200,
            url: '/attachment/list',
            dynamicTab: '',
            dynamicTabContent: '',
            token: $('.csrf_token').attr('csrf_token'),
        },
        init: function() {
            this._request({cat_id:10010, '_token': this._cfg.token}, this._renderDynamicTab);
        },
        _renderDynamicTab: function(resp) {
 
            if (resp.code != AttachmentFrm._cfg.succ) {
                return false;
            }

            var d = resp.data;

            var htm = '';
            for (var i = 0; i < d.length; i++) {
                htm += '<a class="nav-link active show" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true" style="border-radius:0;">'
                     + '<i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>'
                     + '<span class="d-none d-lg-block" style="font-size:12px;">Home</span>'
                     + '</a>';
            }
            return htm
        },
        _dynamicTabContent: function() {

        },
        _renderModal: function() {
            var htm = '';
            htm = '<div class="modal fade" id="sf-attachment-modal" tabindex="-1" role="dialog" aria-modal="true">'
                + '<div class="modal-dialog modal-lg">'
                + '<div class="modal-content card">'
                + '<div class="modal-body">'
                + '<ul class="nav nav-tabs nav-bordered mb-3">'
                + '<li class="nav-item"><a href="#sf-attachment-images" data-toggle="tab" aria-expanded="false" class="nav-link active"><i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i><span class="d-none d-lg-block">我的图片</span></a></li>'
                + '</ul>'
                + '<div class="tab-content">'
                + '<div class="tab-pane active" id="sf-attachment-images">'
                + '<button type="button" class="btn btn-sm btn-primary mt-3 mb-4" style="border-radius:0;line-height:2.0;">上传图片</button>'
                + '<div class="row" style="height:450px;">'
                + '<div class="col-sm-3 mb-2 mb-sm-0">'
                + '<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical" style="height:405px;background:#f2f2f2;">'+ this._cfg.dynamicTab +'</div></div>',
                + '<div class="col-sm-9"><div class="tab-content" id="sf-attachment-tabContent">'+ this._cfg.dynamicTabContent +'</div></div></div></div></div></div></div></div></div>';

            return htm;
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

});

// _dynamicHtml
// <a class="nav-link active show" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true" style="border-radius:0;">
// <i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
// <span class="d-none d-lg-block" style="font-size:12px;">Home</span>
// </a>
// <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false" style="border-radius:0;">
// <i class="mdi mdi-settings-outline d-lg-none d-block mr-1"></i>
// <span class="d-none d-lg-block" style="font-size:12px;">Settings</span>
// </a>


// <div class="tab-pane fade active show" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
//     <div class="rc-upload-materials attachment-list-region">
//         <ul class="image-list">
//             <li class="image-item">
//                 <div class="image-box" style="background-image: url(&quot;https://img.yzcdn.cn/upload_files/2020/02/22/FnQ6g8tCKNaytPmgo-D4nTledJGT.png!small.webp&quot;);"></div>
//                 <div class="image-meta">400*400</div>
//                 <div class="image-title-wrap" title="logo.png">
//                     <p class="image-title">logo.png</p>
//                 </div>
//             </li>
//         </ul>
//     </div>
// </div>


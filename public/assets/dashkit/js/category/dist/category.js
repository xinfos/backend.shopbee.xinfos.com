var cateFrm = {
    cfg: {
        host_api: "http://127.0.0.1:8184",
        getcate_api: host_api + "/v1/category/get",
    },
    view: function(catId) {
        console.log(catId);
        // $.ajax({
        //     type : "post",
        //     contentType: "application/json;charset=UTF-8",
        //     url : this.cfg.getcate_api,
        //     dataType: 'json',
        //     data : JSON.stringify({
        //         "cat_id": catId,
        //     }),
        //     success : function(resp) {
        //         console.log(resp)
        //     },
        //     error : function(e){
        //         console.log(e.status);
        //         console.log(e.responseText);
        //     }
        // });
    }
}
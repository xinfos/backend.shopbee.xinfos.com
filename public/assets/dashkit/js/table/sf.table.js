$(function () {
    var sfTable = {
        moveGrpUp: function (el) {
            var tr = $(el).parent().parent();
            var currentFirstChild = $(tr).children(':first-child');
            var rowspan = currentFirstChild.attr("rowspan");
            if (rowspan != "undefined") {
                return false;
            }
            var p = $(tr);
            for (var i = 0; i < rowspan; i++) {
                p = $(tr).next();
                $(tr).insertBefore(p);
            }
            console.log($(tr).prev());
        },
        moveUp: function (el) {
            var tr = $(el).parent().parent();
            if ($(tr).prev().html() == null) {
                return false;
            }

            //判断当前`td`是不是第一个子元素
            var currentFirstChild = $(tr).children(':first-child');
            if (typeof (currentFirstChild.attr("rowspan")) != "undefined") {
                return false;
            }

            //判断是否含有 `rowspan`
            var prev = $(tr).prev();
            var prevFirstChild = prev.children(':first-child');
            var prevLastChild = prev.children(':last-child');
            if (typeof (prevFirstChild.attr("rowspan")) == "undefined") {
                $(tr).insertBefore($(tr).prev());
                return false;
            }
            $(tr).prepend(prevFirstChild);
            $(tr).append(prevLastChild);
            $(tr).insertBefore($(tr).prev());
        },
        moveDown: function (el) {
            var tr = $(el).parent().parent();
            if ($(tr).next().html() == null) {
                console.log("已经到底部了");
                return false;
            }
            $(tr).insertAfter($(tr).next());
            console.log(tr);
        }
    }
    $('.sf-tb-up').on('click', function () {
        sfTable.moveUp(this);
    });

    $('.sf-tb-down').on('click', function () {
        sfTable.moveDown(this);
    });

    $('.sf-tb-grp-up').on('click', function () {
        sfTable.moveGrpUp(this)
    });
});
$(document).ready(function () {
    //countdown
    $("div[id^='timer']").each(function () {
        var e = $(this);
        var t = new Date;
        var n = e.attr("class");
        var r = parseInt(n.slice(0, 4));
        var i = parseInt(n.slice(4, 6));
        var s = parseInt(n.slice(6, 8));
        var o = parseInt(n.slice(8, 10));
        var u = parseInt(n.slice(10, 12));
        var a = parseInt(n.slice(12, 14));
        t.setFullYear(r, i - 1, s);
        t.setHours(o + 1); t.setMinutes(u);
        t.setSeconds(a);
        e.find(".statusItem").countdown({
            until: t,
            format: "dHMS"
        })
    });

    //fancybox
    $("div[id^='address']").each(function () {
        $(".address").fancybox();
    });
    //$("div[id^='address'").css({ "width": "auto", "display": "none" });

    //banner slide home
    var _objBannerHomeTitle = $("ul.banner-home-title li a");
    var _objBannerHomeItem = $("ul.banner-home-item li");
    var _objBannerHomeItemImage_Current;
    var _currentBannerHomeItem = 0;

    var refreshInterval_BannerHome = setInterval(function () {

        _currentBannerHomeItem += 1;
        if (_currentBannerHomeItem >= 5)
            _currentBannerHomeItem = 0;

        _objBannerHomeItemImage_Current = $(_objBannerHomeItem).eq(_currentBannerHomeItem).find("img");

        if ($(_objBannerHomeItemImage_Current).attr("rel") != "") {
            $(_objBannerHomeItemImage_Current).attr("src", $(_objBannerHomeItemImage_Current).attr("rel"));
            $(_objBannerHomeItemImage_Current).attr("rel", "");
        }
        $(_objBannerHomeItem).css({ "display": "none" });
        $(_objBannerHomeItem).eq(_currentBannerHomeItem).css({ "display": "block" });
    }, 5000);

    $(_objBannerHomeTitle).mouseenter(function () {
        clearInterval(refreshInterval_BannerHome);

        $(_objBannerHomeTitle).removeClass("active");
        $(this).addClass("active");

        _currentBannerHomeItem = $(this).parent().prevAll().length;
        $(_objBannerHomeItem).css({ "display": "none" });

        _objBannerHomeItemImage_Current = $(_objBannerHomeItem).eq(_currentBannerHomeItem).find("img");

        if ($(_objBannerHomeItemImage_Current).attr("rel") != "") {
            $(_objBannerHomeItemImage_Current).attr("src", $(_objBannerHomeItemImage_Current).attr("rel"));
            $(_objBannerHomeItemImage_Current).attr("rel", "");
        }
        $(_objBannerHomeItem).eq(_currentBannerHomeItem).css({ "display": "block" });
    }).mouseleave(function () {
        refreshInterval_BannerHome = setInterval(function () {

            _currentBannerHomeItem += 1;
            if (_currentBannerHomeItem >= 5)
                _currentBannerHomeItem = 0;

            _objBannerHomeItemImage_Current = $(_objBannerHomeItem).eq(_currentBannerHomeItem).find("img");

            if ($(_objBannerHomeItemImage_Current).attr("rel") != "") {
                $(_objBannerHomeItemImage_Current).attr("src", $(_objBannerHomeItemImage_Current).attr("rel"));
                $(_objBannerHomeItemImage_Current).attr("rel", "");
            }
            $(_objBannerHomeItem).css({ "display": "none" });
            $(_objBannerHomeItem).eq(_currentBannerHomeItem).css({ "display": "block" });
        }, 5000);
    });
});

$(window).load(function () {
    $(function () {
        //slide gio vang
        $('#goldtime').carouFredSel({
            items: 5,
            direction: "left",
            scroll: {
                items: 1,
                duration: 1500,
                timeoutDuration: 5000
            },
            prev: "#goldtime_prev",
            next: "#goldtime_next"
        });
        //slide tra gop
        $('#installment').carouFredSel({
            items: 5,
            direction: "left",
            scroll: {
                items: 1,
                duration: 1500,
                timeoutDuration: 5000
            },
            prev: "#installment_prev",
            next: "#installment_next"
        });
        //slide san pham ban nhieu nhat
        $('#top_product').carouFredSel({
            items: 2,
            direction: "left",
            scroll: {
                items: 1,
                duration: 1500,
                timeoutDuration: 5000
            },
            prev: "#top_prev",
            next: "#top_next"
        });
        //slide anh san pham chi tiet
        $('#listother').carouFredSel({
            items: 5,
            direction: "left",
            scroll: {
                items: 1,
                duration: 1500,
                timeoutDuration: 5000
            }
        });
    });
});
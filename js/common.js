$(function() {

    //MENU開閉
    $('#nav-open').click(function(){
        var st = $(window).scrollTop();
        $('#aaa').text(st);
        if ($('#nav-content').css('display') == 'block') {
            $('#nav-content').fadeOut();
            $('.nav_close_cover').fadeOut();
            $('html').removeClass('scroll-prevent');
            $(window).scrollTop(st);
        }else{
            $('#nav-content').fadeIn();
            $('.nav_close_cover').fadeIn();
            $('html').addClass('scroll-prevent');
            $('html').css('top', -(st) + 'px');
        }
    });

    $('.nav_close_cover').click(function(){
        var st = $('#aaa').text();
        if ($('#nav-content').css('display') == 'block') {
            $('#nav-content').fadeOut();
            $('.nav_close_cover').fadeOut();
            $('html').removeClass('scroll-prevent');
            $(window).scrollTop(st);
        }
    });

    //MENU分のTOPの隙間
    function content_top() {
        var headerheight = $('header').innerHeight();
        $('#content').css('padding-top',headerheight);
    }

    var timer_common = false;
    $(window).on('load resize', function() {
        if (timer_common !== false) {
            clearTimeout(timer_common);
        }
        timer_common = setTimeout(function() {
            //リサイズ完了時
            content_top();
        }, 200);
    });

    //スムーススクロール
    var scroll = new SmoothScroll('a[href*="#"]', {
        speedAsDuration:true,
        speed:1000,
        easing:'easeInOutCubic'
    });
    //https://www.strobolights.tokyo/2019/08/11/post-43413/


    //ToTopBtn
    $("#topBtn").hide();
    $(window).on("scroll", function() {
        if ($(this).scrollTop() > 100) {
            $("#topBtn").fadeIn("fast");
        } else {
            $("#topBtn").fadeOut("fast");
        }
        scrollHeight = $(document).height(); //ドキュメントの高さ
        scrollPosition = $(window).height() + $(window).scrollTop(); //現在地
        footHeight = $("footer").innerHeight(); //footerの高さ（＝止めたい位置）
        if ( scrollHeight - scrollPosition  <= footHeight ) { //ドキュメントの高さと現在地の差がfooterの高さ以下になったら
            $("#topBtn").css({
                "position":"absolute", //pisitionをabsolute（親：wrapperからの絶対値）に変更
                "bottom": footHeight + 20 //下からfooterの高さ + 20px上げた位置に配置
            });
        } else { //それ以外の場合は
            $("#topBtn").css({
                "position":"fixed", //固定表示
                "bottom": "20px" //下から20px上げた位置に
            });
        }
    });

});

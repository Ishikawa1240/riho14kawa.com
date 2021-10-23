$(function() {

    $('#cover').fadeOut(500);

    $("a").on('click',function(event){
        var linkUrl = $(this).attr('href');
        var linkTarget = $(this).attr('target');
        if( linkUrl.slice(0,1) == '#' || linkTarget == '_blank' ){
        }else{
            // ここにリンク先への遷移直前に実行する内容を記述
            event.preventDefault();
            $('#cover2').removeClass('close');
            function action() {
                location.href = linkUrl;
            }
            setTimeout(action,500);
        }
    });

    //スムーススクロール
    var scroll = new SmoothScroll('a[href*="#"]', {
        speedAsDuration:true,
        speed:1000,
        easing:'easeInOutCubic' // イージングも使えるよ！
    });
    //https://www.strobolights.tokyo/2019/08/11/post-43413/
    /*
    var urlHash = location.hash;
    if(urlHash) {
        $('body,html').stop().scrollTop(0);
        setTimeout(function(){
            var target = $(urlHash);
            var position = target.offset().top;
            $('body,html').stop().animate({scrollTop:position}, 500);
        }, 700);
    }
    */

    //モード変更
    console.log($.cookie('light_dark'));

    function to_light(){
        $('#top').addClass('light');
        $('#top').removeClass('dark');
        $('body').css('background','white');
    }
    function to_dark(){
        $('#top').removeClass('light');
        $('#top').addClass('dark');
        $('body').css('background','black');
    }
    if( $.cookie('light_dark') == 'dark' ){
        to_dark();
    }

    $('#mode').click(function(){
        console.log($.cookie('light_dark'));
        if ($('#top').hasClass('dark')) {
            to_light();
            $.removeCookie('light_dark');
        }else{
            to_dark();
            $.cookie('light_dark','dark','/');
            //$.cookie('light_dark','dark',{path:'/'});
        }
        console.log($.cookie('light_dark'));
    });

    // TextTypingというクラス名がついている子要素（span）を表示から非表示にする定義
    /*
    function TextTypingAnime() {
      $('.TextTyping').each(function () {
        var elemPos = $(this).offset().top - 50;
        var scroll = $(window).scrollTop();
        var windowHeight = $(window).height();
        var thisChild = "";
        if (scroll >= elemPos - windowHeight) {
          thisChild = $(this).children();
          thisChild.each(function (i) {
            var time = 50;
            $(this).delay(time * i).fadeIn(time);
          });
        } else {
          thisChild = $(this).children();
          thisChild.each(function () {
            $(this).stop();
            $(this).css("display", "none");
          });
        }
      });
    }
    // 画面をスクロールをしたら動かしたい場合の記述
    $(window).scroll(function () {
        TextTypingAnime();
    });
    */

    function bg() {
        var top = $('#particle1').offset().top;
        var value = $(this).scrollTop();
        var part1 = 0 - (value / 30);
        var part2 = 0 - (value / 5);
        var part3 = 0 - (value / 10);
        $('#particle1').css('background-position-y', part1);
        $('#particle2').css('background-position-y', part2);
        $('#particle3').css('background-position-y', part3);
    }
    function bg_opacity() {
        var windowheight = $(window).height();
        var value = $(window).scrollTop();
        var opacity = ( value / 2 ) * 0.01;
        var opacity = 1 - opacity;
        if( opacity > 0.5 ){
            $('.particle').css('opacity', opacity);
        }else{
            $('.particle').css('opacity', '0.5');
        }
    }

    function header_bg(){
        if( $(window).scrollTop() > 300 ){
            $("header").addClass("bgwhite");
        }else{
            $("header").removeClass("bgwhite");
        }
    }

    header_bg();
    bg();
    bg_opacity();
    $(window).scroll(function() {
        bg();
        bg_opacity();
        header_bg();
    });

    //ToTopBtn
    $("#topBtn").hide();
    $(window).on("scroll", function() {
        if ($(this).scrollTop() > 100) {
            $("#topBtn").fadeIn("fast");
        } else {
            $("#topBtn").fadeOut("fast");
        }
        scrollHeight = $(document).height(); //ドキュメントの高さ
        scrollPosition = $(window).height() + $(window).scrollTop(); //現在位置
        footHeight = $("footer").innerHeight(); //footerの高さ（＝止めたい位置）
        if ( scrollHeight - scrollPosition  <= footHeight ) {
            $("#topBtn").css({
                "position":"absolute",
                "bottom": footHeight + 20
            });
        } else {
            $("#topBtn").css({
                "position":"fixed",
                "bottom": "20px"
            });
        }
    });

    //Worksの高さ
    function works_height() {
        $('.works_unit').each(function () {
            if( $(window).width() < 480 ){
                $(this).find('.works_img_box').css('height','30vh');
            }else if( $(window).width() < 860 ){
                $(this).find('.works_img_box').css('height','50vh');
            }else{
                var text_h = $(this).find('.works_texts').height() - 20;
                $(this).find('.works_img_box').css('height',text_h);
            }
        });
    }
    works_height();

    $('.statusbar').each(function () {
        var statusbar_height = $(this).height();
        $(this).find('span').css('width',statusbar_height);
    });

    var timer_common = false;
    $(window).on('load resize', function() {
        if (timer_common !== false) {
            clearTimeout(timer_common);
        }
        timer_common = setTimeout(function() {
            //リサイズ完了時
            works_height();
        }, 50);
    });

});

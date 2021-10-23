$(function() {

    //menu open close
    $('#nav-open').click(function(){
        if ($('header').hasClass('active')) {
            $('header').removeClass('active');
        }else{
            $('header').addClass('active');
        }
    });
    $('.menu_links a').click(function(){
        if ($('header').hasClass('active')) {
            $('header').removeClass('active');
        }
    });

    //SmoothScroll
    var scroll = new SmoothScroll('a[href*="#"]', {
        speedAsDuration:true,
        speed:1000,
        easing:'easeInOutCubic'
    });
    //https://www.strobolights.tokyo/2019/08/11/post-43413/

    function firstview_height(){
        if( $(window).width() > 540 ){
            var firstview = $(window).height() - 50;
            $('#firstview').css('height',firstview);
            $('#firstview').removeClass('under540');
        }else{
            var firstview = $(window).height() - 30;
            $('#firstview').css('height',firstview);
            $('#firstview').addClass('under540');
        }
    }

    //Parallax
    function pala(){
        if( $(window).width() > 640 ){
            var range = 70;
        }else{
            var range = 40;
        }
        var now_top = Math.round($(window).scrollTop());
        var now_bottom = Math.round($(window).scrollTop() + $(window).height());
        var now_center = Math.round(((now_bottom - now_top)/2)+now_top);
        //1%あたりのpx数
        var par_px = $(window).height()/100;
        $(".pala").each(function(i) {
            //.palaの高さを整える
            var this_imgheight = $(this).find('.palaimg').height();
            var this_imgwhidth = $(this).find('.palaimg').width();
            var keisu = this_imgheight / this_imgwhidth;
            if($(this).attr('id') !== 'firstview'){
                $(this).css('height',$(this).width()*keisu);
            }

            var this_class = $(this).attr('class');
            var this_height = Math.round($(this).innerHeight());
            var this_top = Math.round($(this).offset().top);
            var this_bottom = this_top + this_height;
            var this_center = Math.round(((this_bottom - this_top)/2)+this_top);
            //this_centerが画面内のどこにいるか
            var center_position = Math.round((this_center - now_center)/par_px);
            //可視範囲かどうか
            if(now_top < this_bottom && now_bottom > this_top){
                var move_px = range * center_position / 100;
                $(this).find('.palaimg').css('margin-top',move_px);
            }
        });
    }

    //ToTopBtn
    $("#topBtn").hide();
    function totop(){
        if ($(this).scrollTop() > 100) {
            $("#topBtn").fadeIn("fast");
        } else {
            $("#topBtn").fadeOut("fast");
        }
        if( $(window).width() > 540 ){
            bottom = 20;
        }else{
            bottom = 10;
        }
        scrollHeight = $(document).height(); //ドキュメントの高さ
        scrollPosition = $(window).height() + $(window).scrollTop(); //現在地
        footHeight = $("footer").innerHeight(); //footerの高さ（＝止めたい位置）
        if ( scrollHeight - scrollPosition  <= footHeight ) { //ドキュメントの高さと現在地の差がfooterの高さ以下になったら
            $("#topBtn").css({
                "position":"absolute", //pisitionをabsolute（親：wrapperからの絶対値）に変更
                "bottom": footHeight + bottom //下からfooterの高さ + 20px上げた位置に配置
            });
        } else { //それ以外の場合は
            $("#topBtn").css({
                "position":"fixed", //固定表示
                "bottom": bottom //下から20px上げた位置に
            });
        }
    }

    //header > menu > scroll color
    function headercolor(){
        var window_h = $(window).height();
        if ($(this).scrollTop() > window_h) {
            $('header').addClass('under1st');
        } else {
            $('header').removeClass('under1st');
        }
    }

    //#about > about_white
    function about_base(){
        var about_w = $('.about_base').width();
        var about_left_w = $('.about_base .left').width();
        var about_w_par = about_w / 100;
        if( $(window).width() > 480 ){
            $('#about .about_white').css('left',about_left_w - (about_w_par*9));
            $('#about h2').css('margin-left',0 - (about_w_par*9));
        }else{
            $('#about .about_white').css('left',about_left_w - (about_w_par*40));
            $('#about h2').css('margin-left',0 - (about_w_par*40));
        }
    }

    //#cafe cafe_white
    function cafe_base(){
        var cafe_w = $('.cafe_base').innerWidth();
        var cafe_left_w = $('.cafe_base .left').width();
        var cafe_w_par = cafe_w / 100;
        if( $(window).width() > 768 ){
            $('#cafe .cafe_white').css('left',cafe_left_w - (cafe_w_par*6));
            $('#cafe h2').css('margin-left',0 - (cafe_w_par*6));
        }else if( $(window).width() > 540 ){
            $('#cafe .cafe_white').css('left',cafe_left_w - (cafe_w_par*32));
            $('#cafe h2').css('margin-left',0 - (cafe_w_par*32));
        }else{
            $('#cafe .cafe_white').css('left',cafe_left_w - (cafe_w_par*60));
            $('#cafe h2').css('margin-left',0 - (cafe_w_par*60));
        }
    }

    /*--------------------------------------------------------*/
    /*---------------------- load ----------------------------*/
    /*--------------------------------------------------------*/
    firstview_height();
    pala();
    totop();
    headercolor();
    about_base();
    cafe_base();

    var timer_common = false;
    $(window).on('load', function() {
        if (timer_common !== false) {
            clearTimeout(timer_common);
        }
        timer_common = setTimeout(function() {
            //リサイズ完了時
            $('#cover').fadeOut(500);
        }, 500);
    });

    /*--------------------------------------------------------*/
    /*---------------------- scroll --------------------------*/
    /*--------------------------------------------------------*/
    $(window).on("scroll", function() {
        pala();
        firstview_height();
        totop();
        headercolor();
    });

    /*--------------------------------------------------------*/
    /*---------------------- resize --------------------------*/
    /*--------------------------------------------------------*/
    $(window).on('resize', function(){
        firstview_height();
        pala();
        totop();
        headercolor();
    });

    var timer_common = false;
    $(window).on('resize', function() {
        if (timer_common !== false) {
            clearTimeout(timer_common);
        }
        timer_common = setTimeout(function() {
            //リサイズ完了時
            about_base();
            cafe_base();
        }, 300);
    });


    /*--------------------------------------------------------*/
    /*---------------------- slick ---------------------------*/
    /*--------------------------------------------------------*/

    $('#slick_txt').slick({
        arrows:false,
        fade:true,
        asNavFor:'#slick_img',
    });
    $('#slick_img').slick({
        asNavFor:'#slick_txt',
        focusOnSelect: true,
        slidesToShow:3,
        slidesToScroll:1,
        prevArrow:'<div class="arrows prev"><span></span></div>',
        nextArrow:'<div class="arrows next"><span></span></div>',
    });
    function slickmark(){
        var slick_num = $('#slick_txt').find('.slick-active').attr('data-slick-index');
        $('#slick_img li').each(function(i) {
            var this_num = $(this).attr('data-slick-index');
            if( slick_num == this_num ){
                $(this).addClass('nowactive');
            }else{
                $(this).removeClass('nowactive');
            }
        });
    }
    slickmark();
    $('#slick_txt').on('afterChange', function(event, slick, currentSlide, nextSlide){
        slickmark();
    });

});

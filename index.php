<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <?php include("include/meta_set.php"); ?>

        <title><?=$share_title?></title>
        <meta name="keywords" content=",,,">
		<meta name="description" content="<?=$share_text?>">

        <!--* css *-->
        <link rel="stylesheet" type="text/css" href="<?=$webroot?>css/main.css?ver=<?php echo date('YmdHis'); ?>" />
    </head>
    <body id="top" class="<?php echo $_COOKIE["light_dark"]; ?>">
        <div id="content">

            <?php include("include/header.php"); ?>

            <div id="firstview">

                <div id="mainlogo">
                    <img src="img/logo.svg" class="respd" id="light_logo">
                    <img src="img/logo_dark.svg" class="respd" id="dark_logo">
                    <a href="#about" id="scrollbtn" class="Futura Medium">scroll</a>
                </div>
                <div id="lb">
                    <div class="lb1 Futura Demi Italic">
                        Web Cording and<br>Designing
                    </div>
                    <div class="lb2 Futura Medium">
                        Illustrator / Photoshop<br>
                        html / css / javascript / PHP / WordPress
                    </div>
                </div>
            </div>

            <section id="about">
                <div class="wrapper cf">
                    <div class="right">
                        <img src="img/about_img.jpg?ver=2" class="respd" alt="Riho Ishikawa">
                    </div>
                    <div class="left">
                        <h2 class="toph2 Futura Demi TextTyping">About</h2>
                        <p>
                            Webデザイナー、Webコーダー、時々グラフィックデザイナー。<br>
                            1993年生まれ、A型。<br><br>
                            愛知県岡崎市出身、愛知県名古屋市在住。<br>
                            名古屋学芸大学 メディア造形学部 デザイン学科（ビジュアルコミュニケーションデザイン専攻）にて4年間グラフィックデザインを学び、現在は愛知県のデザイン会社でWeb制作を行っています。
                            <a class="squarebtn Futura Demi" href="/about.php">more</a>
                        </p>
                    </div>
                </div>
            </section>

            <section id="works">
                <div class="wrapper">
                    <h2 class="toph2 Futura Demi TextTyping">Works</h2>
                    <div class="works_unit cf">
                        <div class="works_texts">
                            <h3 class="workh3">保護猫カフェ めおまるけ</h3>
                            <div class="workurl Futura Demi"><a href="https://www.meomaruke.com" target="_blank"><i class="fas fa-link"></i>https://www.meomaruke.com</a></div>
                            <div class="works_desc">
                                名古屋市緑区の保護猫カフェ：めおまるけ様のホームページをリニューアルしました。<br>
                                それまでhtmlを編集して更新されていたそうですが、WordPressを導入して管理画面からの更新が可能になり、よろこんでいただけました。<br>
                                リニューアルオープンした2020年10月から約半年で、週当たりのアクセス数は28％増加しました。
                            </div>
                            <div class="works_detail Futura Demi">
                                Part : Design / Cording<br>
                                Project Member : 1
                            </div>
                            <div class="works_skill Futura Medium">
                                <ul>
                                    <li>Illustrator</li>
                                    <li>Photoshop</li><br>
                                    <li>html</li>
                                    <li>css</li>
                                    <li>javascript</li>
                                    <li>PHP</li>
                                    <li>WordPress</li>
                                </ul>
                            </div>
                        </div>
                        <div class="works_imgs cf Futura Demi">
                            <div class="atcbar_pc">1280 IMAGE</div>
                            <div class="atcbar_sp">400 IMAGE</div>
                            <div class="works_img_box works_img_pc grayline">
                                <img src="img/works/w1_pc.jpg" class="respd" alt="">
                            </div>
                            <div class="works_img_box works_img_sp grayline">
                                <img src="img/works/w1_sp.jpg" class="respd" alt="">
                            </div>
                        </div>
                    </div><!-- .works_unit -->

                    <div class="works_unit cf">
                        <div class="works_texts">
                            <h3 class="workh3">白山養蜂園</h3>
                            <div class="workurl Futura Demi"><a href="https://riho14kawa.com/hakusan/" target="_blank"><i class="fas fa-link"></i>https://riho14kawa.com/hakusan/</a></div>
                            <div class="works_desc">
                                デザインとコーディングのスキルサンプルとして、架空のはちみつ屋さんのサイト（TOPページのみ）を制作しました。<br>
                                国産にこだわった養蜂場という設定で、ターゲットはサラリーマン、OLです。<br>
                                ロゴから制作しました。写真はフリー素材を使用しています。<br>
                                （お題提供：<a style="text-decolation:underline;" href="https://twitter.com/design_shio/status/1423214650045337604" target="_blank">@design_shio</a>）
                            </div>
                            <div class="works_detail Futura Demi">
                                Part : Design / Cording<br>
                                Project Member : 1
                            </div>
                            <div class="works_skill Futura Medium">
                                <ul>
                                    <li>Illustrator</li>
                                    <li>Photoshop</li><br>
                                    <li>html</li>
                                    <li>css</li>
                                    <li>javascript</li>
                                </ul>
                            </div>
                        </div>
                        <div class="works_imgs cf Futura Demi">
                            <div class="atcbar_pc">1280 IMAGE</div>
                            <div class="atcbar_sp">400 IMAGE</div>
                            <div class="works_img_box works_img_pc grayline">
                                <img src="img/works/w2_pc.jpg" class="respd" alt="">
                            </div>
                            <div class="works_img_box works_img_sp grayline">
                                <img src="img/works/w2_sp.jpg" class="respd" alt="">
                            </div>
                        </div>
                    </div><!-- .works_unit -->

                    <div class="works_atc">
                        社内制作の実績は対面時にのみお見せしております。
                    </div>

                </div>
            </section>

        </div>
        <?php
            include("include/footer.php");
        ?>
        <script src="<?=$webroot?>js/jquery.matchHeight.js"></script>
        <script src="<?=$webroot?>js/common.js?ver=<?php echo date('YmdHis'); ?>"></script>

    </body>
</html>

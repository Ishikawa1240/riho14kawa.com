<?php
	include("set_root.php");
?>
<meta charset="UTF-8">
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta http-equiv="content-language" content="ja">

<meta name="viewport" content="width=device-width,user-scalable=no">
<meta name="robots" content="noindex,nofollow" />

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-VSFY73YW96"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-VSFY73YW96');
</script>

<link rel="shortcut icon" href="<?=$webroot?>img/favicon.ico?ver=1" type="image/x-icon">
<link rel="apple-touch-icon" href="<?=$webroot?>img/apple-touch-icon.png?ver=1" sizes="180x180">
<link rel="icon" type="image/png" href="<?=$webroot?>img/android-touch-icon.png?ver=1" sizes="192x192">

<?php
$share_text = '1993年生まれ、愛知県名古屋市在住のWebデザイナー兼コーダー。よくWebサイトを作ります。';
$share_url = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$share_title = 'Riho Ishikawa Portfolio';
?>

<meta name="description" content="<?=$share_text?>" />

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@">
<meta name="twitter:creator" content="@">
<meta name="twitter:image" content="<?=$webroot?>img/snsimage.jpg?ver=0">

<meta property="og:type" content="website"/>
<meta property="og:title" content="<?=$share_title?>" />
<meta property="og:url" content="<?=$share_url?>" />
<meta property="og:image" content="<?=$webroot?>img/snsimage.jpg?ver=0" />
<meta property="og:site_name" content="<?=$share_title?>" />
<meta property="og:description" content="<?=$share_text?>" />

<link rel="stylesheet" href="https://use.typekit.net/vqm4lkh.css">
<script>
  (function(d) {
    var config = {
      kitId: 'qke6wvh',
      scriptTimeout: 3000,
      async: true
    },
    h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
  })(document);
</script>

<!--* css *-->
<link rel="stylesheet" type="text/css" href="<?=$webroot?>css/reset.css" />
<link rel="stylesheet" type="text/css" href="<?=$webroot?>css/normalize.css" />
<link rel="stylesheet" type="text/css" href="<?=$webroot?>css/common.css?ver=<?php echo date('YmdHis'); ?>" />

<!--* FontAwesome *-->
<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
<!--* GoogleFonts *-->
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

<!----------------------------
HTML5タグのIE8以前のブラウザ対応
------------------------------->
<!--[if lt IE 9]>
<script src="<?=$webroot?>js/html5shiv.js"></script>
<script src="<?=$webroot?>js/css3-mediaqueries.js"></script>
<![endif]-->

<!--[if IE 6]>
<script src="<?=$webroot?>js/DD_belatedPNG_0.0.8a-min.js"></script>
<script>
DD_belatedPNG.fix('img, .png');
</script>
<![endif]-->

<!--* js *-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/smooth-scroll/16.1.0/smooth-scroll.min.js"></script>
<!--<script type="text/javascript" src="<?=$webroot?>js/jquery.cookie.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>

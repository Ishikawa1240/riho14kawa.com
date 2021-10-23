<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>新規</title>
        <meta name="keywords" content=",,,">
		<meta name="description" content="検索結果で表示される文章">

        <?php
			include("include/meta_set.php");
		?>

        <!--* css *-->
        <link rel="stylesheet" type="text/css" href="<?=$webroot?>css/main.css" />

    </head>
    <body id="top">
        <?php
            include("include/header.php");
        ?>
        <div id="content">
            <div class="sample">新しいページです</div>
            フルパス：<?php echo __FILE__ ; ?>
        </div>
        <?php
            include("include/footer.php");
        ?>
        <script src="<?=$webroot?>js/jquery.matchHeight.js"></script>
        <script src="<?=$webroot?>js/common.js"></script>

    </body>
</html>

<?php
// セッションを開始する
session_start();
// トークンを発行する
$token = md5(uniqid(rand(), true));
// トークンをセッションに保存
$_SESSION['token'] = $token;
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <?php include("include/meta_set.php"); ?>

        <title>Contact｜<?=$share_title?></title>
        <meta name="keywords" content=",,,">
        <meta name="description" content="お仕事のご連絡からお仕事じゃないご連絡まで、こちらから受け付けております。｜<?=$share_title?>">

        <!--* css *-->
        <link rel="stylesheet" type="text/css" href="<?=$webroot?>css/main.css?ver=<?php echo date('YmdHis'); ?>" />
    </head>
    <body id="top" class="<?php echo $_COOKIE["light_dark"]; ?>">
        <div id="content">

            <?php include("include/header.php"); ?>

            <section id="page">

                <div class="wrapper">

                    <h1 class="pageh1 Futura Demi">Contact</h1>
                    <div class="page_lead">
                        お仕事のご連絡からお仕事じゃないご連絡まで、こちらから受け付けております。<br>
                        サービスのPRなどはご遠慮くださいませ。<br>
                        お仕事のご依頼に関しましては2～3日を目途にお返事をさせていただきます。<br>
                    </div>

                    <div id="page_body">

                        <?php

                    	mb_language("Japanese");
                    	mb_internal_encoding("UTF-8");

                    	$submit = (isset($_POST["submit"]))? $_POST["submit"] : "";

                    	//項目
                    	$name = (isset($_POST["name"]))? $_POST["name"] : "";
                    	$company = (isset($_POST["company"]))? $_POST["company"] : "";
                    	$mail = (isset($_POST["mail"]))? $_POST["mail"] : "";
                    	$tel = (isset($_POST["tel"]))? $_POST["tel"] : "";
                    	$contact = (isset($_POST["contact"]))? $_POST["contact"] : "";

                    	$is_error = false;

                    	//必須項目
                    	$errorcheck_name = "";
                    	$errorcheck_mail = "";
                    	$errorcheck_contact = "";

                    	//チェック
                    	if($submit != ""){
                    		//ご氏名入力チェック
                    		if($name == ""){
                    			$errorcheck_name = "ご担当者名を入力してください。";
                    			$is_error = true;
                    		}
                    		//メールアドレス入力チェック
                    		if($mail != ""){
                    			if (preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $mail)) {
                    			}else {
                    				$errorcheck_mail = "正しいメールアドレスを入力してください。";
                    				$is_error = true;
                    			}
                    		} else {
                    			$errorcheck_mail = "メールアドレスを入力してください。";
                    			$is_error = true;
                    		}
                    		//お問い合わせ内容入力チェック
                    		if($contact == ""){
                    			$errorcheck_contact = "お問い合わせ内容を入力してください。";
                    			$is_error = true;
                    		}
                    	}
                    	?>

                        <?php
                            //確認画面へ飛ばすかどうか
                            if($is_error == false && $submit == "SEND"){
                        ?>
                        <form id="senda" name="senda" action="send.php" method="post">
                            <input type="hidden" name="name" value="<?=$name?>" />
                            <input type="hidden" name="company" value="<?=$company?>" />
                            <input type="hidden" name="mail" value="<?=$mail?>" />
                            <input type="hidden" name="tel" value="<?=$tel?>" />
                            <input type="hidden" name="contact" value="<?=$contact?>" />
                            <input type="hidden" name="token" value="<?=$token?>" />
                            <SCRIPT language="JavaScript">
                                document.senda.submit();
                            </SCRIPT>
                        </form>
                        <?php
                            }
                        ?>

                        <div class="attention">
                            フォーム送信後、ご入力いただいたメールアドレスに確認メール（自動返信）が届きます。<br>
                            【noreplay@riho14kawa.com】からのメールを受信できるよう、設定をお願いいたします。
                        </div>
                        <form id="form1" name="form1" method="post" action="contact.php" enctype="multipart/form-data">
                            <table class="form_table">
                                <tr>
                                    <th class="cf">
                                        <div class="input_item">お名前<span class="Futura Medium">must</span></div>
                                    </th>
                                    <td class="dmy"></td>
                                    <td class="<?php if($errorcheck_name != ""){ echo " errorbox"; } ?>">
                                        <?php if($errorcheck_name != ""){ echo "<div class='errorcomment'><p>".$errorcheck_name."</p></div>"; } ?>
                                        <input type="text" name="name" id="name" class="input_m" placeholder="ハンドルネームでも可" value="<?=$name?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <th class="cf">
                                        <div class="input_item">会社名</div>
                                    </th>
                                    <td class="dmy"></td>
                                    <td class="">
                                        <input type="text" name="company" id="company" class="input_m" placeholder="株式会社グミチョコもち大福" value="<?=$company?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <th class="cf">
                                        <div class="input_item">メールアドレス<span class="Futura Medium">must</span></div>
                                    </th>
                                    <td class="dmy"></td>
                                    <td class="<?php if($errorcheck_mail != ""){ echo " errorbox"; } ?>">
                                        <?php if($errorcheck_mail != ""){ echo "<div class='errorcomment'><p>".$errorcheck_mail."</p></div>"; } ?>
                                        <input type="text" name="mail" id="mail" class="input_l" placeholder="info@riho14kawa.com" value="<?=$mail?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <th class="cf">
                                        <div class="input_item">電話番号</div>
                                    </th>
                                    <td class="dmy"></td>
                                    <td class="required">
                                        <input type="text" name="tel" id="tel" class="tel" placeholder="090-1111-2222" value="<?=$tel?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <th class="cf">
                                        <div class="input_item">お問い合わせ内容<span class="Futura Medium">must</span></div>
                                    </th>
                                    <td class="dmy"></td>
                                    <td class="required <?php if($errorcheck_contact != ""){ echo " errorbox"; } ?>">
                                        <?php if($errorcheck_contact != ""){ echo "<div class='errorcomment'><p>".$errorcheck_contact."</p></div>"; } ?>
                                        <textarea name="contact" id="contact" rows="8" placeholder=""><?=$contact?></textarea>
                                    </td>
                                </tr>
                            </table>
                            <div class="formbtn_area">
                                <input class="submitbtn roundbtn Futura Demi" type="submit" name="submit" value="SEND">
                            </div>

                        </form>
                    </div><!-- #page_body -->
                </div><!-- .wrapper -->
            </section>

        </div>
        <?php
            include("include/footer.php");
        ?>
        <script src="<?=$webroot?>js/jquery.matchHeight.js"></script>
        <script src="<?=$webroot?>js/common.js?ver=<?php echo date('YmdHis'); ?>"></script>

        <script>
        function freehenkan(){
            $('input[type="text"],textarea').each(function(index) {
                var getData = $(this).val();
                getData = getData.replace(/"/g,'”');
                getData = getData.replace(/'/g,"’");
                getData = getData.replace(/</g,' ');
                getData = getData.replace(/>/g,' ');
                getData = getData.replace(/;/g,'；');
                getData = getData.replace(/,/g,'，');
                $(this).val(getData);
            });
        }
        $(function(){
            $('.submitbtn').click(function(){
                freehenkan();
                $('#form1').submit();
            });
        });
        </script>
    </body>
</html>

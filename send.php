<?php
session_start();
$errorflag = 0;
$session_token = isset($_SESSION['token']) ? $_SESSION['token'] : '';
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
                    <div class="page_lead"></div>

                    <div id="page_body">

                        <?php
                        // POSTの値からトークンを取得
                        $totestken = isset($_POST['token']) ? $_POST['token'] : '';
                        // トークンがない場合は不正扱い
                        if ($totestken === '') {
                            echo "<div style='text-align:center; margin:auto;'>";
                            echo "不正なアクセスです。（token error）<br /><br />";
                            echo "</div>";
                            //exit;
                            $errorflag = 1;
                        }
                        // セッションに入れたトークンとPOSTされたトークンの比較
                        if ($totestken !== $session_token) {
                            echo "<div style='text-align:center; margin:auto;'>";
                            echo "不正なアクセスです。（token error 2）<br /><br />";
                            echo "</div>";
                            //exit;
                            $errorflag = 1;
                        }
                        // セッションに保存しておいたトークンの削除
                        unset($_SESSION['token']);
                        ?>

                        <?php
                        	//直リンクへの対応
                        	// アクセスを許すURLの頭の部分
                        	$my_sitepreg = preg_quote($webroot, '/');
                        	if(!preg_match("/^$my_sitepreg/i", $_SERVER['HTTP_REFERER'])){
                            	header("Content-Type: text/html; charset=UTF-8");
                            	echo "<div style='text-align:center; margin:auto;'>";
                            	echo "不正なアクセスです。<br /><br />";
                            	echo "</div>";
                            	$errorflag = 1;
                        	}

                        	mb_language("Japanese");
                        	mb_internal_encoding("UTF-8");

                        	$now_time = date('Ymd_His');
                        	$now_time_ex = date("H:i");
                        	$now_date_ex = date("Y/m/d");

                        	$name = (isset($_POST["name"]))? $_POST["name"] : "";
                        	$company = (isset($_POST["company"]))? $_POST["company"] : "";
                        	$mail = (isset($_POST["mail"]))? $_POST["mail"] : "";
                        	$tel = (isset($_POST["tel"]))? $_POST["tel"] : "";
                        	$contact = (isset($_POST["contact"]))? $_POST["contact"] : "";
                        	//チェック（空入力対策）
                        	$is_error = false;
                        ?>

                        <?php
                			if(!$is_error && $errorflag == 0 ){
                				mb_language("ja");
                				mb_internal_encoding("utf-8");

                				//送信先
                				$to = $mail;

                				//管理人アドレス
                                $to_staff = "riho14kawa@gmail.com";

                				$cc_staff = "";

                				//差出人の名前
                				$fromname = "Riho Ishikawa";
                                //$from = $to_staff;

                                //$url = $_SERVER["SERVER_NAME"];
                                $url = 'riho14kawa.com';
            					$from = 'noreplay@'.$url;

                				//件名
                				$subject = "【自動返信】お問い合わせフォーム";
                				$subject_staff = "【riho14kawa.com】お問い合わせフォーム";


                				// メール本文作成
                				$message = $name . " 様\n\n";

                				$message .= "お問い合わせいただきありがとうございます。\n";
                				$message .= "以下の内容で承りましたので、ご確認ください。\n\n";

                				$message .= "---------------------\n\n";

                				$message .= "お名前 : " . $name . "\n";
                				$message .= "会社名 : " . $company . "\n";
                				$message .= "メールアドレス : " . $mail . "\n";
                				$message .= "電話番号 : " . $tel . "\n";
                				$message .= "お問い合わせ内容 : \n" . $contact. "\n\n";

                				$message .= "---------------------\n\n";

                				$message .= "お仕事のご依頼に関しましては2～3日を目途にお返事をさせていただきます。\n\n";

                				$message .= "────────────────────────────\n";
                				$message .= "　石川理穂  /  Ishikawa Riho\n";
                				$message .= "────────────────────────────\n";
                				$message .= "　Mail : riho14kawa@gmail.com\n";
                                $message .= "　Website : https://riho14kawa.com\n";
                                $message .= "　\n";
                				$message .= "　Illustrator / Photoshop\n";
                                $message .= "　html / css / javascript / PHP / WordPress\n";
                				$message .= "────────────────────────────\n";

                				// 関係者へのメッセージ
                				$message_staff = "ホームページのフォームより、お問い合わせを受信しました。\n";
                				$message_staff .= "このメールは関係者に自動で送信されています。\n\n";

                				$message_staff .= "---------------------\n\n";

                				$message_staff .= "ご担当者名 : " . $name . "\n";
                				$message_staff .= "会社名 : " . $company . "\n";
                				$message_staff .= "メールアドレス : " . $mail . "\n";
                				$message_staff .= "電話番号 : " . $tel . "\n";
                				$message_staff .= "お問い合わせ内容 : \n" . $contact. "\n\n";

                				$message_staff .= "---------------------\n\n";

                				$message_staff .= "2～3日以内に返信しましょう。\n\n";

                                $message_staff .= "────────────────────────────\n";
                                $message_staff .= "　Website : https://riho14kawa.com\n";
                				$message_staff .= "────────────────────────────\n";

                				//本文設定
                				$body_staff = "--__BOUNDARY__\n";
                				$body_staff .= "Content-Type: text/plain; charset=\"ISO-2022-JP\"\n\n";
                				$body_staff .= $message_staff . "\n";
                				$body_staff .= "--__BOUNDARY__\n";

                				$body_staff .= $attachmentfiles;

                				//本文設定
                				$body = "--__BOUNDARY__\n";
                				$body .= "Content-Type: text/plain; charset=\"ISO-2022-JP\"\n\n";
                				$body .= $message . "\n";
                				$body .= "--__BOUNDARY__\n";

                				$mail_headers  = "Content-Type: multipart/mixed;boundary=\"__BOUNDARY__\"\n";
                				$mail_headers .= "From: " . mb_encode_mimeheader($fromname) . " <" . $from . ">\n";

                				$mail_headers_staff  = "Content-Type: multipart/mixed;boundary=\"__BOUNDARY__\"\n";
                				$mail_headers_staff .= "From: " . mb_encode_mimeheader($fromname) . " <" . $to . ">\n";
                				$mail_headers_staff .= "Cc: ".$cc_staff."\r\n";

                				// メール送信
                				if(mb_send_mail($to, $subject, $body, $mail_headers)){
                					// 関係者への自動返信
                					//mb_send_mail($to_staff, $subject_staff, $body_staff, $mail_headers_staff);
                					mb_send_mail($to_staff, $subject_staff, $body_staff, $mail_headers_staff);
                					echo "
                						<div class='form_sendpage'>
                                            <div class='text_area'>
                                                <div class='complete Futura Demi'>THANKS!</div>
                                                お問い合わせいただきありがとうございます。<br>
                                                ご記入いただいたメールアドレスに、お問い合わせ内容を送信しております。<br>
                                                <div class='formbtn_area'><a class='roundbtn Futura Demi' href='".$webroot."?from=comp'>HOME</a></div>
                                            </div>
                						</div>
                					";
                				} else {
                				   echo "
                						<div class='form_sendpage'>
                							<div class='text_area'>
                                                <b>エラーが発生しました。</b>
                    							恐れ入りますが、再度ご入力いただくか、こちらのメールアドレスまでご連絡くださいませ。<br>
                                                <a href='mailto:riho14kawa@gmail.com'>riho14kawa@gmail.com</a>
                							</div>
                						</div>
                					";
                				}

                			}else{
                				echo "<div class='formbtn_area'><a class='roundbtn' href='".$webroot."?from=directaccesserror'>HOME</a></div>";
                			}

                        ?>

                    </div><!-- #page_body -->
                </div><!-- .wrapper -->
            </section>

        </div>
        <?php
            include("include/footer.php");
        ?>
        <script src="<?=$webroot?>js/jquery.matchHeight.js"></script>
        <script src="<?=$webroot?>js/common.js?ver=<?php echo date('YmdHis'); ?>"></script>

    </body>
</html>

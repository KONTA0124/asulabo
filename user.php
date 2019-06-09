<?php 
	// フォームのボタンが押されたら
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// フォームから送信されたデータを各変数に格納
		$name = $_POST["name"];
	}

	// 送信ボタンが押されたら
	if (isset($_POST["submit"])) {
		// 送信ボタンが押された時に動作する処理をここに記述する
        	
		// 日本語をメールで送る場合のおまじない
        	mb_language("ja");
		mb_internal_encoding("UTF-8");
		
		//mb_send_mail("kanda.it.school.trial@gmail.com", "メール送信テスト", "メール本文");

        	// 件名を変数subjectに格納
        	$subject = "［自動送信］お問い合わせ内容の確認";

        	// メール本文を変数bodyに格納
		$body = <<< EOM
{$name}　様

お問い合わせありがとうございます。
以下のお問い合わせ内容を、メールにて確認させていただきました。

===================================================
【 お名前 】 
{$name}

【 ふりがな 】 
{$furigana}

【 メール 】 
{$email}

【 電話番号 】 
{$tel}

【 性別 】 
{$sex}

【 項目 】 
{$item}

【 内容 】 
{$content}
===================================================

内容を確認のうえ、回答させて頂きます。
しばらくお待ちください。
EOM;
        
		// 送信元のメールアドレスを変数fromEmailに格納
		$fromEmail = "contact@dream-php-seminar.com";

		// 送信元の名前を変数fromNameに格納
		$fromName = "お問い合わせテスト";

		// ヘッダ情報を変数headerに格納する		
		$header = "From: " .mb_encode_mimeheader($fromName) ."<{$fromEmail}>";

		// メール送信を行う
		mb_send_mail($email, $subject, $body, $header);

 		// サンクスページに画面遷移させる
		header("Location: http://testapp.hippy.jp/contact/thanks.php");
		exit;
	}
?>

    <!DOCTYPE html>
    <html lang="ja">

    <head>
        <meta charset="UTF-8">
        <title>メニュー</title>
        <link href="css/style.css" rel="stylesheet">
        <!-- BootstrapのJS読み込み -->
        <script src="js/bootstrap.min.js"></script>
        <!-- BootstrapのCSS読み込み -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
        <div>
            <a href="admin.php">
                <button>管理画面に戻る</button>
            </a>
        </div>
        <div>
            <h1>顧客画面</h1>
        </div>

        <div>
            <div class="container clearfix">
                <div class="row clearfix">
                    <div class="col-md-4 clearfix">
                        <button class="playbutton button-images">
                            <img src="images/drink_wine_champagne_stopper.png" style="height:150px" />
                        </button>
                    </div>
                    <div class="col-md-4 clearfix">
                        <button class="playbutton button-images">
                            <img src="images/party_highball_jug.png" style="height:150px" />
                        </button>
                    </div>
                    <div class="col-md-4 clearfix">
                        <button class="playbutton button-images">
                            <img src="images/petbottle_cola.png" style="height:150px" />
                        </button>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-md-4 clearfix">
                        <button class="playbutton button-images">
                            <img src="images/food_harusame_soup.png" style="height:150px" />
                        </button>
                    </div>
                    <div class="col-md-4 clearfix">
                        <button class="playbutton button-images">
                            <img src="images/food_sauce_katsudon.png" style="height:150px" />
                        </button>
                    </div>
                    <div class="col-md-4 clearfix">
                        <button class="playbutton button-images">
                            <img src="images/food_yagijiru.png" style="height:150px" />
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
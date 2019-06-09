<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>メニュー</title>
    <script type="text/javascript" src="contact.js"></script>
    <!-- BootstrapのJS読み込み -->
    <script src="js/bootstrap.min.js"></script>
    <!-- BootstrapのCSS読み込み -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div>
        <a href="index.php">
            <button>顧客画面</button>
        </a>
    </div>
    <div>
        <h1>管理画面</h1>
    </div>

    <form action="confirm.php" method="post" name="form" onsubmit="return validate()">
        <h1 class="contact-title">顧客情報入力</h1>
        <p>顧客情報を入力の上、「顧客画面に反映する」ボタンをクリックしてください。</p>
        <div>
            <div>
                <label>お名前</label>
                <input type="text" name="name" placeholder="例）山田太郎" value="">
            </div>
            <div>
                <label>性別<span>必須</span></label>
                <?php
$dsn = 'pgsql:dbname=d4j3vu6k5dkt1s;host=ec2-54-235-114-242.compute-1.amazonaws.com;port=5432';
$user = 'rqctcorramtofr';
$pass = '0a0b29fa56efd4c1776ea414bec8d385ae1578ae9f7fbc7c700145f277311368';

try {
  // DBに接続する
  $dbh = new PDO($dsn, $user, $pass);

  // ここでクエリ実行する
    $query_result = $dbh->query('SELECT * FROM sexes');
    foreach($query_result as $row) {
        if($row["id"] == 1) {
            print '<input type="radio" name="sex" value="' . $row["id"] . '" checked> ' . $row["name"];
        } else {
            print '<input type="radio" name="sex" value="' . $row["id"] . '"> ' . $row["name"];
        }
    }

  // DBを切断する
  $dbh = null;
} catch (PDOException $e) {
    // 接続にエラーが発生した場合ここに入る
    print "DB ERROR: " . $e->getMessage() . "<br/>";
    die();
}
?>
            </div>
            <div>
                <label>年代<span>必須</span></label>
                <select name="item">
                    <option value="">年代を選択してください</option>
                    <?php
$dsn = 'pgsql:dbname=d4j3vu6k5dkt1s;host=ec2-54-235-114-242.compute-1.amazonaws.com;port=5432';
$user = 'rqctcorramtofr';
$pass = '0a0b29fa56efd4c1776ea414bec8d385ae1578ae9f7fbc7c700145f277311368';

try {
  // DBに接続する
  $dbh = new PDO($dsn, $user, $pass);

  // ここでクエリ実行する
    $query_result = $dbh->query('SELECT * FROM ages');
    foreach($query_result as $row) {
        print '<option value="' . $row["name"] . '">' . $row["name"] . '</option>';
    }

  // DBを切断する
  $dbh = null;
} catch (PDOException $e) {
    // 接続にエラーが発生した場合ここに入る
    print "DB ERROR: " . $e->getMessage() . "<br/>";
    die();
}
?>
                </select>
            </div>
        </div>
        <button type="submit">顧客画面に反映する</button>
    </form>
</body>

</html>




<!--
<?php 
	// フォームのボタンが押されたら
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// フォームから送信されたデータを各変数に格納
		$name = $_POST["name"];
		$furigana = $_POST["furigana"];
		$email = $_POST["email"];
		$tel = $_POST["tel"];
		$sex = $_POST["sex"];
		$item = $_POST["item"];
		$content  = $_POST["content"];
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
    <html lang="ja">

    <head>
        <meta charset="UTF-8">
        <title>お問い合わせフォーム</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <div>
            <h1>Company Name</h1></div>
        <div>
            <h2>お問い合わせ</h2></div>
        <div>
            <form action="confirm.php" method="post">
                <input type="hidden" name="name" value="<?php echo $name; ?>">
                <input type="hidden" name="furigana" value="<?php echo $furigana; ?>">
                <input type="hidden" name="email" value="<?php echo $email; ?>">
                <input type="hidden" name="tel" value="<?php echo $tel; ?>">
                <input type="hidden" name="sex" value="<?php echo $sex; ?>">
                <input type="hidden" name="item" value="<?php echo $item; ?>">
                <input type="hidden" name="content" value="<?php echo $content; ?>">
                <h1 class="contact-title">お問い合わせ 内容確認</h1>
                <p>お問い合わせ内容はこちらで宜しいでしょうか？
                    <br>よろしければ「送信する」ボタンを押して下さい。</p>
                <div>
                    <div>
                        <label>お名前</label>
                        <p>
                            <?php echo $name; ?>
                        </p>
                    </div>
                    <div>
                        <label>ふりがな</label>
                        <p>
                            <?php echo $furigana; ?>
                        </p>
                    </div>
                    <div>
                        <label>メールアドレス</label>
                        <p>
                            <?php echo $email; ?>
                        </p>
                    </div>
                    <div>
                        <label>電話番号</label>
                        <p>
                            <?php echo $tel; ?>
                        </p>
                    </div>
                    <div>
                        <label>性別</label>
                        <p>
                            <?php echo $sex ?>
                        </p>
                    </div>
                    <div>
                        <label>お問い合わせ項目</label>
                        <p>
                            <?php echo $item; ?>
                        </p>
                    </div>
                    <div>
                        <label>お問い合わせ内容</label>
                        <p>
                            <?php echo nl2br($content); ?>
                        </p>
                    </div>
                </div>
                <input type="button" value="内容を修正する" onclick="history.back(-1)">
                <button type="submit" name="submit">送信する</button>
            </form>
        </div>
    </body>

    </html>-->
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>お問い合わせフォーム</title>
<link rel="stylesheet" href="style.css">
<script type="text/javascript" src="contact.js"></script>
</head>
<body>
<div><h1>Company Name</h1></div>
<div><h2>お問い合わせ</h2></div>
  <?php
$dsn = 'pgsql:dbname=d4j3vu6k5dkt1s;host=ec2-54-235-114-242.compute-1.amazonaws.com;port=5432';
$user = 'rqctcorramtofr';
$pass = '0a0b29fa56efd4c1776ea414bec8d385ae1578ae9f7fbc7c700145f277311368';

try {
  // DBに接続する
  $dbh = new PDO($dsn, $user, $pass);

  // ここでクエリ実行する

  // DBを切断する
  $dbh = null;
} catch (PDOException $e) {
    // 接続にエラーが発生した場合ここに入る
    print "DB ERROR: " . $e->getMessage() . "<br/>";
    die();
}
?>

<div>
	<form action="confirm.php" method="post" name="form" onsubmit="return validate()">
		<h1 class="contact-title">お問い合わせ 内容入力</h1>
		<p>お問い合わせ内容をご入力の上、「確認画面へ」ボタンをクリックしてください。</p>
		<div>
                	<div>
				<label>お名前<span>必須</span></label>
				<input type="text" name="name" placeholder="例）山田太郎" value="">
			</div>
			<div>
				<label>ふりがな<span>必須</span></label>
				<input type="text" name="furigana" placeholder="例）やまだたろう" value="">
			</div>
			<div>
				<label>メールアドレス<span>必須</span></label>
				<input type="text" name="email" placeholder="例）guest@example.com" value="">
			</div>
			<div>
				<label>電話番号<span>必須</span></label>
				<input type="text" name="tel" placeholder="例）0000000000" value="">
			</div>
			<div>
				<label>性別<span>必須</span></label>
				<input type="radio" name="sex" value="男性" checked> 男性
				<input type="radio" name="sex" value="女性"> 女性
			</div>
			<div>
				<label>お問い合わせ項目<span>必須</span></label>
				<select name="item">
					<option value="">お問い合わせ項目を選択してください</option>
					<option value="ご質問・お問い合わせ">ご質問・お問い合わせ</option>
					<option value="ご意見・ご感想">ご意見・ご感想</option>
				</select>
			</div>
			<div>
				<label>お問い合わせ内容<span>必須</span></label>
				<textarea name="content" rows="5" placeholder="お問合せ内容を入力"></textarea>
			</div>
		</div>
		<button type="submit">確認画面へ</button>
	</form>
</div>
</body>
</html>
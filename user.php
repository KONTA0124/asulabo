<?php 
	// フォームのボタンが押されたら
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// フォームから送信されたデータを各変数に格納
		$name = $_POST["name"];
        $sex = $_POST["sex"];
        $age = $_POST["age"];
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
            <?php
$dsn = 'pgsql:dbname=d4j3vu6k5dkt1s;host=ec2-54-235-114-242.compute-1.amazonaws.com;port=5432';
$user = 'rqctcorramtofr';
$pass = '0a0b29fa56efd4c1776ea414bec8d385ae1578ae9f7fbc7c700145f277311368';

try {
  // DBに接続する
  $dbh = new PDO($dsn, $user, $pass);

  // ここでクエリ実行する
    $query_result = $dbh->query('SELECT * FROM members WHERE name LIKE "%田中%"');
    foreach($query_result as $row) {
        print $row["name"] ;
    }

  // DBを切断する
  $dbh = null;
} catch (PDOException $e) {
    // 接続にエラーが発生した場合ここに入る
    print "DB ERROR: " . $e->getMessage() . "<br/>";
    die();
}
?>
                <?php print $name; ?>
                    <?php print $sex; ?>
                        <?php print $age; ?>
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
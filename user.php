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
            <a href="index.php">
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
    $query_result = $dbh->query("SELECT * FROM members WHERE name LIKE '" .$name . "'");
    $count = $query_result->rowCount();
    if($count == 0) {
        $query_result = $dbh->query("SELECT * FROM ages WHERE id = '" . $age . "'");
        foreach($query_result as $row) {
            print '【会員未登録】　名前：' . $name . '、　性別：' . $sex . '、　年代：' . $row["name"];
        }
    } else {
        foreach($query_result as $row) {
            $sex = $row["sex"];
            $age = $row["age"];
            if($row["age"] < 20) {
                $age = 1;
            } else if($row["age"] < 40) {
                $age = 2;
            } else if($row["age"] < 60) {
                $age = 3;
            } else {
                $age = 4;
            }
            print '【会員登録済】　名前：' . $name . '、　性別：' . $sex . '、　年代：' . $row["age"] . '歳';
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
            <div class="container clearfix">
                <?php
$dsn = 'pgsql:dbname=d4j3vu6k5dkt1s;host=ec2-54-235-114-242.compute-1.amazonaws.com;port=5432';
$user = 'rqctcorramtofr';
$pass = '0a0b29fa56efd4c1776ea414bec8d385ae1578ae9f7fbc7c700145f277311368';

try {
  // DBに接続する
  $dbh = new PDO($dsn, $user, $pass);

  // ここでクエリ実行する
    $query_result = $dbh->query("SELECT * FROM cuisines WHERE sex = '" . $sex . "' and age = '" . $age . "'");
    print '<div class="row clearfix">';
    foreach($query_result as $row) {
        print '<div class="col-md-4 clearfix">';
        print '<button class="playbutton button-images">';
        print '<img src="' . $row["path"] . '" style="height:150px" />';
        print '</button>';
        print '<div style="text-align:center">' . $row["name"] . '</div>';
        print '</div>';
    }
    print '</div>';

  // DBを切断する
  $dbh = null;
} catch (PDOException $e) {
    // 接続にエラーが発生した場合ここに入る
    print "DB ERROR: " . $e->getMessage() . "<br/>";
    die();
}
?>
                    <!--
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
-->
            </div>
        </div>
    </body>

    </html>
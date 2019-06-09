<?php 
	// フォームのボタンが押されたら
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// フォームから送信されたデータを各変数に格納
		$name = $_POST["name"];
		$sex = $_POST["sex"];
		$age = $_POST["age"];
	}
>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>メニュー</title>
    <link href="css/style.css" rel="stylesheet">
    <script type="text/javascript" src="contact.js"></script>
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
//        <?php echo $name;>
//        <?php echo $sex;>
//        <?php echo $age;>
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
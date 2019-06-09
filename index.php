<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>管理画面</title>
    <script type="text/javascript" src="contact.js"></script>
    <!-- BootstrapのJS読み込み -->
    <script src="js/bootstrap.min.js"></script>
    <!-- BootstrapのCSS読み込み -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div>
        <h1>管理画面</h1>
    </div>

    <form action="user.php" method="post" name="form" onsubmit="return validate()">
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
            print '<input type="radio" name="sex" value="' . $row["name"] . '" checked> ' . $row["name"];
        } else {
            print '<input type="radio" name="sex" value="' . $row["name"] . '"> ' . $row["name"];
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
                <select name="age">
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
        print '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
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

    <div>
        <div>会員情報</div>
        <table>
            <?php
$dsn = 'pgsql:dbname=d4j3vu6k5dkt1s;host=ec2-54-235-114-242.compute-1.amazonaws.com;port=5432';
$user = 'rqctcorramtofr';
$pass = '0a0b29fa56efd4c1776ea414bec8d385ae1578ae9f7fbc7c700145f277311368';

try {
  // DBに接続する
  $dbh = new PDO($dsn, $user, $pass);

  // ここでクエリ実行する
    $query_result = $dbh->query('SELECT * FROM members order by id');
    foreach($query_result as $row) {
        print '<tr>';
        print '<td>'. $row["id"] . '</td>';
        print '<td>'. $row["name"] . '</td>';
        print '<td>'. $row["phonetic"] . '</td>';
        print '<td>'. $row["tel"] . '</td>';
        print '<td>'. $row["mail"] . '</td>';
        print '<td>'. $row["sex"] . '</td>';
        print '<td>'. $row["age"] . '</td>';
        print '</tr>';
    }

  // DBを切断する
  $dbh = null;
} catch (PDOException $e) {
    // 接続にエラーが発生した場合ここに入る
    print "DB ERROR: " . $e->getMessage() . "<br/>";
    die();
}
?>
        </table>
    </div>
</body>

</html>
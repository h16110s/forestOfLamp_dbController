<?php
require('dbSetting.php');

try {
    $pdo = new PDO($dsn, $db_user, $db_pass);
    $date = date('Y-m-d H:i:s');
    $sql = "UPDATE pm SET red = 5, green = 1, blue = 6, updated_at='$date'  WHERE sid = 1";
    // sqlを実行
    $res = $pdo->query($sql);

} catch (PDOException $e) {
    exit('データベース接続失敗。' . $e->getMessage());
    die();
}

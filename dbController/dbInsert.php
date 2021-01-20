<?php

require('dbSetting.php');

try {
    $pdo = new PDO($dsn, $db_user, $db_pass);

    $date = date('Y-m-d H:i:s');
    $sql = "INSERT INTO pm(id,blue,red,green,updated_at) VALUES (-1,-1,-1,-1,'$date')";
    // sqlを実行
    $res = $pdo->query($sql);

} catch (PDOException $e) {
    exit('データベース接続失敗。' . $e->getMessage());
    die();
}

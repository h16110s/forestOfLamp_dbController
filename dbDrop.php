<?php
require('dbSetting.php');

try {
    $pdo = new PDO($dsn, $db_user, $db_pass);
    $sql = "drop table pm";
    // sqlを実行
    $res = $pdo->query($sql);
    echo "テーブルを削除しました。";

} catch (PDOException $e) {
    exit('データベース接続失敗。' . $e->getMessage());
    die();
}
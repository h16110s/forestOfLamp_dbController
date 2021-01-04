<?php
require('dbSetting.php');

try {
    $pdo = new PDO($dsn, $db_user, $db_pass);
    $sql = "drop table pm";
    // sqlを実行
    $res = $pdo->query($sql);
    echo "テーブルを削除しました。";

    // テーブル作成のSQLを作成
    $sql = 'CREATE TABLE pm (
        id INT(11) not null AUTO_INCREMENT PRIMARY KEY,
        blue INT(11) not null ,
        red INT(11) not null ,
        green INT(11) not null,
        updated_at DATETIME
    ) engine=innodb default charset=utf8';
    $res = $pdo->query($sql);

    $date = date('Y-m-d H:i:s');
    for($i = 0; $i < 50; $i++){
        $sql = "INSERT INTO pm (blue,red,green,updated_at) VALUES (0,0,0,'$date')";
        $res = $pdo->query($sql);
    }
    echo "テーブルを作成しました";

} catch (PDOException $e) {
    exit('データベース接続失敗。' . $e->getMessage());
    die();
}
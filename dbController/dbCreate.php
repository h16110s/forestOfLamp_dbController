<?php
require('dbSetting.php');

try {
    $pdo = new PDO($dsn, $db_user, $db_pass);
    // テーブル作成のSQLを作成
    $sql = 'CREATE TABLE pm (
        id SERIAL NOT NULL,
        blue integer NOT NULL ,
        red integer NOT NULL ,
        green integer NOT NULL,
        updated_at timestamp
    )';

    // SQLを実行
    $res = $pdo->query($sql);

    $date = date('Y-m-d H:i:s');
    
    for($i = 0; $i < 100; $i++){
        $sql = "INSERT INTO pm (blue,red,green,updated_at) VALUES (0,0,0,'$date')";
        $res = $pdo->query($sql);
    }
    echo "テーブルを作成しました";

} catch (PDOException $e) {
    exit('データベース接続失敗。' . $e->getMessage());
    die();
}

// 接続を閉じる
$dbh = null;



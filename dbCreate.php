<?php
$dsn = 'mysql:host=db;dbname=mytest;charset=utf8mb4';
$db_user = 'mytest';
$db_pass = 'yourPassword';
$driver_options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($dsn, $db_user, $db_pass);
    // テーブル作成のSQLを作成
    $sql = 'CREATE TABLE pm (
        id INT(11) not null AUTO_INCREMENT PRIMARY KEY,
        blue INT(11) not null ,
        red INT(11) not null ,
        green INT(11) not null,
        updated_at DATETIME
    ) engine=innodb default charset=utf8';

    // SQLを実行
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

// 接続を閉じる
$dbh = null;



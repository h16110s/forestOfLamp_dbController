<?php

function setColor($id, $red, $green, $blue){
    require('dbSetting.php');
    try {
        $pdo = new PDO($dsn, $db_user, $db_pass);
        $date = date('Y-m-d H:i:s');
        $sql = "UPDATE pm SET red = '$red', green = '$green', blue = '$blue', updated_at='$date'  WHERE id = $id";
        // sqlを実行
        $res = $pdo->query($sql);

    } catch (PDOException $e) {
        exit('データベース接続失敗。' . $e->getMessage());
        die();
    }
}

//受信した色により分岐
    if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
        $id = $_POST["id"];
        $data = $_POST["color"]; //データを変数に格納
        if($data == "BLUE"){
            setColor($id, 0, 0, 50);
        }
        else if($data == "SKY_BLUE"){
            setColor($id, 0, 50, 50);
        }
        else if($data == "GREEN"){
            setColor($id, 0, 50, 0);
        }
        else if($data == "YELLOW"){
            setColor($id, 50, 50, 0);
        }
        else if($data == "RED"){
            setColor($id, 50, 0, 0);
        }
        else {
            // echo $data;
        }
        echo $id . " is " . $data;
    }
    else{
        echo "ERROR";
    }

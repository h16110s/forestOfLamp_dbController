# Forest of Lamp DB開発環境

## dbController種類

### dbCreate.php
データベースの作成と初期化

### dbDrop.php
データベースの消去

### dbReset.php
データベースのリセット

### dbInsert.php
指定したデータの挿入

### dbUpdate.php
指定したデータの更新

## 使い方
1. dbSetting.phpにいろいろ設定項目を書く
2. ブラウザからアクセス

## color-change-api.php
今回のAPI

### POSTパラメータ
```
id : "LEDのid"
color : "光らせたい色"
```
POSTパラメータの値に応じたIDの色を操作
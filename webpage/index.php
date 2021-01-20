<?php
$RADIO_BUTTON_NUM = 54;
$Debug = false;
if ($_GET["D"] === '1000'){
    $Debug = true;
    echo 'Debug mode';
}
?>
<!doctype html>
<html lang="ja">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=700px, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    
    <title> ランプの森 </title>


    <script type="text/javascript">
        function getSelectColor(){
            return document.getElementById('color-select').value;
        }
        function getCheckedRadioId(){
            var flag = false; // 選択されているか否かを判定するフラグ
        
            //　ラジオボタンの数だけ判定を繰り返す（ボタンを表すインプットタグがあるので１引く）
            for(var i = 0 ; i < document.getElementsByName('radio').length  ; i++){
                // i番目のラジオボタンがチェックされているかを判定
                if(document.getElementsByName('radio')[i].checked){ 
                    flag = true;
                    // alert(document.getElementsByName('radio')[i].value + "が選択されました。");
                    return i+1;
                }
            }
        
            // 何も選択されていない場合の処理
            // if(!flag){ 
            //     // alert("項目が選択されていません。");
            // }
            return -1;
        }
        function postForm() {
            id = getCheckedRadioId();
            var data = '';
            data += 'id=' + id;
            data +='&color=' + getSelectColor();    // 「&」をつけて文字列連結でデータ増やせる（今回は）
            
            var xhr = new XMLHttpRequest();
            <?php if($Debug):?>
                alert('疑似送信:'+ data);
            <?php else:?>
                if(id >= 0){
                    xhr.open('POST', "http://localhost:8080/color-change-api.php");
                    xhr.setRequestHeader('content-type', 'application/x-www-form-urlencoded;charset=UTF-8');   
                    xhr.send(data);
                }
            <?php endif;?>
        }
    </script>
  </head>
  <!-- CSS -->
  <style>
      html{
          font-family: 'Helvetica Neue','Helvetica','Arial',sans-serif;
      }
      body{
          max-width:700px;
          text-align: center;
      }
      .custom-radio-button{
          -webkit-transform: scale(3);
        　transform: scale(3);
        　padding:3rem;
      }
      .title{
          color:white;
      }
      .lamp{
          color:rgb(255,253,153);	
      }
      .forest{
          color:rgb(116,194,58);
      }
  </style>
  <body class="bg-dark mx-auto">
    <div class="container-fluid">
      <h1 class="text-center mt-3 title"> <span class="lamp">ランプ</span>の<span class="forest">森</span> </h1>
    </div>
    <div class="container-fluid mt-3 ">
        <div class="row justify-content-center">
            <div clas="col-5 mx-auto">
                <span class="form-inline">
                    <label for="color-selectv" class="text-white mx-2">色を選択:</label>
                    <select id="color-select" class="form-control ">
                        <option>BLUE</option>
                        <option>RED</option>
                        <option>GREEN</option>
                        <option>SKY_BLUE</option>
                        <option>YELLOW</option>
                    </select>
                </span>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-5" name="cform">
        <div class="row justify-content-center">
            <?php for($i = 0; $i < 5; $i++):?>
                <div class = "col-12 text-center">
                    <?php for($j = 0; $j < 9 ; $j++):?>
                        <div class="form-check-inline m-4">
                            <input class="form-check-input custom-radio-button" type="radio" name="radio" id=<?php echo $i?> value="<?php echo $i?>">
                        </div>
                    <?php endfor?>
                </div>
            <?php endfor?>
            <div class="col-7 col-md-5 mt-5 text-center">
                <button class="btn btn-danger w-100 py-5" onclick="postForm()" onsubmit="return false;">参加する</button>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>
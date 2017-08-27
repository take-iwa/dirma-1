<?php

$workplace = $_POST["pref_id"];

//1.  DB接続します
try {
  $pdo = new PDO('mysql:dbname=dirma;charset=utf8;host=localhost','root','');
//注意：ホストは、サクラに繋いだらそれになる。ルート、そのあとのスペースは指定
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM job_index_table WHERE workplace LIKE '$workplace'");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
            $view .='<tr id="tr">';
    $view .= '<td class="text-success" width="100px" align="center" vartical-align="middle" id="1"　 >'.$result["corporate"].'<br>'.$result["job_title"].'</td>';
      $view .= '<td width="120px" valign="middle"><p class="jc">'.$result["job_contents"].'</p></td>';
      $view .= '<td width="120px" valign="middle">'.$result["wanted"].'</td>';
      $view .= '<td width="120px" valign="middle">'.$result["comp_min"].'〜'.$result["comp_max"].'万円</td>';
            $view .= '<td width="120px" valign="middle">'.$result["workplace"].'</td>';
            $view .= '<td id="linktd"><a href="jobdetail/detail_fr_gubp.php" id="linkdirmajob">Dirma取材<br>職種詳細</a><br>
            <a href="https://www.fastretailing.com/employment/ja/fastretailing/jp/career/corporate/joblist/detail/?id=627" id="linkcorpjob">企業サイト<br>職種詳細</a></td>';
      
      $view .='</tr>';
      
  } } ?>

    <!DOCTYPE html>
    <html lang="ja">

    <head>
        <meta charset="utf-8">
        <title>求人検索結果</title>
        <link rel="stylesheet" href="../css/selectresult.css">
        <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
        <style type="text/css">
            a {
                text-decoration: none;
            }
            
            a:link {
                color: #0000FF;
            }
            
            a:visited {
                color: #330066;
            }

        </style>


    </head>

    <body id="body">
        <div id="top">
            <a href="index.php"><img src="../img/dirmalogo.png" alt="logo" width="100px" height="60px" id="dlogo"></a>
            <p id="menu">ログイン</p>
        </div>

        <!-- Main[Start] -->
        <div id="divtable">
            <p>○件の求人情報が該当しました。</p>
            <table border="solid 1px" id="table">
                <tr id="th1">
                    <th class="th1" width="300px">社名・募集ポジション</th>
                    <th class="th1" width="300px">仕事内容</th>
                    <th class="th1" width="300px">求める人物・経験</th>
                    <th class="th1" width="100px">想定年収</th>
                    <th class="th1" width="100px">勤務地</th>
                    <th class="th1" width="200px">詳細情報</th>

                </tr>
                <?=$view?>

            </table>

        </div>


        <!-- Main[End] -->

    </body>

    </html>

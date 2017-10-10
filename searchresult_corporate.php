<?php
require_once 'init.php';

//直接のページ遷移を阻止
$request = isset($_SERVER['HTTP_X_REQUESTED_WITH']) ? strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) : '';
if($request !== 'xmlhttprequest') exit;

//include 'ChromePhp.php';
$corporate = escape($_POST["corporate"]);

//1.  DB接続します
$pdo = connectDb();

//２．データ登録SQL作成

$stmt = $pdo->prepare("SELECT * FROM job_index_table WHERE corporate LIKE '%".$corporate."%'");
$status = $stmt->execute();


//３．データ表示
$view="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  //ChromePhp::log($error);
  exit("ErrorQuery:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .='<tr>';
    $view .= '<td class="text-success">'.$result["corporate"].'<br>'.$result["job_title"].'</td>';
    $view .= '<td><p class="jc">'.$result["job_contents"].'</p></td>';
    $view .= '<td>'.$result["wanted"].'</td>';
    $view .= '<td>'.$result["comp_min"].'〜'.$result["comp_max"].'万円</td>';
    $view .= '<td>'.$result["workplace"].'</td>';
    $view .= '<td><a href="jobdetail/jobdetail_'.$result["jobid"].'.php" class="btn btn-info btn-jobdetaile">Dirma取材<br>職種詳細</a><br>
    <a href="'.$result["offer_page"].'" class="btn btn-success btn-corp">企業サイト<br>職種詳細</a></td>';
    $view .='</tr>';
  }
}

header('Content-Type: application/text');
//json形式でバックする
echo json_encode($view);


?>
<?php
include 'init.php';

//直接のページ遷移を阻止
$request = isset($_SERVER['HTTP_X_REQUESTED_WITH']) ? strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) : '';
if($request !== 'xmlhttprequest') exit;

include 'ChromePhp.php';
$workplace = $_POST["pref_id"];
$jobtype_detail = $_POST["jobtype_detail"];
$min_salary = $_POST["salary"];
$min = json_decode($min_salary)[0];
$max = json_decode($min_salary)[1];
ChromePhp::log($_POST);
//1.  DB接続します
$pdo = connectDb();

//２．データ登録SQL作成
  $stmt = $pdo->prepare("SELECT * FROM job_index_table WHERE workplace LIKE :workplace AND comp_max > :min AND comp_min < :max AND job_sort_detail LIKE :jobtype_detail");
  $stmt->bindValue(':workplace', $workplace, PDO::PARAM_STR);
  $stmt->bindValue(':min', $min, PDO::PARAM_STR);
  $stmt->bindValue(':max', $max, PDO::PARAM_STR);
  $stmt->bindValue(':jobtype_detail', $jobtype_detail, PDO::PARAM_STR);
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
    $view .= '<td id="linktd"><a href="jobdetail/jobdetail_fr_0001.php" id="linkdirmajob">Dirma取材<br>職種詳細</a><br>
    <a href="https://www.fastretailing.com/employment/ja/fastretailing/jp/career/corporate/joblist/detail/?id=627" id="linkcorpjob">企業サイト<br>職種詳細</a></td>';
    $view .='</tr>';
  } }

header('Content-Type: application/text');
//json形式でバックする
echo json_encode($view);

?>
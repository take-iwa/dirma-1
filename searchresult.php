<?php
include 'init.php';

//直接のページ遷移を阻止
$request = isset($_SERVER['HTTP_X_REQUESTED_WITH']) ? strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) : '';
if($request !== 'xmlhttprequest') exit;

include 'ChromePhp.php';
$job_ctgy = $_POST["job_category"];
$workplace = $_POST["pref_id"];
$jobtype_detail = $_POST["jobtype_detail"];
$min_salary = $_POST["salary"];
$min = json_decode($min_salary)[0];
$max = json_decode($min_salary)[1];
//ChromePhp::log($_POST);
//ChromePhp::log($min);
//1.  DB接続します
$pdo = connectDb();

//検索条件よりsql条件作成
$start_flg = false;
$sql = '';
//職種詳細
if($jobtype_detail !== 'none'){
  $start_flg = true;
  $sql .= ' WHERE job_sort_detail LIKE :jobtype_detail';
}elseif($job_ctgy !== 'none'){
  //詳細指定なしなら、職種カテゴリもチェック
  $category = getJobCtbrStr($job_ctgy);
  $start_flg = true;
  $sql .= ' WHERE job_sort LIKE :category';
}
//場所
if($workplace !== 'none'){
  if(!$start_flg){
    $sql.= ' WHERE ';
    $start_flg = true;
  }else{
    $sql.= ' AND ';
  }
  $sql .= 'workplace LIKE :workplace';
}
//年収
if($min !== null){
  if(!$start_flg){
    $sql.= ' WHERE ';
    $start_flg = true;
  }else{
    $sql.= ' AND ';
  }
  $sql .= 'comp_max > :min AND comp_min < :max';
}
ChromePhp::log($sql);
//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM job_index_table".$sql);
if($jobtype_detail !== 'none'){
  $stmt->bindValue(':jobtype_detail', $jobtype_detail, PDO::PARAM_STR);
}elseif($job_ctgy !== 'none'){
  $stmt->bindValue(':category', $category, PDO::PARAM_STR);
}
if($workplace !== 'none'){
  $stmt->bindValue(':workplace', $workplace, PDO::PARAM_STR);
}
if($min !== null){
  $stmt->bindValue(':min', $min, PDO::PARAM_STR);
  $stmt->bindValue(':max', $max, PDO::PARAM_STR);
}
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
    $view .='<tr>';
    $view .= '<td class="text-success">'.$result["corporate"].'<br>'.$result["job_title"].'</td>';
    $view .= '<td><p class="jc">'.$result["job_contents"].'</p></td>';
    $view .= '<td>'.$result["wanted"].'</td>';
    $view .= '<td>'.$result["comp_min"].'〜'.$result["comp_max"].'万円</td>';
    $view .= '<td>'.$result["workplace"].'</td>';
    $view .= '<td><a href="jobdetail/jobdetail_fr_0001.php" class="btn btn-info btn-jobdetaile">Dirma取材<br>職種詳細</a><br>
    <a href="https://www.fastretailing.com/employment/ja/fastretailing/jp/career/corporate/joblist/detail/?id=627" class="btn btn-success btn-corp">企業サイト<br>職種詳細</a></td>';
    $view .='</tr>';
  }
}

header('Content-Type: application/text');
//json形式でバックする
echo json_encode($view);

?>
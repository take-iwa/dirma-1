<?php
include 'init.php';

//直接のページ遷移を阻止
$request = isset($_SERVER['HTTP_X_REQUESTED_WITH']) ? strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) : '';
if($request !== 'xmlhttprequest') exit;
//DBへの接続
$pdo = connectDb();
//Ajaxで渡ってきた値をもとに modelテーブル から該当する model を抽出
$job_id = $_POST['job_id'];
$sql = 'SELECT * FROM job_details WHERE job_id = :job_id';
$stmt=$pdo->prepare($sql);
$stmt->bindValue(':job_id', (int)$job_id, PDO::PARAM_INT);
$stmt->execute();

//抽出された値を $$detail_list配列 に格納
$detail_list = array();
while($row = $stmt -> fetch(PDO::FETCH_ASSOC)){
  $detail_list[$row['id']] = $row['job_detail'];
}
header('Content-Type: application/json');
//json形式でバックする
echo json_encode($detail_list);
?>
<?php
require_once './init.php';
sessChk();
include 'ChromePhp.php';

//メッセージ送信　POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if ((isset($_POST['company_id']) && $_POST['company_id'] !== '') && 
      (isset($_POST['user_id']) && $_POST['user_id'] !== '') && 
      (isset($_POST['message']) && $_POST['message'] !== '') && 
      (isset($_POST['transmission']) && $_POST['transmission'] !== '')) {

    //エスケープ処理
    $_POST = escape($_POST);

    $db = connectDb();
    
    if(isset($_POST["message"])){
      $sql = 'INSERT INTO message_table (id, company_id, user_id, message, reply_id, transmission, datetime)
      VALUES (NULL, :company_id, :user_id, :message, :reply_id, :transmission, sysdate())';
      $statement = $db->prepare($sql);
      $statement->bindValue(':company_id', $_POST['company_id'], PDO::PARAM_INT);
      $statement->bindValue(':user_id', $_POST['user_id'], PDO::PARAM_INT);
      $statement->bindValue(':message', $_POST['message'], PDO::PARAM_STR);
      $statement->bindValue(':reply_id', $_POST['reply_id'], PDO::PARAM_STR);
      $statement->bindValue(':transmission', $_POST['transmission'], PDO::PARAM_STR);

      if($statement->execute()) {
        if($_POST['transmission'] === 0){
          $url = "company_page.php?page=company_message&box=inbox";
        }else{
          $url = "user_page.php?page=user_message&box=inbox";
        }
        header("Location: {$url}");
        exit;
      } else {
        echo "送信に失敗しました。POST";
      }

    } else {
      echo "値が入力されていません";
    }
  }
}

//気になる送信　GET
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  if ((isset($_GET['cid']) && $_GET['cid'] !== '') && 
      (isset($_GET['uid']) && $_GET['uid'] !== '')) {
    //求人の情報を取得
    $job_info = getJobInfoAllFromJobId($_GET['jid']);

    //エスケープ処理
    $_GET = escape($_GET);
    $message = $job_info["corporate"]."　".$job_info["job_title"]."の求人が気になります。";
    ChromePhp::log($msg);
    
    $db = connectDb();

    $sql = 'INSERT INTO message_table (id, company_id, user_id, message, reply_id, transmission, datetime)
    VALUES (NULL, :company_id, :user_id, :message, 0, 1, sysdate())';
    $statement = $db->prepare($sql);
    $statement->bindValue(':company_id', $_GET['cid'], PDO::PARAM_INT);
    $statement->bindValue(':user_id', $_GET['uid'], PDO::PARAM_INT);
    $statement->bindValue(':message', $message, PDO::PARAM_STR);

    if($statement->execute()) {
      if($_GET['transmission'] === 0){
        $url = "company_page.php?page=company_messages&box=inbox&r=1";
      }else{
        $url = "user_page.php?page=user_messages&box=inbox&r=1";
      }
      header("Location: {$url}");
      exit;
    } else {
      echo "送信に失敗しました。GET";
      $error = $statement->errorInfo();
      exit("ErrorQuery:".$error[2]);
    }
  }
}
?>

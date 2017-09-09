<?php
require_once './init.php';
sessChk();

//プロフィール更新
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
        echo "登録に失敗しました。";
      }

    } else {
      echo "値が入力されていません";
    }
  }
}
?>

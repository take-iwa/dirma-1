<?php
/************ message_table ************/
/*----------- メッセージ取得 -----------*/
//メッセージID指定でメッセージテーブルから1フィールド全部取得()
function getMessage($mid) {
  $db = connectDb();
  $sql = "SELECT * FROM message_table WHERE id = :mid";
  $statement = $db->prepare($sql);
  $statement->bindValue(':mid', $mid, PDO::PARAM_INT);
  $statement->execute();
  $row = $statement->fetch();
  return $row;
}

//メッセージID指定でメッセージテーブルから1フィールド全部取得() + 既読にする
function getMessageAndMark($mid) {
  $db = connectDb();
  $sql = "SELECT * FROM message_table WHERE id = :mid";
  $statement = $db->prepare($sql);
  $statement->bindValue(':mid', $mid, PDO::PARAM_INT);
  $statement->execute();
  $row = $statement->fetch();
  
  //既読にする
  $mark_sql = "UPDATE message_table SET already=1  WHERE id=:mid";
  $stmt = $db->prepare($mark_sql);
  $stmt->bindValue(':mid', $mid, PDO::PARAM_INT);
  $status = $stmt->execute();

  if($status==false){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
  }else{
    return $row;
  }
}
/*----------- メッセージ送信 -----------*/
function setMessage() {
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
        $statement->bindValue(':message', nl2br($_POST['message']), PDO::PARAM_STR);
        $statement->bindValue(':reply_id', $_POST['reply_id'], PDO::PARAM_STR);
        $statement->bindValue(':transmission', $_POST['transmission'], PDO::PARAM_STR);

        if($statement->execute()) {
          echo '<div class="personal-info">
                <div class="alert alert-info alert-dismissable">
                <a class="panel-close close" data-dismiss="alert">×</a>
                <i class="fa fa-coffee"></i>
                メッセージを送信しました。
                </div></div>';
          exit;
        } else {
          echo '<div class="personal-info">
                <div class="alert alert-danger alert-dismissable">
                <a class="panel-close close" data-dismiss="alert">×</a>
                <i class="fa fa-coffee"></i>
                メッセージを送信できませんでした。
                </div></div>';
        }
      } else {
        echo '<div class="personal-info">
              <div class="alert alert-danger alert-dismissable">
                <a class="panel-close close" data-dismiss="alert">×</a>
                <i class="fa fa-coffee"></i>
                メッセージが入力されていません。
                </div></div>';
      }
    }
  }
}
/*----------- message_tableのユーザー -----------*/
//$sql = "SELECT * FROM message_table WHERE user_id = :uid AND transmission = 0"; //受信
//$sql = "SELECT * FROM messege_table WHERE user_id = :uid AND transmission = 1"; //送信

//ユーザーID指定で受信メッセージ数を取得()
function getCountMessageToUser($uid) {
  $db = connectDb();
  $sql = "SELECT * FROM message_table WHERE user_id = :uid AND transmission = 0";
  $statement = $db->prepare($sql);
  $statement->bindValue(':uid', $uid, PDO::PARAM_INT);
  $num = $statement->execute();
  return count($num);
}

//ユーザーID指定で「未読」の受信メッセージ数を取得()
function getCountUnreadToUser($uid) {
  $db = connectDb();
  $sql = "SELECT * FROM message_table WHERE user_id = :uid AND transmission = 0 AND already = 0";
  $statement = $db->prepare($sql);
  $statement->bindValue(':uid', $uid, PDO::PARAM_INT);
  $num = $statement->execute();
  return count($num);
}

//ユーザーID指定でInboxのメッセージ表示セット
function setViewInboxOfUser($uid) {
  $db = connectDb();
  $sql = "SELECT * FROM message_table WHERE user_id = :uid AND transmission = 0 ORDER BY id DESC";
  $statement = $db->prepare($sql);
  $statement->bindValue(':uid', $uid, PDO::PARAM_INT);
  $status = $statement->execute();

  $view = '';
  if($status==false){
    //execute（SQL実行時にエラーがある場合）
    $error = $statement->errorInfo();
    exit("ErrorQuery:".$error[2]);
  }else{
    while( $result = $statement->fetch(PDO::FETCH_ASSOC)){
      //会社情報
      $company_info = getCompanyAll($result["company_id"]);
      if($result['already'] == 0){
        $view .= '<tr id="message'.$result["id"].'" class="unread">';
      }else{
        $view .= '<tr id="message'.$result["id"].'">';
      }
      $view .= '<!-- Message'.$result["id"].' -->';
      $view .= '<td class="view-message col-md-3"><a href="user_page.php?page=user_messages&box=msg&mid='.$result["id"].'">'.$company_info["company_name"].'</a></td>';
      $view .= '<td class="view-message inbox-small-cells"></td>';
      $view .= '<td class="view-message col-md-7"><a href="user_page.php?page=user_messages&box=msg&mid='.$result["id"].'">'.mb_substr($result["message"], 0, 40).'…</a></td>';
      $view .= '<td class="view-message inbox-small-cells"></td>';
      $view .= '<td class="view-message col-md-2"><a href="user_page.php?page=user_messages&box=msg&mid='.$result["id"].'">'.$result["datetime"].'</a></td>';
      $view .= '</tr><!-- /Messege'.$result["id"].' -->';
    }
  }
  return $view;
}

//ユーザーID指定でSentのメッセージ表示セット
function setViewSentOfUser($uid, $page) {

  //メッセージ取得
  $db = connectDb();
  $sql = "SELECT * FROM message_table WHERE user_id = :uid AND transmission = 1 ORDER BY id DESC";  //送信
  $statement = $db->prepare($sql);
  $statement->bindValue(':uid', $uid, PDO::PARAM_INT);
  $status = $statement->execute();

  $view = '';
  if($status==false){
    //execute（SQL実行時にエラーがある場合）
    $error = $statement->errorInfo();
    exit("ErrorQuery:".$error[2]);
  }else{
    while( $result = $statement->fetch(PDO::FETCH_ASSOC)){
      //会社情報
      $company_info = getCompanyAll($result["company_id"]);

      $view .= '<tr id="message'.$result["id"].'">';
      $view .= '<!-- Message'.$result["id"].' -->';
      $view .= '<td class="view-message col-md-3"><a href="user_page.php?page=user_messages&box=msg&mid='.$result["id"].'">to '.$company_info["company_name"].'</a></td>';
      $view .= '<td class="view-message inbox-small-cells"></td>';
      $view .= '<td class="view-message col-md-7"><a href="user_page.php?page=user_messages&box=msg&mid='.$result["id"].'">'.mb_substr($result["message"], 0, 40).'…</a></td>';
      $view .= '<td class="view-message inbox-small-cells"></td>';
      $view .= '<td class="view-message col-md-2"><a href="user_page.php?page=user_messages&box=msg&mid='.$result["id"].'">'.$result["datetime"].'</a></td>';
      $view .= '</tr><!-- /Messege'.$result["id"].' -->';
    }
  }
  return $view;
}

/*----------- message_tableの会社 -----------*/
//$sql = "SELECT * FROM message_table WHERE company_id = :cid AND transmission = 1";  //受信
//$sql = "SELECT * FROM message_table WHERE company_id = :cid AND transmission = 0";  //送信

//会社ID指定で受信メッセージ数を取得()
function getCountMessageToCompany($cid) {
  $db = connectDb();
  $sql = "SELECT * FROM message_table WHERE company_id = :cid AND transmission = 1";
  $statement = $db->prepare($sql);
  $statement->bindValue(':cid', $cid, PDO::PARAM_INT);
  $num = $statement->execute();
  return count($num);
}

//会社ID指定で「未読」の受信メッセージ数を取得()
function getCountUnreadToCompany($cid) {
  $db = connectDb();
  $sql = "SELECT * FROM message_table WHERE company_id = :cid AND transmission = 1 AND already = 0";
  $statement = $db->prepare($sql);
  $statement->bindValue(':cid', $cid, PDO::PARAM_INT);
  $num = $statement->execute();
  return count($num);
}

//会社ID指定で送信メッセージ数を取得()
function getCountMessageFromCompany($cid) {
  $db = connectDb();
  $sql = "SELECT * FROM message_table WHERE company_id = :cid AND transmission = 0";
  $statement = $db->prepare($sql);
  $statement->bindValue(':cid', $cid, PDO::PARAM_INT);
  $num = $statement->execute();
  return count($num);
}

//会社ID指定でInboxのメッセージ表示セット
function setViewInboxOfCompany($cid, $page) {
  //メッセージ取得
  $db = connectDb();
  $sql = "SELECT * FROM message_table WHERE company_id = :cid AND transmission = 1 ORDER BY id DESC";  //受信
  $statement = $db->prepare($sql);
  $statement->bindValue(':cid', $cid, PDO::PARAM_INT);
  $status = $statement->execute();

  $view = '';
  if($status==false){
    //execute（SQL実行時にエラーがある場合）
    $error = $statement->errorInfo();
    exit("ErrorQuery:".$error[2]);
  }else{
    while( $result = $statement->fetch(PDO::FETCH_ASSOC)){
      //ユーザー情報
      $user_info = getUserAll($result["user_id"]);
      if($result['already'] == 0){
        $view .= '<tr id="message'.$result["id"].'" class="unread">';
      }else{
        $view .= '<tr id="message'.$result["id"].'">';
      }
      $view .= '<!-- Message'.$result["id"].' -->';
      $view .= '<td class="view-message col-md-3"><a href="company_page.php?page=company_messages&box=msg&mid='.$result["id"].'">'.$user_info["family_name"].'　'.$user_info["first_name"].'</a></td>';
      $view .= '<td class="view-message inbox-small-cells"></td>';
      $view .= '<td class="view-message col-md-7"><a href="company_page.php?page=company_messages&box=msg&mid='.$result["id"].'">'.mb_substr($result["message"], 0, 40).'…</a></td>';
      $view .= '<td class="view-message inbox-small-cells"></td>';
      $view .= '<td class="view-message col-md-2"><a href="company_page.php?page=company_messages&box=msg&mid='.$result["id"].'">'.$result["datetime"].'</a></td>';
      $view .= '</tr><!-- /Messege'.$result["id"].' -->';
    }
  }
  return $view;
}

//会社ID指定でSentのメッセージ表示セット
function setViewSentOfCompany($cid, $page) {
  //メッセージ取得
  $db = connectDb();
  $sql = "SELECT * FROM message_table WHERE company_id = :cid AND transmission = 0 ORDER BY id DESC";  //送信
  $statement = $db->prepare($sql);
  $statement->bindValue(':cid', $cid, PDO::PARAM_INT);
  $status = $statement->execute();

  $view = '';
  if($status==false){
    //execute（SQL実行時にエラーがある場合）
    $error = $statement->errorInfo();
    exit("ErrorQuery:".$error[2]);
  }else{
    while( $result = $statement->fetch(PDO::FETCH_ASSOC)){
      //ユーザー情報
      $user_info = getUserAll($result["user_id"]);
      $view .= '<tr id="message'.$result["id"].'">';
      $view .= '<!-- Message'.$result["id"].' -->';
      $view .= '<td class="view-message col-md-3"><a href="company_page.php?page=company_messages&box=msg&mid='.$result["id"].'">to '.$user_info["family_name"].'　'.$user_info["first_name"].'</a></td>';
      $view .= '<td class="view-message inbox-small-cells"></td>';
      $view .= '<td class="view-message col-md-7"><a href="company_page.php?page=company_messages&box=msg&mid='.$result["id"].'">'.mb_substr($result["message"], 0, 40).'…</a></td>';
      $view .= '<td class="view-message inbox-small-cells"></td>';
      $view .= '<td class="view-message col-md-2"><a href="company_page.php?page=company_messages&box=msg&mid='.$result["id"].'">'.$result["datetime"].'</a></td>';
      $view .= '</tr><!-- /Messege'.$result["id"].' -->';
    }
  }
  return $view;
}

?>
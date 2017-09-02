<?php
//セクションチェック
function sessChk(){
	if(!$_SESSION['sess_id']){
		header("Location: index.php");
		exit;
	}
}

//DB接続
function connectDb() {
	try {
		return new PDO(DSN, DB_USER, DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
	} catch (PDOException $e) {
		exit('データベースに接続できませんでした。'.$e->getMessage());
	}
}

//XSS対策
function escape($data) {
	if (is_array($data)) {//データが配列の場合
    return array_map("escape",$data);
  } else {//データが配列ではない場合
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
  }
}

//ユーザーか否か
function isSignin()
{
	if (!isset($_SESSION['user_id'])) {
		// 変数に値がセットされていない場合
		return false;
	} else {
		return true;
	}
}

//ユーザーID取得
function getUserId($email, $password, $db) {
	$sql = "SELECT id, lpw FROM user_table WHERE email = :email";
	$statement = $db->prepare($sql);
	$statement->bindValue(':email', $email, PDO::PARAM_STR);
	$statement->execute();
	$row = $statement->fetch();
	if (password_verify($password, $row['lpw'])) {
		return $row['id'];
	} else {
		return false;
	}
}

//ID指定でユーザーテーブルから全部取得()
function getUserAll() {
	$db = connectDb();
	$sql = "SELECT * FROM user_table WHERE id = :id";
	$statement = $db->prepare($sql);
	$statement->bindValue(':id', $_SESSION['user_id'], PDO::PARAM_INT);
	$statement->execute();
	$row = $statement->fetch();
	return $row;
}

?>

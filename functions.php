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

//スカウトか否か
function isSigninCompany()
{
	if (!isset($_SESSION['company_id'])) {
		// 変数に値がセットされていない場合
		return false;
	} else {
		return true;
	}
}

/************ user_table ************/

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

//ユーザーID指定でユーザーテーブルから全部取得()
function getUserAll($uid) {
	$db = connectDb();
	$sql = "SELECT * FROM user_table WHERE id = :id";
	$statement = $db->prepare($sql);
  $statement->bindValue(':id', $uid, PDO::PARAM_INT);
	$statement->execute();
	$row = $statement->fetch();
	return $row;
}

//新しく登録した順に指定件数分取得
function getUserInfo($num) {
  $db = connectDb();
  $sql = "SELECT * FROM user_table order by date desc limit :num";
  $statement = $db->prepare($sql);
  $statement->bindValue(':num', $num, PDO::PARAM_INT);
  $statement->execute();
  $row = $statement->fetchAll();
  return $row;
}


/************ company_table ************/

//会社ID取得
function getCompanyId($email, $password, $db) {
	$sql = "SELECT id, password FROM company_table WHERE email = :email";
	$statement = $db->prepare($sql);
	$statement->bindValue(':email', $email, PDO::PARAM_STR);
	$statement->execute();
	$row = $statement->fetch();
	if (password_verify($password, $row['password'])) {
		return $row['id'];
	} else {
		return false;
	}
}

//ログイン中の会社ID指定で会社テーブルから全部取得()
function getCompanyAll($cid) {
	$db = connectDb();
	$sql = "SELECT * FROM company_table WHERE id = :id";
	$statement = $db->prepare($sql);
  $statement->bindValue(':id', $cid, PDO::PARAM_INT);
	$statement->execute();
	$row = $statement->fetch();
	return $row;
}


/************ job_indev_table **************/
//jobIdから全て取得
function getJobInfoAll($jid) {
  $db = connectDb();
  $sql = "SELECT * FROM job_index_table WHERE id = :id";
  $statement = $db->prepare($sql);
  $statement->bindValue(':id', $jid, PDO::PARAM_INT);
  $statement->execute();
  $row = $statement->fetch();
  return $row;
}

//新着の情報取得
function getNewJobInfo($num) {
  $db = connectDb();
  $sql = "SELECT * FROM job_index_table order by date desc limit :num";
  $statement = $db->prepare($sql);
  $statement->bindValue(':num', $num, PDO::PARAM_INT);
  $statement->execute();
  $row = $statement->fetchAll();
  return $row;
}

//希望職種情報取得
function getFitJobInfo($desired) {
  $db = connectDb();
  $sql = "SELECT * FROM job_index_table WHERE job_sort = :desired";
  $statement = $db->prepare($sql);
  $statement->bindValue(':desired', $desired, PDO::PARAM_STR);
  $statement->execute();
  $row = $statement->fetchAll();
  return $row;
}
?>

<?php
require_once('init.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if ((isset($_POST['company_name']) && $_POST['company_name'] !== '') &&
			(isset($_POST['email']) && $_POST['email'] !== '') &&
			(isset($_POST['password']) && $_POST['password'] !== '')) {
		// 送信された値を変数に代入
		$company_name = $_POST['company_name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		// 接続関数を変数に代入
		$db = connectDb();
		$hash = password_hash($password, PASSWORD_DEFAULT);
		$sql = 'INSERT INTO company_table (id, company_name, email, password)
      VALUES (NULL, :company_name, :email, :password)';
		$statement = $db->prepare($sql);
		$statement->bindValue(':company_name', $company_name, PDO::PARAM_STR);
		$statement->bindValue(':email', $email, PDO::PARAM_STR);
		$statement->bindValue(':password', $hash, PDO::PARAM_STR);
		if($statement->execute()) {
			$_SESSION['company_name'] = $company_name;
			$_SESSION['sess_id'] = session_id();
			$company_url = "company_page.php";
      header("Location: {$company_url}");
			exit;
		} else {
			echo "登録に失敗しました。";
		}

	} else {
		echo "値が入力されていません";
	}
}
?>

	<!DOCTYPE html>
	<html lang="ja">

	<head>
		<meta charset="UTF-8">
		<title>Signup_DIRMA</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link href="./css/style.css" rel="stylesheet">
		<link href="./css/signin.css" rel="stylesheet">
    <link rel="shortcut icon" href="./img/dirma_favicon.ico">
	</head>

	<body>
		<div id="main" class="wrapper">
      <div class="column left-column">
        <div class="row">
          <div class="col-sm-6 col-md-push-3">
            <img src="./img/dirma_logo.png" class="logo img-responsive">
          </div>
        </div>
      </div>
      <div class="column right-column">
        <div class="row">
          <div class="col-sm-6 col-md-push-2">
            <div class="form-area">
    					<h1>会社登録</h1>
    					<!-- フォーム部分 -->
    					<form action="./signup_company.php" method="POST">
								<!-- 会社名 -->
    						<div class="form-group">
    							<label for="company_name" style="padding:0;">会社名</label>
    							<input type="text" class="form-control" id="company_name" name="company_name" required/>
    						</div>
    						<!-- メールアドレス -->
    						<div class="form-group">
    							<label for="email" style="padding:0;">メールアドレス</label>
    							<input type="email" class="form-control" id="email" name="email" required/>
    						</div>
    						<!-- パスワード -->
    						<div class="form-group">
    							<label for="password" style="padding:0;">パスワード</label>
    							<input type="password" class="form-control" id="password" name="password" placeholder="4文字以上8文字以下" required/>
    						</div>
    						<!-- 登録ボタン -->
    						<button type="submit" class="btn btn-primary" style="margin-left:3px;">登録</button>
    					</form>
    				</div>
          </div>
				</div>
			</div>
		</div>
	</body>

	</html>

<?php
require_once('init.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if ((isset($_POST['email']) && $_POST['email'] !== '') &&
			(isset($_POST['password']) && $_POST['password'] !== '')) {
		// 送信された値を変数に代入
		$email = $_POST['email'];
		$password = $_POST['password'];
		// 接続関数を変数に代入
		$db = connectDb();
		$hash = password_hash($password, PASSWORD_DEFAULT);
		$sql = 'INSERT INTO user_table (id, email, lpw, kanri_flg, date)
      VALUES (NULL, :email, :password, 0, time())';
		$statement = $db->prepare($sql);
		$statement->bindValue(':email', $email, PDO::PARAM_STR);
		$statement->bindValue(':password', $hash, PDO::PARAM_STR);
		if($statement->execute()) {
			$user_url = "user_page.php";
			header("Location: {$user_url}");
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
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
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
    					<h1>新規登録</h1>
    					<!-- フォーム部分 -->
    					<form action="./signup.php" method="POST">
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
    						<!-- 新規登録ボタン -->
    						<button type="submit" class="btn btn-primary" style="margin-left:3px;">新規登録</button>
    					</form>
							<br>
							<p>次のアカウントを使って登録できます
							<div class="social-buttons">
									<a href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
									<a href="#" class="btn btn-tw"><i class="fa fa-twitter"></i> Twitter</a>
							</div>
    					<!-- ログイン画面へのリンク -->
    					<p style="margin-top:5px;margin-left:3px;">ログインは<a href="./signin.php">こちら</a>から</p>
    				</div>
          </div>
				</div>
			</div>
		</div>
	</body>

	</html>

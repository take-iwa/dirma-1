<?php
require_once 'init.php';
if(isSigninCompany()) {
	header("Location: company_page.php");
	exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$error = '';
	$email = $_POST['email'];
	$password = $_POST['password'];
	$db = connectDb();
	if (!$company_id = getCompanyId($email, $password, $db)) {
		$error = 'パスワードとメールアドレスが正しくありません';
	} else if (empty($error)) {
		session_regenerate_id(true);
		$_SESSION['company_id'] = $company_id;
		$_SESSION['sess_id'] = session_id();
		$company_url = "company_page.php";
    header("Location: {$company_url}");
		exit;
	}
}
?>

  <!DOCTYPE html>
  <html lang="ja">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>signin - DIRMA</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="./css/style.css" rel="stylesheet">
    <link href="./css/signin.css" rel="stylesheet">
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
          <div class="col-sm-5 col-md-push-2">
            <div class="form-area">
              <h3>スカウト用サインイン</h3>
              <form action="signin_company.php" method="POST">
                <div class="form-group">
                  <label for="inputEmail" style="padding:0;">メールアドレス</label>
                  <input type="email" class="form-control" id="inputEmail" name="email">
                </div>
                <div class="form-group">
                  <label for="inputPassword" style="padding:0;">パスワード</label>
                  <input type="password" class="form-control" id="inputPassword" name="password">
                  <!-- エラーメッセージを表示する段落<p>を追記 -->
                  <p>
                    <?php if (isset($error)) { print escape($error); }?>
                  </p>
                </div>
                <button type="submit" class="btn btn-primary" style="margin-left:3px;">サインイン</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>

  </html>

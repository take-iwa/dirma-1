<?php
require_once 'init.php';

sessChk();
if(!isSignin()){
  header("Location: index.php");
  exit;
}

require_once './pages/user_init.php';
require_once './pages/message_sql.php';
require_once "./pages/head.php";

// ここでテンプレートファイルを読み込む。
include($include_file);

require_once "./pages/foot.php";

?>
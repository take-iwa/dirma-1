<?php
require_once 'init.php';

sessChk();
if(!isSigninCompany()){
  header("Location: index.php");
  exit;
}


require_once './pages/head.php';
require_once './pages/company_init.php';
require_once './pages/message_sql.php';

require_once './pages/company_nav_start.php';

// ここでテンプレートファイルを読み込む。
include($include_file);

require_once './pages/company_nav_end.php';

require_once './pages/foot.php';

?>
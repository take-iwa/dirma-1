<?php
require_once 'init.php';

sessChk();

require_once './pages/admin_init.php';
require_once "./pages/head.php";

// ここでテンプレートファイルを読み込む。
include($include_file);

require_once "./pages/foot.php";

?>
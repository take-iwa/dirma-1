<?php
// GETのパラメータで指定されたファイル名がpagesのフォルダ内にあるかを調べる（セキュリティ対策用）
$file_exists = file_exists("./pages/{$_GET['page']}.php");

// GETのパラメータでpageがない場合 or 指定されたファイルが存在しない場合はリダイレクト
if (empty($_GET['page']) || $file_exists == false ) {
  header('Location: admin.php?page=admin_dashboard');
}
// GETのパラメータ（?page=hogehoge）で指定されたファイルを自動的に読み込む為のスクリプト
$include_file = "./pages/{$_GET['page']}.php";

?>
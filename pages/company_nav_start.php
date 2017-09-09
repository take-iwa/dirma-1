<?php
$unread = getCountUnreadToCompany($_SESSION['company_id']);
?>
  <div class="container main-area">
    <ul class="nav nav-tabs" role="tablist">
      <li role="presentation" class="<?=$_GET['page'] == 'company_mypage' ? 'active' : ''?>"><a href="company_page.php?page=company_mypage"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> 検索</a></li>
      <li role="presentation" class="<?=$_GET['page'] == 'company_messages' ? 'active' : ''?>"><a href="company_page.php?page=company_messages&box=inbox"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> メッセージ　<?=$unread != 0 ? '<span class="badge">'.$unread.'</span>' : ''?></a></li>
    </ul>
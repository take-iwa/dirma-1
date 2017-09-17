<?php
?>

<div class="container" role="main">

  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation"><a href="admin.php?page=admin_dashboard"><span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span> ダッシュボード</a></li>
    <li role="presentation"><a href="admin.php?page=admin_users"><span class="glyphicon glyphicon-tower" aria-hidden="true"></span> ユーザー管理<span class="badge"></span></a></li>
    <li role="presentation"><a href="admin.php?page=admin_companies"><span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span> 企業管理</a></li>
    <li role="presentation" class="active"><a href="admin.php?page=admin_jobinfo"><span class="glyphicon glyphicon-tags" aria-hidden="true"></span> 求人情報管理</a></li>
    <li role="presentation"><a href="admin.php?page=admin_config"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> 設定</a></li>
  </ul>

  <div class="page-header">
    <h4>求人情報リストリスト</h4>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <table class="table">
        <thead>
          <tr>
            <th>企業</th>
            <th>要綱</th>
            <th>掲載日</th>
            <th>編集</th>
            <th>レコメンド</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><a href="#">ファーストリテイリング</a></td>
            <td><a href="#">いくつか項目</a></td>
            <td><a href="#">日付</a></td>
            <td><a href="#"><button type="button" class="btn btn-primary">編集</button></a></td>
            <td><a href="#"><button type="button" class="btn btn-info">レコメンド</button></a></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

</div>
<!-- /container -->

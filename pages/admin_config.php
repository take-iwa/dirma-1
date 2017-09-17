<?php
?>

<div class="container" role="main">

  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation"><a href="admin.php?page=admin_dashboard"><span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span> ダッシュボード</a></li>
    <li role="presentation"><a href="admin.php?page=admin_users"><span class="glyphicon glyphicon-tower" aria-hidden="true"></span> ユーザー管理<span class="badge"></span></a></li>
    <li role="presentation"><a href="admin.php?page=admin_companies"><span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span> 企業管理</a></li>
    <li role="presentation"><a href="admin.php?page=admin_jobinfo"><span class="glyphicon glyphicon-tags" aria-hidden="true"></span> 求人情報管理</a></li>
    <li role="presentation" class="active"><a href="admin.php?page=admin_config"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> 設定</a></li>
  </ul>

  <div class="page-header">
    <h4>設定リスト</h4>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <table class="table">
        <thead>
          <tr>
            <th>項目名</th>
            <th>設定内容</th>
            <th>変更</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><a href="#">お知らせ</a></td>
            <td><a href="#">最新の設定内容</a></td>
            <td><a href="#"><button type="button" class="btn btn-primary">変更</button></a></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

</div>
<!-- /container -->

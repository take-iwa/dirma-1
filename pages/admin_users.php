<?php
?>

<div class="container" role="main">

  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation"><a href="admin.php?page=admin_dashboard"><span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span> ダッシュボード</a></li>
    <li role="presentation" class="active"><a href="#"><span class="glyphicon glyphicon-tower" aria-hidden="true"></span> ユーザー管理<span class="badge"></span></a></li>
    <li role="presentation"><a href="admin.php?page=admin_companies"><span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span> 企業管理</a></li>
    <li role="presentation"><a href="admin.php?page=admin_jobinfo"><span class="glyphicon glyphicon-tags" aria-hidden="true"></span> 求人情報管理</a></li>
    <li role="presentation"><a href="admin.php?page=admin_config"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> 設定</a></li>
  </ul>

  <div class="page-header">
    <h4>ユーザーリスト</h4>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <table class="table">
        <thead>
          <tr>
            <th>名前</th>
            <th>年齢</th>
            <th>現職</th>
            <th>希望</th>
            <th>編集</th>
            <th>メッセージ</th>
            <th>レコメンド</th>
            <th>ブロック</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><a href="#">名前</a></td>
            <td><a href="#">年齢</a></td>
            <td><a href="#">現職内容</a></td>
            <td><a href="#">希望内容</a></td>
            <td><a href="#"><button type="button" class="btn btn-primary">編集</button></a></td>
            <td><a href="#"><button type="button" class="btn btn-success">メッセージ</button></a></td>
            <td><a href="#"><button type="button" class="btn btn-info">レコメンド</button></a></td>
            <td><a href="#"><button type="button" class="btn btn-danger">ブロック</button></a></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

</div>
<!-- /container -->

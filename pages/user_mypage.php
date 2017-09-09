<?php
$user_info = getUserAll($_SESSION['user_id']);
?>

<div class="container" role="main">

  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> ダッシュボード</a></li>
    <li role="presentation"><a href="user_page.php?page=user_messages&box=inbox"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> メッセージ　<span class="badge"></span></a></li>
    <li role="presentation"><a href="./search.php"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> 求人検索</a></li>
    <li role="presentation"><a href="user_page.php?page=user_profile"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> プロフィール</a></li>
  </ul>

  <div class="alert alert-success hidden" role="alert">
    <strong>Well done!</strong> You successfully read this important alert message.
  </div>
  <div class="alert alert-info hidden" role="alert">
    <strong>Heads up!</strong> This alert needs your attention, but it's not super important.
  </div>
  <div class="alert alert-warning hidden" role="alert">
    <strong>Warning!</strong> Best check yo self, you're not looking too good.
  </div>
  <div class="alert alert-danger hidden" role="alert">
    <strong>Oh snap!</strong> Change a few things up and try submitting again.
  </div>

  <div class="page-header">
    <h4>オススメ新着求人情報</h4>
  </div>

  <div class="row row-margin">
      <div class="col-sm-5 lib-item" data-category="view">
          <div class="lib-panel">
              <div class="row box-shadow">
                  <div class="col-md-6">
                      <img class="lib-img-show" src="http://lorempixel.com/850/850/?random=123">
                  </div>
                  <div class="col-md-6">
                      <div class="lib-row lib-header">
                          Example library
                          <div class="lib-header-seperator"></div>
                      </div>
                      <div class="lib-row lib-desc">
                          Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-md-1"></div>
      <div class="col-sm-5 lib-item" data-category="ui">
          <div class="lib-panel">
              <div class="row box-shadow">
                  <div class="col-md-6">
                      <img class="lib-img" src="http://lorempixel.com/850/850/?random=689">
                  </div>
                  <div class="col-md-6">
                      <div class="lib-row lib-header">
                          Example library
                          <div class="lib-header-seperator"></div>
                      </div>
                      <div class="lib-row lib-desc">
                          Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <div class="page-header">
    <h4>DIRMAからのおすすめ</h4>
  </div>

  <div class="row row-margin">
      <div class="col-sm-5 lib-item" data-category="view">
          <div class="lib-panel">
              <div class="row box-shadow">
                  <div class="col-md-6">
                      <img class="lib-img-show" src="http://lorempixel.com/850/850/?random=135">
                  </div>
                  <div class="col-md-6">
                      <div class="lib-row lib-header">
                          Example library
                          <div class="lib-header-seperator"></div>
                      </div>
                      <div class="lib-row lib-desc">
                          Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-md-1"></div>
      <div class="col-sm-5 lib-item" data-category="ui">
          <div class="lib-panel">
              <div class="row box-shadow">
                  <div class="col-md-6">
                      <img class="lib-img" src="http://lorempixel.com/850/850/?random=345">
                  </div>
                  <div class="col-md-6">
                      <div class="lib-row lib-header">
                          Example library
                          <div class="lib-header-seperator"></div>
                      </div>
                      <div class="lib-row lib-desc">
                          Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <div class="page-header">
    <h4>企業からのいいね！</h4>
  </div>
  <div class="row">
    <div class="col-sm-10 col-md-push-1">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><span class="glyphicon glyphicon-thumbs-up"></span></td>
            <td>ファーストリテイリング</td>
            <td><a href="https://www.fastretailing.com/employment/ja/fastretailing/jp/career/">募集職種一覧</a></td>
            <td><a href="http://www.fastretailing.com/jp/">ホームページ</a></td>
          </tr>
          <tr>
            <td><span class="glyphicon glyphicon-thumbs-up"></span></td>
            <td>Sony</td>
            <td>Thornton</td>
            <td>@fat</td>
          </tr>
          <tr>
            <td><span class="glyphicon glyphicon-thumbs-up"></span></td>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

</div> <!-- /container -->


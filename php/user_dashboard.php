<?php
require_once 'init.php';
sessChk();

?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DIRMA - ダッシュボード</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" id="themesid">
    <link href="../css/user.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>

  <body role="document">

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <h3 hidden>DIRMA</h3>
          <img src="../img/dirma_logo.png" class="logo img-responsive" style="width:5em;margin-left:1em;padding:2px 0">
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li id="dashboard" data-toggle="popover" data-content="ダッシュボード"><a href="user_dashboard.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
            <li id="notification" data-toggle="popover" data-content="お知らせ"><a href="#"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span></a></li>
            <li id="signout" data-toggle="popover" data-content="ログアウト"><a href="signout.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container" role="main">

      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> ダッシュボード</a></li>
        <li role="presentation"><a href="user_messages.php"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> メッセージ　<span class="badge">3</span></a></li>
        <li role="presentation"><a href="search.php"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> 求人検索</a></li>
        <li role="presentation"><a href="user_profile.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> プロフィール</a></li>
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
                            <img class="lib-img" src="http://lorempixel.com/850/850/?random=456">
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
        <h4>新着メッセージ</h4>
      </div>
      <div class="row">
        <div class="col-sm-10 col-md-push-1">
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Username</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
              </tr>
              <tr>
                <td>2</td>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
              </tr>
              <tr>
                <td>3</td>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

    </div> <!-- /container -->

    <footer class="footer">
        <div class="container">
            <ul class="nav navbar-nav">
                <li><a href="#about">運営会社</a></li>
                <li><a href="#about">利用規約</a></li>
                <li><a href="#contact">プライバシーポリシー</a></li>
                <li><a href="#contact">お問い合わせ</a></li>
            </ul>
        </div>
        <small class="text-muted">Copyright Dirma, Inc.</small>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  </body>
</html>

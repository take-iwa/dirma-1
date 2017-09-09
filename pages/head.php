<?php


?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DIRMA</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" id="themesid">
    <link href="./css/user.css" rel="stylesheet">
    <!--link href="./css/company.css" rel="stylesheet"-->
    <link href="./css/message.css" rel="stylesheet">
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
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
          <a href="./"><img src="./img/dirma_logo.png" class="logo img-responsive" style="width:5em;margin-left:1em;padding:2px 0"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li id="dashboard" data-toggle="popover" data-content="ホーム"><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
            <li id="notification" data-toggle="popover" data-content="お知らせ"><a href="#"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span></a></li>
            <li id="signout" data-toggle="popover" data-content="ログアウト"><a href="signout.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
<?php
require_once 'init.php';
sessChk();

$company_info = getCompanyAll();

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
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
    <link href="../css/company.css" rel="stylesheet">
    <link href="../css/user.css" rel="stylesheet">
    <link href="../css/message.css" rel="stylesheet">
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
            <li id="dashboard" data-toggle="popover" data-content="ダッシュボード"><a href="company_dashbpard.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
            <li id="notification" data-toggle="popover" data-content="お知らせ"><a href="#about"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span></a></li>
            <li id="signout" data-toggle="popover" data-content="ログアウト"><a href="signout.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div>
        <div class="container main-area">
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> 検索</a></li>
            <li role="presentation"><a href="company_messages.php"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> メッセージ　<span class="badge">3</span></a></li>
          </ul>

            <div class="container" id="tourpackages-carousel">
                <div class="row">
                    <div class="col-lg-12"><h1>My Card <a class="btn icon-btn btn-primary pull-right" href="#"><span class="glyphicon btn-glyphicon glyphicon-plus img-circle"></span> Add New Card</a></h1></div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <div class="thumbnail">
                            <div class="caption">
                                <div class='col-lg-12'>
                                    <span class="glyphicon glyphicon-credit-card"></span>
                                    <span class="glyphicon glyphicon-trash pull-right text-primary"></span>
                                </div>
                                <div class='col-lg-12 well well-add-card'>
                                    <h4>John Deo Mobilel</h4>
                                </div>
                                <div class='col-lg-12'>
                                    <p>4111xxxxxxxx3265</p>
                                    <p class"text-muted">Exp: 12-08</p>
                                </div>
                                <button type="button" class="btn btn-primary btn-xs btn-update btn-add-card">Update</button>
                                <button type="button" class="btn btn-danger btn-xs btn-update btn-add-card">Vrify Now</button>
                                <span class='glyphicon glyphicon-exclamation-sign text-danger pull-right icon-style'></span>
                            </div>
                          </div>
                    </div>

                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                      <div class="thumbnail">
                          <div class="caption">
                            <div class='col-lg-12'>
                                <span class="glyphicon glyphicon-credit-card"></span>
                                <span class="glyphicon glyphicon-trash pull-right text-primary"></span>
                            </div>
                            <div class='col-lg-12 well well-add-card'>
                                <h4>John Deo Mobilel</h4>
                            </div>
                            <div class='col-lg-12'>
                                <p>4111xxxxxxxx3265</p>
                                <p class"text-muted">Exp: 12-08</p>
                            </div>
                            <button type="button" class="btn btn-primary btn-xs btn-update btn-add-card">Update</button>
                        </div>
                      </div>
                    </div>

                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                      <div class="thumbnail">
                          <div class="caption">
                            <div class='col-lg-12'>
                                <span class="glyphicon glyphicon-credit-card"></span>
                                <span class="glyphicon glyphicon-trash pull-right text-primary"></span>
                            </div>
                            <div class='col-lg-12 well well-add-card'>
                                <h4>John Deo Mobilel</h4>
                            </div>
                            <div class='col-lg-12'>
                                <p>4111xxxxxxxx3265</p>
                                <p class"text-muted">Exp: 12-08</p>
                            </div>
                            <button type="button" class="btn btn-primary btn-xs btn-update btn-add-card">Update</button>
                        </div>
                      </div>
                    </div>

                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                      <div class="thumbnail">
                          <div class="caption">
                            <div class='col-lg-12'>
                                <span class="glyphicon glyphicon-credit-card"></span>
                                <span class="glyphicon glyphicon-trash pull-right text-primary"></span>
                            </div>
                            <div class='col-lg-12 well well-add-card'>
                                <h4>John Deo Mobilel</h4>
                            </div>
                            <div class='col-lg-12'>
                                <p>4111xxxxxxxx3265</p>
                                <p class"text-muted">Exp: 12-08</p>
                            </div>
                            <button type="button" class="btn btn-primary btn-xs btn-update btn-add-card">Update</button>
                        </div>
                      </div>
                    </div>

                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                      <div class="thumbnail">
                          <div class="caption">
                            <div class='col-lg-12'>
                                <span class="glyphicon glyphicon-credit-card"></span>
                                <span class="glyphicon glyphicon-trash pull-right text-primary"></span>
                            </div>
                            <div class='col-lg-12 well well-add-card'>
                                <h4>John Deo Mobilel</h4>
                            </div>
                            <div class='col-lg-12'>
                                <p>4111xxxxxxxx3265</p>
                                <p class"text-muted">Exp: 12-08</p>
                            </div>
                            <button type="button" class="btn btn-primary btn-xs btn-update btn-add-card">Update</button>
                             <button type="button" class="btn btn-danger btn-xs btn-update btn-add-card">Vrify Now</button>
                             <span class='glyphicon glyphicon-exclamation-sign text-danger pull-right icon-style'></span>
                        </div>
                      </div>
                    </div>

                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <div class="thumbnail">
                            <div class="caption">
                                <div class='col-lg-12'>
                                    <span class="glyphicon glyphicon-credit-card"></span>
                                    <span class="glyphicon glyphicon-trash pull-right text-primary"></span>
                                </div>
                                <div class='col-lg-12 well well-add-card'>
                                    <h4>John Deo Mobilel</h4>
                                </div>
                                <div class='col-lg-12'>
                                    <p>4111xxxxxxxx3265</p>
                                    <p class"text-muted">Exp: 12-08</p>
                                </div>
                                <button type="button" class="btn btn-primary btn-xs btn-update btn-add-card">Update</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12"><a href="#">View Deleted Cards</a></div>
                </div><!-- End row -->
            </div><!-- End container -->
        </div> <!-- /container -->
    </div>

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
    <script src="https://getbootstrap.com/assets/js/docs.min.js"></script>
    <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>

  </body>
</html>

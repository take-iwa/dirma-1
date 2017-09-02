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

    <title>DIRMA - メッセージ</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" id="themesid">
    <link href="../css/user.css" rel="stylesheet">
    <link href="../css/message.css" rel="stylesheet">
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
          <img src="../img/dirma_logo.png" class="logo img-responsive" style="width:5em;margin-left:1em;padding:2px 0">
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li id="dashboard" data-toggle="popover" data-content="ダッシュボード"><a href="company_dashboard.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
            <li id="notification" data-toggle="popover" data-content="お知らせ"><a href="#"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span></a></li>
            <li id="signout" data-toggle="popover" data-content="ログアウト"><a href="signout.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div>
        <div class="container mail-area">
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation"><a href="company_dashboard.php"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> 検索</a></li>
            <li role="presentation" class="active"><a href="#"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> メッセージ　<span class="badge">3</span></a></li>
          </ul>

          <div class="mail-box">
            <!--
              <aside class="sm-side">
                  <div class="user-head">
                      <div class="user-name">
                          <h5><a href="#">iwankov さま</a></h5>
                          <span><a href="#">OOOXXX@gmail.com</a></span>
                      </div>
                  </div>
                  <ul class="inbox-nav inbox-divider">
                      <li class="active">
                          <a href="#"><i class="fa fa-inbox"></i> Inbox <span class="label label-danger pull-right">2</span></a>
                      </li>
                      <li>
                          <a href="#"><i class="fa fa-envelope-o"></i> Sent Mail</a>
                      </li>
                      <li>
                          <a href="#"><i class=" fa fa-external-link"></i> Drafts <span class="label label-info pull-right">30</span></a>
                      </li>
                      <li>
                          <a href="#"><i class=" fa fa-trash-o"></i> Trash</a>
                      </li>
                  </ul>
                  <ul class="nav nav-pills nav-stacked labels-info inbox-divider">
                      <li> <h4>Labels</h4> </li>
                      <li> <a href="#"> <i class=" fa fa-sign-blank text-danger"></i> Work </a> </li>
                      <li> <a href="#"> <i class=" fa fa-sign-blank text-success"></i> Design </a> </li>
                      <li> <a href="#"> <i class=" fa fa-sign-blank text-info "></i> Family </a>
                      </li><li> <a href="#"> <i class=" fa fa-sign-blank text-warning "></i> Friends </a>
                      </li><li> <a href="#"> <i class=" fa fa-sign-blank text-primary "></i> Office </a>
                      </li>
                  </ul>
              </aside>
            -->
              <aside class="lg-side">
                  <div class="inbox-head">
                      <h4><?=$company_info["company_name"]?> さま</h4>
                      <form action="#" class="pull-right position">
                          <div class="input-append">
                              <input type="text" class="sr-input" placeholder="Search Mail">
                              <button class="btn sr-btn" type="button"><i class="fa fa-search"></i></button>
                          </div>
                      </form>
                  </div>
                  <div class="inbox-body">
                     <div class="mail-option">
                         <div class="chk-all">
                             <input type="checkbox" class="mail-checkbox mail-group-checkbox">
                             <div class="btn-group">
                                 <a data-toggle="dropdown" href="#" class="btn mini all" aria-expanded="false">
                                     All
                                     <i class="fa fa-angle-down "></i>
                                 </a>
                                 <ul class="dropdown-menu">
                                     <li><a href="#"> None</a></li>
                                     <li><a href="#"> Read</a></li>
                                     <li><a href="#"> Unread</a></li>
                                 </ul>
                             </div>
                         </div>

                         <div class="btn-group">
                             <a data-original-title="Refresh" data-placement="top" data-toggle="dropdown" href="#" class="btn mini tooltips">
                                 <i class=" fa fa-refresh"></i>
                             </a>
                         </div>

                         <ul class="unstyled inbox-pagination">
                             <li><span>1-50 of 234</span></li>
                             <li>
                                 <a class="np-btn" href="#"><i class="fa fa-angle-left  pagination-left"></i></a>
                             </li>
                             <li>
                                 <a class="np-btn" href="#"><i class="fa fa-angle-right pagination-right"></i></a>
                             </li>
                         </ul>
                     </div>
                      <table class="table table-inbox table-hover">
                        <tbody>
                          <tr class="unread">
                              <td class="inbox-small-cells">
                                  <input type="checkbox" class="mail-checkbox">
                              </td>
                              <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
                              <td class="view-message  dont-show">PHPClass</td>
                              <td class="view-message ">Added a new class: Login Class Fast Site</td>
                              <td class="view-message  inbox-small-cells"><i class="fa fa-paperclip"></i></td>
                              <td class="view-message  text-right">9:27 AM</td>
                          </tr>
                          <tr class="unread">
                              <td class="inbox-small-cells">
                                  <input type="checkbox" class="mail-checkbox">
                              </td>
                              <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
                              <td class="view-message dont-show">Google Webmaster </td>
                              <td class="view-message">Improve the search presence of WebSite</td>
                              <td class="view-message inbox-small-cells"></td>
                              <td class="view-message text-right">March 15</td>
                          </tr>
                          <tr class="">
                              <td class="inbox-small-cells">
                                  <input type="checkbox" class="mail-checkbox">
                              </td>
                              <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
                              <td class="view-message dont-show">JW Player</td>
                              <td class="view-message">Last Chance: Upgrade to Pro for </td>
                              <td class="view-message inbox-small-cells"></td>
                              <td class="view-message text-right">March 15</td>
                          </tr>
                          <tr class="">
                              <td class="inbox-small-cells">
                                  <input type="checkbox" class="mail-checkbox">
                              </td>
                              <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
                              <td class="view-message dont-show">Tim Reid, S P N</td>
                              <td class="view-message">Boost Your Website Traffic</td>
                              <td class="view-message inbox-small-cells"></td>
                              <td class="view-message text-right">April 01</td>
                          </tr>
                          <tr class="">
                              <td class="inbox-small-cells">
                                  <input type="checkbox" class="mail-checkbox">
                              </td>
                              <td class="inbox-small-cells"><i class="fa fa-star inbox-started"></i></td>
                              <td class="view-message dont-show">Freelancer.com <span class="label label-danger pull-right">urgent</span></td>
                              <td class="view-message">Stop wasting your visitors </td>
                              <td class="view-message inbox-small-cells"></td>
                              <td class="view-message text-right">May 23</td>
                          </tr>
                          <tr class="">
                              <td class="inbox-small-cells">
                                  <input type="checkbox" class="mail-checkbox">
                              </td>
                              <td class="inbox-small-cells"><i class="fa fa-star inbox-started"></i></td>
                              <td class="view-message dont-show">WOW Slider </td>
                              <td class="view-message">New WOW Slider v7.8 - 67% off</td>
                              <td class="view-message inbox-small-cells"><i class="fa fa-paperclip"></i></td>
                              <td class="view-message text-right">March 14</td>
                          </tr>
                          <tr class="">
                              <td class="inbox-small-cells">
                                  <input type="checkbox" class="mail-checkbox">
                              </td>
                              <td class="inbox-small-cells"><i class="fa fa-star inbox-started"></i></td>
                              <td class="view-message dont-show">LinkedIn Pulse</td>
                              <td class="view-message">The One Sign Your Co-Worker Will Stab</td>
                              <td class="view-message inbox-small-cells"><i class="fa fa-paperclip"></i></td>
                              <td class="view-message text-right">Feb 19</td>
                          </tr>
                          <tr class="">
                              <td class="inbox-small-cells">
                                  <input type="checkbox" class="mail-checkbox">
                              </td>
                              <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
                              <td class="view-message dont-show">Drupal Community<span class="label label-success pull-right">megazine</span></td>
                              <td class="view-message view-message">Welcome to the Drupal Community</td>
                              <td class="view-message inbox-small-cells"></td>
                              <td class="view-message text-right">March 04</td>
                          </tr>
                          <tr class="">
                              <td class="inbox-small-cells">
                                  <input type="checkbox" class="mail-checkbox">
                              </td>
                              <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
                              <td class="view-message dont-show">Facebook</td>
                              <td class="view-message view-message">Somebody requested a new password </td>
                              <td class="view-message inbox-small-cells"></td>
                              <td class="view-message text-right">June 13</td>
                          </tr>
                          <tr class="">
                              <td class="inbox-small-cells">
                                  <input type="checkbox" class="mail-checkbox">
                              </td>
                              <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
                              <td class="view-message dont-show">Skype <span class="label label-info pull-right">family</span></td>
                              <td class="view-message view-message">Password successfully changed</td>
                              <td class="view-message inbox-small-cells"></td>
                              <td class="view-message text-right">March 24</td>
                          </tr>
                          <tr class="">
                              <td class="inbox-small-cells">
                                  <input type="checkbox" class="mail-checkbox">
                              </td>
                              <td class="inbox-small-cells"><i class="fa fa-star inbox-started"></i></td>
                              <td class="view-message dont-show">Google+</td>
                              <td class="view-message">alireza, do you know</td>
                              <td class="view-message inbox-small-cells"></td>
                              <td class="view-message text-right">March 09</td>
                          </tr>
                          <tr class="">
                              <td class="inbox-small-cells">
                                  <input type="checkbox" class="mail-checkbox">
                              </td>
                              <td class="inbox-small-cells"><i class="fa fa-star inbox-started"></i></td>
                              <td class="dont-show">Zoosk </td>
                              <td class="view-message">7 new singles we think you'll like</td>
                              <td class="view-message inbox-small-cells"><i class="fa fa-paperclip"></i></td>
                              <td class="view-message text-right">May 14</td>
                          </tr>
                          <tr class="">
                              <td class="inbox-small-cells">
                                  <input type="checkbox" class="mail-checkbox">
                              </td>
                              <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
                              <td class="view-message dont-show">LinkedIn </td>
                              <td class="view-message">Alireza: Nokia Networks, System Group and </td>
                              <td class="view-message inbox-small-cells"><i class="fa fa-paperclip"></i></td>
                              <td class="view-message text-right">February 25</td>
                          </tr>
                      </tbody>
                    </table>
                  </div>
              </aside>
          </div>
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

  </body>
</html>

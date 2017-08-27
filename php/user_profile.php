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
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
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

          <h3>DIRMA</h3>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li id="dashboard" data-toggle="popover" data-content="ダッシュボード"><a href="#"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
            <li id="notification" data-toggle="popover" data-content="お知らせ"><a href="#about"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span></a></li>
            <li id="signout" data-toggle="popover" data-content="ログアウト"><a href="#contact"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div>
        <div class="container main-area">
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation"><a href="user_dashboard.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> ダッシュボード</a></li>
            <li role="presentation"><a href="user_messages.php"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> メッセージ　<span class="badge">3</span></a></li>
            <li role="presentation"><a href="search.php"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> 求人検索</a></li>
            <li role="presentation" class="active"><a href="#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> プロフィール</a></li>
          </ul>

          <div class="profile-area">
              <h3>プロフィール編集</h3>
              <div class="row">
                <!-- left column -->
                <div class="hidden-xs col-sm-4">
                    <div class="fading-side-menu" data-spy="affix" data-offset-top="350">
                        <h5>編集項目</h5><hr class="no-margin">
                        <ul class="list-unstyled">
                            <li>
                                <a href="#intro">
                                    <span class="fa fa-angle-double-right text-primary"></span> アカウント設定
                                </a>
                            </li>
                            <li>
                                <a href="#setting-up-our-page">
                                    <span class="fa fa-angle-double-right text-primary"></span> 基本情報
                                </a>
                            </li>
                            <li>
                                <a href="#getting-started">
                                    <span class="fa fa-angle-double-right text-primary"></span> 希望条件
                                </a>
                            </li>
                            <li>
                                <a href="#setting-up-our-page">
                                    <span class="fa fa-angle-double-right text-primary"></span> 職務経歴
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- edit form column -->
                <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
                    <div class="alert alert-info alert-dismissable" hidden>
                        <a class="panel-close close" data-dismiss="alert">×</a>
                        <i class="fa fa-coffee"></i>
                        This is an <strong>.alert</strong>. Use this to show important messages to the user.
                    </div>

                    <form class="form-horizontal" role="form">
                        <!-- Form Name -->
                        <legend>アカウント設定</legend>
                        <div class="form-group">
                            <label class="col-md-3 control-label">メールアドレス:</label>
                            <div class="col-md-6">
                                <input class="form-control" name="email" placeholder="" type="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">新しいパスワード:</label>
                            <div class="col-md-4">
                                <input class="form-control" name="password" placeholder="" type="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">パスワード確認:</label>
                            <div class="col-md-4">
                                <input class="form-control" name="repassword" placeholder="" type="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8">
                                <input class="btn btn-primary" value="更新" type="button">
                            </div>
                        </div>
                        <br>
                        <!-- Form Name -->
                        <legend>基本情報</legend>
                        <div class="form-group form-horizontal">
                            <label class="col-sm-3 control-label">氏名:</label>
                            <div class="col-sm-4">
                                <input class="form-control" name="family_name" placeholder="姓" type="text" style="display: inline-block;">
                            </div>
                            <div class="col-sm-4">
                                <input class="form-control" name="first_name" placeholder="名" type="text" style="display: inline-block;">
                            </div>
                        </div>
                        <div class="form-group form-horizontal">
                            <label class="col-sm-3 control-label">フリガナ:</label>
                            <div class="col-sm-4">
                                <input class="form-control" name="family_kana" placeholder="セイ" type="text" style="display: inline-block;">
                            </div>
                            <div class="col-sm-4">
                                <input class="form-control" name="first_kana" placeholder="メイ" type="text" style="display: inline-block;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">生年月日:</label>
                            <div class="col-md-4">
                                <input class="form-control" name="birthday" type="date">
                            </div>
                        </div>
                        <div class="form-group form-horizontal">
                            <label class="col-md-3 control-label" for="radios">性別:</label>
                            <div class="col-md-8">
                                <div class="radio">
                                    <label for="radios-0">
                                        <input type="radio" name="gender" id="radios-0" value="0" checked="checked">男性
                                    </label>
                                </div>
                                <div class="radio">
                                    <label for="radios-1">
                                        <input type="radio" name="gender" id="radios-1" value="1">女性
                                    </label>
                            	</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="zipcode" class="col-md-3 control-label">郵便番号:</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-addon">〒</span>
                                    <input type="text" name="zipcode" id="zipcode" class="form-control" placeholder="XXX0000">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pref" class="col-md-3 control-label">住所:</label>
                            <div class="col-md-4">
                                <select name="pref" id="pref" class="form-control">
                                    <option value="北海道">北海道</option>
                                    <option value="青森県">青森県</option>
                                    <option value="岩手県">岩手県</option>
                                    <option value="宮城県">宮城県</option>
                                    <option value="秋田県">秋田県</option>
                                    <option value="山形県">山形県</option>
                                    <option value="福島県">福島県</option>
                                    <option value="茨城県">茨城県</option>
                                    <option value="栃木県">栃木県</option>
                                    <option value="群馬県">群馬県</option>
                                    <option value="埼玉県">埼玉県</option>
                                    <option value="千葉県">千葉県</option>
                                    <option value="東京都">東京都</option>
                                    <option value="神奈川県">神奈川県</option>
                                    <option value="新潟県">新潟県</option>
                                    <option value="山梨県">山梨県</option>
                                    <option value="長野県">長野県</option>
                                    <option value="富山県">富山県</option>
                                    <option value="石川県">石川県</option>
                                    <option value="福井県">福井県</option>
                                    <option value="岐阜県">岐阜県</option>
                                    <option value="静岡県">静岡県</option>
                                    <option value="愛知県">愛知県</option>
                                    <option value="三重県">三重県</option>
                                    <option value="滋賀県">滋賀県</option>
                                    <option value="京都府">京都府</option>
                                    <option value="大阪府">大阪府</option>
                                    <option value="兵庫県">兵庫県</option>
                                    <option value="奈良県">奈良県</option>
                                    <option value="和歌山県">和歌山県</option>
                                    <option value="鳥取県">鳥取県</option>
                                    <option value="島根県">島根県</option>
                                    <option value="岡山県">岡山県</option>
                                    <option value="広島県">広島県</option>
                                    <option value="山口県">山口県</option>
                                    <option value="徳島県">徳島県</option>
                                    <option value="香川県">香川県</option>
                                    <option value="愛媛県">愛媛県</option>
                                    <option value="高知県">高知県</option>
                                    <option value="福岡県">福岡県</option>
                                    <option value="佐賀県">佐賀県</option>
                                    <option value="長崎県">長崎県</option>
                                    <option value="熊本県">熊本県</option>
                                    <option value="大分県">大分県</option>
                                    <option value="宮崎県">宮崎県</option>
                                    <option value="鹿児島県">鹿児島県</option>
                                    <option value="沖縄県">沖縄県</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-3">
                                <input type="text" name="addr1" id="addr1" class="form-control" placeholder="市区町村名">
                                <p class="help-block">住所は2つに分けてご記入ください。</p>
                                <input type="text" name="addr2" id="addr2" class="form-control" placeholder="番地 建物名">
                                <p class="help-block">番地・マンション名は必ず記入してください。</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tel" class="col-md-3 control-label">電話番号:</label>
                            <div class="col-md-4">
                                <input type="tel" name="tel1" id="tel1" class="form-control" placeholder="080XXXXOOOO">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-8">
                                <input class="btn btn-primary" value="更新" type="button">
                                <span></span>
                                <input class="btn btn-default" value="キャンセル" type="reset">
                            </div>
                        </div>
                    </form>
                </div>
              </div>
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

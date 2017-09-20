<?php
//include 'ChromePhp.php';

$user_info = getUserAll($_SESSION['user_id']);

//新着求人
$job_view = '';
$job_array = getNewJobInfo(2);
//ChromePhp::log($job_array);
//1件目
$job_view .= '<a href="'.'jobdetail/detail_fr_gubp.php'.'"><div id="'.$job_array[0]['id'].'" class="col-sm-5 lib-item" data-category="view"><div class="lib-panel"><div class="row box-shadow"><div class="col-md-6">';
$job_view .= '<img class="lib-img-show" src="'.'img/corp_logo/FAST_RETAILING_logo.png'.'">';
$job_view .= '</div><div class="col-md-6"><div class="lib-row lib-header"><h4>';
$job_view .= $job_array[0]['corporate'];
$job_view .= '</h4><div class="lib-header-seperator"></div></div><div class="lib-row lib-desc">';
$job_view .= '</p><p>ポジション：'.$job_array[0]['job_title'].'</p>';
$job_view .= '<p>勤務地：'.$job_array[0]['workplace'].'</p>';
$job_view .= '<p>想定年収：'.$job_array[0]['comp_min'].'~'.$job_array[0]['comp_max'].'万円</p>';
$job_view .= '<p>仕事内容：'.mb_substr($job_array[0]['job_contents'], 0, 30).'...</p>';
$job_view .= '</div></div></div></div></div></a>';
$job_view .= '<div class="col-md-1"></div>';
//2件目
$job_view .= '<a href="'.'jobdetail/detail_fr_gubp.php'.'"><div id="'.$job_array[1]['id'].'" class="col-sm-5 lib-item" data-category="ui"><div class="lib-panel"><div class="row box-shadow"><div class="col-md-6">';
$job_view .= '<img class="lib-img-show" src="'.'img/corp_logo/google_logo.png'.'">';
$job_view .= '</div><div class="col-md-6"><div class="lib-row lib-header"><h4>';
$job_view .= $job_array[1]['corporate'];
$job_view .= '</h4><div class="lib-header-seperator"></div></div><div class="lib-row lib-desc">';
$job_view .= '</p><p>ポジション：'.$job_array[1]['job_title'].'</p>';
$job_view .= '<p>勤務地：'.$job_array[1]['workplace'].'</p>';
$job_view .= '<p>想定年収：'.$job_array[1]['comp_min'].'~'.$job_array[1]['comp_max'].'万円</p>';
$job_view .= '<p>仕事内容：'.mb_substr($job_array[1]['job_contents'], 0, 30).'...</p>';
$job_view .= '</div></div></div></div></div></a>';

//おすすめ求人
$dirma_view = '<div class="alert alert-warning" role="alert">
    <a href="user_page.php?page=user_profile"><strong><big><span class="glyphicon glyphicon-hand-right"></span>　Dirmaからのオススメをご希望の場合は、プロフィールの記載をお願いいたします。</big></strong></a></div>';
if (!$user_info['desired_job'] ==""){
  $dirma_array = getFitJobInfo($user_info['desired_job']);
  //ChromePhp::log($user_info['desired_job']);
  //ChromePhp::log($dirma_array);
  //1件目
  $dirma_view = '<a href="'.'jobdetail/detail_fr_gubp.php'.'"><div id="'.$dirma_array[0]['id'].'" class="col-sm-5 lib-item" data-category="view"><div class="lib-panel"><div class="row box-shadow"><div class="col-md-6">';
  $dirma_view .= '<img class="lib-img-show" src="'.'img/corp_logo/softbank_logo.png'.'">';
  $dirma_view .= '</div><div class="col-md-6"><div class="lib-row lib-header"><h4>';
  $dirma_view .= $dirma_array[0]['corporate'];
  $dirma_view .= '</h4><div class="lib-header-seperator"></div></div><div class="lib-row lib-desc">';
  $dirma_view .= '</p><p>ポジション：'.$dirma_array[0]['job_title'].'</p>';
  $dirma_view .= '<p>勤務地：'.$dirma_array[0]['workplace'].'</p>';
  $dirma_view .= '<p>想定年収：'.$dirma_array[0]['comp_min'].'~'.$dirma_array[0]['comp_max'].'万円</p>';
  $dirma_view .= '<p>仕事内容：'.mb_substr($dirma_array[0]['job_contents'], 0, 30).'...</p>';
  $dirma_view .= '</div></div></div></div></div></a>';
  $dirma_view .= '<div class="col-md-1"></div>';
  //2件目
  $dirma_view .= '<a href="'.'jobdetail/detail_fr_gubp.php'.'"><div id="'.$dirma_array[1]['id'].'" class="col-sm-5 lib-item" data-category="ui"><div class="lib-panel"><div class="row box-shadow"><div class="col-md-6">';
  $dirma_view .= '<img class="lib-img-show" src="'.'img/corp_logo/google_logo.png'.'">';
  $dirma_view .= '</div><div class="col-md-6"><div class="lib-row lib-header"><h4>';
  $dirma_view .= $dirma_array[1]['corporate'];
  $dirma_view .= '</h4><div class="lib-header-seperator"></div></div><div class="lib-row lib-desc">';
  $dirma_view .= '</p><p>ポジション：'.$dirma_array[1]['job_title'].'</p>';
  $dirma_view .= '<p>勤務地：'.$dirma_array[1]['workplace'].'</p>';
  $dirma_view .= '<p>想定年収：'.$dirma_array[1]['comp_min'].'~'.$dirma_array[1]['comp_max'].'万円</p>';
  $dirma_view .= '<p>仕事内容：'.mb_substr($dirma_array[1]['job_contents'], 0, 30).'...</p>';
  $dirma_view .= '</div></div></div></div></div></a>';
}

?>

<div class="container" role="main">

  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> マイページ</a></li>
    <li role="presentation"><a href="user_page.php?page=user_messages&box=inbox"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> メッセージ<span class="badge"></span></a></li>
    <li role="presentation"><a href="user_page.php?page=user_jobinfo"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> 求人検索</a></li>
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
    <h4>新着求人情報</h4>
  </div>

  <div class="row row-margin">
    <?=$job_view?>
  </div>

  <div class="page-header">
    <h4>DIRMAからのおすすめ</h4>
  </div>
    
  <div class="row row-margin">
    <?=$dirma_view?>
  </div>
<!--
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
-->
</div> <!-- /container -->


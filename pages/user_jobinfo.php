<?php
$user_info = getUserAll($_SESSION['user_id']);

?>

<div class="container">
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation"><a href="user_page.php?page=user_mypage"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> マイページ</a></li>
    <li role="presentation"><a href="user_page.php?page=user_messages"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> メッセージ<span class="badge"></span></a></li>
    <li role="presentation" class="active"><a href="user_page.php?page=user_jobinfo"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> 求人検索</a></li>
    <li role="presentation"><a href="user_page.php?page=user_profile"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> プロフィール</a></li>
  </ul>

  <div class="page-header">
    <h4>求人情報</h4>
  </div>
  
  <div class="row">
    <div class="col-sm-5" style="margin-bottom:1em;">
      <input type="text" name="job">
      <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-search"></span> 検索</button>
    </div>
  </div>
  
  <div class="row">
    <div class="col-sm-5">  </div>
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
              JobInfo1
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
              JobInfo2
              <div class="lib-header-seperator"></div>
            </div>
            <div class="lib-row lib-desc">
              Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor
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
            <img class="lib-img" src="http://lorempixel.com/850/850/?random=156">
          </div>
          <div class="col-md-6">
            <div class="lib-row lib-header">
              JobInfo3
              <div class="lib-header-seperator"></div>
            </div>
            <div class="lib-row lib-desc">
              Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor
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
            <img class="lib-img" src="http://lorempixel.com/850/850/?random=387">
          </div>
          <div class="col-md-6">
            <div class="lib-row lib-header">
              JobInfo4
              <div class="lib-header-seperator"></div>
            </div>
            <div class="lib-row lib-desc">
              Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor
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
            <img class="lib-img" src="http://lorempixel.com/850/850/?random=498">
          </div>
          <div class="col-md-6">
            <div class="lib-row lib-header">
              JobInfo5
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

</div> <!-- /container -->

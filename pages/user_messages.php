<?php

$user_info = getUserAll($_SESSION['user_id']);

if( isset($_GET['box']) && $_GET['box'] !== ''){
  $box = $_GET['box'];
}else{
  $box = 'inbox';
}

?>

  <div class="container">
    <ul class="nav nav-tabs" role="tablist">
      <li role="presentation"><a href="user_page.php?page=user_mypage"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> マイページ</a></li>
      <li role="presentation" class="active"><a href="#"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> メッセージ<span class="badge"></span></a></li>
      <li role="presentation"><a href="search.php"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> 求人検索</a></li>
      <li role="presentation"><a href="user_page.php?page=user_profile"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> プロフィール</a></li>
    </ul>

    <div class="mail-box">

      <aside class="sm-side">
        <div class="user-head col-md-12">
          <div class="user-name">
            <?php if(isset($user_info["family_name"])): ?>
            <h5>
              <?=$user_info["family_name"]?> さま</h5>
            <?php else : ?>
            <h5>
              <?=$user_info["email"]?> さま</h5>
            <?php endif; ?>
          </div>
        </div>
        <ul class="inbox-nav inbox-divider">
          <li id="inbox" class="<?=$box == 'inbox' ? 'active' : ''?>">
            <a href="user_page.php?page=user_messages&box=inbox"><i class="fa fa-inbox"></i> Inbox <span class="label label-danger pull-right"></span></a>
          </li>
          <li id="sent" class="<?=$box == 'sent' ? 'active' : ''?>">
            <a href="user_page.php?page=user_messages&box=sent"><i class="fa fa-envelope"></i> Sent Messages </a>
          </li>
        </ul>
      </aside>

      <aside class="lg-side">
        <?php if( $box === 'inbox' || $box === 'sent' ) : ?>
        <div class="inbox-head col-md-10">
          <h4>
            <?=$box == 'inbox' ? 'Indox' : 'Sent Message'?>
          </h4>
          <!--
              <form action="#" class="pull-right position">
                  <div class="input-append">
                      <input type="text" class="sr-input" placeholder="Search Mail">
                      <button class="btn sr-btn" type="button"><i class="fa fa-search"></i></button>
                  </div>
              </form>
            -->
        </div>
        <div class="inbox-body col-md-10">
          <div class="mail-option">
            <div class="btn-group" hidden>
              <a data-original-title="Refresh" data-placement="top" href="#" class="btn mini tooltips">
                <i class=" fa fa-refresh"></i>
              </a>
            </div>

            <ul class="inbox-pagination">
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
              <!-- Inbox -->
              <?php
                if( $box === 'inbox' ) {
                  echo setViewInboxOfUser($_SESSION['user_id'], 0);
                }else{
                  echo setViewSentOfUser($_SESSION['user_id'], 0);
                }
              ?>
            </tbody>
          </table>
        </div>
        <?php elseif( $box === 'msg') :?>
        <?php
        $msg = getMessageAndMark($_GET['mid']);
        $company = getCompanyAll($msg['company_id']);
        ?>
        <div class="inbox-head">
          <h4>Message</h4>
        </div>
        <div class="inbox-body">
          <div class="row">
            <div class="col-md-12 col-sm-4">
              <div class="panel panel-default">
                <div class="panel-body">
                  <?php if( $msg['transmission'] == 0 ) :?>
                  <h4><span class="glyphicon glyphicon-user" aria-hidden="true"></span> from
                    <?=$company['company_name']?> さま</h4>
                  <?php else :?>
                  <h4><span class="glyphicon glyphicon-user" aria-hidden="true"></span> to
                    <?=$company['company_name']?> さま</h4>
                  <?php endif;?>
                  <p style="color:#888888"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> メッセージ：</p>
                  <p style="padding:0 20px 10px 20px;color:#888888;word-wrap: break-word;word-break: break-all">
                    <?=$msg['message']?>
                  </p>
                  <hr>
                  <p><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> メッセージ返信</p>
                  <form accept-charset="UTF-8" action="<?php setMessage();?>" method="POST">
                    <input type="text" name="user_id" value="<?=$msg['user_id']?>" hidden>
                    <input type="text" name="company_id" value="<?=$msg['company_id']?>" hidden>
                    <input type="text" name="reply_id" value="<?=$msg['id']?>" hidden>
                    <input type="text" name="transmission" value="1" hidden>
                    <textarea class="form-control counted" name="message" placeholder="Type in your message" rows="8" style="margin-bottom:10px;"></textarea>
                    <button class="btn btn-info" type="submit"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> メッセージを送る</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </aside>
    </div>
    <?php endif ; ?>
  <!-- /container -->

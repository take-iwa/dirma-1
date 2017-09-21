<?php
//include 'ChromePhp.php';
//会社情報、メッセージ数取得
$company_info = getCompanyAll($_SESSION['company_id']);
$count_message = getCountMessageToCompany($_SESSION['company_id']);
$countUnread = getCountUnreadToCompany($_SESSION['company_id']);

if( isset($_GET['box']) && $_GET['box'] !== ''){
  $box = $_GET['box'];
}else{
  $box = 'inbox';
}
//ChromePhp::log($company_info);
//ChromePhp::log($count_message);
//ChromePhp::log($countUnread);
?>


  <div class="mail-box">
    <aside class="sm-side">
      <div class="user-head col-md-12">
        <div class="user-name">
          <h5>
            <?=$company_info['company_name']?> さま</h5>
        </div>
      </div>
      <ul class="inbox-nav inbox-divider">
        <li id="inbox" class="<?=$box == 'inbox' ? 'active' : ''?>">
          <a href="company_page.php?page=company_messages&box=inbox"><i class="fa fa-inbox"></i> Inbox 
          <!-- <span class="label label-danger pull-right"><?= $countUnread !== 0 ? $countUnread : "" ?></span> -->
        </a>
        </li>
        <li id="sent" class="<?=$box == 'sent' ? 'active' : ''?>">
          <a href="company_page.php?page=company_messages&box=sent"><i class="fa fa-envelope"></i> Sent </a>
        </li>
      </ul>
    </aside>
    <aside class="lg-side">
      <?php if( $box === 'inbox' || $box === 'sent' ) : ?>
      <div class="inbox-head">
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
      <div class="inbox-body">
        <div class="mail-option">
          <?php if( $box === 'inbox' ) : ?>
          <span>1-<?=getCountMessageToCompany($_SESSION['company_id'])?></span>
          <?php else : ?>
          <span>1-<?=getCountMessageFromCompany($_SESSION['company_id'])?></span>
          <?php endif; ?>
        </div>
        <table class="table table-inbox table-hover">
          <tbody>
            <!-- Inbox -->
            <?php
              if( $box === 'inbox' ) {
                echo setViewInboxOfCompany($_SESSION['company_id'], 0);
              }else{
                echo setViewSentOfCompany($_SESSION['company_id'], 0);
              }
            ?>
          </tbody>
        </table>
      </div>
      <?php elseif( $box === 'msg') :?>
      <?php
          $msg = getMessageAndMark($_GET['mid']);
          $user = getUserAll($msg['user_id']);
        ?>
        <div class="inbox-head ">
          <h4>Message</h4>
        </div>
        <div class="inbox-body">
          <div class="row">
            <div class="col-md-12 col-sm-4">
              <div class="panel panel-default">
                <div class="panel-body">
                  <?php if( $msg['transmission'] == 1 ) :?>
                  <h4><span class="glyphicon glyphicon-user" aria-hidden="true"></span> from
                    <?=$user['family_name']?> さま</h4>
                  <?php else :?>
                  <h4><span class="glyphicon glyphicon-user" aria-hidden="true"></span> to
                    <?=$user['family_name']?> さま</h4>
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
                    <input type="text" name="transmission" value="0" hidden>
                    <textarea class="form-control counted" name="message" placeholder="Type in your message" rows="8" style="margin-bottom:10px;"></textarea>
                    <button class="btn btn-info" type="submit"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> メッセージを送る</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php elseif( $box === 'nice') :?>
      <?php 
      $user = getUserAll($_GET['uid']);
      ?>
      <div class="inbox-head ">
        <h4>Message</h4>
      </div>
      <div class="inbox-body">
        <div class="row">
          <div class="col-md-12 col-sm-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <h4><span class="glyphicon glyphicon-user" aria-hidden="true"></span> to
                  <?=$user['family_name']?> さま</h4>
                <hr>
                <p><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> メッセージをお書き下さい</p>
                <form accept-charset="UTF-8" action="<?php setMessage();?>" method="POST">
                  <input type="text" name="user_id" value="<?=$user['id']?>" hidden>
                  <input type="text" name="company_id" value="<?=$company_info['id']?>" hidden>
                  <input type="text" name="reply_id" value="0" hidden>
                  <input type="text" name="transmission" value="0" hidden>
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

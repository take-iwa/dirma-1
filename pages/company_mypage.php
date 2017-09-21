<?php
//include 'ChromePhp.php';
$company_info = getCompanyAll($_SESSION['company_id']);

$user_view = '';
$user_array = getUserInfo(30);
//ChromePhp::log($user_array);
foreach($user_array as $key => $value){
  //ChromePhp::log($value);
  if($value['desired_detail'] != ""){
    $user_view .= '<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <div class="thumbnail">
                      <div class="caption">
                        <div class="col-lg-12">
                          <span class="glyphicon glyphicon glyphicon-user"></span>
                        </div>
                        <div class="col-lg-12 well well-add-card">';
    $user_view .= '<h4>'.$value['family_name'].' '.$value['first_name'].'( '.$value['family_kana'].' '.$value['first_kana'].' )</h4>
                        </div>';
    $user_view .= '<div class="col-lg-12">
                    <p class="text-muted">生年月日：'.$value['birthday'].'</p>
                    <p class="text-muted">直近の勤め先：'.$value['company'].'</p>
                    <p class="text-muted">勤続：'.$value['year'].'年</p>
                    <p class="text-muted">希望職種：'.$value['desired_job'].'</p>
                    <p class="text-muted">希望職種詳細：'.$value['desired_detail'].'</p>
                    <p class="text-muted">希望年収：'.$value['desired_income'].'万円</p>
                    <p class="text-muted">希望勤務地：'.$value['desired_region'].'</p>
                  </div>
                  <a href="company_page.php?page=company_messages&box=nice&uid='.$value['id'].'"><button type="button" class="btn btn-primary btn-xs btn-update btn-add-card">メッセージを送る</button></a>
                  </div></div></div>';
  }
}

?>
<div id="tourpackages-carousel">
  <div class="row">
    <div class="col-lg-12">
      <h1>転職希望者検索</h1>
    </div><br>
    <?=$user_view ?>
  
  <!-- End row -->
</div>
<!-- End container -->


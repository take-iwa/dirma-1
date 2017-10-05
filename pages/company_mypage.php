<?php
//include 'ChromePhp.php';
$company_info = getCompanyAll($_SESSION['company_id']);

$user_view = '';
$user_array = getUserInfo(30);
//ChromePhp::log($user_array);
foreach($user_array as $key => $value){
  if($value['desired_detail'] != ""){
    $user_view .= '<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <div class="thumbnail">
                      <div class="caption">
                        <div class="col-lg-12">
                          <img class="img-circle" src="'.$value['img'].'" style="width: 50px;hight:auto;margin:0;">
                        </div>
                        <div class="col-lg-12 well well-add-card">';
    $user_view .= '<h4 style="padding:5px 0">'.$value['family_name'].' '.$value['first_name'].'( '.$value['family_kana'].' '.$value['first_kana'].' )</h4>
                        </div>';
    $user_view .= '<div class="col-lg-12">
                    <p class="text-muted">生年月日：'.$value['birthday'].'</p>
                    <p class="text-muted">直近の勤め先：'.$value['company'].'</p>
                    <p class="text-muted">職種詳細：'.$value['job_detail'].'</p>
                    <p class="text-muted">在籍年数：'.$value['year'].'年</p>
                    <p class="text-muted">最終学歴：'.$value['school'].'　'.$value['department'].'</p>
                  </div>
                  <a href="company_page.php?page=company_messages&box=nice&uid='.$value['id'].'"><button type="button" class="btn btn-primary btn-xs btn-update btn-add-card">メッセージを送る</button></a>
                  <button type="button" class="btn btn-primary btn-xs btn-update btn-add-card" data-toggle="modal" data-target="#profile'.$value['id'].'">　　詳細　　</button>
                  <!-- モーダルウィンドウの中身 -->
                  <div class="modal fade" id="profile'.$value['id'].'">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header modal-header-title">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" style="font-weight:700;">'.$value['family_name'].' '.$value['first_name'].'( '.$value['family_kana'].' '.$value['first_kana'].' )</h4>
                        </div>
                        <div class="modal-body">
                          <img class="img-circle" src="'.$value['img'].'" style="width: 180px;hight:auto;">
                        </div>
                          <table class="table table-user-information">
                            <tbody>
                              <tr>
                                <td style="width: 85px;">性別:</td>
                                <td>'.(( $value["gender"] == 0) ? "男性" : "女性").'</td>
                              </tr>
                              <tr>
                                <td style="width: 85px;">生年月日:</td>
                                <td>'.$value['birthday'].'</td>
                              </tr>
                              <tr>
                                <td style="width: 85px;">在籍企業:</td>
                                <td>'.$value['company'].'</td>
                              </tr>
                              <tr>
                                <td style="width: 85px;">在籍年数:</td>
                                <td>'.$value['year'].'年</td>
                              </tr>
                              <tr>
                                <td style="width: 85px;">現収入:</td>
                                <td>'.$value['annual_income'].'万円</td>
                              </tr>
                              <tr>
                                <td style="width: 85px;">転職回数</td>
                                <td>'.$value['experience_num'].'回</td>
                              </tr>
                              <tr>
                                <td style="width: 85px;">職務経歴:</td>
                                <td>'.$value['career'].'</td>
                              </tr>
                                <td style="width: 85px;">最終学歴:</td>
                                <td>'.$value['school'].'　'.$value['department'].'</td>
                              </tr>
                              </tr>
                                <td style="width: 85px;">希望内容:</td>
                                <td>'.$value['desired_contents'].'</td>
                              </tr>

                            </tbody>
                          </table>
                        <div class="modal-footer">
                          <a href="company_page.php?page=company_messages&box=nice&uid='.$value['id'].'"><button type="button" class="btn btn-primary btn-xs btn-update btn-add-card">メッセージを送る</button></a>
                          <button type="button" class="btn btn-primary btn-xs btn-update btn-add-card" data-dismiss="modal">閉じる</button>
                         </div>
                      </div>
                    </div>
                  </div>
                  </div></div></div>';
  }
}

?>
<div id="tourpackages-carousel">
  <div class="row">
    <div class="col-md-12">
      <h1>転職希望者検索</h1>
      <from>
        <input class="from" type="search">
        <input type="button" value="検索">
      </from>
    </div>
    
    <?=$user_view ?>
  
  <!-- End row -->
</div>
<!-- End container -->


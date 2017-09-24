<?php
//include 'ChromePhp.php';
$company_info = getCompanyAll($_SESSION['company_id']);

$user_view = '';
$user_array = getUserInfo(30);
//ChromePhp::log($user_array);
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
                  <button type="button" class="btn btn-primary btn-xs btn-update btn-add-card" data-toggle="modal" data-target="#profile'.$value['id'].'">　　詳細　　</button>
                  <!-- モーダルウィンドウの中身 -->
                  <div class="modal fade" id="profile'.$value['id'].'">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">'.$value['family_name'].' '.$value['first_name'].'( '.$value['family_kana'].' '.$value['first_kana'].' )</h4>
                        </div>
                        <div class="modal-body">プロフィール</div>
                          <table class="table table-user-information">
                            <tbody>
                              <tr>
                                <td>生年月日:</td>
                                <td>'.$value['birthday'].'</td>
                              </tr>
                              <tr>
                                <td>性別:</td>
                                <td>'.(( $value["gender"] == 0) ? "男性" : "女性").'</td>
                              </tr>
                              <tr>
                                <td>在籍企業:</td>
                                <td>'.$value['company'].'</td>
                              </tr>
                              <tr>
                                <td>在籍年数:</td>
                                <td>'.$value['year'].'年</td>
                              </tr>
                              <tr>
                                <td>現収入:</td>
                                <td>'.$value['annual_income'].'万円</td>
                              </tr>
                              <tr>
                                <td>転職回数</td>
                                <td>'.$value['experience_num'].'回</td>
                              </tr>
                              <tr>
                                <td>職務経歴:</td>
                                <td>'.$value['career'].'</td>
                              </tr>
                                <td>最終学歴:</td>
                                <td>'.$value['school'].'　'.$value['department'].'</td>
                              </tr>
                              </tr>
                                <td>希望内容:</td>
                                <td>'.$value['desired_contents'].'</td>
                              </tr>

                            </tbody>
                          </table>
                        <div class="modal-footer">
                          <a href="company_page.php?page=company_messages&box=nice&uid='.$value['id'].'"><button type="button" class="btn btn-primary btn-xs btn-update btn-add-card">メッセージを送る</button></a>
                          <button type="button" class="btn btn-primary" data-dismiss="modal">閉じる</button>
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
    <div class="col-lg-12">
      <h1>転職希望者検索</h1>
    </div><br>
    <?=$user_view ?>
  
  <!-- End row -->
</div>
<!-- End container -->


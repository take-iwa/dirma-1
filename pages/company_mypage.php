<?php
//include 'ChromePhp.php';
$company_info = getCompanyAll($_SESSION['company_id']);

$user_view = '';
$user_array = getUserInfo(30);
//ChromePhp::log($user_array);
foreach($user_array as $key => $value){
  if($value['desired_detail'] != ""){
    $osusume = rand ( 50 , 90 );
    $bar_width = $osusume * 2;
    if($osusume > 70){
      $bar_color = '#b5dede';
    }else{
      $bar_color = '#fce6b4';
    }
    $user_view .= '<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <div class="thumbnail">
                      <div class="caption">
                        <div class="row">
                          <div class="col-lg-3">
                            <img class="img-circle" src="'.$value['img'].'" style="width: 50px;height:auto;margin:0 0 5px 10px;">
                          </div>
                          <div class="col-lg-9">
                            <div class="bar-charts" style="width:'.$bar_width.'px;background-color:'.$bar_color.';">適合率：'.$osusume.'%</div>
                          </div>
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
                  <button type="button" class="btn btn-primary btn-xs btn-update btn-add-card" data-toggle="modal" data-target="#profile'.$value['id'].'">　詳細　</button>
                  <button type="button" class="btn btn-primary btn-xs btn-update btn-add-card" data-toggle="modal" data-target="#message'.$value['id'].'">　人事へ依頼　</button>
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
                  <div class="modal fade" id="message'.$value['id'].'">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header modal-header-title">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" style="font-weight:700;">'.$value['family_name'].' '.$value['first_name'].'( '.$value['family_kana'].' '.$value['first_kana'].' )</h4>
                        </div>
                        <div class="modal-body">
                          人事担当の方に対応を依頼しますか？
                        </div>
                        <div class="modal-footer">
                          <button type="button" data-dismiss="modal" class="btn btn-primary btn-xs btn-update btn-add-card" data-toggle="modal" data-target="#request'.$value['id'].'">　依頼する　</button>
                          <button type="button" data-dismiss="modal" class="btn btn-primary btn-xs btn-warning btn-add-card">　やめる　</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal fade" id="request'.$value['id'].'">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header modal-header-title">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" style="font-weight:700;">'.$value['family_name'].' '.$value['first_name'].'( '.$value['family_kana'].' '.$value['first_kana'].' )</h4>
                        </div>
                        <div class="modal-body">
                          人事担当の方に対応を依頼しました！
                        </div>
                        <div class="modal-footer">
                          <button type="button" data-dismiss="modal" class="btn btn-primary btn-xs btn-update btn-add-card">　OK　</button>
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
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="input-group" id="adv-search">
          <input type="text" class="form-control" placeholder="職種　業務内容　などなど" />
          <div class="input-group-btn">
            <div class="btn-group" role="group">
              <div class="dropdown dropdown-lg">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></button>
                <div class="dropdown-menu dropdown-menu-right" role="menu">
                  <form class="form-horizontal" role="form">
                    <div class="form-group">
                      <label for="filter">Filter by</label>
                      <select class="form-control">
                      <option value="0" selected>全て</option>
                      <option value="1">同職種</option>
                      <option value="2">異職種</option>
                      <option value="3">年齢順</option>
                      <option value="4"></option>
                    </select>
                    </div>
                    <div class="form-group">
                      <label for="contain">名前</label>
                      <input class="form-control" type="text" />
                    </div>
                    <div class="form-group">
                      <label for="contain">フリーワード</label>
                      <input class="form-control" type="text" />
                    </div>
                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <button type="button" class="btn btn-primary" style="margin-left:25px;"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
        </div>
      </div>
    </div>

    <?=$user_view ?>

      <!-- End row -->
  </div>
  <!-- End container -->


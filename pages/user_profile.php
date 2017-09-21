<?php
$user_info = getUserAll($_SESSION['user_id']);

$pdo = connectDb();
//job_categoryテーブル から値を取得し、 id と name を $category_list配列 に格納
$sql = "SELECT * FROM job_category";
$stmt = $pdo->query($sql);
$category_list = array();
while($row = $stmt -> fetch(PDO::FETCH_ASSOC)){
  $category_list[$row['id']] = $row['job'];
}

?>

<div class="container">
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation"><a href="user_page.php?page=user_mypage"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> マイページ</a></li>
    <li role="presentation"><a href="user_page.php?page=user_messages"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> メッセージ<span class="badge"></span></a></li>
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
                        <a href="#account">
                            <span class="fa fa-angle-double-right text-primary"></span> アカウント設定
                        </a>
                    </li>
                    <li>
                        <a href="#basis">
                            <span class="fa fa-angle-double-right text-primary"></span> 基本情報
                        </a>
                    </li>
                    <li>
                        <a href="#hope">
                            <span class="fa fa-angle-double-right text-primary"></span> 希望条件
                        </a>
                    </li>
                    <li>
                        <a href="#work">
                            <span class="fa fa-angle-double-right text-primary"></span> 職務経歴
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- edit form column -->
        <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
          <?php if(isset($_GET['r'])):?>
            <?php if($_GET['r'] == 1): ?>
            <div id="profile_success" class="alert alert-info alert-dismissable">
                <a class="panel-close close" data-dismiss="alert">×</a>
                <i class="fa fa-coffee"></i>
                プロフィールが更新されました。
            </div>
            <?php elseif($_GET['r'] == 0): ?>
            <div id="profile_error" class="alert alert-danger alert-dismissable">
                <a class="panel-close close" data-dismiss="alert">×</a>
                <i class="fa fa-coffee"></i>
                プロフィールが更新できませんでした。
            </div>
            <?php elseif($_GET['r'] == 2): ?>
            <div id="profile_error" class="alert alert-danger alert-dismissable">
                <a class="panel-close close" data-dismiss="alert">×</a>
                <i class="fa fa-coffee"></i>
                パスワードが一致しません。もう一度ご入力ください。
            </div>
          <?php endif;endif; ?>

            <form id="profile_form" class="form-horizontal" role="form" action="./update_profile.php" method="POST">
                <!-- Form Name -->
                <legend>アカウント設定</legend>
                <div class="form-group">
                    <label class="col-md-3 control-label">メールアドレス:</label>
                    <div class="col-md-6">
                        <input class="form-control" name="email" placeholder="" value="<?=$user_info["email"]?>" type="email">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">新しいパスワード:</label>
                    <div class="col-md-4">
                        <input id="pass" class="form-control" name="password" placeholder="" type="password">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">パスワード確認:</label>
                    <div class="col-md-4">
                        <input id="repass" class="form-control" name="repassword" placeholder="" type="password">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-8">
                        <button id="account_submit" class="btn btn-primary" value="更新" type="submit">更新</button>
                    </div>
                </div>
                <br>

                <!-- Form Name -->
                <legend id="basis">基本情報</legend>
                <div class="form-group form-horizontal">
                    <label class="col-sm-3 control-label">氏名:</label>
                    <div class="col-sm-4">
                        <input class="form-control" name="family_name" placeholder="姓" type="text" value="<?=$user_info["family_name"]?>" style="display: inline-block;">
                    </div>
                    <div class="col-sm-4">
                        <input class="form-control" name="first_name" placeholder="名" type="text" value="<?=$user_info["first_name"]?>" style="display: inline-block;">
                    </div>
                </div>
                <div class="form-group form-horizontal">
                    <label class="col-sm-3 control-label">フリガナ:</label>
                    <div class="col-sm-4">
                        <input class="form-control" name="family_kana" placeholder="セイ" type="text" value="<?=$user_info["family_kana"]?>" style="display: inline-block;">
                    </div>
                    <div class="col-sm-4">
                        <input class="form-control" name="first_kana" placeholder="メイ" type="text" value="<?=$user_info["first_kana"]?>" style="display: inline-block;">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">生年月日:</label>
                    <div class="col-md-4">
                        <input class="form-control" name="birthday" value="<?=$user_info["birthday"]?>" type="date">
                    </div>
                </div>
                <div class="form-group form-horizontal">
                    <label class="col-md-3 control-label" for="radios">性別:</label>
                    <div class="col-md-8">
                        <div class="radio">
                            <label for="gender-0">
                                <input type="radio" name="gender" id="gender-0" value="0" <?= $user_info['gender'] == '0' ? 'checked="checked"' : "" ?>>男性
                            </label>
                        </div>
                        <div class="radio">
                            <label for="gender-1">
                                <input type="radio" name="gender" id="gender-1" value="1" <?= $user_info['gender'] == '1' ? 'checked="checked"' : "" ?>>女性
                            </label>
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="tel" class="col-md-3 control-label">電話番号:</label>
                    <div class="col-md-4">
                        <input type="tel" name="tel1" id="tel1" class="form-control" placeholder="080XXXXOOOO" value="<?=$user_info["phone_num"]?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="zipcode" class="col-md-3 control-label">郵便番号:</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-addon">〒</span>
                            <input type="text" name="zip11" id="zipcode" class="form-control" placeholder="XXX0000" value="<?=$user_info["postal_code"]?>" onKeyUp="AjaxZip3.zip2addr(this,'','prefectures','addr01');">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="pref" class="col-md-3 control-label">住所:</label>
                    <div class="col-md-4">
                      <select name="prefectures" id="pref" class="form-control">
                        <option value="北海道" <?= $user_info['prefectures'] == '北海道' ? 'selected' : "" ?>>北海道</option>
                        <option value="青森県" <?= $user_info['prefectures'] == '青森県' ? 'selected' : "" ?>>青森県</option>
                        <option value="岩手県" <?= $user_info['prefectures'] == '岩手県' ? 'selected' : "" ?>>岩手県</option>
                        <option value="宮城県" <?= $user_info['prefectures'] == '宮城県' ? 'selected' : "" ?>>宮城県</option>
                        <option value="秋田県" <?= $user_info['prefectures'] == '秋田県' ? 'selected' : "" ?>>秋田県</option>
                        <option value="山形県" <?= $user_info['prefectures'] == '山形県' ? 'selected' : "" ?>>山形県</option>
                        <option value="福島県" <?= $user_info['prefectures'] == '福島県' ? 'selected' : "" ?>>福島県</option>
                        <option value="茨城県" <?= $user_info['prefectures'] == '茨城県' ? 'selected' : "" ?>>茨城県</option>
                        <option value="栃木県" <?= $user_info['prefectures'] == '栃木県' ? 'selected' : "" ?>>栃木県</option>
                        <option value="群馬県" <?= $user_info['prefectures'] == '群馬県' ? 'selected' : "" ?>>群馬県</option>
                        <option value="埼玉県" <?= $user_info['prefectures'] == '埼玉県' ? 'selected' : "" ?>>埼玉県</option>
                        <option value="千葉県" <?= $user_info['prefectures'] == '千葉県' ? 'selected' : "" ?>>千葉県</option>
                        <option value="東京都" <?= $user_info['prefectures'] == '東京都' ? 'selected' : "" ?>>東京都</option>
                        <option value="神奈川県" <?= $user_info['prefectures'] == '神奈川県' ? 'selected' : "" ?>>神奈川県</option>
                        <option value="新潟県" <?= $user_info['prefectures'] == '新潟県' ? 'selected' : "" ?>>新潟県</option>
                        <option value="山梨県" <?= $user_info['prefectures'] == '山梨県' ? 'selected' : "" ?>>山梨県</option>
                        <option value="長野県" <?= $user_info['prefectures'] == '長野県' ? 'selected' : "" ?>>長野県</option>
                        <option value="富山県" <?= $user_info['prefectures'] == '富山県' ? 'selected' : "" ?>>富山県</option>
                        <option value="石川県" <?= $user_info['prefectures'] == '石川県' ? 'selected' : "" ?>>石川県</option>
                        <option value="福井県" <?= $user_info['prefectures'] == '福井県' ? 'selected' : "" ?>>福井県</option>
                        <option value="岐阜県" <?= $user_info['prefectures'] == '岐阜県' ? 'selected' : "" ?>>岐阜県</option>
                        <option value="静岡県" <?= $user_info['prefectures'] == '静岡県' ? 'selected' : "" ?>>静岡県</option>
                        <option value="愛知県" <?= $user_info['prefectures'] == '愛知県' ? 'selected' : "" ?>>愛知県</option>
                        <option value="三重県" <?= $user_info['prefectures'] == '三重県' ? 'selected' : "" ?>>三重県</option>
                        <option value="滋賀県" <?= $user_info['prefectures'] == '滋賀県' ? 'selected' : "" ?>>滋賀県</option>
                        <option value="京都府" <?= $user_info['prefectures'] == '京都府' ? 'selected' : "" ?>>京都府</option>
                        <option value="大阪府" <?= $user_info['prefectures'] == '大阪府' ? 'selected' : "" ?>>大阪府</option>
                        <option value="兵庫県" <?= $user_info['prefectures'] == '兵庫県' ? 'selected' : "" ?>>兵庫県</option>
                        <option value="奈良県" <?= $user_info['prefectures'] == '奈良県' ? 'selected' : "" ?>>奈良県</option>
                        <option value="和歌山県" <?= $user_info['prefectures'] == '和歌山県' ? 'selected' : "" ?>>和歌山県</option>
                        <option value="鳥取県" <?= $user_info['prefectures'] == '鳥取県' ? 'selected' : "" ?>>鳥取県</option>
                        <option value="島根県" <?= $user_info['prefectures'] == '島根県' ? 'selected' : "" ?>>島根県</option>
                        <option value="岡山県" <?= $user_info['prefectures'] == '岡山県' ? 'selected' : "" ?>>岡山県</option>
                        <option value="広島県" <?= $user_info['prefectures'] == '広島県' ? 'selected' : "" ?>>広島県</option>
                        <option value="山口県" <?= $user_info['prefectures'] == '山口県' ? 'selected' : "" ?>>山口県</option>
                        <option value="徳島県" <?= $user_info['prefectures'] == '徳島県' ? 'selected' : "" ?>>徳島県</option>
                        <option value="香川県" <?= $user_info['prefectures'] == '香川県' ? 'selected' : "" ?>>香川県</option>
                        <option value="愛媛県" <?= $user_info['prefectures'] == '愛媛県' ? 'selected' : "" ?>>愛媛県</option>
                        <option value="高知県" <?= $user_info['prefectures'] == '高知県' ? 'selected' : "" ?>>高知県</option>
                        <option value="福岡県" <?= $user_info['prefectures'] == '福岡県' ? 'selected' : "" ?>>福岡県</option>
                        <option value="佐賀県" <?= $user_info['prefectures'] == '佐賀県' ? 'selected' : "" ?>>佐賀県</option>
                        <option value="長崎県" <?= $user_info['prefectures'] == '長崎県' ? 'selected' : "" ?>>長崎県</option>
                        <option value="熊本県" <?= $user_info['prefectures'] == '熊本県' ? 'selected' : "" ?>>熊本県</option>
                        <option value="大分県" <?= $user_info['prefectures'] == '大分県' ? 'selected' : "" ?>>大分県</option>
                        <option value="宮崎県" <?= $user_info['prefectures'] == '宮崎県' ? 'selected' : "" ?>>宮崎県</option>
                        <option value="鹿児島県" <?= $user_info['prefectures'] == '鹿児島県' ? 'selected' : "" ?>>鹿児島県</option>
                        <option value="沖縄県" <?= $user_info['prefectures'] == '沖縄県' ? 'selected' : "" ?>>沖縄県</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-3">
                        <input type="text" name="addr01" id="addr1" class="form-control" placeholder="市区町村名" value="<?=$user_info["address_before"]?>">
                        <p class="help-block">住所は2つに分けてご記入ください。</p>
                        <input type="text" name="addr02" id="addr2" class="form-control" placeholder="番地 建物名" value="<?=$user_info["address_after"]?>">
                        <p class="help-block">番地・マンション名は必ず記入してください。</p>
                    </div>
                </div>
                <br>

                <!-- Form Name -->
                <legend id="hope">希望条件</legend>
                <div class="form-group">
                  <label class="col-md-3 control-label">希望職種:</label>
                  <div class="col-md-6">
                    <select class="form-control desired_job" name="desired_job">
                      <option><?=$user_info["desired_job"]?></option>
                      <?php
                        foreach($category_list as $key => $job_name){
                          echo '<option value="'.$key.'">'.$job_name.'</option>';
                        }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">希望職種詳細:</label>
                  <div class="col-md-6">
                    <select class="form-control desired_detail" name="desired_detail">
                      <option class=""><?=$user_info["desired_detail"]?></option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">希望年収:</label>
                    <div class="col-md-4">
                        <div class="input-group">
                          <input class="form-control" name="desired_income" placeholder="" value="<?=$user_info["desired_income"]?>" type="number">
                          <span class="input-group-addon">万円</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">希望勤務地:</label>
                    <div class="col-md-4">
                        <select name="desired_region" id="desired_region" class="form-control">
                            <option value="北海道" <?= $user_info['desired_region'] == '北海道' ? 'selected' : "" ?>>北海道</option>
                            <option value="青森県" <?= $user_info['desired_region'] == '青森県' ? 'selected' : "" ?>>青森県</option>
                            <option value="岩手県" <?= $user_info['desired_region'] == '岩手県' ? 'selected' : "" ?>>岩手県</option>
                            <option value="宮城県" <?= $user_info['desired_region'] == '宮城県' ? 'selected' : "" ?>>宮城県</option>
                            <option value="秋田県" <?= $user_info['desired_region'] == '秋田県' ? 'selected' : "" ?>>秋田県</option>
                            <option value="山形県" <?= $user_info['desired_region'] == '山形県' ? 'selected' : "" ?>>山形県</option>
                            <option value="福島県" <?= $user_info['desired_region'] == '福島県' ? 'selected' : "" ?>>福島県</option>
                            <option value="茨城県" <?= $user_info['desired_region'] == '茨城県' ? 'selected' : "" ?>>茨城県</option>
                            <option value="栃木県" <?= $user_info['desired_region'] == '栃木県' ? 'selected' : "" ?>>栃木県</option>
                            <option value="群馬県" <?= $user_info['desired_region'] == '群馬県' ? 'selected' : "" ?>>群馬県</option>
                            <option value="埼玉県" <?= $user_info['desired_region'] == '埼玉県' ? 'selected' : "" ?>>埼玉県</option>
                            <option value="千葉県" <?= $user_info['desired_region'] == '千葉県' ? 'selected' : "" ?>>千葉県</option>
                            <option value="東京都" <?= $user_info['desired_region'] == '東京都' ? 'selected' : "" ?>>東京都</option>
                            <option value="神奈川県" <?= $user_info['desired_region'] == '神奈川県' ? 'selected' : "" ?>>神奈川県</option>
                            <option value="新潟県" <?= $user_info['desired_region'] == '新潟県' ? 'selected' : "" ?>>新潟県</option>
                            <option value="山梨県" <?= $user_info['desired_region'] == '山梨県' ? 'selected' : "" ?>>山梨県</option>
                            <option value="長野県" <?= $user_info['desired_region'] == '長野県' ? 'selected' : "" ?>>長野県</option>
                            <option value="富山県" <?= $user_info['desired_region'] == '富山県' ? 'selected' : "" ?>>富山県</option>
                            <option value="石川県" <?= $user_info['desired_region'] == '石川県' ? 'selected' : "" ?>>石川県</option>
                            <option value="福井県" <?= $user_info['desired_region'] == '福井県' ? 'selected' : "" ?>>福井県</option>
                            <option value="岐阜県" <?= $user_info['desired_region'] == '岐阜県' ? 'selected' : "" ?>>岐阜県</option>
                            <option value="静岡県" <?= $user_info['desired_region'] == '静岡県' ? 'selected' : "" ?>>静岡県</option>
                            <option value="愛知県" <?= $user_info['desired_region'] == '愛知県' ? 'selected' : "" ?>>愛知県</option>
                            <option value="三重県" <?= $user_info['desired_region'] == '三重県' ? 'selected' : "" ?>>三重県</option>
                            <option value="滋賀県" <?= $user_info['desired_region'] == '滋賀県' ? 'selected' : "" ?>>滋賀県</option>
                            <option value="京都府" <?= $user_info['desired_region'] == '京都府' ? 'selected' : "" ?>>京都府</option>
                            <option value="大阪府" <?= $user_info['desired_region'] == '大阪府' ? 'selected' : "" ?>>大阪府</option>
                            <option value="兵庫県" <?= $user_info['desired_region'] == '兵庫県' ? 'selected' : "" ?>>兵庫県</option>
                            <option value="奈良県" <?= $user_info['desired_region'] == '奈良県' ? 'selected' : "" ?>>奈良県</option>
                            <option value="和歌山県" <?= $user_info['desired_region'] == '和歌山県' ? 'selected' : "" ?>>和歌山県</option>
                            <option value="鳥取県" <?= $user_info['desired_region'] == '鳥取県' ? 'selected' : "" ?>>鳥取県</option>
                            <option value="島根県" <?= $user_info['desired_region'] == '島根県' ? 'selected' : "" ?>>島根県</option>
                            <option value="岡山県" <?= $user_info['desired_region'] == '岡山県' ? 'selected' : "" ?>>岡山県</option>
                            <option value="広島県" <?= $user_info['desired_region'] == '広島県' ? 'selected' : "" ?>>広島県</option>
                            <option value="山口県" <?= $user_info['desired_region'] == '山口県' ? 'selected' : "" ?>>山口県</option>
                            <option value="徳島県" <?= $user_info['desired_region'] == '徳島県' ? 'selected' : "" ?>>徳島県</option>
                            <option value="香川県" <?= $user_info['desired_region'] == '香川県' ? 'selected' : "" ?>>香川県</option>
                            <option value="愛媛県" <?= $user_info['desired_region'] == '愛媛県' ? 'selected' : "" ?>>愛媛県</option>
                            <option value="高知県" <?= $user_info['desired_region'] == '高知県' ? 'selected' : "" ?>>高知県</option>
                            <option value="福岡県" <?= $user_info['desired_region'] == '福岡県' ? 'selected' : "" ?>>福岡県</option>
                            <option value="佐賀県" <?= $user_info['desired_region'] == '佐賀県' ? 'selected' : "" ?>>佐賀県</option>
                            <option value="長崎県" <?= $user_info['desired_region'] == '長崎県' ? 'selected' : "" ?>>長崎県</option>
                            <option value="熊本県" <?= $user_info['desired_region'] == '熊本県' ? 'selected' : "" ?>>熊本県</option>
                            <option value="大分県" <?= $user_info['desired_region'] == '大分県' ? 'selected' : "" ?>>大分県</option>
                            <option value="宮崎県" <?= $user_info['desired_region'] == '宮崎県' ? 'selected' : "" ?>>宮崎県</option>
                            <option value="鹿児島県" <?= $user_info['desired_region'] == '鹿児島県' ? 'selected' : "" ?>>鹿児島県</option>
                            <option value="沖縄県" <?= $user_info['desired_region'] == '沖縄県' ? 'selected' : "" ?>>沖縄県</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="comment" class="col-md-3 control-label">希望内容:</label>
                    <div class="col-md-8">
                        <textarea class="form-control" rows="20" name="desired_contents" id="desired_contents" placeholder="ご自由にお書きください。"><?=$user_info["desired_contents"]?></textarea>
                    </div>
                </div>
                <br>

                <!-- Form Name -->
                <legend id="work">職務経歴</legend>
                <div class="form-group">
                    <label class="col-md-3 control-label">直近の勤務先:</label>
                    <div class="col-md-8">
                        <input class="form-control" name="company" placeholder="" value="<?=$user_info["company"]?>" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">直近勤務先の勤務年数:</label>
                    <div class="col-md-4">
                        <div class="input-group">
                          <input class="form-control" name="year" placeholder="0" value="<?=$user_info["year"]?>" type="number">
                          <span class="input-group-addon">年</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">現収入:</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <input class="form-control" name="annual_income" placeholder="0" value="<?=$user_info["annual_income"]?>" type="number">
                            <span class="input-group-addon">万円</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">直近の職種:</label>
                    <div class="col-md-6">
                      <select class="form-control job_title" name="job_title">
                        <option><?=$user_info["job_title"]?></option>
                        <?php
                          foreach($category_list as $key => $job_name){
                            echo '<option value="'.$key.'">'.$job_name.'</option>';
                          }
                        ?>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">直近の職種詳細:</label>
                  <div class="col-md-6">
                    <select class="form-control job_detail" name="job_detail">
                      <option class=""><?=$user_info["job_detail"]?></option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">転職回数:</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <input class="form-control" name="experience_num" placeholder="0" value="<?=$user_info["experience_num"]?>" type="number">
                            <span class="input-group-addon">回</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="comment" class="col-md-3 control-label">職務経歴詳細:</label>
                    <div class="col-md-8">
                        <textarea class="form-control" rows="20" name="career" id="career" placeholder="ご自由にお書きください。"><?=$user_info["career"]?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">最終学歴:</label>
                    <div class="col-md-8">
                        <input class="form-control" name="school" placeholder="" value="<?=$user_info["school"]?>" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">学部・学科・専攻:</label>
                    <div class="col-md-8">
                        <input class="form-control" name="department" placeholder="" value="<?=$user_info["department"]?>" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">卒業年:</label>
                    <div class="col-md-4">
                      <div class="input-group">
                        <input class="form-control" name="graduation_date" value="<?=$user_info["graduation_date"]?>" type="text">
                        <span class="input-group-addon">年</span>
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="graduated">卒業有無:</label>
                    <div class="col-sm-4">
                        <input class="form-control checkbox no-border" type="checkbox" name="graduated" <?= $user_info['graduated'] == 'on' ? 'checked' : "" ?>>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-8">
                        <button id="profile_submit" class="btn btn-primary" value="更新" type="submit">更新</button>
                        <span></span>
                        <button class="btn btn-default" value="キャンセル" type="reset">キャンセル</button>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
</div> <!-- /container -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://ajaxzip3.github.io/ajaxzip3.js" charset="utf-8"></script>
<script type="text/javascript">
  $(function(){
    //selectタグ（親） が変更された場合
    $('[name=desired_job]').on('change', function(){
      var job_val = $(this).val();
      
      //maker_val値 を select.php へ渡す
      $.ajax({
        url: "job_select.php",
        type: "POST",
        dataType: 'json',
        data: {
          job_id: job_val
        }
      })
        .done(function(data){
        //selectタグ（子） の option値 を一旦削除
        $('.desired_detail option').remove();
        //job_select.php から戻って来た data の値をそれそれ optionタグ として生成し、
        // .desired_detail に optionタグ を追加する
        $.each(data, function(id, job_detail){
          $('.desired_detail').append($('<option>').text(job_detail).attr('value', job_detail));
        });
      })
        .fail(function(){
        console.log("失敗");
      });

    });
    
    //selectタグ（親） が変更された場合
    $('[name=job_title]').on('change', function(){
      var job_val = $(this).val();

      //maker_val値 を select.php へ渡す
      $.ajax({
        url: "job_select.php",
        type: "POST",
        dataType: 'json',
        data: {
          job_id: job_val
        }
      })
        .done(function(data){
        //selectタグ（子） の option値 を一旦削除
        $('.job_detail option').remove();
        //job_select.php から戻って来た data の値をそれそれ optionタグ として生成し、
        // .desired_detail に optionタグ を追加する
        $.each(data, function(id, job_detail){
          $('.job_detail').append($('<option>').text(job_detail).attr('value', job_detail));
        });
      })
        .fail(function(){
        console.log("失敗");
      });

    });
  });
</script>

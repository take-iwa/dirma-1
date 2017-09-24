<?php
include 'init.php';

$pdo = connectDb();
//job_categoryテーブル から値を取得し、 id と name を $category_list配列 に格納
$sql = "SELECT * FROM job_category";
$stmt = $pdo->query($sql);
$category_list = array();
while($row = $stmt -> fetch(PDO::FETCH_ASSOC)){
  $category_list[$row['id']] = $row['job'];
}

$view = "";
$job_array = getNewJobInfo(30);
foreach($job_array as $key => $detaile_array){
  $view .='<tr>';
  $view .= '<td class="text-success">'.$detaile_array["corporate"].'<br>'.$detaile_array["job_title"].'</td>';
  $view .= '<td><p class="jc">'.$detaile_array["job_contents"].'</p></td>';
  $view .= '<td>'.$detaile_array["wanted"].'</td>';
  $view .= '<td>'.$detaile_array["comp_min"].'〜'.$detaile_array["comp_max"].'万円</td>';
  $view .= '<td>'.$detaile_array["workplace"].'</td>';
  $view .= '<td><a href="jobdetail/jobdetail_fr_0001.php" class="btn btn-info btn-jobdetaile">Dirma取材<br>職種詳細</a><br>
    <a href="https://www.fastretailing.com/employment/ja/fastretailing/jp/career/corporate/joblist/detail/?id=627" class="btn btn-success btn-corp">企業サイト<br>職種詳細</a></td>';
  $view .='</tr>';
}

?>


  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>DIRMA-検索</title>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" id="themesid">
    <link rel="stylesheet" href="./css/search.css">
    <style type="text/css">
      a {
        text-decoration: none;
      }
      
      a:link {
        color: #666666;
      }
      
      a:visited {
        color: #330066;
      }

    </style>
    <link rel="shortcut icon" href="./img/dirma_favicon.ico">

  </head>

  <body>
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <h3 hidden>DIRMA</h3>
          <a href="./"><img src="./img/dirma_logo.png" class="logo img-responsive" style="width:5em;margin-left:1em;padding:2px 0"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li id="home" data-toggle="popover" data-content="ホーム"><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
            <li id="notification" data-toggle="popover" data-content="お知らせ"><a href="#"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span></a></li>
          </ul>
        </div>
        <!--/.nav-collapse -->
      </div>
    </nav>

    <div id="search">

      <div id="job">
        <h4 id="jobs">求人内容で検索</h4>
        <form method="post">

          <div class="jobsearch">
            <p class="stitle" id="sort">職種&emsp;&emsp;</p>
            <select class="job_category jobtypes" name="job_category" id="category" style="width:270px;">
              <option value="none">選択してください&emsp;</option>
              <option value="none">指定なし</option>
              <?php
                foreach($category_list as $key => $job_name){
                  echo '<option value="'.$key.'">'.$job_name.'</option>';
                }
              ?>
            </select>
          </div>

          <div class="jobsearch">
            <p class="stitle">職種詳細</p>
            <select class="jobtype_detail jobtypes" name="jobtype_detail" id="detaile" style="width:270px;">
              <option value="none">先に職種を選択してください&emsp;</option>
            </select>
          </div>

          <div class="jobsearch">
            <p class="stitle">勤務地&emsp;</p>
            <select name="pref_id" id="place" class="jobtypes">
              <option value="none">指定なし</option>
              <option value="東京都">東京都</option>
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
              <option value="神奈川県">神奈川県</option>
              <option value="新潟県">新潟県</option>
              <option value="富山県">富山県</option>
              <option value="石川県">石川県</option>
              <option value="福井県">福井県</option>
              <option value="山梨県">山梨県</option>
              <option value="長野県">長野県</option>
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

          <div class="jobsearch">
            <p class="stitle">年収&emsp;&emsp;</p>
            <select name="salary" id="salary" class="jobtypes">
              <option value="[none,none]">指定なし</option>
              <option value="[600,800]">600〜800万円</option>
              <option value="[1,400]">〜400万円</option>
              <option value="[400,600]">400〜600万円</option>

              <option value="[800,1000]">800〜1000万円</option>
              <option value="[1000,1200]">1000〜1200万円</option>
              <option value="[1200,2000]">1200万円〜</option>
              <option value="none">非公開</option>

            </select>
          </div>
          <input type="button" class="btn btn-primary" id="job_submit" value="　求人を検索　">

        </form>

      </div>

      <div id="company">

        <h4 id="coms">企業名で検索</h4>
        <table class="table corp_tbl">
          <tbody>
            <tr>
              <td><input type="submit" class="corp_submit" value="Google"></td>
              <td><input type="submit" class="corp_submit" value="Apple Japan"></td>
              <td><input type="submit" class="corp_submit" value="Amazon Japan"></td>
              <td><input type="submit" class="corp_submit" value="日本マイクロソフト"></td>
            </tr>
            <tr>
              <td><input type="submit" class="corp_submit" value="ソフトバンク"></td>
              <td><input type="submit" class="corp_submit" value="ファーストリテイリング"></td>
              <td><input type="submit" class="corp_submit" value="楽天"></td>
              <td><input type="submit" class="corp_submit" value="リクルートホールディングス"></td>
            </tr>
            <tr>
              <td><input type="submit" class="corp_submit" value="トヨタ自動車"></td>
              <td><input type="submit" class="corp_submit" value="ソニー"></td>
              <td><input type="submit" class="corp_submit" value="パナソニック"></td>
              <td><input type="submit" class="corp_submit" value="本田技研工業"></td>
            </tr>
            <tr>
              <td><input type="submit" class="corp_submit" value="三菱商事"></td>
              <td><input type="submit" class="corp_submit" value="三井物産"></td>
              <td><input type="submit" class="corp_submit" value="伊藤忠商事"></td>
              <td><input type="submit" class="corp_submit" value="住友商事"></td>
            </tr>
          </tbody>
        </table>

      </div>

    </div>

    <!-- 検索結果 -->
    <div id="divtable">
      <div class="container">
        <div id="result-view">
          <table class="table table-hover">
            <thead>
              <tr>
                <th class="col-md-2">社名・募集ポジション</th>
                <th class="col-md-3">仕事内容</th>
                <th class="col-md-3">求める人物・経験</th>
                <th class="col-md-2">想定年収</th>
                <th class="col-md-1">勤務地</th>
                <th class="col-md-1">詳細情報</th></tr>
              </thead>
            <tbody id="job_table_body">
              <?=$view?>
            </tbody>
          </table>
        </div>
      </div>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="./js/script.js"></script>



  </body>

  </html>

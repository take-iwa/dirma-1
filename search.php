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
?>


  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="./css/search.css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
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

  </head>

  <body>
    <header>
      <img src="./img/dirma_logo.png" id="logo" alt="">
    </header>

    <div id="search">

      <div id="job">
        <p id="jobs">求人内容で検索</p>
        <form method="post">

          <div class="jobsearch">
            <p class="stitle" id="sort">職種&emsp;&emsp;</p>
            <select class="job_category jobtypes" name="job_category" id="category">
              <option>選択してください&emsp;</option>
              <?php
                foreach($category_list as $key => $job_name){
                  echo '<option value="'.$key.'">'.$job_name.'</option>';
                }
              ?>
            </select>
          </div>

          <div class="jobsearch">
            <p class="stitle">職種詳細</p>
            <select class="jobtype_detail jobtypes" name="jobtype_detail" id="detaile">
              <option class="">先に職種を選択してください&emsp;</option>
            </select>
          </div>

          <div class="jobsearch">
            <p class="stitle">勤務地&emsp;</p>
            <select name="pref_id" id="place" class="jobtypes">
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
              <option value="[600,800]">600〜800万円</option>
              <option value="[1,400]">〜400万円</option>
              <option value="[400,600]">400〜600万円</option>

              <option value="[800,1000]">800〜1000万円</option>
              <option value="[1000,1200]">1000〜1200万円</option>
              <option value="[1200,2000]">1200万円〜</option>
              <option value="none">非公開</option>

            </select>
          </div>
          <input type="button" id="job_submit" value="求人を検索">

        </form>

      </div>

      <div id="company">

        <p id="coms">企業名で検索</p>
        <table id="table">
          <tr>
            <td class="td1"> <a href="searchresult_corporate.php?corporate=株式会社グーグル" id="ggl">Google</a></td>
            <td class="td2"> <a href="indexb.php">Apple Japan</a>
            </td>
            <td class="td3"> <a href="indexc.php">Amazon Japan</a></td>
            <td class="td4"> <a href="indexa.php">日本マイクロソフト</a></td>

          </tr>
          <tr>
            <td class="td1"> <a href="index.php">ソフトバンク</a></td>
            <td class="td2"> <a href="index.php">ファーストリテイリング</a></td>
            <td class="td3"> <a href="index.php">楽天</a></td>
            <td class="td4"> <a href="index.php">リクルートホールディングス</a></td>
          </tr>
          <tr>
            <td class="td1"><a href="indexa.php">トヨタ自動車</a></td>
            <td class="td2"> <a href="indexa.php">ソニー</a></td>
            <td class="td3"> <a href="indexa.php">パナソニック</a></td>
            <td class="td4"> <a href="indexa.php">本田技研工業</a></td>
          </tr>
          <tr>
            <td class="td1"> <a href="indexa.php">三菱商事</a></td>
            <td class="td2"> <a href="indexa.php">三井物産</a></td>
            <td class="td3"> <a href="indexa.php">伊藤忠商事</a></td>
            <td class="td4"> <a href="indexa.php">住友商事</a></td>
          </tr>

        </table>

      </div>

    </div>
    <hr>
    
    <!-- 検索結果 -->
    <div id="divtable">
      <div id="result-view">
      </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="./js/script.js"></script>



  </body>

  </html>

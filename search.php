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
            color: #0000FF;
        }
        
        a:visited {
            color: #330066;
        }

    </style>

</head>


<body>
    <div id="body">
        <div id="top">
            <a href="index.php"><img src="./img/dirmalogo.png" alt="logo" width="100px" height="60px" id="dlogo"></a>
            <p id="menu">ログイン</p>
        </div>

        <div id="job">
            <p id="jobs">求人内容で検索</p>
            <form action="selectresult.php" method="post">

                <div id="jobselect">

                    <!-- <p class="stitle" id="sort">職種</p>
                    <select name="selectName1" class="jobtypes" onChange="functionName()">
<option value="" selected="selected">職種分類を選択</option>
<option value="kanri">管理部門・事業企画</option>
<option value="marketing">商品企画・マーケティング</option>
<option value="it">ITエンジニア</option>
<option value="web">WEB系クリエイティブ</option>
<option value="emc">電気・機械・化学エンジニア</option>
<option value="sales">営業・販売・顧客折衝</option>
<option value="asistant">事務・アシスタント</option>
<option value="other">その他</option>
</select> -->
                    <p class="stitle" id="sort">職種</p>


                    <select class="parent jobtypes" name="foo">
  <option value="" selected="selected">職種分類を選択</option>
  <option value="kanri">経営企画・事業企画・管理部門</option>
<option value="marketing">商品企画・マーケティング</option>
<option value="it">ITエンジニア</option>
<option value="web">WEBクリエイティブ</option>
<option value="emc">電気・機械・化学エンジニア</option>
<option value="sales">営業・販売・顧客折衝</option>
<option value="asistant">事務・アシスタント</option>
<option value="other">その他</option>

</select>

                    <p class="stitle">職種詳細</p>
                    <select class="children jobtypes" name="jobtype_detail" disabled>
  <option value="" selected="selected">職種詳細</option>

     <option value="経営企画" data-val="kanri">経営企画</option>
  <option value="事業企画・開発" data-val="kanri">事業企画・事業開発</option>
    <option value="経理・財務" data-val="kanri">経理・財務</option>
  <option value="人事・総務" data-val="kanri">人事・総務</option>
  <option value="法務・知財" data-val="kanri">法務・知財</option>
  <option value="内部統制・内部監査" data-val="kanri">内部統制・内部監査</option>
  <option value="広報・IR" data-val="kanri">広報・IR</option>
  <option value="物流・資材購買" data-val="kanri">物流・資材購買</option>

  <option value="商品企画" data-val="marketing">商品企画</option>
  <option value="営業企画・販促企画" data-val="marketing">営業企画・販促企画</option>
  <option value="マーケティングリサーチ" data-val="marketing">マーケティングリサーチ</option>
  <option value="広告・宣伝" data-val="marketing">広告・宣伝</option>
  <option value="PR" data-val="marketing">PR</option>
  <option value="WEBマーケティング" data-val="marketing">WEBマーケティング</option>


  <option value="システム開発（アプリケーション）PM/PL" data-val="it">シシステム開発（アプリケーション）PM/PL</option>
    <option value="システム開発（アプリケーション）SE/PG" data-val="it">システム開発（アプリケーション）SE/PG</option>
  <option value="システム開発（組み込み/ミドルウェア）PM/PL" data-val="it">システム開発（組み込み/ミドルウェア）PM/PL</option>
  <option value="システム開発（組み込み/ミドルウェア）SE/PG" data-val="it">システム開発（組み込み/ミドルウェア）SE/PG</option>
  <option value="ネットワークエンジニア" data-val="it">ネットワークエンジニア</option>
  <option value="サーバエンジニア" data-val="it">サーバエンジニア</option>
    <option value="通信インフラエンジニア" data-val="it">通信インフラエンジニア</option>
  <option value="運用・保守・テクニカルサポート" data-val="it">運用・保守・テクニカルサポート</option>
      <option value="社内ＳＥ" data-val="it">社内ＳＥ</option>
  <option value="その他ＩＴ関連職種" data-val="it">その他ＩＴ関連職種</option>


<option value="WEBプロデューサー・WEBディレクター" data-val="web">WEBプロデューサー・WEBディレクター</option>
 <option value="WEBコンテンツ企画" data-val="web">WEBコンテンツ企画</option>
<option value="WEBデザイナー" data-val="web">WEBデザイナー</option>
<option value="UI/UXデザイナー" data-val="web">UI/UXデザイナー</option>
<option value="データ分析" data-val="web">データ分析</option>
<option value="ゲーム関連" data-val="web">ゲーム関連</option>
                   
     <option value="回路・システム設計" data-val="emc">回路・システム設計</option>
  <option value="半導体設計" data-val="emc">半導体設計</option>
    <option value="機械・機構設計" data-val="emc">機械・機構設計</option>
  <option value="光学技術" data-val="emc">光学技術</option>
  <option value="生産技術" data-val="emc">生産技術</option>
  <option value="品質管理" data-val="emc">品質管理</option>
  <option value="セールスエンジニア" data-val="emc">セールスエンジニア</option>
  <option value="その他エンジニア" data-val="emc">その他エンジニア</option>

  <option value="法人向け営業" data-val="sales">法人向け営業</option>
  <option value="個人向け営業" data-val="sales">個人向け営業</option>
  <option value="販売" data-val="sales">販売</option>
  <option value="スーパーバイザー" data-val="sales">スーパーバイザー</option>
  <option value="コールセンター" data-val="sales">コールセンター</option>
  <option value="コンサルタント" data-val="sales">コンサルタント</option>

 <option value="アシスタント" data-val="asistant">アシスタント</option>
  <option value="秘書" data-val="asistant">秘書</option>
                   
 <option value="金融専門職" data-val="other">金融専門職</option>
  <option value="メディカル専門職" data-val="other">メディカル専門職</option>
  <option value="流通専門職" data-val="other">流通専門職</option>
  <option value="広告専門職" data-val="other">広告専門職</option>
  <option value="アパレル専門職" data-val="other">アパレル専門職</option>
  <option value="その他" data-val="other">その他</option>
                    </select>




                    <!-- <p class="stitle">職種詳細</p>
                    <select name="jobdetail" id="jobdetail" class="jobtypes"></select> -->



                    <p class="stitle">勤務地</p>
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
    <option value="富山県16">富山県</option>
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

                    <p class="stitle">年収</p>
                    <select name="salary" id="salary" class="jobtypes">
    <option value="[1,400]">〜400万円</option>
    <option value="[400,600]">400〜600万円</option>
    <option value="[600,800]">600〜800万円</option>
    <option value="[800,1000]">800〜1000万円</option>
    <option value="[1000,1200]">1000〜1200万円</option>
    <option value="[1200,2000]">1200万円〜</option>
    <option value="none">非公開</option>

    </select>
                </div>
                <input type="submit" value="求人を検索" id="but">

            </form>

        </div>

        <div id="company">

            <p id="coms">企業名で検索</p>
            <table width="90%" id="table">
                <tr>
                    <td> <a href="selectresult.php?corporate=グーグル" id="ggl">Google</a></td>
                    <td> <a href="indexb.php">Apple Japan</a></td>
                    <td> <a href="indexc.php">Amazon Japan</a></td>
                    <td> <a href="indexa.php">日本マイクロソフト</a></td>

                </tr>
                <tr>
                    <td> <a href="index.php">ソフトバンク</a></td>
                    <td> <a href="index.php">ファーストリテイリング</a></td>
                    <td> <a href="index.php">楽天</a></td>
                    <td> <a href="index.php">リクルートホールディングス</a></td>
                </tr>
                <tr>
                    <td><a href="indexa.php">トヨタ自動車</a></td>
                    <td> <a href="indexa.php">ソニー</a></td>
                    <td> <a href="indexa.php">パナソニック</a></td>
                    <td> <a href="indexa.php">本田技研工業</a></td>
                </tr>
                <tr>
                    <td> <a href="indexa.php">三菱商事</a></td>
                    <td> <a href="indexa.php">三井物産</a></td>
                    <td> <a href="indexa.php">伊藤忠商事</a></td>
                    <td> <a href="indexa.php">住友商事</a></td>
                </tr>
                <tr>
                    <td> <a href="indexa.php">マッキンゼーアンドカンパニーインク</a></td>
                    <td> <a href="indexa.php">ボストンコンサルティンググループ</a></td>
                    <td> <a href="indexa.php">ベインアンドカンパニー</a></td>
                    <td> <a href="indexa.php">A.T.カーニー</a></td>
                </tr>
            </table>

        </div>

        <div><br><br><br><br></div>

    </div>
    <script src="./js/script.js"></script>

</body>




</html>

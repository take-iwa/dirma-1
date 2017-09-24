<?php

//1.  DB接続します
try {
  $pdo = new PDO('mysql:dbname=dirma;charset=utf8;host=dirma.mysql.database.azure.com','dirmauser@dirma','x3pzb24m');
//注意：ホストは、サクラに繋いだらそれになる。ルート、そのあとのスペースは指定
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM job_index_table WHERE corporate LIKE '株式会社リクルートホールディングス'");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
            $view .='<a a href="./jobdetail/jobdetail_'.$result["jobid"].'.php" id="hoge"><li id="joblist">'.$result["job_title"].'</li></a>';

  } } ?>





    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>企業概要・募集職種</title>
        <link rel="stylesheet" href="./css/corporate_introduction_rhd.css">
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
        <link rel="shortcut icon" href="./img/dirma_favicon.ico">
    </head>

    <body>
        <div id="top">
            <a href="index.php"><img src="../img/dirmalogo.png" alt="logo" width="100px" height="60px" id="dlogo"></a>
            <h2 id="corpname">株式会社リクルートホールディングス　企業概要・募集職種一覧</h2>

        </div>

        <img src="./img/corp_intro/rhd/rhdtop.png" id="rhdtop" width="100%" height="100%" alt="">
        <h2 class="title">実現したいこと・志</h2>
        <p id="cont">「社会課題の解決」に挑む会社。それがリクルートです。 <br><br>リクナビ、suumo、ゼクシィ、hotpepper…。<br>これまでリクルートは、人々の生活に関わる"不"を捉え、その課題解決を実現してきました。<br>またここ数年、テクノロジーの活用においても国内有数の会社としての認知を高めています。<br><br>「2020年に人材領域で、2030年に販促領域でグローバルNo.1」を目標に掲げ、<br>グローバルでの「社会課題解決」を行う会社としてのチャレンジを重ねています。<br>生活者や企業が感じる問題点を捉え、事業領域を限定せずに次々と新たな事業開発も行なっています。<br><br>社会において、今直面している問題を見過ごしてはいないか。<br>今は潜在化している"不"をいちはやく見つけ、高い理想を掲げ、あるいは社会の"不"を見て見ぬふりをせず、<br>今の社会やマーケットを変えていこうと従業員一人ひとりが意思を持ち、最善を尽くす。<br><br>それこそがリクルートの強さの源泉です。

        </p>

        <h2 class="title">実は伝えたい、３つの真実</h2>
        <div id="fact1">
            <img src="./img/corp_intro/rhd/rhdfact1.png" width="360px" height="200px" alt="">
            <div>
                <h3 id="title1">【FACT1】200以上のネットサービスを展開</h3>
                <p id="cont1">リクナビ、suumo、ゼクシィなど認知度の高いものから、新たに立ち上げたサービスまで<br>幅広いネットサービスを展開。<br><br>カスタマー（生活者）、クライアント（企業顧客）のマッチングを軸とし、<br>社会に欠かせない新しい価値を生み出し続けています。</p>
            </div>

        </div>
        <div id="fact2">
            <div>
                <h3 id="title3">【FACT2】テクノロジー企業としての進化</h3>
                <p id="cont2">多くのネットサービスやその累積データをもとに、<br>リクルートはテクノロジー企業としての進化を遂げてきました。<br><br>卓越した技術環境はもちろん、グローバルでの人材投資・技術投資も桁外れ。<br>AI APIの公開など、社会的な技術活用を牽引する立場になってきています。</p>
            </div>
            <img src="./img/corp_intro/rhd/rhdfact2.png" width="360px" height="200px" alt="" id="rank">
        </div>
        <div id="fact1">
            <img src="./img/corp_intro/rhd/rhdfact3.png" width="360px" height="200px" alt="">
            <div>
                <h3 id="title1">【FACT3】グローバルへの急速な事業展開</h3>
                <p id="cont3">年々海外売上比率が上がり、昨年は約7000億円が海外売上。<br>特に世界ナンバーワン求人サイト「indeed」の事業成長は顕著で、約62％の増収となっています。<br><br>今後、ますます海外での事業を広げ、従業員の活躍の機会も広がっていきます。</p>
            </div>

        </div>

        <img src="./img/corp_intro/rhd/rhdmiddle.png" id="frshop2" width="100%" height="100%" alt="">
        <h2 class="title">働き方と環境、大きな３つの特徴</h2>
        <h3 class="workh3">◎起業家精神を育む新規事業提案制度</h3>
        <p class="work">「ゼクシィ」や「受験サプリ」などは、社内の新規事業提案制度「New RING」から生まれました。<br>従業員の「圧倒的な当事者意識」を武器に新たなビジネスが生まれ続けるよう毎月1回の事業提案制度を設けており、<br>徹底した環境整備・提案支援を行なっています。
        </p>

        <h3 class="workh3">◎リモートワークなど柔軟な働き方の推進</h3>
        <p class="work">リクルートホールディングスでは全従業員がリモートワークの対象。柔軟な働き方を支援します。<br>最近は、兼業で他社の業務に関わり、そこで得た能力・知識をまたリクルートで活かす社員も増えています。
        </p>

        <h3 class="workh3">◎キャリア構築を支援する無数の人事施策</h3>
        <p class="work">社内公募制度や表彰制度、目標管理制度などは、いかに「その人らしく最大限成長できるか」を追求し続けたリクルートならではの施策。<br>「成長」をキーワードに無数の人事施策が行われています。
        </p>

        <h2 class="title">会社概要</h2>

        <table class="type04">
            <tr>
                <th scope="row">設立</th>
                <td>11963年8月26日</td>
            </tr>
            <tr>
                <th scope="row">社員数（連結）</th>
                <td>45,688名（2017年3月31日時点）</td>
            </tr>
            <tr>
                <th scope="row">資本金</th>
                <td>100億円（2014年10月15日より）</td>
            </tr>
            <tr>
                <th scope="row">売上高</th>
                <td>1兆8,399億円（連結/2017年3月期）</td>
            </tr>
        </table>


        <h2 class="title">現在募集の求人</h2>

        <div id="view">
            <?=$view?>
        </div>

        <h2 class="title">会社情報リンク</h2>
        <div id="link">
            <div>
                <a href="http://www.recruit.jp/"><img src="./img/corp_intro/rhd/rhdhp.png" width="380px" height="200px" alt="" id="hrhp"></a>
                <p class="link1">ホームページ　トップ</p>
            </div>

            <div>
                <a href="http://rhd.recruit-saiyo.jp/"><img src="./img/corp_intro/rhd/rhdrec.png" width="380" height="200px" alt="" id="hrhp"></a>
                <p class="link1">キャリア採用ページ　トップ</p>
            </div>

            <div>
                <a href="http://www.recruit.jp/ir/"><img src="./img/corp_intro/rhd/rhdir.png" width="380px" height="200px" alt="" id="hrhp"></a>
                <p class="link1">IR情報ページ　トップ</p>
            </div>
        </div>

    </body>

<?php

//1.  DB接続します
try {
  $pdo = new PDO('mysql:dbname=dirma;charset=utf8;host=dirma.mysql.database.azure.com','dirmauser@dirma','x3pzb24m');
//注意：ホストは、サクラに繋いだらそれになる。ルート、そのあとのスペースは指定
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM job_index_table WHERE corporate LIKE '株式会社ファーストリテイリング'");
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
        <link rel="stylesheet" href="./css/corporate_introduction_fr.css">
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
        <div id="top">
            <a href="index.php"><img src="../img/dirmalogo.png" alt="logo" width="100px" height="60px" id="dlogo"></a>
            <h2 id="corpname">株式会社ファーストリテイリング　企業概要・募集職種一覧</h2>

        </div>

        <img src="./img/corp_intro/frtop.png" id="frtop" width="100%" height="100%" alt="">
        <h2 class="title">実現したいこと・志</h2>
        <p id="cont">ファーストリテイリングは、何の会社か？それは、「服を変え、常識を変え、世界を変えていく」会社です。 <br><br>いまや国内837店舗、海外18カ国958店舗を展開するユニクロは、<br>LifeWear（究極の普段着）を追求し続け、人々の生活を豊かにする服づくりに徹しています。<br><br> 累計3億枚を超える売上となったヒートテックは、国内外で「寒さの中でも快適に過ごせる服」となり、人々の生活を変えています。<br>エアリズム、ステテコ、ウルトラライトダウン、ウルトラストレッチジーズなど、「本当にいい服」を通じて新たな常識を創り続けています。<br> 急成長を続ける「ジーユー」も、「ファッションを、もっと自由に」楽しめる喜びを広げています。<br>
            <br>ファーストリテイリングは小売業であり、サービス産業であり、情報産業であり、システム産業であり、またイノベーションカンパニーです。<br>「大きなアパレル企業」になるのではなく、世界に類のない全く新しい産業を作るのがこの会社の目標です。

        </p>

        <h2 class="title">実は伝えたい、３つの真実</h2>
        <div id="fact1">
            <img src="./img/corp_intro/frsales.png" width="250px" height="250px" alt="">
            <div>
                <h3 id="title1">【FACT1】大幅な売上増を繰り返し、海外売上も急増</h3>
                <p id="cont1">海外ユニクロはアジア各国や欧米への出店を加速し、いまは売上高6,554億円。<br>国内ユニクロ7,998億円に迫る勢いになっています。<br><br>ユニクロの兄弟ブランドであるジーユーも急成長を続け、売上高1,878億円。<br><br>ファーストリテイリンググループとして、全世界で、幅広いシーンで常識を変える挑戦を続けています。<br>組織成長に伴い「世界を変える経営者」として活躍できる方を強く求めています。</p>
            </div>

        </div>
        <div id="fact2">
            <div>
                <h3 id="title3">【FACT2】現在は世界３位、目指すは世界１位</h3>
                <p id="cont2">ファーストリテイリングは、アパレル情報製造小売業として、世界一になることを目指しています。<br>そのために、売上高5兆円を当面の目標にしています。<br><br>実現に向けては、これまでの延長線上ではなく、抜本的な改革を繰り返す必要があります。常に慣例・前例を疑い、全てをつくりかえ続けなければなりません。</p>
            </div>
            <img src="./img/corp_intro/frrank.png" width="450px" height="180px" alt="" id="rank">
        </div>
        <div id="fact1">
            <img src="./img/corp_intro/frgrameen.jpg" width="350px" height="200px" alt="">
            <div>
                <h3 id="title1">【FACT3】事業を通じたCSR、ソーシャルビジネスを展開</h3>
                <p id="cont3">世界をより良くしていくため、CSR活動も積極的に展開しています。事業そのものが最大の社会貢献になりますが、これまでに無い「FRらしいCSR」を複数行なっています。<br><br>その例が「グラミンユニクロ」。バングラデシュでムハマドユヌス氏と連携し、貧困解決に向けた低価格商品の製造販売モデルの開発を推進しています。<br></p>
            </div>

        </div>

        <img src="./img/corp_intro/frshop2.png" id="frshop2" width="100%" height="100%" alt="">
        <h2 class="title">働き方と環境、大きな３つの特徴</h2>
        <h3 class="workh3">◎月曜から金曜までが「ノー残業デー」</h3>
        <p class="work">世界一になるため、グローバルで通用する働き方でなければなりません。<br>より短い時間で、より高い成果を。<br>全員で本気で実現するため、月曜から金曜まで全てノー残業デー。<br><br>本部では朝7時（または8時）を始業時間とし、17時までには仕事を終える社員がほとんどです。
        </p>

        <h3 class="workh3">◎高い報酬水準</h3>
        <p class="work">人事グレードごとの平均年収を公開しており、一般的な上場企業よりも高い報酬水準であると言えます。<br><br>執行役員以上を指す「Kグレード」では、平均年収が9000万円。<br>世界を変えるための大きな挑戦、高い成果に対しては、極めて高い報酬で報います。
        </p>

        <h3 class="workh3">◎「有明オフィス」始動</h3>
        <p class="work">2016年には有明オフィスをオープン。<br>商品企画、物流、販売の流れを抜本的に改革する一大プロジェクトの発信拠点として、ユニクロ事業の従業員が働いています。<br><br>2017年には日経の「ニューオフィス賞」を受賞。<br>創造性溢れるオフィスとして注目を集めています。
        </p>

        <h2 class="title">会社概要</h2>

        <table class="type04">
            <tr>
                <th scope="row">設立</th>
                <td>1963年5月1日</td>
            </tr>
            <tr>
                <th scope="row">社員数（連結）</th>
                <td>43,221名（2017年2月28日現在）</td>
            </tr>
            <tr>
                <th scope="row">資本金</th>
                <td>102億7,395万円</td>
            </tr>
            <tr>
                <th scope="row">売上高</th>
                <td>1兆7,864億円（連結/2016年8月期）</td>
            </tr>
        </table>


        <h2 class="title">現在募集の求人</h2>

        <div id="view">
            <?=$view?>
        </div>

        <h2 class="title">会社情報リンク</h2>
        <div id="link">
            <div>
                <a href="http://www.fastretailing.com/jp/"><img src="./img/corp_intro/frhp.png" width="360px" height="200px" alt="" id="hrhp"></a>
                <p class="link1">ホームページ　トップ</p>
            </div>

            <div>
                <a href="https://www.fastretailing.com/employment/ja/"><img src="./img/corp_intro/frrec.png" width="360px" height="200px" alt="" id="hrhp"></a>
                <p class="link1">キャリア採用ページ　トップ</p>
            </div>

            <div>
                <a href="http://www.fastretailing.com/jp/ir/"><img src="./img/corp_intro/frir.png" width="360px" height="200px" alt="" id="hrhp"></a>
                <p class="link1">IR情報ページ　トップ</p>
            </div>
        </div>

        <a href="./jobdetail/detail_fr_0001.php"></a>

    </body>

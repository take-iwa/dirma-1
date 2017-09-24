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
            $view .='<a href="" id="hoge"><li id="joblist">'.$result["job_title"].'</li></a>';

  } } ?>





    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>求人詳細内容</title>
        <link rel="stylesheet" href="../css/jobdetail_rhd_0001.css">
        <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
        <link rel="shortcut icon" href="../img/dirma_favicon.ico">
    </head>

    <body>
        <div id="top">
            <a href="../index.php"><img src="../img/dirmalogo.png" alt="logo" width="100px" height="60px" id="dlogo"></a>
            <h2 id="corpname">株式会社リクルートホールディングス　総合職（企画戦略スタッフ）</h2>

        </div>

        <div id="toppic">
            <img src="../img/corp_intro/rhd/rhdjob1.png" id="" width="33%" height="33.33%" alt="">
            <img src="../img/corp_intro/rhd/rhdjob2.png" id="" width="33%" height="33.33%" alt="">
            <img src="../img/corp_intro/rhd/rhdjob3.png" id="" width="33%" height="33.33%" alt="">
            <img src="../img/corp_intro/rhd/rhdjob4.png" id="" width="33%" height="33.33%" alt="">
            <img src="../img/corp_intro/rhd/rhdjob5.png" id="" width="33%" height="33.33%" alt="">
            <img src="../img/corp_intro/rhd/rhdjob6.png" id="" width="33%" height="33.33%" alt="">
        </div>


        <h2 class="title">職務内容</h2>
        <p id="cont">リクルートグループの本部機能を持つリクルートホールディングスにおいて<br>グループ全体の戦略立案とその実行を推進する、各戦略部門での仕事をお任せします。<br><br>これまでの仕事において圧倒的成果を残された方であれば、該当部門での職種経験は問いません。<br>経営や事業を学びながら、リクルートグループのグローバル・IT化を牽引していく人材として<br>活躍することを期待しています。<br><br>【志向・適性を考慮し以下のいずれかの業務をお任せいたします】 <br>・経営戦略 <br>・事業戦略 <br>・人事戦略 <br>・人材採用戦略 <br>・社外広報戦略 <br>・CSR戦略 <br>・新規事業開発 <br>・アライアンス戦略 <br>・投資戦略
        </p>

        <h2 class="title">配属部門</h2>
        <p id="cont">60以上の国と地域で拠点を展開、約3万8000人の従業員を有するリクルートグループ全体の本部機能。<br><br>具体的にはグループ全体の中長期戦略の策定、グローバル推進を行うと共に、<br>最先端ビジネステクノロジーを開拓・開発するためのR&D、<br>次世代リーダー育成などグループ全体の組織基盤強化も行っています。
        </p>

        <h2 class="title">求める経験・能力</h2>
        <p id="cont">・２年以上のビジネス経験を有する方<br> ・これまでのビジネス経験において、圧倒的な成果を残された方

        </p>


        <h2 class="title">待遇・勤務条件</h2>
        <p id="cont">【雇用形態】 正社員 <br><br>【所属会社】 株式会社リクルートホールディングス<br><br>【年収レンジ】 570万円～1220万円 <br>※ 前職の経験・年収を十分考慮の上、当社規定に基づき決定致します<br><br>【就業時間】フレックスタイム制<br>※１日の標準労働時間は7時間34分としますが、<br>出・退勤時間は、各自の職務内容と自由裁量に委ねています<br><br>【休日休暇】 完全週休2日制、年間休日 123日

            <h2 class="title">勤務地</h2>
            <p id="cont">東京（グラントウキョウサウスタワー）
            </p>

            <h2 class="title">採用部門からのメッセージ</h2>
            <div id="fact1">
                <img src="../img/corp_intro/rhd/rhdboss.png" width="230px" height="300px" alt="">
                <div>
                    <h3 id="title1">自ら機会を創り出し会社を動かすことで、見える景色が一気に広がる</h3>
                    <p id="cont1">IT業界は勝ち負けが激しく、例えばグローバルのポータルサイトを見ても、<br>10年前と今では勢力地図が全く異なっています。<br>最近出てきたプレイヤーがあっという間に首位を獲得する。<br>そんな、生き馬の目を抜くような世界でも生きていける強さが、リクルートにはあると思います。<br><br>それはこの会社が、一定のリソースを持ちながらもそれに縛られない、<br>フレキシビリティの高い生命体であるのに加え、経営者1人が考えて動かすのではなく、<br>1人ひとりの"will"で会社を変えていける、それによってイノベーションを起こせる確率が高い会社だから。<br><br>ここで会社の変化と共に、新しい世界を創っていきたいと思っています。
                    </p>
                </div>

            </div>
            <p id="cont">キャリア採用グループ 仲田
            </p>

            <h2 class="title">選考の流れ</h2>
            <p id="cont">エントリー後、1週間前後を目処に書類選考を行います。<br> その後、面接３回程度と適性検査を実施し、オファーとなります。
            </p>



            <h2 class="title">この会社で現在募集している求人</h2>

            <div id="view">
                <?=$view?>
            </div>

            <h2 class="title">会社情報リンク</h2>
            <div id="link">
                <div>
                    <a href="http://www.recruit.jp/"><img src="../img/corp_intro/rhd/rhdhp.png" width="380px" height="200px" alt="" id="hrhp"></a>
                    <p class="link1">ホームページ　トップ</p>
                </div>

                <div>
                    <a href="http://rhd.recruit-saiyo.jp/"><img src="../img/corp_intro/rhd/rhdrec.png" width="380" height="200px" alt="" id="hrhp"></a>
                    <p class="link1">キャリア採用ページ　トップ</p>
                </div>

                <div>
                    <a href="http://www.recruit.jp/ir/"><img src="../img/corp_intro/rhd/rhdir.png" width="380px" height="200px" alt="" id="hrhp"></a>
                    <p class="link1">IR情報ページ　トップ</p>
                </div>
            </div>


            <div id="footer">
                <a href="https://progres12.jposting.net/pgfastretailing/u/entry.phtml?job_code1=627" class="bt-samp31">エントリー</a>
                <a href="#" class="bt-samp31">気になる</a>
                <a href="../corporate_introduction_rhd.php" class="bt-samp32" id="corpintro">企業紹介ページを見る</a>
            </div>

    </body>

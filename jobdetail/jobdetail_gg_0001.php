<?php

//1.  DB接続します
try {
  $pdo = new PDO('mysql:dbname=dirma;charset=utf8;host=dirma.mysql.database.azure.com','dirma@dirma','gQftwMT+Zn#4');
//注意：ホストは、サクラに繋いだらそれになる。ルート、そのあとのスペースは指定
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM job_index_table WHERE corporate LIKE 'Google'");
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

  }
}

?>





    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <title>DIRMA-Google</title>
      <link rel="stylesheet" href="../css/jobdetail_fr_0001.css">
      <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
      <link rel="shortcut icon" href="../img/dirma_favicon.ico">
    </head>

    <body>
      <div style="margin:-8px;padding-top:40vh;;position:absolute;width:104%;height:400vh;font-size:10em;opacity:0.4;background-color:#888888;text-align:center;z-index:999;">(demo)</div>
        <div id="top">
            <a href="../index.php"><img src="../img/dirmalogo.png" alt="logo" width="100px" height="60px" id="dlogo"></a>
          <h2 id="corpname">Google　日本担当パートナー マーケティング マネージャー、Google Cloud マーケティング</h2>

        </div>

        <div id="toppic">
            <img src="../img/corp_intro/job1.jpg" id="" width="33%" height="33.33%" alt="">
            <img src="../img/corp_intro/job2.jpg" id="" width="33%" height="33.33%" alt="">
            <img src="../img/corp_intro/job3.jpg" id="" width="33%" height="33.33%" alt="">
        </div>


        <h2 class="title">職務内容</h2>
        <p id="cont">ジーユー本部のビジネスパートナー（戦略人事）として、各部門の人事業務（要員計画・人件費の策定・管理、タレントマネジメント、労務管理等）を担当いただきます。<br>※ファーストリテイリング人事部の所属となるため、入社後にユニクロ担当人事など異動となる可能性もございます。<br><br>#1. グローバルでの要員計画・人件費の策定・管理 ジーユー事業の中長期、または直近の事業計画に基づき、<br>グローバルな規模で要員の計画や人件費の策定ならびにその管理を実施いただきます。<br><br>#2. タレントマネジメント ジーユーの本部部門のビジネスパートナーとして、社員一人ひとりがもつ能力や経験・スキルを、面談やサーベイを活用して可視化し、<br>人事独自の情報を一元管理し、定期異動や評価実務を通して組織横断的に人事配置・人材開発を行うことで、組織・事業課題解決ならびに組織強化を図ります。<br><br>#3. 各種人事プロジェクトの推進 中長期の組織戦略立案、社員一人ひとりのエンゲージメント向上など、今後のジーユー事業における重要なプロジェクトを推進いただきます。<br><br>#4. 中途採用業務 組織戦略にあわせて、外部からの人材獲得も重要な役割となります。<br>中途採用チームと連携し、採用要件定義からクロージングまで担当いただきます。
        </p>

        <h2 class="title">配属部門</h2>
        <p id="cont">現在ジーユー人事チームには２名の部長・リーダーを含め約15名のメンバーで構成されています。<br>本部人事と店舗人事で分かれており、本ポジションのレポートラインは、本部人事を担当する部長・リーダーへレポートをしていただきます。<br>担当するミッションによっては、社長・役員へダイレクトレポートする機会も頻繁にございます。
        </p>

        <h2 class="title">求める経験・能力</h2>
        <p id="cont">【必要な知識・経験】<br>・人事関連業務（採用、タレントマネジメント、制度企画、報酬設計、労務管理など）の企画・運用経験 または、<br>・人事経験がない方でも人事を志す明確な動機があり、かつ自ら課題を設定し周囲をまきこみ物事を推進されてきた経験がある方は歓迎いたします <br><br>＜以下の経験がある方は尚可＞ ・グローバル企業、海外現地法人の人事経験 <br>・人事プロジェクト推進経験 <br>・コンサルティングファーム、または成長企業での経験 <br><br>【求める人物像】 <br>・人事プロフェッショナルとしてのキャリアを志し、人事として経営に携わる強い意思を有する <br>・事象・課題を構造的に把握した上で、本質的な課題を発見・解決し、やりきる事が出来る <br>・先入観や既存のルールに縛られず、新たな仕組みづくりを楽しめる <br>・本質を捉え、変化を楽しみ、柔軟に対応できる <br>・社内のあらゆる方と垣根なくコミュニケーションできる高いコミュニケーション能力を有する <br><br>【語学力】 TOEIC700以上または同等のビジネス英会話レベルを有している

        </p>


        <h2 class="title">待遇・勤務条件</h2>
        <p id="cont">【雇用形態】 正社員 <br><br>【所属会社】 株式会社ファーストリテイリング <br><br>【年収レンジ】 580万円～1200万円 <br>※ 前職の経験・年収を十分考慮の上、当社規定に基づき決定致します <br>※ 1年以上在籍後、決算賞与の支給有 <br><br>【就業時間】 原則7：00-16：00<br> ※ 残業有（月平均 10-30時間程度） <br><br>【休日休暇】 完全週休2日制（土・日）、年間休日 120日 <br>※ 有給休暇とは別に、半期に8日ずつ特別休暇を付与
        </p>

        <h2 class="title">勤務地</h2>
        <p id="cont">東京ミッドタウン・タワー（六本木）<br>※将来的に海外勤務・長期出張の可能性もあります
        </p>

        <h2 class="title">採用部門からのメッセージ</h2>
        <div id="fact1">
            <img src="../img/corp_intro/sasaki.jpg" width="300px" height="300px" alt="">
            <div>
                <h3 id="title1">「経営者視点」での人事戦略推進を期待します</h3>
                <p id="cont1">ジーユーは、創業からわずか8年で年間売上高1000億円を突破し、現在は売上高1,800億円を突破、<br>そして次の10年で売上高1兆円を目標としています。<br><br>日本発の、まだ見たこともないグローバルファッションブランドになるため、今までの延長線上には無い発想で、常に新しいイノベーションを起こし、ブランドと会社すべてをつくりかえます。<br>ジーユーが世界中にビジネスを展開することで、世界のあらゆる人がファッションを楽しんで元気になれる、<br>そんな世の中をつくり出すことを目指しています。
                    <br><br>急速な成長の中、人・組織の課題抽出・解決は経営に大きなインパクトを与えます。<br>ともに世界を変えていくパートナーとしての活躍を期待しています。
                </p>
            </div>

        </div>
        <p id="cont">人事部リーダー　佐々木
        </p>

        <h2 class="title">選考の流れ</h2>
        <p id="cont">エントリー後、1週間前後を目処に書類選考を行います。<br> その後、面接を２〜３回実施し、オファーとなります。
        </p>



        <h2 class="title">この会社で現在募集している求人</h2>

        <div id="view">
            <?=$view?>
        </div>

        <h2 class="title">会社情報リンク</h2>
        <div id="link">
            <div>
                <a href="http://www.fastretailing.com/jp/"><img src="../img/corp_intro/frhp.png" width="360px" height="200px" alt="" id="hrhp"></a>
                <p class="link1">ホームページ　トップ</p>
            </div>

            <div>
                <a href="https://www.fastretailing.com/employment/ja/"><img src="../img/corp_intro/frrec.png" width="360px" height="200px" alt="" id="hrhp"></a>
                <p class="link1">キャリア採用ページ　トップ</p>
            </div>

            <div>
                <a href="http://www.fastretailing.com/jp/ir/"><img src="../img/corp_intro/frir.png" width="360px" height="200px" alt="" id="hrhp"></a>
                <p class="link1">IR情報ページ　トップ</p>
            </div>
        </div>

        <div id="footer">
            <a href="https://progres12.jposting.net/pgfastretailing/u/entry.phtml?job_code1=627" class="bt-samp31">エントリー</a>
            <a href="../send_message.php?cid=1&uid=1&jid=fr_0001" class="bt-samp31">気になる</a>
            <a href="../corporate_introduction_fr.php" class="bt-samp32" id="corpintro">企業紹介ページを見る</a>
        </div>

    </body>
</html>

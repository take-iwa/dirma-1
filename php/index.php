<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="shortcut icon" href="../img/dirma_favicon.ico">
    <style type="text/css">
        a {
            text-decoration: none;
        }

    </style>
</head>

<body>
    <nav class="navbar navbar-fixed-top">
      <div class="navbar-header">
         <!-- logo img -->
         <a class="navbar-brand" href=""></a>
         <!-- toggle -->
         <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#top-nav">
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
         </button>
      </div>

      <div id="gnavi" class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="signup.php">新規登録</a>
          <li><a href="signin.php">ログイン</a>
          <li><a href="#">スカウト</a></li>
        </ul>
      </div>
    </nav>
    <div id="body">
        <div id="main">
            <p id="mes1">世界を変えていく企業との出会いを、あなたに。</p>
            <p id="mes2">求人が探せる、詳しくわかる、スカウトが届く。<br>大手グローバル企業の求人情報に特化した転職サイト「Dirma（ダーマ）」。</p>
            <div id="linklist">
                <a href="search.php">
                    <div id="search" width="500px">
                        <p id="mes3">大手グローバル企業の</p>
                        <p id="mes4">求人を探す</p>
                    </div>
                </a>
                <div id="scout">
                    <p id="mes5">大手グローバル企業の</p>
                    <p id="mes6">スカウトを受ける</p>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

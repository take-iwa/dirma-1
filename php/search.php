<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../css/search.css">
    <style type="text/css">
        <!-- a {
            text-decoration: none;
        }
        
        a:link {
            color: #0000FF;
        }
        
        a:visited {
            color: #330066;
        }
        
        -->

    </style>

</head>

<body>
    <div id="body">
        <div id="top">
            <p id="logo">Dirma logo</p>
            <p id="menu">ログイン</p>
        </div>

        <div id="job">
            <p id="jobs">求人内容で検索</p>
            <form action="result.php" method="post">

                <div id="jobselect">

                    <p class="stitle" id="sort">職種</p>
                    <select name="jobtypes" class="jobtypes">
<option value="info">職種分類を選択</option>
<option value="kanri">管理部門</option>
<option value="marketing">商品企画・マーケティング</option>
<option value="businessplan">事業企画・事業開発</option>
<option value="it">ITエンジニア</option>
<option value="web">WEB系クリエイティブ</option>
<option value="emc">電気・機械・化学エンジニア</option>
<option value="sales">営業・販売・顧客折衝</option>
<option value="asistant">事務・アシスタント</option>  
<option value="other">その他</option>  
    
</select>

                    <p class="stitle">職種詳細</p>
                    <select name="jobdetail" id="jobdetail" class="jobtypes"></select>


                    <p class="stitle">勤務地</p>
                    <select name="pref_id" id="place" class="jobtypes">
    <option value="" selected>都道府県</option>
    <option value="1">北海道</option>
    <option value="2">青森県</option>
    <option value="3">岩手県</option>
    <option value="4">宮城県</option>
    <option value="5">秋田県</option>
    <option value="6">山形県</option>
    <option value="7">福島県</option>
    <option value="8">茨城県</option>
    <option value="9">栃木県</option>
    <option value="10">群馬県</option>
    <option value="11">埼玉県</option>
    <option value="12">千葉県</option>
    <option value="13">東京都</option>
    <option value="14">神奈川県</option>
    <option value="15">新潟県</option>
    <option value="16">富山県</option>
    <option value="17">石川県</option>
    <option value="18">福井県</option>
    <option value="19">山梨県</option>
    <option value="20">長野県</option>
    <option value="21">岐阜県</option>
    <option value="22">静岡県</option>
    <option value="23">愛知県</option>
    <option value="24">三重県</option>
    <option value="25">滋賀県</option>
    <option value="26">京都府</option>
    <option value="27">大阪府</option>
    <option value="28">兵庫県</option>
    <option value="29">奈良県</option>
    <option value="30">和歌山県</option>
    <option value="31">鳥取県</option>
    <option value="32">島根県</option>
    <option value="33">岡山県</option>
    <option value="34">広島県</option>
    <option value="35">山口県</option>
    <option value="36">徳島県</option>
    <option value="37">香川県</option>
    <option value="38">愛媛県</option>
    <option value="39">高知県</option>
    <option value="40">福岡県</option>
    <option value="41">佐賀県</option>
    <option value="42">長崎県</option>
    <option value="43">熊本県</option>
    <option value="44">大分県</option>
    <option value="45">宮崎県</option>
    <option value="46">鹿児島県</option>
    <option value="47">沖縄県</option>
    </select>

                    <p class="stitle">年収</p>
                    <select name="salary" id="salary" class="jobtypes">
    <option value="4">〜400万円</option>
    <option value="6">400〜600万円</option>
    <option value="8">600〜800万円</option>
    <option value="10">800〜1000万円</option>
    <option value="12">1000〜1200万円</option>
    <option value="14">1200万円〜</option>
    <option value="xx">非公開</option>  
        
    </select>
                </div>
                <input type="submit" value="求人を検索" id="but">

            </form>

        </div>

        <div id="company">

            <p id="coms">企業名で検索</p>
            <table width="90%" id="table">
                <tr>
                    <td> <a href="indexa.php">Google</a></td>
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

</body>

</html>

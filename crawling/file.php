<?php
require_once ‘./vendor/autoload.php’; //goutte呼ぶ

$client = new Goutte\Client();
for($i=1;$i<3;$i++){ //100ページまで読む
$crawler = $client->request(‘GET’, ‘http://xxx.com/’.$i); //読みたいサイト

// 抽出
$target/*Selector*/ = ‘div.classname’; //拾う場所。この例だと<div class="classname">ここを拾ってくる</div>
$crawler->filter($target)->each(function ($node) {
$word = $node->text();
echo $word . "\n"; //ターミナルに表示
});
}

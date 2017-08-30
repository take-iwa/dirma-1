<?php

    //ライブラリロード
    require_once './vendor/autoload.php';

    //use
    use Goutte\Client;

    //インスタンス生成
    $client = new Client();

    //取得とDOM構築
    $crawler = $client->request('GET','http://localhost/xampp/start.php');

    //要素の取得
    $p = $crawler->filter('p')->each(function($element){
        echo $element->text()."\n";
    });

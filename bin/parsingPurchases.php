<?php

use GuzzleHttp\Client;
use DiDom\Document;

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';

if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

$url = 'https://www.100sp.ru/vladivostok';
$client = new Client();
$response = $client->request('GET', $url);
$html = $response->getBody()->getContents();
$document = new Document();
$document->loadHtml($html);
$typePurchases = $document->find('div.purchases h2 a');
$purchases = $document->find('div.span12 div div div.purchase-block div.picture');
$purchasesName = $document->find('div.span12 div div div.purchase-block div.properties div.name a');
// var_dump($purchases->html());
foreach ($purchases as $key => $element) {
    print_r($element->closest('.purchases')->first('h2')->text());
    print_r(' ');
    print_r($element->first('a')->href);
    print_r(' ');
    print_r($element->first('img')->attr('data-src'));
    print_r(' ');
    print_r($purchasesName[$key]->text());
    print_r("\n");
}
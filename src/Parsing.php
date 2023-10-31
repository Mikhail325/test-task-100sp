<?php

namespace Mikail325\TestTask100sp;

use GuzzleHttp\Client;
use DiDom\Document;

class Parsing
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function parsing(): void
    {
        $url = 'https://www.100sp.ru/vladivostok';
        $client = new Client();
        $response = $client->request('GET', $url);
        $html = $response->getBody()->getContents();

        $document = new Document();
        $document->loadHtml($html);

        $typesPurchas = $document->find('div.purchases h2 a');
        $purchases = $document->find('div.span12 div.purchase-block');

        foreach ($typesPurchas as $keyType => $type) {
            $typeName = $type->text();

            $sql = 'INSERT INTO type_purchases (name) VALUES (:name)';
                    $sqlRequest = $this->pdo->prepare($sql);
                    $sqlRequest->execute([
                        'name' => $typeName
                    ]);
            foreach ($purchases as $purchase) {
                $idType = $keyType + 1;
                $url = 'https://www.100sp.ru' . $purchase->first('div.picture a')->href;
                $urlFoto = $purchase->first('div.picture img')->attr('data-src');
                $name = $purchase->first('div.properties div.name a')->text();

                $sql = 'INSERT INTO purchases (type_id, name, url_foto, url) VALUES (:type_id, :name, :url_foto, :url)';
                    $sqlRequest = $this->pdo->prepare($sql);
                    $sqlRequest->execute([
                        'type_id' => $idType,
                        'name' => $name,
                        'url_foto' => $urlFoto,
                        'url' => $url
                    ]);
            }
        }
    }
}

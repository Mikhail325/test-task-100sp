<?php

namespace Mikail325\TestTask100sp;

use GuzzleHttp\Client;
use DiDom\Document;
use Mikail325\TestTask100sp\RepositoryDB;

class Parsing
{
    private $repositoryDB;
    public $cities = [];

    public function __construct(\PDO $pdo)
    {
        $this->repositoryDB = new RepositoryDB($pdo);
    }

    public function setCities(string $citi): void
    {
        $this->cities[] = $citi;
    }

    public function getCities(): array
    {
        return $this->cities;
    }

    private function checkingIfCities(): void
    {
        if (empty($this->cities)) {
            throw new \Exception('Add a city');
        }
    }

    public function parsing(): void
    {
        $this->checkingIfCities();

        foreach ($this->cities as $citi) {
            $url = 'https://www.100sp.ru/' . $citi;

            $client = new Client();
            $response = $client->request('GET', $url);
            $html = $response->getBody()->getContents();

            $document = new Document();
            $document->loadHtml($html);

            $citiName = $document->first('a.city-selector-widget-link')->text();
            $this->repositoryDB->setCities($citiName);

            $typesPurchas = $document->find('div.purchases h2 a');
            $purchases = $document->find('div.span12 div.purchase-block');

            foreach ($typesPurchas as $type) {
                $typeName = $type->text();
                $this->repositoryDB->setTypesPurchas($typeName);

                foreach ($purchases as $purchase) {
                    $purchaseDB['idType'] = $this->repositoryDB->getIdTypesPurchas($typeName);
                    $purchaseDB['idCiti'] = $this->repositoryDB->getIdCiti($citiName);
                    $purchaseDB['url'] = 'https://www.100sp.ru' . $purchase->first('div.picture a')->href;
                    $purchaseDB['urlFoto'] = $purchase->first('div.picture img')->attr('data-src');
                    $purchaseDB['name'] = $purchase->first('div.properties div.name a')->text();
                    $this->repositoryDB->setPurchas($purchaseDB);
                }
            }
        }
        print_r('completed');
    }

    public function getLastPurchasesInCity($citi): array
    {
        $data = $this->repositoryDB->get5LastRecords($citi);
        print_r($data);
        return $data;
    }
}

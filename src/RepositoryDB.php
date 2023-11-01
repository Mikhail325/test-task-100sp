<?php

namespace Mikail325\TestTask100sp;

use Carbon\Carbon;

class RepositoryDB
{
    private \PDO $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function setCities($citi): void
    {
        $sql = 'INSERT INTO cities (name, created_at) VALUES (:name, :created_at)';
        $sqlRequest = $this->pdo->prepare($sql);
        $sqlRequest->execute([
            'name' => $citi,
            'created_at' => Carbon::now()
        ]);
    }

    public function setTypesPurchas($typeName): void
    {
        $sql = 'INSERT INTO type_purchases (name, created_at) VALUES (:name, :created_at)';
        $sqlRequest = $this->pdo->prepare($sql);
        $sqlRequest->execute([
            'name' => $typeName,
            'created_at' => Carbon::now()
        ]);
    }

    public function setPurchas($purchase): void
    {
        $sql = 'INSERT INTO purchases (type_id, citi_id, name, url_foto, url, created_at) VALUES (:type_id, :citi_id, :name, :url_foto, :url, :created_at)';
        $sqlRequest = $this->pdo->prepare($sql);
        $sqlRequest->execute([
            'type_id' => $purchase['idType'],
            'citi_id' => $purchase['idCiti'],
            'name' => $purchase['name'],
            'url_foto' => $purchase['urlFoto'],
            'url' => $purchase['url'],
             'created_at' => Carbon::now()
        ]);
    }

    public function get5LastRecords($citi): array
    {
        $sql = "SELECT 
                    purchases.id as id, 
                    cities.name as citi, 
                    type_purchases.name as type, 
                    purchases.name,
                    purchases.url_foto,
                    purchases.url,
                    purchases.created_at
                FROM cities, purchases, type_purchases
                WHERE cities.id = purchases.citi_id
                    and cities.name = '$citi'
                ORDER BY purchases.created_at DESC
                LIMIT 5;";
        $statement = $this->pdo->query($sql);
        return $statement->fetchAll(\PDO::FETCH_CLASS);
    }
}

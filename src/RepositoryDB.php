<?php

namespace Mikail325\TestTask100sp;


class RepositoryDB
{
    private \PDO $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function setCities($citi)
    {
        $sql = 'INSERT INTO cities (name) VALUES (:name)';
                        $sqlRequest = $this->pdo->prepare($sql);
                        $sqlRequest->execute([
                            'name' => $citi
                        ]);
    }

    public function setTypesPurchas($typeName)
    {
        $sql = 'INSERT INTO type_purchases (name) VALUES (:name)';
                        $sqlRequest = $this->pdo->prepare($sql);
                        $sqlRequest->execute([
                            'name' => $typeName
                        ]);
    }

    public function setPurchas($purchase)
    {
        $sql = 'INSERT INTO purchases (type_id, citi_id, name, url_foto, url) VALUES (:type_id, :citi_id, :name, :url_foto, :url)';
                        $sqlRequest = $this->pdo->prepare($sql);
                        $sqlRequest->execute([
                            'type_id' => $purchase['idType'],
                            'citi_id' => $purchase['idCiti'],
                            'name' => $purchase['name'],
                            'url_foto' => $purchase['urlFoto'],
                            'url' => $purchase['url']
                        ]);
    }

    
}
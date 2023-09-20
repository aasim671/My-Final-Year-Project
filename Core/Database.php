<?php

class Database {

    public $connection;
    public $statement;

    public $config = [
        "host" => "localhost",
        'dbname' => 'ecommerce'
    ];

    function __construct(){        
        
        $dsn = "mysql:".http_build_query($this->config,'',';');
        
        $this->connection = new PDO($dsn,'root','',[
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC 
        ]);
    }

    public function query($query, $params = []){

        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);

        // This will return the rest of methods of the same class means: Database;
        return $this;
        
    }

    public function find(){
        return $this->statement->fetch();
    }

    public function fetchAll(){
        return $this->statement->fetchAll();
    }

    
}

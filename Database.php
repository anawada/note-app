<?php
//connect database, and execute a query.
class Database
{
    //define an instance property 
    public $connection;

    //this __construct() function is called by php automatically 
    public function __construct($config, $username = 'root', $password = ''){

        //dsn - data source name - connection string - string that declares the connection to the database: port, host...
        $dsn = 'mysql:' . http_build_query($config, '', ';');
        //create an instance of a Class(PDO)
        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }
    public function query($query, $params=[])
    {
        //prepare a new query to send to MySQL
        $statement = $this->connection->prepare($query);
        //MySQL execute the query
        $statement->execute($params);
        //we fetch all the results
        return $statement;
    }
}
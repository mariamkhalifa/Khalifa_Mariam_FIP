<?php

// this is an object
class Database{
    private $host = 'localhost';
    private $username = 'root'; 
    private $db_name = 'db_portfolio';
    private $password = '';

    //people outside of object have access to public
    public $conn;

    //what operates when people access public - like a btn
    public function getConnection(){
        $this->conn = null;

        //For MAMP/WAMP
        $db_dsn = array(
            'host'=>$this->host,
            'dbname'=>$this->db_name,
            'charset'=>'utf8'
        );

        //For docker (IDP_ENVIRONMENT = var in docker.yml)
        if(getenv('IDP_ENVIRONMENT')==='docker'){
            $db_dsn['host'] = 'mysql';
            $this->username = 'docker_u';
            $this->password = 'docker_p';
        }

        //Catches and handles errors - inspect these lines of code
        try{
            $dsn = 'mysql:' .http_build_query($db_dsn, '', ';');
            $this->conn = new PDO($dsn, $this->username, $this->password);
        }catch(PDOException $exception) {
            echo json_encode(
                array(
                    'error'=>'Database Connection Failed',
                    'message'=>$exception->getMessage()
                )
            );
        }

        $dsn = 'mysql:' .http_build_query($db_dsn, '', ';');
        $this->conn = new PDO($dsn, $this->username, $this->password); //PDO works with every database - better than MySQL

        return $this->conn;
    }
}
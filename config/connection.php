<?php 

namespace Config;
use PDO;

class Connection {

    private function database_connection()
    {
        try
        {
            $connection = new PDO(SERVER['driver'].':host='.SERVER['host'].';
                                  dbname='.SERVER['db'],SERVER['username'],
                                  SERVER['password'],
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ));
            return $connection;
        } 
        catch(\PDOException $e)
        {
            if(ENVIRONMENT && ENVIRONMENT == 'development') {

                error($e->getMessage());

            } else {

                error('The application is unable to access the server.');

            }

        }
    }

    public function connect()
    {
        return $this->database_connection();
    }

}
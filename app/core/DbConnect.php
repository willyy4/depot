<?php



class DbConnect {

    protected $connection;
    

    const SERVER = 'sqlprive-pc2372-001.eu.clouddb.ovh.net';
    const USER = 'cefiidev1504';
    const PASSWORD = 'Eet7F96Fk';
    const BASE = 'cefiidev1504';
    const PORT = '35167';

    public function __construct(){

        try {
            $this->connection = new PDO('mysql:host=' . self::SERVER . ';port=' . self::PORT . ';dbname=' . self::BASE, self::USER, self::PASSWORD);

            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

            $this->connection->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES utf8");
        } catch (Exception $e){
            die('Erreur : ' . $e->getMessage());
        }
    }
}
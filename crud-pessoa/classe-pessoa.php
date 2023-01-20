<?php 
class Pessoa{
    const HOSTNAME = 'localhost';
    const DBNAME = 'crudpdo';
    const USER = 'root';
    const PASSWORD = 1234;
    private $pdo;

    function __construct()
    {
        try{
            $this->pdo = new PDO("mysql:dbname=". self::DBNAME . "host=" . self::HOSTNAME, self::USER, self::PASSWORD);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
            die('ERROR: ' . $e->getMessage());
        }
        catch(Exception $e){
            die('ERROR: ' . $e->getMessage());
        }
    }

}




?>
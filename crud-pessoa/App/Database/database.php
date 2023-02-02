<?php 
namespace App\DataBase;

use \PDO;
use \PDOException;

class DataBase{
    const HOSTNAME = 'localhost';
    const DBNAME = 'crudpdo';
    const USER = 'root';
    const PASSWORD = 1234;

    private $tabela;
    private $connection;


    public function __construct($tabela = null)
    {
        $this->tabela = $tabela;
        $this->conectar_ao_banco();
    }

    private function conectar_ao_banco(){
        try{
            $this->connection = new PDO('mysql:host=' . self::HOSTNAME . ';dbname=' . self::DBNAME, self::USER, self::PASSWORD);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            die('ERROR: ' . $e->getMessage());
        }
    }


    public function inserir_no_banco(){

    }

    public function executar_query($query, $parametros = []){
        try{
            $comando_sql = $this->connection->prepare($query);
            $comando_sql->execute($parametros);
        }catch(PDOException $e){
            die('ERROR: ' . $e->getMessage());
        }
    }
    
}

?>
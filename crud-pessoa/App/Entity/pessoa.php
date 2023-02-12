<?php 
namespace App\Entity;

require_once("App/Database/database.php");
use App\DataBase\DataBase; 

use \PDO;
use \PDOException;
use \Exception;


class Pessoa{
    private $id;
    private $nome;
    private $telefone;
    private $email;

    private $database;

    
    function __construct($tabela = null)
    {
        $this->database = new DataBase($tabela);
    }

    public function obter_informacoes($array){
        $this->id = (!empty($array['id'])) ?  $array['id'] : '';
        $this->nome = $array['nome'];
        $this->telefone = $array['telefone'];
        $this->email = $array['email'];                        
    }

    
    public function cadastrar_pessoa(){
       $resultado = $this->database->inserir_no_banco(["nome" => $this->nome, "telefone" => $this->telefone, "email" => $this->email]);
       return $resultado;
    }


    public function excluir_pessoa($id){
        $resultado = $this->database->excluir_do_banco($id);
        return $resultado;
    }


    public function editar_pessoa($id){
        $resultado = $this->database->buscar_dados_para_editar($id);
        return $resultado;
    }
    

    public function atualizar_pessoa(){
        $resultado = $this->database->atualizar_no_banco(["id" => $this->id,"nome" => $this->nome, "telefone" => $this->telefone, "email" => $this->email]);
        return $resultado;
    }


    public function buscar_dados(){
        $resultado = $this->database->buscar_dados();         
        return $resultado;
    }    
}

?>
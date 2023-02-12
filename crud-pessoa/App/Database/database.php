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


    public function executar_query($query, $parametros = []){
        try{
            $comando_sql = $this->connection->prepare($query);
            $comando_sql->execute($parametros);
            return $comando_sql;
        }catch(PDOException $e){
            die('ERROR: ' . $e->getMessage());
        }
    }

    
    public function inserir_no_banco($array){
        
        $teste = $this->verificador_de_cadastro(['email' => $array['email'], 'telefone' => $array['telefone']]);
        
        if(!$teste){
            return "Email ou Telefone já existe!";
        }

        $campos = array_keys($array);
        $valores = array_pad([], count($campos), "?");

        $query = "INSERT INTO " . $this->tabela . " (". implode(",", $campos) .") VALUES(". implode(",", $valores) .")";        

        $this->executar_query($query,array_values($array));

        return "Cadastrado com Sucesso!";
    }

    private function verificador_de_cadastro($array){
        
        $query = "SELECT ID FROM " . $this->tabela . " WHERE EMAIL = :e OR TELEFONE = :t";
        
        $resposta_da_query = $this->executar_query($query, [':e' => $array['email'], ':t' => $array['telefone']]);

        $resposta_da_query_fetch = $resposta_da_query->fetch(PDO::FETCH_ASSOC);        

        if($resposta_da_query_fetch){
            return false;
        }

        return true;
    }

    
    public function excluir_do_banco($id){
        $query = "DELETE FROM PESSOA WHERE ID = :id";
        $this->executar_query($query, [':id' => $id]);

        return "Excluido com Sucesso!";
    }


    public function buscar_dados_para_editar($id){
        $query = "SELECT id,nome,telefone,email FROM " . $this->tabela . " WHERE ID = :id";

        $resposta_da_query = $this->executar_query($query, [':id' => $id]);
        $resposta_da_query_fetch = $resposta_da_query->fetch(PDO::FETCH_ASSOC);
        return $resposta_da_query_fetch;        
    }


    public function atualizar_no_banco($array){
        
        $teste = $this->verificador_de_atualizacao(['email' => $array['email'], 'telefone' => $array['telefone'], 'id' => $array['id']]);
        
        if(!$teste){
            return "Email ou Telefone já existe!";
        }

        $query = "UPDATE " . $this->tabela . " SET NOME = :n, TELEFONE = :t, EMAIL = :e WHERE ID = :id";
        
        $this->executar_query($query, [':n' => $array['nome'], ':t' => $array['telefone'], ':e' => $array['email'], ':id' => $array['id']]);

        return "Atualizado com Sucesso!";
    }


    public function verificador_de_atualizacao($array){
        
        $query = "SELECT ID FROM " . $this->tabela . " WHERE (EMAIL = :e OR TELEFONE = :t) AND ID != :id";
        
        $resposta_da_query = $this->executar_query($query, [':e' => $array['email'], ':t' => $array['telefone'], ':id' => $array['id'] ]);

        $resposta_da_query_fetch = $resposta_da_query->fetch(PDO::FETCH_ASSOC);
        
        if($resposta_da_query_fetch){
            return false;
        }

        return true;
    }


    public function buscar_dados(){
        $query = "SELECT * FROM " . $this->tabela . " ORDER BY NOME ASC";
        
        $resultado = $this->executar_query($query);
        $resultado_fetchAll = $resultado->fetchAll(PDO::FETCH_ASSOC);
        
        return $resultado_fetchAll;
    }
    
}

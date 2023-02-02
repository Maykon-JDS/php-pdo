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
            $this->pdo = new PDO("mysql:dbname=". self::DBNAME . ";host=" . self::HOSTNAME, self::USER, self::PASSWORD);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
            die('ERROR: ' . $e->getMessage());
        }
        catch(Exception $e){
            die('ERROR: ' . $e->getMessage());
        }
    }


    public function cadastrar_pessoa($array){
        
        $teste = $this->verificador_de_cadastro(['email' => $array['email'], 'telefone' => $array['telefone']]);
        
        if(!$teste){
            return "Email ou Telefone já existe!";
        }

        $campos = array_keys($array);
        $valores = array_pad([], count($campos), "?");

        $query = $this->pdo->prepare("INSERT INTO PESSOA(". implode(",", $campos) .") VALUES(". implode(",", $valores) .")");
        
        
        try{
            $query->execute(array_values($array));        
        }catch(PDOException $e){
            die('ERROR: ' . $e->getMessage());
        }
        catch(Exception $e){
            die('ERROR: ' . $e->getMessage());
        }

        return "Cadastrado com Sucesso!";
    }

    public function verificador_de_cadastro($array){
        
            $teste = $this->pdo->prepare('SELECT ID FROM PESSOA WHERE EMAIL = :e OR TELEFONE = :t');
        
        try{
            $teste->execute([':e' => $array['email'], ':t' => $array['telefone']]);   
        }catch(PDOException $e){
            die('ERROR: ' . $e->getMessage());
        }
        catch(Exception $e){
            die('ERROR: ' . $e->getMessage());
        }

        $resposta_da_query = $teste->fetch(PDO::FETCH_ASSOC);
       
        
        if($resposta_da_query){
            return false;
        }

        return true;
    }


    public function excluir_pessoa($id){
        $query = $this->pdo->prepare("DELETE FROM PESSOA WHERE ID = :id");
        
        try{
            $query->execute([':id' => $id]);       
        }catch(PDOException $e){
            die('ERROR: ' . $e->getMessage());
        }
        catch(Exception $e){
            die('ERROR: ' . $e->getMessage());
        }
    }


    public function editar($id){
        $query = $this->pdo->prepare('SELECT id,nome,telefone,email FROM PESSOA WHERE ID = :id');
        $query->execute([':id' => $id]);

        $resposta_da_query = $query->fetch(PDO::FETCH_ASSOC);
        return $resposta_da_query;        
    }


    public function atualizar($array){
        
        $teste = $this->verificador_de_atualizacao(['email' => $array['email'], 'telefone' => $array['telefone'], 'id' => $array['id']]);
        
        if(!$teste){
            return "Email ou Telefone já existe!";
        }

        $query = $this->pdo->prepare("UPDATE PESSOA SET NOME = :n, TELEFONE = :t, EMAIL = :e WHERE ID = :id");
        
        
        try{
            $query->execute([':n' => $array['nome'],':t' => $array['telefone'],':e' => $array['email'],':id' => $array['id']]);        
        }catch(PDOException $e){
            die('ERROR: ' . $e->getMessage());
        }
        catch(Exception $e){
            die('ERROR: ' . $e->getMessage());
        }

        return "Atualizado com Sucesso!";
    }

    public function verificador_de_atualizacao($array){

            $teste = $this->pdo->prepare('SELECT ID FROM PESSOA WHERE (EMAIL = :e OR TELEFONE = :t) AND ID != :id');
        
        try{
            $teste->execute([':e' => $array['email'], ':t' => $array['telefone'], ':id' => $array['id'] ]);   
        }catch(PDOException $e){
            die('ERROR: ' . $e->getMessage());
        }
        catch(Exception $e){
            die('ERROR: ' . $e->getMessage());
        }

        $resposta_da_query = $teste->fetch(PDO::FETCH_ASSOC);
       
        
        if($resposta_da_query){
            return false;
        }

        return true;
    }


    public function buscar_dados(){
        $query = $this->pdo->query("SELECT * FROM PESSOA ORDER BY NOME ASC");
        $resposta_da_query = array();
        $resposta_da_query = $query->fetchAll(PDO::FETCH_ASSOC);
        return $resposta_da_query;
    }
}


?>
<?php

require(__DIR__ . '/../interfaces/usuario.interface.php');
require_once(__DIR__ . '/abstratas/TipoPessoa.class.php');
require_once(__DIR__ . '/abstratas/Crud.class.php');

class Usuario extends TipoPessoa implements iUsuario{
   
    protected $id;
    protected $nome;
    protected $cpf;
    protected $email;
    protected $objCrud;

    public function __construct(){
        parent::__construct();//executa o método construtor da classe que estou herdando, neste caso o construtor da classe TipoPessoa
        $this->objCrud = new Crud;
    }

    public function setDados(array $dados): bool{
        $this->id = $dados['id'] ?? null;
        $this->nome = $dados['nome'] ?? null;
        $this->cpf = $dados['cpf'] ?? null;//se for passado o vetor com indice cpf ele coloca lá na variável, se não coloca nulo;

        return true;
    }

    public function getAll(): array{
        $stmt = $this->prepare("SELECT * FROM usuario");
        
        $stmt->execute();
         
        return $stmt->fetchAll(); 
        
    }


    public function update(){
        $stmt = $this->prepare("UPDATE 
                                    usuario
                                SET
                                    nome = :nome, cpf = :cpf
                                WHERE
                                    id = :id");
        
        if($stmt->execute([ ':nome' => $this->nome,
                            ':cpf' => $this->cpf, 
                            ':id' => $this->id]
        )){
            return true;
        }
        return false;
    }

    public function delete($id): bool{
        if($id){
            
            $stmt = $this->prepare("DELETE FROM usuario WHERE id = :id");
            
            if( $stmt->execute( [':id'=>$this->id] ) ){
                return true;    
            }else{  
                return false;
            }
        }else{
            return false;
        }

    }

    public function inserir($dados){
        try{
            $this->nome = $dados['nome'];
            $this->cpf = $dados['cpf'];
            $this->email = $dados['email'];

            $stmt = $this->prepare("INSERT INTO usuario
                                        (nome, cpf, email)
                                    VALUES
                                        (:nome, :cpf, :email)");

            if($stmt->execute([':nome'=>$this->nome, ':cpf'=>$this->cpf, ':email'=>$this->email])){
                return true;
            }
        return false;
        }catch (PDOException $erro){
            return 'Erro: '.$erro->getMessage();
        }
    }

}

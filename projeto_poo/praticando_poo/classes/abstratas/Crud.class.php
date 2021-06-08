<?php

require_once 'DataBase.class.php';

class Crud extends Database {


    public function insert(){
        $stmt = $this->prepare("INSERT INTO usuario
                                    (nome, cpf)
                                VALUES
                                    (:nome,:cpf)");

        if($stmt->execute([':nome'=>$this->nome, ':cpf'=>$this->cpf])){
            return true;
        }
        return false;
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

    public function __construct(){
        parent::__construct();
    }
    
}
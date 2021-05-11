<?php

require('classes/Usuario.class.php');
require('classes/Fabricante.class.php');
require('classes/Avaliacao.class.php');

class Main {

    private $objUsuario;
    private $objAvaliacao;
    private $objFabricante;

    public function __construct(){
 
        $this->objUsuario = new Usuario;
        $this->objFabricante = new Fabricante;
        $this->objAvaliacao = new Avaliacao;
 
        $this->listaUsuarios();
    }

    private function listaUsuarios(){

        $listaCompleta = $this->objUsuario->getAll();
        require 'views/lista.php';
    }

     public function __destruct(){
 
     }
}

new Main; 

// TIREI OS MÉTODOS DE CRUD DE USUÁRIOS, VERIFICAR SE HÁ ARGUMENTO, 
// TRATAR DADOS E DE EXECUTAR OPERAÇÕES QUE ESTAVAM AQUI PARA PODEM 
// DISTRIBUIR AS RESPONSABILIDADES DE EXECUTAR OPERAÇÕES EM UMA OUTRA 
// CLASSE QUE EXECUTA OPERAÇÕES DE USUÁRIOS, DISTRIBUINDO ASSIM AS 
// TAREFAS E SIMPLIFICANDO O CÓDIGO AQUI, PARA FUTURAS CHAMADAS DE 
// OUTRAS COISAS TAMBÉM, O MÉTODO LISTA USUÁRIO PERMANECE AQUI POIS 
// MEU INDEX COMEÇA COM ELE; ESTOU VERIFICANDO SE VOU TIRÁ-LO TAMBÉM



/**
 * Tabelas do banco:
 * 
 * Usuários
 * +-------+--------------+------+-----+---------+----------------+
 * | Field | Type         | Null | Key | Default | Extra          |
 * +-------+--------------+------+-----+---------+----------------+
 * | id    | int(11)      | NO   | PRI | NULL    | auto_increment |
 * | nome  | varchar(200) | YES  |     | NULL    |                |
 * | email | varchar(255) | YES  |     | NULL    |                |
 * | senha | varchar(255) | YES  |     | NULL    |                |
 * +-------+--------------+------+-----+---------+----------------+
 * 
 * 
 * Avaliação
 * +------------+--------------+------+-----+---------+----------------+
 * | Field      | Type         | Null | Key | Default | Extra          |
 * +------------+--------------+------+-----+---------+----------------+
 * | id         | int(11)      | NO   | PRI | NULL    | auto_increment |
 * | nota       | int(11)      | YES  |     | NULL    |                |
 * | explicacao | varchar(255) | YES  |     | NULL    |                |
 * +------------+--------------+------+-----+---------+----------------+ 
 * 
 * Fabricantes
 * +------------+---------------------+------+-----+---------+----------------+
 * | Field      | Type                | Null | Key | Default | Extra          |
 * +------------+---------------------+------+-----+---------+----------------+
 * | id_usuario | bigint(20) unsigned | NO   | PRI | NULL    | auto_increment |
 * | cnpj       | bigint(20)          | YES  |     | NULL    |                |
 * | nome       | char(255)           | YES  |     | NULL    |                |
 * +------------+---------------------+------+-----+---------+----------------+
 *
 * */
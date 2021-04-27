<?php

require('classes/Usuario.class.php');
require('classes/Fabricante.class.php');
require('classes/Avaliacao.class.php');

class Main {

    private $objUsuario;
    private $objAvaliacao;
    private $objFabricante;

    public function __construct(){
        echo "\n\n --- COMEÇO DO PROGRAMA --- \n\n"; 
 
        $this->objUsuario = new Usuario;
        $this->objFabricante = new Fabricante;
        $this->objAvaliacao = new Avaliacao;
 
         $this->listaTudo();

         $this->verificaSeExisteArgumento(1);
         $this->executaOperacao($_SERVER['argv'][1]);
     }
 
     private function executaOperacao(string $operacao){
         switch ($operacao) {// pega o segundo argunmento passado pelo usuario via linha de comando (o primeiro argumento é o próprio arquivo)
             case 'gravaUsuario':
                 $this->gravaUsuario();
                 break;
 
             case 'editaUsuario':
                 $this->editaUsuario();
                 break;
             
             case 'listaUsuario':
                 $this->listaUsuario();
                 break;
 
             case 'apagaUsuario':
                 $this->apagaUsuario();
                 break;
            
             case 'listaTudo':
                 $this->listaTudo();
                 break;

             default:
                 echo "Não existe a funcionalidade {$_SERVER['argv'][1]}";
         }
     }

     private function listaTudo(){

        $listaCompleta = $this->objUsuario->getAll();
        require 'views/lista.php';
        

     }
 
     private function apagaUsuario(){
 
         $dados = $this->tratarDados();
         $this->objUsuario->setDados($dados);
         
         if( $this->objUsuario->delete() ){
             echo "\n\nUsuário apagado com sucesso!\n\n";
         }else{
             echo "\n\nErro ao tentar apagar usuario, você enviou o ID?\n\n";
         }
     }
     
     private function listaUsuario(){
         $lista = $this->objUsuario->getAll();
 
         foreach($lista as $usuario){
             echo "{$usuario['id']}\t{$usuario['nome']}\t{$usuario['cpf']}\n";
         }
     }
 
     private function editaUsuario(){
 
         $dados = $this->tratarDados();
 
         $this->objUsuario->setDados($dados);
 
         if($this->objUsuario->gravarDados()){
             echo "usuario editado com sucesso";
         }
     }
 
 
     private function gravaUsuario(){
         $dados = $this->tratarDados();
 
         $this->objUsuario->setDados($dados);
 
         if($this->objUsuario->gravarDados()){
             echo "usuario gravado com sucesso";
         }
     }
 
     private function verificaSeExisteArgumento(int $numArg){
         
         if(!isset($_SERVER['argv'][$numArg])){  
             
             if( $numArg == 1){ 
                 $msg  = "PARA UTILIZAR O PROGRAMA DIGITE: \nphp estoque.php [operacao]";
             }else{
                 $msg = "PARA UTILIZAR O PROGRAMA DIGITE: \nphp estoque.php [operacao] [dado=valor,dado2=valor2]";
             }
             echo "\n\nERRO: $msg\n\n";
             exit();
         }
     }
 
     private function tratarDados(){
         
         $this->verificaSeExisteArgumento(2);
         
         $args = explode(',',$_SERVER['argv'][2]); //dados passados pelo usuário na linha de comando, explode para separar os dados em um array, com um delimitador escolhido por nós, neste caso ','
 
         foreach($args as $valor){
             
             $arg = explode('=', $valor);
             $dados[$arg[0]] = $arg[1];
         }
         return $dados;
     }
 
 
 
     public function __destruct(){
 
         sleep(1);
 
         echo "\n\n --- FIM DO PROGRAMA --- \n\n"; 
     }
}

new Main; 




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
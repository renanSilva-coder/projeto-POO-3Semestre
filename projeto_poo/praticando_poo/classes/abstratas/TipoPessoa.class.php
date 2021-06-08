<?php

require_once 'Crud.class.php';

abstract class TipoPessoa extends Crud{

    protected $id;
    protected $nome;

    public function __construct(){
        parent::__construct();
    }

}
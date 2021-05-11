<?php

interface iAvaliacao{
    public function setDados(array $dados): bool;
    public function getDados(int $id_avaliacao): array;
}
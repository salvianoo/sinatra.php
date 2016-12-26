<?php

class Artist
{
    private $nome;

    public function __construct($options)
    {
        $this->nome = $options['nome'] ?? null;
    }

    public function getNome()
    {
        return $this->nome;
    }
}

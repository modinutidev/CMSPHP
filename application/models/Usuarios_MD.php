<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
    id_usuario int(11) not null auto_increment,
    nome varchar(255) not null,
    sobrenome varchar(255) not null,
    email varchar(100) not null unique,
    senha varchar(100) not null,
    primary key(id_usuario)
*/

class Usuarios_MD extends CI_Model {

    public function none(){
        echo('Model');
    }

    public function inserir($data) {
        $usuario = array(
            'nome' => $data['nome'],
            'sobrenome' => $data['sobrenome'],
            'email' => $data['email'],
            'senha' => sha1($data['senha'])
        );
        #var_dump($usuario);
        $this->db->insert('usuarios', $usuario);
    }

}
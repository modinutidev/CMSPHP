<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
    id_contato int(11) not null auto_increment,
    nome varchar(100) not null,
    email varchar(100) not null,
    telefone varchar(30) not null,
    mensagem varchar(255) not null,
    ip varchar(255) not null,
    data DATETIME DEFAULT CURRENT_TIMESTAMP,
    primary key (id_contato)
*/

class Contatos_MD extends CI_Model {

    public function none(){
        echo('Model');
    }

    public function inserir($data) {
        $contato = array(
            'nome' => $data['nome'],
            'email' => $data['email'],
			'telefone' => $data['telefone'],
            'mensagem' => $data['mensagem'],
            'ip' => $this->input->ip_address()
        );
        #var_dump($contato);
        $this->db->insert('contatos', $contato);
    }

}
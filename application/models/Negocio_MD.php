<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
    id_negocio int(11) not null auto_increment,
    nome varchar(100) not null,
    sobre text(1000),
    endereco varchar(255),
    email varchar(100) not null,
    tel_fixo varchar(30),
    tel_movel varchar(30),
    primary key (id_negocio)
*/

class Negocio_MD extends CI_Model {

    public function none(){
        echo('Model');
    }

    public function inserir($data) {
        $negocio = array(
            'nome' => $data['nome'],
            'sobre' => $data['sobre'],
            'endereco' => $data['endereco'],
            'email' => $data['email'],
            'tel_fixo' => $data['tel_fixo'],
            'tel_movel' => $data['tel_movel']
        );
        #var_dump($negocio);
        $this->db->insert('negocio', $negocio);
    }

    public function selecionar() {
        $this->db->where('id_negocio', 1);
        $query = $this->db->get('negocio');
        return $query->result_array();
    }

}
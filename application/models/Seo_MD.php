<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
    id_seo int(11) not null auto_increment,
    titulo varchar(255) not null,
    descricao varchar(255),
    palavraschaves varchar(255),
    primary key (id_seo)
*/

class Seo_MD extends CI_Model {

    public function none(){
        echo('Model');
    }

    public function inserir($data) {

        $seo = array(
            'titulo' => $data['titulo'],
            'descricao' => $data['descricao'],
            'palavraschaves' => $data['palavraschaves']
        );
        #var_dump($seo);
        $this->db->insert('seo', $seo);
    }

    public function selecionar() {
        $this->db->where('id_seo', 1);
        $query = $this->db->get('seo');
        return $query->result_array();
    }

}
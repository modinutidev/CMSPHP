<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* 
    id_imagem int(11) not null auto_increment,
    id_album int(11) not null,
    arquivo_nome varchar(255) not null,
    titulo varchar(255),
    tags varchar(255),
    descricao varchar(255),
    posicao int(11),
    destaque bool,
    ativo bool not null,
    primary key (id_imagem),
    foreign key (id_album) references albuns (id_album)
    on delete cascade
    on update cascade
*/

class Imagens_MD extends CI_Model {

    public function none(){
        echo('Model');
    }

    public function inserir($data){
        $imagem = array(
            'id_album'      => $data['id_album'],
            'arquivo_nome'  => $data['arquivo_nome'],
            'titulo'        => $data['titulo'],
            'tags'          => $data['tags'],
            'descricao'     => $data['descricao'],
            'posicao'       => $data['posicao'],
            'destaque'      => $data['destaque'],
            'ativo'         => $data['ativo']
        );

        $this->db->insert('imagens',$imagem);
        $id = $this->db->insert_id();
        $data = $this->selecioneId($id);
        return $data;
    }

    public function selecioneId($id) {
        $this->db->where('id_imagem', $id);
        $query = $this->db->get('imagens');
        return $query->result_array();
    }

    public function defaultImage($data) {
        $img_default = array(
            'id_album'      => $data['id_album'],
            'arquivo_nome'  => $data['arquivo_nome'],
            'titulo'        => $data['titulo'],
            'tags'          => $data['tags'],
            'descricao'     => $data['descricao'],
            'posicao'       => $data['posicao'],
            'destaque'      => $data['destaque'],
            'ativo'         => $data['ativo']
        );
        #var_dump($img_default);
        $this->db->insert('imagens', $img_default);
    }

    public function imagensAlbum($idAlbum) {
        $this->db->where('id_album', $idAlbum);
        $query = $this->db->get('imagens');
        return $query->result_array();
    }

}
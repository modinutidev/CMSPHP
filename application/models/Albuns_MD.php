<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
    id_album int(11) not null auto_increment,
    nome varchar(100) not null,
    url varchar(255) not null unique,
    tags varchar(255) not null,
    posicao int(11),
    editavel bool not null,
    ativo bool not null,
    primary key (id_album)
*/

class Albuns_MD extends CI_Model {

    public function none(){
        echo('Model');
    }

    public function inserir($data) {
        $album = array(
            'nome' => $data['nome'],
            /* Converte o nome para url amigável */
			'url' => url_title(strtolower(convert_accented_characters($data['nome']))),
            /* Se a função não receber a variavel tags ela asumira como o nome */
			'tags' => (!empty($data['tags'])) ? strtolower(convert_accented_characters($data['tags'])) : strtolower(convert_accented_characters($data['nome'])),
            /* Se a função não receber a variavel posicao ela asumira como 0 */
            'posicao' => (!empty($data['posicao'])) ? $data['posicao'] : 0,
            /* Se a função não receber a variavel editavel ela asumira como 1 */
            'editavel' => (!empty($data['editavel'])) ? $data['editavel'] : 1,
            /* Se a função não receber a variavel ativo ela asumira como 0 */
			'online' => (!empty($data['online'])) ? $data['online'] : 0
        );
        #var_dump($album);
        $this->db->insert('albuns', $album);
        $id = $this->db->insert_id();
        $data = $this->selecioneId($id);
        return $data;
    }

    public function selecioneId($id) {
        $this->db->where('id_album', $id);
        $query = $this->db->get('albuns');
        return $query->result_array();
    }

    public function selecionar($editavel = null) {
        $editavel == null ?: $this->db->where('editavel', $editavel);
        $query = $this->db->get('albuns');
        return $query->result_array();
    }

    public function editar($data){
        $this->db->set('nome',$data['nome']);
        $this->db->set('url',null);
        $this->db->set('tags',$data['tags']);
        $this->db->set('posicao',$data['posicao']);
        $this->db->set('online',$data['online']);
        $this->db->update('albuns');
    }

}
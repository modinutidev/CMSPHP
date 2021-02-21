<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banco_MD extends CI_Model {

    public function none(){
        echo('Model');
    }
    
    #Função responsável por criar as tabelas no banco de dados
    public function criarTabelas () {
        $albuns = 
        'create table albuns(
            id_album int(11) not null auto_increment,
            nome varchar(100) not null,
            url varchar(255) not null unique,
            tags varchar(255) not null,
            posicao int(11),
            editavel tinyint(1) not null,
            online tinyint(1) not null,
            primary key (id_album)
        );';

        $imagens = 
        'create table imagens(
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
        );';

        $contatos = 
        'create table contatos(
            id_contato int(11) not null auto_increment,
            nome varchar(100) not null,
            email varchar(100) not null,
            telefone varchar(30) not null,
            mensagem varchar(255) not null,
            ip varchar(255) not null,
            data DATETIME DEFAULT CURRENT_TIMESTAMP,
            primary key (id_contato)
        );';

        $negocio = 
        'create table negocio(
            id_negocio int(11) not null auto_increment,
            nome varchar(100) not null,
            sobre text(1000),
            endereco varchar(255),
            email varchar(100) not null,
            tel_fixo varchar(30),
            tel_movel varchar(30),
            primary key (id_negocio)
        )';

        $seo = 
        'create table seo(
            id_seo int(11) not null auto_increment,
            titulo varchar(255) not null,
            descricao varchar(255),
            palavraschaves varchar(255),
            primary key (id_seo)
        );';
        
        $usuarios = 
        'create table usuarios(
            id_usuario int(11) not null auto_increment,
            nome varchar(255) not null,
            sobrenome varchar(255) not null,
            email varchar(100) not null unique,
            senha varchar(100) not null,
            primary key(id_usuario)
        );';

        $this->db->table_exists('albuns')       ?: $this->db->query($albuns);
        $this->db->table_exists('imagens')      ?: $this->db->query($imagens);
        $this->db->table_exists('contatos')     ?: $this->db->query($contatos);
        $this->db->table_exists('negocio')      ?: $this->db->query($negocio);
        $this->db->table_exists('seo')          ?: $this->db->query($seo);
        $this->db->table_exists('usuarios')     ?: $this->db->query($usuarios);
        return $this->db->affected_rows();
    }

}
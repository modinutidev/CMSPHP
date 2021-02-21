<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instalacao_CT extends CI_Controller {

    public function none() {
        echo('Controller');
    }

    public function configura_tabelas() {
        $this->load->Model('Banco_MD','banco');
        $this->banco->criarTabelas();
    }

    public function configura_projeto() {
        #Models
        $this->load->Model('Usuarios_MD','usuarios');
        $this->load->Model('Seo_MD','seo');
        $this->load->Model('Negocio_MD','negocio');
        $this->load->Model('Albuns_MD','albuns');
        $this->load->Model('Contatos_MD','contatos');
        $this->load->Model('Imagens_MD','imagens');

        #Dados
        $projeto = array(
            'usuario' => array(
                'nome'=>'Web',
                'sobrenome'=>'Master',
                'email'=>'modinutidev@gmail.com',
                'senha'=>'modinutidev@gmail.com'
            ),
            'seo' => array(
                'titulo' => 'ModinutiDev',
                'descricao' => 'Este website é gerenciado por ModinutiDev.',
                'palavraschaves' => 'modinutidev desenvolvimento gerenciamento developer'
            ),
            'negocio' => array(
                'nome' => 'ModinutiDev',
                'sobre' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ex mauris, aliquam vel massa et, feugiat rhoncus ex. Nullam vestibulum sapien non diam iaculis, a fermentum mi scelerisque. Suspendisse porttitor, nibh vel lobortis sodales, lacus justo auctor sem, eu ultricies lorem dui sed neque. Phasellus nec mi a mi finibus rutrum vitae vitae ex. Etiam ullamcorper sit amet arcu nec tincidunt. Praesent varius pellentesque quam, eu lacinia ipsum aliquet nec. Vestibulum efficitur laoreet venenatis. Sed dapibus, dui eu ullamcorper tempus, felis purus auctor eros, in pellentesque mauris metus sed ligula.',
                'endereco' => 'Rua Juscelino Kubitschek, 0, Centro, Londrina PR.',
                'email' => 'modinutidev@gmail.com',
                'tel_fixo' => '43 3333-3333',
                'tel_movel' => '43 99999-9999',
            ),
            'album_banners' => array(
                'nome' => 'Banners',
                'tags' => 'banners website default',
                'posicao' => 0,
                'editavel' => 0,
                'online' => 1
            ),
            'album_negocio' => array(
                'nome' => 'Negócio',
                'tags' => 'negócio website default',
                'posicao' => 0,
                'editavel' => 0,
                'online' => 1
            ),
            'contato' => array(
                'nome' => 'ModinutiDev',
                'email' => 'modinutidev@gmail.com',
                'telefone' => '43 99999-9999',
                'mensagem' => 'Seja bem vindo ao nosso novo sistema de gerenciamento de conteúdo. Com ele você pode modificar seu website com poucos cliques.'
            ),
            'img_banners_default' => array(
                'id_album' => 1,
                'titulo' => 'Imagem de amostra',
                'arquivo_nome' => 'default-banner.jpg',
                'tags' => 'default demostração demo imagem image',
                'descricao' => 'Imagem de amostra.',
                'posicao' => 0,
                'destaque' => 1,
                'ativo' => 1
            ),
            'img_negocio_default' => array(
                'id_album' => 2,
                'titulo' => 'Imagem de amostra',
                'arquivo_nome' => 'default-negocio.jpg',
                'tags' => 'default demostração demo imagem image',
                'descricao' => 'Imagem de amostra.',
                'posicao' => 0,
                'destaque' => 1,
                'ativo' => 1
            )

        );

        $this->usuarios->inserir($projeto['usuario']);
        $this->seo->inserir($projeto['seo']);
        $this->negocio->inserir($projeto['negocio']);
        $this->albuns->inserir($projeto['album_banners']);
        $this->albuns->inserir($projeto['album_negocio']);
        $this->contatos->inserir($projeto['contato']);
        $this->imagens->defaultImage($projeto['img_banners_default']);
        $this->imagens->defaultImage($projeto['img_negocio_default']);
    }

    public function configura() {
        $this->configura_tabelas();
        $this->configura_projeto();
    }
}
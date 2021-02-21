<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio_CT extends CI_Controller {

    public function index() {
        $this->load->Model('Seo_MD','seo');
        $this->load->Model('Negocio_MD','negocio');
        $this->load->Model('Albuns_MD','albuns');
        $this->load->Model('Imagens_MD','imagens');
        
        $seo = $this->seo->selecionar();
        $negocio = $this->negocio->selecionar();
        
        $albunsSite = $this->albuns->selecionar(0);
        #var_dump($albunsSite);
        $albuns = $this->albuns->selecionar(1);
        #var_dump($albuns);

        foreach($albuns as $album) {
            #var_dump($album);
            echo('<h1>'.$album['nome'].'</h1>');
            $imagens = $this->imagens->imagensAlbum($album['id_album']);
            #var_dump($imagens);
            foreach($imagens as $imagem) {
                echo($imagem['arquivo_nome']);
            }
        }

        #echo($albuns[0]['id_album']);
        #$imagens = $this->imagens->imagensAlbum($albuns[0]['id_album']);
        #var_dump($imagens); 



        #var_dump($negocio);
        #echo($negocio[0]['tel_movel']);
        #var_dump($seo);
        #echo($seo[0]['palavraschaves']);

        $this->load->Model('');
        #echo('Aqui de devo trazer todos os dados para a view!');
    }

}
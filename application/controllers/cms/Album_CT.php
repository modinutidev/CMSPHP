<?php

class Album_CT extends CI_Controller {

    public function index($id) {
        #Carrega modelo albuns
        $this->load->model('Albuns_MD','albuns');
        #Carrega modelo imagens
        $this->load->model('Imagens_MD','imagens');
        #Armazena os dados
        $data = Array(
            'albumInfo' => $this->albuns->selecioneId($id),
            'imagens' => $this->imagens->imagensAlbum($id)
        );
        #Renderiza views
        $this->load->view('cms/header');
        $this->load->view('cms/album', $data);
        $this->load->view('cms/footer');
    }


    // public function inserir() {
        
    //     /* se eu faço da forma que esta devo mandar corretamente os dados do view, se mais controles de dados */
        
        
    //     $data = $this->input->post(null, false);
    //     // var_dump($data);

    //     $teste = array(
    //         'nome'      => $this->input->post('nome'),
    //         'descricao' => $this->input->post('descricao'),
    //         'posicao'   => $this->input->post('posicao'),
    //         'editavel'  => $this->input->post('editavel'),
    //         'tags'      => $this->input->post('tags'),
    //         'online'    => $this->input->post('online')
    //     );
    //     // var_dump($teste);

    //     $this->load->model('Albuns_MD','albuns');
    //     $result = $this->albuns->inserir($teste);
    //     # Retorna último registro
    //     echo json_encode($result);
    // }

}
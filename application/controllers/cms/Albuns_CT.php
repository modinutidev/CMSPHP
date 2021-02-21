<?php

class Albuns_CT extends CI_Controller {

    public function index() {

        $this->load->model('Albuns_MD','albuns');
        $data['albuns'] = $this->albuns->selecionar(0);

        // var_dump($albuns);
        $this->load->view('cms/header');
        $this->load->view('cms/albuns', $data);
        // $this->load->view('cms/albuns-modal');
        $this->load->view('cms/footer');
    }


    public function inserir() {
        
        /* se eu faço da forma que esta devo mandar corretamente os dados do view, se mais controles de dados */
        
        
        $data = $this->input->post(null, false);
        // var_dump($data);

        $teste = array(
            'nome'      => $this->input->post('nome'),
            'descricao' => $this->input->post('descricao'),
            'posicao'   => $this->input->post('posicao'),
            'editavel'  => $this->input->post('editavel'),
            'tags'      => $this->input->post('tags'),
            'online'    => $this->input->post('online')
        );
        // var_dump($teste);

        $this->load->model('Albuns_MD','albuns');
        $result = $this->albuns->inserir($teste);
        # Retorna último registro
        echo json_encode($result);
    }

}
<?php

class Imagens_CT extends CI_Controller {

    public function inserir() {

        $conf = array(
            'upload_path' => FCPATH.'uploads/albuns',
            'allowed_types' => 'png|gif|jpg|jpeg'
        );
        $this->upload->initialize($conf);
        
        if(!$this->upload->do_upload('imagem')){
            alert($this->upload->display_errors('',''));
        } else {
            $data = array(
                'arquivo_nome' 	=> $this->upload->data('file_name'),
                'titulo'		=> $this->input->post('titulo'),
                'tags'			=> $this->input->post('tags'),
                'descricao' 	=> $this->input->post('descricao'),
                'id_album' 		=> $this->input->post('id_album'),
                'posicao'		=> $this->input->post('posicao'),
                'destaque'		=> $this->input->post('destaque'),
                'ativo'			=> $this->input->post('ativo')
            );

            $this->load->Model('Imagens_MD','imagens');
            $result = $this->imagens->inserir($data);
            
            // Imprime o último registro
            echo json_encode($result);
        }

    }

}
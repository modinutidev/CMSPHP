<?php 
#var_dump($imagens) 
?>

<div class="ui container">
    <div class="ui grid">
		<div class="six wide column">
			<h1><a href="../albuns">Albuns</a> / Album <?= $albumInfo[0]['nome'] ?></h1>
		</div>
		<div class="ten wide column">
			<button class="ui button right floated" id="anexar">Anexar imagem</button>
			<button class="ui button right floated" id="edit-album">Editar</button>
			<button class="ui button right floated" id="excluir">Excluir</button>
		</div>
	</div>
    <div class="ui grid">
        <div class="sixteen wide column">

            <div class="ui segment">
                <form class="ui form" id="info-album">
                    <div class="fields">
                        <div class="eight wide field">
                            <label>Nome</label>
                            <input name="nome" type="text" value="<?= $albumInfo[0]['nome'] ?>" disabled>
                        </div>
                        <div class="eight wide field">
                            <label>URL</label>
                            <input name="url" type="text" value="<?= $albumInfo[0]['url'] ?>" disabled>
                        </div>
                    </div>
                    <div class="fields">
                        <div class="eight wide field">
                            <label>Tags</label>
                            <input name="tags" type="text" value="<?= $albumInfo[0]['tags']?>" disabled>
                        </div>
                        <div class="four wide field">
                            <label>Editável</label>
                            <select name="editavel" class="ui dropdown" disabled>
                                <option value="0" <?= $albumInfo[0]['editavel'] == '0' ? 'selected' : '' ?> >Não</option>
                                <option value="1" <?= $albumInfo[0]['editavel'] == '1' ? 'selected' : '' ?> >Sim</option>
                            </select>
                        </div>
                        <div class="four wide field">
                            <label>Online</label>
                            <select name="online" class="ui dropdown" disabled>
                                <option value="0" <?= $albumInfo[0]['online'] == '0' ? 'selected' : '' ?> >Não</option>
                                <option value="1" <?= $albumInfo[0]['online'] == '1' ? 'selected' : '' ?> >Sim</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="sixteen wide column">
        
        
            <table class="ui celled padded table">
                <thead>
                    <tr>
                        <th class="single line center aligned">#</th>
                        <th>Imagem</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Tags</th>
                        <th class="single line center aligned">Posição</th>
                        <th class="single line center aligned">Destaque</th>
                        <th class="single line center aligned">Ativo</th>
                        <th class="single line center aligned">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($imagens as $imagem) { ?>
                    <tr>
                        <td class="single line center aligned"><b><?= $imagem['id_imagem'] ?></b></td>
                        <td><img src="<?= base_url('/uploads/albuns/'.$imagem['arquivo_nome'])?>" alt="<?= $imagem['titulo'] ?>" style="width: 100px;"></td>
                        <td><?= $imagem['titulo'] ?></td>
                        <td><?= $imagem['descricao'] ?></td>
                        <td><?= $imagem['tags'] ?></td>
                        <td class="single line center aligned"><?= $imagem['posicao'] ?></td>
                        <td class="single line center aligned"><?= $imagem['destaque'] == '1' ? 'Sim' : 'Não' ?></td>
                        <td class="single line center aligned"><?= $imagem['ativo'] == '1' ? 'Sim' : 'Não' ?></td>
                        <td class="single line center aligned">
                            <button class="ui button primary"><i class="pencil alternate icon"></i></button>
                            <button class="ui button red"><i class="trash icon"></i></button>
                        </td>
                    </tr>
                    <?php } ?>

                </tbody>

                <tfoot>
                    <!-- <tr>
                        <th colspan="8">
                            <div class="ui right floated pagination menu">
                                <a class="icon item">
                                    <i class="left chevron icon"></i>
                                </a>
                                <a class="item">1</a>
                                <a class="item">2</a>
                                <a class="item">3</a>
                                <a class="item">4</a>
                                <a class="icon item">
                                    <i class="right chevron icon"></i>
                                </a>
                            </div>
                        </th>
                    </tr> -->
                </tfoot>

            </table>


        </div>
    </div>
</div>


<!-- modal anexar -->
<div class="ui modal tiny" id="modal-anexar">
    <div class="header">
      ANEXAR IMAGEM
    </div>
    <div class="content">
        <form class="ui form" id="new-image" enctype="multipart/form-data">
            <div class="field">
                <label>Arquivo</label>
                <input name="imagem" type="file" accept="image/*" />
            </div>
            <div class="field">
                <label>Título</label>
                <input name="titulo" type="text" value="" />
            </div>
            <div class="field">
                <label>Descrição</label>
                <textarea name="descricao" cols="30" rows="4"></textarea>
            </div>
            <div class="field">
                <label>Tags</label>
                <input name="tags" type="text" value="" />
            </div>
            <div class="fields">
                <div class="field">
                    <label>Posição</label>
                    <input name="posicao" type="number" value="1" />
                </div>
                <div class="field">
                    <label>Destaque</label>
                    <select name="destaque">
                        <option value="0" selected>Não</option>
                        <option value="1">Sim</option>
                    </select>
                </div>
                <div class="field">
                    <label>Online</label>
                    <select name="ativo">
                        <option value="0" selected>Não</option>
                        <option value="1">Sim</option>
                    </select>
                </div>
            </div>
            <div class="field">
                <input type="text" name="id_album" value="<?= $albumInfo[0]['id_album']?>" hidden>
            </div>
        </form>
    </div>
    <div class="actions">
        <button class="ui button" id="cancel-insert-new-image">Cancelar</button>
        <button class="ui button green" id="insert-new-image">Adicionar</button>
    </div>
</div>

<!-- modal excluir -->
<div class="ui modal mini" id="modal-excluir">
    <div class="header">EXCLUIR O ALBUM?</div>
    <div class="content">
        Ao excluir o album todas as imagens e suas definições serão perdidas!
    </div>
    <div class="actions">
        <button id="delete-album" class="ui button red">Excluir</button>
        <button id="cancel-delete-album" class="ui button">Cancelar</button>
    </div>
    <!-- fim actions -->
</div>


<script>

$(document).on('click', '#edit-album', function() {

    // apresenta função no log
    console.log('function edit album')

    // desabilitar o botão temporariamente
    $(this).prop('disabled', true)
    $('button#excluir').prop('disabled', true)
    $('button#anexar').prop('disabled', true)


    // adicionar novos alementos
    $('<div>').attr('id','acoes').addClass('fields').prepend(
        $('<div>').addClass('sixteen wide field').prepend(
            $('<button>').attr('id','save-info-album').addClass('ui button green right floated').html('Salvar'),
            $('<button>').attr('id','cancel-save-info-album').addClass('ui button right floated').html('Cancelar')
        )
    ).appendTo('form#info-album')

    // habilita inputs para edição
    $("input[name='nome'], input[name='tags'], select[name='online']").prop('disabled', false)

})

$(document).on('click', '#info-album #cancel-save-info-album', function(event) {
    
    // cancelar evento padrao do formulário
    event.preventDefault()

    // apresenta função no log
    console.log('function cancel edit album')

    // habilita o botão editar
    $('button#edit-album, button#excluir, button#anexar').prop('disabled', false)

    // restaura valores dos inputs
    $("#info-album input[name='nome']").val('<?= $albumInfo[0]['nome'] ?>')
    $("#info-album input[name='tags']").val('<?= $albumInfo[0]['tags'] ?>')
    $("#info-album select[name='online']").val('<?= $albumInfo[0]['online'] ?>')
    
    // desabilita edição de inputs
    $("#info-album input[name='nome'], #info-album input[name='tags'], #info-album select[name='online']").prop('disabled', true)

    // remover botões
    $('#info-album #acoes').remove()

})

$(document).on('click', '#info-album #save-info-album', function(event) {
    
    // cancelar evento padrao do formulário
    event.preventDefault()

    // apresenta função no log    
    console.log('salvar novas informações do album')

    // habilita o botão editar
    $('button#edit-album, button#excluir, button#anexar').prop('disabled', false)

    // desabilita inputs
    $("#info-album input[name='nome'], #info-album input[name='tags'], #info-album select[name='online']").prop('disabled', true)

    // remover botões
    $('#info-album #acoes').remove()

})

// function reset inputs modal new image
function resetNewImage(){
   
    // select inputs
    let inputs = $('form#new-image input, form#new-image textarea')
   
    // limpa todos os inputs
    $(inputs).val('')
    
    // restaura valores dos inputs
    $("form#new-image input[name='posicao']").val('1')
    $("form#new-image input[name='id_album']").val('<?= $albumInfo[0]['id_album']?>')

    // select selects
    let selects = $('form#new-image select')
    
    // set value    
    $(selects).val(0)

}

// cancel insert new image
$(document).on('click', '#cancel-insert-new-image', function() {
    
    // hide modal
    $('.ui.modal').modal('hide')
    
    // reset
    resetNewImage()
    
    // print function console
    console.log('cansel insert new image')

})

// insert new image
$(document).on('click', '#insert-new-image', function(event) {
    
    // cancel default event
    event.preventDefault()
    
    // selector inputs
    var inputs = $('form#new-image input, form#new-image textarea, form#new-image select')
    
    // variaval auxiliar
    var errors = 0

    // verifica valores do formulário
    $(inputs).each(function() {
        
        if(this.value){
            // remove error class
            $(this).parent().removeClass('error')

        } else {
            // include error class in parent
            $(this).parent().addClass('error')
            // sum the errors
            errors++
        }

    })
    // write number of errors
    console.log('errors:'+errors)

    // check variable errors and start function incluir
    errors === 0 ? incluir() : null

    // increment incluir function
    function incluir(){
        var data = new FormData($('form#new-image')[0])
        $.ajax({
            data: data,
            url: 'anexar-imagem',
            type: 'POST',
            contentType: false,
            processData: false,
            success: function(result) {
                // hide modal
                $('.ui.modal').modal('hide')

                // convert result in json
                var registro = JSON.parse(result)

                // base url
                var baseUrl = '<?= base_url('/uploads/albuns/') ?>'

                // write new item list
                $('<tr>').prepend(
                    $('<td>').addClass('single line center aligned').prepend(
                        $('<b>').text(registro[0]['id_imagem'])
                    ),
                    $('<td>').prepend(
                        $('<img>').attr('src',baseUrl+registro[0]['arquivo_nome'],'alt','',).css('width','100px')
                    ),
                    $('<td>').text(registro[0]['titulo']),
                    $('<td>').text(registro[0]['descricao']),
                    $('<td>').text(registro[0]['tags']),
                    $('<td>').addClass('single line center aligned').text(registro[0]['posicao']),
                    $('<td>').addClass('single line center aligned').text(registro[0]['destaque'] == 0 ? 'Não' : 'Sim'),
                    $('<td>').addClass('single line center aligned').text(registro[0]['ativo'] == 0 ? 'Não' : 'Sim'),
                    $('<td>').addClass('single line center aligned').prepend(
                        $('<button>').addClass('ui button primary').prepend(
                            $('<i>').addClass('pencil alternate icon'),
                        ),
                        $('<button>').addClass('ui button red').prepend(
                            $('<i>').addClass('trash icon'),
                        )
                    )
                ).appendTo('tbody')

                // print new register
                console.log(registro)

                // reset
                resetNewImage()
            }
        })
    }

})


$(document).on('click', '#cancel-delete-album', function() {
    console.log('fun')
    $('.ui.modal').modal('hide')
})

$(document).on('click','#delete-album', function() {
    console.log('fun')
})


// FUNÇÕES QUE PRECISO AJUSTAR


// Ação em botão dinamico
$(document).on('click','#salvar',function(){
    event.preventDefault()
    alert('teste')
    $('#editar').prop('disabled', false)
    $('#acao').remove()
})

$('#excluir').click(function(){
    console.log('Excluir')
    $('#modal-excluir').modal('show')
})

$('#anexar').click(function(){
    console.log('Anexar')
    $('#modal-anexar').modal('show')
})

</script>
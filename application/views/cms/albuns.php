<div class="ui container">

	<div class="ui grid">
		<div class="six wide column">
			<h1>Albuns</h1>
		</div>
		<div class="ten wide column">
			<button class="ui button green right floated" id="novo">Novo</button>
		</div>
	</div>

	<div class="ui grid">
		<div class="sixteen wide column">

            <table class="ui celled padded table selectable">
                <thead>
                    <tr>
                        <th class="single line center aligned">#</th>
                        <th>Nome</th>
                        <th>URL</th>
                        <th>Tags</th>
                        <th class="single line center aligned">Posição</th>
                        <th class="single line center aligned">Editável</th>
                        <th class="single line center aligned">Online</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach($albuns as $album) { ?>    
                    <tr idAlbum="<?= $album['id_album']?>">
                        <td class="single line center aligned"><b><?= $album['id_album']?></b></td>
                        <td class="single line"><?= $album['nome'] ?></td>
                        <td class="single line"><?= $album['url'] ?></td>
                        <td><?= $album['tags'] ?></td>
                        <td class="single line center aligned"><?= $album['posicao']?></td>
                        <td class="single line center aligned"><?= $album['editavel'] == '1' ? 'Sim' : 'Não' ?></td>
                        <td class="single line center aligned"><?= $album['online'] == '1' ? 'Sim' : 'Não' ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
		</div>
	</div>
</div>

<div class="ui modal tiny">
    <div class="header">
        NOVO ALBUM
    </div>
    <!-- fim header -->
    <div class="content">
        <form class="ui form">
            <div class="field">
                <label>Nome</label>
                <input type="text" name="nome" />
            </div>
            <!-- fim field -->
            <div class="field">
                <label>Tags</label>
                <input type="text" name="tags" />
            </div>
            <!-- fim field -->
            <div class="fields">
                <div class="field">
                    <label>Posição</label>
                    <input type="number" name="posicao" />
                </div>
                <!-- fim field -->
                <div class="field">
                    <label>Online</label>
                    <select name="online" class="ui dropdown">
                        <option value="0" selected>Não</option>
                        <option value="1">Sim</option>
                    </select>
                </div>
                <!-- fim field -->
            </div>
            <!-- fim fields -->
        </form>
        <!-- fim form -->
    </div>
    <!-- fim content -->
    <div class="actions">
        <div class="ui button" id="cancelar">Cancelar</div>
        <div class="ui button green" id="cadastrar">Cadastrar</div>
    </div>
    <!-- fim actions -->
</div>
<!-- fim model -->

<script>

$('select').dropdown()

$('#novo').click(function() {
    $('.ui.modal').modal('show')
});

$('#cadastrar').click(function() {
    // var data = $('form').serializeArray()
    // console.log(data)

    $.ajax({
        type: "post",
        url: "albuns/inserir",
        data: $('form').serializeArray(),
        success: 
        function(result) {
            // Pra que esse parce mesmo?
            var registro = JSON.parse(result)
            // console.log(registro)

            // console.log(registro[0]['id_album'])
            // console.log(registro[0]['nome'])
            // console.log(registro[0]['url'])
            // console.log(registro[0]['tags'])
            // console.log(registro[0]['posicao'])
            // console.log(registro[0]['editavel'])
            // console.log(registro[0]['online'])


            $('<tr/>').attr('idalbum',registro[0]['id_album']).prepend(
                $('<td/>').addClass('single line center aligned').prepend(
                    $('<b>').text(registro[0]['id_album'])
                ),
                $('<td/>').addClass('single line').text(registro[0]['nome']),
                $('<td/>').addClass('single line').text(registro[0]['url']),
                $('<td/>').addClass('single line').text(registro[0]['tags']),
                $('<td/>').addClass('single line center aligned').text(registro[0]['posicao']),
                $('<td/>').addClass('single line center aligned').text((registro[0]['editavel'] == 1) ? 'Sim' : 'Não'),
                $('<td/>').addClass('single line center aligned').text((registro[0]['online'] == 1) ? 'Sim' : 'Não')
            ).appendTo('tbody')


            limparCampos()

            // Esconder modal
            $('.ui.modal').modal('hide')
        },
        error: 
        function() {
            alert('Algo deu errado, tente novamente mais tarde!')
        }
    }); 

});

$('#cancelar').click(function() {
    limparCampos()
    $('.ui.modal').modal('hide')
});

function limparCampos() {
    $('input').val('')
    $('select').val('0').change()
}

$(document).on('click','tr',function(){
    var idAlbum = $(this).attr('idAlbum')
    window.location.href = 'album/'+idAlbum
})

</script>
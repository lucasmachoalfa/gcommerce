<h2>Editar Endereço</h2>
<?php
    require_once 'model/enderecoDao.php';
    $idEndereco = $_GET['idEndereco'];
    
    $endereco = $objEnderecoDao->listaEndereco1($idEndereco);
?>
<script src="js/endereco.js"></script>
<script>
    $(document).ready(function(){
        var campo = {cidade: 'cidadeFormAlt'};
        var estado = '<?php echo $endereco['estado']; ?>';
        var cidade = <?php echo $endereco['idCidade']; ?>;
        
        buscaCidade(estado,campo,cidade);
    });
</script>
<div class="endereco">
    <form>
        <input type="hidden" id="idEnderecoAlt" value="<?php echo $endereco['idEndereco']; ?>" />
        <fieldset>
            <label>Nome</label>
            <input type="text" name="nomeIdentificadorFormAlt" id="nomeIdentificadorFormAlt" value="<?php echo utf8_decode($endereco['nome']); ?>" />
        </fieldset>
        <fieldset>
            <label>CEP</label>
            <input type="text" name="cepFormAlt" id="cepFormAlt" value="<?php echo $endereco['cep']; ?>" />
        </fieldset>
        <fieldset>
            <label>Estado</label>
            <select name="estadoFormAlt" id="estadoFormAlt">
                <?php
                require_once 'model/enderecoDao.php';
                $estados = $objEnderecoDao->listaEstados();

                foreach ($estados as $estado) {
                    if($estado['siglaUF'] == $endereco['estado']){
                        $selected = 'selected';
                    }else{
                        $selected = '';
                    }
                    
                    echo '<option value="' . $estado["siglaUF"] . '" '.$selected.'>' . $estado["siglaUF"] . '</option>';
                }
                ?>
            </select>
        </fieldset>
        <fieldset>
            <label>Cidade</label>
            <select name="cidadeFormAlt" id="cidadeFormAlt"></select>
        </fieldset>
        <fieldset>
            <label>Bairro</label>
            <input type="text" name="bairroFormAlt" id="bairroFormAlt" value="<?php echo utf8_decode($endereco['bairro']); ?>" />
        </fieldset>
        <fieldset>
            <label>Logradouro</label>
            <input type="text" name="logradouroFormAlt" id="logradouroFormAlt" value="<?php echo utf8_decode($endereco['logradouro']); ?>" />
        </fieldset>
        <fieldset>
            <label>Número</label>
            <input type="text" name="numeroFormAlt" id="numeroFormAlt" value="<?php echo $endereco['numero']; ?>" />
        </fieldset>
        <fieldset>
            <label>Complemento</label>
            <input type="text" name="complementoFormAlt" id="complementoFormAlt" value="<?php echo utf8_decode($endereco['complemento']); ?>" />
        </fieldset>
        <input type="button" id="btnAltEnderecoCheckout" value="Alterar" /><br />
        <span id="spanAlterar" class="error"></span>
    </form>
</div>
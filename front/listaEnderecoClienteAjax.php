<?php
require_once 'model/enderecoDao.php';
$idCliente = $_GET['idCliente'];

$enderecos = $objEnderecoDao->listaEnderecosCliente($idCliente);

foreach ($enderecos as $endereco){
    echo '
        <div class="i-endereco">
            <p><span>'.utf8_decode($endereco["nome"]).'</span></p>
            <br>
            <p>'.utf8_decode($endereco["logradouro"]).', '.$endereco["numero"].'</p>
            <p>'.utf8_decode($endereco["bairro"]).'</p>
            <p>'.$endereco["cidade"].' - '.$endereco["estado"].'</p>
            <p>'.$endereco["cep"].'</p>

            <br><br>

            <a href="javascript:alterarEndereco('.$endereco["idEndereco"].', \''.$endereco["estado"].'\', '.$endereco["idCidade"].')">Editar</a>  |
            <a href="javascript:excluirEndereco('.$endereco["idEndereco"].')">Remover</a>
            <br>
            <input type="button" value="utilizar este" onclick="utilizarEste('.$endereco["idEndereco"].')" class="btn-end">
        </div>
    ';
}

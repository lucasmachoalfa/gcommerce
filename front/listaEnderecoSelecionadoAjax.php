<?php
require_once 'model/enderecoDao.php';
$idEndereco = $_GET['idEndereco'];

$endereco = $objEnderecoDao->listaEndereco1($idEndereco);

?>
<i><?php echo utf8_decode($endereco["nome"]); ?></i>
<br><br>
<p><?php echo utf8_decode($endereco["logradouro"]); ?>, <?php echo $endereco["numero"]; ?> - <?php echo utf8_decode($endereco["complemento"]); ?><br>
    Bairro: <?php echo utf8_decode($endereco["bairro"]); ?><br>
    Cidade: <?php echo $endereco["cidade"]; ?> - <?php echo $endereco["estado"]; ?><br>
    CEP: <?php echo $endereco["cep"]; ?>
</p>
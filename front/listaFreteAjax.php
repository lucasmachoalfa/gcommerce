<p>Escolha o seu frete</p>

<?php
require_once 'control/funcoes.php';
require_once 'model/produtoDao.php';

//$produtos = json_decode($_GET['produtos']);
//$idCarrinho = $_GET['idCarrinho'];
$idCarrinho = (!isset($_GET['carrinho'])) ? 8 : $_GET['carrinho'];
$referencia = rtrim($_GET['referencia'], ',');
$endereco = json_decode($_GET['endereco']);
$peso = 0;
$comprimento = 0;
$altura = 0;
$largura = 0;

if (!isset($endereco->cep)) {
    include 'model/enderecoDao.php';

    $enderecoBd = $objEnderecoDao->listaEndereco1($endereco->idEndereco);

    $cep = $enderecoBd['cep'];
} else {
    $cep = $endereco->cep;
}

$produtos = $objProdutoDao->listaFreteProdutosCarrinho($idCarrinho, $referencia);

//echo '<pre>';
//var_dump($produtos);
//echo '</pre>';
foreach ($produtos as $produto) {
    $peso += $produto['peso'] * $produto['quantidade'];

    $comprimento = ($comprimento > $produto['comprimento']) ? $comprimento : $produto['comprimento'];
    $largura = ($largura > $produto['comprimento']) ? $largura : $produto['largura'];
    $altura = ($comprimento > $produto['altura']) ? $altura : $produto['altura'];
}

$fretes = calculaFrete($peso, $comprimento, $altura, $largura, $cep);

//echo $cep;
//var_dump($fretes);
foreach ($fretes as $frete):
    ?>
    <input type="radio" name="frete" value="<?php echo $frete['servico'] . '|' . $frete['valor'] . '|' . $frete['prazoEntrega'] ?>"><?php echo $frete['servico']; ?>: <h3><span><?php echo ($frete['valor'] == '0,00') ? 'Grátis' : number_format($frete['valor'], 2, ',', '.'); ?></span>    <?php echo $frete['prazoEntrega']; ?> Dias úteis</h3><br>
    <?php
endforeach;
?>
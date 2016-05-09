<?php
require_once 'model/opcaoDao.php';
$opcoes = $objOpcaoDao->listaOpcoes();

foreach ($opcoes as $opcao):
?>
<label class="checkbox buffer-right-md">
    <input name="product_options" type="checkbox" value="<?php echo $opcao['idOpcao']; ?>" class="option-checkbox"> <?php echo $opcao['titulo']; ?>
</label>
<?php
endforeach;

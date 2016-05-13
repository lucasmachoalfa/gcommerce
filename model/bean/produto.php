<?php
class Produto {
    private $idProduto;
    private $idVendedor;
    private $nome;
    private $slug;
    private $resumo;
    private $video;
    private $descricao;
    private $imagem;
    private $precoNormal;
    private $precoPromocional;
    private $maximaParcelas;
    private $custoProduto;
    private $referencia;
    private $gerenciarEstoque;
    private $quantidadeFixa;
    private $quantidade;
    private $tipoProduto;
    private $peso;
    private $comprimento;
    private $largura;
    private $altura;
    private $diasProcessamento;
    private $urlSeo;
    private $tituloSeo;
    private $descricaoSeo;
    private $palavraChaveSeo;
    private $dataCadastro;
    private $status;
    
    
    public function getIdProduto() {
        return $this->idProduto;
    }

    public function getIdVendedor() {
        return $this->idVendedor;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getSlug() {
        return $this->slug;
    }

    public function getResumo() {
        return $this->resumo;
    }

    public function getVideo() {
        return $this->video;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getImagem() {
        return $this->imagem;
    }

    public function getPrecoNormal() {
        return $this->precoNormal;
    }

    public function getPrecoPromocional() {
        return $this->precoPromocional;
    }

    public function getMaximaParcelas() {
        return $this->maximaParcelas;
    }

    public function getCustoProduto() {
        return $this->custoProduto;
    }

    public function getReferencia() {
        return $this->referencia;
    }

    public function getGerenciarEstoque() {
        return $this->gerenciarEstoque;
    }

    public function getQuantidadeFixa() {
        return $this->quantidadeFixa;
    }

    public function getQuantidade() {
        return $this->quantidade;
    }

    public function getTipoProduto() {
        return $this->tipoProduto;
    }

    public function getPeso() {
        return $this->peso;
    }

    public function getComprimento() {
        return $this->comprimento;
    }

    public function getLargura() {
        return $this->largura;
    }

    public function getAltura() {
        return $this->altura;
    }

    public function getDiasProcessamento() {
        return $this->diasProcessamento;
    }

    public function getUrlSeo() {
        return $this->urlSeo;
    }

    public function getTituloSeo() {
        return $this->tituloSeo;
    }

    public function getDescricaoSeo() {
        return $this->descricaoSeo;
    }

    public function getPalavraChaveSeo() {
        return $this->palavraChaveSeo;
    }

    public function getDataCadastro() {
        return $this->dataCadastro;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setIdProduto($idProduto) {
        $this->idProduto = seg($idProduto);
    }

    public function setIdVendedor($idVendedor) {
        $this->idVendedor = seg($idVendedor);
    }

    public function setNome($nome) {
        $this->nome = seg($nome);
    }

    public function setSlug($slug) {
        $this->slug = seg($slug);
    }

    public function setResumo($resumo) {
        $this->resumo = seg($resumo);
    }

    public function setVideo($video) {
        $this->video = seg($video);
    }

    public function setDescricao($descricao) {
        $this->descricao = seg($descricao);
    }

    public function setImagem($imagem) {
        $this->imagem = seg($imagem);
    }

    public function setPrecoNormal($precoNormal) {
        $this->precoNormal = seg($precoNormal);
    }

    public function setPrecoPromocional($precoPromocional) {
        $this->precoPromocional = seg($precoPromocional);
    }

    public function setMaximaParcelas($maximaParcelas) {
        $this->maximaParcelas = seg($maximaParcelas);
    }

    public function setCustoProduto($custoProduto) {
        $this->custoProduto = seg($custoProduto);
    }

    public function setReferencia($referencia) {
        $this->referencia = seg($referencia);
    }

    public function setGerenciarEstoque($gerenciarEstoque) {
        $this->gerenciarEstoque = seg($gerenciarEstoque);
    }

    public function setQuantidadeFixa($quantidadeFixa) {
        $this->quantidadeFixa = seg($quantidadeFixa);
    }

    public function setQuantidade($quantidade) {
        $this->quantidade = seg($quantidade);
    }

    public function setTipoProduto($tipoProduto) {
        $this->tipoProduto = seg($tipoProduto);
    }

    public function setPeso($peso) {
        $this->peso = seg($peso);
    }

    public function setComprimento($comprimento) {
        $this->comprimento = seg($comprimento);
    }

    public function setLargura($largura) {
        $this->largura = seg($largura);
    }

    public function setAltura($altura) {
        $this->altura = seg($altura);
    }

    public function setDiasProcessamento($diasProcessamento) {
        $this->diasProcessamento = seg($diasProcessamento);
    }

    public function setUrlSeo($urlSeo) {
        $this->urlSeo = seg($urlSeo);
    }

    public function setTituloSeo($tituloSeo) {
        $this->tituloSeo = seg($tituloSeo);
    }

    public function setDescricaoSeo($descricaoSeo) {
        $this->descricaoSeo = seg($descricaoSeo);
    }

    public function setPalavraChaveSeo($palavraChaveSeo) {
        $this->palavraChaveSeo = seg($palavraChaveSeo);
    }

    public function setDataCadastro($dataCadastro) {
        $this->dataCadastro = seg($dataCadastro);
    }

    public function setStatus($status) {
        $this->status = seg($status);
    }

}

$objProduto = new Produto();
<?php

require_once 'banco.php';
require_once 'bean/emailPersonalizado.php';

class EmailDao extends Banco {

    public function listaEmail(Email $objEmail) {
        $conexao = $this->abreConexao();

        $sql = "SELECT * FROM " . TBL_EMAIL . " WHERE titulo = '" . $objEmail->getTitulo() . "'";

        $banco = $conexao->query($sql);

        $linha = $banco->fetch_assoc();

        return $linha;

        $this->fechaConexao();
    }

    public function altEmail(Email $objEmail) {
        $conexao = $this->abreConexao();

        $sql = "UPDATE " . TBL_EMAIL . " SET
                nome = '" . $objEmail->getNome() . "',
                assunto = '" . $objEmail->getAssunto() . "',
                mensagem = '" . $objEmail->getMensagem() . "',
                mensagemSMS = '" . $objEmail->getMensagemSMS() . "'
                    WHERE idEmail = '" . $objEmail->getIdEmail() . "'";

        $conexao->query($sql);

        $this->fechaConexao();
    }

}

$objEmailDao = new EmailDao();

<?php

require_once 'banco.php';
require_once 'bean/cliente.php';

class ClienteDao extends Banco {

    private $message;

    public function cadCliente(Cliente $objCliente) {
        $conexao = $this->abreConexao();

        $sql = "INSERT INTO " . TBL_CLIENTES . " SET
                nome = '" . $objCliente->getNome() . "',
                email = '" . $objCliente->getEmail() . "',
                senha = '" . $objCliente->getSenha() . "',
                telefone = '" . $objCliente->getTelefone() . "',
                dataNascimento = '" . $objCliente->getDataNascimento() . "',
                cpf = '" . $objCliente->getCpf() . "',
                sexo = '" . $objCliente->getSexo() . "',
                dataCadastro = NOW()
               ";

        $conexao->query($sql) or die($conexao->error);

        $idCliente = $conexao->insert_id;

        return $idCliente;
    }

}

$objClienteDao = new ClienteDao();

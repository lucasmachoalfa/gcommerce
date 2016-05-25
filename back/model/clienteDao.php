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
                status = 1
                dataCadastro = NOW()
               ";

        $conexao->query($sql) or die($conexao->error);

        $idCliente = $conexao->insert_id;

        return $idCliente;
    }
    
    
    public function listaClientes($ordem,$paginacao = NULL, $busca = NULL){
        $conexao = $this->abreConexao();
        
        if($busca != '' && $busca != NULL){
            $where .= ' AND (c.nome like "%'.$busca.'%" OR email like "%'.$busca.'%" OR cpf = "'.$busca.'")';
        }
        
        $sql = "SELECT c.idCliente,c.nome,c.email, DATE_FORMAT(c.dataCadastro,'%d/%m/%Y <br /> %H:%i') as dataCadastro,
                e.estado,
                ci.nomeCidade as cidade
                    FROM ".TBL_CLIENTES." c
                    JOIN ".TBL_ENDERECOS." e ON e.idCliente = c.idCliente
                    JOIN ".TBL_CIDADES." ci ON e.cidade = ci.idCidade
                        WHERE status = 1
                        ".$where."
                        ORDER BY ".$ordem."
                ";
        
        $banco = $conexao->query($sql) or die($conexao->error);
        
        $linhas = array();
        while($linha = $banco->fetch_assoc()){
            $linhas[] = $linha;
        }
        
        return $linhas;
        
        $this->fechaConexao();
    }
    
    
    public function numClientes($busca){
        $conexao = $this->abreConexao();

        if($busca != ''){
            $busca = ' AND (nome like "%'.$busca.'%" OR email like "%'.$busca.'%" OR cpf="'.$busca.'")';
        }
        
        $sql = "SELECT count(*) as quantidade
                    FROM " . TBL_CLIENTES . "
                        WHERE status = 1
                        ".$busca."";

        $banco = $conexao->query($sql);

        $linha = $banco->fetch_assoc();

        return $linha['quantidade'];

        $this->fechaConexao();
    }
    
    public function verificaEmail(Cliente $objCliente){
        $conexao = $this->abreConexao();
        
        $sql = "SELECT * FROM ".TBL_CLIENTES." WHERE email = '".$objCliente->getEmail()."'";
        
        $banco = $conexao->query($sql);
        
        $numLinhas = $banco->num_rows;
        
        return $numLinhas;
        
        $this->fechaConexao();
    }
    
    
    public function verificaCpf(Cliente $objCliente){
        $conexao = $this->abreConexao();
        
        $sql = "SELECT * FROM ".TBL_CLIENTES." WHERE cpf = '".$objCliente->getCpf()."'";
        
        $banco = $conexao->query($sql);
        
        $numLinhas = $banco->num_rows;
        
        return $numLinhas;
        
        $this->fechaConexao();
    }

}

$objClienteDao = new ClienteDao();
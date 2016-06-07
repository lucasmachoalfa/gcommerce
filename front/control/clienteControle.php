<?php

@session_start();
require_once '../model/enderecoDao.php';
require_once '../model/clienteDao.php';

$opcao = $_POST['opcao'];
switch ($opcao) {
    case 'cadCliente':
        $email = $_POST['email'];
        $senha = md5($_POST['senha']);
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $cpf = $_POST['cpf'];
        $dataNascimento = implode('-', array_reverse(explode('/', $_POST['dataNascimento'])));
        $sexo = $_POST['sexo'];

        //endereço
        $nomeIdentificador = $_POST['nomeIdentificador'];
        $cep = $_POST['cep'];
        $complemento = $_POST['complemento'];
        $logradouro = $_POST['logradouro'];
        $numero = $_POST['numero'];
        $bairro = $_POST['bairro'];
        $estado = $_POST['estado'];
        $cidade = $_POST['cidade'];

        $objCliente->setEmail($email);
        $objCliente->setSenha($senha);
        $objCliente->setNome($nome);
        $objCliente->setTelefone($telefone);
        $objCliente->setCpf($cpf);
        $objCliente->setDataNascimento($dataNascimento);
        $objCliente->setSexo($sexo);

        $idCliente = $objClienteDao->cadCliente($objCliente);

        $objCliente->setIdCliente($idCliente);

        $objEndereco->setIdCliente($idCliente);
        $objEndereco->setNome($nomeIdentificador);
        $objEndereco->setComplemento($complemento);
        $objEndereco->setCep($cep);
        $objEndereco->setLogradouro($logradouro);
        $objEndereco->setNumero($numero);
        $objEndereco->setBairro($bairro);
        $objEndereco->setEstado($estado);
        $objEndereco->setCidade($cidade);

        $idEndereco = $objEnderecoDao->cadEndereco($objEndereco);

        $objEndereco->setIdEndereco($idEndereco);

        $cliente = $objClienteDao->listaCliente1($objCliente);
        $endereco = $objEnderecoDao->listaEndereco1($objEndereco);

        $resposta = json_encode(array($cliente, $endereco));
        echo($resposta);

        $_SESSION['CLIENTE'] = $idCliente;
        break;

    case 'verificaEmail':
        $email = $_POST['email'];
        $resposta = 0;

        $objCliente->setEmail($email);

        $retorno = $objClienteDao->verificaEmail($objCliente);

        if ($retorno === 0) {
            $resposta = 1;
        }

        print_r($resposta);
        break;

    case 'verificaCpf':
        $cpf = $_POST['cpf'];
        $resposta = 0;

        $objCliente->setCpf($cpf);

        $retorno = $objClienteDao->verificaCpf($objCliente);

        if ($retorno === 0) {
            $resposta = 1;
        }

        print_r($resposta);
        break;

    case 'verificaLogin':
        $email = $_POST['email'];
        $senha = md5($_POST['senha']);
        
        $objCliente->setEmail($email);
        $objCliente->setSenha($senha);
        
        $retorno = $objClienteDao->verificaLogin($objCliente);
        
        if($retorno != 0){
            $resposta = json_encode($retorno);
        }else{
            $resposta = 0;
        }
        
        echo $resposta;
        break;
}
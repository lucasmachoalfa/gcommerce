$(document).ready(function () {
    ($("#cpf").length) ? $("#cpf").mask('999.999.999-99') : '';
//    ($("#dataNascimento").length) ? $("#dataNascimento").mask('99/99/9999') : '';
    ($("#cep").length) ? $("#cep").mask('99999-999') : '';
    ($("#listaClientes").length) ? buscaCliente('') : '';

    $("#btnCadCliente").click(function () {
        var email = $("#email");
        var senha = $("#senha");
        var senhaN = $("#senhaN");
        var nome = $("#nome");
        var telefone = $("#telefone");
        var cpf = $("#cpf");
        var dataNascimento = $("#dataNascimento");
        var sexo = $("input[name='sexo']:checked").val();
        var nomeIdentificador = $("#nomeIdentificador");
        var cep = $("#cep");
        var logradouro = $("#logradouro");
        var numero = $("#numero");
        var complemento = $("#complemento");
        var bairro = $("#bairro");
        var estado = $("#estado");
        var cidade = $("#cidade");


//        var validEmail = 0;
//        var validSenha = 0;
//        var validNome = 0;
//        var validTelefone = 0;
//        var validCpf = 0;
//        var validDataNascimento = 0;
//        var validSexo = 0;
//        var validNomeIdentificador = 0;
//        var validCep = 0;
//        var validLogradouro = 0;
//        var validNumero = 0;
//        var validBairro = 0;
//        var validEstado = 0;
//        var validCidade = 0;

//        $("input[name='inlineRadioOptions']").each(function () {
//            if ($(this).is(':checked')) {
//                sexo = $(this).val();
//            }
//        });

//        if (email.val() == '') {
//            validateBootstrap('email', 'Você deve preencher o Email!', 1);
//        } else if (!isEmail(email.val())) {
//            validateBootstrap('email', 'Você deve informar um Email válido!', 1);
//        } else if (!emailUnico(email.val())) {
//            validateBootstrap('email', 'Este email já se encontra em nossa base', 1);
//        } else {
//            validateBootstrap('email', '', 0);
//            validEmail = 1;
//        }
        if (email.val() == '') {
            $("#email").focus();
            $("#spanCadastro").html('Você deve preencher o Email!');
        } else if (!isEmail(email.val())) {
            $("#email").focus();
            $("#spanCadastro").html('Você deve informar um Email válido!');
        } else if (!emailUnico(email.val())) {
            $("#email").focus();
            $("#spanCadastro").html('Este email já se encontra em nossa base');
        } else if (senha.val() == '') {
            $("#senha").focus();
            $("#spanCadastro").html('Você deve preencher a senha!');
        } else if ((senha.val() != '' && senhaN.val() == '') || (senha.val() != senhaN.val())) {
            $("#senha").focus();
            $("#spanCadastro").html('As senhas não conferem!');
        } else if (nome.val() == '') {
            $("#nome").focus();
            $("#spanCadastro").html('Você deve preencher o Nome Completo!');
        } else if (telefone.val() == '') {
            $("#telefone").focus();
            $("#spanCadastro").html('Você deve preencher o Telefone!');
        } else if (cpf.val() == '') {
            $("#cpf").focus();
            $("#spanCadastro").html('Você deve preencher o CPF!');
        } else if (!isCpf(cpf.val())) {
            $("#cpf").focus();
            $("#spanCadastro").html('Você deve preencher um CPF válido!');
        } else if (!cpfUnico(cpf.val())) {
            $("#cpf").focus();
            $("#spanCadastro").html('este CPF já se encontra em nossa base!');
        } else if (dataNascimento.val() == "") {
            $("#dataNascimento").focus();
            $("#spanCadastro").html('Você deve preencher a data de nascimento!');
        } else if (sexo != 'M' && sexo != 'F') {
            $("#sexo").focus();
            $("#spanCadastro").html('Você deve selecionar um gênero!');
        } else if (nomeIdentificador.val() == '') {
            alert('1fnfjfddfs');
            
            $("#nomeIdentificador").focus();
            $("#spanCadastro").html('Você deve preencher o nome identificador!');
        } else if (cep.val() == '') {
            $("#cep").focus();
            $("#spanCadastro").html('Você deve preencher o cep!');
        } else if (logradouro.val() == '') {
            $("#logradouro").focus();
            $("#spanCadastro").html('Você deve preencher o logradouro!');
        } else if (numero.val() == '') {
            $("#numero").focus();
            $("#spanCadastro").html('Você deve preencher o numero!');
        } else if (bairro.val() == '') {
            $("#bairro").focus();
            $("#spanCadastro").html('Você deve preencher o bairro!');
        } else if (estado.val() == '') {
            $("#estado").focus();
            $("#spanCadastro").html('Você deve selecionar um estado!');
        } else if (cidade.val() == '' || cidade.val() == null) {
            $("#cidade").focus();
            $("#spanCadastro").html('Você deve selecionar uma cidade!');
        } else {
            $.post(
                    'control/clienteControle.php',
                    {
                        opcao: 'cadCliente',
                        email: email.val(),
                        senha: senha.val(),
                        nome: nome.val(),
                        telefone: telefone.val(),
                        cpf: cpf.val(),
                        dataNascimento: dataNascimento.val(),
                        sexo: sexo,
                        nomeIdentificador: nomeIdentificador.val(),
                        cep: cep.val(),
                        logradouro: logradouro.val(),
                        complemento: complemento.val(),
                        numero: numero.val(),
                        bairro: bairro.val(),
                        estado: estado.val(),
                        cidade: cidade.val(),
                    },
                    function (r) {
                        console.log(r);
                        localStorage.cliente = r;
//                        window.location = 'verClientes.php';
                    }
            );
        }
    });

    $("#telefone").keypress(function () {
        return isPhone($("#telefone").val());
    });

    $("#cep").blur(function () {
        var cep = $("#cep").val();

        if (cep != '') {
            var campos = {estado: 'estado', logradouro: 'logradouro', bairro: 'bairro', cidade: 'cidade'};
            buscaCep(cep, campos);


            if ($("#logradouro").val() != '') {
                $("#numero").focus();
                $("#logradouro").attr('disabled', 'disabled');
            }

            if ($("#bairro").val() != '') {
                $("#bairro").attr('disabled', 'disabled');
            }

            if ($("#estado").val() != '') {
                $("#estado").attr('disabled', 'disabled');
            }

            if ($("#cidade").val() != '') {
                $("#cidade").attr('disabled', 'disabled');
            }
        }
    });

    $("#estado").change(function () {
        var estado = $(this).val();

        if (estado != '') {
            var campos = {cidade: 'cidade'};
            buscaCidade(estado, campos);
        }
    });

    $("#email").blur(function () {
        var email = $(this).val().trim();


        if (email != "" && !emailUnico(email)) {
            $("#email").focus();
            $("#spanCadastro").html('Esse email já existe!');
            alert('Esse email já existe!');
        }
    });

    $("#cpf").blur(function () {
        var cpf = $(this).val().trim();

        if (cpf != "" && !isCpf(cpf)) {
            $("#cpf").focus();
            $("#spanCadastro").html('Esse cpf não é válido!');
            alert('Esse cpf não é válido!');
        } else if (cpf != "" && !cpfUnico(cpf)) {
            $("#cpf").focus();
            $("#spanCadastro").html('Esse cpf já existe!');
            alert('Esse cpf já existe!');
        }
    });
});
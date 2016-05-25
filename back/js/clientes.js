function buscaCliente(termo) {
    $("#carregando").show();
    $("#listaClientes").html('');
    
    $("#listaClientes").load('listaClientesAjax.php?busca=' + termo, function () {
        $("#carregando").hide();
    });
}

$(document).ready(function () {
    ($("#cpf").length) ? $("#cpf").mask('999.999.999-99') : '';
    ($("#dataNascimento").length) ? $("#dataNascimento").mask('99/99/9999') : '';
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
        var sexo;
        var nomeIdentificador = $("#nomeIdentificador");
        var cep = $("#cep");
        var logradouro = $("#logradouro");
        var numero = $("#numero");
        var complemento = $("#complemento");
        var bairro = $("#bairro");
        var estado = $("#estado");
        var cidade = $("#cidade");

        var validEmail = 0;
        var validSenha = 0;
        var validNome = 0;
        var validTelefone = 0;
        var validCpf = 0;
        var validDataNascimento = 0;
        var validSexo = 0;
        var validNomeIdentificador = 0;
        var validCep = 0;
        var validLogradouro = 0;
        var validNumero = 0;
        var validBairro = 0;
        var validEstado = 0;
        var validCidade = 0;

        $("input[name='inlineRadioOptions']").each(function () {
            if ($(this).is(':checked')) {
                sexo = $(this).val();
            }
        });

        if (email.val() == '') {
            validateBootstrap('email', 'Você deve preencher o Email!', 1);
        } else if (!isEmail(email.val())) {
            validateBootstrap('email', 'Você deve informar um Email válido!', 1);
        } else if (!emailUnico(email.val())) {
            validateBootstrap('email', 'Este email já se encontra em nossa base', 1);
        } else {
            validateBootstrap('email', '', 0);
            validEmail = 1;
        }

        if (senha.val() == '') {
            validateBootstrap('senha', 'Você deve preencher a senha!', 1);
            validateBootstrap('senhaN', '', 1);
        } else if ((senha.val() != '' && senhaN.val() == '') || (senha.val() != senhaN.val())) {
            validateBootstrap('senha', 'As senhas não conferem!', 1);
        } else {
            validateBootstrap('senha', '', 0);
            validateBootstrap('senhaN', '', 0);
            validSenha = 1;
        }

        if (nome.val() == '') {
            validateBootstrap('nome', 'Você deve preencher o Nome Completo!', 1);
        } else {
            validateBootstrap('nome', '', 0);
            validNome = 1;
        }


        if (telefone.val() == '') {
            validateBootstrap('telefone', 'Você deve preencher o Telefone!', 1);
        } else {
            validateBootstrap('telefone', '', 0);
            validTelefone = 1;
        }

        if (cpf.val() == '') {
            validateBootstrap('cpf', 'Você deve preencher o CPF!', 1);
        } else if (!isCpf(cpf.val())) {
            validateBootstrap('cpf', 'Você deve preencher um CPF válido!', 1);
        } else if (!cpfUnico(cpf.val())) {
            validateBootstrap('cpf', 'este CPF já se encontra em nossa base!', 1);
        } else {
            validateBootstrap('cpf', '', 0);
            validCpf = 1;
        }


        if (dataNascimento.val() == "") {
            validateBootstrap('dataNascimento', 'Você deve preencher a data de nascimento!', 1);
        } else {
            validateBootstrap('dataNascimento', '', 0);
            validDataNascimento = 1;
        }

        if (sexo != 'M' && sexo != 'F') {
            validateBootstrap('sexo', 'Você deve selecionar um gênero!', 1);
        } else {
            validateBootstrap('sexo', '', 0);
            validSexo = 1;
        }

        if (nomeIdentificador.val() == '') {
            validateBootstrap('nomeIdentificador', 'Você deve preencher o nome identificador!', 1);
        } else {
            validateBootstrap('nomeIdentificador', '', 0);
            validNomeIdentificador = 1;
        }

        if (cep.val() == '') {
            validateBootstrap('cep', 'Você deve preencher o cep!', 1);
        } else {
            validateBootstrap('cep', '', 0);
            validCep = 1;
        }

        if (logradouro.val() == '') {
            validateBootstrap('logradouro', 'Você deve preencher o logradouro!', 1);
        } else {
            validateBootstrap('logradouro', '', 0);
            validLogradouro = 1;
        }

        if (numero.val() == '') {
            validateBootstrap('numero', 'Você deve preencher o numero!', 1);
        } else {
            validateBootstrap('numero', '', 0);
            validNumero = 1;
        }

        if (bairro.val() == '') {
            validateBootstrap('bairro', 'Você deve preencher o bairro!', 1);
        } else {
            validateBootstrap('bairro', '', 0);
            validBairro = 1;
        }

        if (estado.val() == '') {
            validateBootstrap('estado', 'Você deve selecionar um estado!', 1);
        } else {
            validateBootstrap('estado', '', 0);
            validEstado = 1;
        }


        if (cidade.val() == '' || cidade.val() == null) {
            validateBootstrap('cidade', 'Você deve selecionar uma cidade!', 1);
        } else {
            validateBootstrap('cidade', '', 0);
            validCidade = 1;
        }

        if (
                validEmail === 1 &&
                validSenha === 1 &&
                validNome === 1 &&
                validTelefone === 1 &&
                validCpf === 1 &&
                validDataNascimento === 1 &&
                validSexo === 1 &&
                validNomeIdentificador === 1 &&
                validCep === 1 &&
                validLogradouro === 1 &&
                validNumero === 1 &&
                validBairro === 1 &&
                validEstado === 1 &&
                validCidade === 1
                ) {
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
//                        console.log(r);
                        window.location = 'verClientes.php';
                    }
            );
        }
    })


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


    $("#btnBuscaCliente").click(function () {
        var termo = $("#pesquisaCliente").val();
        buscaCliente(termo);
    });
    $('#form-group-buscaCliente').keypress(function (e) {
        var termo = $("#pesquisaCliente").val();
        /* * verifica se o evento é Keycode (para IE e outros browsers) * se não for pega o evento Which (Firefox) */
        var tecla = (e.keyCode ? e.keyCode : e.which);
        /* verifica se a tecla pressionada foi o ENTER */
        if (tecla == 13) {
            buscaCliente(termo);
        }
    });
});
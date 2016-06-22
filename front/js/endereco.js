function listaEnderecos() {
    var cliente = {
        idCliente: 1
    };

    var objCliente = (typeof localStorage.cliente == 'undefined' || localStorage.cliente == '') ? cliente : JSON.parse(localStorage.cliente);
    $('#listaEnderecosCliente').html('');
    $('#listaEnderecosCliente').append().load('listaEnderecoClienteAjax.php?idCliente=' + objCliente.idCliente);
    $("#listaEnderecos").modal();
}

function cadastrarEndereco(idCliente, nomeIdentificador, cep, logradouro, numero, complemento, bairro, estado, cidade, padrao) {
    $.post(
            'control/enderecoControle.php',
            {
                opcao: 'cadEndereco',
                idCliente: idCliente,
                nomeIdentificador: nomeIdentificador,
                cep: cep,
                logradouro: logradouro,
                numero: numero,
                complemento: complemento,
                bairro: bairro,
                estado: estado,
                cidade: cidade,
                padrao: padrao
            },
    function (r) {
        console.log(r);
    });
}

function excluirEndereco(id) {
    if (confirm("Você tem certeza que deseja excluir esse endereço?") === true) {
        $.post('control/enderecoControle.php', {opcao: 'delEndereco', idEndereco: id},
        function () {
            listaEnderecos();
        });
    }
}

function alterarEndereco(id, estado, cidade) {

    $('#altEndereco').html('');
    $('#altEndereco').append().load('altEnderecoCheckout.php?idEndereco=' + id);
//    var campo = {cidade: 'cidadeFormAlt'};


    $("#altEndereco").modal();
//    buscaCidade(estado,campo,cidade);
}

function utilizarEste(id) {
    var cliente = {
        idCliente: 1
    };

    var objCliente = (typeof localStorage.cliente == 'undefined' || localStorage.cliente == '') ? cliente : JSON.parse(localStorage.cliente);
    console.log(objCliente);


    if (typeof id !== 'undefined') {
        $.post('control/enderecoControle.php', {opcao: 'setPadrao', idEndereco: id, idCliente: objCliente.idCliente},
        function (r) {

            $("#listaEnderecoSelecionadoAjax").load('listaEnderecoSelecionadoAjax.php?idEndereco=' + id);
            $("#listaFreteAjax").load('listaFreteAjax.php?endereco='+localStorage.endereco+'&produtos='+localStorage.produtos);
            localStorage.endereco = JSON.stringify({idEndereco: id});

            console.log(r);
        });
    }
}

$(document).ready(function () {
    $("#cepForm").mask('99999-999');

    $("#btnCadEnderecoCheckout").click(function () {
        var nomeIdentificador = $("#nomeIdentificadorForm");
        var cep = $("#cepForm");
        var logradouro = $("#logradouroForm");
        var numero = $("#numeroForm");
        var complemento = $("#complementoForm");
        var bairro = $("#bairroForm");
        var estado = $("#estadoForm");
        var cidade = $("#cidadeForm");

        var cliente = {
            idCliente: 1
        };

        var objCliente = (typeof localStorage.cliente == 'undefined' || localStorage.cliente == '') ? cliente : JSON.parse(localStorage.cliente);

        $("#spanCadastro").html('');
        if (nomeIdentificador.val() == '') {
            nomeIdentificador.focus();
            $("#spanCadastro").html('Você deve preencher o nome identificador!');
        } else if (cep.val() == '') {
            cep.focus();
            $("#spanCadastro").html('Você deve preencher o cep!');
        } else if (logradouro.val() == '') {
            logradouro.focus();
            $("#spanCadastro").html('Você deve preencher o logradouro!');
        } else if (numero.val() == '') {
            numero.focus();
            $("#spanCadastro").html('Você deve preencher o numero!');
        } else if (bairro.val() == '') {
            bairro.focus();
            $("#spanCadastro").html('Você deve preencher o bairro!');
        } else if (estado.val() == '') {
            estado.focus();
            $("#spanCadastro").html('Você deve selecionar um estado!');
        } else if (cidade.val() == '' || cidade.val() == null) {
            cidade.focus();
            $("#spanCadastro").html('Você deve selecionar uma cidade!');
        } else {
            cadastrarEndereco(objCliente.idCliente, nomeIdentificador.val(), cep.val(), logradouro.val(), numero.val(), complemento.val(), bairro.val(), estado.val(), cidade.val(), 0)
            window.setTimeout(listaEnderecos, 2000);
//            listaEnderecos();
//            alert('fdsnfjisdhsdfhj');
        }

    });

    $("#btnAltEnderecoCheckout").click(function () {
        var nomeIdentificador = $("#nomeIdentificadorFormAlt");
        var cep = $("#cepFormAlt");
        var logradouro = $("#logradouroFormAlt");
        var numero = $("#numeroFormAlt");
        var complemento = $("#complementoFormAlt");
        var bairro = $("#bairroFormAlt");
        var estado = $("#estadoFormAlt");
        var cidade = $("#cidadeFormAlt");
        var idEndereco = $("#idEnderecoAlt");

        $("#spanAlterar").html('');
        if (nomeIdentificador.val() == '') {
            nomeIdentificador.focus();
            $("#spanAlterar").html('Você deve preencher o nome identificador!');
        } else if (cep.val() == '') {
            cep.focus();
            $("#spanAlterar").html('Você deve preencher o cep!');
        } else if (logradouro.val() == '') {
            logradouro.focus();
            $("#spanAlterar").html('Você deve preencher o logradouro!');
        } else if (numero.val() == '') {
            numero.focus();
            $("#spanAlterar").html('Você deve preencher o numero!');
        } else if (bairro.val() == '') {
            bairro.focus();
            $("#spanAlterar").html('Você deve preencher o bairro!');
        } else if (estado.val() == '') {
            estado.focus();
            $("#spanAlterar").html('Você deve selecionar um estado!');
        } else if (cidade.val() == '' || cidade.val() == null) {
            cidade.focus();
            $("#spanAlterar").html('Você deve selecionar uma cidade!');
        } else {
            $.post(
                    'control/enderecoControle.php',
                    {
                        opcao: 'altEndereco',
                        idEndereco: idEndereco.val(),
                        nomeIdentificador: nomeIdentificador.val(),
                        cep: cep.val(),
                        logradouro: logradouro.val(),
                        numero: numero.val(),
                        complemento: complemento.val(),
                        bairro: bairro.val(),
                        estado: estado.val(),
                        cidade: cidade.val()
                    },
            function (r) {
                console.log(r);
            });
            window.setTimeout(listaEnderecos, 2000);
//            listaEnderecos();
//            alert('fdsnfjisdhsdfhj');
        }

    });

    $("#cepForm, #cepFormAlt").blur(function () {
        var cep = $(this).val();

        if (cep != '') {
            if ($(this).attr('id') == 'cepFormAlt') {
                var campos = {estado: 'estadoFormAlt', logradouro: 'logradouroFormAlt', bairro: 'bairroFormAlt', cidade: 'cidadeFormAlt', numero: 'numeroFormAlt'};
            } else {
                var campos = {estado: 'estadoForm', logradouro: 'logradouroForm', bairro: 'bairroForm', cidade: 'cidadeForm', numero: 'numeroFormAlt'};
            }

//            var campos = {estado: 'estadoForm', logradouro: 'logradouroForm', bairro: 'bairroForm', cidade: 'cidadeForm'};
            buscaCep(cep, campos);


            if ($("#" + campos.logradouro).val() != '') {
                $("#" + campos.numero).focus();
                $("#" + campos.logradouro).attr('disabled', 'disabled');
            }

            if ($("#" + campos.bairro).val() != '') {
                $("#" + campos.bairro).attr('disabled', 'disabled');
            }

            if ($("#" + campos.estado).val() != '') {
                $("#" + campos.estado).attr('disabled', 'disabled');
            }

            if ($("#" + campos.cidade).val() != '') {
                $("#" + campos.cidade).attr('disabled', 'disabled');
            }
        }
    });

    $("#estadoForm, #estadoFormAlt").change(function () {
        var estado = $(this).val();

        if (estado != '') {
            if ($(this).attr('id') == 'estadoFormAlt') {
                var campos = {cidade: 'cidadeFormAlt'};
            } else {
                var campos = {cidade: 'cidadeForm'};
            }
            buscaCidade(estado, campos);
        }
    });
})
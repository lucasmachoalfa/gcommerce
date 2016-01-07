$(document).ready(function () {
    $("#cpf").mask('999.999.999-99');
    $("#dataNascimento").mask('99/99/9999');
    $("#cep").mask('99999-999');

    $("#btnCadCliente").click(function () {
        var email = $("#email");
        var senha = $("#senha");
        var senhaN = $("#senhaN");
        var nome = $("#nome");
        var telefone = $("#telefone");
        var cpf = $("#cpf");
        var dataNascimento = $("#dataNascimento");
        var sexo;
        
        var validEmail=0;
        var validSenha=0;
        var validNome = 0;
        var validTelefone = 0;
        var validCpf = 0;
        var validDataNascimento = 0;
        var validSexo = 0;

        $("input[name='inlineRadioOptions']").each(function () {
            if ($(this).is(':checked')) {
                sexo = $(this).val();
            }
        });

        if (email.val() == '') {
            validateBootstrap('email', 'Você deve preencher o Email!', 1);
        } else if (!validaEmail(email.val())) {
            validateBootstrap('email', 'Você deve informar um Email válido!', 1);
        } else {
            validateBootstrap('email', '', 0);
            validEmail = 1;
        }

        if (senha.val() == '') {
            validateBootstrap('senha', 'Você deve preencher a senha!', 1);
            validateBootstrap('senhaN', '', 1);
        }else if( (senha.val() != '' && senhaN.val() == '') || (senha.val() != senhaN.val())){
            validateBootstrap('senha', 'As senhas não conferem!', 1);
        }else{
            validateBootstrap('senha', '', 0);
            validateBootstrap('senhaN', '', 0);
            validSenha = 1;
        }
        
        if(nome.val()==''){
            validateBootstrap('nome', 'Você deve preencher o Nome Completo!', 1);
        }else{
            validateBootstrap('nome', '', 0);
            validNome = 1;
        }
        
        
        if(telefone.val() == ''){
            validateBootstrap('telefone', 'Você deve preencher o Telefone!', 1);
        }else if(!isPhone(telefone.val())){
            validateBootstrap('telefone', 'Você deve preencher um Telefone válido!', 1);
        }else{
            validateBootstrap('telefone', '', 0);
            validTelefone=1;
        }
        
        if(cpf.val() == ''){
            validateBootstrap('cpf', 'Você deve preencher o CPF!', 1);
        }else if(isCpf(cpf.val())){
            validateBootstrap('cpf', 'Você deve preencher um CPF válido!', 1);
        }else{
            validateBootstrap('cpf', '', 0);
            validCpf=1;
        }
        
        
        if(dataNascimento.val()==""){
            validateBootstrap('dataNascimento', 'Você deve preencher a data de nascimento!', 1);
        }else{
            validateBootstrap('dataNascimento', '', 0);
            validDataNascimento=1;
        }
        
        if(sexo!='M' || sexo != 'F'){
            validateBootstrap('sexo', 'Você deve selecionar um gênero!', 1);
        }else{
            validateBootstrap('sexo', '', 0);
            validSexo=1;
        }
        
//        if()
    })


    $("#telefone").keypress(function () {
        return isPhone($("#telefone").val());
    });
    
    $("#cep").blur(function () {
        var cep = $("#cep").val();
        var campos = {estado:'estado', logradouro:'logradouro', bairro:'bairro', cidade:'cidade'};
        buscaCep(cep,campos);


        if($("#logradouro").val() != ''){
            $("#numero").focus();
            $("#logradouro").attr('disabled','disabled');
        }
        
        if($("#bairro").val() != ''){
            $("#bairro").attr('disabled','disabled');
        }
        
        if($("#estado").val() != ''){
            $("#estado").attr('disabled','disabled');
        }
        
        if($("#cidade").val() != ''){
            $("#cidade").attr('disabled','disabled');
        }
    });
});
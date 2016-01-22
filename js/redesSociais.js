$(document).ready(function () {
    $("#btnCadRedesSocias").click(function(){
        var facebook = $("#facebook").val();
        var instagram = $("#instagram").val();
        var twitter = $("#twitter").val();
        var google = $("#google").val();
        var vimeo = $("#vimeo").val();
        var youtube = $("#youtube").val();
        var pinterest = $("#pinterest").val();
        var flickr = $("#flickr").val();
        var linkedin = $("#linkedin").val();
        
        $.post('control/marketingControle.php',{opcao:'redessociais',facebook:facebook,instagram:instagram,twitter:twitter,google:google,vimeo:vimeo,youtube:youtube,pinterest:pinterest,flickr:flickr,linkedin:linkedin},
        function(r){
            console.log(r);
        })
    })
});
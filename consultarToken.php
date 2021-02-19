<?php
$username = "";
$contra = "";
$_NOMBRE_SERVICIO = "moodle_mobile_app";
$token ="";
$url = "";
if(isset($_POST['username'])){
    $contra = $_POST['username'];
}
?>
<html>
    <head>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    </head> 
    <body>   
    <script>
        $.ajax ({
            url : 'https://www.tuxtla.cuatri.seuatvirtual.mx/login/token.php?username=<?php echo($username); ?>&password=<?php echo($password); ?>&service=<?php echo($_NOMBRE_SERVICIO); ?>',
            dataType: 'json'
        }).then ((resultado) => {
                valor = JSON.stringify(resultado['token']);
                console.log(valor);
                if(!valor == ""){
                    url_encuesta = "encuesta.php?token=" + valor;
                    window.open(url_encuesta,"_self");
                }else{
                    /*location.reload();*/
                }
            });
    </script>
    </body>
</html>
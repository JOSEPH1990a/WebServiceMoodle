<?php
    $username = "";
    $password = "";
    $_NOMBRE_SERVICIO = "moodle_mobile_app";
    $tokenUsuario ="";
    $url = "";
    if(isset($_POST['username'])){
        $username = $_POST['username'];
    }
    if(isset($_POST['password'])){
        $password = $_POST['password'];
    }
    if(isset($_POST['valorServidor'])){
        echo($_POST['valorServidor']);
    }
?>
<html>
    <head>
        <meta charset="utf-8" /> 
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    </head> 
    <body>
        <div class="container login-container"><br><br><br><br><br>
            <div class="row">
                <div class="col-md-3">
                </div>
                <div class="col-md-6 login-form-1">
                    <img src="logo.png" style="width: 200px;margin-left: 150px;">
                    <div id="error">
                    </div>
                    <h3 id="titulo">Login</h3>
                    <form name="signup-form" method="post" action="index.php" onsubmit="jose(event()">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Username *" name="username" value="" required/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Contraseña *" name="password" value="" required/>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit btn btn-primary" value="Entrar" name="register" id="submitLogin" />
                        </div>
                    </form>
                </div>
                <div class="col-md-3">
                </div>
            </div>
        </div>
        <script>
            $.ajax ({
            url : 'https://www.tuxtla.cuatri.seuatvirtual.mx/login/token.php?username=<?php echo($username); ?>&password=<?php echo($password); ?>&service=<?php echo($_NOMBRE_SERVICIO); ?>',
            dataType: 'json'
        }).then ((resultado) => {
                nombre_usuario = '<?php echo($username); ?>';
                if(!JSON.stringify(resultado['token']) == ""){
                    url_encuesta = "encuesta.php?token=" + JSON.stringify(resultado['token']);
                    window.open(url_encuesta,"_self");
                }else{
                    if(!nombre_usuario == ""){
                        document.getElementById("error").innerHTML = '<div class="alert alert-danger" role="alert">'+JSON.stringify(resultado['error'])+'</div>';

                    }
                }
            });
        </script>
    </body>
</html>
<?php
    $tokenUsuario = preg_replace('([^A-Za-z0-9 ])', '', $_GET['token']);
    $_FUNCTION_SERVICE = "core_webservice_get_site_info";
?>
<html>
    <head>
        <meta charset="utf-8" /> 
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    </head> 
    <body>
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <div id="siteName"></div>
                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                      <label  class="col-form-label">Nombre Completo</label>
                    </div>
                    <div class="col-auto">
                      <input type="text" id="nombreCompleto" class="form-control" aria-describedby="passwordHelpInline">
                    </div>
                </div><br>
                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                      <label  class="col-form-label">Nombre del Usuario</label>
                    </div>
                    <div class="col-auto">
                      <input type="text" id="nombreUsuario" class="form-control" aria-describedby="passwordHelpInline">
                    </div>
                </div><br>
                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                      <label  class="col-form-label">ID del Usuario</label>
                    </div>
                    <div class="col-auto">
                      <input type="text" id="idUser" class="form-control" aria-describedby="passwordHelpInline">
                    </div>
                </div><br>
                <p><h4>Token:</h4><?php echo($tokenUsuario); ?></p><br>
                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                      <label  class="col-form-label">Url del Foto de Perfil</label>
                    </div>
                    <div id="urlPicture">
                    </div>
                </div>
                <a class="btn btn-primary" href="index.php" role="button">Salir</a>
            </div>
            <div class="col-md-4">
            </div>
            
        </div>
        <script>
            $.ajax ({
                url : 'https://www.tuxtla.cuatri.seuatvirtual.mx/webservice/rest/server.php?moodlewsrestformat=json&wstoken=<?php echo($tokenUsuario);?>&wsfunction=<?php echo($_FUNCTION_SERVICE); ?>',
                dataType: 'json'
            }).then ((resultado) => {
                var siteName = JSON.stringify(resultado['sitename']);
                var nombre = JSON.stringify(resultado['firstname']) + " "+JSON.stringify(resultado['lastname']);
                var username = JSON.stringify(resultado['username']);
                var userId = JSON.stringify(resultado['userid']);
                var urlPicture = JSON.stringify(resultado['userpictureurl']);
                   
                document.getElementById("siteName").innerHTML = '<h1>'+siteName.replace(/["]+/g,'')+'</h1>';
                document.getElementById("nombreCompleto").value = nombre.replace(/["]+/g,'');
                document.getElementById("nombreUsuario").value = username.replace(/["]+/g,'');
                document.getElementById("idUser").value = userId.replace(/["]+/g,'');
                document.getElementById("urlPicture").innerHTML = '<p>'+urlPicture.replace(/["]+/g,'')+'</p>';
                

           });
        </script>
    </body>
</html>

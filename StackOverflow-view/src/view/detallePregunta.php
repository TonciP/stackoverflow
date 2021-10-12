<?php

/**
 * @var integer $idpregunta
 */

if (!isset($idpregunta)){
    $idpregunta = 0;
}



?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSS Only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.2/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <link href="css/principal/header.css" type="text/css" rel="stylesheet">
    <link href="css/principal/body.css" type="text/css" rel="stylesheet">
    <link href="css/principal/article.css" type="text/css" rel="stylesheet">
    <link href="css/principal/cuestion/bodypreguntas.css" type="text/css" rel="stylesheet">
    <link href="css/detalleRepuesta/detalleRespuesta.css" type="text/css" rel="stylesheet">
    <title>StackOverflow</title>
</head>
<body>
    <div class="conten-header">
        <header>
            <a href="index.php">
                <img src="css/img/logo-stackoverflow.png"
                     alt="logo" style="width: 150px;height: 30px">
            </a>

            <nav>
                <span class="conten-nav">
                    <div>
                        <ol id="nav-principal">
                            <a href="index.php?controller=moderador&action=index">
                                <p>Moderador</p>
                            </a>
                            <a href="#">
                                <p>Productos</p>
                            </a>
                            <a href="#">
                                <p>Para equipos</p>
                            </a>
                        </ol>
                        <input type="search" name="search-preguntas" id="search-preguntas">
                        <input type="button"  id="btnlogin" value="Iniciar sesion"
                               style="color: hsl(205, 47%, 42%);background-color: hsl(205,46%, 92%); border-color: hsl(205,41%,63%)">
                        <input type="button" id="btnsing" value="Inscribirse"
                               style="color: white; background-color: hsl(206,100%, 52%);">
                    </div>
                </span>
            </nav>
        </header>
    </div>
    <div class="conten-article">
        <input type="text" hidden value="<?php if ($idpregunta != 0) echo $idpregunta; else echo "" ?>" id="idpregunta">
        <div class="subtitle">
            <h2 id="pregunta">Todas las preguntas</h2>
        </div>
        <div class="line-preguntas">
        </div>
        <div class="content-pregunta">
            <div class="content-cantidad">
                <span style="text-align: center">
                    <i class="bi bi-caret-up"></i>
                </span>
                <p style="text-align: center">
                    0
                </p>
                <span style="text-align: center">
                    <i class="bi bi-caret-down"></i>
                </span>
            </div>
            <div class='contenedor-pregunta'>
                <!-- Detalle de la pregunta -->
            </div>
        </div>
        <div class="line-preguntas">
        </div>
        <div class="nav-preguntas">
            <div class="labelPreguntas">
                <input type="text" id="labeltotalpreguntas" style="border: none; width: 90px" value="1">
                <label for="labeltotalpreguntas">Respuesta</label>
            </div>
            <div class="tipos_preguntas">
                <a href="#">El mas nuevo</a>
                <a href="#">Activo</a>
                <a href="#">Favorecido</a>
                <a href="#">Sin respuesta</a>
                <select name="mas">
                    <option value="2">Mas</option>
                </select>
            </div>
            <div class="filtrar_preguntas">
                <select name="filtrar">
                    <option value="1">filtrar</option>
                </select>
            </div>
        </div>
        <div-- class="contenedor-respuestas">
            <!--div class="content-respuestas">
                <div class="content-cantidad">
                    <span style="text-align: center">
                        <i class="bi bi-caret-up"></i>
                    </span>
                    <p style="text-align: center">
                        0
                    </p>
                    <span style="text-align: center">
                        <i class="bi bi-caret-down"></i>
                    </span>
                </div>
                <div-- class="respuesta">
                    <p>

                    </p>
                </div>
            </div-->
        </div>

    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="js/detallePregunta.js"></script>
</body>

</html>
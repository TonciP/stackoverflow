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
    <title>StackOverflow</title>
</head>
<body>
<!-- Cabezera -->
    <div class="conten-header">
        <header>
            <img src="css/img/logo-stackoverflow.png"
                 alt="logo" style="width: 150px;height: 30px">
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
<!-- Cabezera Fin -->

<!-- Cuerpo body question -->
    <div class="politica-privacidad" style="background: rgb(57,57,57); color: white">
        <p>
            Cambiamos nuestra politica de privacidad. <a href="#" style="text-decoration: none">Leer mas</a>.
        </p>
    </div>
    <div class="conten-article">
        <div class="subtitle">
            <h2 class="titulo2">Todas las preguntas</h2>
            <span>
                <input type="button"  id="btnpreguntas" value="Pregunta"
                       style="color: white; background-color: hsl(206,100%, 52%);">
            </span>

        </div>

        <div class="nav-preguntas">
            <div class="labelPreguntas">
                <input type="text" id="labeltotalpreguntas" style="border: none; width: 90px" value="21,745,839">
                <label for="labeltotalpreguntas">Preguntas</label>
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
        <div class="line-preguntas">
        </div>
        <!-- Question -->

        <div class="content-question">


        </div>

    </div>
<!-- Fin body Question -->

<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>

<script src="js/principal.js"></script>
</body>
</html>
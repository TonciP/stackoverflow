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

    <link href="css/moderador/tabla.css" type="text/css" rel="stylesheet">

    <!-- link href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" -->
    <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

    <title>Monitor</title>
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
        <h1 class="subtitle">
            Moderador
        </h1>
        <div id="table-datos">
            <table id='table' class='display' style='width:100%'>

            </table>
        </div>
    </div>
    <!-- script src="https://code.jquery.com/jquery-3.5.1.js"></script -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

    <script src="js/moderador.js" type="text/javascript"></script>
</body>
</html>
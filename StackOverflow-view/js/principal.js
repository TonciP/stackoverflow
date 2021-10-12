$(document).ready(function () {
    cargarpreguntas();
});

function cargarpreguntas() {
    $.ajax({
        type: "GET",
        url: "http://localhost:8080/stackoverflow/index.php?controller=pregunta&action=index",
        data: null,
        dataType: "json",
        success: function (response) {
            //alert(JSON.stringify(response)); [{"id":1,"snombre":"carla","pregunta":"Como se compone un arduino?"}]
            var data = JSON.stringify(response);
            var preguntasHTML = "";
            response.forEach(element => {
                preguntasHTML += "<div class='question'>" +
                                        "<div class='estado-contenedor'>" +
                                            "<span id='votos'>" +
                                                "<p>0</p>" +
                                                "<p>Votos</p>" +
                                            "</span>" +
                                            "<span id='respuestas'>" +
                                                "<p>0</p>" +
                                                "<p>Respuestas</p>" +
                                            "</span>" +
                                            "<span id='vistas'>" +
                                                "<p>5</p>" +
                                                "<p>Vistas</p>" +
                                            "</span>" +
                                        "</div>" +
                                        "<div class='contenedor-pregunta'>" +
                                            "<span id='cabezera-pregunta'>" +
                                                "<a href='index.php?controller=principal&action=detallePregunta&id="+ element.id  +"'>" +
                                                element.pregunta +
                                                "</a>" +
                                            "</span>" +
                                        "</div>" +
                                    "</div>";
            });
            $('.content-question').html(preguntasHTML);
            //console.log(response);
        }
    });
};
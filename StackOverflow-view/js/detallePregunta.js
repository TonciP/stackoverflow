$(document).ready(function () {
    traerpreguntas();
    traerrespuestas();
});

async function traerpreguntas() {

    /*var idpregunta = $('#idpregunta').val();
    let data = $.ajax({
        type: "GET",
        url: "http://localhost:8080/stackoverflow/index.php?controller=pregunta&action=show&id=" + idpregunta,
        data: null,
        dataType: "json",
        success: function (response) {
            debugger;
            var data = JSON.stringify(response);
            $('.contenedor-pregunta p').text(response.pregunta);
            console.log(response);
            //contenedor-pregunta
        },
        error: function (e) {
            alert("se obtubo un problema tipo " + e);
        }
    });*/

    var idpregunta = $('#idpregunta').val();
    let data = await $.ajax({
        type: "GET",
        url: "http://localhost:8080/stackoverflow/index.php?controller=pregunta&action=show&id=" + idpregunta,
        data: null,
        dataType: "json",
        error:function (e) {
            alert("se obutbo un error tipo " + e);
        }
    });
    let htmlPreguntaDetalle =   "<p>" +
                                    "<b>" + data.snombre.toUpperCase() + "</b>" +
                                "</p>" +
                                "<p>" +
                                data.pregunta.toUpperCase()
                                "</p>";
    $('.contenedor-pregunta').html(htmlPreguntaDetalle);
    //$('.contenedor-pregunta p:nth-child(1)').text("Nombre: " + data.snombre.toUpperCase());
    //$('.contenedor-pregunta p:nth-child(2)').text(data.pregunta.toUpperCase());
    console.log(data);


}
async function traerrespuestas() {
    
    var idpregunta = $('#idpregunta').val();
    let data = await $.ajax({
        type: "GET",
        url: "http://localhost:8080/stackoverflow/index.php?controller=pregunta&action=respuestaByIdpregunta&idpregunta=" + idpregunta,
        data: null,
        dataType: "json",
        error:function (e) {
            alert("se obutbo un error tipo " + e);
        }
    });

    if(data != false){
        var htmlRespuesta = "";
        data.forEach(element => {
            debugger;
            htmlRespuesta += "<div class='content-respuestas'>" +
                                    "<div class='content-cantidad'>" +
                                        "<span style='text-align: center'>" +
                                            "<i class='bi bi-caret-up'></i>" +
                                        "</span>" +
                                        "<p style='text-align: center'>" +
                                            "0" +
                                        "</p>" +
                                        "<span style='text-align: center'>" +
                                            "<i class='bi bi-caret-down'></i>" +
                                        "</span>" +
                                    "</div>" +
                                    "<div class='respuesta'>" +
                                        "<p>" +
                                            element.snombre +
                                        "</p>" +
                                        "<p>" +
                                            element.srespuesta +
                                        "</p>" +
                                    "</div>" +
                            "</div>";
        });
        $('.contenedor-respuestas').html(htmlRespuesta);
        console.log(data);
    }
}
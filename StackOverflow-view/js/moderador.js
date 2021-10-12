
$(document).ready(function() {
    // Add event listener for opening and closing details


        $.ajax({
        type: "GET",
        url: "http://localhost:8080/stackoverflow/index.php?controller=pregunta&action=index",
        data: null,
        dataType: "json",
        success: function (response) {
            //alert(JSON.stringify(response)); [{"id":1,"snombre":"carla","pregunta":"Como se compone un arduino?"}]
            var data = JSON.stringify(response);
            var tablaHTML = "<thead>" +
                                "<tr>" +
                                    "<th></th>" +
                                    "<th>ID</th>" +
                                    "<th>Nomrbe</th>" +
                                    "<th>Pregunta</th>" +
                                    "<th></th>" +
                                "</tr>" +
                            "</thead>" +
                            "<tbody>" ;
            response.forEach(element => {
                tablaHTML += "<tr>" +
                                    "<td class='dt-control'></td>" +
                                    "<td>"+ element.id +"</td>" +
                                    "<td>"+ element.snombre +"</td>" +
                                    "<td>"+ element.pregunta +"</td>" +
                                    '<td>' +
                                        '<button type="button" class="btn btn-danger" onclick="eliminarPregunta(this)" id="'+ element.id +'">' +
                                            'Elimiar' +
                                            '<!--a href="http://localhost:8080/stackoverflow/index.php?controller=respuesta&action=destroy&id='+ element.id +'"-->'+
                                            '<i class="bi bi-x-circle"></i>' +
                                            '</a>' +
                                        '</button>' +
                                    '</td>' +
                                "</tr>";
            });
            // cabezara de la tabla
            tablaHTML += "</tbody>" +
                        "<tfoot>" +
                            "<tr>" +
                                "<th></th>" +
                                "<th>ID</th>" +
                                "<th>snombre</th>" +
                                "<th>pregunta</th>" +
                                "<th></th>" +
                            "</tr>"
                        "</tfoot>";
            $('#table').html(tablaHTML);
            //console.log(response);

            var table = $('#table').DataTable({
                "order": [[1, 'asc']],
                searching:false,
                info: false,
                ordering: false,
                lengthChange: false
            });
            $('#table').on('click', '.dt-control', function () {
                var tr = $(this).closest('tr');
                var row = table.row( tr );
                
                if ( row.child.isShown() ) {
                    // This row is already open - close it
                    row.child.hide();
                }
                else {
                    // Open this row
                    //row.child( format(row.data()) ).show();
                    //console.log(format(row.data()));
                    format2(row.data(), row);
                }
            } );
            $('#table').on('.dt-control', function(e, row) {
                row.child(format(row.data())).show();


            })
        }
    });


} );

/* Formatting function for row details - modify as you need */
/*function format (d) {
    
    // hacemos el llamado al ajax para traer las respuestas
    // `d` is the original data object for the row
    return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
        '<tr>'+
        '<td>Full name:</td>'+
        '<td>'+d[1]+'</td>'+
        '</tr>'+
        '<tr>'+
        '<td>Extension number:</td>'+
        '<td>'+d[2]+'</td>'+
        '</tr>'+
        '<tr>'+
        '</table>';
}*/
async function format2 (d, row) {
    // hacemos el llamado al ajax para traer las respuestas
    var idpregunta = d[1];
    let data = await $.ajax({
        type: "GET",
        url: "http://localhost:8080/stackoverflow/index.php?controller=pregunta&action=respuestaByIdpregunta&idpregunta=" + idpregunta,
        data: null,
        dataType: "json",
        error:function (e) {
            alert("se obutbo un error tipo " + e);
        }
    });
    htmlRespuesta = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
    if(data != false){
        
        data.forEach(element => {
            
            htmlRespuesta += '<tr>'+
                                '<td>Nombre: </td>' +
                                '<td>'+ element.snombre +'</td>'+
                            '</tr>'+
                            '<tr>'+
                                '<td>Respuesta: </td>'+
                                '<td>'+ element.srespuesta +'</td>'+
                            '</tr>' +
                            '<tr>'+
                                '<td>Eliminar: </td>'+
                                '<td>' +
                                    '<button type="button" class="btn btn-danger" onclick="eliminarRespuesta(this)" id="'+ element.id +'">' +
                                        'Elimiar' +
                                        '<!--a href="http://localhost:8080/stackoverflow/index.php?controller=respuesta&action=destroy&id='+ element.id +'"-->'+
                                        '<i class="bi bi-x-circle"></i>' +
                                        '</a>' +
                                    '</button>' +

                                '</td>' +
                            '</tr>';     
        });
    }
    htmlRespuesta += '</table>';
    row.child(htmlRespuesta).show();
    // `d` is the original data object for the row
}
function eliminarRespuesta($event) {
    let idrespuesta = $event.id;
    $.confirm({
        title: 'Confirm!',
        content: 'Simple confirm!',
        buttons: {
            confirm: function () {
                //$.alert('Confirmed!');
                $.ajax({
                    type: "DELETE",
                    url: "http://localhost:8080/stackoverflow/index.php?controller=respuesta&action=destroy&id=" + idrespuesta,
                    data: null,
                    dataType: "json",
                    success: function (response) {
                        $.alert('Confirmed!');
                    }
                });
            },
            cancel: function () {
                $.alert('Canceled!');
            }
        }
    });

}
function eliminarPregunta($event) {
    let idpregunta = $event.id;
    $.confirm({
        title: 'Confirm!',
        content: 'Simple confirm!',
        buttons: {
            confirm: function () {
                //$.alert('Confirmed!');
                $.ajax({
                    type: "DELETE",
                    url: "http://localhost:8080/stackoverflow/index.php?controller=pregunta&action=destroy&id=" + idpregunta,
                    data: null,
                    dataType: "json",
                    success: function (response) {
                        $.alert('Confirmed!');
                    }
                });
            },
            cancel: function () {
                $.alert('Canceled!');
            }
        }
    });

}
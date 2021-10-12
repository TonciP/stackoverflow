var user = new Object();
$(document).ready( function () {

    if (localStorage.getItem('idventa') != null){
        user.idventa = localStorage.getItem('idventa');
        localStorage.removeItem('idventa');
    }
    var table = $('#table').DataTable();
    $('#table tbody').on('click', '.details-control', function () {

        var tr = $(this).closest('tr');
        var row = table.row( tr );

        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            if (row.data().length <= 7){
                debugger;
                row.child( format(row.data()) ).show();
                tr.addClass('shown');
                

            }else{
                //row.child( format2(row.data()) ).show();
                
                var id_cliente = $('#id_cliente').val();
                //user.codigo = row.data()[5];
                
                var data = { "id_cliente":id_cliente, "total":"0","estado":2};
                $.ajax({
                    url: 'http://localhost:8080/ABMventas/index.php?controller=venta&action=insert',
                    type: 'POST',
                    async: true,
                    data: JSON.stringify(data),
                    success: function (data) {
                        alert("respuesta" + data);
                        localStorage.setItem("idventa", data.success);
                        $(location).attr('href',"http://localhost:8080/ABMventas/index.php?controller=producto&action=show");
                    },
                    error: function (e) {
                        alert("error al llamado ajax" + e);
                    }
                });
                
                //tr.addClass('shown');
            }

        }
    } );
} );

function format ( d ) {
    // `d` is the original data object for the row
    return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
        '<tr>'+
        '<td>ID:</td>'+
        '<td>'+d[1] +'</td>'+
        '</tr>'+
        '<tr>'+
        '<td>Codigo:</td>'+
        '<td>'+ d[2] +'</td>'+
        '</tr>'+
        '<tr>'+
        '</tr>'+
        '<tr>'+
        '<td>Descripcion:</td>'+
        '<td>'+ d[3] +'</td>'+
        '</tr>'+
        '<tr>'+
        '</tr>'+
        '<tr>'+
        '<td>Precio:</td>'+
        '<td>'+ d[4] +'</td>'+
        '</tr>'+
        '<tr>'+
        '</tr>'+
        '<tr>'+
        '<td> <button type="button" class="btn btn-success">Agregar</button> </td>'+
        '</tr>'+
        '<tr>'+
        '</table>';
}
function addproductoventa($producto){
    var inserproducto = new Object();
    inserproducto.idproducto = $('').val();
    $.ajax({
        url: 'http://localhost:8080/ABMventas/index.php?controller=venta&action=insertDetalleVenta',
        type: 'POST',
        async: true,
        data: JSON.stringify(data),
        success: function (data) {
            alert("respuesta" + data);
            localStorage.setItem("idventa", data.success);
            $(location).attr('href',"http://localhost:8080/ABMventas/index.php?controller=cliente&action=show");
        },
        error: function (e) {
            alert("error al llamado ajax" + e);
        }
    });
}
function format2 ( d ) {
    // `d` is the original data object for the row
    return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
        '<tr>'+
        '<td>Codigo:</td>'+
        '<td>'+d[1] +'</td>'+
        '</tr>'+
        '<tr>'+
        '<td>Nombre Completo:</td>'+
        '<td>'+ d[2] +'</td>'+
        '</tr>'+
        '<tr>'+
        '</tr>'+
        '<tr>'+
        '<td>Direccion:</td>'+
        '<td>'+ d[3] +'</td>'+
        '</tr>'+
        '<tr>'+
        '</tr>'+
        '<tr>'+
        '<td>telefono:</td>'+
        '<td>'+ d[4] +'</td>'+
        '</tr>'+
        '<tr>'+
        '</tr>'+
        '<tr>'+
        '</tr>'+
        '<tr>'+
        '<td>Carnet:</td>'+
        '<td>'+ d[5] +'</td>'+
        '</tr>'+
        '<tr>'+
        '</tr>'+
        '<tr>'+
        '</tr>'+
        '<tr>'+
        '<td>sexo:</td>'+
        '<td>'+ d[6] +'</td>'+
        '</tr>'+
        '<tr>'+
        '</tr>'+
        '<tr>'+
        '</tr>'+
        '<tr>'+
        '<td>Edad:</td>'+
        '<td>'+ d[7] +'</td>'+
        '</tr>'+
        '<tr>'+
        '<td>And any further details here (images etc)...</td>'+
        '</tr>'+
        '</table>';
}
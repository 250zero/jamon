$(document).ready(function(){
    search();
});


function search(){
    $.ajax({
        url: BASE_URL + "clientes/all",
        method: "GET",
        dataType:"json",
        data:{search:$('#search').val()} 
    }).done(function(result){
        var html=''; 
         $(result.data).each(function(){  
            html += '<tr >'; 
            html += '<td>';
            html +=  this.nombre + ' ' + this.apellido;
            html += '</td>';
            html += '<td>';
            html +=  this.email;
            html += '</td>';
            html += '<td>';
            html +=  this.telefono;
            html += '</td>';
            html += '<td>';
            html +=  this.celular;
            html += '</td>'; 
            html += '<tr>'; 
        });
             $('#tabla_clientes tbody').html(html);
    });
}
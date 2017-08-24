$().ready(function(){

});


function search(){
    $.ajax({
        url: BASE_URL + "clientes/all",
        method: "GET",
        dataType:"json",
        data:{search:$('#search').val()} 
    }).done(function(result){
        var html=''; 
         $(result).each(function(){  
            html += '<tr class="info">'; 
            html += '<td  >';
            html += '<button class="btn btn-success"  onclick=" return editarModulo('+this.codigo+')"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></button>';
            html += '</td>';
            html += '<td colspan="3" >';
            html += this.codigo+' - '+this.nombre;
            html += '</td>';
            html += '<tr>'; 
             $('#modulo_permises tbody').html(html);
    });
}
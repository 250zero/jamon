var pagina = 1;
var ultima_pagina = 1;

$(document).ready(function(){
    buscar();
});


function buscar(){
    $.ajax({
        url: BASE_URL + "clientes/all",
        method: "GET",
        dataType:"json",
        data:{
            search:$('#search').val(),
            page:pagina
        } 
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
        ultima_pagina = result.last_page;
        $('#info_pag').html('Mostrando pagina '+result.current_page+' de '+result.last_page+', de '+result.total+' registros');
        $("#consultando_search tbody").html(html);     
    });
}


        
$('#client_next').on('click',function(){
    if(pagina < ultima_pagina ){ 
        pagina = pagina + 1;
        buscar();
    }
});

$('#client_prev').on('click',function(){
   if(pagina > 1){ 
        pagina = pagina - 1;
        buscar();
    }
});

$('#search').on('keypress',function(e){
    if(e.which == 13) { 
         pagina = 1;
         buscar();   
    }    
});
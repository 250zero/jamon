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
            html += '<tr onclick="verCliente('+this.id_cliente+')" >'; 
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


$('#btn_nuevo').on('click',function(){
    $('#ClientModal').modal('show');
    $('#client_name').val('');
    $('#client_last_name').val('');
    $('#email').val('');
    $('#telephone').val('');
    $('#cellphone').val('');
    $('.modal-title').html('Nuevo Cliente');
    $('#add_loans').css('display','none');
    $('#id_client').val('0');
});

$('#save_client').click(function(){
    data ={
        nombre : $('#client_name').val(),
        apellido : $('#client_last_name').val(),
        email : $('#email').val(),
        tell : $('#telephone').val(),
        cell : $('#cellphone').val(),
        id : $('#id_client').val(), 
        _token:$('input[name=_token]').val()
    };
    if($('#id_client').val() > 0){
        $.ajax({
            url: BASE_URL + 'clientes' ,
            method: 'PUT' ,
            dataType:'json',
            data:data
        }).done(function(result){
            if(result.status > 0)
            {
                pagina = 1;
                buscar();   
                $('#ClientModal').modal('hide');
                toastr.success(result.msn, 'Operación exitosa'); 
                return true;
            }
            toastr.warning(result.msn, 'Advertencia'); 
            return false;

        });
    }
    if($('#id_client').val() == 0){
        $.ajax({
            url: BASE_URL + 'clientes' ,
            method: 'POST' ,
            dataType:'json',
            data:data
        }).done(function(result){
            if(result.status > 0)
                {
                    pagina = 1;
                    buscar();   
                    $('#ClientModal').modal('hide');
                    toastr.success(result.msn, 'Operación exitosa'); 
                    return true;
                }
                toastr.warning(result.msn, 'Advertencia'); 
                return false;
    
        });
    }
});
 

function verCliente(id)
{
    $.ajax({
        url: BASE_URL + 'clientes/show' ,
        method: 'get' ,
        dataType:'json',
        data:{id:id}
    }).done(function(result){
        $('#client_name').val(result.nombre);
        $('#client_last_name').val(result.apellido);
        $('#email').val(result.email);
        $('#telephone').val(result.telefono);
        $('#cellphone').val(result.celular);
        $('.modal-title').html(result.nombre+' '+result.apellido);
        $('#add_loans').css('display','inline-block');
        $('#id_client').val(result.id_cliente);
        $('#ClientModal').modal('show');
    });
}
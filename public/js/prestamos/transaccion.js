
$('#transaccion_detail').on('click',function(){
    $('#transactionModal').modal('show'); 
    $('#tipo_transaccion').val(1);
    $('#cuotas_a_pagar').val(0);
    $('#comentario_transaccion').val('');
    $('#dia_mora_pagar').val(0);
   
});





$('#tipo_transaccion').on('change',function(){

    switch($('#tipo_transaccion').val()  ){
        case '1':
        $('#label_pago_transaccion').html('Numero de Cuotas a Pagar');  
        break;
        case '2':
        $('#label_pago_transaccion').html('Monto de Capital a Pagar');   
        break;
        case '3':
        $('#label_pago_transaccion').html('Monto de Mora a Pagar');  
        break;
    } 
    
});


$('#save_transacction').on('click',function(){
    if($('#tipo_transaccion').val() == 1 && $('#cuotas_a_pagar').val() > dias_restantes ){
        toastr.warning('El numero de cuotas a pagar excede el numero de cuotas restante', 'Advertencia'); 
        return false;
    }

    if(  $('#cuotas_a_pagar').val()  < 0 ){
        toastr.warning('El numero de cuotas a pagar no puede ser menor que cero', 'Advertencia'); 
        return false;
    }
    if(  $('#dia_mora_pagar').val()  < 0 ){
        toastr.warning('Los dias no puede ser menor que cero', 'Advertencia'); 
        return false;
    }
     var data={
         tipo_transacction:$('#tipo_transaccion').val(),
         cuotas_a_pagar:$('#cuotas_a_pagar').val(),
         comentario_transaccion:$('#comentario_transaccion').val(),
         dia_mora_pagar:$('#dia_mora_pagar').val(),
         id_prestamo:$('#id_prestamo').val(),
         _token:$('input[name=_token]').val() 
     }
        $.ajax({
            url: BASE_URL + 'prestamos/transacction' ,
            method: 'POST' ,
            dataType:'json',
            data:data
        }).done(function(result){
                if(result.status > 0)
                { 
                    $('#transactionModal').modal('hide');
                    toastr.success(result.msn, 'Operación exitosa'); 
                    verTransacction();
                    verPrestamos( )
                    verPrestamosDetails($('#id_prestamo').val());
                    return true;
                }
                toastr.warning(result.msn, 'Advertencia'); 
                return false; 
        });  
});
  



function verTransacction(){
    $.ajax({
        url: BASE_URL + 'prestamos/transacction/all' ,
        method: 'get' ,
        dataType:'json',
        data:{id:$('#id_prestamo').val()}
    }).done(function(result){
        var html=''; 
        $(result.data).each(function(){  
           html += '<tr   >'; 
           html += '<td>';
           html +=  this.created_at;
           html += '</td>';
           html += '<td>';
           html +=  this.comentario;
           html += '</td>';
           html += '<td>';
           html +=  format2(this.monto,'$');
           html += '</td>';   
           html += '<tr>'; 
       });
       $('#header_transact tbody').html(html);
       ultima_pagina_prest = result.last_page;
       $('#info_pag_loans_trans').html('Mostrando pagina '+result.current_page+' de '+result.last_page+', de '+result.total+' registros');
    });  
}

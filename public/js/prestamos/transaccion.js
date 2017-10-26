
$('#transaccion_detail').on('click',function(){
    $('#transactionModal').modal('show'); 
    $('#tipo_transaccion').val(1);
    $('#monto_transaccion').val(1);
    $('#comentario_transaccion').val('Yo '+$('#cliente_detalle_prestamo').html()+', realizare un pago de '+$('#monto_transaccion').val()+" Cuota(s), equivalente a un monto "+format2($('#monto_transaccion').val()*monto_cuotas,'$')); 
    $('.lbmensaje_prestamos').html('Cuotas Restantes '+(($('#numero_cuotas').html()*1)-$('#monto_transaccion').val()));
    $('#dia_mora_pagar').val(0);
   
});
$('#monto_transaccion').on('change',function(){  
    switch($('#tipo_transaccion').val()  ){
        case '1':
        $('#label_pago_transaccion').html('Numero de Cuotas a Pagar'); 
        $('#comentario_transaccion').val('Yo '+$('#cliente_detalle_prestamo').html()+', realizare un pago de '+$('#monto_transaccion').val()+" Cuota(s), equivalente a un monto "+format2($('#monto_transaccion').val()*monto_cuotas,'$')); 
        $('.lbmensaje_prestamos').html('Cuotas Restantes '+(($('#numero_cuotas').html()*1)-$('#monto_transaccion').val()));
        break;
        case '2':
        $('#label_pago_transaccion').html('Monto de Capital a Pagar');   
        $('#comentario_transaccion').val('Yo '+$('#cliente_detalle_prestamo').html()+', realizare un abono al capital por un monto de '+format2( ($('#monto_transaccion').val()*1)," $"));
        $('.lbmensaje_prestamos').html('Capital restante '  +format2( (capital_restante - $('#monto_transaccion').val()),'$' ));
        break;
        case '3':
        $('#label_pago_transaccion').html('Monto de Mora a Pagar');  
        $('#comentario_transaccion').val('Yo '+$('#cliente_detalle_prestamo').html()+', realizare un pago por concepto de mora, donde se me cobrara un monto de '+format2(($('#monto_transaccion').val()*1)," $"));
        $('.lbmensaje_prestamos').html('');
        break;
    } 
    
    
});
 


$('#tipo_transaccion').on('change',function(){

    switch($('#tipo_transaccion').val()  ){
        case '1':
        $('#label_pago_transaccion').html('Numero de Cuotas a Pagar'); 
        $('#comentario_transaccion').val('Yo '+$('#cliente_detalle_prestamo').html()+', realizare un pago de '+$('#monto_transaccion').val()+" Cuota(s), equivalente a un monto "+format2($('#monto_transaccion').val()*monto_cuotas,'$')); 
        $('.lbmensaje_prestamos').html('Cuotas Restantes '+(($('#numero_cuotas').html()*1)-$('#monto_transaccion').val()));
        break;
        case '2':
        $('#label_pago_transaccion').html('Monto de Capital a Pagar');   
        $('#comentario_transaccion').val('Yo '+$('#cliente_detalle_prestamo').html()+', realizare un abono al capital por un monto de '+format2( ($('#monto_transaccion').val()*1)," $"));
        $('.lbmensaje_prestamos').html('Capital restante '  +format2( (capital_restante - $('#monto_transaccion').val()),'$' ));
        break;
        case '3':
        $('#label_pago_transaccion').html('Monto de Mora a Pagar');  
        $('#comentario_transaccion').val('Yo '+$('#cliente_detalle_prestamo').html()+', realizare un pago por concepto de mora, donde se me cobrara un monto de '+$('#monto_transaccion').val()+" $");
        $('.lbmensaje_prestamos').html('');
        break;
    } 
    
});


$('#save_transacction').on('click',function(){
     
     var data={
         id_prestamo : $('#id_prestamo').val(),
         tipo_transacction:$('#tipo_transaccion').val(),
         monto_transaccion:$('#monto_transaccion').val(),
         comentario_transaccion:$('#comentario_transaccion').val() ,
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
                    verPrestamos( );
                    LoansDetail($('#id_prestamo').val());
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
           html += '<td><a class="btn btn-primary" href="'+ BASE_URL +'reportes/recibo?id='+this.id_transacciones+'" target="blank"><li class="fa fa-print"></li></a></td>';
           html += '<td>';
           html +=  this.created_at;
           html += '</td>';
           html += '<td>';
           html +=  this.comentario;
           html += '</td>';
           html += '<td>';
           if(parseInt(this.monto) < 100){ 
            html +=   this.monto ;
           }else{
           html +=  format2(this.monto,'$');
           }
           html += '</td>';   
           html += '<tr>'; 
       });
       $('#header_transact tbody').html(html);
       ultima_pagina_prest = result.last_page;
       $('#info_pag_loans_trans').html('Mostrando pagina '+result.current_page+' de '+result.last_page+', de '+result.total+' registros');
    });  
}
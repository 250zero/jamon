 var capital_solicitado = 0;
 var interes = 0;
 var total_pagar = 0;
 var total_pagar_interes=0;
 var fecha_ini = '';
 var fecha_fin = '';
 var numero_cuotas = 13;
 var dia_pago = '';
 var cuotas = 0;
 var interes_mora = 0;
 var monto_mora = 0;
 var rango_dias_mora = 0;
 var dias_restantes=0;
 var pagina_prest= 1 ;
 var ultima_pagina_prest = 0;


 $(document).ready(function(){
    actualizarValores(); 
 });


 $('#add_loans').on('click',function(){
    capital_solicitado = 0;
    interes = 0;
    total_pagar = 0;
    total_pagar_interes=0;
    fecha_ini = '';
    fecha_fin = '';
    numero_cuotas = 13;
    dia_pago = '';
    cuotas = 0;
    interes_mora = 0;
    monto_mora = 0;
    rango_dias_mora = 0;
    actualizarValores();
    $('.modal-title-loans').html('Nuevo Prestamo');
    $('#LoansModalDetail').modal('show');
 });

/*
* Operacion de calculo total del capital de prestamo
* INICIO
*/

function calcularPrestamo()
{
    /**
     * Utilizamos interes simple, empleando un tiempo constante en meses, donde por cada mes se calcula el interes
     */
    interes = Math.abs($('#interes').val());
    capital_solicitado =Math.abs($('#capital_solicitado').val());
    numero_cuotas = $('#numero_cuota').val();
    
    if(capital_solicitado > 0  && (interes > 0 && interes < 100)){
        total_pagar_interes = (Math.abs(capital_solicitado * (interes/100)*numero_cuotas));
        total_pagar =Math.abs(capital_solicitado )+ (Math.abs(capital_solicitado * (interes/100)*numero_cuotas))  ;
        cuota_pagar = total_pagar / numero_cuotas;
        $('#cuota_pagar').val(Math.round(cuota_pagar));
        $('#total_pagar_interes').val(total_pagar_interes);
        $('#total_pagar').val(total_pagar);
    } 
}


 $('#capital_solicitado').on('keyup',function(){
    calcularPrestamo();
 });

 $('#interes').on('keyup',function(){
    calcularPrestamo();
 });


$('#fecha_ini').on('change',function(){
    var fecha_ini_cal = new Date($('#fecha_ini').val());
    var fecha_fin_cal = new Date($('#fecha_fin').val());  
    var year= fecha_fin_cal.getFullYear() - fecha_ini_cal.getFullYear();
    numero_cuotas = ((fecha_fin_cal.getMonth() - fecha_ini_cal.getMonth()) + 1) + (12*year);
    $('#numero_cuota').val(numero_cuotas);
    calcularPrestamo();
 });

 $('#fecha_fin').on('change',function(){
    var fecha_ini_cal = new Date($('#fecha_ini').val());
    var fecha_fin_cal = new Date($('#fecha_fin').val());  
    var year= fecha_fin_cal.getFullYear() - fecha_ini_cal.getFullYear();
    numero_cuotas = ((fecha_fin_cal.getMonth() - fecha_ini_cal.getMonth()) + 1) + (12*year);
    $('#numero_cuota').val(numero_cuotas);
    calcularPrestamo();
 });

 
$('#save_loans').on('click',function(){
    data={
        capital_solicitado: $('#capital_solicitado').val(),
        porciento: $('#interes').val( ),
        total_pagar: $('#total_pagar').val( ),
        total_pagar_interes: $('#total_pagar_interes').val(),
        numero_cuotas: $('#numero_cuota').val( ),
        dias_pagos: $('#dia_pago').val( ),
        cuota_pagar: $('#cuota_pagar').val( ),
        interes_mora: $('#interes_mora').val( ),
        monto_mora: $('#monto_mora').val( ),
        dias_mora:$('#rango_dia_mora').val(), 
        _token:$('input[name=_token]').val(),
        id_cliente :$('#id_client').val() 
    };  
        $.ajax({
            url: BASE_URL + 'prestamos' ,
            method: 'post' ,
            dataType:'json',
            data:data,            
        }).done(function(result){
                if(result.status > 0)
                { 
                    $('#LoansModalDetail').modal('hide');
                    toastr.success(result.msn, 'Operación exitosa'); 
                    verPrestamos();
                    return true;
                }
                toastr.warning(result.msn, 'Advertencia'); 
                return false; 
        }); 

});



 function actualizarValores(){
    var now = new Date();
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2); 
    fecha_ini =now.getFullYear()+"-"+(month)  ; 
    fecha_fin = (now.getFullYear()+1)+"-"+(month ) ; 
    dia_pago = day;  
    $('#capital_solicitado').val( capital_solicitado);
    $('#interes').val( interes);
    $('#total_pagar').val( total_pagar); 
    $('#total_pagar_interes').val(total_pagar_interes);
    $('#fecha_ini').val( fecha_ini );
    $('#fecha_fin').val( fecha_fin);
    $('#numero_cuota').val( numero_cuotas); 
    $('#dia_pago').val( dia_pago);
    $('#cuota_pagar').val( cuotas); 
    $('#interes_mora').val( interes_mora);
    $('#monto_mora').val( monto_mora);
    $('#rango_dia_mora').val( rango_dias_mora);
 }



 
function verPrestamos( )
{
    $.ajax({
        url: BASE_URL + 'prestamos/clientes' ,
        method: 'get' ,
        dataType:'json',
        data:{
            id:$('#id_client').val(),
            page:pagina_prest    
        }
    }).done(function(result){
        var html=''; 
        $(result.data).each(function(){  
           html += '<tr onclick="verPrestamosDetails('+this.id_prestamo+')" >'; 
           html += '<td>';
           html +=  this.numero_cuotas;
           html += '</td>';
           html += '<td>';
           html +=  this.dias_pagos;
           html += '</td>';
           html += '<td>';
           html +=  this.porciento;
           html += '</td>';
           html += '<td>';
           html +=  format2(this.total_cuotas,'$');
           html += '</td>';
           html += '<td>';
           html +=  format2(this.capital_solicitado,'$');
           html += '</td>';
           html += '<td>';
           html +=  format2((this.capital_solicitado + this.interes_total),'$');
           html += '</td>'; 
           html += '<tr>'; 
       });
       $('#header_loans tbody').html(html);
       ultima_pagina_prest = result.last_page;
       $('#info_pag_loans').html('Mostrando pagina '+result.current_page+' de '+result.last_page+', de '+result.total+' registros');
    });
}

   
$('#loans_next').on('click',function(){
    if(pagina_prest < ultima_pagina_prest ){ 
        pagina_prest = pagina_prest + 1;
        verPrestamos( );
    }
});

$('#loans_prev').on('click',function(){
   if(pagina_prest > 1){ 
    pagina_prest = pagina_prest - 1; 
    verPrestamos( );
    }
});


function verPrestamosDetails(id){
    $.ajax({
        url: BASE_URL + 'prestamos/detail' ,
        method: 'get' ,
        dataType:'json',
        data:{id:id}
    }).done(function(result){
       
        $('#capital_solicitado_detail').html(format2(result.capital_solicitado,'$')); 
        $('.modal5-title').html('Detalle de prestamo'); 
        $('#capital_pagado_detail').html(format2(result.capital_pagado,'$'));
        $('#capital_restante_detail').html(format2(result.capital_restante,'$'));
        $('#interes_total_detail').html(format2(result.interes_total,'$'));
        $('#porciento_detail').html(result.porciento+'%');
        $('#interes_mora_detail').html( result.interes_mora );
        $('#interes_mora_monto_detail').html(format2(result.interes_mora_monto,'$'));
        $('#interes_mora_pagado_detail').html(format2(result.interes_mora_pagado,'$'));
        $('#total_cuotas_detail').html(format2(result.total_cuotas,'$'));
        $('#dias_pagos_detail').html(result.dias_pagos);
        $('#numero_cuotas_detail').html(result.numero_cuotas);
        if(result.estado == 1)
        {    
            $('#estado_prestamo').html('Activo');
            $('#estado_prestamo').css('color','#35ad0f');
        }
        if(result.estado == 0)
        {    
            $('#estado_prestamo').html('Anulado');
            $('#estado_prestamo').css('color','#d82525');  
            $('#estado_prestamo').css('font-weight','bold');
        }
        if(result.estado == 3)
        {    
            $('#estado_prestamo').html('Pagado');
            $('#estado_prestamo').css('color','#2552d8');     
            $('#estado_prestamo').css('font-weight','bold');   
        }
        numero_cuotas = result.numero_cuotas;
        dias_restantes = result.dias_restantes;
        $('#dias_restantes_detail').html(result.dias_restantes);   
        $('#id_prestamo').val(result.id_prestamo);  
        $('#LoansModalDetailTransac').modal('show');
        verTransacction();
    });
} 

$('#transaccion_detail').on('click',function(){
    $('#transactionModal').modal('show');
    $('#cuota_label').html('('+dias_restantes+'/'+numero_cuotas+')');
    $('#tipo_transaccion').val(1);
    $('#cuotas_a_pagar').val(0);
    $('#comentario_transaccion').val('');
    $('#dia_mora_pagar').val(0);
   
});


$('#tipo_transaccion').on('change',function(){
    if($('#tipo_transaccion').val() == 1)
    {
        $('#cuota_label').html('('+dias_restantes+'/'+numero_cuotas+')');
        $('.pago_cuota').css('display','block');
        $('.pago_mora').css('display','none');

    }
    if($('#tipo_transaccion').val() == 2)
    {
        $('.pago_cuota').css('display','none');
        $('.pago_mora').css('display','block');
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
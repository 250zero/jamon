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
    $('#LoansModalDetail').modal('show');
 });

/*
* Operacion de calculo total del capital de prestamo
* INICIO
*/
 $('#capital_solicitado').on('keyup',function(){
    interes = Math.abs($('#interes').val());
    capital_solicitado =Math.abs($('#capital_solicitado').val());
    numero_cuotas = $('#numero_cuota').val();
    
    if(capital_solicitado > 0  && (interes > 0 && interes < 100)){
        total_pagar_interes = Math.abs(capital_solicitado * (interes/100))  ;
        total_pagar =Math.abs(capital_solicitado )+ Math.abs(capital_solicitado * (interes/100))  ;
        cuota_pagar = total_pagar / numero_cuotas;
        $('#cuota_pagar').val(cuota_pagar);
        $('#total_pagar_interes').val(total_pagar_interes);
        $('#total_pagar').val(total_pagar);
    } 
 });

 $('#interes').on('keyup',function(){
    interes = Math.abs($('#interes').val());
    capital_solicitado =Math.abs($('#capital_solicitado').val());
    numero_cuotas = $('#numero_cuota').val();
    
    if(capital_solicitado > 0  && (interes > 0 && interes < 100)){
        total_pagar_interes = Math.abs(capital_solicitado * (interes/100))  ;
        total_pagar =Math.abs(capital_solicitado )+ Math.abs(capital_solicitado * (interes/100))  ;
        cuota_pagar = total_pagar / numero_cuotas;
        $('#cuota_pagar').val(cuota_pagar);
        $('#total_pagar_interes').val(total_pagar_interes);
        $('#total_pagar').val(total_pagar);
    } 
 });

/*
* Operacion de calculo total del capital de prestamo
* FIN
*/



/*
* Operacion de calculo  de cuotas
* INICIO
*/
$('#fecha_ini').on('change',function(){
    var fecha_ini_cal = new Date($('#fecha_ini').val());
    var fecha_fin_cal = new Date($('#fecha_fin').val());  
    var year= fecha_fin_cal.getFullYear() - fecha_ini_cal.getFullYear();
    numero_cuotas = ((fecha_fin_cal.getMonth() - fecha_ini_cal.getMonth()) + 1) + (12*year);
    $('#numero_cuota').val(numero_cuotas);
    
    if(capital_solicitado > 0  && (interes > 0 && interes < 100)){
        total_pagar_interes = Math.abs(capital_solicitado * (interes/100))  ;
        total_pagar =Math.abs(capital_solicitado )+ Math.abs(capital_solicitado * (interes/100))  ;
        cuota_pagar = total_pagar / numero_cuotas;
        $('#cuota_pagar').val(cuota_pagar);
        $('#total_pagar_interes').val(total_pagar_interes);
        $('#total_pagar').val(total_pagar);
    } 
 });

 $('#fecha_fin').on('change',function(){
     var fecha_ini_cal = new Date($('#fecha_ini').val());
     var fecha_fin_cal = new Date($('#fecha_fin').val()); 
     interes = Math.abs($('#interes').val());
     capital_solicitado =Math.abs($('#capital_solicitado').val()); 
     var year= fecha_fin_cal.getFullYear() - fecha_ini_cal.getFullYear();

     numero_cuotas = ((fecha_fin_cal.getMonth() - fecha_ini_cal.getMonth()) + 1) + (12*year);
     $('#numero_cuota').val(numero_cuotas);
     
     if(capital_solicitado > 0  && (interes > 0 && interes < 100)){
         total_pagar_interes = Math.abs(capital_solicitado * (interes/100))  ;
         total_pagar =Math.abs(capital_solicitado )+ Math.abs(capital_solicitado * (interes/100))  ;
         cuota_pagar = total_pagar / numero_cuotas;
         $('#cuota_pagar').val(cuota_pagar);
         $('#total_pagar_interes').val(total_pagar_interes);
         $('#total_pagar').val(total_pagar);
     } 
  });

  $('#numero_cuota').on('keyup',function(){  
    numero_cuotas = $('#numero_cuota').val();
    
    if(capital_solicitado > 0  && (interes > 0 && interes < 100)){
        total_pagar_interes = Math.abs(capital_solicitado * (interes/100))  ;
        total_pagar =Math.abs(capital_solicitado )+ Math.abs(capital_solicitado * (interes/100))  ;
        cuota_pagar = total_pagar / numero_cuotas;
        $('#cuota_pagar').val(cuota_pagar);
        $('#total_pagar_interes').val(total_pagar_interes);
        $('#total_pagar').val(total_pagar);
    } 
 });

/*
* Operacion de calculo de cuotas
* FIN
*/
 
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
            method: 'POST' ,
            dataType:'json',
            data:data
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
    fecha_ini =now.getFullYear()+"-"+(month)+"-"+(day)  ; 
    fecha_fin = (now.getFullYear()+1)+"-"+(month )+"-"+(day) ; 
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
           html +=  this.total_cuotas;
           html += '</td>';
           html += '<td>';
           html +=  this.capital_solicitado;
           html += '</td>';
           html += '<td>';
           html +=  (this.capital_solicitado + this.interes_total);
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
        pagina = pagina + 1;
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
        $('#capital_solicitado_detail').html(result.capital_solicitado);
        $('#capital_pagado_detail').html(result.capital_pagado);
        $('#capital_restante_detail').html(result.capital_restante);
        $('#interes_total_detail').html(result.interes_total);
        $('#porciento_detail').html(result.porciento+'%');
        $('#interes_mora_detail').html(result.interes_mora);
        $('#interes_mora_monto_detail').html(result.interes_mora_monto);
        $('#interes_mora_pagado_detail').html(result.interes_mora_pagado);
        $('#total_cuotas_detail').html(result.total_cuotas);
        $('#dias_pagos_detail').html(result.dias_pagos);
        $('#numero_cuotas_detail').html(result.numero_cuotas);
        $('#dias_restantes_detail').html(result.dias_restantes);   
        $('#LoansModalDetailTransac').modal('show');
    });
}
$('#LoansModalDetailTransac').modal('show');
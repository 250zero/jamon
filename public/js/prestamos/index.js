 var capital_solicitado = 0;
 var capital_restante = 0;
 var interes = 0;
 var numero_cuotas = 0;
 var monto_cuotas = 0;
 var dia_pago = '1'; 
 var monto_mora = 0;
 var id_prestamo = 0;
 var rango_dia_mora = 0;
 var metodologia = 1;
 var periodo = 1;
 var client = 0;


 var pagina_prest= 1 ;
 var ultima_pagina_prest = 0; 
 function buscarLoans()
 {
    $.ajax({
        url: BASE_URL + 'prestamos/all' ,
        method: 'get' ,
        dataType:'json',
        data:{
            search : $().val(),
            page : pagina_prest
        },            
    }).done(function(result){
        var html = '';
         $(result.data).each(function(){
                html += '<tr onclick="LoansDetail(\''+this.id_prestamo+'\')" >';
                html += '<td>'+this.id_prestamo+'</td>';
                html += '<td>'+format2(this.capital_solicitado,'$')+'</td>';
                html += '<td>'+this.interes+'%</td>';
                html += '<td>'+this.rs_periodo.names+'</td>';
                html += '<td>'+this.cuotas_restante+'</td>';
                html += '<td>'+this.rs_cliente.nombre + ' ' +this.rs_cliente.apellido+'</td>';
                html += '</tr>';
         });
         $('#tabla_prestamos tbody').html(html);
    }); 
 }

 $(document).ready(function(){ 
    setearValores(); 
    buscarLoans();
 });
  

 $('#btn_nuevo').on('click',function(){
    actualizarValores();
    setearValores();
    $('#generar_proyeccion').trigger('click');
    $('.modal-title-loans').html('Nuevo Prestamo');
    $('#LoansModalDetail').modal('show');
 });

 function setearValores()
 {    
     $('#capital_solicitado').val(capital_solicitado);
     $('#interes').val(interes);
     $('#num_cuotas').val(numero_cuotas);
     $('#dia_pago').val(dia_pago);
     $('#monto_mora').val(monto_mora);
     $('#rango_dia_mora').val(rango_dia_mora);
     $('#method_loans').val(metodologia);
     $('#period_loans').val(periodo );
     $('#client_loans').val(client);
 }
 
 function actualizarValores()
 {    
     capital_solicitado = $('#capital_solicitado').val();
     interes = $('#interes').val();
     numero_cuotas = $('#num_cuotas').val( );
     dia_pago = $('#dia_pago').val(); 
     monto_mora =$('#monto_mora').val( );
     rango_dia_mora =  $('#rango_dia_mora').val( );
     metodologia =  $('#method_loans').val( );
     periodo =  $('#period_loans').val( );
     client =  $('#client_loans').val( );
 }
 
 

 
 function LoansDetail(id )
 {     id_prestamo = id;
      $.ajax({
            url: BASE_URL + 'prestamos/detail' ,
            method: 'get' ,
            dataType:'json',
            data:{id:id},            
        }).done(function(result){
                 $('.modal30-title').html('Detalle de Prestamo ');
                 $('#cliente_detalle_prestamo').html(result.rs_cliente.nombre + ' '+result.rs_cliente.apellido );
                 $('#metodo_prestamo').html(result.rs_periodo.names);

                 $('#tipo_calculo_interes').html(result.rs_tipo_prestamo.names);

                 $('#capital_solicitado_detail').html(format2(result.capital_solicitado,'$')); 
                 $('#capital_pagado_detail').html(format2(result.capital_pagado,'$'));
                 $('#capital_restante_detail').html(format2(result.capital_restante,'$'));
                 $('#porciento_detail').html(result.interes+' %');
                 $('#interes_total_detail').html(format2(result.interes_total,'$'));
                 $('#montal_interes_pagado').html(format2(result.interes_pagado,'$'));
                 $('#montal_interes_restante').html(format2(result.interes_restante,'$'));                 
                 $('#numero_cuotas').html( result.cuotas_numero );              
                 $('#id_prestamo').val( result.id_prestamo );
                 monto_cuotas  = result.cuotas_monto;
                 capital_restante = result.capital_restante;
                 $('#monto_cuotas').html(format2(result.cuotas_monto,'$'));
                 $('#numero_cuotas_pagadas').html( result.cuotas_pagada );
                 $('#numero_cuotas_restante').html( result.cuotas_restante );                 
                 $('#monto_cuotas_capital').html(format2( result.cuotas_capital,'$') );
                 $('#monto_cuotas_interes').html(format2(result.cuotas_interes,'$')); 
  
                 $('#numero_cuotas_restante').html( result.cuotas_restante ); 
                 $('#monto_pagar_mora').html( format2(result.mora_monto,'$') ); 
                 
                 $('#mora_pagada').html( result.mora_pagado );  
                 $('#dia_de_pago').html( result.dias_pago  ); 


                 $('#tabla_amortizacion').attr( 'href', BASE_URL + 'reportes/amortizacion?id='+ id); 
                 $('#tabla_amortizacion').attr( 'target', 'blank' ); 
                  
                 $('#LoansModalDetailTransac').modal('show');
                 verTransacction();
        }); 
 }
 

 
 $('#generar_proyeccion').on('click',function(){
    actualizarValores();
    data={
          capital_solicitado : capital_solicitado,
          interes :interes,
          numero_cuotas :numero_cuotas,
          dia_pago :dia_pago, 
          monto_mora:monto_mora,
          rango_dia_mora :rango_dia_mora,
          metodologia :metodologia,
          periodo :periodo,
          client :client 
    };  
        $.ajax({
            url: BASE_URL + 'prestamos/vista/previa' ,
            method: 'get' ,
            dataType:'html',
            data:data,            
        }).done(function(result){
                 $('#prestamos_vista_previa').html(result);
        }); 

});

$('#save_loans').on('click',function(){
   actualizarValores();
   data={
         capital_solicitado : capital_solicitado,
         interes :interes,
         numero_cuotas :numero_cuotas,
         dia_pago :dia_pago, 
         monto_mora:monto_mora,
         rango_dia_mora :rango_dia_mora,
         metodologia :metodologia,
         periodo :periodo,
         client :client ,
         _token:$('input[name=_token]').val()
   };  
       $.ajax({
           url: BASE_URL + 'prestamos' ,
           method: 'post' ,
           dataType:'json',
           data:data,            
       }).done(function(result){
            if(result.status > 0)
            {
                    pagina_prest = 1;
                    buscarLoans();    
                    $('#LoansModalDetail').modal('hide');
                    toastr.success(result.msn, 'Operación exitosa'); 
                    return true;
            }
                toastr.warning(result.msn, 'Advertencia'); 
                return false;
       }); 

});




 
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
           html += '<tr onclick="LoansDetail('+this.id_prestamo+')" >'; 
           html += '<td>';
           html +=  this.cuotas_numero;
           html += '</td>';
           html += '<td>';
           html +=  this.dias_pago;
           html += '</td>';
           html += '<td>';
           html +=  this.interes;
           html += '</td>';
           html += '<td>';
           html +=  format2(this.cuotas_monto,'$');
           html += '</td>';
           html += '<td>';
           html +=  format2(this.capital_solicitado,'$');
           html += '</td>';
           html += '<td>';
           html +=  format2((this.capital_restante + this.interes_restante),'$');
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

 


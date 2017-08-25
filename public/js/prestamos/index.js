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
   
    $('#LoansModalDetail').modal('show'); var now = new Date();
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2); 
    fecha_ini =  now.getFullYear() +'-'+month  ; 
    fecha_fin =  (now.getFullYear() + 1) +'-'+month  ; 
    dia_pago = day; 

    actualizarValores();
 });


 $('#add_loans').on('click',function(){
    var now = new Date();
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2); 
    fecha_ini =now.getFullYear()+"-"+(month)+"-"+(day)  ; 
    fecha_fin = (now.getFullYear()+1)+"-"+(month )+"-"+(day) ; 
    dia_pago = day;  
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
    interes = Math.abs($('#interes').val());
    capital_solicitado =Math.abs($('#capital_solicitado').val()); 
    var year= fecha_fin_cal.getFullYear() - fecha_ini_cal.getFullYear();

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
 

 function actualizarValores(){
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
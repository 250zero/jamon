 cargarPeriodos();
 cargarMetodos();
 cargarClientes();
 
function cargarMetodos(){
    $.ajax({
        url: BASE_URL + 'configuracion' ,
        method: 'get' ,
        dataType:'json',
        data:{tipo:1},            
    }).done(function(result){
            var html='';
            $(result).each(function(){
                html += '<option value="'+this.id+'">';
                html +=  this.names;
                html += '</option>'; 
                
            });
            $('#method_loans').html(html);
    }); 

}
 
function cargarPeriodos(){
    $.ajax({
        url: BASE_URL + 'configuracion' ,
        method: 'get' ,
        dataType:'json',
        data:{tipo:2},            
    }).done(function(result){
            var html='';
            $(result).each(function(){
                html += '<option value="'+this.id+'">';
                html +=  this.names;
                html += '</option>'; 
            });
            $('#period_loans').html(html);
    }); 

} 
function cargarClientes(){
    $.ajax({
        url: BASE_URL + 'clientes/list' ,
        method: 'get' ,
        dataType:'json',
        data:{tipo:2},            
    }).done(function(result){
            var html='';
            $(result).each(function(){
                html += '<option value="'+this.id_cliente+'">';
                html +=  this.nombre+' '+this.apellido;
                html += '</option>'; 
            });
            $('#client_loans').html(html);
    }); 

}
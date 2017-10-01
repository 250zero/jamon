var eventos = [];

$(document).ready(function() {
    
        // page is now ready, initialize the calendar...
        eventosMes(); 
    });

    function eventosMes()
    {
        $.ajax({
            url: BASE_URL + 'agenda/all' ,
            method: 'GET' ,
            dataType:'json'
        }).done(function(result){ 
            eventos = result;
            $('#calendar').fullCalendar({
                locale: 'es',
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,list'
                }, 
                events: eventos,
                dayClick: function(date, jsEvent, view) {
                    getDay(date);
                    console.log('Clicked on: ' + date.format());
                    
                    console.log('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
                    
                    console.log('Current view: ' + view.name);
                    
                }
            })
        });
    }

    var pagina_agenda_day = 1 ;
    var pagina_agenda_day_last = 0 ;
    function getDay(date)
    {
        $.ajax({
            url: BASE_URL + 'agenda/show/day' ,
            method: 'GET' ,
            dataType:'json',
            data:{
                fecha:date.format(),
                page:pagina_agenda_day
            }
        }).done(function(result){ 
            var html=''; 
            var estado=[
                    'Al dia',
                    'Atrasado',
                    'Mora'    
             ];
             var estado_color=[
                'blue',
                'yellow',
                'red'    
         ];
             
            $(result.data).each(function(){  
               html += '<tr onclick="verCliente('+this.id_cliente+')" >'; 
               html += '<td style="color:'+estado_color[this.estado-1]+';font-weight: bold;" >';
               html +=  estado[ this.estado-1 ];
               html += '</td>';
               html += '<td>';
               html +=  this.rs_cliente.nombre;
               html += '</td>';
               html += '<td>';
               html +=  this.rs_cliente.telefono;
               html += '</td>';
               html += '<td>';
               html +=  this.comentario;
               html += '</td>'; 
               html += '<tr>'; 
           });
           $('#tabla_agenda tbody').html(html);
           pagina_agenda_day_last = result.last_page;
           if(result.last_page <= 2)
           {
               $('#agenda_nav').css('display','none');
           }else
           {
               $('#agenda_nav').css('display','block');
           }
           $('#agenda_info_pag').html('Mostrando pagina '+result.current_page+' de '+result.last_page+', de '+result.total+' registros');
           $("#consultando_search tbody").html(html);  
           $('#AgendaModal').modal('show');
           $('.modal3-title-agenda').html('Agenda del '+date.format());
        }).fail(function(){

        });
    }
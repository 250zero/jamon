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
                    console.log('Clicked on: ' + date.format());
                    
                    console.log('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
                    
                    console.log('Current view: ' + view.name);
                    
                }
            })
        });
    }
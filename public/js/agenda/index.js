$(document).ready(function() {
    
        // page is now ready, initialize the calendar...
    
        $('#calendar').fullCalendar({
            locale: 'es',
            header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,list'
			}, 
            dayClick: function(date, jsEvent, view) {
                console.log('Clicked on: ' + date.format());
                
                console.log('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
                
                console.log('Current view: ' + view.name);
                
            }
        })
    
    });
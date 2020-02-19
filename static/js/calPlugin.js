$(document).ready(function() {
	var base_url = $('.base_url').val();
    	var date = new Date();
	var d = date.getDate();
	var m = date.getMonth();
	var y = date.getFullYear();

	/*  className colors

	className: default(transparent), important(red), chill(pink), success(green), info(blue)

	*/


	/* initialize the external events
	-----------------------------------------------------------------*/

	$('#external-events div.external-event').each(function() {

		// create an Event Object (https://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
		// it doesn't need to have a start or end
		var eventObject = {
			title: $.trim($(this).text()) // use the element's text as the event title
		};

		// store the Event Object in the DOM element so we can get to it later
		$(this).data('eventObject', eventObject);

		// make the event draggable using jQuery UI
		$(this).draggable({
			zIndex: 999,
			revert: true,      // will cause the event to go back to its
			revertDuration: 0  //  original position after the drag
		});

	});


	/* initialize the calendar
	-----------------------------------------------------------------*/

	var calendar =  $('#calendar').fullCalendar({
		header: {
			left: 'title',
			center: 'agendaDay,agendaWeek,month',
			right: 'prev,next today'
		},
		editable: true,
		firstDay: 7, //  1(Monday) this can be changed to 0(Sunday) for the USA system
		selectable: true,
		defaultView: 'month',

		axisFormat: 'h:mm',
		columnFormat: {
           month: 'ddd',    // Mon
           week: 'ddd d', // Mon 7
           day: 'dddd M/d',  // Monday 9/7
           agendaDay: 'dddd d'
       },
       titleFormat: {
           month: 'MMMM yyyy', // September 2009
           week: "MMMM yyyy", // September 2009
           day: 'MMMM yyyy'                  // Tuesday, Sep 8, 2009
       },
		allDaySlot: false,
		selectHelper: true,
		select: function(start, end, allDay) {
			let current_date = new Date();
			let getMonthVar = '';
			let getDayVar = '';
			if(start.getDate().toString().length == 1){
				getDayVar = "0"+start.getDate();
			} else {
				getDayVar = start.getDate();
			}
			if((start.getMonth() + 1).toString().length == 1){
				getMonthVar = "0"+(start.getMonth() + 1);
			} else {
				getMonthVar = start.getMonth() + 1;
			}
			var date_get = start.getFullYear()+"/"+getMonthVar+"/"+getDayVar;
               $('input[name="date_lead_order"]').val(date_get);
               $('#calendarModal').modal('show');
			calendar.fullCalendar('unselect');
		},
		droppable: false, // this allows things to be dropped onto the calendar !!!
		drop: function(date, allDay) { // this function is called when something is dropped
               // console.log(date);
			// retrieve the dropped element's stored Event Object
			var originalEventObject = $(this).data('eventObject');

			// we need to copy it, so that multiple events don't have a reference to the same object
			var copiedEventObject = $.extend({}, originalEventObject);

			// assign it the date that was reported
			copiedEventObject.start = date;
			copiedEventObject.allDay = allDay;

			// render the event on the calendar
			// the last `true` argument determines if the event "sticks" (https://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
			$('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

			// is the "remove after drop" checkbox checked?
			if ($('#drop-remove').is(':checked')) {
				// if so, remove the element from the "Draggable Events" list
				$(this).remove();
			}

		},

		events: getCalendarEvent(),
	});
	$(document).on('submit','#lead_order_form',function(e){
          e.preventDefault();
          var formdata = new FormData($(this)[0]);
          $.ajax({
               url: base_url+"Leadorder/submit_lead_order",
               data: formdata,
               processData: false,
               contentType: false,
			async:false,
               type: 'POST',
               success: function(data){
				$('#lead_order_form').trigger('reset');
				var obj = $.parseJSON(data);
				calendar.fullCalendar('renderEvent',{
					title: obj.first_name+" "+obj.last_name,
					start:  obj.start_date,
					end:  obj.start_date,
					allDay: false
				},false);
				$('#calendarModal').modal('hide');
               }
          });
     });
	$(document).on('click','.successCalLegend',function(){
		var id = $(this).attr('class').split(":::")[1];
		$.ajax({
			url:base_url+'leadorder/get_lead_order_details',
			type:"post",
			data:{
				'id':id
			},
			success:function(data){
				var obj = $.parseJSON(data);
				$('#getRequestLeadOrder').modal('show');
				$('input[name="view_date_lead_order"]').val(obj.lead_order_data.start_date.replace(/\-/g, '/'));
				$('input[name="view_time_lead_order"]').val(obj.lead_order_data.time);
				$('select[name="view_miles"]').val(obj.lead_order_data.mile.split(" ")[0]).trigger('change');
			}
		});

	});
});
function getCalendarEvent(){
	var base_url = $('.base_url').val();
	var events_data = [];


	$.ajax({
		url:base_url+'leadorder/get_lead_order',
		type:"post",
		async:false,
		success:function(data){
			var obj = $.parseJSON(data);

			$.each(obj.lead_order_data, function(x,y){
				var obj_data = {};
				obj_data.title = y.first_name+" "+y.last_name;
				obj_data.start = y.start_date;
				obj_data.end = y.end_date;
				obj_data.className = 'successCalLegend data_num:::'+y.id;
				// obj_data.className = '';
				events_data.push(obj_data);
			});
		}
	});
	return events_data;
}

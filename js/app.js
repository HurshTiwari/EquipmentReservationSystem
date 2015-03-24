(function($) {

	"use strict";

	var options = {
		events_source: 'feedevent.php',
		view: 'month',
		tmpl_path: 'tmpls/',
		tmpl_cache: false,
		day: 'now',
		onAfterEventsLoad: function(events) {
			if(!events) {
				return;
			}
			var list = $('#eventlist');
			list.html('');

			$.each(events, function(key, val) {
				$(document.createElement('li'))
					.html('<a href="' + val.url + '">' + val.title + '</a>')
					.appendTo(list);
			});
		},
		onAfterViewLoad: function(view) {
			$('.page-header #head').text(this.getTitle());
			$('.btn-group button').removeClass('active');
			$('button[data-calendar-view="' + view + '"]').addClass('active');
			
				if(this.options.view =='day'){		
				var data=$(".page-header #head").text();
				var array=data.split(' ');
				var day=array[1];
				var finalday;
				if((day=='0')||(day=='1')||(day=='2')||(day=='3')||(day=='4')||(day=='5')||(day=='6')||(day=='7')||(day=='8')||(day=='9'))
					{finalday='0'+day;}
				else
					{finalday=day;}
				var month=array[2].split(',');
				var m='00';
				if(month[0]=='January')
					{ m='01';}
				else if(month[0]=='February')
					{ m='02';}
				else if(month[0]=='March')
					{ m='03';}
				else if(month[0]=='April')
					{ m='04';}
				else if(month[0]=='May')
					{ m='05';}
				else if(month[0]=='June')
					{ m='06';}
				else if(month[0]=='July')
					{ m='07';}
				else if(month[0]=='August')
					{ m='08';}
				else if(month[0]=='September')
					{ m='09';}
				else if(month[0]=='October')
					{ m='10';}
				else if(month[0]=='November')
					{ m='11';}
				else if(month[0]=='December')
					{ m='12';}
				else
					window.console('-1');
					
				var final=finalday+"-"+m+"-"+array[3];
				$("#sdate").val(final);
				}		
			
		},
		classes: {
			months: {
				general: 'label'
			}
		}
	};

	var calendar = $('#calendar').calendar(options);

	$('.btn-group button[data-calendar-nav]').each(function() {
		var $this = $(this);
		$this.click(function() {
			calendar.navigate($this.data('calendar-nav'));
		});
	});

	$('.btn-group button[data-calendar-view]').each(function() {
		var $this = $(this);
		$this.click(function() {
			calendar.view($this.data('calendar-view'));
		});
	});

	$('#first_day').change(function(){
		var value = $(this).val();
		value = value.length ? parseInt(value) : null;
		calendar.setOptions({first_day: value});
		calendar.view();
	});

	$('#language').change(function(){
		calendar.setLanguage($(this).val());
		calendar.view();
	});
	$('#events-in-modal').change(function(){
		var val = "#events-modal";
		calendar.setOptions({modal: val});
	});
	$('#events-modal .modal-header, #events-modal .modal-footer').click(function(e){
		//e.preventDefault();
		//e.stopPropagation();
	});
}(jQuery));
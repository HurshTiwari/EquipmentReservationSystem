$(document).ready(function(){
		$.validator.addMethod("isvalidtime", 
				function(value, element) {
					return this.optional(element) || /^([01]?[0-9]|2[0-3]):[0-5][0-9]:[0-5][0-9]$/.test(value);
				}, 
				"Please, enter a valid time"
				);
		$.validator.addMethod("startandend", 
				function(value, element,param) {
					//convert both time into timestamp
					var stt = parseInt($(param).val().replace(':', ''), 10); 
					var endt = parseInt(value.replace(':', ''), 10);
					if(endt > stt)
					{
					return true;
					}
					else
					return this.optional(element);
									}, 
									"Error! Starttime greater than end time"
				);

		$('#myForm').validate({
		onkeyup:false,
	    rules: {
		 starttime: {
	        required: true,
			isvalidtime: true,
			remote:
			{
				url:"checktimeclash.php",
				type:"post",
				data:{
					"startdate" : function(){ var sdate=$("#startdate").val();
					var array=sdate.split('-');
					return array[2]+'-'+array[1]+'-'+array[0];},
				}
			}
	      },
		 endtime: {
	        isvalidtime: true,
	        required: true,
			startandend: "#starttime",
			remote:
			{
				url:"checktimeclash.php",
				type:"post",
				data:{
					"startdate" : function(){ var sdate=$("#startdate").val();
					var array=sdate.split('-');
					return array[2]+'-'+array[1]+'-'+array[0];
					},
				}
			
			}
	      }
	    },
		messages: {
		 endtime: {
	        remote: "End Time is clashing with another booking"
	      },
		 starttime: {
	        remote: "Start Time is clashing with another booking"
	      }
	    },
			highlight: function(element) {
				$(element).closest('.control-group').removeClass('success').addClass('error');
			},
			success: function(element) {
				element
				.text('OK!').addClass('valid')
				.closest('.control-group').removeClass('error').addClass('success');
			}
	  });

}); // end document.ready
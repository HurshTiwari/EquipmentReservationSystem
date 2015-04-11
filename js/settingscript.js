$(document).ready(function(){
		$.validator.addMethod("customemail", 
				function(value, element) {
					return this.optional(element) || /^.+@iiti\.ac\.in$/.test(value);
				}, 
				"Sorry, Email has to be from iiti domain"
				);
		$.validator.addMethod("accuraterollno", 
				function(value, element) {
					return this.optional(element) || /^\d*$/.test(value);
				}, 
				"Please enter a valid roll no"
				);
			jQuery.validator.setDefaults({
			debug: true
			});

		$('#name_form').validate({
	    rules: {
		 username: {
	        minlength: 6,
	        required: true
	      },
		  
		  /*password: {
				required: true,
				minlength: 6
			},
			confirm_password: {
				required: true,
				minlength: 6,
				equalTo: "#password"
			},
		  
	      email: {
	        required: true,
	        customemail: true
	      },
		  
	     
		   rollno: {
	        required: true,
			accuraterollno:true
	      },*/
	    },
		messages: {
		 username: {
	        minlength: "Please enter minimum 6 letters",
	        required: "Sorry! Can't leave this blank"
	      },
		  
		  /*password: {
				required: "Sorry! Can't leave this blank",
				minlength: "Please enter minimum 6 letters"
			},
			confirm_password: {
				required: "Please confirm the password",
				minlength: "Please enter minimum 6 letters",
				equalTo: "Passwords don't match"
			},
		  
	      email: {
	        required: "Sorry! Can't leave this blank",
	        email: "Please enter a valid email"
	      },
		  
	     
		   rollno: {
	        required: "Sorry! Can't leave this blank"
	      },*/
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
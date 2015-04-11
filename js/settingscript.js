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
		$.validator.addMethod("accuraterphoneno", 
				function(value, element) {
					return this.optional(element) || /^\d*$/.test(value);
				}, 
				"Please enter a valid phone no"
				);
		
	$('#name_form').validate({
	    rules: {
		 username: {
	        minlength: 1,
			maxlength: 75,
	        required: true
	      }
	    },
		messages: {
		 username: {
	        minlength: "Please enter minimum 1 letter",
			maxlength: "Maximium 75 letters allowed"
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

	$('#password_form').validate({
	    rules: {
		 password: {
	        minlength: 2,
			maxlength: 75,
	        required: true
	      }
	    },
		messages: {
		 password: {
	        minlength: "Please enter minimum 2 letter",
			maxlength: "Maximium 75 letters allowed"
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
	$('#email_form').validate({
	    rules: {
		 email: {
	        required: true,
			customemail:true
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
	$('#tempadd_form').validate({
	    rules: {
		 tempadd: {
	        minlength: 10,
			maxlength: 250,
	      }
	    },
		messages: {
		 tempadd: {
	        minlength: "Please enter minimum 10 letters",
			maxlength: "Maximium 250 letters allowed"
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
	  $('#peradd_form').validate({
	    rules: {
		 peradd: {
	        minlength: 10,
			maxlength: 250
	      }
	    },
		messages: {
		 peradd: {
	        minlength: "Please enter minimum 10 letters",
			maxlength: "Maximium 250 letters allowed"
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
	  $('#phone_form').validate({
	    rules: {
		 phoneno: {
	        minlength: 10,
			maxlength: 10,
	        accuraterphoneno: true 
	      }
	    },
		messages: {
		 phoneno: {
	        minlength: "Please enter a valid phone number ",
			maxlength: "Please enter a valid phone number "
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
	  $('#roll_form').validate({
	    rules: {
		 rollno: {
			maxlength: 15,
			accuraterollno:true
	      }
	    },
		messages: {
		 username: {
			maxlength: "Maximium 15 letters allowed"
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
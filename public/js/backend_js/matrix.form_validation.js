
$(document).ready(function(){

	$('#current_password').keyup(function(){
		var current_password=$('#current_password').val();
		$.ajax({
			type:'get',
			url:'../admin/check-password',
			data:{current_password:current_password},
			success:function(resp){

				if(resp=='false')
				{
					$('#chkpwd').html("<font color='red'>Current password is Incorrect</font>");
				}
				else if(resp=='true')
				{
					$('#chkpwd').html("<font color='green'>Current Password is Correct</font>");
				}
			},
			error:function(){
			
				alert('Error');
			}
		})
	});
	

	/*add-category form validations*/
	$("#add_category").validate({
		rules:{
			category_name:{		//name of field not its id
				required:true
			},
			description:{
				required:true,
			},
			url:{
				required:true,
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});



	$('input[type=checkbox],input[type=radio],input[type=file]').uniform();
	
	$('select').select2();
	
	// Form Validation
    $("#basic_validate").validate({
		rules:{
			required:{
				required:true
			},
			email:{
				required:true,
				email: true
			},
			date:{
				required:true,
				date: true
			},
			url:{
				required:true,
				url: true
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
	
	$("#number_validate").validate({
		rules:{
			min:{
				required: true,
				min:10
			},
			max:{
				required:true,
				max:24
			},
			number:{
				required:true,
				number:true
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
	
	$("#password_validate").validate({
		rules:{
			current_password:{
				required: true,
				minlength:6,
				maxlength:20
			},
			new_password:{
				required:true,
				minlength:6,
				maxlength:20,
			},
			confirm_password:{
				required:true,
				minlength:6,
				maxlength:20,
				equalTo:"#new_password"
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
});

$(document).ready(function() {
	$('#addNewUseBtn').click(function(){
		$('#form1').fadeIn();
		$('#addEditFormTitle1').text("Step 1 - Please provide the user's email address");
		$('#addNewUseBtnDiv').hide();
		return false;
	});

	$('#add_new_user').click(function(){
		// console.log('enter');
		
		$('#add_new_user').hide();
		


		var account_id = $('#group_account').val();
		var email = $.trim($('#email').val());
		if(!email) {
			alert('Please enter email id');
		}
		if(true){
			$.ajax({
				url: 'profile/validateEmail',
				data: {'email':email,'group_account_id':account_id},
				type: 'post',
				success: function(response) { 
					console.log(response);
					var responseObj = $.parseJSON(response);
					console.log(responseObj);

					$('#cancelForm1').show();
					if (responseObj.status) {
						$('#username').show('fast');
						$('#username').val(responseObj.username);
						$('#group_account_id').val(responseObj.group_account_id);
						$('#addEditFormTitle1').text('Step 2 - Please confirm that this is the correct username.');
						$('#conformForm2').show();
						$('#passwordid').hide();
						$('#passwordIdConform').hide();
					}else{
						$('#createAndAddUser').show();
						$('#addEditFormTitle1').text('Step 2 - Please fill in the following form to add New User.');
						$('#passwordid').show();
						$('#passwordIdConform').show();
						$('#username').show();
					}
					// 	if (response.saved) {
							
					// 	} else {
							
					// 	}
					// } else if(response.message == 'logout') {
					// 	window.location.href = '/logout';
					// } else {
					// 	$('.'+response.errorfor).addClass('has-error');
					// 	alert(response.message);
					// 	if(response.redirect) {
					// 		window.location.href = response.redirect;
					// 	}
					// 	$('html, body').animate({
					//         scrollTop: $('.'+response.errorfor).offset().top - 200
					//     }, 1000);
					// }
				}
			});


		} else {
			alert('Please enter validate email id')
		}
	});

	$('#cancelForm1').click(function(){
		$('#form1').fadeOut();
		$('#addEditFormTitle1').text('Step 1 - Please fill in the following form to add new user');
		$('#passwordid').hide();
		$('#passwordIdConform').hide();
		$('#username').hide();
		// console.log('gowtha');
		$('#add_new_user').show();
		$('#cancelForm1').hide();
		$('#conformForm2').hide();
		$('#createAndAddUser').hide();
		$('#addForm1Data').show();
		$('#addNewUseBtnDiv').show();


	});

	$('#createAndAddUser').click(function(){
		var account_id = $('#group_account').val();
		var email = $.trim($('#email').val());
		var username = $.trim($('#username').val());
		var password = $.trim($('#passwordid').val());


		$.ajax({
			url: 'profile/createAndAddUser',
			data: {'email':email,'group_account_id':account_id,'username':username,'password':password},
			type: 'post',
			success: function(response) { 
				if (response) {
					location.reload();
				}
				
			}
		});


	});

	$('#conformForm2').click(function(){
		
		var email = $.trim($('#email').val());
		var account_id = $('#group_account').val();

		$.ajax({
			url: 'profile/addUser',
			data: {'email':email,'group_account_id':account_id},
			type: 'post',
			success: function(response) { 
				var responseObj = $.parseJSON(response);
					console.log(responseObj);
					if (responseObj.status) {
						alert(responseObj.message);
						location.reload();
					}else{
						alert(responseObj.message);
					}
				
			}
		});


	});
	

});




import $ from 'jquery';

window.$ = window.jQuery = $;
import './bootstrap';

import 'toastr/build/toastr.min.js';

import Chart from 'chart.js/auto';

$(function () {

	console.log('%cSTOP!', 'color: red; font-size: 30px; font-weight: bold;');
	console.log('%cDO NOT MAKE CHANGES USING THE DEVELOPER CONSOLE!', 'color: white; font-size: 18px;');
	console.log('%c1.) BREAKING FUNCTIONALITY: Making changes in the developer console can alter the functionality of this website that could lead to unexpected behaviors or errors.', 'color: white; font-size: 18px;');
  console.log('%c2.) PRIVACY CONCERN: Accessing sensitive information through the console, such as user data or credentials, is a breach of privacy and could be illegal.', 'color: white; font-size: 18px;');
	console.log('%c3.) SECURITY RISK: Manipulating scripts or executing unfamiliar code can expose your device to security vulnerabilities and malware.', 'color: white; font-size: 18px;');
	console.log('%c4.) WEBSITE POLICY: This website have terms of service that prohibit unauthorized access to the code or resources. Accessing the developer console without permission may be considered a violation of these terms and may result in legal consequences.', 'color: white; font-size: 18px;');


	/* start = validation for user */
	$('#submit_user').on('click', function(){
		clearToastrMsg();

		var action          = fetchAction($(this).val());
		var confirm_submit  = confirm($(this).val() + ' ?');

		if(confirm_submit){
			resetThisForm('role_id,name,email,is_active,password,password_confirmation');

			var error_msg = validateUserForm(action);

			if(error_msg){
				showErrorMsg(error_msg);

				return false;
			}
		}
		else{
			return false;
		}
	});
	/* end = validation for user */


	/* start = validation for user */
	$('#upload_document').on('click', function(){
		
		var confirm_submit = confirm('Upload file?');

		if(confirm_submit){			
			var errors = '';

			var this_file = $('#file')[0]; // get the first selected file

			if(this_file.files.length <= 0){
				hasError('file');
    		errors += '<li>No file was browsed.</li>';
			}
			else{
				var fileInput = $('#file');
				var filePath = fileInput.val(); // Get the full file path

				var allowedExtensions = /(\.txt|\.xls|\.xlsx|\.doc|\.docx|\.pdf)$/i;

				if (!allowedExtensions.exec(filePath)) {
		      errors += '<li>Invalid file type. Please choose pdf, ms excel, ms word and text files only.</li>';
		    }
			}
			if(errors){ console.log(formatErrorMsg(errors));
				showErrorMsg(formatErrorMsg(errors));

				return false;
		  }	
		}
		else{
			return false;
		}
	});
	/* end = validation for user */

	




	initializeTooltip();
});
// ########################
// ########################
// ########################








function initializeTooltip()
{
  hideAllTooltips();

  var tooltipTriggerList = [].slice.call(
		document.querySelectorAll('[data-bs-toggle="tooltip"]')
	);
  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
  });
}


function hideAllTooltips(){
  var tooltips = document.querySelectorAll('[data-bs-toggle="tooltip"]');

  for (var i = 0; i < tooltips.length; i++) {
    var tooltip = bootstrap.Tooltip.getInstance(tooltips[i]);
    if (tooltip) {
        tooltip.hide();
    }
  }
}


function fetchAction(value)
{
  return value.replace(' RECORD', '').toLowerCase();
}


/* start = validation for user */
function validateUserForm(action)
{
  var name              = fetchValue('name');
	var email             = fetchValue('email');  
  var password          = fetchValue('password');
  var password_confirm  = fetchValue('password_confirmation');
  var errors =  '';

	if(name == ''){
    hasError('name');
    errors += '<li>Name is required.</li>';
  }

  if(email == ''){
    hasError('email');
    errors += '<li>Email is required.</li>';
  }
	else{
		if(!validateEmail(email)){
			hasError('email');
    	errors += '<li>Invalid email field.</li>';
		}
	}

  if(action == 'update'){
    if(password != ''){
      if(password.length < 8){
        hasError('password');
        errors += '<li>Password must be at least eight characters.</li>';
      }
      else{
        if(password != password_confirm){
          hasError('password');
          hasError('password_confirmation');
          errors += '<li>Passwords does not match.</li>';
        }
      }
    }
  }
  else{
    if(password == ''){
      hasError('password');
      errors += '<li>Password is required.</li>';
    }
    else{
      if(password.length < 8){
        hasError('password');
        errors += '<li>Password must be at least eight characters.</li>';
      }
      else{
        if(password != password_confirm){
          hasError('password');
          hasError('password_confirmation');
          errors += '<li>Passwords does not match.</li>';
        }
      }
    }
  }

  if(errors){
    errors = formatErrorMsg(errors);
  }

  return errors;
}
/* end = validation for user */


function hasError(element)
{
  $('#'+element).addClass('is-invalid');
}


function fetchValue(field)
{
  return $('#'+field).val();
}


function showErrorMsg(error_msg)
{
  $('#error_msg').removeClass('d-none').addClass('d-block').html(error_msg);

  showToastrError('Please resolve errors.');
}


function formatErrorMsg(errors)
{
  return '<i class="fa fa-exclamation-circle fa-lg" aria-hidden="true"></i> Ooops... it seems like you missed something:<br/><br/><ul>' + errors + '</ul>';
}


function showToastrError(message)
{
  toastr.error(message, 'Ooops!', {"closeButton": true});
}


function clearToastrMsg()
{
  toastr.clear();
}


function resetThisForm(all_fields)
{
  var fields = all_fields.split(',');

  for (const element of fields) {
    $('#'+element).removeClass('is-invalid');
  }

  $('#error_msg').removeClass('d-block').addClass('d-none').html('');
}


function validateEmail(email)
{
  const this_email = email.trim();

  const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  if(!emailPattern.test(this_email)){
    return false;
  } 
	else{
    return true;
  }
}


window.deleteDocument = function (id, filename) {
  var confirm_submit = confirm('Delete file: ' + filename);

	if(confirm_submit){			
		const form = document.getElementById('update-form');
    form.action = '/upload/'+id;
    form.submit();
	}
	else{
		return false;
	}
};


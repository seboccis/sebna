function showResultSendMail(response){

	$('#inputName').parent().removeClass('has-error');
	$('#inputEmail').parent().removeClass('has-error');
	$('#textArea').parent().removeClass('has-error');

	$('#errorSpanName').css({'display':'none'});
	$('#errorSpanMail').css({'display':'none'});
	$('#errorSpanMsg').css({'display':'none'});

	var arrayResponse = jQuery.parseJSON(response);

	if(arrayResponse['validateForm'] == '0'){	

		if(arrayResponse['errorSpans']['errorName'] == '1'){
			$('#inputName').parent().addClass('has-error');
			$('#errorSpanName').css({'display':'inline'});
		}
		if(arrayResponse['errorSpans']['errorMail'] == '1'){
			$('#inputEmail').parent().addClass('has-error');
			$('#errorSpanMail').css({'display':'inline'});
		}
		if(arrayResponse['errorSpans']['errorMsg'] == '1'){
			$('#textArea').parent().addClass('has-error');
			$('#errorSpanMsg').css({'display':'inline'});
		}

		$('#responseSendMail').html('Veuillez remplir les champs.').addClass('alert alert-dismissible alert-warning');

	}
	else{

		if(arrayResponse['responseMail'] == '0'){
			$('#responseSendMail').html('Une erreur est survenue lors de l\'envoi du mail, veuillez renouveler l\'opération.').addClass('alert alert-dismissible alert-warning');
		}
		else{
			$('#responseSendMail').html('Votre message a bien été envoyé, nous vous répondrons sous peu.').removeClass('alert-warning').addClass('alert alert-dismissible alert-success');
		}

	}

}

$('.container #formContact fieldset #sendMail').on('click', function(event){
	event.preventDefault();
	$.ajax({
		url: 'ajax/sendMail.php',
		data: $('#formContact').serialize()
	})
	.done(showResultSendMail);
	event.stopPropagation();
});
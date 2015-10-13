<form id="formContact" class="form-horizontal">
	<fieldset>
		<legend>Contactez-nous</legend>

		<div class="form-group">
			<label for="inputName" class="col-lg-2 control-label">Nom</label>
			<div class="col-lg-10">
				<input class="form-control" id="inputName" name="name" placeholder="Nom" type="text">
			</div>
			<span class="col-lg-10 col-lg-offset-2 errorSpan" id="errorSpanName">Veuillez nous indiquer votre nom.</span>
		</div>

		<div class="form-group">
			<label for="inputEmail" class="col-lg-2 control-label">Email</label>
			<div class="col-lg-10">
				<input class="form-control" id="inputEmail" name="email" placeholder="Email" type="text">
			</div>
			<span class="col-lg-10 col-lg-offset-2 errorSpan" id="errorSpanMail">Veuillez nous indiquer un mail pour que nous puissions vous répondre.</span>	
		</div>

		<div class="form-group">
			<label for="textArea" class="col-lg-2 control-label">Message</label>
			<div class="col-lg-10">
				<textarea class="form-control" name="msg" rows="3" id="textArea"></textarea>
			</div>
			<span class="col-lg-10 col-lg-offset-2 errorSpan" id="errorSpanMsg">Merci d'indiquer vos souhaits.</span>
		</div>

		<div class="form-group">
			<div class="col-lg-10 col-lg-offset-2">
				<button type="reset" id="resetFormContact" class="btn btn-default">Vider les champs</button>
				<button type="submit" id="sendMail" class="btn btn-info">Envoyer un mail</button>
			</div>
			<div class="col-lg-12" id="responseSendMail">
				Veuillez remplir tous les champs.
			</div>

		</div>
	</fieldset>
</form>
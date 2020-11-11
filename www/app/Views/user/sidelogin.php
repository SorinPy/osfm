<div class="m-0 p-1">
<form method="post" action="<?= site_url('user/login');?>">
	<div class="form-group">
		<label for="emailLoginInput">Email</label>
		<input name="login_email" type="text"
			class="form-control <?= isset($errors['email']) ? 'is-invalid' : ''?>" id="emailLoginInput"
			value="<?= old('login_email');?>">
		<?= invalid_feedback($errors['email'] ?? null); ?>
	</div>
	<div class="form-group">
		<label for="passwordLoginInput">Parola</label>
		<input name="login_password" type="password"
			class="form-control <?= isset($errors['password']) ? 'is-invalid' : ''?>" id="passwordLoginInput" value="">
		<?= invalid_feedback($errors['password'] ?? null); ?>
	</div>
	<div class="form-group form-check">
		<input type="checkbox" class="form-check-input" id="rememberCheck">
		<label name="login_remember" class="form-check-label" for="rememberCheck">Pastreaza-ma logat</label>
	</div>

	<button type="submit" class="btn btn-primary">Logare</button>
	<?= csrf_field() ?>
</form>
<?php 	if(isset($errors['invalid_account']))
		{ 
?>
			<div class="alert alert-danger mt-1">
				<?= $errors['invalid_account'];?>
			</div>
<?php 	} ?>
<a href="<?= site_url('user/register');?>" class="text-primary">Inregistrare</a>

</div>
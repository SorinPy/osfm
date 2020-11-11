<div class="row justify-content-center p-0">
    <div class="col-md-6">
        <p class="h6">Creaza un cont nou!</p>
        <?php if(isset($regSuccess))
{
?>
        <div class="alert alert-success">
            <?= $regSuccess ;?>
        </div>
        <?php
}
?>
        <form method="post" action="">
            <div class="form-group">
                <label for="nameInput">Nume utilizator</label>
                <input name="username" type="text"
                    class="form-control <?= isset($regErrors['username']) ? 'is-invalid' : ''?>" id="nameInput"
                    value="<?= old('username');?>">
                    <small id="usernameHelp" class="form-text text-muted">Numele afisat altor utilizatori.</small>
                <?= invalid_feedback($regErrors['username'] ?? null); ?>
            </div>
            <div class="form-group">
                <label for="emailInput">Email</label>
                <input name="email" type="text"
                    class="form-control <?= isset($regErrors['email']) ? 'is-invalid' : ''?>" id="emailInput"
                    value="<?= old('email');?>">
                    <small id="emailHelp" class="form-text text-muted">Email-ul folosit pentru a te loga sau recupera contul.</small>
                <?= invalid_feedback($regErrors['email'] ?? null); ?>
            </div>
            <div class="row form-group">
                <div class="col">
                    <label for="passwordInput">Parola</label>
                    <input name="password" type="password"
                        class="form-control <?= isset($regErrors['password']) ? 'is-invalid' : ''?>" id="passwordInput">
                    <?= invalid_feedback($regErrors['password'] ?? null); ?>
                </div>
                <div class="col">
                    <label for="passwordConfirmInput">Confirmare parola</label>
                    <input name="password_confirm" type="password"
                        class="form-control <?= isset($regErrors['password_confirm']) ? 'is-invalid' : ''?>"
                        id="passwordConfirmInput">
                    <?= invalid_feedback($regErrors['password_confirm'] ?? null); ?>
                </div>
            </div>


            <button type="submit" class="btn btn-primary">Inregistrare</button>
            <?= csrf_field() ?>
        </form>
    </div>
</div>
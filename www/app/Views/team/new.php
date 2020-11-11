<div class="row justify-content-center p-0">
<?php if($team === NULL): ?>
    <div class="col-md-6">
        <p class="h6">Inregistreaza-ti echipa!</p>
        <form method="post" action="">
            <div class="form-group">
                <label for="nameInput">Numele echipei</label>
                <input name="teamName" type="text"
                    class="form-control <?= isset($newTeamErrors['name']) ? 'is-invalid' : ''?>" id="nameInput"
                    value="<?= old('teamName');?>">
                <small id="teamNameHelp" class="form-text text-muted">Introdu un nume reprezentativ pentru noua ta echipa.</small>
                <?= invalid_feedback($newTeamErrors['name'] ?? null); ?>
            </div>
            <div class="form-group">
                <label for="countrySelect">Selecteaza regiunea</label>
                <select name="teamCountry" class="form-control" id="countrySelect">
                    <option value="romania" selected>Romania</option>
                    <option value="international">International</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Trimite cererea</button>
            <small id="submitHelp" class="form-text text-muted">Poate dura cateva minute pana echipa este
                inregistrata.</small>
            <?= csrf_field() ?>
        </form>
    </div>
<?php else :?>
    <p class="h3">Mai dureaza cateva momente pana echipa ta este gata!</p>
<?php endif; ?>
</div>
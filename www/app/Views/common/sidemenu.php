<ul class="list-group list-group-flush">
    <li class="list-group-item list-group-item-info text-truncate"><?= ($team === NULL) ? "Echipa mea" : $team['name']; ?></li>
    <?php if($team === NULL):?>
    <a href="<?= site_url('team/new');?>" class="list-group-item list-group-item-action">Cere o echipa</a>
    <?php elseif($team['active'] === '0'): ?>

        <a href="#" class="list-group-item list-group-item-action">Se pregateste echipa</a>
    <?php else:?>
        <a href="<?= site_url('team/players');?>" class="list-group-item list-group-item-action">Jucatori</a>
        
    <?php endif;?>
  
</ul>
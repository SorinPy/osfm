<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="<?= site_url();?>">Noutati</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= site_url();?>contact">Contact</a>
    </li>
    <?php if($user !== NULL) : ?>
    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('user/login/logout');?>">Logout</a>
    </li>
    <?php endif;?>
</ul>
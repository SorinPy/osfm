<div class="row">
    <div class="col-md-8">


        <ul class="list-group list-group-flush">
            <?php 
    if(is_array($players)):
        foreach($players as $player):
    ?>
            <li class="list-group-item p-1">
                <div>
                    <?= $player['name'];?> <span class="text-muted" style="font-size:12px;">Varsta <?= $player['age'];?>
                        ani</span>
                </div>
                <div>
                    <div class="row">
                        <div class="col-md-6">

                        </div>
                        <div class="col-md-6">
                            <?= view('team/player_attributes',$player);?>

                        </div>
                    </div>
                </div>
            </li>

            <?php
        endforeach;
    endif;
    ?>
        </ul>

    </div>


    <div class="col-md-4">
    </div>
</div>
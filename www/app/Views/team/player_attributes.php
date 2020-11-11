<div class="row">

    <div class="col-md-2 text-right p-0 px-1" style="font-size:12px;">
        Portar
    </div>
    <div class="col p-0">
        <?= view('team/player_attributes_progress',['value'=>$keeping]);?>
    </div>
    <div class="w-100"></div>
    <div class="col-md-2 text-right p-0 px-1" style="font-size:12px;">
        Defensiva
    </div>
    <div class="col p-0">
        <?= view('team/player_attributes_progress',['value'=>$defending]);?>
    </div>
    <div class="w-100"></div>
    <div class="col-md-2 text-right p-0 px-1" style="font-size:12px;">
        Deposedare
    </div>
    <div class="col p-0">
        <?= view('team/player_attributes_progress',['value'=>$tackling]);?>
    </div>
    <div class="w-100"></div>
    <div class="col-md-2 text-right p-0 px-1" style="font-size:12px;">
        Pase
    </div>
    <div class="col p-0">
        <?= view('team/player_attributes_progress',['value'=>$passing]);?>
    </div>
    <div class="w-100"></div>
    <div class="col-md-2 text-right p-0 px-1" style="font-size:12px;">
        Constructie
    </div>
    <div class="col p-0">
        <?= view('team/player_attributes_progress',['value'=>$playmaking]);?>
    </div>
    <div class="w-100"></div>
    <div class="col-md-2 text-right p-0 px-1" style="font-size:12px;">
        Pozitionare
    </div>
    <div class="col p-0">
        <?= view('team/player_attributes_progress',['value'=>$positioning]);?>
    </div>
    <div class="w-100"></div>
    <div class="col-md-2 text-right p-0 px-1" style="font-size:12px;">
        Atac
    </div>
    <div class="col p-0">
        <?= view('team/player_attributes_progress',['value'=>$scoring]);?>
    </div>

</div>
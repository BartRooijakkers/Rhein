<?php
if($data->akkoord == 1){
    $data->akkoord = "<a style='color:green; font-weight:bold;'>Ja</a>";
}else{
    $data->akkoord = "<a style='color:red; font-weight:bold;'>Nee</a>";
}

?>

<div class="contentTileAuto" style="border: 1px solid black; 
    box-shadow: inset 0 0 0 1000px #f5f2ccd3; margin-left:3%;">
    <h1 style="color:blue; font-weight:bold; padding: 1vw 0 0 0.5vw;">Hijstest Details</h1>
    <div class="testDetails">
        <span class="header">Volg nummer: </span>
        <span><?php echo $data->volg_nummer; ?></span>
        <hr>
        <span class="header">Datum opgesteld: </span>
        <span><?php echo $data->datumOpgesteld; ?></span>
        <hr>
        <span class="header">Lengte Hoofdgiek: </span>
        <span><?php echo $data->hoofdgiek_lengte; ?></span>
        <hr>
        <span class="header">Lengte Mech sectie Giek: </span>
        <span><?php echo $data->mech_sectie_gieklengte; ?></span>
        <hr>
        <span class="header">Lengte Hulpgiek</span>
        <span><?php echo $data->hulpgiek_lengte; ?></span>
        <hr>
        <span class="header">Giekhoek Hoofdgiek: </span>
        <span><?php echo $data->hoofdgiek_giekhoek; ?></span>
        <hr>
        <span class="header">Giekhoek Hulpgiek: </span>
        <span><?php echo $data->hulpgiek_giekhoek; ?></span>
    </div>
    <div class="testDetails">
        <span class="header">Aantal parten Hijskabel: </span>
        <span><?php echo $data->hijskabel_aantal_parten; ?></span>
        <hr>
        <span class="header">Zwenkhoek: </span>
        <span><?php echo $data->zwenkhoek; ?></span>
        <hr>
        <span class="header">Eigen massa ballast: </span>
        <span><?php echo $data->eigen_massa_ballast; ?></span>
        <hr>
        <span class="header">Toelaatbare bedrijfslast: </span>
        <span><?php echo $data->toelaatbare_bedrijfslast; ?></span>
        <hr>
        <span class="header">LMB treedt in werking bij: </span>
        <span><?php echo $data->lmb_in_werking; ?></span>
        <hr>
        <span class="header">Proeflast: </span>
        <span><?php echo $data->proeflast; ?></span>
        <hr>
        <span class="header">Akkoord: </span>
        <span><?php echo $data->akkoord; ?></span></div>
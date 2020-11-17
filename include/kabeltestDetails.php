<?php 
    switch ($data->beschadiging_buitenzijde) {
        case 1:
            $data->beschadiging_buitenzijde = "<a style='color:#89AB0D; font-weight:bold;'>Gering</a>";
            break;
        case 2:
            $data->beschadiging_buitenzijde = "<a style='color:#F7F14A; font-weight:bold;'>Gemiddeld</a>";
            break;
        case 3:
            $data->beschadiging_buitenzijde = "<a style='color:#F9DB22; font-weight:bold;'>Hoog</a>";
            break;
        case 4:
            $data->beschadiging_buitenzijde = "<a style='color:#Orange; font-weight:bold;'>Zeer hoog</a>";
            break;
        case 5:
            $data->beschadiging_buitenzijde = "<a style='color:#red; font-weight:bold;'>Afleggen</a>";
            break;
        default:
        $data->beschadiging_buitenzijde = "NVT";
            break;
    }

    switch ($data->beschadiging_roest_corrosie) {
        case 1:
            $data->beschadiging_roest_corrosie = "<a style='color:#89AB0D; font-weight:bold;'>Gering</a>";
            break;
        case 2:
            $data->beschadiging_roest_corrosie = "<a style='color:#F7F14A; font-weight:bold;'>Gemiddeld</a>";
            break;
        case 3:
            $data->beschadiging_roest_corrosie = "<a style='color:#F9DB22; font-weight:bold;'>Hoog</a>";
            break;
        case 4:
            $data->beschadiging_roest_corrosie = "<a style='color:Orange; font-weight:bold;'>Zeer hoog</a>";
            break;
        case 5:
            $data->beschadiging_roest_corrosie = "<a style='color:red; font-weight:bold;'>Afleggen</a>";
            break;
        default:
        $data->beschadiging_roest_corrosie = "NVT";
            break;
    }

    switch ($data->beschadiging_totaal) {
        case 1:
            $data->beschadiging_totaal = "<a style='color:#89AB0D; font-weight:bold;'>Gering</a>";
            break;
        case 2:
            $data->beschadiging_totaal = "<a style='color:#F7F14A; font-weight:bold;'>Gemiddeld</a>";
            break;
        case 3:
            $data->beschadiging_totaal = "<a style='color:#F9DB22; font-weight:bold;'>Hoog</a>";
            break;
        case 4:
            $data->beschadiging_totaal = "<a style='color:Orange; font-weight:bold;'>Zeer hoog</a>";
            break;
        case 5:
            $data->beschadiging_totaal = "<a style='color:red; font-weight:bold;'>Afleggen</a>";
            break;
        default:
        $data->beschadiging_totaal = "NVT";
            break;
    }
?>

<div class="contentTileAuto" style="border: 1px solid black; 
    box-shadow: inset 0 0 0 1000px #f5f2ccd3; margin-left:3%;">
                <h1 style="color:brown; font-weight:bold; padding: 1vw 0 0 0.5vw;">Kabel Details</h1>
            <div class="testDetails">
                <span class="header">kabel ID:</span>
                <span><?php echo $data->kabel_ID?></span>
                <hr>
                <span class="header">aantal draadbreuken met lengte van 6D: </span>
                <span><?php echo $data->draadbreuk_6D?></span>
                <hr>
                <span class="header">aantal draadbreuken met lengte van 30D: </span>
                <span><?php echo $data->draadbreuk_30D?></span>
                <hr>
                <span class="header">Beschadiging Buitenzijde gelegen draden: </span>
                <span><?php echo $data->beschadiging_buitenzijde;?></span>
                <hr>
                <span class="header">Beschadiging Roest en Corrosie: </span>
                <span><?php echo $data->beschadiging_roest_corrosie;?></span>
                <hr>
                <span class="header">Verminderde kabeldiameter: </span>
                <span><?php echo $data->verminderde_kabeldiameter;?></span>
                <hr>
                <span class="header">Positie meetpunten: </span>
                <span><?php echo $data->positie_meetpunten?></span>
                <hr>
                <span class="header">Totale beschadiging: </span>
                <span><?php echo $data->beschadiging_totaal;?></span>
                <hr>
                <span class="header">Type beschadiging/roest: </span>
                <span><?php echo $data->type_beschadiging_roest?></span>
        </div>
</div>
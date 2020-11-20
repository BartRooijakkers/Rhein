<div id="nav">
                <a class="route" href="home.php">Home</a>
                <a class="route" href="overzichten.php">Overzichten</a>
                <?php
                    if($_SESSION['afdeling'] == 12){
                        echo"<a class='route' href='admin.php'>Admin Pagina</a>";
                    }else{
                        echo"";
                    }
                ?>
                <a class="route" href="index.php">Zoeken</a>
            </div>
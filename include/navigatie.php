<div id="nav">
                <a class="route" href="home.php">Home</a>
                <a class="route" href="overzichten.php">Overzichten</a>
                <?php
                //Controleert of gebruiker admin rechten heeft
                    if($_SESSION['afdeling'] == 12){
                        echo"<a class='route' href='admin.php'>Admin Pagina</a>";
                    }else{
                        echo"";
                    }
                ?>
            </div>
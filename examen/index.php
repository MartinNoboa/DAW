<?php
    require_once 'util.php';
    include("_header.html");
?>




    <main>

        <div class="navbar-fixed">
            <nav>
                <div class="blue darken-1 nav-wrapper">
                    <a href="index.php" class="brand-logo"><acronym title="Desarrollo de aplicaciones web y Bases de datos">Segundo parcial: DAW-BD</acronym></a>
                    
                </div>
            </nav>
        </div>

        <div class="container">

            <h3>Jurassic Park</h3>

            <a class="right btn-floating btn-large waves-effect waves-light red" href = "agregarIncidente.php"><i class="material-icons">add</i></a>

            <?php 
                echo mostrarIncidentes();
            ?>

        </div>
    </main>
<?php 
    include("_footer.html")
?>
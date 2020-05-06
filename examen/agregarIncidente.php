<?php
    require_once 'util.php';
    include("_header.html");
?>
    
    
    <div class = "container">
        <h2>Agregar nuevo incidente</h2>  

        <form action = "controladorIncidente.php" method = "POST">

                <select id = "lugar" name = "lugar">
                    <option value="" disabled selected>Seleccione un lugar...</option>
                    <?= getOpciones("idLugar", "lugar", "lugar") ?>
                </select>


                <select id = "incidente" name = "incidente">
                    <option value="" disabled selected>Seleccione un incidente...</option>
                    <?= getOpciones("idIncidente", "incidente", "incidente") ?>
                </select>

                <button class = "btn" type = "submit">Agregar Incidente</button>

        </form>  
    </div>

<?php
    include("_footer.html");
?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems);
  });
</script>

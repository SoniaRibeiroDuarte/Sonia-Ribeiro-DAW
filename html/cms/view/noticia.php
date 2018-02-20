<?php require("partials/header.php") ?>
<?php require ("partials/menu.php");?>
<?php require ("partials/mensajes.php");?>
    <div id="contusu">
        <h2 id="titulous">Editar Entrada</h2>
        <form enctype="multipart/form-data" method="POST">
            <span class="titdatos">Titulo</span><br>
            <input class="intdatos" type="text" name="titulo" value="<?php $datos->titulo?>"><br>
            <span class="titdatos">Entradilla</span><br>
            <input class="intdatos" type="text" name="entradilla" value="<?php $datos->entradilla?>"><br>
            <span class="titdatos">Texto</span><br>
            <input type="textarea"  name="editor" ><br>
            <script>
                CKEDITOR.replace( 'editor' );
            </script>
            <input type="hidden" id="texto" name="texto" value="<?php $datos->texto?>"><br>
            <span class="titdatos">Imagen</span><br>
            <input class="guardar" name="imagen" type="file"><br>
            <input type="submit" value="Guardar" class="guardar" name="guardar">
        </form>
    </div>
<script>
       $("#guardar").click(function(){
           var content = CKEDITOR.instances.editor.getData();
           document.getElementById("texto").value = content;
           document.querySelector("form").submit();
       });
 </script>
 <?php require("partials/footer.php") ?>
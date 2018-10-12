<div class="main">

    <!-- A mettre dans un composant car appelé sur toutes les vues 
        Pas d'action dans le form, on va vérifier si $_POST existe, si oui on appelle le controller
    -->
    <form action="" method="post">

         <div class="form-group">
            <label for="exampleInputFile">File input</label>
            <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
            <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
        </div>

    </form>

</div>
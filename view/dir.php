<div class="container">
    <div class="row">
        <div class="block-add-directory mx-auto text-center">

            <?php echo isset($flash_message) && !empty($flash_message) ? $flash_message : ''; ?>

            <!-- A mettre dans un composant car appelé sur toutes les vues 
                Pas d'action dans le form, on va vérifier si $_POST existe, si oui on appelle le controller
            -->
            <form action="" method="post" class="col-sm-12" enctype="multipart/form-data">
                <input type="hidden" id="from" name="from" value="/nas">
                <div class="form-group col-sm-12">
                    <!-- <label for="dirName">Nom du dossier : </label> -->
                    <input type="text" class="form-control text-center" id="dirName" name="dirName" placeholder="Nom du dossier">
                </div>

                <div class="form-group">
                    <!-- <label for="exampleInputFile">File input</label> -->
                    <input type="file" class="form-control-file" id="uploadFile" name="uploadFile[]" aria-describedby="fileHelp" multiple>
                    <!-- <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small> -->
                </div>

                <button type="submit" class="btn btn-secondary">Envoyer</button>

            </form>
        </div>    
    </div>
</div>
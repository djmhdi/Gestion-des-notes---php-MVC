<?php require APPROOT . '/views/inc/head.php'; ?>  
    <div class="row">
        <div class="col-md-12 titre">
        <h2>Etudiants</h2>
        </div> 
    </div>  
    <div class="row">
        <div class="col-md-12">
        <form method="POST" action="<?php echo URLROOT; ?>/etudiants/add">
            <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" name="nom" required>
            </div>
            <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" class="form-control" name="prenom" required>
            </div>
            <div class="form-group">
            <label for="filiere">Filière</label>
            <input type="text" class="form-control" name="filiere" required>
            </div>
            <button type="submit" class="btn btn-primary" name="add_record" value="Add">Ajouter</button>
        </form>
        </div>
    </div>
<?php require APPROOT . '/views/inc/foot.php'; ?>

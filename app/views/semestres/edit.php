<?php require APPROOT . '/views/inc/head.php'; ?>
        
    <div class="row">
        <div class="col-md-12 titre">
        <h2>Semestres</h2>
        </div> 
    </div>  
    <div class="row">
        <div class="col-md-12">
        <form method="POST" action="<?php echo URLROOT; ?>/semestres/edit/<?php echo $data["id"]; ?>">
            <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" name="intitule" value="<?php echo $data["intitule"]?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
        </div>
    </div>
<?php require APPROOT . '/views/inc/foot.php'; ?>

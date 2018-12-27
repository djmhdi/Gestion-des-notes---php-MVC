<?php require APPROOT . '/views/inc/head.php'; ?>  
    <div class="row">
        <div class="col-md-12 titre">
            <h2>Notes</h2>
        </div> 
    </div>  
    <div class="row">
        <div class="col-md-12">
            <form method="POST">
                <div class="form-group">
                <label for="semestre">Semestre</label>
                <select name="semestre" class="form-control">
                    <?php
                    if(!empty($data['semestres'])) { 
                    foreach($data['semestres'] as $row) {
                    ?>
                    <option value="<?php echo $row->id?>"><?php echo $row->intitule?></option>
                    <?php
                    }
                    }
                    ?>
                </select>
                </div>
                <div class="form-group">
                <label for="module">Module</label>
                <select name="module" class="form-control">
                    <?php
                    if(!empty($data['modules'])) { 
                    foreach($data['modules'] as $row) {
                    ?>
                    <option value="<?php echo $row->id?>"><?php echo $row->intitule?></option>
                    <?php
                    }
                    }
                    ?>
                </select>
                </div>
                <div class="form-group">
                <label for="etudiant">Filiere - Etudiant</label>
                <select name="etudiant" class="form-control">
                    <?php
                    if(!empty($data['etudiants'])) { 
                    foreach($data['etudiants'] as $row) {
                    ?>
                    <option value="<?php echo $row->num?>"><?php echo $row->filiere." - ".$row->nom." ".$row->prenom?></option>
                    <?php
                    }
                    }
                    ?>
                </select>
                </div>
                <div class="form-group">
                <label for="note">note</label>
                <input type="number" class="form-control" name="note" required>
                </div>
                <button type="submit" class="btn btn-primary" name="add_record" value="Add">Ajouter</button>
            </form>
        </div>
    </div>
<?php require APPROOT . '/views/inc/foot.php'; ?>

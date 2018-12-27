<?php require APPROOT . '/views/inc/head.php'; ?>
        
        <div class="row">
          <div class="col-md-12 titre">
            <h2>Notes</h2>
            <a class="btn btn-primary" href="<?php echo URLROOT; ?>/notes/add" role="button">Ajout</a>
          </div> 
        </div>  
        <div class="row">
          <div class="col-md-12">
            <!-- Liste des notes-->
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Semestre</th>
                    <th scope="col">Filière</th>
                    <th scope="col">Module</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Note</th>
                    <th scope="col">Actions</th>
                    </tr>
                </thead>
                <?php
                if(!empty($data['notes'])) { 
                    foreach($data['notes'] as $row) {
                ?>
                <tbody>
                    <tr>
                        <td><?php echo $row->semestre ?></td>
                        <td><?php echo $row->filiere ?></td>
                        <td><?php echo $row->module ?></td>
                        <td><?php echo $row->nom ?></td>
                        <td><?php echo $row->prenom ?></td>
                        <td><?php echo $row->note ?></td>
                        <td>
    <a class="btn btn-danger" href="<?php echo URLROOT; ?>/notes/delete/<?php echo $row->num_etudiant ?>/<?php echo $row->id_semestre ?>/<?php echo $row->id_module ?>" role="button">Supprimer</a>
                        </td>
                    </tr>
                </tbody>
                <?php
                }
                }
                ?>
            </table>
          </div>
        </div>
<?php require APPROOT . '/views/inc/foot.php'; ?>

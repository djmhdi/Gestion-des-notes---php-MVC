<?php
  class Note {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getNotes(){
      $this->db->query('SELECT s.intitule as semestre,e.filiere,m.intitule as module,e.nom,e.prenom,
                        note,num_etudiant,id_semestre,id_module
                        FROM notes n,etudiants e,semestres s,modules m
                        WHERE n.num_etudiant=e.num
                        AND n.id_semestre=s.id
                        AND n.id_module=m.id
                        ORDER BY s.intitule,e.filiere,m.intitule,e.nom,e.prenom;');

      $results = $this->db->resultSet();

      return $results;
    }

    public function addNote($data){
      $this->db->query('INSERT INTO notes  VALUES ( :note, :etudiant, :semestre , :module)');
      // Bind values
      $this->db->bind(':note', $data['note']);
      $this->db->bind(':etudiant', $data['etudiant']);
      $this->db->bind(':semestre', $data['semestre']);
      $this->db->bind(':module', $data['module']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function deleteNote($etudiant, $semestre, $module){
      $this->db->query('DELETE FROM notes WHERE num_etudiant = :etudiant AND id_semestre= :semestre AND id_module= :module');
      // Bind values
      $this->db->bind(':etudiant', $etudiant);
      $this->db->bind(':semestre', $semestre);
      $this->db->bind(':module', $module);
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
  }
<?php
  class Etudiant {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getEtudiants(){
      $this->db->query('SELECT num,nom,prenom,filiere  from etudiants ORDER BY 1 DESC');

      $results = $this->db->resultSet();

      return $results;
    }

    public function addEtudiant($data){
      $this->db->query('INSERT INTO etudiants (nom,prenom,filiere) VALUES ( :nom, :prenom, :filiere )');
      // Bind values
      $this->db->bind(':nom', $data['nom']);
      $this->db->bind(':prenom', $data['prenom']);
      $this->db->bind(':filiere', $data['filiere']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function updateEtudiant($data){
      $this->db->query('UPDATE etudiants SET nom=:nom,prenom=:prenom,filiere=:filiere WHERE num=:num');
      // Bind values
      $this->db->bind(':num', $data['num']);
      $this->db->bind(':nom', $data['nom']);
      $this->db->bind(':prenom', $data['prenom']);
      $this->db->bind(':filiere', $data['filiere']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function getEtudiantByNum($num){
      $this->db->query('SELECT * FROM etudiants WHERE num = :num');
      $this->db->bind(':num', $num);

      $row = $this->db->single();

      return $row;
    }

    public function deleteEtudiant($num){
      $this->db->query('DELETE FROM etudiants WHERE num = :num');
      // Bind values
      $this->db->bind(':num', $num);
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
  }
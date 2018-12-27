<?php
  class Module {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getModules(){
      $this->db->query('SELECT id,intitule  from modules ORDER BY 1 DESC');

      $results = $this->db->resultSet();

      return $results;
    }

    public function addModule($data){
      $this->db->query('INSERT INTO modules (intitule) VALUES ( :intitule)');
      // Bind values
      $this->db->bind(':intitule', $data['intitule']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function updateModule($data){
      $this->db->query('UPDATE modules SET intitule=:intitule WHERE id=:id');
      // Bind values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':intitule', $data['intitule']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function getModuleById($id){
      $this->db->query('SELECT * FROM modules WHERE id = :id');
      $this->db->bind(':id', $id);

      $row = $this->db->single();

      return $row;
    }

    public function deleteModule($id){
      $this->db->query('DELETE FROM modules WHERE id = :id');
      // Bind values
      $this->db->bind(':id', $id);
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
  }
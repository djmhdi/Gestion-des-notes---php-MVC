<?php
  class Notes extends Controller {
    public function __construct(){
      if(!isLoggedIn()){
        redirect('users/login');
      }

      $this->noteModel = $this->model('Note');
      $this->etudiantModel = $this->model('Etudiant');
      $this->semestreModel = $this->model('Semestre');
      $this->moduleModel = $this->model('Module');
    }

    public function index(){
      // Get notes
      $notes = $this->noteModel->getNotes();
      $data = [
        'notes' => $notes
      ];
      $this->view('notes/index',$data);//, $data
    }

    public function add(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $data = [
          'note'          =>  $_POST["note"],
          'etudiant'      =>  $_POST["etudiant"],
          'semestre'      =>  $_POST["semestre"] ,
          'module'        =>  $_POST["module"] 
        ];
        if($this->noteModel->addNote($data)){
          redirect('notes');
        } else 
          die("Erreur d'ajout de la note !!! ");
      }
      else{
        $semestres = $this->semestreModel->getSemestres();
        $modules = $this->moduleModel->getModules();
        $etudiants = $this->etudiantModel->getEtudiants();
        $data = [
          'semestres' => $semestres,
          'modules' => $modules,
          'etudiants' => $etudiants
        ];
      
        $this->view('notes/add',$data);
      }
    }

    public function delete($etudiant, $semestre, $module){

      if($this->noteModel->deleteNote($etudiant, $semestre, $module)){
        redirect('notes');
      } else {
        die("Erreur de suppression de la note!!!");
      }
    }
  }
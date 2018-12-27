<?php
  class Etudiants extends Controller {
    public function __construct(){
      if(!isLoggedIn()){
        redirect('users/login');
      }

      $this->etudiantModel = $this->model('Etudiant');
    }

    public function index(){
      // Get etudiants
      $etudiants = $this->etudiantModel->getEtudiants();
      $data = [
        'etudiants' => $etudiants
      ];
      $this->view('etudiants/index',$data);//, $data
    }

    public function add(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $data = [
          'nom'       =>$_POST["nom"],
          'prenom'    =>$_POST["prenom"],
          'filiere'   =>$_POST["filiere"] 
        ];
        if($this->etudiantModel->addEtudiant($data)){
          redirect('etudiants');
        } else 
          die("Erreur d'ajout de l'etudiant !!! ");
      }
      else
        $this->view('etudiants/add');

    }

    public function edit($num){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $data = [
          'num' => $num,
          'nom'       =>$_POST["nom"],
          'prenom'    =>$_POST["prenom"],
          'filiere'   =>$_POST["filiere"]
        ];
        if($this->etudiantModel->updateEtudiant($data)){
          redirect('etudiants');
        } else 
          die("Erreur de modification de l'étudiant !!!");
      } else {
        // Get existing etudiant from model
        $etudiant = $this->etudiantModel->getEtudiantByNum($num);
        $data = [
          'num' => $num,
          'nom'       =>$etudiant->nom,
          'prenom'    =>$etudiant->prenom,
          'filiere'   =>$etudiant->filiere
        ];
  
        $this->view('etudiants/edit', $data);
      }
    }

    public function delete($num){
      // Get existing etudiant from model
      $etudiant = $this->etudiantModel->getEtudiantByNum($num);

      if($this->etudiantModel->deleteEtudiant($num)){
        redirect('etudiants');
      } else {
        die("Erreur de suppression de l'étudiant !!!");
      }
    }
  }
<?php
  class Modules extends Controller {
    public function __construct(){
      if(!isLoggedIn()){
        redirect('users/login');
      }

      $this->moduleModel = $this->model('Module');
    }

    public function index(){
      // Get modules
      $modules = $this->moduleModel->getModules();
      $data = [
        'modules' => $modules
      ];
      $this->view('modules/index',$data);
    }

    public function add(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $data = [
          'intitule'       =>$_POST["intitule"], 
        ];
        if($this->moduleModel->addModule($data)){
          redirect('modules');
        } else 
          die("Erreur d'ajout du module !!! ");
      }
      else
        $this->view('modules/add');
    }

    public function edit($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $data = [
          'id' => $id,
          'intitule'       =>$_POST["intitule"],
        ];
        if($this->moduleModel->updateModule($data)){
          redirect('modules');
        } else 
          die("Erreur de modification du module !!!");
      } else {
        // Get existing module from model
        $module = $this->moduleModel->getModuleById($id);
        $data = [
          'id' => $id,
          'intitule'       =>$module->intitule,
        ];
  
        $this->view('modules/edit', $data);
      }
    }

    public function delete($id){
      // Get existing module from model
      $module = $this->moduleModel->getModuleById($id);

      if($this->moduleModel->deleteModule($id)){
        redirect('modules');
      } else {
        die("Erreur de suppression du module !!!");
      }
    }
  }
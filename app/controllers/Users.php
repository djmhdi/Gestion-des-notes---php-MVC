<?php
  class Users extends Controller {
    public function __construct(){
      $this->userModel = $this->model('User');
    }

    public function login(){

      if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $loggedInUser = $this->userModel->login($_POST['username'], $_POST['password']);
        // var_dump($loggedInUser);
        // return;
        if($loggedInUser){
          // Create Session
          $this->createUserSession($loggedInUser);
        } else {
          $data =[    
            'error' => true,        
          ];
          $this->view('users/login', $data);
        }
      } 
      else{
        $data =[    
          'error' => false,        
        ];
        $this->view('users/login', $data);
      }
     
    }

    public function createUserSession($user){
      $_SESSION['user_id'] = $user->id;
      $_SESSION['user_username'] = $user->username;
      redirect('pages');
    }

    public function logout(){
      unset($_SESSION['user_id']);
      unset($_SESSION['user_username']);
      session_destroy();
      redirect('users/login');
    }
  }
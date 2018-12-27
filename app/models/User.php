<?php
  class User {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    // Login User
    public function login($username, $password){
      $this->db->query('SELECT * FROM users WHERE username = :username');
      $this->db->bind(':username', $username);
      $row = $this->db->single();
      $hashed_password = $row->password;
      $hashed_password_login = sha1($password);
      if(hash_equals($hashed_password_login, $hashed_password)){
        return $row;
        // var_dump("juste");
        // return;
      } else {
        return false;
        // echo $password.'</br>';
        // echo sha1($password).'</br>';
        // echo $row->password.'</br>';
        // echo $password_verify.'</br>';
        // echo hash_equals($hashed_password_login, $hashed_password).'</br>';
        // var_dump("faux");
        // return;
      }
    }


  }
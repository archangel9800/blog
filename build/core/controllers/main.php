<?php
function action_index(){
  echo 'index';
    
};
function action_contacts(){
  echo 'contacts';
    
};
function action_registration(){
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
      //todo обработать данные
      $login = htmlspecialchars(trim($_POST['login']));
      $password = trim($_POST['password']); 
      $email = trim($_POST['email']); 
      $formErrors = [];
      if(empty($login)){
            $formErrors[] = ['login' => 'Empty field!']
      }
      if(empty($email)){
            $formErrors[] = ['email' => 'Empty email!']
      }
      
      
  }
    renderView('registration');
};
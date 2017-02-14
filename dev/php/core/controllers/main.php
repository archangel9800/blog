<?php
function action_index(){
  if(is_auth()){
      echo 'index';
  }  else{
      echo 'hello guest';
  }   
};
function action_contacts(){
  echo 'contacts';
};
function action_successReg(){
  echo 'added';
};
function action_login(){
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $formData = [
          'login' => getSaveData(htmlspecialchars(trim($_POST['login']))),
          'password' => getSaveData(trim($_POST['password'])),
        ];
        
        $formData['password']  = md5($formData['password'].SECRET_KEY);
          $sql = "SELECT id FROM user WHERE login='{$formData['login']}' and password='{$formData['password']}'";
        $res = selectData($sql);
        if($res->num_rows === 0){
              echo 'incorect login or password';
          } else {
                $_SESSION['user'] = mysqli_fetch_assoc($res);
                header('Location: '.BACEURL);
         }
    }
 renderView('login', []);
};
function action_logout(){
    session_unset();
    session_destroy();
    header('Location: '.BACEURL);
}




function action_registration(){
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
      
    $formData = [
      'login' => getSaveData(htmlspecialchars(trim($_POST['login']))),
      'password' => getSaveData(trim($_POST['password'])),
      'email' => getSaveData(trim($_POST['email'])),
    ];
      $rules = [
        'login' => ['required', 'login'],  
        'password' => ['required','password'],  
        'email' => ['required','email']
      ];
      $errors = validateForm($rules, $formData);
      if(empty($errors)){
         $formData['password']  = md5($formData['password'].SECRET_KEY);
          $sql = "SELECT id FROM user WHERE login='{$formData['login']}' or email='{$formData['email']}'";
          $res = selectData($sql);
          if($res->num_rows === 0){
              $sql = "INSERT INTO `user`(`login`, `password`, `email`) VALUES ('{$formData['login']}','{$formData['password']}','{$formData['email']}')";   
                if(insertUpdateDelete($sql)){
                   header("location: ".BACEURL."/main/successReg");
                }
          } else {
                    echo 'login or email not unicue!';
                }
          
          
           
      }
  }
    renderView('registration', $errors);
};
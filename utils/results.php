<?php
require_once "../config/connexion.php";
require_once "../functions/userCrud.php";
require_once "../functions/functions.php";
/**
 * La page résults va permettre de faire le traitement 
 * de tous les formulaires il faut donc que je sache 
 * dans quel formulaire je suis pour en faire le traitement
 */
/* if (isset($_POST)) {
  var_dump($_POST);
  if ($_POST['action'] == 'signup') {
    //traitement pour l'enregistrement


  } elseif ($_POST['action'] == 'login') {
    // traitement pour le login
  }
} else {
  // redirect vers index.php
} */

if (isset($_POST)) {
  echo'<br><br>';
  var_dump($_POST);
  echo'<br><br>';
  switch ($_POST['action']) {
    case 'signup':
      //Validation des data

      $newUserData = [
        'user_name'=>$_POST['user_name'],
        'email'=>$_POST['email'],
        'pwd'=>$_POST['pwd'],
      ];
      // creation d'un user dans la DB

      createUser($newUserData);

$users = getAllUsers();

showData('Mes users avec le nouveau',$users);
      break;
    case 'login':
      # code...
      break;
    default:
      # code...
      break;
  }
} else {
  // redirect vers index.php
}

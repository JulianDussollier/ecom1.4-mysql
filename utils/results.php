<?php
require_once "../config/connexion.php";
require_once "../functions/userCrud.php";
require_once "../functions/functions.php";
require_once "../functions/validation.php";
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
      //Validation des data dans $_POST
$isValid =true;

// username, email, pwd
if (isset($_POST['user_name'])) {
  $usernameIsValidData = usernameIsValid($_POST['user_name']);
echo '<br><br>';
  var_dump($usernameIsValidData);
}


//$emailIsValidData = emailIsValid();
//$pwdIsValidData = pwdIsValid();


      $newUserData = [
        'user_name'=>$_POST['user_name'],
        'email'=>$_POST['email'],
        'pwd'=>$_POST['pwd'],
      ];
      // creation d'un user dans la DB
if ($isValid) {
  echo '<br><br> Ça a marché je devrai avoir un user en plus';
  
  createUser($newUserData);
}else {
  //redirect vers signUp page
  header('Location: ../pages/signup.php');
  exit;}
      

$users = getAllUsers();

?>
<a href="../pages/signUp.php">Retour a la page Enregistrement</a>
<?php
showData('Mes users avec le nouveau',$users);
      break;
    case 'login':
      # code...
      break;
    default:
      // redirect vers index
      break;
  }
} else { //else de if isset $_POST
  // redirect vers index.php
  header('Location: ../index.php');
exit;
}

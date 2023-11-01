<?php
require_once "../functions/userCrud.php";
//if $_POST action signup faire le traitement 
var_dump($_POST);
// Validation des données du form 

// envoi à la DB
if (isset($_POST['action']) && $_POST['action'] == 'signup') {
    createUser($_POST);
}

?>
<h2>Connexion</h2>

<a href="../index.php">Retour Accueil</a></br>

<form method="post" action="../index.php">
<input hidden name="action" value="login">

<label for="user_name">Nom d'utilisateur</label>
    <input id="user_name" name="user_name" type="text">
    <label for="pwd">Mot de passe</label>
    <input id="pwd" name="pwd" type="password">
</form>
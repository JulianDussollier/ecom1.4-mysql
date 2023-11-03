<h2>Enregistrement</h2>

<a href="../index.php">Retour Accueil</a></br>
<!-- 
    Formulaire permettant d'enregistrer un nouvel utilisateur
 -->
<form method="post" action="../utils/results.php">
    <input hidden name="action" value="signup">
    <label for="user_name">Nom d'utilisateur</label>
    <input id="user_name" name="user_name" type="text">
    <label for="email">Email</label>
    <input id="email" name="email" type="email">
    <label for="pwd">Mot de passe</label>
    <input id="pwd" name="pwd" type="password">
    <button type="submit">S'enregistrer</button>
</form>

<?php
require_once ('functions/functions.php');
require_once "functions/userCrud.php";
require_once "./config/connexion.php";
/* $server = 'localhost';
$userName = "root";
$pwd = "";
$db = "ecom1";

$conn = mysqli_connect($server, $userName, $pwd, $db);
if ($conn) {
    echo "Connected to the $db database successfully";
    global $conn;
    session_start();
    $_SESSION['connexion']= $conn;
} else {
    echo "Error : Not connected to the $db database";
} */
?>
<a href="./pages/signUp.php">S'enregistrer</a></br>
<?php
// récupérer une ligne dans user
//$result1 = mysqli_query($conn, "SELECT * FROM user WHERE id =2");


// avec fetch row : tableau indexé
/* $data1 = mysqli_fetch_row($result1);

echo "</br>";
echo "Premier fetch";
echo "</br>";
echo "</br>";
//var_dump($result1);
echo "</br>";
echo "</br>";
var_dump($data1);*/

$data1 = selectUserByIdIndex(2);
//showData('Premier fetch', $data1);


//$result2 = mysqli_query($conn, "SELECT * FROM user WHERE id = 1");
// avec fetch assoc tableau associatif
/*$data2 = mysqli_fetch_assoc($result2); 
echo "</br>";
echo "</br>";
echo "Second fetch";
echo "</br>";
echo "</br>";
echo "</br>";
//var_dump($result2);
echo "</br>";
echo "</br>";
var_dump($data2);  */

$data2 = selectUserByIdAssoc(1);

//showData('Second fetch', $data2);

// Récupéerer une seule ligne mais en choisissant l'ordre des colonnes 

//$result3 = mysqli_query($conn, "SELECT user_name, email, id FROM user WHERE id = 1");

//$data3 = mysqli_fetch_assoc($result3);

/* echo "</br>";
echo "</br>";
echo "Troisieme fetch";
echo "</br>";
echo "</br>";
echo "</br>";
var_dump($result3);
echo "</br>";
echo "</br>";
var_dump($data3); */

// récupérer toutes les lignes de la table user

// avec fetch assoc
/* $result4 = mysqli_query($conn, "SELECT * FROM user");


$data4 = [];
$i = 0;
while ($rangeeData = mysqli_fetch_assoc($result4)) {
    $data4[$i] = $rangeeData;
    $i++;

    echo "</br>";
    echo "</br>";
    echo "Nom de l'Usager :" . $rangeeData["user_name"] . "</br>";
    echo "Courriel :" . $rangeeData["email"] . "</br>";
};

echo "</br></br>";
echo "Quatrieme fetch";
echo "</br></br>";
echo "Mon array aura : " . mysqli_num_rows($result4) . " lignes.";
echo "</br></br>";
var_dump($result4);
echo "</br></br>";
var_dump($data4);*/

/* $data4 = getAllUsersAssoc();

showData('Quatrieme fetch', $data4);
echo'<ul>';
foreach ($data4 as $key => $value) {
?>

<li>L'utilisateur  se nomme : <?php echo $value['user_name']?> . 
Son Id est : <?php echo $value['id']?>. 
Son email est : <?php echo $value['email']?>.</li>
<?php


}
echo'</ul>'; */

// avec fetch assoc et un for
/* $result5 = mysqli_query($conn, 
"SELECT * FROM user");


$data5 = [];
$imax = mysqli_num_rows($result5);

for ($i=0; $i < $imax; $i++) { 
    $rangeeData = mysqli_fetch_assoc($result5);
    $data5[$i] = $rangeeData;
    
    echo "</br>";
    echo "</br>";
    echo "Nom de l'Usager :" . $rangeeData["user_name"] . "</br>";
    echo "Courriel :" . $rangeeData["email"] . "</br>";
   
}

echo "</br></br>";
echo "Cinquième fetch";
echo "</br></br>";
echo "Mon array aura : " . mysqli_num_rows($result5) . " lignes.";
echo "</br></br>";
var_dump($result5);
echo "</br></br>";
var_dump($data5); */


// avec fetch assoc
/* $result6 = mysqli_query($conn, "SELECT * FROM user");


$data6 = [];
$i = 0;
while ($rangeeData = mysqli_fetch_row($result6)) {
    $data6[$i] = $rangeeData;
    $i++;

    echo "</br>";
    echo "</br>";
    echo "Nom de l'Usager :" . $rangeeData[1] . "</br>";
    echo "Courriel :" . $rangeeData[2] . "</br>";
};


echo "</br></br>";
echo "Sixieme fetch";
echo "</br></br>";
echo "Mon array aura : " . mysqli_num_rows($result6) . " lignes.";
echo "</br></br>";
var_dump($result6);
echo "</br></br>";
var_dump($data6);  */


/* $data6 = getAllUsersIndex();

//showData('Sixieme fetch', $data6);
echo'<ul>';
foreach ($data6 as $key => $value) {
?>

<li>L'utilisateur  se nomme : <?php echo $value[1]?> . 
Son Id est : <?php echo $value[0]?>. 
Son email est : <?php echo $value[2]?>.</li>
<?php


}
echo'</ul>'; */



//Ajouter une ligne dans la table user 

// les données pourraient venir par exemple de $_POST['email']

$data7 = [
    'user_name'=>'michel',
    'email'=> 'michou@bob.ca', 
    'pwd'=>''
];


//$newUser = createUser($data7);

$users = getAllUsersAssoc();

$data8 = [
    'id'=> 21,
    'user_name'=>'Amine',
    'email'=> 'amine@amine.ca', 
    'pwd'=>''
];

//updateUser($data8);

//$users = getAllUsersAssoc();



//deleteUser(6);





?>
<select name="user_id">
<?php
foreach ($users as $user) {
    ?>

    <option value="<?php echo $user['id']?>"><?php echo $user['user_name']?></option>

<?php
}
?>

</select>
<?php

showData('My users',$users);











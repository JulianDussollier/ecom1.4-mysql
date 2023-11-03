<?php

/* 
On récupère les fonction sde type CRUD dans userCrud pour les regrouper et les trouver plus facilement en cas de changement nécessaire. 

*/


/**
 * Create user 
 * 
 */
function createUser(array $data)
{
    global $conn;
    //session_start();
    //$conn = $_SESSION['connexion'];
    /**
     * Création du'une requete SQL préparée 
     * en vue  d'une insertion 
     */
    $query = "INSERT INTO user VALUES (NULL, ?, ?, ?)";

    /**
     * utilisation de la fonction php mysqli_prepare() 
     * pour préparer la requete et créer le statement.
     * Cela vérifie que la connexion est bonne 
     * et que la requete est valide sur la DB utilisée
     */
    if ($stmt = mysqli_prepare($conn, $query)) {
        /** Lecture des marqueurs (les 3 "?" dans la query)
         * Et on bind les param 
         * en indiquant leur type ( s = string, i = integer)
         * en donnant la valeur des param a inserer dans la DB ($data[key])
         */
        mysqli_stmt_bind_param(
            $stmt,
            "sss",
            $data['user_name'],
            $data['email'],
            $data['pwd']
        );

        /* Exécution de la requête */
        $result = mysqli_stmt_execute($stmt);
    }
}
/**
 * Get all
 */
function getAllUsers()
{
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM user");

    $data = [];
    $i = 0;
    while ($rangeeData = mysqli_fetch_assoc($result)) {
        $data[$i] = $rangeeData;
        $i++;
    };

    /* $imax = mysqli_num_rows($result);

    for ($i = 0; $i < $imax; $i++) {
        $rangeeData = mysqli_fetch_assoc($result);
        $data[$i] = $rangeeData;
    } */

    return $data;
}

/**
 * Get user by id
 */
function getUserById(int $id)
{
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM user WHERE id = " . $id);

    // avec fetch row : tableau indexé
    $data = mysqli_fetch_assoc($result);

    return $data;
}
/**
 * Get user by Name
 */
function getUserByName(string $user_name)
{
    global $conn;
    /* $query = "SELECT * 
                FROM user
                WHERE user.user_name = ?;";

    if ($stmt = mysqli_prepare($conn, $query)) {

        mysqli_stmt_bind_param(
            $stmt,
            "s",
            $user_name,
        );

        // Exécution de la requête 
        mysqli_stmt_execute($stmt);

        // bind result variables 
        mysqli_stmt_bind_result($stmt, $user_name);

        // fetch value 
        mysqli_stmt_fetch($stmt); 
        
    }*/

    $query = "SELECT * FROM user WHERE user.user_name = '" . $user_name."';";

    var_dump($query);
    $result = mysqli_query($conn, $query);

        // avec fetch row : tableau indexé
        $data = mysqli_fetch_assoc($result);
        return $data;
}

/**
 * Update user
 */
function updateUser(array $data)
{
    global $conn;

    $query = "UPDATE user SET user_name = ?, email = ?, pwd = ?
            WHERE user.id = ?;";

    if ($stmt = mysqli_prepare($conn, $query)) {

        mysqli_stmt_bind_param(
            $stmt,
            "sssi",
            $data['user_name'],
            $data['email'],
            $data['pwd'],
            $data['id'],
        );

        /* Exécution de la requête */
        $result = mysqli_stmt_execute($stmt);
    }
}
/**
 * Delete user
 */
function deleteUser(int $id)
{
    global $conn;

    /* Query  permettant de delete un user en ayant juste son id */
    $query = "DELETE FROM user
                WHERE user.id = ?;";

    if ($stmt = mysqli_prepare($conn, $query)) {

        mysqli_stmt_bind_param(
            $stmt,
            "i",
            $id,
        );

        /* Exécution de la requête */
        $result = mysqli_stmt_execute($stmt);
    }
}

<?php

function usernameIsValid(string $username): array
{
    $result = [
        'isValid' => true,
        'msg' => ''

    ];

    $userInDB = getUserByName($username);

    var_dump($userInDB);

    echo '<br><br>';
    echo strlen($username);
    if (strlen($username) < 2) {
        $result = [
            'isValid' => false,
            'msg' => 'Le nom utilisé est trop court'

        ];
    } elseif (strlen($username) > 20) {
        echo '<br><br> Dans mon if strlen >20';
        echo strlen($username);  
        $result = [
            'isValid' => false,
            'msg' => 'Le nom utilisé est trop long'

        ];
    } elseif ($userInDB) {

        echo '<br><br>';
        var_dump($userInDB);
        //Doit être différent d'un user name déjà dans la DB

        /* 
        1) get user by username
        2) if exist : error
        */
        $result = [
            'isValid' => false,
            'msg' => 'Le nom est déjà utilisé'

        ];
    }
    return $result;
}

function emailIsValid(string $email): array
{
    # code...
    $isValid = true;
    return [
        'isValid' => $isValid,
        'msg' => ''

    ];
}

function pwdIsValid(string $pwd): array
{
    # code...
    $isValid = true;
    return [
        'isValid' => $isValid,
        'msg' => ''

    ];
}

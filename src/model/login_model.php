<?php

function login()
{
    $database = dbConnect();

    $statement = $database->prepare(
        "SELECT id, mail, password FROM users"
    );
    $statement->execute();
    $users  = [];
    while (($row = $statement->fetch())) {
        $user = [
            'id' => $row['id'],
            'mail' => $row['mail'],
            'password' => $row['password'],
        ];
        $users[] = $user;
    }

    return $users;
}

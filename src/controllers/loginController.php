<?php
session_start();
require_once('./src/model/login_model.php');

function connect()
{
    if (isset($_POST['mail']) &&  isset($_POST['password'])) {

        $users = login();

        foreach ($users as $user) {
            if (
                $user['mail'] === $_POST['mail'] &&
                $user['password'] === $_POST['password']
            ) {
                $_SESSION["is_connect"] = true;
                header('Location: index.php?action=dashboard');
            } else {
                echo "Les informations envoyées ne permettent pas de vous identifier";
                header('Location: index.php?action=loginpage');
            }
        }
    }
}

function logout()
{
    session_destroy();
    header('Location: index.php');
}

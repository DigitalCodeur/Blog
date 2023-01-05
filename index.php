<?php

require_once('src/controllers/postController.php');
require_once('src/controllers/appController.php');
require_once('src/controllers/loginController.php');
try {
    if (isset($_GET['action']) && $_GET['action'] !== '') {
        if ($_GET['action'] === 'addPost') {
            addPost();
        } elseif ($_GET['action'] === 'createpage') {
            createpage();
        } elseif ($_GET['action'] === 'editpage') {

            $id = $_GET['id'];
            editpage($id);
        } elseif ($_GET['action'] === 'updateOncePost') {

            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];

                updateOncePost($id);
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($_GET['action'] === 'deleteOncePost') {

            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];

                deleteOncePost($id);
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($_GET['action'] === 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];

                post($id);
            } else {
                throw new Exception('Aucun identifiant d\' article envoyé');
            }
        } elseif ($_GET['action'] === 'dashboard') {
            dashboard();
        } elseif ($_GET['action'] === 'connect') {
            connect();
        } elseif ($_GET['action'] === 'logout') {
            logout();
        } elseif ($_GET['action'] === 'loginpage') {
            loginpage();
        }
    } else {
        homepage();
    }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();
}

<?php

require_once('./src/model/model.php');

function addPost()
{
    $author = $category = $title = $picture = $content = null;

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        if (!empty($_POST['author']) && !empty($_POST['category']) && !empty($_POST['title']) && !empty($_FILES['picture']['name']) && !empty($_POST['content'])) {
            $author = $_POST['author'];
            $category = $_POST['category'];
            $title = $_POST['title'];
            $picture = $_FILES['picture']['name'];
            $content = $_POST['content'];

            $fileInfo = pathinfo($picture);
            $extension = $fileInfo['extension'];
            $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png', 'webp'];

            if (in_array($extension, $allowedExtensions)) {
                if (file_exists('./public/uploads/' . basename($picture))) {
                } else {
                    move_uploaded_file($_FILES['picture']['tmp_name'], './public/uploads/' . basename($picture));
                }
            } else {
                echo "Désolé Seul les fichers JPG, JPEG, GIF, PNG, WEBP sont autorisé";
            }
        } else {
            throw new Exception('Veillez remplir tous les champs.');
        }
    }

    $success = storePost($author, $category, $title, $picture, $content);
    if (!$success) {
        // throw new Exception('Impossible d\'ajouter le post !');
        $error = "article non créé";
        header('Location: index.php?action=createpage&error=' . $error);
        exit;
    } else {
        $info = "article créé avec succes";
        header('Location: index.php?action=createpage&info=' . $info);
        exit;
    }
}

function updateOncePost($id)
{

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (!empty($_FILES['picture']['name'])) {
            if (!empty($_POST['author']) && !empty($_POST['category']) && !empty($_POST['title']) && !empty($_POST['content'])) {
                $author = $_POST['author'];
                $category = $_POST['category'];
                $title = $_POST['title'];
                $picture = $_FILES['picture']['name'];
                $content = $_POST['content'];

                $fileInfo = pathinfo($picture);
                $extension = $fileInfo['extension'];
                $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png', 'webp'];

                if (in_array($extension, $allowedExtensions)) {
                    if (file_exists('./public/uploads/' . basename($picture))) {
                    } else {
                        move_uploaded_file($_FILES['picture']['tmp_name'], './public/uploads/' . basename($picture));
                    }
                } else {
                    $info = "Désolé Seul les fichers JPG, JPEG, GIF, PNG, WEBP sont autorisé";
                }
            } else {
                throw new Exception('Veillez remplir tous les champs.');
            }
        } else {
            if (!empty($_POST['author']) && !empty($_POST['category']) && !empty($_POST['title']) && !empty($_POST['picture_old']) && !empty($_POST['content'])) {
                $author = $_POST['author'];
                $category = $_POST['category'];
                $title = $_POST['title'];
                $picture = $_POST['picture_old'];
                $content = $_POST['content'];
            } else {
                throw new Exception('Veillez remplir tous les champs.');
            }
        }
    }

    $success = updatePost($id, $author, $category, $title, $picture, $content);
    if (!$success) {
        // throw new Exception('Impossible de modifier le post !');
        $error = "article non modifier";
        header('Location: index.php?action=editpage&id=' . $id . '&error=' . $error);
        exit;
    } else {
        $info = "article modifier avec succes";
        header('Location: index.php?action=editpage&id=' . $id . '&info=' . $info);
        exit;
    }
}


function deleteOncePost($id)
{
    $success = deletePost($id);
    if (!$success) {
        // throw new Exception('Impossible de supprimer le post !');
        $error = "article effaccer avec succes";
        header('Location: index.php?action=dashboard&$info=' . $error);
        exit;
    } else {
        $info = "article effaccer avec succes";
        header('Location: index.php?action=dashboard&$info=' . $info);
        exit;
    }
}
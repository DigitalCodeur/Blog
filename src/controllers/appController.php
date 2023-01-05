<?php

require_once('src/model/model.php');

function editpage($id)
{
    if (!empty($_SESSION["is_connect"]) && $_SESSION["is_connect"] === true) {
        $post = getPost($id);
        require('src/views/blog/edit_post.php');
    } else {
        header('Location: index.php');
    }
}

function createpage()
{
    if (!empty($_SESSION["is_connect"]) && $_SESSION["is_connect"] === true) {
        require('src/views/blog/create_post.php');
    } else {
        header('Location: index.php');
    }
}

function homepage()
{
    $posts = getPosts();
    require('src/views/homepage.php');
}

function post($id)
{
    $post = getPost($id);
    $posts = getPosts();
    require('src/views/blog/post.php');
}

function dashboard()
{
    if (!empty($_SESSION["is_connect"]) && $_SESSION["is_connect"] === true) {
        $posts = getPosts();
        require('src/views/dashboard.php');
    } else {
        header('Location: index.php');
    }
}

function loginpage()
{
    require('src/views/login.php');
}
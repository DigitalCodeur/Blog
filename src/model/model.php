<?php

function dbConnect()
{
    $servername = "localhost";
    $dbname = "scodeur_blog";
    $username = "root";
    $password = "";

    $database = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    return $database;
}


function getPosts()
{
    $database = dbConnect();
    $statement = $database->query(
        "SELECT id, author, category, title, picture, creation_date FROM posts ORDER BY creation_date DESC LIMIT 0,5"
    );
    $posts = [];
    while (($row = $statement->fetch())) {
        $post = [
            'id' => $row['id'],
            'author' => $row['author'],
            'category' => $row['category'],
            'title' => $row['title'],
            'picture' => $row['picture'],
            'french_creation_date' => $row['creation_date'],
        ];
        $posts[] = $post;
    }

    return $posts;
}


function storePost(string $author, string $category, string $title, string $picture, string $content)
{
    $database = dbConnect();
    $statement = $database->prepare(
        'INSERT INTO posts(author, category, title, picture, content, creation_date) VALUES(?, ?, ?, ?, ?, NOW())'
    );
    $affectedLines = $statement->execute([$author, $category, $title, $picture, $content]);

    return ($affectedLines > 0);
}

function getPost($id)
{
    $database = dbConnect();
    $statement = $database->prepare(
        "SELECT id, author, category, title, picture, content, DATE_FORMAT(creation_date, '%d %M %Y') AS french_creation_date FROM posts WHERE id = ?"
    );

    $statement->execute([$id]);

    $row = $statement->fetch();
    $post = [
        'id' => $row['id'],
        'author' => $row['author'],
        'category' => $row['category'],
        'title' => $row['title'],
        'picture' => $row['picture'],
        'content' => $row['content'],
        'french_creation_date' => $row['french_creation_date'],
    ];

    return $post;
}


function updatePost($id, string $author, string $category, string $title, string $picture, string $content)
{
    $database = dbConnect();
    $statement = $database->prepare(
        "UPDATE posts SET author = '$author', category = '$category', title = '$title', picture = '$picture', content = '$content', creation_date = NOW() WHERE id = $id"
    );
    $affectedLines = $statement->execute();

    return ($affectedLines > 0);
}

function deletePost($id)
{
    $database = dbConnect();
    $statement = $database->prepare(
        "DELETE FROM posts WHERE id = $id"
    );
    $affectedLines = $statement->execute();
    return ($affectedLines > 0);
}
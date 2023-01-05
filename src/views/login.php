<?php $title = "Se connecter"; ?>

<?php ob_start(); ?>
<main class="container mx-auto font-serif">
    <div class="mb-20">
        <h1 class="text-4xl text-center py-10 font-bold">Se connecter</h1>
        <?php
        if (!empty($_SESSION["is_connect"]) && $_SESSION["is_connect"] === true) {
            echo "<p class=\"text-green-600\">Vous etes connecté</p>";
        } else {
            echo "<p class=\"text-red-600\">Vous n' etes pas connecté</p>";
        }
        ?>
        <form action="index.php?action=connect" method="post" class="w-1/2 mx-auto">
            <div class="my-3">
                <label for="author" class="text-xl">Adress mail</label>
                <input type="text" name="mail" class="w-full text-lg py-1 px-2 mt-2 border rounded-md bg-white"
                    id="author" required>
            </div>
            <div class="my-3">
                <label for="category" class="text-xl">Mot de passe</label>
                <input type="password" name="password" class="w-full text-lg py-1 px-2 mt-2 border rounded-md bg-white"
                    id="category" required>
            </div>

            <button type="submit" class="py-3 px-10 w-1/2 my-3 text-2xl text-white bg-blue-700 rounded-lg">Se
                connecter</button>
        </form>
    </div>
</main>

<?php $content = ob_get_clean(); ?>

<?php require('layouts/app.php') ?>
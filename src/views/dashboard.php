<?php $title = "Tableau de board"; ?>

<?php ob_start(); ?>
<main class="container mx-auto font-serif">

    <h1 class="text-4xl text-center py-10 font-bold">Tableau de board</h1>
    <section class=" shadow-xl p-5 rounded-2xl bg-white my-10">
        <div class="text-end">
            <?php
            if (!empty($_SESSION["is_connect"]) && $_SESSION["is_connect"] === true) {
                echo "<a href=\"index.php?action=logout\" class=\"bg-red-500 text-white px-4 py-2 font-bold my-3 border rounded-xl text-lg\">Se déconnecter</a>";
            }
            ?>
        </div>

    </section>
    <section class=" shadow-xl p-5 rounded-2xl bg-white my-10">
        <h2 class="text-4xl text-center pt-5 font-bold">Mes Articles</h2>
        <?php
        if (!empty($_GET['info'])) {
            $info = $_GET['info'];
            echo "<div>
    <p class=\"text-green-600 bg-green-100\">$info</p>
</div>";
        } elseif (!empty($_GET['error'])) {
            $info = $_GET['error'];
            echo "<div>
    <p class=\"text-red-600 bg-red-100\">$error</p>
</div>";
        }
        ?>
        <div class="my-5 text-end">
            <a href="index.php?action=createpage"
                class="bg-blue-100 text-blue-700 px-4 py-2 font-bold my-3 border rounded-xl text-lg">Ajouter un
                post</a>
        </div>
        <table class="w-full">
            <thead>
                <th class="border p-3">Titre</th>
                <th class="border p-3">Categories</th>
                <th class="border p-3">Autheur</th>
                <th class="border p-3">Date de creation</th>
                <th class="border p-3">Action</th>
            </thead>

            <?php

            foreach ($posts as $post) {
            ?>

            <tbody>

                <td class="border p-3">
                    <?php
                        $titre = $post['title'];
                        echo substr("$titre", 0, 60) . "...";
                        ?>
                </td>
                <td class="border p-3"><?= $post['category']; ?></td>
                <td class="border p-3"><?= $post['author']; ?></td>
                <td class="border p-3"><?= $post['french_creation_date']; ?></td>
                <td class="border p-3 flex justify-between">
                    <div>
                        <a href="index.php?action=editpage&id=<?= urlencode($post['id']) ?>"
                            class="bg-green-100 text-green-700 px-4 py-2 font-bold my-3 border rounded-xl text-lg">Editer</a>
                    </div>
                    <div>
                        <a href="index.php?action=deleteOncePost&id=<?= urlencode($post['id']) ?>"
                            class="bg-red-100 text-red-700 px-4 py-2 font-bold my-3 border rounded-xl text-lg">Supprimer</a>
                    </div>
                </td>

            </tbody>

            <?php
            }
            ?>

        </table>
    </section>
</main>
<?php $content = ob_get_clean(); ?>

<?php require('layouts/app.php') ?>
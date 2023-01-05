<?php $title = "Modifier un post"; ?>

<?php ob_start(); ?>
<main class="container mx-auto font-serif">
    <div class="mb-20">
        <h1 class="text-4xl text-center py-10 font-bold">Modifier un article</h1>
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

        <form action="index.php?action=updateOncePost&id=<?= urlencode($post['id']) ?>" method="post"
            enctype="multipart/form-data" class="w-3/4 mx-auto">
            <div class="my-3">
                <label for="author" class="text-xl">Auteur</label>
                <input type="text" name="author" class="w-full text-lg py-1 px-2 mt-2 border rounded-md bg-white"
                    id="author" value="<?= $post['author'] ?>" required>
            </div>
            <div class="my-3">
                <label for="category" class="text-xl">Categories</label>
                <input type="text" name="category" class="w-full text-lg py-1 px-2 mt-2 border rounded-md bg-white"
                    id="category" value="<?= $post['category'] ?>" required>
            </div>
            <div class="my-3">
                <label for="title" class="text-xl">Titre</label>
                <input type="text" name="title" class="w-full text-lg py-1 px-2 mt-2 border rounded-md bg-white"
                    id="title" value="<?= $post['title'] ?>" required>
            </div>
            <div class="my-3">
                <label for="picture" class="text-xl">Image</label>
                <input type="file" accept="image/*" name="picture"
                    class="w-full text-lg py-1 px-2 mt-2 border rounded-md bg-white" id="picture">
                <input type="hidden" name="picture_old" value="<?= $post['picture'] ?>">
                <p class="text-red-600">Laiser se champ vide si vous choisissez de garder l'ancienne image.</p>
            </div>
            <div class="my-3">
                <label for="content" class="text-xl">Contenu</label>
                <textarea type="text" name="content" class="w-full text-lg px-2 py-1 mt-2 border rounded-md bg-white"
                    id="content" rows="10" required><?= $post['content'] ?></textarea>
            </div>
            <button type="submit"
                class="py-3 px-10 w-1/2 my-3 text-2xl text-white bg-blue-700 rounded-lg">Modifier</button>
        </form>
    </div>
</main>
<?php $content = ob_get_clean(); ?>
<?php require('src/views/layouts/app.php') ?>
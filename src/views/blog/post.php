<?php $title = "article"; ?>

<?php ob_start(); ?>
<main class="container mx-auto font-serif">
    <article class="my-10">
        <div class=" bg-green-100 w-52 text-center text-green-700 font-bold my-3 rounded-xl text-lg">
            <?= $post['category']; ?>
        </div>
        <h1 class="text-4xl font-bold my-10"><?= $post['title']; ?></h1>
        <div>
            <img src="public/uploads/<?= $post['picture']; ?>" class=" w-full h-screen rounded-2xl my-10" alt="">
        </div>
        <div>
            <p class="text-lg text-justify"><?= $post['content']; ?></p>
            <p class="text-lg py-10">Fait le <?= $post['french_creation_date']; ?> par<i class="text-green-700">
                    <?= $post['author']; ?></i></p>
        </div>
    </article>
</main>
<?php $content = ob_get_clean(); ?>

<?php require('src/views/layouts/app.php') ?>
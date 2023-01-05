<?php $title = "Le blog de Scodeur"; ?>

<?php ob_start(); ?>
<main class="font-serif">
    <div>
        <div>
            <div>
                <img src="public/images/blog3.jpg" class="w-full title-img" alt="...">
                <div class="position: absolute bottom-32 md:top-96 top-80">
                    <h1 class=" text-9xl text-white">BLOG</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container mx-auto">
        <h1 class="text-4xl py-10 font-bold">Nos derniers articles</h1>
        <div class="grid my-14 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1">
            <?php
            foreach ($posts as $post) {
            ?>

            <article class="mx-auto bg-white w-80 mt-5 shadow-2xl rounded-2xl">
                <div>
                    <img src="public/uploads/<?= $post['picture']; ?>" class="h-56 w-80 rounded-t-2xl" alt="">
                </div>

                <div class="p-4">
                    <p>
                        <?php
                            $date = date_create($post['french_creation_date']);
                            echo date_format($date, "d M Y");
                            ?>
                    </p>
                    <div class=" bg-green-100 w-1/2 text-center text-green-700 font-bold my-3 rounded-xl text-lg">
                        <?= $post['category']; ?>
                    </div>
                    <div class="text-lg font-bold">
                        <a href="index.php?action=post&id=<?= urlencode($post['id']) ?>" class="hover:underline">
                            <?php
                                $titre = $post['title'];
                                echo substr("$titre", 0, 50) . "...";
                                ?>
                        </a>
                    </div>

                    <p class="text-md pt-4">Par <?= $post['author']; ?></p>
                </div>
            </article>

            <?php
            }
            ?>
        </div>
    </div>
</main>

<?php $content = ob_get_clean(); ?>
<?php require('layouts/app.php'); ?>
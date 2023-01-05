<footer class=" bg-slate-800 py-2 font-serif">
    <div class="container mx-auto">
        <div class="text-center my-5">
            <a href="index.php" class="text-6xl text-white">Scodeur</a>
        </div>
        <div class="sm:flex sm:visible hidden justify-evenly my-5">
            <div class=" flex justify-between">
                <div class="mx-5">
                    <a href="index.php" class="text-xl text-white">Accueil</a>
                </div>
                <div class="mx-5">
                    <a href="#" class="text-xl text-white">A propos</a>
                </div>
                <div class="mx-5">
                    <?php
                    if (!empty($_SESSION["is_connect"]) && $_SESSION["is_connect"] === true) {
                        echo "<a href=\"index.php?action=dashboard\" class=\"text-xl text-white\">Dashbord</a>";
                    } else {
                        echo "<a href=\"index.php?action=loginpage\" class=\"text-xl text-white\">Se connecter</a>";
                    }
                    ?>

                </div>
                <div class="mx-5">
                    <a href="#contact" class="text-xl text-white">Contact</a>
                </div>
            </div>
        </div>
        <hr>
        <div class="flex justify-between flex-wrap py-2" id="contact">
            <div>
                <p class="text-white text-lg">
                    Copyright &copy; 2022 Koffi Samuel LOUMON
                </p>
            </div>
            <div class="flex justify-between">
                <a href="https://github.com/LOUMON-Koffi-Samuel" target="_blank" title="Accéder au github" class="mx-4">
                    <img src="public/images/github.webp" width="32" height="32" class="mt-1" alt="logo github" />
                </a>
                <a href="https://www.linkedin.com/in/koffi-samuel-loumon-5180a8233/" target="_blank"
                    title="voir le profil linkedin" class="mx-4">
                    <img src="public/images/linkedin.webp" width="32" height="32" class="mt-1" alt="logo linkedin" />
                </a>
                <a href="mailto:lkoffisamuel@gmail.com" target="_blank" title="Envoyer un mail" class="mx-4">
                    <img src="public/images/mail.webp" width="32" height="32" class="mt-1" alt="logo mail" />
                </a>
            </div>
        </div>
    </div>
</footer>
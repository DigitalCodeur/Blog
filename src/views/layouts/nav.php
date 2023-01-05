<nav class=" bg-slate-800 py-2 font-serif">
    <div class="container mx-auto md:flex lg:flex justify-between">
        <div class="flex justify-between">
            <a href="index.php" class="text-3xl mx-2 text-white">Scodeur</a>
            <div class="block md:hidden">
                <button class="flex mx-3 items-center px-3 py-2 border rounded text-white border-white" id="click-menu">
                    <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <title>Menu</title>
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                    </svg>
                </button>
            </div>
        </div>

        <div class="md:flex hidden nav-menu text-center justify-between">
            <div class="mx-5 mt-1">
                <a href="index.php" class="text-xl text-white my-1">Accueil</a>
            </div>
            <div class="mx-5 mt-1">
                <a href="#" class="text-xl text-white my-1">A propos</a>
            </div>
            <div class="mx-5 mt-1">
                <?php
                if (!empty($_SESSION["is_connect"]) && $_SESSION["is_connect"] === true) {
                    echo "<a href=\"index.php?action=dashboard\" class=\"text-xl text-white my-1\">Dashbord</a>";
                } else {
                    echo "<a href=\"index.php?action=loginpage\" class=\"text-xl text-white my-1\">Se connecter</a>";
                }
                ?>

            </div>
            <div class="mx-5 mt-1">
                <a href="#contact" class="text-xl text-white my-1">Contact</a>
            </div>
        </div>
    </div>
</nav>
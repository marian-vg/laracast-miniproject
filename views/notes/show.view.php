<?php require base_path("views/partials/head.php") ?>
<?php require base_path("views/partials/nav.php") ?>
<?php require base_path("views/partials/banner.php") ?>

    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
         
            <p><?= htmlspecialchars($note['body'])?></p>

            <button class="bg-white rounded-xl shadow-lg hover:scale-105 transition-transform items-center justify-center duration-5 w-20 h-10 flex mt-6">
                <p>
                    <a href="/notes" class="text-blue-800 ">Go back</a>
                </p>  
            </button>

            <form class="mt-6" method="post">

            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="id" value="<?= $note['id'] ?>">

                <button class="bg-white rounded-xl shadow-lg text-gray-700 hover:scale-105 transition-transform duration-5 px-4 py-2">
                    Delete
                </button>

            </form>

        </div>
    </main>

<?php require base_path("views/partials/footer.php") ?>
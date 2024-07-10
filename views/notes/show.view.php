<?php require base_path("views/partials/head.php") ?>
<?php require base_path("views/partials/nav.php") ?>
<?php require base_path("views/partials/banner.php") ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

        <h1 class="text-3xl font-bold text-gray-900 mb-4"> <?= 'Title : '.$note['title'] ?> </h1>
        <h2 class="mb-4"> <?= 'Body : '.$note['body'] ?> </h2>

        <div class="flex gap-x-6">
            <form method="POST" action="">
                <input type="hidden" name="id" value="<?= $note['id'] ?>">
                <button class="text-red-500 font-bold hover:underline" type="submit">Delete</button>
            </form>
            <a class="text-blue-900 font-bold hover:underline" href="/notes">Go Back</a>
        </div>


    </div>
</main>

<?php require base_path("views/partials/footer.php") ?>

<?php require "partials/head.php" ?>
<?php require "partials/nav.php" ?>
<?php require "partials/banner.php" ?>

<main>

    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

        <?php foreach ($notes as $note) : ?>
            <li>
                <a href="/note?id=<?= $note['id'] ?>" class="text-blue-500 font-bold hover:underline">
                    <?= $note['body'] ?>
                </a>
            </li>

        <?php endforeach; ?>

        <div class="mt-4">
            <a href="/notes/create"
               class="bg-blue-500 text-white font-bold rounded-md px-4 py-2 hover:bg-blue-700 transition-colors duration-300">Create</a>
        </div>
    </div>

</main>
<?php require "partials/footer.php" ?>

<?php require base_path("views/partials/head.php") ?>
<?php require base_path("views/partials/nav.php") ?>
<?php require base_path("views/partials/banner.php") ?>

<main>

    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

        <?php foreach ($notes as $note) : ?>
            <li>
                <a href="/note?id=<?= $note['id'] ?>" class="text-blue-500 font-bold hover:underline">
                    <?= htmlspecialchars($note['body']) ?>
                </a>
            </li>

        <?php endforeach; ?>

        <div class="mt-4">
            <a href="/notes/create"
               class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create</a>
        </div>

    </div>

</main>
<?php require base_path("views/partials/footer.php") ?>

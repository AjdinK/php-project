<?php require "partials/head.php" ?>
<?php require "partials/nav.php" ?>
<?php require "partials/banner.php" ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

        <h1 class="text-3xl font-bold text-gray-900 mb-4"> <?= 'Title : '.$note['title'] ?> </h1>
        <h2 class="mb-4"> <?= 'Body : '.$note['body'] ?> </h2>

        <a class="text-blue-500 font-bold hover:underline" href="/notes">Go Back</a>
    </div>
</main>
<?php require "partials/footer.php" ?>

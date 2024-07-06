<?php require "partials/head.php" ?>
<?php require "partials/nav.php" ?>
<?php require "partials/banner.php" ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <?php foreach ($note as $item) : ?>
            <li> <?= 'id : '.$item['id'] ?> </li>
            <li> <?= 'title : '.$item['title'] ?> </li>
            <li> <?= 'body : '.$item['body'] ?> </li>
            <li> <?= 'user_id : '.$item['user_id'] ?> </li>
            <br>
            <hr>
            <br>
        <?php endforeach; ?>
        <a class="text-blue-500 font-bold hover:underline" href="/notes">Go Back</a>
    </div>
</main>
<?php require "partials/footer.php" ?>

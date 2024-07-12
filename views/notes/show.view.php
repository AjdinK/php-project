<?php require base_path("views/partials/head.php") ?>
<?php require base_path("views/partials/nav.php") ?>
<?php require base_path("views/partials/banner.php") ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

        <h1 class="text-3xl font-bold text-gray-900 mb-4"> <?= 'Title : '.$note['title'] ?> </h1>
        <h2 class="mb-4"> <?= 'Body : '.$note['body'] ?> </h2>

        <div class="flex gap-x-6">
            <form method="POST" action="/note">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="id" value="<?= $note['id'] ?>">

                <div class="flex  gap-x-6 items-center">
                    <a class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                       href="/note/edit?id=<?= $note['id'] ?>">Edit</a>
                    <a class="text-sm font-semibold leading-6 text-gray-900"
                       href="/notes">Go Back</a>
                </div>
            </form>
        </div>


    </div>
</main>

<?php require base_path("views/partials/footer.php") ?>

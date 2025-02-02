<?php require base_path("views/partials/head.php") ?>
<?php require base_path("views/partials/nav.php") ?>
<?php require base_path("views/partials/banner.php") ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <form method="POST" action="/note">
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="id" value="<?= $note['id'] ?>">
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <div class="col-span-full">
                        <label for="body" class="block text-sm font-medium leading-6 text-gray-900">Body</label>
                        <div class="mt-2">
                            <textarea required id="body" name="body" rows="3"
                                      class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                      placeholder="here is an awesome note">
                                <?= $note['body'] ?>
                            </textarea>
                            <?php if (isset($errors['body'])) : ?>
                                <p class="mt-1 text-xs font-semibold leading-6 text-red-600"> <?= $errors['body'] ?> </p>
                            <?php endif; ?>
                        </div>
                        <p class="mt-3 text-sm leading-6 text-gray-600">Write a few sentences about your note.</p>
                    </div>

                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <a href="/notes" type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                        <a href="/note/destroy" type="button"
                           class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">
                            Delete
                        </a>
                        <button type="submit"
                                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Update
                        </button>
                    </div>
                </div>
        </form>
    </div>
</main>

<?php require base_path("views/partials/footer.php") ?>

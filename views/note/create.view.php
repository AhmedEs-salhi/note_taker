<!doctype html>
<html lang="en">
<?php view('partials/head.php'); ?>
<body>
    <?php view('partials/header.php'); ?>
    <div class="flex items-center justify-between gap-x-6 m-10">
        <h1 class="text-6xl text-gray-900">Create a note</h1>
        <a href="/notes">
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"><i class="fa-solid fa-arrow-left"></i> Back</button>
        </a>
    </div>
    <form method="POST" action="/notes">
        <input type="hidden" name="_method" value="POST">
        <div class="space-y-12">
            <div class="border border-gray-900/10 p-4 m-10 rounded-md">
                <h2 class="text-base/7 font-semibold text-gray-900">Create new note</h2>
                <p class="mt-1 text-sm/6 text-gray-600">Enter your note's information and click save</p>

                <div class="mt-10 grid grid-cols-1 gap-x-4 gap-y-6 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="title" class="block text-sm/6 font-medium text-gray-900">Title</label>
                        <div class="mt-2">
                            <div class="flex items-center rounded-md bg-white outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 w-full focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                <input  id="title" type="text" name="title" placeholder="Note title" class="w-full border rounded-md border-gray-900/10 block bg-white py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" />
                            </div>
                        </div>
                    </div>
                    <div class="col-span-full">
                        <label for="content" class="block text-sm/6 font-medium text-gray-900">Content</label>
                        <div class="mt-2">
                            <textarea  id="content" name="content" rows="3" placeholder="Content goes here..." class="border border-gray-900/10 block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"></textarea>
                        </div>
                    </div>
                    <div class="col-span-full">
                        <?php  if (key_exists('error', $message)): ?>
                            <p class="text-red-500 border border-red p-3 bg-red-500/10 rounded-md font-semibold">
                                <?= $message['error']; ?>
                            </p>
                        <?php elseif (key_exists('success', $message)):?>
                            <p class="mt-4 text-green-500 border border-green p-3 bg-green-500/10 rounded-md font-semibold">
                                <?= $message['success']; ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                </div>
            </div>
        </div>
    </form>
</body>
</html>




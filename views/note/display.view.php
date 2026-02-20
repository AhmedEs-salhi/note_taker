<!doctype html>
<html lang="en" class="h-full">
<?php view('partials/head.php'); ?>
<body class="h-full">
    <div class="bg-white">
        <div class="mx-auto w-full max-w-xl px-4 py-4 sm:px-2 sm:py-24 lg:max-w-7xl lg:px-8">
            <div class="mb-5 flex items-center justify-between gap-x-6">
                <h1 class="text-6xl text-gray-900 px-3 py-2"><?= 'Hello, ' . ucfirst(($_SESSION['user']['first_name'])); ?></h1>
                <a href="/note/create">
                    <button class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add Note</button>
                </a>
            </div>
            <div class="grid grid-cols-3 gap-2 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8 border border-gray-900/10 p-10 rounded-md">
                <?php if ($notes === []):?>
                <div class="col-span-full flex justify-center align-center">
                    <p class="text-gray-500 text-align-center">You don't have any notes. Create new Note...</p>
                </div>
                <?php endif;?>
                <?php $notes = array_reverse($notes); ?>
                <?php foreach($notes as $note): ?>
                    <a href="/note?id=<?=$note['id'];?>" class=" group border p-5 rounded-md bg-gray-900/10 hover:bg-white">
                        <p class="text-sm text-gray-400"><?= $note['created_at'] ?></p>
                        <h3 class="mt-1 text-lg text-gray-900 overflow-hidden"><?= $note['name']?>  </h3>
                        <p class="mt-1 text-sm h-10 text-gray-500 overflow-hidden">
                            <?= htmlspecialchars($note['content']) ?>
                        </p>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>
</html>
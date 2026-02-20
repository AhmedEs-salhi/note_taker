<!doctype html>
<html lang="en" class="h-full">
<?php view('partials/head.php'); ?>
<body class="h-full">
    <div class="mt-6 flex items-center justify-between gap-x-6 pr-5">
        <h1 class="ml-5 text-6xl text-gray-900"><?= $note['name'] ?></h1>
        <a href="/notes">
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"><i class="fa-solid fa-arrow-left"></i> Back</button>
        </a>
    </div>
    <div class="border border-gray-900/10 rounded-md p-5 m-5 m-x-auto">
        <p><?= htmlspecialchars($note['content']) ?></p>
    </div>
    <div class="w-full flex justify-end pr-5">
        <a href="/note/edit?id=<?=$note['id']?>">
            <button class="flex justify-around gap-x-2 items-center bg-[007ea7] rounded-md ml-5 bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-blue-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                <i class="fa-solid fa-pen"></i><span>Update</span>
            </button>
        </a>
        <form action="/note" method="POST">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="id" value="<?=$note['id']?>">
            <a href="/note/destroy">
                <button class="rounded-md ml-5 flex bg-[d90816] justify-around items-center gap-x-2 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-red-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600"><i class="fa-solid fa-trash"></i> Delete</button>
            </a>
        </form>
    </div>
</body>
</html>
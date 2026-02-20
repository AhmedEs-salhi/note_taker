<nav aria-label="Global" class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8">
    <div class="flex lg:flex-1 lg:gap-x-5 items-center">
        <a href="#" class="-m-1.5 p-1.5">
            <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="" class="h-8 w-auto" />
        </a>
        <p class="rounded-md px-3 py-2 text-md/6 font-semibold text-white">
            <?= ucfirst($_SESSION['user']['first_name']); ?>
        </p>
    </div>
    <div class="hidden lg:flex lg:flex-1 lg:justify-end gap-x-4 items-center">
        <?php if ($_SESSION['user'] ?? false):?>
        <form action="/session" method="POST" class="flex items-center justify center mb-0">
            <input type="hidden" name="_method" value="DELETE">
            <button class="mb-0 rounded-md px-3 py-2 text-sm/6 font-semibold text-white hover:bg-blue-900">
                <?= 'Log Out <span aria-hidden="true">&rarr;</span>'?>
            </button>
        </form>
        <?php else: ?>
            <a href="/register" class="<?= urlIs('/register') ? 'bg-blue-900' : '' ?> rounded-md px-3 py-2 text-sm/6 font-semibold text-white hover:bg-blue-900">
                <?= 'Register <span aria-hidden="true">&rarr;</span>'?>
            </a>
            <a href="/login" class="<?= urlIs('/register') ? 'bg-blue-900' : '' ?> rounded-md px-3 py-2 text-sm/6 font-semibold text-white hover:bg-blue-900">
                <?= 'Log In <span aria-hidden="true">&rarr;</span>'?>
            </a>
        <?php endif; ?>
    </div>
</nav>


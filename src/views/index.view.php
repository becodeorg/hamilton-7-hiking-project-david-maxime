<div class="flex flex-wrap justify-center">
    <?php foreach ($tags as $tag) : ?>
    <div class="max-w-sm m-2 bg-slate-200 border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
        <a href="/tag?name=<?= $tag['name']; ?>">
            <button><?= $tag['name'] ?></button>
        </a>
    </div>
    <?php endforeach; ?>
</div>

<div class="flex flex-wrap justify-center">
    <?php foreach ($hikes as $hike) : ?>
        <div class="max-w-sm m-2 bg-slate-200 border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
            <div class="p-5">
                <a href="/hike?id=<?= $hike['ID']; ?>">
                    <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?= $hike['name'] ?></h2>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><?= $hike['description']?></p>
                <a href="/hike?id=<?= $hike['ID']; ?>" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Read more
                </a>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body>
    <main>
        <!-- BUTTONS -->
        <ul>
            <?php foreach ($tags as $tag) : ?>
                <a href="/tag?name=<?= $tag['name']; ?>">
                    <button><?= $tag['name'] ?></button>
                </a>
            <?php endforeach; ?>
        </ul>
                <!-- HIKES -->
        <ul class="grid grid-cols-4 gap-4">
            <?php foreach ($hikes as $hike) : ?>

                <li class="bg-gradient-to-t from-slate-900 to-invisible | text-white | flex flex-col justify-end | relative | m-8 | w-96 h-64 | rounded-xl | overflow-hidden | static">
                    <a href="/hike?id=<?= $hike['ID']; ?>">
                        <span class="text-xl mx-8"><?= $hike['name'] ?></span>
                    </a>
                    <section class="flex flex-row">
                    <span class="mx-8"><?= $hike['duration'] ?>min</span>
                    <span class="mx-8"><?= $hike['distance'] ?>km</span>
                    <span class="mx-8"><?= $hike['elevation_gain'] ?>m</span>
                    </section>
                    <br>
                    <span class="mx-8"><?= $hike['description'] ?></span>
                    <img class="absolute left-0 top-0 -z-50" src="https://unsplash.it/400/300?random=1" alt="image/png">
                </li>
            <?php endforeach; ?>
        </ul>
    </main>
</body>

</html>
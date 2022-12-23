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
                <li class="bg-slate-500 m-8 w-96 h-64 rounded-xl ">
                    <a href="/hike?id=<?= $hike['ID']; ?>">
                        <span><?= $hike['name'] ?></span>
                    </a>
                    <span><?= $hike['duration'] ?>min</span>
                    <span><?= $hike['distance'] ?>km</span>
                    <span><?= $hike['elevation_gain'] ?>m</span>
                    <br>
                    <span><?= $hike['description'] ?></span>
                </li>
            <?php endforeach; ?>
        </ul>
    </main>
</body>

</html>
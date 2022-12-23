<ul>
    <?php foreach ($tags as $tag) : ?>
        <a href="/tag?name=<?= $tag['name']; ?>">
            <button><?= $tag['name'] ?></button>
        </a>
    <?php endforeach; ?>
    <?php foreach ($hikes as $hike) : ?>
        <li>
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
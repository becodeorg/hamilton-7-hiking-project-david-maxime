<ul>
    <?php foreach ($hikes as $hike) : ?>
        <li>
            <a href="/hike?id=<?= $hike['ID']; ?>">
                <span><?= $hike['name'] ?></span>
            </a>
            <a href="/updateHike?id=<?= $hike['ID']; ?>">
            <button>Update</button>
            </a>
            <button>Delete</button>
        </li>
    <?php endforeach; ?>
</ul>
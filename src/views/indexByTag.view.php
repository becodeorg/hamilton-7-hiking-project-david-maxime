<h3><?= $tagName ?></h3>
<?php foreach ($hikes as $hike) : ?>
    <li>
        <a href="/hike?id=<?= $hike['ID']; ?>">
            <span><?= $hike['name'] ?></span>
        </a>
    </li>
<?php endforeach; ?>
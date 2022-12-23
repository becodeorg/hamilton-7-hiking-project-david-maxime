<ul>
    <?php foreach ($hikes as $hike) : ?>
        <li>
            <a href="/hike?id=<?= $hike['ID']; ?>">
                <span><?= $hike['name'] ?></span>
            </a>
        </li>
        <a href="/updateHike?id=<?= $hike['ID'] ?>">
            <button>Update</button>
        </a>
        <form method="post">
            <input type="text" name="id" value="<?php echo $hike['ID']?>" class="hidden">
            <button type="submit">Delete</button>
        </form>
        <br>
    <?php endforeach; ?>
</ul>

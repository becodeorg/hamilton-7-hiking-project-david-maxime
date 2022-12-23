<ul>
    <?php foreach ($hikes as $hike) : ?>
        <li>
            <a href="/hike?id=<?= $hike['ID']; ?>">
                <span class="text-red-500"><?= $hike['name'] ?></span>
            </a>
            <a href="/updateHike?id=<?= $hike['ID'] ?>">
            <button>Update</button>
            </a>
            <form method="post">
                <input type="text" name="id" value="<?php echo $hike['ID']?>">
            <button type="submit">Delete</button>
            </form>
        </li>
        <?php if ($hike['updateTime'])
        {
            echo "Last updated: " . $hike['updateTime'];
        }?>
    <?php endforeach; ?>
</ul>



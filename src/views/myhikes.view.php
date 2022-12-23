<div class="flex flex-wrap justify-center">
<ul>
    <?php foreach ($hikes as $hike) : ?>
        <li class="max-w-sm m-2 bg-slate-200 border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
            <a href="/hike?id=<?= $hike['ID']; ?>">
                <span><?= $hike['name'] ?></span>
            </a>
            <br>
            <a href="/updateHike?id=<?= $hike['ID'] ?>">
            <button>Update</button>
            </a>
            <form method="post">
                <input type="text" name="id" value="<?php echo $hike['ID']?>" class="hidden">
            <button type="submit">Delete</button>
            </form>
        </li>
        <?php if ($hike['updateTime'])
        {
            echo "Last updated: " . $hike['updateTime'];
        }?>
       <br>
    <?php endforeach; ?>
</ul>
</div>



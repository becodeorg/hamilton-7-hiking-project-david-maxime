<ul>
    <?php foreach ($tags as $tag) : ?>
        <li>
            <a href="/tag?id=<?= $tag['ID']; ?>">
                <span><?= $tag['name'] ?></span>
            </a>
        </li>
        <form method="post">
            <input type="text" name="id" value="<?php echo $tag['ID']?>" class="hidden">
            <button type="submit">Delete</button>
        </form>
    <br>
    <?php endforeach; ?>
    <br>
    <a href="/addTag">Add a tag</a>
</ul>

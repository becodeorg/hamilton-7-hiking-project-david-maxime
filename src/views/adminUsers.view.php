<ul>
    <?php foreach ($users as $user) : ?>
        <li>
            <a href="/user?id=<?= $user['ID']; ?>">
                <span><?= $user['nickname'] ?></span>
            </a>
        </li>
        <form method="post">
            <input type="text" name="id" value="<?php echo $user['ID']?>" class="hidden">
            <button type="submit">Delete</button>
        </form>
        <br>
    <?php endforeach; ?>
</ul>

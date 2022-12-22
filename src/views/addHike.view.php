<h2>Add Hike</h2>

<form action="addHike" method="post">
    <div>
        <label for="name">Name</label>
        <input type="text" name="name">
    </div>
    <div>
        <label for="distance">Distance(km)</label>
        <input type="number" name="distance" step="1">
    </div>
    <div>
        <label for="duration">Duration</label>
        <input type="number" name="duration" step="1">
    </div>
    <div>
        <label for="elevation">Elevation gain(m)</label>
        <input type="number" name="elevation" step="1">
    </div>
    <div>
        <label for="description">Description</label>
        <input type="text" name="description">
    </div>
    <div>
        <label for="tags">Tag</label>

        <input list="tags" name="tags">
        <datalist id="tags">
            <?php foreach ($tags as $tag) : ?>
            <option value="<?php echo $tag["name"] ?>">
                <?php endforeach; ?>
        </datalist>

    </div>
    <div>
        <p>Desired tag is not in the list? Write it here and it will be added to your hike:</p>
        <label for="tagName">Name</label>
        <input type="text" name="tagName">
    </div>
    <button type="submit" name="addHike">Add your hike !</button>
</form>


<h2>Update Hike</h2>

<form action="updateHike" method="post">
    <div>
        <input type="text" name="id" value="<?php echo $_GET["id"]?>">
    </div>
    <div>
        <label for="name">Name</label>
        <input type="text" name="name" value="<?php echo $hikes["name"]?>">
    </div>
    <div>
        <label for="distance">Distance(km)</label>
        <input type="number" name="distance" step="1" value="<?php echo $hikes["distance"]?>">
    </div>
    <div>
        <label for="duration">Duration</label>
        <input type="number" name="duration" step="1" value="<?php echo $hikes["duration"]?>">
    </div>
    <div>
        <label for="elevation">Elevation gain(m)</label>
        <input type="number" name="elevation" step="1" value="<?php echo $hikes["elevation_gain"]?>">
    </div>
    <div>
        <label for="description">Description</label>
        <input type="textarea" name="description" value="<?php echo $hikes["description"]?>">
    </div>
    <div>
        <label for="tags">Tag</label>

        <?php foreach ($tags as $tag) : ?>
            <input type ="checkbox" name="tags[]" value="<?php echo $tag["name"] ?>">
            <label for="<?php echo $tag["name"] ?>"><?php echo $tag["name"] ?></label>

        <?php endforeach; ?>

    </div>
    <button type="submit">Update your hike !</button>
</form>
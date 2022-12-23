<h2>Update Hike</h2>

<form action="updateHike" method="post">
    <div class="hidden max-w-sm m-2 bg-slate-200 border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
        <input type="text" name="id" value="<?php echo $_GET["id"]?>">
    </div>
    <div class="max-w-sm m-2 bg-slate-200 border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
        <label for="name">Name</label>
        <input type="text" name="name" value="<?php echo $hikes["name"]?>">
    </div>
    <div class="max-w-sm m-2 bg-slate-200 border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
        <label for="distance">Distance(km)</label>
        <input type="number" name="distance" step="1" value="<?php echo $hikes["distance"]?>">
    </div>
    <div class="max-w-sm m-2 bg-slate-200 border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
        <label for="duration">Duration</label>
        <input type="number" name="duration" step="1" value="<?php echo $hikes["duration"]?>">
    </div>
    <div class="max-w-sm m-2 bg-slate-200 border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
        <label for="elevation">Elevation gain(m)</label>
        <input type="number" name="elevation" step="1" value="<?php echo $hikes["elevation_gain"]?>">
    </div>
    <div class="max-w-sm m-2 bg-slate-200 border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
        <label for="description">Description</label>
        <input type="textarea" name="description" value="<?php echo $hikes["description"]?>">
    </div>
    <div class="max-w-sm m-2 bg-slate-200 border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
        <label for="tags">Tag</label>

        <?php foreach ($tags as $tag) : ?>
            <input type ="checkbox" name="tags[]" value="<?php echo $tag["name"] ?>">
            <label for="<?php echo $tag["name"] ?>"><?php echo $tag["name"] ?></label>

        <?php endforeach; ?>

    </div>
    <button type="submit">Update your hike !</button>
</form>
<h2>Update Hike</h2>

<form action="updateHike" method="post">
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
    <button type="submit">Update your hike !</button>
</form>